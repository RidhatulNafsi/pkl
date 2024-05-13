@extends('data_master.layouts.main')
@section('page_title','Edit Data')
@section('content')
    <div class="container">
        <h1>Edit Data {{$datasubKegiatan->nama_sub_kegiatan}}</h1>
        <hr>
    <form method="POST" action="{{url('sub-kegiatan',$dataSubKegiatan->id_sub_kegiatan)}}">
        @method('PUT')
        @csrf
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Nama Sub Kegiatan</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="nama_sub_kegiatan" value="{{old('nama_sub_kegiatan',$dataSubKegiatan->nama_sub_kegiatan)}}" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
    </div>
@endsection
