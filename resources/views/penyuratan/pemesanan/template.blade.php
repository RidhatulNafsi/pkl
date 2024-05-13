<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body{

        }
        .kop {
            display: inline-flex;
            flex-wrap: wrap;
            align-content: center;
            width: 100%;
            align-self: center
        }

        .logo {
            margin-right: 2pt;
            margin-left: 10%;
        }

        .judul {
            margin-left: 10pt;
            text-align: center;
            font-family: 'Times New Roman';

        }

        .judul p {
            margin: 0; /* Menghapus margin default dari elemen <p> */
        }

        .judul b {
            display: block; /* Membuat teks berada pada baris yang berbeda */
        }

        .awalan {
            margin-top: 0;
            font-family: Arial;
            font-size: 12pt;
            display: flex;
            align-items: baseline; /* Menyesuaikan vertikal alignment dengan baseline */
        }

        .tabel {
            flex: 1;
        }

        .tanggal {
            margin-left: auto; /* Mengatur agar elemen berada di sisi kanan */
            height: auto;
        }
        .isi{
            margin-left: 67pt;
            text-align: justify
        }

        .ttd{
            float: right;
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
            margin-left: 35pt
        }
    </style>
</head>
<body>
    <div class="kop">
        <div class="logo">
            <img src="{{asset('images/logo.png')}}" alt="" width="auto" height="75pt">
        </div>
        <div class="judul">
            <p style="font-size: 16pt;"><b>PEMERINTAH KOTA PADANG</b></p>
            <p style="font-size: 18pt;"><b>DINAS KOMUNIKASI DAN INFORMATIKA</b></p>
            <p style="font-size: 12pt;">Jl. Bagindo Aziz Chan No.1 Aia Pacah, Padang – Sumatera Barat 25176</p>
            <p style="font-size: 12pt;">Laman: <a href="http://www.padang.go.id">http://www.padang.go.id</a></p>
        </div>
        <div style="width: 50p"></div>
        <hr style="border-top: 1pt solid #000000; flex: 0 0 100%; margin-bottom: 1px">
        <hr style="border-top: 3pt solid #000000; flex: 0 0 100%; margin-top: 0">
    </div>
    <div class="awalan">
        <div class="tabel">
            <table style="text-align: left">
                <tr>
                    <th>Nomor</th>
                    <td>:</td>
                    <td>020.81/Diskominfo-Pdg/2024</td>
                </tr>
                <tr>
                    <th>Lampiran</th>
                    <td>:</td>
                    <td>--</td>
                </tr>
                <tr>
                    <th>Perihal</th>
                    <td>:</td>
                    <td><b>Pesanan Belanja ATK</b></td>
                </tr>
            </table>
        </div>
        <div class="tanggal">
            <p>Padang, 05 Februari 2024</p>
        </div>
    </div>
    <div class="isi">
        <p>Yth.</p>
        <p>Sdr. <b>Pimpinan CV. Sanawa Abyakta</b></p>
        <p>di</p>
        <p>Padang</p><br>
        <p>Dengan Hormat,</p><br>
        <p>Dalam rangka pelaksanaan Program Aplikasi Informatika Kegiatan Pengelolaan Nama Domain yang Telah Ditetapkan oleh Pemerintah Pusat dan Sub Domain di Lingkup Pemerintah Daerah Kabupaten/Kota Sub Kegiatan Penyelenggaraan Sistem Jaringan Intra Pemerintah Daerah pada Bidang Infrastruktur Teknologi Informasi, kami melaksanakan Belanja Alat/Bahan untuk Kegiatan Kantor-Alat Tulis Kantor, berupa :</p>
        <div class="item-barang" style="page-break-after: auto">
            <ul>
                <li>4 pak Map Kertas folio isi 50</li>
                <li>2 buah Map File Ordener Bambi</li>
                <li>1 pak Trigonal Clips No. 3</li>
                <li>1 lusin Pulpen Tinta Gel 1.0 mm (Biasa)</li>
                <li>2 buah Hecter No. 10</li>
                <li>1 kotak Isi Hecter No. 10</li>
                <li>3 buku Kwitansi Dinas</li>
            </ul>
        </div>
        <p>Untuk itu diminta kepada Saudara agar dapat menyediakan barang tersebut di atas.</p><br>
        <p>Demikian kami sampaikan, atas kerjasamanya diucapkan terima kasih.</p>
    </div>
    <div class="ttd">
        <table>
            <tr>
                <td>Kepala Bidang Infrastruktur Teknologi Informasi,</td>
            </tr>
            <tr>
                <td style="height: 90px">

                </td>
            </tr>
            <tr>
                <td><u>Agus Diandra, SE</u><br>
                    NIP. 19790810 200501 1 008
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
