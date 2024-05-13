<?php

namespace App\Http\Controllers;

use App\Models\Tbl_ppk;
use Illuminate\Http\Request;

class ppkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

       $Datappk = Tbl_ppk::all();
       return view('data_master.ppk.index',['dataPpk'=>$Datappk]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
        return view ('data_master.ppk.create');
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $validateData=$request->validate([
        "nama_ppk"=>'required',
        "nip_ppk"=>'required',
        "nomor_sk"=>'required',
        "tahun_sk"=>'required',
        "tanggal_terbit_sk"=>'required',
        "status_ppk"=>'required',

      ]);
      $simpan=Tbl_ppk::create($validateData);
      if ($simpan){
            return redirect('admin/ppk')->with('success','Data Berhasil Disimpan');
        }else{
            return redirect('admin/ppk')->with('error','Data Gagal Disimpan');
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
        return view('data_master.ppk.edit',['datappk' => Tbl_ppk::find($id)]);
     
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData=$request->validate([
            'nama_ppk'=>'required',
            'nip_ppk'=>'required',
            'nomor_sk'=>'required',
            'tahun_sk'=>'required',
            'tahun_terbit_sk'=>'required',
            'status_ppk'=>'required',
        ]);

        $simpan = Tbl_ppk::where('id_ppk',$id)->update($validateData);
        if ($simpan){
            return redirect('admin/ppk')->with('success','Data Berhasil Disimpan');
        }else{
            return redirect('admin/ppk')->with('error','Data Gagal Disimpan');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $simpan = Tbl_ppk::destroy($id);
        if ($simpan) {
            return redirect('admin/ppk')->with('success', 'Data Berhasil Dihapus');
        } else {
            return redirect('admin/ppk')->with('error', 'Data Gagal Dihapus');
        }
    }
}
