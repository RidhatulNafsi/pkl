<?php

namespace App\Http\Controllers;

use App\Models\Tbl_kegiatan;
use App\Models\Tbl_sub_kegiatan;
use Illuminate\Http\Request;

class kegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Datakegiatan = Tbl_kegiatan::all();
        return view('data_master.kegiatan.index',['datakegiatan'=>$Datakegiatan]);
    }

    public function getSubKegiatan($id)
    {
        $subKegiatan = Tbl_sub_kegiatan::where('id_kegiatan', $id)->get();
        return response()->json($subKegiatan);
    }

    public function get(Request $request)
    {
      
        $Datakegiatan = Tbl_kegiatan::select('id_kegiatan', 'nama_kegiatan')
            ->where('id_kegiatan')->when($request->q, function ($query, $q) {
                $query->where('nama_bidang', 'like', '%' . $q . '%')->orWhere('lokasi', 'like', '%' . $q . '%');
            })->get();

        return response()->json($Datakegiatan);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
        return view ('data_master.kegiatan.create');
        
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $validateData=$request->validate([
            'nama_kegiatan'=>'required',
        ]);
        $simpan= Tbl_Kegiatan::create($validateData);
        if($simpan){
            return redirect('admin/kegiatan')->with('success','Data Berhasil Disimpan');
        }else{
            return redirect('admin/kegiatan')->with('Data Gagal Disimpan');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view('data_master.sub_kegiatan.create',['data'=>Tbl_Kegiatan::all()]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('data_master.kegiatan.edit',['datakegiatan' => Tbl_kegiatan::find($id)]);
     
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData=$request->validate([
            'nama_kegiatan'=>'required',
            
    
           ]);
           $simpan = Tbl_kegiatan::where('id_kegiatan',$id)->update($validateData);
           if ($simpan){
                return redirect('admin/kegiatan')-> with('success', 'Data Berhasil Diperbaharui');
           } else{
                return redirect('admin/kegiatan')-> with('Error', 'Data Gagal Diperharui');
           }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $simpan = Tbl_kegiatan::destroy($id);
           if ($simpan){
                return redirect('admin/kegiatan')-> with('success', 'Data Berhasil Diperbaharui');
           } else{
                return redirect('admin/kegiatan')-> with('Error', 'Data Gagal Diperharui');
           }
    }
}
