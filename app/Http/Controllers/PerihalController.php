<?php

namespace App\Http\Controllers;

use App\Models\Tbl_perihal;
use Illuminate\Http\Request;

class PerihalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

       $DataPerihal = Tbl_perihal::all();
       return view('data_master.perihal.index',['dataperihal'=>$DataPerihal]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
        return view ('data_master.perihal.create');
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData=$request->validate([
            'nama_perihal'=>'required',
            'ket_perihal'=>'required',
        ]);
        /// perlu pengaturan Kapital/tidak?
        $simpan= Tbl_perihal::create($validateData);
        if ($simpan){
            return redirect('admin/perihal')->with('success','Data Berhasil Disimpan');
        }else{
            return redirect('admin/perihal')->with('error','Data Gagal Disimpan');
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
        return view('data_master.perihal.edit',['dataperihal' => Tbl_perihal::find($id)]);
     
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData=$request->validate([
            'nama_perihal'=>'required',
            'ket_perihal'=>'required',
    
           ]);
           $simpan = Tbl_perihal::where('id_perihal',$id)->update($validateData);
           if ($simpan){
                return redirect('admin/perihal')-> with('success', 'Data Berhasil Diperbaharui');
           } else{
                return redirect('admin/perihal')-> with('Error', 'Data Gagal Diperharui');
           }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $simpan = Tbl_perihal::destroy($id);
        if ($simpan) {
            return redirect('admin/perihal')->with('success', 'Data Berhasil Dihapus');
        } else {
            return redirect('admin/perihal')->with('error', 'Data Gagal Dihapus');
        }
    }
}
