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
            text-align: left;
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
            background-color: #D3D3D3;
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
            margin-top: 0px;
            margin-bottom: 0px;
        }

        li {
            margin-top: 0px;
            margin-bottom: 0px;
        }

        ul li:before {
            content: "-";
            position: absolute;
            left: 0;
        }

        @page :first {
            margin-top: 0.36in;
            /* margin-top for first page */
            margin-left: 0.98in;
            margin-right: 0.67in;
            margin-bottom: 0.39in;
        }

        @page {
            margin-top: 1.5in;
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
                <td style="width: 40%;"><img src="{{ public_path('images/logo.jpg') }}" alt="" width="auto"
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
            <p><b><u>BERITA ACARA PEMERIKSAAN BARANG</u></b></p>
            <p><b>Nomor : 919.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/Diskominfo-Pdg/2024</b></p>
        </div>
        <table class="kepala">
            <tr>
                <th style="vertical-align: text-top">Satuan Kerja</th>
                <td style="vertical-align: text-top; width:3%">:</td>
                <td>Dinas Komunikasi dan Informatika Kota Padang</td>
            </tr>
            <tr>
                <th style="vertical-align: text-top">Pekerjaan</th>
                <td style="vertical-align: text-top; width:3%">:</td>
                <td>{{ $dataPemesanan->pekerjaan->nama_pekerjaan }}</td>
            </tr>
            <tr>
                <th style="vertical-align: text-top">Kegiatan</th>
                <td style="vertical-align: text-top; width:3%">:</td>
                <td>
                    {{$dataPemesanan->kegiatan->nama_kegiatan}}
                </td>
            </tr>
            
            <tr>
                <th style="vertical-align: text-top">Sub Kegiatan</th>
                <td style="vertical-align: text-top; width:3%">:</td>
                <td>{{ $dataPemesanan->sub_kegiatan->nama_sub_kegiatan }}</td>
            </tr>
            <tr>
                <th style="vertical-align: text-top">Lokasi</th>
                <td style="vertical-align: text-top; width:3%">:</td>
                <td>Kota Padang</td>
            </tr>
            <tr>
                <th style="vertical-align: text-top">DPA SKPD</th>
                <td style="vertical-align: text-top">:</td>
                <td>{{ $dataPemesanan->no_dpa }}</td>
            </tr>
        </table>
        <hr style="border-top: 1pt solid #000000; margin-bottom: 3px; margin-top: 0px">
        <hr style="border-top: 3pt solid #000000;  margin-top: 0">
        <p>Pada hari ini <b>{{ $waktu->translatedFormat('l') }}</b> Tanggal <b>{{ $tanggal }}</b> bulan
            <b>{{ $waktu->translatedFormat('F') }}</b> tahun <b>{{ $tahun }}</b>, kami yang
            bertanda tangan di bawah ini:
        </p>
        <table class="ppk">
            <tr>
                <th>Nama</th>
                <td>:</td>
                <td><b>{{ $dataPemesanan->ppk->nama_ppk }}</b></td>
            </tr>
            <tr>
                <th>Jabatan</th>
                <td>:</td>
                <td>Pejabat Pembuat Komitmen</td>
            </tr>
        </table>
        <p>Berdasarkan Surat Keputusan Kepala Dinas Kominfo Kota Padang Nomor {{ $dataPemesanan->ppk->nomor_sk }} Tahun
            {{ $dataPemesanan->ppk->tahun_sk }} tanggal {{ $waktuSk->translatedFormat('j F Y') }}
            tentang Penetapan Pejabat Pembuat Komitmen Dinas Kominfo Kota Padang, selaku Pejabat Pembuat Komitmen telah
            memeriksa dan menerima pekerjaan sebagaimana yang diserahkan oleh
            <b>{{ $dataPemesanan->mitra->nama_perusahaan }}</b> yaitu
            :
        </p>
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
                            @foreach ($dataPemesanan->pembelian as $item)
                                <li>{{ $item->barang->nama_barang }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td align="center">
                        <br>
                        @foreach ($dataPemesanan->pembelian as $item)
                            <p style="margin: 0px;">{{ $item->satuan->nama_satuan }}</p>
                        @endforeach
                    </td>
                    <td align="center">
                        <br>
                        @foreach ($dataPemesanan->pembelian as $item)
                            <p style="margin: 0px;">{{ $item->jumlah }}</p>
                        @endforeach
                    </td>
                    <td align="center">
                        <br>
                        @foreach ($dataPemesanan->pembelian as $item)
                            <p style="margin: 0px;">Valid</p>
                        @endforeach
                    </td>
                </tr>
            </tbody>
        </table>
        <p>
            Berdasarkan Surat Pesanan Nomor : {{ $dataPemesanan->no_surat_pesanan }} Tanggal
            {{ $waktuSuratPemesanan->translatedFormat('j F Y') }}, perihal pekerjaan
            {{ $dataPemesanan->pekerjaan->nama_pekerjaan }} dengan kesimpulan sebagai berikut :
        </p>
        <p style="text-align: center">
            <b>
                Semua barang dalam keadaan baik dan lengkap sesuai dengan Surat Pesanan
            </b>
        </p>
        <p>
            Demikian Berita Acara ini kami perbuat dengan sebenarnya untuk dapat dipergunakan seperlunya.
        </p>
        <table style="width: 100%;">
            <tr style="">
                <td style="">
                    <p style="text-align: right; margin: 0;">Padang, tanggal tersebut di atas</p>
                </td>
            </tr>
            <tr>
                <td>
                    <table style="width: 100%;">
                        <tr style="text-align: center;">
                            <td style="vertical-align: top;">
                                <p style="margin: 0;">Yang Menyerahkan</p>
                            </td>
                            <td style="vertical-align: top;"></td>
                        </tr>
                        <tr style="text-align: center;">
                            <td style="vertical-align: top;">
                                <p style="margin: 0px 0px 90px 0px;">{{Str::title($dataPemesanan->mitra->nama_perusahaan)}}</p>
                                <u>{{ $dataPemesanan->mitra->nama_perwakilan }}</u><br>
                                {{ $dataPemesanan->mitra->jabatan_perwakilan }}
                            </td>
                            <td style="vertical-align: top;">
                                <p style="margin: 0px 0px 90px 0px;">PPK Diskominfo Padang</p>
                                <u>{{ $dataPemesanan->ppk->nama_ppk }}</u><br>
                                NIP. {{ $dataPemesanan->ppk->nip_ppk }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

    </main>
</body>

</html>
