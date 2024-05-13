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
            width: 25px;
            font-weight: normal;
            vertical-align: top;
        }

        .ppk td{
            text-align: justify;
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
            <p><b><u>BERITA ACARA PEMBAYARAN</u></b></p>
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
                <td>{{ $dataPembayaran->pekerjaan->nama_pekerjaan }}</td>
            </tr>
            <tr>
                <th style="vertical-align: text-top">Kegiatan</th>
                <td style="vertical-align: text-top; width:3%">:</td>
                <td>{{ $dataPembayaran->kegiatan->nama_kegiatan }}</td>
            </tr>
            <tr>
                <th style="vertical-align: text-top">Sub Kegiatan</th>
                <td style="vertical-align: text-top; width:3%">:</td>
                <td>{{ $dataPembayaran->sub_kegiatan->nama_sub_kegiatan }}</td>
            </tr>
            <tr>
                <th style="vertical-align: text-top">Lokasi</th>
                <td style="vertical-align: text-top; width:3%">:</td>
                <td>Kota Padang</td>
            </tr>
            <tr>
                <th style="vertical-align: text-top">DPA SKPD</th>
                <td style="vertical-align: text-top">:</td>
                <td>{{ $dataPembayaran->no_dpa }}</td>
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
                <th>1.</th>
                <td><b>{{$dataPembayaran->pa->nama_pa}}</b> Jabatan Kepala Dinas Komunikasi dan Informatika Kota Padang selaku Pengguna Anggaran, alamat Komplek Balaikota Padang Lt.3 -  Aie Pacah Padang selanjutnya disebut <b>“Pihak Pertama”.</b></td>
            </tr>
            <tr>
                <th>2.</th>
                <td><b>{{$dataPembayaran->mitra->nama_perwakilan}}</b> yang bertindak untuk dan atas  nama {{Str::title($dataPembayaran->mitra->nama_perusahaan)}} yang berkedudukan di {{$dataPembayaran->mitra->alamat_perusahaan}} selanjutnya disebut <b>“Pihak Kedua”.</b></td>
            </tr>
        </table>
        <p>Berdasarkan  Surat Pesanan Nomor: {{ $dataPembayaran->no_surat_pesanan }} Tanggal {{ $waktuSuratPemesanan->translatedFormat('j F Y') }} perihal pekerjaan {{ $dataPembayaran->pekerjaan->nama_pekerjaan }}, Sub Kegiatan {{$dataPembayaran->sub_kegiatan->nama_sub_kegiatan}}, Dinas Kominfo Kota Padang dengan Penyedia {{Str::title($dataPembayaran->mitra->nama_perusahaan)}}, sebagai berikut :</p>
        <p style="margin-bottom: 0px">Bahwa pengadaan kontrak pekerjaan {{ $dataPembayaran->pekerjaan->nama_pekerjaan }}, tersebut telah memenuhi syarat sesuai dengan jadwal.</p>
        <p style="margin-top: 0px">Berdasarkan Surat Pesanan maka pihak penyedia jasa telah berhak menerima pembayaran sebesar <b>Rp {{$nominal}},- ({{$nominalTerbilang}} rupiah)</b> dengan beban rekening Nomor <b>{{$dataPembayaran->pekerjaan->kode_rekening}}</b> {{ $dataPembayaran->pekerjaan->nama_pekerjaan }} DPA SKPD Dinas Kominfo Kota Padang.</p>
        <p>Demikian Berita Acara ini kami perbuat dengan sebenarnya untuk dapat dipergunakan seperlunya.</p>
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
                                <b>Pihak Kedua</b>
                                <p style="margin: 0px 0px 90px 0px;">
                                    {{Str::title($dataPembayaran->mitra->nama_perusahaan)}}
                                </p>
                                <u>{{$dataPembayaran->mitra->nama_perwakilan}}</u><br>
                                {{$dataPembayaran->mitra->jabatan_perwakilan}}
                            </td>
                            <td style="vertical-align: top;">
                                <b>Pihak Pertama</b>
                                <p style="margin: 0px 0px 90px 0px;">PA Diskominfo Kota Padang</p>
                                <u>{{$dataPembayaran->pa->nama_pa}}</u><br>
                                NIP.{{$dataPembayaran->pa->nip_pa}}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </main>
</body>

</html>
