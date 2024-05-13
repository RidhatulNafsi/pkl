@extends('data_master.layouts.main')
@section('page_title','Edit Data')
@section('content')
    <div class="container">
        <h1>Edit Data Mitra {{$dataMitra->nama_perusahaan}}</h1>
        <hr>
    <form method="POST" action="{{url('mitra',$dataMitra->id_mitra)}}">
        @method('PUT')
        @csrf
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Nama Perusahaan</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="nama_perusahaan" value="{{old('nama_perusahaan',$dataMitra->nama_perusahaan)}}" required>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Alamat Perusahaan</label>
            <div class="col-sm-10">
            <textarea class="form-control" name="alamat_perusahaan" rows="3" required>
                {{old('alamat_perusahaan',$dataMitra->alamat_perusahaan)}}
            </textarea>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Nama Perwakilan</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="nama_perwakilan" value="{{old('nama_perwakilan',$dataMitra->nama_perwakilan)}}" required>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Jabatan Perwakilan</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="jabatan_perwakilan" value="{{old('jabatan_perwakilan',$dataMitra->jabatan_perwakilan)}}" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
    </div>
@endsection
