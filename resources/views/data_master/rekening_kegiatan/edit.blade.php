@extends('data_master.layouts.main')
@section('page_title','Edit Data')
@section('content')
    <div class="container">
        <h1>Edit Data Rekening Kegiatan</h1>
        <hr>
    <form method="POST" action="{{url('admin/rekening_kegiatan',$datarekening_kegiatan->id_kegiatan)}}">
        @method('PUT')
        @csrf
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Kode Rekening</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="kode_rekening" value="{{old('kode_rekening',$datarekening_kegiatan->kode_rekening)}}" required>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Nama Kegiatan</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="nama_kegiatan" value="{{old('nama_kegiatan',$datarekening_kegiatan->nama_kegiatan)}}" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
    </div>
@endsection
