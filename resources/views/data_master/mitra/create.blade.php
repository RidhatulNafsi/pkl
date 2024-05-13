@extends('data_master.layouts.main')
@section('page_title','Tambah data mitra')
@section('content')
    <div class="container">
        <h1>Tambah Data Mitra</h1>
        <hr>
    <form method="POST" action="{{url('admin/mitra')}}">
        @csrf
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Nama Perusahaan</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="nama_perusahaan" required>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Alamat Perusahaan</label>
            <div class="col-sm-10">
            <textarea class="form-control" name="alamat_perusahaan" rows="3" required></textarea>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Nama Perwakilan</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="nama_perwakilan" required>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Jabatan Perwakilan</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="jabatan_perwakilan" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
    </div>
@endsection
