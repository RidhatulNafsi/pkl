<?php

namespace App\Http\Controllers;

use App\Models\Tbl_satuan;
use Illuminate\Http\Request;

class satuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Datasatuan= Tbl_satuan::all();
       return view('data_master.satuan.index',['datasatuan'=>$Datasatuan]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('data_master.satuan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData=$request->validate([
            'nama_satuan'=>'required',
            
        ]);
        /// perlu pengaturan Kapital/tidak?
        $simpan= Tbl_satuan::create($validateData);
        if ($simpan){
            return redirect('admin/satuan')->with('success','Data Berhasil Disipmpan');
        }else{
            return redirect('admin/satuan')->with('error','Data Gagal Disimpan');
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
        return view('data_master.satuan.edit',['datasatuan' => Tbl_satuan::find($id)]);
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
