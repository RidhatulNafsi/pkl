@extends('data_master.layouts.main')
@section('page_title','Edit data PPK')
@section('content')
    <div class="container">
        <h1>Edit Data PPK</h1>
        <hr>
    <form method="POST" action="{{url('ppk',$dataPpk->id_ppk)}}">
        @method('PUT')
        @csrf
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Nama PPK</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="nama_ppk" required value="{{old('nama_ppk',$dataPpk->nama_ppk)}}">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">NIP PPK</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="nip_ppk" required value="{{old('nip_ppk',$dataPpk->nip_ppk)}}">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Nomor SK</label>
            <div class="col-sm-10">
            <input type="number" class="form-control" name="nomor_sk" max="1000" required value="{{old('nomor_sk',$dataPpk->nomor_sk)}}">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Tahun SK</label>
            <div class="col-sm-10">
            <input type="number" class="form-control" name="tahun_sk" max="2100" required value="{{old('tahun_sk',$dataPpk->tahun_sk)}}">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Tanggal terbit SK</label>
            <div class="col-sm-10">
            <input type="date" class="form-control" name="tanggal_terbit_sk" required value="{{old('tanggal_terbit_sk',$dataPpk->tanggal_terbit_sk)}}">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Status</label>
            <div class="col-sm-10">
                <select class="form-select" name="status" required>
                    <option value="">Pilih status</option>
                    <option value="1" @if ($dataPpk->status==1)
                        selected
                    @endif>Aktif</option>
                    <option value="0" @if ($dataPpk->status==0)
                        selected
                    @endif>Tidak Aktif</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
    </div>
@endsection
