<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Surat;
use App\Models\User;
use App\Models\UserProfil;
use App\Models\History;

use App\Http\Resources\HistoryResource;

use App\Http\Resources\StatistikPersonilResource;

class StatistikController extends Controller
{
    
    public function grafikBySurat(Request $request)
    {
        if($request->range){
            list($awal, $akhir) = $request->range;

            $start = date('Y-m-d', strtotime($awal) );
            $end = date('Y-m-d', strtotime($akhir) );
        }else{
            $dateSurat = Surat::orderBy('created_at', 'ASC')->first();
            $dateNow = $dateSurat ? strtotime($dateSurat->created_at) : strtotime(date('Y-m-01'));
            $start = date('Y-m-01', $dateNow);
            $end = date('Y-m-d');
        }

        $tanggal = [];
        $sprkb = [];
        $formulir = [];

        while($start <= $end){
            array_push($tanggal, $start);

            $start = date('Y-m-d', strtotime('+1 days', strtotime($start)));
        }

        foreach($tanggal as $tgl){
            $dataSprkb = Surat::whereDate('created_at', date('Y-m-d', strtotime($tgl)))->where('file_srkb', 1);
            $dataFormulir = Surat::whereDate('created_at', date('Y-m-d', strtotime($tgl)))->where('file_formulir', 1);

            array_push($sprkb, ['x' => date('m/d/Y', strtotime($tgl)).' GMT', 'y' => $dataSprkb->count() ]);
            array_push($formulir, ['x' => date('m/d/Y', strtotime($tgl)).' GMT', 'y' => $dataFormulir->count() ]);
        }

        return response()->json([
            'data' => [
                [
                    'name' => 'sprkb',
                    'data' => $sprkb
                ],
                [
                    'name' => 'formulir',
                    'data' => $formulir
                ]
            ],
            'tanggal' => [$start, $end],
            'range' => $request->range
        ], 200);

    }

    public function totalSurat(Request $request)
    {
        $formulir = Surat::where('file_formulir', 1);
        $sprkb = Surat::where('file_srkb', 1);

        if($request->range){
            list($awal, $akhir) = $request->range;

            $start = date('Y-m-d', strtotime($awal) );
            $end = date('Y-m-d', strtotime($akhir) );

            $formulir->whereBetween('created_at', [$start, $end]);
            $sprkb->whereBetween('created_at', [$start, $end]);
        }

        return response()->json([
            'data' => [
                'formulir' => $formulir->count(),
                'sprkb' => $sprkb->count(),
            ]
        ], 200);
    }

    public function totalByPersonil(Request $request)
    {
        $query = Surat::select('id_user', DB::raw('count(id_user) as total'))->whereNotNull('id_user');

        if($request->tipe == 'formulir') {
            $query->where('file_formulir', 1);
        }else{
            $query->where('file_srkb', 1);
        }
        
        if($request->range) {
            list($awal, $akhir) = $request->range;

            $start = date('Y-m-d', strtotime($awal) );
            $end = date('Y-m-d', strtotime($akhir) );

            $query->whereBetween('created_at', [$start, $end]);
        }

        $surat = $query->groupBy('id_user')->get();

        $chunk = $surat->sortByDesc('total')->values()->take(10)->all();

        $data = [];

        foreach($chunk as $items) {
            $userprofil = UserProfil::where('user_id', $items->id_user)->first();

            if($items->id_user) {
                array_push($data, [
                    'nama' => $userprofil->nama,
                    'nrp' => $userprofil->nrp,
                    'foto' => $userprofil->foto,
                    'total' => $items->total,
                ]);
            }
        }

        return StatistikPersonilResource::collection($data);
    }

    public function history(Request $request)
    {
        $query = History::orderBy('waktu', 'DESC');

        if($request->range){
            list($awal, $akhir) = $request->range;

            $start = date('Y-m-d', strtotime($awal) );
            $end = date('Y-m-d', strtotime($akhir) );

            $query->whereBetween('waktu', [$start, $end]);
        }

        return HistoryResource::collection($query->paginate($request->limit ?? 5));
    }
}
