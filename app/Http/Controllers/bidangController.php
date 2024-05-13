<?php

namespace App\Http\Controllers;

use App\Models\Tbl_bidang;
use Illuminate\Http\Request;

class bidangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Databidang= Tbl_bidang::all();
       return view('data_master.bidang.index',['databidang'=>$Databidang]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('data_master.bidang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData=$request->validate([
            'nama_bidang'=>'required',
            
        ]);
        /// perlu pengaturan Kapital/tidak?
        $simpan= Tbl_bidang::create($validateData);
        if ($simpan){
            return redirect('admin/bidang')->with('success','Data Berhasil Disipmpan');
        }else{
            return redirect('admin/bidang')->with('error','Data Gagal Disimpan');
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
        return view('data_master.bidang.index',['databidang']);
        $Databarang = Tbl_bidang::all();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData=$request->validate([
            'nama_bidang'=>'required',
    
           ]);
           $simpan = Tbl_bidang::where('id_bidang',$id)->update($validateData);
           if ($simpan){
                return redirect('admin/bidang')-> with('success', 'Data Berhasil Diperbaharui');
           } else{
                return redirect('admin/bidang')-> with('Error', 'Data Gagal Diperharui');
           }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $simpan = Tbl_bidang::destroy($id);
        if ($simpan) {
            return redirect('admin/bidang')->with('success', 'Data Berhasil Dihapus');
        } else {
            return redirect('admin/bidang')->with('error', 'Data Gagal Dihapus');
        }
    }
}
