@extends('data_master.layouts.main')
@section('page_title','Edit Data')
@section('content')
    <div class="container">
        <h1>Edit Data {{$datasatuan->nama_satuan}}</h1>
        <hr>
    <form method="POST" action="{{url('satuan',$datasatuan->id_satuan)}}">
        @method('PUT')
        @csrf
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Nama satuan</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="nama_satuan" value="{{old('nama_satuan',$datasatuan->nama_satuan)}}" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
    </div>
@endsection
