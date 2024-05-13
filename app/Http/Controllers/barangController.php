<?php

namespace App\Http\Controllers;

use App\Models\Tbl_barang;
use Illuminate\Http\Request;

class barangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

       $Databarang = Tbl_barang::all();
       return view('data_master.barang.index',['databarang'=>$Databarang]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
        return view ('data_master.barang.create');
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData=$request->validate([
            'nama_barang'=>'required',
            
        ]);
        /// perlu pengaturan Kapital/tidak?
        $simpan= Tbl_barang::create($validateData);
        if ($simpan){
            return redirect('admin/barang')->with('success','Data Berhasil Disipmpan');
        }else{
            return redirect('admin/barang')->with('error','Data Gagal Disimpan');
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
        return view('data_master.barang.index',['databarang']);
            $Databarang = Tbl_barang::all();
     
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData=$request->validate([
            'nama_barang'=>'required',
    
           ]);
           $simpan = Tbl_barang::where('id_barang',$id)->update($validateData);
           if ($simpan){
                return redirect('admin/barang')-> with('success', 'Data Berhasil Diperbaharui');
           } else{
                return redirect('admin/barang')-> with('Error', 'Data Gagal Diperharui');
           }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $simpan = Tbl_barang::destroy($id);
        if ($simpan) {
            return redirect('admin/barang')->with('success', 'Data Berhasil Dihapus');
        } else {
            return redirect('admin/barang')->with('error', 'Data Gagal Dihapus');
        }
    }
}
