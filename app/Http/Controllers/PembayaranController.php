<?php

namespace App\Http\Controllers;

use App\Models\Tbl_pa;
use App\Models\Tbl_Transaksi;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use NumberToWords\NumberToWords;
use Barryvdh\DomPDF\Facade\Pdf as PDF;



class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('penyuratan.pembayaran.index', ['dataTransaksi' => Tbl_Transaksi::where('status', 3)->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
        return view('penyuratan.pembayaran.create', ['dataTransaksi' => Tbl_Transaksi::find($id), 'DataPa' => Tbl_pa::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $id)
{
    $validateData = $request->validate([
        'jumlah' => 'required',
        /* 'no_rekening' => 'required', */
        'id_pa' => 'required',
    ]);

    $simpan = Tbl_Transaksi::where('id_transaksi', $id)->update($validateData);
    if ($simpan) {
        return redirect('admin/pembayaran')->with('success', 'Data surat pembayaran berhasil ditambahkan');
    } else {
        return redirect('admin/pembayaran')->with('error', 'Data gagal ditambahkan');
    }
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('penyuratan.pembayaran.edit', [
            'dataTransaksi' => Tbl_Transaksi::find($id),
            'DataPa' => Tbl_pa::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData = $request->validate([
            'jumlah' => 'required',
           /*  'no_rekening' => 'required', */
            'id_pa' => 'required',
        ]);
        $simpan = Tbl_Transaksi::where('id_transaksi', $id)->update($validateData);
        if ($simpan) {
            return redirect('admin/pembayaran')->with('success', 'Data surat pembayaran berhasil diperbarui');
        } else {
            return redirect('admin/pembayaran')->with('error', 'Data surat pembayaran gagal diperbarui');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function cetak(string $id)
    {
        $DataPembayaran = Tbl_Transaksi::find($id);
        $Waktu = Carbon::parse($DataPembayaran['tgl_dpa'])->locale('id');
        $tanggalPemeriksaan = Carbon::parse($DataPembayaran['tgl_dpa']);
        $WaktuSuratPemesanan = Carbon::parse($DataPembayaran['tgl_surat_pesanan'])->locale('id');

        //ambil tanggal
        $tanggalSaja = $tanggalPemeriksaan->day;
        //ambil tahun
        $tahun = $tanggalPemeriksaan->year;
        // Konversi ke integer
        $tanggalInteger = (int) $tanggalSaja;
        $tahunInteger = (int) $tahun;

        $numberToWords = new NumberToWords();

        // build a new number transformer using the RFC 3066 language identifier
        $tanggalTerbilang = $numberToWords->getNumberTransformer('id')->toWords($tanggalInteger);
        $TanggalTerbilang = htmlspecialchars(ucwords($tanggalTerbilang));

        $tahunTerbilang = $numberToWords->getNumberTransformer('id')->toWords($tahunInteger);
        $TahunTerbilang = htmlspecialchars(ucwords($tahunTerbilang));

        //nominal & terbilang
        $Nominal = number_format($DataPembayaran['jumlah'], 0, ',', '.'); // Ubah format menjadi "100.000,00"
        $NominalTerbilang= $numberToWords->getNumberTransformer('id')->toWords($DataPembayaran['jumlah']);
        $NominalTerbilang=ucfirst($NominalTerbilang);

        /* return view('penyuratan.pembayaran.output', [
            'dataPembayaran' => $DataPembayaran,
            'waktu' => $Waktu,
            'tanggal' => $TanggalTerbilang,
            'tahun' => $TahunTerbilang,
            'waktuSuratPemesanan' => $WaktuSuratPemesanan,
            'nominal'=>$Nominal,
            'nominalTerbilang'=>$NominalTerbilang
        ]); */

        $pdf = PDF::loadView('penyuratan.pembayaran.output', [
            'dataPembayaran' => $DataPembayaran,
            'waktu' => $Waktu,
            'tanggal' => $TanggalTerbilang,
            'tahun' => $TahunTerbilang,
            'waktuSuratPemesanan' => $WaktuSuratPemesanan,
            'nominal'=>$Nominal,
            'nominalTerbilang'=>$NominalTerbilang
        ])->setPaper(array(0,0,609.4488,935.433), 'portrait');
        Tbl_Transaksi::where('id_transaksi', $id)->update(['status' => 4]);
        return $pdf->stream('admin/Pembayaran '.$DataPembayaran['no_surat_pesanan'] . '.pdf', ['Attachment' => false]);

    }
}
