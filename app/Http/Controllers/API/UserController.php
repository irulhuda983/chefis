<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    
    public function storeCsv(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf,xlx,csv,json|max:2048',
        ]);

        $file = file_get_contents($request->file);
        $data = json_decode($file);

        $arr = [];
        
        try{
            DB::beginTransaction();

            foreach($data as $item) {
                if($item->nrp != '' || $item->nrp){
                    $user = Personil::where('nrp', $item->nrp)->first();
                    if(!$user) {
                        $dataUser = User::create([
                            'username' => $item->nrp,
                            'password' => bcrypt($item->nrp),
                            'role_id' => 4,
                        ]);
                
                        $dataUser->profil()->create([
                            'nama' => $item->nama,
                            'nrp' => $item->nrp,
                            'id_kesatuan' => $item->id_kesatuan,
                            'id_jabatan' => $item->id_jabatan,
                            'id_pangkat' => $item->id_pangkat,
                        ]);
      
                        array_push($arr, $dataUser);
                    }
                }
            }
        
            DB::commit();
            return response()->json($arr, 200);
        }catch(\Exception $e){
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 400);
        }  

    }

    public function storeAdmin(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'id_jabatan' => 'nullable',
            'id_kesatuan' => 'nullable',
            'id_pangkat' => 'nullable',
            'username' => 'required',
            'password' => 'required',
            'role_id' => 'required'
        ]);

        $user = User::create([
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'role_id' => $request->role_id,
        ]);

        $user->profil()->create([
            'nama' => $request->nama,
            'nrp' => null,
            'id_kesatuan' => $request->id_kesatuan,
            'id_jabatan' => $request->id_jabatan,
            'id_pangkat' => $request->id_pangkat,
            'foto' => null,
        ]);

        return response()->json([
            'data' => $user
        ], 200);
    }
}
