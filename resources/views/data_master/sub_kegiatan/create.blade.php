@extends('data_master.layouts.main')
@section('page_title','Tambah data sub kegiatan')
@section('content')
    <div class="container">
        <h1>Tambah Data Sub Kegiatan</h1>
        <hr>
        <div class="mb-3">
            <form method="POST" action="{{url ('admin/sub_kegiatan')}}">
                @csrf
                <div class="row mb-3">
                    <label class="form-label">Nama Kegiatan</label>

                    <select class="form-select" name="id_kegiatan">
                        @foreach ($data as $item)
                        
                            <option value="{{$item->id_kegiatan}}">{{$item->nama_kegiatan}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row mb-3">
                    <label class="form-label">Nama Sub Kegiatan</label>
                    <input class="form-control" type="text" name="nama_sub_kegiatan">
                </div>
                
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
@endsection