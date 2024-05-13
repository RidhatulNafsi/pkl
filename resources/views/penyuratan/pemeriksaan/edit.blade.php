@extends('layouts.main')
@section('page_title','Edit data surat pemeriksaan')
@section('content')
    <div class="container">
        <h1>Edit data surat pemeriksaan</h1>
        <hr>
    <form method="POST" action="{{url('pemeriksaan',$dataTransaksi->id_transaksi)}}">
        @method('PUT')
        @csrf
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Nomor DPA</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="no_dpa" value="{{old('no_dpa',$dataTransaksi->no_dpa)}}" required>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Tanggal DPA</label>
            <div class="col-sm-10">
            <input type="date" class="form-control" name="tgl_dpa" value="{{old('tgl_dpa',$dataTransaksi->tgl_dpa)}}" required>
            </div>
        </div>
         <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Nama PPK</label>
                <div class="col-sm-10">
                    <select class="form-select" name="id_ppk" required>
                        <option value="">Pilih PPK</option>
                         @foreach ($DataPpk as $dataPpk)
                            <option value="{{$dataPpk->id_ppk}}"
                                @if ($dataTransaksi->id_ppk==$dataPpk->id_ppk)
                                    selected
                                @endif
                                >{{$dataPpk->nama_ppk}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
    </div>
@endsection
