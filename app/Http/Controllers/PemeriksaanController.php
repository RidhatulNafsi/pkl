<?php

namespace App\Http\Controllers;

use App\Models\Ppk;
use App\Models\Tbl_ppk;
use App\Models\Tbl_Transaksi;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use NumberToWords\Legacy\Numbers\Words as NumbersWords;
use NumberToWords\NumberToWords;
use NumberToWords\LegacyNumberToWords\Converter\Words;

class PemeriksaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('penyuratan.pemeriksaan.index', ['dataTransaksi' => Tbl_Transaksi::where('status', 2)->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
        return view('penyuratan.pemeriksaan.create',['dataTransaksi'=>Tbl_Transaksi::find($id),
        'DataPpk'=>Tbl_ppk::all(),
    ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,string $id)
    {
       $validateData = $request->validate(
            [
                'no_dpa' => 'required',
                'tgl_dpa' => 'required',
                'id_ppk' => 'required',
            ]
        );
        //dd($validateData);
        $simpan= Tbl_Transaksi::where('id_transaksi',$id)->update($validateData);
        if ($simpan) {
            return redirect('admin/pemeriksaan')->with('success','Data surat pemeriksaan berhasil ditambahakan');
        } else {
            return redirect('admin/pemeriksaan')->with('error','Data gagal ditambahkan');
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
        return view('penyuratan.pemeriksaan.edit',[
            'dataTransaksi'=>Tbl_Transaksi::find($id),
            'DataPpk'=>Tbl_ppk::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData = $request->validate(
            [
                'no_dpa' => 'required',
                'tgl_dpa' => 'required',
                'id_ppk' => 'required',
            ]
        );
        //dd($validateData);
        $simpan= Tbl_Transaksi::where('id_transaksi',$id)->update($validateData);
        if ($simpan) {
            return redirect('admin/pemeriksaan')->with('success','Data surat pemeriksaan berhasil diperbarui');
        } else {
            return redirect('admin/pemeriksaan')->with('error','Data surat pemeriksaan gagal diperbarui');
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

        $DataPemesanan = Tbl_Transaksi::with('kegiatan')->find($id);
        $Waktu = Carbon::parse($DataPemesanan['tgl_dpa'])->locale('id');
        $WaktuSuratPemesanan = Carbon::parse($DataPemesanan['tgl_surat_pesanan'])->locale('id');
        $WaktuSk = Carbon::parse($DataPemesanan->ppk->tanggal_terbit_sk)->locale('id');


        $tanggalPemeriksaan = Carbon::parse($DataPemesanan['tgl_dpa']);
        $tanggalSaja = $tanggalPemeriksaan->day; // Mengambil tanggalnya saja
        $tahun = $tanggalPemeriksaan->year;
        // Konversi ke integer
        $tanggalInteger = (int)$tanggalSaja;
        $tahunInteger = (int)$tahun;

        $numberToWords = new NumberToWords();

        // build a new number transformer using the RFC 3066 language identifier
        $tanggalTerbilang = $numberToWords->getNumberTransformer('id')->toWords($tanggalInteger);
        $TanggalTerbilang = htmlspecialchars(ucwords($tanggalTerbilang));


        $tahunTerbilang=$numberToWords->getNumberTransformer('id')->toWords($tahunInteger);
        $TahunTerbilang = htmlspecialchars(ucwords($tahunTerbilang));


        ///dd($DataPemesanan,$Waktu,$tanggalTerbilang,$tahunTerbilang);

        /* return view('penyuratan.pemeriksaan.output',[
            'dataPemesanan' => $DataPemesanan,
            'waktu' => $Waktu,
            'waktuSk'=>$WaktuSk,
            'waktuSuratPemesanan'=>$WaktuSuratPemesanan,
            'tanggal'=>$TanggalTerbilang,
            'tahun'=>$TahunTerbilang
        ]); */

        $pdf = PDF::loadView('penyuratan.pemeriksaan.output',[
            'dataPemesanan' => $DataPemesanan,
            'waktu' => $Waktu,
            'waktuSk'=>$WaktuSk,
            'waktuSuratPemesanan'=>$WaktuSuratPemesanan,
            'tanggal'=>$TanggalTerbilang,
            'tahun'=>$TahunTerbilang
        ])->setPaper(array(0,0,609.4488,935.433), 'portrait');

        ///dd($pdf);

        Tbl_Transaksi::where('id_transaksi', $id)->update(['status' => 3]);
        return $pdf->stream('admin/Pemeriksaan '.$DataPemesanan['no_surat_pesanan'] . '.pdf', ['Attachment' => false]);
        exit(0);
    }
}
