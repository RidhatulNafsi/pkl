@extends('data_master.layouts.main')
@section('page_title','Buat surat pemeriksaan')
@section('content')
    <div class="container">
        <h1>Buat surat pemeriksaan</h1>
        <hr>
    <form method="POST" action="{{url('admin/pemeriksaan-store',$dataTransaksi->id_transaksi)}}">
        @csrf
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Nomor DPA</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="no_dpa" required>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Tanggal DPA</label>
            <div class="col-sm-10">
            <input type="date" class="form-control" name="tgl_dpa" required>
            </div>
        </div>
         <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Nama PPK</label>
                <div class="col-sm-10">
                    <select class="form-select" name="id_ppk" required>
                        <option value="">Pilih PPK</option>
                         @foreach ($DataPpk as $dataPpk)
                            <option value="{{$dataPpk->id_ppk}}">{{$dataPpk->nama_ppk}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
    </div>
@endsection
