<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SURAT PERMOHONAN REGISTRASI KENDARAAN BERMOTOR (SPRKB)</title>
    <style>
        * { 
            margin: 0;
            padding: 0;
         }

        body {
            font-family: 'Arial Narrow', Arial, sans-serif;
            font-style: normal;
            font-variant: normal;
            /* font-size: 4.2333mm; */
            font-size: 11pt;
            /* font-weight: 200; */
            font-weight: lighter;
            /* line-height: 1.5pt; */
            margin-top: 1mm;
            margin-bottom: 4mm;
            margin-left: 5mm;
            margin-right: 5mm;
            line-height: 16pt;
        }

        table, th, td {
            /* border: 1px solid black; */
            border-collapse: collapse;
        }
        th, td {
            padding-bottom: 0px;
        }

        table.bordered, table.bordered th, table.bordered td {
            border: 1px solid black;
            width: 100%;
        }

        table.bordered th, table.bordered td {
            padding-left: 7px;
            padding-right: 7px;
            padding-top: 0;
            padding-bottom: 0;
        }

        table.kelengkapan, table.kelengkapan th, table.kelengkapan td {
            border: 1px solid black;
            width: 100%;
        }

        table.kelengkapan th, table.kelengkapan td {
            padding-left: 5px;
            padding-right: 5px;
            text-align: center;
            font-size: 9pt;
            height: 10mm;
        }

        table.table-lain-lain th, table.table-lain-lain td {
            padding-top: 7px;
            padding-bottom: 7px;
        }

        .page-break{
	        page-break-inside: avoid;
            page-break-after:always;
	    }

    </style>
</head>
<body>
    <!-- SURAT PERMOHONAN REGISTRASI KENDARAAN BERMOTOR (SPRKB) -->
    <table style="width: 100%; padding-left: 10mm;">
        <div style="position: fixed; z-index: -9999; width: 90mm; height: 80mm; top: 125mm; left: 60mm;">
            <img style="opacity: 0.12; width: 100%; height: 100%;" src="data:image/png;base64, {{ $data['lantas'] }}" alt="">
        </div>

        <div style="width: 100%; position: fixed; z-index: -9999; top: 210mm; left: 0; right: 0;">
            <p style="text-align: center; font-weight: bold; margin-bottom: 30px; font-size: 14pt; color: rgba(34, 64, 154, 0.12);">
                SURAT PERMOHONAN REGISTRASI KENDARAAN BERMOTOR
                <br>
                (SPRKB)
            </p>
        </div>

        <table width="100%">
            <tr>
                <th style="width: 50%; font-size: 8pt; text-align: left; padding: 0; vertical-align: top;">KEPOLISIAN NEGARA REPUBLIK INDONESIA</th>
                <td style="width: 50%; text-align: right; font-size: 10pt; padding: 0;"><br/>Nomor Seri : ................................... &nbsp;&nbsp;&nbsp;</td>
            </tr>
        </table>

        <div style="text-align: center;">
            <img src="data:image/png;base64, {{ $data['tribata'] }}" style="width: 160px; margin-top: -40px; margin-bottom: 10px" />
        </div>

        <p style="text-align: center; font-weight: bold; margin-bottom: 30px; font-size: 12pt">SURAT PERMOHONAN REGISTRASI KENDARAAN BERMOTOR (SPRKB)</p>

        <table style="width: 100%;">
            <tr>
                <td style="width: 70%; padding-right: 20px;">
                    <table>
                        <tr>
                            <th style="padding-right: 10px;">I.</th>
                            <th style="text-align: left;">NOMOR REGISTRASI*</th>
                            <th></th>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="text-align: left;">a.&nbsp;&nbsp;NRKB Pilihan</td>
                            <td style="padding-left: 5px;">: -</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="text-align: left;">b.&nbsp;&nbsp;NRKB Urutan (bukan Pilihan)</td>
                            <td style="padding-left: 5px;">: L 909932 AB</td>
                        </tr>

                        <!-- identitas pemilik -->
                        <tr>
                            <th style="padding-right: 10px; padding-top: 20px;">II.</th>
                            <th style="text-align: left; padding-top: 20px;">IDENTITAS PEMILIK*</th>
                            <th></th>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="text-align: left;">a.&nbsp;&nbsp;Nama</td>
                            <td style="padding-left: 5px;">:</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="text-align: left;">b.&nbsp;&nbsp;Alamat</td>
                            <td style="padding-left: 5px;">:</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="text-align: left;">c.&nbsp;&nbsp;NIK/TDP/NIB/KITAS/KITAP</td>
                            <td style="padding-left: 5px;">:</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="text-align: left;">d.&nbsp;&nbsp;No. Tlp /HP/ Email</td>
                            <td style="padding-left: 5px;">:</td>
                        </tr>
                        <!-- end identitas pemilik -->

                        <!-- identitas kendaraan -->
                        <tr>
                            <th style="padding-right: 10px; padding-top: 20px;">II.</th>
                            <th style="text-align: left; padding-top: 20px;">IDENTITAS KENDARAAN*</th>
                            <th></th>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="text-align: left;">a.&nbsp;&nbsp;Merk</td>
                            <td style="padding-left: 5px;">:</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="text-align: left;">b.&nbsp;&nbsp;Tipe</td>
                            <td style="padding-left: 5px;">:</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="text-align: left;">c.&nbsp;&nbsp;Jenis</td>
                            <td style="padding-left: 5px;">:</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="text-align: left;">d.&nbsp;&nbsp;Model</td>
                            <td style="padding-left: 5px;">:</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="text-align: left;">e.&nbsp;&nbsp;Tahun Pembuatan</td>
                            <td style="padding-left: 5px;">:</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="text-align: left;">f.&nbsp;&nbsp;Isi Silinder/Daya Listrik</td>
                            <td style="padding-left: 5px;">:</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="text-align: left;">g.&nbsp;&nbsp;No. Rangka/NIK/VIN</td>
                            <td style="padding-left: 5px;">:</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="text-align: left;">h.&nbsp;&nbsp;No. Mesin</td>
                            <td style="padding-left: 5px;">:</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="text-align: left;">i.&nbsp;&nbsp;&nbsp;Warna Kendaraan</td>
                            <td style="padding-left: 5px;">:</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="text-align: left;">j.&nbsp;&nbsp;&nbsp;Bahan Bakar/Sumber Energi</td>
                            <td style="padding-left: 5px;">:</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="text-align: left;">k.&nbsp;&nbsp;Warna TNKB</td>
                            <td style="padding-left: 5px;">:</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="text-align: left;">l.&nbsp;&nbsp;&nbsp;Tahun Registrasi</td>
                            <td style="padding-left: 5px;">:</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="text-align: left;">m.&nbsp;No. BPKB</td>
                            <td style="padding-left: 5px;">:</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="text-align: left;">n.&nbsp;&nbsp;Kode Lokasi</td>
                            <td style="padding-left: 5px;">:</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="text-align: left;">o.&nbsp;&nbsp;No. Urut Pendaftaran</td>
                            <td style="padding-left: 5px;">:</td>
                        </tr>
                        <!-- end identitas kendaraan -->
                    </table>
                    <p style="font-weight: bold;">IV. JENIS PERMOHONAN STNK DAN/ATAU TNKB : **</p>
                    <table class="bordered" style="margin-bottom: 20px;">
                        <tr>
                            <td style="width: 5%; text-align: center"></td>
                            <td style="width: 45%;">Kendaraan Baru</td>
                            <td style="width: 5%; text-align: center"></td>
                            <td style="width: 45%;">Rubentina</td>
                        </tr>

                        <tr>
                            <td style="width: 5%; text-align: center"></td>
                            <td style="width: 45%;">Perpanjangan STNK 5 Tahunan</td>
                            <td style="width: 5%; text-align: center"></td>
                            <td style="width: 45%;">Penggantian (Hilang/Rusak)</td>
                        </tr>

                        <tr>
                            <td style="width: 5%; text-align: center"></td>
                            <td style="width: 45%;">Pengesahan STNK 5 Tahunan</td>
                            <td style="width: 5%; text-align: center"></td>
                            <td style="width: 45%;">Blokir STNK</td>
                        </tr>
                    </table>

                    <p style="font-weight: bold;">V. RANMOR BERASAL DARI : **</p>
                    <table class="bordered" style="margin-bottom: 20px;">
                        <tr>
                            <td style="width: 5%; text-align: center"></td>
                            <td style="width: 95%;"><i>Complete Knock Down</i> (CKD)</td>
                        </tr>

                        <tr>
                            <td style="width: 5%; text-align: center"></td>
                            <td style="width: 95%;"><i>Complete Build Up</i> (CBU)</td>
                        </tr>

                        <tr>
                            <td style="width: 5%; text-align: center"></td>
                            <td style="width: 95%;">Lelang .........................</td>
                        </tr>

                        <tr>
                            <td style="width: 5%; text-align: center"></td>
                            <td style="width: 95%;">Lain-lain .........................</td>
                        </tr>
                    </table>

                    <p style="font-weight: bold;">VI. STNK KHUSUS DAN RAHASIA : **</p>
                    <table class="bordered" style="margin-bottom: 20px;">
                        <tr>
                            <td colspan="2" style="width: 55%; text-align: center;">STNK Rahasia</td>
                            <td colspan="2" style="width: 50%; text-align: center;">STNK Khusus</td>
                        </tr>
                        <tr>
                            <td style="width: 5%; text-align: center"></td>
                            <td style="width: 45%;">Intelijen</td>
                            <td style="width: 5%; text-align: center"></td>
                            <td style="width: 45%;">Randis TNI</td>
                        </tr>

                        <tr>
                            <td style="width: 5%; text-align: center"></td>
                            <td style="width: 45%;">Penyidik Polri</td>
                            <td style="width: 5%; text-align: center"></td>
                            <td style="width: 45%;">Randis Polri</td>
                        </tr>

                        <tr>
                            <td style="width: 5%; text-align: center"></td>
                            <td style="width: 45%;">Petugas Jaksa</td>
                            <td style="width: 5%; text-align: center"></td>
                            <td style="width: 45%;">Randis Pemerintah</td>
                        </tr>
                    </table>
                </td>
                <td style="width: 30%; vertical-align: bottom;">
                    <br><br><br><br><br><br><br><br><br><br><br>
                    <p style="font-weight: bold;">STANDAR WAKTU (KONTROL)</p>
                    <table class="bordered" style="margin-bottom: 20px;">
                        <tr>
                            <td colspan="2">1. Pokja Pendaftaran</td>
                        </tr>
                        <tr>
                            <td style="width: 20px; text-align: center">Petugas</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="width: 20px; text-align: center">Waktu (Jam)</td>
                            <td></td>
                        </tr>
                    </table>

                    <table class="bordered" style="margin-bottom: 20px;">
                        <tr>
                            <td colspan="2">2. Pokja Penerbitan SKP</td>
                        </tr>
                        <tr>
                            <td style="width: 20px; text-align: center">Petugas</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="width: 20px; text-align: center">Waktu (Jam)</td>
                            <td></td>
                        </tr>
                    </table>

                    <table class="bordered" style="margin-bottom: 20px;">
                        <tr>
                            <td colspan="2">3. Pokja Pembayaran</td>
                        </tr>
                        <tr>
                            <td style="width: 20px; text-align: center">Petugas</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="width: 20px; text-align: center">Waktu (Jam)</td>
                            <td></td>
                        </tr>
                    </table>

                    <table class="bordered" style="margin-bottom: 20px;">
                        <tr>
                            <td colspan="2">4. Pokja Percetakan/Pengesahan</td>
                        </tr>
                        <tr>
                            <td style="width: 20px; text-align: center">Petugas</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="width: 20px; text-align: center">Waktu (Jam)</td>
                            <td></td>
                        </tr>
                    </table>
                    <table class="bordered" style="margin-bottom: 20px;">
                        <tr>
                            <td colspan="2">5. Pokja Penyerahan</td>
                        </tr>
                        <tr>
                            <td style="width: 20px; text-align: center">Petugas</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="width: 20px; text-align: center">Waktu (Jam)</td>
                            <td></td>
                        </tr>
                    </table>
                    <table class="bordered" style="margin-bottom: 20px;">
                        <tr>
                            <td colspan="2">6. Pokja Pengarsipan</td>
                        </tr>
                        <tr>
                            <td style="width: 20px; text-align: center">Petugas</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="width: 20px; text-align: center">Waktu (Jam)</td>
                            <td></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <table style="width: 100%; margin-bottom: 10px;">
            <tr>
                <td style="width: 50%; font-size: 9pt;">
                    *  diisi oleh Pemohon <br>
                    ** diisi Pemohon dengan tanda silang
                </td>

                <td style="width: 50%; text-align: right;">
                <br>
                    ................................., ........................ 202 ..... &nbsp;&nbsp;&nbsp;&nbsp;
                </td>
            </tr>
        </table>

        <table style="width: 100%">
            <tr>
                <td style="width: 35%; text-align: center;">
                    Pemohon
                    <br><br><br><br>
                    ( ................................. )
                </td>

                <td style="width: 15%; text-align: center;">
                </td>

                <td style="width: 50%; text-align: center;">
                    Petugas
                    <br><br><br><br>
                    ( ................................. )
                </td>
            </tr>
        </table>
    </table>
    <!-- end surat permohonan registrasi -->
    
    <div class="page-break"></div>


    <!-- berita acara -->
    <table width="100%; padding-left: 10mm; font-size: 10pt; line-height: 12pt;">
        <div style="position: fixed; z-index: -9999; width: 90mm; height: 80mm; top: 100mm; left: 60mm;">
            <img style="opacity: 0.12; width: 100%; height: 100%;" src="data:image/png;base64, {{ $data['lantas'] }}" alt="">
        </div>
        <!-- top -->
        <table width="100%" style="margin-top: 2mm">
            <tr>
                <td style="width: 40%; text-align: left; padding: 0; font-size: 10pt; text-decoration: underline; vertical-align: bottom;">KEPOLISIAN NEGARA REPUBLIK INDONESIA</td>
                <td style="width: 30%; vertical-align: bottom;"></td>
                <td style="width: 30%; text-align: left; font-size: 10pt; padding: 0; vertical-align: bottom;">
                    <div style="border: 1px solid black; width: 40px; height: 25px; display: inline-block;"></div>
                    &nbsp;
                    <span>:</span>
                    &nbsp;
                    Ranmor R2/R3
                </td>
            </tr>

            <tr>
                <td style="width: 40%; text-align: left; padding: 0; font-size: 10pt; vertical-align: bottom; padding-top: 5px;">POLDA : ...........................................</td>
                <td style="width: 30%; vertical-align: bottom;"></td>
                <td style="width: 30%; text-align: left; font-size: 10pt; padding: 0; vertical-align: bottom;">
                    <div style="border: 1px solid black; width: 40px; height: 25px; display: inline-block;"></div>
                    &nbsp;
                    <span>:</span>
                    &nbsp;
                    Ranmor R4/Lebih
                </td>
            </tr>
        </table>
        <!-- end top -->

        <table width="100%" style="margin-bottom: 10px">
            <tr>
                <td style="text-align: center;">
                    <img src="data:image/png;base64, {{ $data['tribata'] }}" style="width: 80px; margin-top: -60px; margin-bottom: 10px" />
                </td>
            </tr>
            <tr>
                <td style="font-weight: bold; text-decoration: underline; text-align: center; padding-bottom: 10px;">FORMULIR BERITA ACARA HASIL PEMERIKSAAN CEK FISIK RANMOR</td>
            </tr>
            <tr>
                <td style="border: 1px solid black; height: 25mm; vertical-align: top; text-align: left; padding: 10px; font-size: 10pt; font-weight: bold;">
                    Nomor Rangka :
                </td>
            </tr>
            <tr>
            <td style="border: 1px solid black; height: 25mm; vertical-align: top; text-align: left; padding: 10px; font-size: 10pt; font-weight: bold;">
                    Nomor Mesin :
                </td>
            </tr>
        </table>

        <table width="100%">
            <tr style="font-weight: bold">
                <td style="width: 60px; text-align: left;">I.</td>
                <td colspan="5">NOMOR REGISTRASI</td>
            </tr>

            <tr>
                <td></td>
                <td style="width: 60px; text-align: left;">a.</td>
                <td>NRKB Pilihan</td>
                <td style="padding-left: 5px; padding-right: 5px;">:</td>
                <td style="width: 45%"></td>
            </tr>
            <tr>
                <td></td>
                <td style="width: 60px; text-align: left;">b.</td>
                <td>NRKB Urutan (Bukan Pilihan)</td>
                <td style="padding-left: 5px; padding-right: 5px;">:</td>
                <td style="width: 45%"></td>
            </tr>

            <tr>
                <td style="padding-bottom: 10px;" colspan="5"></td>
            </tr>

            <!-- identitas pemilik -->
            <tr style="font-weight: bold">
                <td style="width: 60px; text-align: left;">II.</td>
                <td colspan="5">IDENTITAS PEMILIK</td>
            </tr>

            <tr>
                <td></td>
                <td style="width: 60px; text-align: left;">a.</td>
                <td>Nama</td>
                <td style="padding-left: 5px; padding-right: 5px;">:</td>
                <td style="width: 45%"></td>
            </tr>
            <tr>
                <td></td>
                <td style="width: 60px; text-align: left;">b.</td>
                <td>Alamat</td>
                <td style="padding-left: 5px; padding-right: 5px;">:</td>
                <td style="width: 45%"></td>
            </tr>
            <tr>
                <td></td>
                <td style="width: 60px; text-align: left;">c.</td>
                <td>NIK/TDP/NIB/KITAS/KITAP</td>
                <td style="padding-left: 5px; padding-right: 5px;">:</td>
                <td style="width: 45%"></td>
            </tr>
            <tr>
                <td></td>
                <td style="width: 60px; text-align: left;">d.</td>
                <td>No. Telp/Hp/Email</td>
                <td style="padding-left: 5px; padding-right: 5px;">:</td>
                <td style="width: 45%"></td>
            </tr>
            <!-- end identitas pemilik -->

            <tr>
                <td style="padding-bottom: 10px;" colspan="5"></td>
            </tr>

            <!-- identitas pemilik -->
            <tr style="font-weight: bold">
                <td style="width: 60px; text-align: left;">III.</td>
                <td colspan="5">IDENTITAS RANMOR</td>
            </tr>

            <tr>
                <td></td>
                <td style="width: 60px; text-align: left;">a.</td>
                <td>Merk</td>
                <td style="padding-left: 5px; padding-right: 5px;">:</td>
                <td style="width: 45%"></td>
            </tr>
            <tr>
                <td></td>
                <td style="width: 60px; text-align: left;">b.</td>
                <td>Tipe</td>
                <td style="padding-left: 5px; padding-right: 5px;">:</td>
                <td style="width: 45%"></td>
            </tr>
            <tr>
                <td></td>
                <td style="width: 60px; text-align: left;">c.</td>
                <td>Jenis</td>
                <td style="padding-left: 5px; padding-right: 5px;">:</td>
                <td style="width: 45%"></td>
            </tr>
            <tr>
                <td></td>
                <td style="width: 60px; text-align: left;">d.</td>
                <td>Model</td>
                <td style="padding-left: 5px; padding-right: 5px;">:</td>
                <td style="width: 45%"></td>
            </tr>
            <tr>
                <td></td>
                <td style="width: 60px; text-align: left;">e.</td>
                <td>Tahun Pembuatan</td>
                <td style="padding-left: 5px; padding-right: 5px;">:</td>
                <td style="width: 45%"></td>
            </tr>
            <tr>
                <td></td>
                <td style="width: 60px; text-align: left;">f.</td>
                <td>Isi Silinder/Daya Listrik</td>
                <td style="padding-left: 5px; padding-right: 5px;">:</td>
                <td style="width: 45%"></td>
            </tr>
            <tr>
                <td></td>
                <td style="width: 60px; text-align: left;">g.</td>
                <td>Nomor Rangka / VIN</td>
                <td style="padding-left: 5px; padding-right: 5px;">:</td>
                <td style="width: 45%"></td>
            </tr>
            <tr>
                <td></td>
                <td style="width: 60px; text-align: left;">h.</td>
                <td>Nomor Mesin</td>
                <td style="padding-left: 5px; padding-right: 5px;">:</td>
                <td style="width: 45%"></td>
            </tr>
            <tr>
                <td></td>
                <td style="width: 60px; text-align: left;">i.</td>
                <td>Bahan Bakar/Sumber Energi</td>
                <td style="padding-left: 5px; padding-right: 5px;">:</td>
                <td style="width: 45%"></td>
            </tr>
            <tr>
                <td></td>
                <td style="width: 60px; text-align: left;">j.</td>
                <td>Warna TNKB</td>
                <td style="padding-left: 5px; padding-right: 5px;">:</td>
                <td style="width: 45%"></td>
            </tr>
            <tr>
                <td></td>
                <td style="width: 60px; text-align: left;">k.</td>
                <td>Tahun Registrasi</td>
                <td style="padding-left: 5px; padding-right: 5px;">:</td>
                <td style="width: 45%"></td>
            </tr>
            <tr>
                <td></td>
                <td style="width: 60px; text-align: left;">l.</td>
                <td>No. BPKB</td>
                <td style="padding-left: 5px; padding-right: 5px;">:</td>
                <td style="width: 45%"></td>
            </tr>
            <tr>
                <td></td>
                <td style="width: 60px; text-align: left;">m.</td>
                <td>Kode Lokasi</td>
                <td style="padding-left: 5px; padding-right: 5px;">:</td>
                <td style="width: 45%"></td>
            </tr>
            <tr>
                <td></td>
                <td style="width: 60px; text-align: left;">n.</td>
                <td>No. Urut Pendaftaran</td>
                <td style="padding-left: 5px; padding-right: 5px;">:</td>
                <td style="width: 45%"></td>
            </tr>
            <!-- end identitas pemilik -->
        </table>
        <div style="width: 100%; height: 1px; border-top: 1pt solid black; margin-top: 10px; margin-bottom: 10px"></div>
        <table width="100%">
            <tr style="font-weight: bold">
                <td style="width: 60px; text-align: left;">IV.</td>
                <td colspan="5">KELENGKAPAN KENDARAAN</td>
            </tr>
        </table>
        <table style="width: 100%; margin-bottom: 20px;" class="kelengkapan">
            <tr>
                <td style="width: 10mm">NO.</td>
                <td style="width: 25mm">ITEM YG DIPERIKSA</td>
                <td style="width: 14mm">SIMBOL</td>
                <td style="width: 14mm">BAIK</td>
                <td style="width: 14mm">TIDAK BAIK</td>
                <td style="width: 14mm">TIDAK ADA</td>
                <td style="width: 10mm">NO.</td>
                <td style="width: 25mm">ITEM YG DIPERIKSA</td>
                <td style="width: 14mm">SIMBOL</td>
                <td style="width: 14mm">BAIK</td>
                <td style="width: 14mm">TIDAK BAIK</td>
                <td style="width: 14mm">TIDAK ADA</td>
            </tr>

            <tr>
                <td>1.</td>
                <td style="text-align: left;">Fungsi Rem</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>9.</td>
                <td style="text-align: left;">Sabuk Pengaman</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>2.</td>
                <td style="text-align: left;">Kondisi Rem</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>10.</td>
                <td style="text-align: left;">Fungsi Wiper(Mobil)</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>3.</td>
                <td style="text-align: left;">Fungsi Lampu-lampu</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>11.</td>
                <td style="text-align: left;">P3K</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>4.</td>
                <td style="text-align: left;">Kondisi Gas Buang</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>12.</td>
                <td style="text-align: left;">Dongkrak</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>5.</td>
                <td style="text-align: left;">Kondisi Spion</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>13.</td>
                <td style="text-align: left;">Segitiga Pengaman</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>6.</td>
                <td style="text-align: left;">Kondisi Ban</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>14.</td>
                <td style="text-align: left;">Kondisi Ban Serep(Mobil)</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>7.</td>
                <td style="text-align: left;">Speedometer</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>15.</td>
                <td style="text-align: left;">Lampu Pemberi Isyarat(Sein)</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style="height: 10mm">8.</td>
                <td style="text-align: left;">Klakson</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>16.</td>
                <td style="text-align: left;">Lain-lain</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>
        <table style="width: 100%;">
            <tr>
                <td style="width: 60%; vertical-align: top;">
                    <table width="100%" class="table-lain-lain">
                        <tr style="font-weight: bold">
                            <td style="width: 60px; text-align: left;">V.</td>
                            <td colspan="5">LAIN-LAIN</td>
                        </tr>

                        <tr>
                            <td></td>
                            <td style="width: 5%; text-align: left;">a.</td>
                            <td style="width: 30%">Handle Porsneling</td>
                            <td style="width: 5%">:</td>
                            <td style="width: 30%">Baik</td>
                            <td style="width: 30%">Tidak Baik</td>
                        </tr>

                        <tr>
                            <td></td>
                            <td>b.</td>
                            <td>Kopling</td>
                            <td>:</td>
                            <td>Baik</td>
                            <td>Tidak Baik</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>c.</td>
                            <td>Shock Breaker</td>
                            <td>:</td>
                            <td>Baik</td>
                            <td>Tidak Baik</td>
                        </tr>
                    </table>
                </td>
                <td style="width: 40%; vertical-align: top; border: 1px solid black;">
                    <table style="width: 100%;">
                        <tr>
                            <td style="border-bottom: 1px solid black;">
                                <table style="width: 100%; padding: 10px;">
                                    <tr>
                                        <td style="width: 30mm; padding-bottom: 10px">Ditetapkan di</td>
                                        <td>:</td>
                                        <td>...........................................</td>
                                    </tr>
                                    <tr>
                                        <td>Pada Tanggal</td>
                                        <td>:</td>
                                        <td>...........................................</td>
                                    </tr>
                                </table>

                            </td>
                        </tr>

                        <tr>
                            <td style="text-decoration: underline; text-align: center; vertical-align: bottom; padding-bottom: 5px;">
                                <br><br><br><br>
                                ........................................................
                                <br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </table>
    <!-- end berita acara -->
</body>
</html>