<?php

namespace App\Http\Controllers;

use App\Models\Tbl_barang;
use App\Models\Tbl_kabid;
use App\Models\Tbl_kegiatan;
use App\Models\Tbl_mitra;
use App\Models\Tbl_pekerjaan;
use App\Models\Tbl_pembelian;
use App\Models\Tbl_perihal;
use App\Models\Tbl_sub_kegiatan;
use App\Models\Tbl_Transaksi;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('penyuratan.pemesanan.index', ['dataTransaksi' => Tbl_Transaksi::where('status', 1)->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('penyuratan.pemesanan.create', ['DataPekerjaan' => Tbl_pekerjaan::all(), 'DataMitra' => Tbl_mitra::all(), 'DataKegiatan' => Tbl_kegiatan::all(), 'DataSubkegiatan' => Tbl_sub_kegiatan::all(), 'DataKabid' => Tbl_kabid::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        //dd($data);
        try {
            DB::beginTransaction();
            $transaksi = new Tbl_Transaksi();
            $transaksi->no_surat_pesanan = $data['no_surat_pesanan'];
            $transaksi->tgl_surat_pesanan = $data['tgl_surat_pesanan'];
            $transaksi->id_pekerjaan = $data['id_pekerjaan'];
            $transaksi->id_mitra = $data['id_mitra'];
            $transaksi->id_kegiatan = $data['id_kegiatan'];
            $transaksi->id_sub_kegiatan = $data['id_sub_kegiatan'];
            $transaksi->id_kabid = $data['id_kabid'];
            $transaksi->save();

            // jika di klik tambah Barang akan muncul form Tambah barang
            /* if (count($data['id_barang']) > 0) {
                foreach ($data['id_barang'] as $item => $value) {
                    $barang = [
                        'id_transaksi' => $transaksi->id_transaksi,
                        'id_barang' => $data['id_barang'][$item],
                        'satuan' => $data['satuan'][$item],
                        'jumlah' => $data['jumlah'][$item],
                    ];
                    Tbl_pembelian::create($barang);
                }
            }  */
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect('admin/pemesanan')->with('error', $th->getMessage());
        }
        return redirect('admin/pemesanan')->with('success', 'Data Berhasil Disimpan');
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
        // Mengambil data pembelian berdasarkan id_transaksi dari transaksi
        return view('penyuratan.pemesanan.edit', [
            'dataPemesanan' => Tbl_Transaksi::find($id),
            'DataPekerjaan' => Tbl_pekerjaan::all(),
            'DataMitra' => Tbl_mitra::all(),
            'DataKegiatan' => Tbl_kegiatan::all(),
            'DataSubkegiatan' => Tbl_sub_kegiatan::all(),
            'DataKabid' => Tbl_kabid::all(),
            'DataBarang' => Tbl_barang::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $transaksi = Tbl_Transaksi::with('pembelian')->find($id);
        Tbl_pembelian::where('id_transaksi', $id)->delete();
        $data = $request->all();
        //dd($data);
        try {
            DB::beginTransaction();

            $transaksi->update([
                'no_surat_pesanan' => $data['no_surat_pesanan'],
                'tgl_surat_pesanan' => $data['tgl_surat_pesanan'],
                'id_pekerjaan' => $data['id_pekerjaan'],
                'id_mitra' => $data['id_mitra'],
                'id_kegiatan' => $data['id_kegiatan'],
                'id_sub_kegiatan' => $data['id_sub_kegiatan'],
                'id_kabid' => $data['id_kabid'],
            ]);

            /* if (count($data['id_barang']) > 0) {
                foreach ($data['id_barang'] as $item => $value) {
                    $barang = [
                        'id_transaksi' => $transaksi->id_transaksi,
                        'id_barang' => $data['id_barang'][$item],
                        'satuan' => $data['satuan'][$item],
                        'jumlah' => $data['jumlah'][$item],
                    ];
                    Tbl_pembelian::create($barang);
                }
            } */
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect('admin/pemesanan')->with('error', $th->getMessage());
        }
        return redirect('admin/pemesanan')->with('success', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Tbl_pembelian::where('id_transaksi', $id)->delete();
        $simpan = Tbl_Transaksi::destroy($id);
        if ($simpan) {
            return redirect('admin/pemesanan')->with('success', 'Data Berhasil Dihapus');
        } else {
            return redirect('admin/pemesanan')->with('error', 'Data Gagal Dihaput');
        }
    }

    public function cetak(string $id)
    {
        //set_time_limit(180);
        $DataPemesanan = Tbl_Transaksi::find($id);
        $Tanggal = Carbon::parse($DataPemesanan['tgl_surat_pesanan'])->locale('id');
        /* return view('penyuratan.pemesanan.output',[
            'dataPemesanan' => $DataPemesanan,
            'tanggal' => $Tanggal
        ]); */
        ///setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->
        $pdf = PDF::loadView('penyuratan.pemesanan.output', [
            'dataPemesanan' => $DataPemesanan,
            'tanggal' => $Tanggal,
        ])->setPaper(array(0,0,609.4488,935.433), 'portrait');
        //return $pdf->download($DataPemesanan['no_surat_pesanan'].'.pdf');
        Tbl_Transaksi::where('id_transaksi', $id)->update(['status' => 2]);
        return $pdf->stream('Pemesanan '.$DataPemesanan['no_surat_pesanan'] . '.pdf', ['Attachment' => false]);

        //dd($pdf);
    }
}
