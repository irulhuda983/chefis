<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Ranmor;
use App\Models\Surat;
use App\Models\History;
use App\Traits\Logo;
use Carbon\Carbon;

use Illuminate\Support\Facades\Crypt;

use App\Http\Resources\HistoryResource;

class KendaraanController extends Controller
{
    use Logo;

    public function index(Request $request)
    {
        $surat = Surat::paginate($request->limit ?? 10);

        return response()->json(['data' => $surat], 200);
    }

    public function show(Request $request, Surat $surat)
    {
        return response()->json(['data' => $surat], 200);
    }

    public function history(Request $request)
    {
        $query = History::orderBy('waktu', 'DESC')->paginate($request->limit ?? 5);

        return HistoryResource::collection($query);
    }

    public function searchNopol(Request $request)
    {
        $request->validate(
            [
                'nrkb' => 'required|min:2|max:16|regex:/[a-zA-Z0-9\s]+/',
            ],
            [
                'nrkb.required' => 'keyword atau nrkb tidak boleh kosong',
                'nrkb.min' => 'keyword atau nrkb harus melebihi 1 karakter',
                'nrkb.max' => 'batas keywoard nrkb yang di perbolehkan hanya sampai 16 karakter',
            ]
        );

        $nrkb = str_replace(" ", "", $request->nrkb);

        $re = '/([a-zA-Z]{1,3})(\d{1,4})([a-zA-Z]*)/m';
        preg_match_all($re, $nrkb, $matches, PREG_SET_ORDER, 0);
        $match = count($matches) ? $matches[0] : [];
        $nopola = count($match) ? $match[1]: ' ';
        $nopolb = count($match) ? $match[2]: ' ';
        $nopolc = count($match) ? $match[3]: ' ';

        try {

            return response()->json([
                'success' => true,
                'data' => $nrkb
            ], 200);
        } catch (\Exception $e){
            return response()->json([
                'success' => false,
                'data' => null,
            ], 400);
        }
    }

    public function storeSurat(Request $request)
    {
        $request->validate([
            'nrkb' => 'nullable',
            'tipe_nrkb' => 'nullable',
            'nama_pemilik' => 'nullable',
            'alamat' => 'nullable',
            'desa' => 'nullable',
            'kec' => 'nullable',
            'kabkota' => 'nullable',
            'nik' => 'nullable',
            'no_hp' => 'nullable',
            'merk' => 'nullable',
            'tipe' => 'nullable',
            'jenis_kendaraan' => 'nullable',
            'model_kendaraan' => 'nullable',
            'tahun' => 'nullable',
            'cc' => 'nullable',
            'jml_roda' => 'nullable',
            'jml_sumbu' => 'nullable',
            'no_rangka' => 'nullable',
            'no_mesin' => 'nullable',
            'warna' => 'nullable',
            'bbm' => 'nullable',
            'warna_tnkb' => 'nullable',
            'tahun_registrasi' => 'nullable',
            'no_bpkb' => 'nullable',
            'no_stnk' => 'nullable',
            'kode_lokasi' => 'nullable',
            'no_urut_pendaftaran' => 'nullable',
        ]);

        $user = $request->user();

        try{
            DB::beginTransaction();

            $surat = Surat::create([
                'id_user' => $user->id,
                'kode' => Str::random(30),
                'nrkb' => $request->nrkb,
                'tipe_nrkb' => $request->tipe_nrkb,
                'nama_pemilik' => $request->nama_pemilik,
                'alamat' => $request->alamat,
                'desa' => $request->desa,
                'kecamatan' => $request->kecamatan,
                'kabkota' => $request->kabkota,
                'nik' => $request->nik,
                'no_hp' => $request->no_hp,
                'merk' => $request->merk,
                'tipe' => $request->tipe,
                'jenis_kendaraan' => $request->jenis_kendaraan,
                'model_kendaraan' => $request->model_kendaraan,
                'tahun' => $request->tahun,
                'cc' => $request->cc,
                'jml_roda' => $request->jml_roda,
                'jml_sumbu' => $request->jml_sumbu,
                'no_rangka' => $request->no_rangka,
                'no_mesin' => $request->no_mesin,
                'warna' => $request->warna,
                'bbm' => $request->bbm,
                'warna_tnkb' => $request->warna_tnkb,
                'tahun_registrasi' => $request->tahun_registrasi,
                'no_bpkb' => $request->no_bpkb,
                'no_stnk' => $request->no_stnk,
                'kode_lokasi' => $request->kode_lokasi,
                'no_urut_pendaftaran' => $request->no_urut_pendaftaran,
            ]);
    
            DB::commit();
        }catch(\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'error' => $e->getMessage(), 'message' => 'Internal Server Error'], 500);
        }

        return response()->json([
            'data' => $surat,
            'success' => true,
            'message' => 'Berhasil buat surat',
        ], 200);
    }

    public function updateFilePrint(Request $request, $kode)
    {
        $request->validate([
            'file_tipe' => 'required|in:formulir,sprkb'
        ]);

        $user = $request->user();

        try{
            DB::beginTransaction();

            $surat = Surat::where('kode', $kode)->first();

            if($request->file_tipe == 'formulir') {
                $dataUpdate = ['file_formulir' => 1];
            }elseif($request->file_tipe == 'sprkb') {
                $dataUpdate = ['file_srkb' => 1];
            }else{
                return response()->json(['message' => 'error', 'success' => false, 'error' => ['file not found']], 400);
            }
    
            if(!$surat->update($dataUpdate)) {
                return response()->json(['message' => 'error', 'success' => false, 'error' => ['file not found']], 400);
            }

            $history = History::create([
                'id_user' => $user->id,
                'nrkb' => $surat->nrkb,
                'tipe' => $request->file_tipe,
                'keterangan' => 'Cetak '. $request->file_tipe.' Cek Fisik Kendaraan dengan NRKB '.$surat->nrkb,
                'waktu' => Carbon::now(),
            ]);

            DB::commit();
            return response()->json(['message' => 'success', 'success' => true, 'error' => null, 'data' => Surat::find($surat->id)], 200);
        }catch(e) {
            DB::rollBack();
            return response()->json(['success' => false, 'error' => $e->getMessage(), 'message' => 'Internal Server Error'], 500);
        }
    }

    public function cetakFormulir(Request $request, $kode)
    {
        $bg = $request->bg;
        $surat = Surat::where('kode', $kode)->first();

        $data = [
            'tribata' => $this->tribata,
            'lantas' => $this->lantas,
            'formulir' => $this->formulir,
            'surat' => $surat,
            'bg' => $bg
        ];

        $pdf = Pdf::loadView('pdf.formulir', compact('data'));
        $pdf->setPaper('a4');
        $pdf->setOption(['dpi' => 150, 'defaultFont' => 'Arial']);

        return $pdf->stream('download.pdf');
    }

    public function cetakSprkb(Request $request, $kode)
    {
        $bg = $request->bg;
        $surat = Surat::where('kode', $kode)->first();

        $data = [
            'tribata' => $this->tribata,
            'lantas' => $this->lantas,
            'sprkb' => $this->sprkb,
            'surat' => $surat,
            'bg' => $bg
        ];

        $pdf = Pdf::loadView('pdf.sprkb', compact('data'));
        $pdf->setPaper('a4');
        $pdf->setOption(['dpi' => 150, 'defaultFont' => 'Arial']);

        return $pdf->stream('download.pdf');
    }

    public function cetakPdf(Request $request)
    {
        $data = [
            'tribata' => $this->tribata,
            'lantas' => $this->lantas,
            'formulir' => $this->formulir,
        ];

        $pdf = Pdf::loadView('pdf.formulir', compact('data'));
        $pdf->setPaper('a4');
        $pdf->setOption(['dpi' => 150, 'defaultFont' => 'Arial']);

        return $pdf->stream('download.pdf');
    }

    public function regexNrkb($nrkb)
    {
        $re = '/([a-zA-Z]{1,3})(\d{1,4})([a-zA-Z]*)/m';
        preg_match_all($re, $nrkb, $matches, PREG_SET_ORDER, 0);
        $match = count($matches) ? $matches[0] : [];
        $nopol = count($match) ? "$match[1] $match[2] $match[3]": $nrkb;

        return $nopol;
    }
}
