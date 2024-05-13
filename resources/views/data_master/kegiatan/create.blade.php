@extends('data_master.layouts.main')
@section('page_title','Tambah data kegiatan')
@section('content')
    <div class="container">
        <h1>Tambah Data kegiatan</h1>
        <hr>
        <form method="POST" action="{{url('admin/kegiatan')}}">
        @csrf
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Nama kegiatan</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="nama_kegiatan" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
    </div>
@endsection
