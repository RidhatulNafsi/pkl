<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tbl_Transaksi;
use Illuminate\Support\Carbon;
use NumberToWords\NumberToWords;
use Barryvdh\DomPDF\Facade\Pdf as PDF;


class serahterimaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('penyuratan.serah_terima.index', ['dataTransaksi' => Tbl_Transaksi::where('status', 4)->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,string $id)
    {
       //

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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
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

        $DataSerahTerima = Tbl_Transaksi::find($id);
        $DataPemesanan= Tbl_Transaksi::find($id);
        $DataPembayaran = Tbl_Transaksi::find($id);
        $numberToWords = new NumberToWords();

        $Hari_dpa = Carbon::parse($DataSerahTerima['tgl_dpa'])->locale('id');
        $Tanggal_dpa=$Hari_dpa->day;
        $Tanggal_dpa_terbilang=(int)$Tanggal_dpa;
        $Tanggal_dpa_terbilang= $numberToWords->getNumberTransformer('id')->toWords($Tanggal_dpa_terbilang);
 
        $Bulan_dpa = Carbon::parse($DataSerahTerima['tgl_dpa'])->locale('id');
        $Bulan_dpa_terbilang= $Bulan_dpa;
        
 
        $Tahun_dpa = Carbon::parse($DataSerahTerima['tgl_dpa'])->locale('id');
        $Tahun_dpa=$Tahun_dpa->year;
        $Tahun_dpa_terbilang=(int)$Tahun_dpa;
        $Tahun_dpa_terbilang= $numberToWords->getNumberTransformer('id')->toWords($Tahun_dpa_terbilang);
         
         
 
 
        /*  $tanggalPemeriksaan = Carbon::parse($DataPembayaran['tgl_dpa']);
         $WaktuSuratPemesanan = Carbon::parse($DataPembayaran['tgl_surat_pesanan'])->locale('id');
 
         //ambil tanggal
         $tanggalSaja = $WaktuSuratPemesanan->day;
         //ambil tahun
         $tahun = $tanggalPemeriksaan->year;
         // Konversi ke integer
         $tanggalInteger = (int) $tanggalSaja;
         $tahunInteger = (int) $tahun;
 
         
 
         // build a new number transformer using the RFC 3066 language identifier
         $tanggalTerbilang = $numberToWords->getNumberTransformer('id')->toWords($tanggalInteger);
         $TanggalTerbilang = htmlspecialchars(ucwords($tanggalTerbilang));
 
         $tahunTerbilang = $numberToWords->getNumberTransformer('id')->toWords($tahunInteger);
         $TahunTerbilang = htmlspecialchars(ucwords($tahunTerbilang)); */
 
         //nominal & terbilang
         //angka saja
         $Nominal = number_format($DataPembayaran['jumlah'], 0, ',', '.'); // Ubah format menjadi "100.000,00"
         //terbilang
         $NominalTerbilang= $numberToWords->getNumberTransformer('id')->toWords($DataPembayaran['jumlah']);
         $NominalTerbilang=ucfirst($NominalTerbilang);
  
 
         $pdf = PDF::loadView('penyuratan.serah_terima.output', [
             'dataSerahTerima' => $DataSerahTerima,
             'dataPemesanan' => $DataPemesanan,
             'hari'=>$Hari_dpa,
             'tanggal_dpa_terbilang'=>ucwords($Tanggal_dpa_terbilang),
             'bulan_dpa_terbilang'=>$Bulan_dpa_terbilang,
             'tahun_dpa_terbilang'=>ucwords($Tahun_dpa_terbilang),
             'dataPembayaran' => $DataPembayaran,
             'nominal'=>$Nominal,
             'nominalTerbilang'=>$NominalTerbilang,
         ])->setPaper(array(0,0,609.4488,935.433), 'portrait');
         return $pdf->stream('serah_terima'.$DataSerahTerima['no_surat_pesanan'] . '.pdf', ['Attachment' => false]);
 
    }
}
