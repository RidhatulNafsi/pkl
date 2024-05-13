@extends('data_master.layouts.main')
@section('page_title','Tambah data pekerjaan')
@section('content')
    <div class="container">
        <h1>Tambah Data pekerjaan</h1>
        <hr>
    <form method="POST" action="{{url('admin/pekerjaan')}}">
        @csrf
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Kode Rekening</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="kode_rekening" required>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Nama Pekerjaan</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="nama_pekerjaan" required>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Nama Perihal</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="nama_perihal" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
    </div>
@endsection
