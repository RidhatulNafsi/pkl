@extends('data_master.layouts.main')
@section('page_title','Tambah data barang')
@section('content')
    <div class="container">
        <h1>Tambah Data Barang</h1>
        <hr>
        <form method="POST" action="{{url('admin/barang')}}">
        @csrf
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Nama Barang</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="nama_barang" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
    </div>
@endsection
