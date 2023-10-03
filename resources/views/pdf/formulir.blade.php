<?php
    $surat = $data['surat'];
    $desa = $surat->desa ? "$surat->desa" : '';
    $kecamatan = $surat->kecamatan ? "Kec. $surat->kecamatan" : '';
    $kabkota = $surat->kabkota ? "Kab. $surat->kabkota" : '';
    $alamat = "$desa $kecamatan $kabkota";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir</title>

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
            font-size: 9pt;
            font-weight: lighter;
            line-height: 11.70pt;
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
    <div style="position: fixed; z-index: -9999; width: 100%; top: 0; left: 0; bottom: 0; right: 0">
        @if($data['bg'] == 'show')
        <img src="{{ $data['formulir'] }}" alt="" style="width: 101%;">
        @endif;
    </div>
    <!-- 70mm -->
    <!-- 26.7mm -->
    <div style="margin-top: 87mm; margin-left: 71mm">
        <p>
            <span></span><br>
            <span>{{ $surat->nrkb }}</span>
        </p>
        <p style="margin-top: 5.65mm">
            <span>{{ $surat->nama_pemilik }}</span><br>
            <span>{{ $surat->alamat }} {{ $alamat }}</span><br>
            <span>{{ $surat->nik }}</span><br>
            <span>{{ $surat->no_hp }}</span><br>
        </p>
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