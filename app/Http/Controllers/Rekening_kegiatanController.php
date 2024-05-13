<?php

namespace App\Http\Controllers;

use App\Models\Tbl_rekening_kegiatan;
use Illuminate\Http\Request;

class Rekening_kegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Datarekening_kegiatan = Tbl_rekening_kegiatan::all();
        return view('data_master.rekening_kegiatan.index',['datarekening_kegiatan'=>$Datarekening_kegiatan]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('data_master.rekening_kegiatan.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData=$request->validate([
            'kode_rekening'=>'required',
            'nama_kegiatan'=>'required',
           
        ]);
        /// perlu pengaturan Kapital/tidak?
        $simpan= Tbl_rekening_kegiatan::create($validateData);
        if ($simpan){
            return redirect('admin/rekening_kegiatan')->with('success','Data Berhasil Disipmpan');
        }else{
            return redirect('admin/rekening_kegiatan')->with('error','Data Gagal Disimpan');
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
        return view('data_master.rekening_kegiatan.edit',['datarekening_kegiatan' => Tbl_rekening_kegiatan::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData=$request->validate([
            'kode_rekening'=>'required',
            'nama_kegiatan'=>'required',
            
    
           ]);
           $simpan = Tbl_rekening_kegiatan::where('id_kegiatan',$id)->update($validateData);
           if ($simpan){
                return redirect('admin/rekening_kegiatan')-> with('success', 'Data Berhasil Diperbaharui');
           } else{
                return redirect('admin/rekening_kegiatan')-> with('Error', 'Data Gagal Diperharui');
           }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $simpan = Tbl_rekening_kegiatan::destroy($id);
        if ($simpan){
             return redirect('admin/rekening_kegiatan')-> with('success', 'Data Berhasil Diperbaharui');
        } else{
             return redirect('admin/rekening_kegiatan')-> with('Error', 'Data Gagal Diperharui');
        }
    }
}
