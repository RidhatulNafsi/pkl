@extends('data_master.layouts.main')
@section('page_title','Edit Data')
@section('content')
    <div class="container">
        <h1>Edit Data {{$dataKegiatan->nama_kegiatan}}</h1>
        <hr>
    <form method="POST" action="{{url('kegiatan',$dataKegiatan->id_kegiatan)}}">
        @method('PUT')
        @csrf
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Nama Kegiatan</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="nama_kegiatan" value="{{old('nama_kegiatan',$dataKegiatan->nama_kegiatan)}}" required>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Nama Sub  Kegiatan</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="nama_sub_kegiatan" value="{{old('nama_sub_kegiatan',$datasub_Kegiatan->nama_sub_kegiatan)}}" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
    </div>
@endsection
