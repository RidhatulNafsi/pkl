<?php

namespace App\Http\Controllers;

use App\Models\Tbl_kabid;
use Illuminate\Http\Request;

class kabidController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

       $Datakabid = Tbl_kabid::all();
       return view('data_master.kabid.index',['datakabid'=>$Datakabid]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
        return view ('data_master.kabid.create');
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData=$request->validate([
            'nama_kabid'=>'required',
            'nip_kabid'=>'required',
            'bidang_kabid'=>'required',
            'status_kabid'=>'required',
        ]);
        /// perlu pengaturan Kapital/tidak?
        $simpan= Tbl_kabid::create($validateData);
        if ($simpan){
            return redirect('admin/kabid')->with('success','Data Berhasil Disipmpan');
        }else{
            return redirect('admin/kabid')->with('error','Data Gagal Disimpan');
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
        return view('data_master.kabid.edit',['datakabid' => Tbl_kabid::find($id)]);
     
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData=$request->validate([
            'nama_kabid'=>'required',
            'nip_kabid'=>'required',
            'bidang_kabid'=>'required',
            'status_kabid'=>'required',
    
           ]);
           $simpan = Tbl_kabid::where('id_kabid',$id)->update($validateData);
           if ($simpan){
                return redirect('admin/kabid')-> with('success', 'Data Berhasil Diperbaharui');
           } else{
                return redirect('admin/kabid')-> with('Error', 'Data Gagal Diperharui');
           }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $simpan = Tbl_kabid::destroy($id);
        if ($simpan) {
            return redirect('admin/kabid')->with('success', 'Data Berhasil Dihapus');
        } else {
            return redirect('admin/kabid')->with('error', 'Data Gagal Dihaput');
        }
    }
}
