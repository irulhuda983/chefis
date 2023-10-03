<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Psr\Http\Message\ServerRequestInterface;
use Laravel\Passport\Http\Controllers\AccessTokenController;
use App\Http\Resources\UserResource;

class AuthController extends AccessTokenController
{
    // Client ID: 2
    // Client secret: AsB2Ffp8JvtMDlpXAg4msXeGWFo0uiQfnCt1cmRo

    public function issueTokenAdmin(ServerRequestInterface $request, Request $request2)
    {
        $request2->validate([
            'username' => "required|min:4|alpha_dash",
            'password' => 'required|min:6|max:25|string',
        ]);

        $user = User::where('username', $request2->username)->first();

        if(!$user) {
            return response()->json(['message' => 'Username dan sandi salah'], 403);
        }

        if(!Hash::check($request2->password, $user->password)) {
            return response()->json(['message' => 'Username dan sandi salah'], 403);
        }

        $response = parent::issueToken($request);
        $body = json_decode($response->content());

        if (isset($body->error)){
            return response()->json(['message' => 'Username dan sandi salah'], 403);
        }

        $oauth = (Controller::userAccessTokenId($body->access_token));
        $user = User::find($oauth->user_id);

        return response()->json([
            'token' => $body,
            'userInfo' => [
                'id' => $user->id,
                'username' => $user->username,
                'nama' => $user->profil->nama,
                'nrp' => $user->profil->nrp,
                'foto' => $user->foto,
                'role_id' => $user->role_id
            ]
        ]);
    }

    public function refreshToken(ServerRequestInterface $request)
    {
        $response = parent::issueToken($request);
        $body = json_decode($response->content());

        if (isset($body->error)){
            return response()->json(['message' => 'Username dan sandi salah'], 403);
        }

        $oauth = (Controller::userAccessTokenId($body->access_token));
        $user = User::find($oauth->user_id);

        return response()->json($body);
    }

    public function getMe(Request $request)
    {
        $user = $request->user();

        return new UserResource($user);
    }

    public function updateProfil(Request $request)
    {
        $user = $request->user();

        $request->validate([
            'nama' => 'required',
            'nrp' => 'nullable',
            'id_pangkat' => 'nullable',
            'id_jabatan' => 'nullable',
            'password' => 'nullable|min:6|max:50',
            'foto' => 'nullable|image',
        ]);

        $foto = $request->foto ? $request->file('foto')->storeAs('foto', Str::random(40). '.'.$request->file('foto')->extension()) : $user->profil->foto;

        try{
            DB::beginTransaction();
            if($request->password) {
                $updateUser = $user->update(['password' => Hash::make($request->password)]);
            }

            $user->profil()->update([
                'nama' => $request->nama,
                'nrp' => $request->nrp ?? $user->nrp,
                'id_pangkat' => $request->id_pangkat,
                'id_jabatan' => $request->id_jabatan,
                'foto' => $foto,
            ]);

            DB::commit();
            return new UserResource($user);
        }catch(\Exception $e){
            DB::rollBack();
            return response()->json(['success' => false, 'error' => $e->getMessage(), 'message' => 'Internal Server Error'], 500);
        }
    }

    public function logout(Request $request)
    {
        try {
            $authToken = $request->header('authorization');
            list($type, $token) = explode(' ', $authToken);
            $tokenModel = Controller::userAccessTokenId($token);
            if (!DB::table('oauth_access_tokens')->where('id', $tokenModel->id)->update(['revoked' => 1]))
                return response()->json(['error' => 'Terjadi kesalahan'], 500);

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Terjadi kesalahan'], 500);
        }

    }
}
