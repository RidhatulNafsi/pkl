<!DOCTYPE html>
<html lang="en">
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        header{
            width: 100%;

        }

        .kop{
            text-align: center;
            letter-spacing: normal;
            line-height: 0em;
            font-family: 'Times New Roman';
        }

        img{
            height: 65pt;
            width: auto;
            margin-left: 25px;
            margin-right: 20px;
        }

        .kepala{
            font-size: 12pt;
            font-family: Arial;
            width: 100%;
        }

        .kepala td {
            vertical-align: top; /* Agar teks berada di bagian atas sel */
        }

        th{
            text-align: left;
        }

        .isi{
            margin-left: 67pt;
            text-align: justify;

        }

        .ttd{
            float: right;
            margin-top: 30px
        }

        .ttd,table{
            text-align: center
        }

       ul {
            position: relative;
            list-style: none;
            margin-left: 10;
            padding-left: 1.2em;
        }
        ul li:before {
            content: "-";
            position: absolute;
            left: 0;
        }

        .item-barang{
            margin-left: 35pt;
            margin-top: 0px;
        }

        @page :first {
                margin-top: 0.36in; /* margin-top for first page */
                margin-left: 0.98in;
                margin-right: 0.67in;
                margin-bottom: 0.39in;
            }

            @page {
                margin-top: 1.5in; /* margin-top for subsequent pages */
                margin-left: 0.98in;
                margin-right: 0.67in;
                margin-bottom: 0.39in;
            }

    </style>
</head>
<body>
    <header>
        <table class="kop">
        <tr>
            <td style="width: 40%;"><img src="{{ public_path('images/logo.jpg') }}" alt="" width="auto"
                height="75pt"></td>
            <td style="width: auto;" ><p style="font-size: 16pt;"><b>PEMERINTAH KOTA PADANG</b></p>
                <p style="font-size: 18pt;"><b>DINAS KOMUNIKASI DAN INFORMATIKA</b></p>
                <p style="font-size: 12pt;">Jalan Bagindo Aziz Chan No. 1 Air Pacah, Padang, Sumatera Barat</p>
                <p style="font-size: 12pt;">Kode Pos: 25176</p>
            </td>
            <td style="width: 10%"></td>
        </tr>
        </table>
        <hr style="border-top: 1pt solid #000000; margin-bottom: 3px; margin-top: 0px">
        <hr style="border-top: 3pt solid #000000;  margin-top: 0">
    </header>
    <main>
        <table class="kepala">
            <tr>
                <td>
                    <table style="text-align: left" >
                        <tr>
                            <th>Nomor</th>
                            <td>:</td>
                            <td>{{$dataPemesanan->no_surat_pesanan}}</td>
                        </tr>
                        <tr>
                            <th>Lampiran</th>
                            <td>:</td>
                            <td>--</td>
                        </tr>
                        <tr>
                            <th>Perihal</th>
                            <td>:</td>
                            <td><b>{{$dataPemesanan->pekerjaan->nama_pekerjaan}}</b></td>
                        </tr>
                    </table>
                </td>
                <td>
                    <p style="margin-top: 0; text-align: right">Padang, {{$tanggal->translatedFormat('d F Y')}}</p>
                </td>
            </tr>
        </table>
        <div class="isi" >
            <p>Yth.</p>
            <p>Sdr. <b>{{$dataPemesanan->mitra->jabatan_perwakilan}} {{$dataPemesanan->mitra->nama_perusahaan}}</b></p>
            <p>di</p>
            <p>Padang</p>
            <p>Dengan Hormat,</p>
            <p>Dalam rangka pelaksanaan Program Aplikasi Informatika {{$dataPemesanan->kegiatan->nama_kegiatan}} Sub Kegiatan {{$dataPemesanan->sub_kegiatan->nama_sub_kegiatan}}, kami melaksanakan {{$dataPemesanan->pekerjaan->nama_perihal}}, berupa :</p>
            <div class="item-barang" style="page-break-after: auto">
                <ul style="margin-top: 10px; margin-bottom: 10px;">
                    @foreach ($dataPemesanan->pembelian as $item)
                        <li>{{$item->jumlah}} {{$item->satuan->nama_satuan}} {{$item->barang->nama_barang}}</li>
                    @endforeach
                </ul>
            </div>
            <div class="penutup">
                <p>Untuk itu diminta kepada Saudara agar dapat menyediakan barang tersebut di atas.</p>
                <p>Demikian kami sampaikan, atas kerjasamanya diucapkan terima kasih.</p>
            </div>
        </div>
        <div class="ttd">
            <table>
                <tr>
                    <td>Kepala Bidang {{$dataPemesanan->kabid->bidang_kabid}},</td>
                </tr>
                <tr>
                    <td style="height: 90px">

                    </td>
                </tr>
                <tr>
                    <td><u>{{$dataPemesanan->kabid->nama_kabid}}</u><br>
                        NIP. {{$dataPemesanan->kabid->nip_kabid}}
                    </td>
                </tr>
            </table>
        </div>
    </main>

</body>
</html>
