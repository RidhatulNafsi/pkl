<!DOCTYPE html>
<html lang="en">

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            text-align: justify;
        }

        header {
            width: 100%;

        }

        .kop {
            text-align: center;
            letter-spacing: normal;
            line-height: 0em;
            font-family: 'Times New Roman';
        }

        img {
            height: 65pt;
            width: auto;
            margin-left: 25px;
            margin-right: 20px;
        }

        main {
            font-family: Arial;
            font-size: 12pt;
        }

        .judul {
            text-align: center;
            line-height: 0.4em;

        }

        .kepala {
            text-align: left;
            width: 100%;
        }

        .kepala th {
            width: 18%;
            font-weight: normal;
        }

        .ppk {
            margin-left: 35px;
            text-align: left;
            width: auto;
        }

        .ppk th {
            width: 18%;
            font-weight: normal;
        }

        .barang {
            width: 100%;
            border-collapse: collapse;
        }

        .barang th {
            background-color: gray;
            text-align: center
        }

        .barang th,
        .barang td {
            border: 1px solid black;
            /* Menambahkan border dengan ketebalan 1px dan warna hitam */
            padding: 8px;
            /* Menambahkan padding agar konten tidak terlalu dekat dengan border */
        }


        ul {
            position: relative;
            list-style: none;
            margin-left: 20px;
            padding-left: 1.2em;

        }

        li {
            margin-top: 15px;
        }

        ul li:before {
            content: "-";
            position: absolute;
            left: 0;
        }

        @page :first {
            margin-top: 10px;
            /* margin-top for first page */
            margin-left: 0.98in;
            margin-right: 0.67in;
            margin-bottom: 0.39in;
        }

        @page {
            margin-top: 150px;
            /* margin-top for subsequent pages */
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
                <td style="width: 40%;"><img src="{{ public_path('images/logo.png') }}" alt="" width="auto"
                        height="75pt"></td>
                <td style="width: auto;">
                    <p style="font-size: 16pt;"><b>PEMERINTAH KOTA PADANG</b></p>
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
        <div class="judul">
            <p><b><u>BERITA ACARA SERAH TERIMA BARANG</u></b></p>
            <p><b>Nomor : 919.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/Diskominfo-Pdg/2024</b></p>
        </div>
        <table class="kepala">
            <tr>
                <th>Satuan Kerja</th>
                <td>:</td>
                <td>Dinas Komunikasi dan Informatika Kota Padang</td>
            </tr>
            <tr>
                <th>Pekerjaan</th>
                <td>:</td>
                <td>Belanja Modal Peralatan Jaringan</td>
            </tr>
            <tr>
                <th>Kegiatan</th>
                <td>:</td>
                <td>Pengelolaan Nama Domain yang Telah Ditetapkan oleh Pemerintah Pusat dan Sub Domain di Lingkup
                    Pemerintah Daerah Kabupaten/Kota</td>
            </tr>
            <tr>
                <th>Sub Kegiatan</th>
                <td>:</td>
                <td>Penyelenggaraan Sistem Jaringan Intra Pemerintah Daerah</td>
            </tr>
            <tr>
                <th>Lokasi</th>
                <td>:</td>
                <td>Kota Padang</td>
            </tr>
            <tr>
                <th>DPA SKPD</th>
                <td>:</td>
                <td>2.16.03.2.01.0003.5.2.02.10.02.0004</td>
            </tr>
        </table>
        <hr style="border-top: 1pt solid #000000; margin-bottom: 3px; margin-top: 0px">
        <hr style="border-top: 3pt solid #000000;  margin-top: 0">
        <p>Pada hari ini <b>Senin</b> Tanggal <b>Dua Puluh Sembilan</b> bulan <b>Januari</b> tahun <b>Dua Ribu Dua Puluh
                Empat</b>, kami yang
            bertanda tangan di bawah ini:</p>
        <table class="ppk">
            <tr>
                <th>Nama</th>
                <td>:</td>
                <td><b>FAHRINAL, S.Kom</b></td>
            </tr>
            <tr>
                <th>Jabatan</th>
                <td>:</td>
                <td>Pejabat Pembuat Komitmen</td>
            </tr>
        </table>
        <p>Berdasarkan Surat Keputusan Kepala Dinas Kominfo Kota Padang Nomor 04 Tahun 2024 tanggal 2 Januari 2024
            tentang Penetapan Pejabat Pembuat Komitmen Dinas Kominfo Kota Padang, selaku Pejabat Pembuat Komitmen telah
            memeriksa dan menerima pekerjaan sebagaimana yang diserahkan oleh <b>CV. LAKSAMANA MEDIA TEKNOLOGI</b> yaitu
            :</p>
        <table class="barang">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Uraian Pekerjaan</th>
                    <th>Stn</th>
                    <th>Vol</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <tr class="no-border">
                    <td align="center" style="vertical-align: top">1</td>
                    <td>Belanja Modal Peralatan Jaringan
                        <ul>
                            <li>Akses Point Ruijie RG-AP 820 L(V3) Wifi 6</li>
                            <li>Ruijie Switch 5 Port Gigabit Cloud Managed Poe Switch</li>
                        </ul>
                    </td>
                    <td align="center"><br>
                        <p>Unit</p>
                        <p>Unit</p>
                    </td>
                    <td align="center"><br>
                        <p>47</p>
                        <p>20</p>
                    </td>
                    <td align="center"><br>
                        <p>Valid</p>
                        <p>Valid</p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p>
            Berdasarkan Surat PesananNomor : 020.43/Diskominfo-Pdg/2024 Tanggal 25 Januari 2024, perihal pekerjaan
            Belanja Modal Peralatan Jaringan dengan kesimpulan sebagai berikut :
        </p>
        <p style="text-align: center">
            <b>
                Semua barang dalam keadaan baik dan lengkap sesuai dengan Surat Pesanan
            </b>
        </p>
        <p>
            Demikian Berita Acara ini kami perbuat dengan sebenarnya untuk dapat dipergunakan seperlunya.
        </p>
        <table style="width: 100%;line-height: 0em">
            <tr style="">
                <td style="">
                    <p style="text-align: right;">Padang, tanggal tersebut di atas</p>
                </td>
            </tr>
            <tr>
                <table style="width: 100%;">
                    <tr style="text-align: center; line-height: 0em">
                        <td>
                            <p style="margin-bottom: 0px">Yang Menyerahkan</p>
                        </td>
                        <td></td>
                    </tr>
                    <tr style="text-align: center; line-height: unset">
                        <td>
                            <p style="margin-bottom: 100px">CV. Laksamana Media Teknologi</p>
                            <u>M. IQBAL TRIO SUDARMAN, S.Kom</u><br>
                            Direktur

                        </td>
                        <td>
                            <p style="margin-bottom: 100px">PPK Diskominfo Padang</p>
                            <u>FAHRINAL, S.Kom</u><br>
                            NIP. 19710311 200604 1 003

                        </td>
                    </tr>
                </table>
            </tr>
        </table>
    </main>
</body>

</html>
