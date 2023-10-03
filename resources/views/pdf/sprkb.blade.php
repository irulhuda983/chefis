<?php
    $surat = $data['surat'];
    $desa = $surat->desa ? $surat->desa : '';
    $kecamatan = $surat->kecamatan ? "Kec. $surat->kecamatan" : '';
    $kabkota = $surat->kabkota ? "Kec. $surat->kabkota" : '';
    $alamat = "$desa $kecamatan $kabkota";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPRKB</title>

    <style>
        * { 
            margin: 0;
            padding: 0;
         }

        body {
            font-family: 'Arial', Arial, sans-serif;
            font-style: normal;
            font-variant: normal;
            /* font-size: 4.2333mm; */
            font-size: 11pt;
            font-weight: lighter;
            line-height: 14.5pt;
            word-spacing: -1pt;
            /* color: blue; */
            /* line-height: 1.5pt; */
            /* margin-top: 1mm;
            margin-bottom: 4mm;
            margin-left: 7mm;
            margin-right: 5mm;
            line-height: 16pt; */
        }

        .page-break{
	        page-break-inside: avoid;
            page-break-after:always;
	    }

    </style>
</head>
<body>
    <div style="position: fixed; z-index: -9999; width: 100%; top: 0; left: 0;">
        @if($data['bg'] == 'show')
            <img src="{{ $data['sprkb'] }}" alt="" style="width: 100.5%">
        @endif;
    </div>
    <!-- 71.5mm -->
    <!-- 26.7mm -->
    <div style="margin-top: 34mm; margin-left: 74.5mm">
        <p>
            <span></span><br>
            <span>{{ $surat->nrkb }}</span>
        </p>
        <div style="margin-top: 5.84mm">
            <p>@if($surat->nama_pemilik){{ $surat->nama_pemilik }} @else <br> @endif</p>
            <p>@if($surat->alamat){{ $surat->alamat }} @else <br> @endif</p>
            <p>@if($surat->desa) {{ $alamat }} @else <br> @endif</p>
            <p>@if($surat->nik){{ $surat->nik }} @else <br> @endif</p>
            <p>@if($surat->no_hp){{ $surat->no_hp }} @else <br> @endif</p>
        </div>
        <p style="margin-top: 5mm">
            <span>{{ $surat->merk }}</span><br>
            <span>{{ $surat->tipe }}</span><br>
            <span>{{ $surat->jenis_kendaraan }}</span><br>
            <span>{{ $surat->model_kendaraan }}</span><br>
            <span>{{ $surat->tahun }}</span><br>
            <span>{{ $surat->cc }}</span><br>
            <span>{{ $surat->no_rangka }}</span><br>
            <span>{{ $surat->no_mesin }}</span><br>
            <span>{{ $surat->warna }}</span><br>
            <span>{{ $surat->bbm }}</span><br>
            <span>{{ $surat->warna_tnkb }}</span><br>
            <span>{{ $surat->tahun_registrasi }}</span><br>
            <span>{{ $surat->no_bpkb }}</span><br>
            <span>{{ $surat->kode_lokasi }}</span><br>
            <span>{{ $surat->no_urut_pendaftaran }}</span><br>
        </p>
    </div>
</body>
</html>