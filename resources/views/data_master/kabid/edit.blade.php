@extends('data_master.layouts.main')
@section('page_title','Edit data Kabid')
@section('content')
    <div class="container">
        <h1>Edit Data Kabid</h1>
        <hr>
    <form method="POST" action="{{url('kabid',$dataKabid->id_kabid)}}">
        @method('PUT')
        @csrf
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Nama Kabid</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="nama_kabid" value="{{old('nama_kabid',$dataKabid->nama_kabid)}}" required>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">NIP Kabid</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="nip_kabid" value="{{old('nip_kabid',$dataKabid->nip_kabid)}}" required>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Bidang Kabid</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="bidang_kabid" value="{{old('bidang_kabid',$dataKabid->bidang_kabid)}}" required>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Status Kabid</label>
            <div class="col-sm-10">
                <select class="form-select" name="status_kabid" required>
                    <option value="">Pilih status</option>
                    <option value="1" @if ($dataKabid->status_kabid==1)
                        selected
                    @endif>Aktif</option>
                    <option value="0" @if ($dataKabid->status_kabid==0)
                        selected
                    @endif>Tidak Aktif</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
    </div>
@endsection
