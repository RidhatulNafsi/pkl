@extends('data_master.layouts.main')
@section('page_title','Edit Data')
@section('content')
    <div class="container">
        <h1>Edit Data {{$dataBarang->nama_barang}}</h1>
        <hr>
    <form method="POST" action="{{url('barang',$dataBarang->id_barang)}}">
        @method('PUT')
        @csrf
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Nama Barang</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="nama_barang" value="{{old('nama_barang',$dataBarang->nama_barang)}}" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
    </div>
@endsection
