<?php

namespace App\Http\Controllers;

use App\Models\Tbl_barang;
use App\Models\Tbl_pembelian;
use App\Models\Tbl_satuan;
use App\Models\Tbl_Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SimpanbarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $DataSimpanbarang = Tbl_pembelian::all();
        return view('data_master.barang.index', ['datasimpanbarang' => $DataSimpanbarang]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
        $barang = Tbl_barang::all();
        $satuan = Tbl_satuan::all();
        return view('penyuratan.pemesanan.tambah_barang', ['id_transaksi' => $id, 'dataBarang' => $barang, 'dataSatuan' => $satuan]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            foreach ($request->id_barang as $key => $value) {
                $data = [
                    'id_transaksi' => $request->id_transaksi,
                    'id_barang' => $value,
                    'id_satuan' => $request->id_satuan[$key],
                    'jumlah' => $request->jumlah[$key],
                ];
                Tbl_pembelian::create($data);
            }

            return response()->json([
                'succes' => true,
                'message' => 'Data berhasil disimpan'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'succes' => false,
                'message' => $e->getMessage()
            ]);
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
}
