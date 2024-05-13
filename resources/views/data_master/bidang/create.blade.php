@extends('data_master.layouts.main')
@section('page_title','Tambah data bidang')
@section('content')
    <div class="container">
        <h1>Tambah Data bidang</h1>
        <hr>
        <form method="POST" action="{{url('admin/bidang')}}">
        @csrf
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Nama bidang</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="nama_bidang" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
    </div>
@endsection
