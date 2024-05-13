@extends('layouts.main')
@section('page_title','Edit Data')
@section('content')
    <div class="container">
        <h1>Edit Data {{$dataPerihal->nama_perihal}}</h1>
        <hr>
    <form method="POST" action="{{url('perihal',$dataPerihal->id_perihal)}}">
        @method('PUT')
        @csrf
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Nama Perihal</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="nama_perihal" value="{{old('nama_perihal',$dataPerihal->nama_perihal)}}" required>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Keterangan Perihal</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="ket_perihal" value="{{old('ket_perihal',$dataPerihal->ket_perihal)}}" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
    </div>
@endsection
