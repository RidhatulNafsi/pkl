@extends('data_master.layouts.main')
@section('page_title','Edit Data')
@section('content')
    <div class="container">
        <h1>Edit Data {{$databidang->nama_bidang}}</h1>
        <hr>
    <form method="POST" action="{{url('admin/bidang/edit',$databidang->id_bidang)}}">
        @method('PUT')
        @csrf
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Nama bidang</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="nama_bidang" value="{{old('nama_bidang',$databidang->nama_bidang)}}" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
    </div>
@endsection
