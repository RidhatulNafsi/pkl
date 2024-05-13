@extends('data_master.layouts.main')
@section('page_title','Tambah data Rekening kegiatan')
@section('content')
    <div class="container">
        <h1>Tambah Data Rekening Kegiatan</h1>
        <hr>
    <form method="POST" action="{{url('admin/rekening_kegiatan')}}">
        @csrf
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Kode Rekening</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="kode_rekening" required>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Nama Kegiatan</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="nama_kegiatan" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
    </div>
@endsection
