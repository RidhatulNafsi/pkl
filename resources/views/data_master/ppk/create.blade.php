@extends('data_master.layouts.main')
@section('page_title','Tambah data PPK')
@section('content')
    <div class="container">
        <h1>Tambah Data PPK</h1>
        <hr>
    <form method="POST" action="{{url('admin/ppk')}}">
        @csrf
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Nama PPK</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="nama_ppk" required>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">NIP PPK</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="nip_ppk" required>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Nomor SK</label>
            <div class="col-sm-10">
            <input type="number" class="form-control" name="nomor_sk" required>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Tahun SK</label>
            <div class="col-sm-10">
            <input type="number" class="form-control" name="tahun_sk" required>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Tanggal terbit SK</label>
            <div class="col-sm-10">
            <input type="date" class="form-control" name="tanggal_terbit_sk" required>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Status</label>
            <div class="col-sm-10">
                <select class="form-select" name="status_ppk" required>
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
