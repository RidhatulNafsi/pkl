<?php

namespace App\Http\Controllers;

use App\Models\Tbl_pa;
use Illuminate\Http\Request;

class PaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $DataPa= Tbl_pa::all();
        return view('data_master.pa.index',['dataPa'=>$DataPa]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('data_master.pa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData=$request->validate(
            ['nama_pa'=>'required',
            'nip_pa'=>'required',
            'status_pa'=>'required']
        );
        $simpan = Tbl_pa::create($validateData);
        if ($simpan) {
            return redirect('admin/pa')->with('success', 'Data Berhasil Disimpan');
        } else {
            return redirect('admin/pa')->with('error', 'Data Gagal Disimpan');
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
        return view('data_master.pa.edit',['dataPa'=>Tbl_pa::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData = $request->validate(
            [
                'nama_pa' => 'required',
                'nip_pa' => 'required',
                'status_pa' => 'required'
            ]
        );
        $simpan = Tbl_pa::where('id_pa', $id)->update($validateData);
        if ($simpan) {
            return redirect('admin/pa')->with('success', 'Data Berhasil Diperbarui');
        } else {
            return redirect('admin/pa')->with('error', 'Data Gagal Diperbarui');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $simpan = Tbl_pa::destroy($id);
        if ($simpan) {
            return redirect('admin/pa')->with('success', 'Data Berhasil Dihapus');
        } else {
            return redirect('admin/pa')->with('error', 'Data Gagal Dihaput');
        }
    }
}
