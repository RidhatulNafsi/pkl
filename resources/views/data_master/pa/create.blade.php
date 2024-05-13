@extends('data_master.layouts.main')
@section('page_title','Tambah data PA')
@section('content')
    <div class="container">
        <h1>Tambah Data PA</h1>
        <hr>
    <form method="POST" action="{{url('admin/pa')}}">
        @csrf
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Nama PA</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="nama_pa" required>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">NIP PA</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="nip_pa" required>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Status PA</label>
            <div class="col-sm-10">
                <select class="form-select" name="status_pa" required>
                    <option value="">Pilih status</option>
                    <option value="1">Aktif</option>
                    <option value="0">Tidak Aktif</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
    </div>
@endsection
