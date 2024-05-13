<?php

namespace App\Http\Controllers;

use App\Models\Tbl_pekerjaan;
use Illuminate\Http\Request;

class PekerjaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Datapekerjaan = Tbl_pekerjaan::all();
        return view('data_master.pekerjaan.index',['datapekerjaan'=>$Datapekerjaan]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('data_master.pekerjaan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData=$request->validate([
            'kode_rekening'=>'required',
            'nama_pekerjaan'=>'required',
            'nama_perihal'=>'required',
            
        ]);
        /// perlu pengaturan Kapital/tidak?
        $simpan= Tbl_pekerjaan::create($validateData);
        if ($simpan){
            return redirect('admin/pekerjaan')->with('success','Data Berhasil Disipmpan');
        }else{
            return redirect('admin/pekerjaan')->with('error','Data Gagal Disimpan');
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
        return view('data_master.pekerjaan.index',['datapekerjaan']);
        $Databarang = Tbl_pekerjaan::all();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData=$request->validate([
            'kode_rekening'=>'required',
            'nama_pekerjaan'=>'required',
            'nama_perihal'=>'required',
    
           ]);
           $simpan = Tbl_pekerjaan::where('id_pekerjaan',$id)->update($validateData);
           if ($simpan){
                return redirect('admin/pekerjaan')-> with('success', 'Data Berhasil Diperbaharui');
           } else{
                return redirect('admin/pekerjaan')-> with('Error', 'Data Gagal Diperharui');
           }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $simpan = Tbl_pekerjaan::destroy($id);
        if ($simpan) {
            return redirect('admin/pekerjaan')->with('success', 'Data Berhasil Dihapus');
        } else {
            return redirect('admin/pekerjaan')->with('error', 'Data Gagal Dihapus');
        }
    }
}
