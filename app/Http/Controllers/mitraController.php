<?php

namespace App\Http\Controllers;

use App\Models\Tbl_mitra;
use Illuminate\Http\Request;

class mitraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

       $Datamitra = Tbl_mitra::all();
       return view('data_master.mitra.index',['datamitra'=>$Datamitra]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
        return view ('data_master.mitra.create');
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData=$request->validate([
            'nama_perusahaan'=>'required',
            'alamat_perusahaan'=>'required',
            'nama_perwakilan'=>'required',
            'jabatan_perwakilan'=>'required',
        ]);
        /// perlu pengaturan Kapital/tidak?
        $simpan= Tbl_mitra::create($validateData);
        if ($simpan){
            return redirect('admin/mitra')->with('success','Data Berhasil Disipmpan');
        }else{
            return redirect('admin/mitra')->with('error','Data Gagal Disimpan');
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
        return view('data_master.mitra.edit',['datamitra' => Tbl_mitra::find($id)]);
     
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData=$request->validate([
            'nama_perusahaan'=>'required',
            'alamat_perusahaan'=>'required',
            'nama_perwakilan'=>'required',
            'jabatan_perwakilan'=>'required',
    
           ]);
           $simpan = Tbl_mitra::where('id_mitra',$id)->update($validateData);
           if ($simpan){
                return redirect('admin/mitra')-> with('success', 'Data Berhasil Diperbaharui');
           } else{
                return redirect('admin/mitra')-> with('Error', 'Data Gagal Diperharui');
           }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $simpan = Tbl_mitra::destroy($id);
        if ($simpan) {
            return redirect('admin/mitra')->with('success', 'Data Berhasil Dihapus');
        } else {
            return redirect('admin/mitra')->with('error', 'Data Gagal Dihaput');
        }
    }
}
