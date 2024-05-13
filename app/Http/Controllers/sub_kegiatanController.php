<?php

namespace App\Http\Controllers;

use App\Models\Tbl_kegiatan;
use App\Models\Tbl_sub_kegiatan;
use Illuminate\Http\Request;

class sub_kegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   /* public function index()
    {

        $Datasubkegiatan = Tbl_sub_kegiatan::all();
        return view ('data_master.sub_kegiatan.index',['datasubKegiatan'=>$Datasubkegiatan]);

        /* $Datakegiatan = Tbl_kegiatan::all();
        return view('data_master.kegiatan.index',['datakegiatan'=>$Datakegiatan]); */
    
  /*

    /**
     * Show the form for creating a new resource.
     */

     public function create()
     {
         return view('data_master.sub_kegiatan.create');
     }
 
     public function index()
     {
     $DatasubKegiatan = Tbl_Sub_Kegiatan::with('kegiatan')->get();
    //  dd($DatasubKegiatan);
     //dd($DatasubKegiatan);
     /* $DatasubKegiatan = Tbl_Sub_Kegiatan::all(); */
     return view('data_master.sub_kegiatan.index',['datasubKegiatan'=>$DatasubKegiatan]);
 
     // return view('data_master.sub_kegiatan.index', compact('DatasubKegiatan'));
     }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData=$request->validate([
            'id_kegiatan'=>'required',    
            'nama_sub_kegiatan'=>'required',   
         ]);
        /// perlu pengaturan Kapital/tidak?
        $simpan= Tbl_sub_kegiatan::create($validateData);
        if ($simpan){
            return redirect('admin/sub_kegiatan')->with('success','Data Berhasil Disipmpan');
        }else{
            return redirect('admin/sub_kegiatan')->with('error','Data Gagal Disimpan');
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
        return view('data_master.sub_kegiatan.edit',['datasub_kegiatan' => Tbl_sub_kegiatan::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData=$request->validate([
            'id_kegiatan'=>'required', 
            'nama_sub_kegiatan'=>'required',
           ]);
           $simpan = Tbl_sub_kegiatan::where('id_sub_kegiatan',$id)->update($validateData);
           if ($simpan){
                return redirect('admin/sub_kegiatan')-> with('success', 'Data Berhasil Diperbaharui');
           } else{
                return redirect('admin/sub_kegiatan')-> with('Error', 'Data Gagal Diperharui');
           }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $simpan = Tbl_sub_kegiatan::destroy($id);
        if ($simpan) {
            return redirect('admin/sub_kegiatan')->with('success', 'Data Berhasil Dihapus');
        } else {
            return redirect('admin/sub_kegiatan')->with('error', 'Data Gagal Dihapus');
        }
    }
}
