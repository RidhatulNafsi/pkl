@extends('data_master.layouts.main')
@section('page_title','Tambah data surat pembayaran')
@section('content')
    <div class="container">
        <h1>Tambah Data Surat Pembayaran</h1>
        <hr>
    <form method="POST" action="{{url('admin/pembayaran-store',$dataTransaksi->id_transaksi)}}">
        @csrf
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Nominal</label>
            <div class="col-sm-10">
            <input type="number" class="form-control" name="jumlah" required>
            </div>
        </div>
        {{-- <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Nomor rekening</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="no_rekening" required>
            </div>
        </div> --}}
         <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Nama PA</label>
                <div class="col-sm-10">
                    <select class="form-select" name="id_pa" required>
                        <option value="">Pilih PA</option>
                         @foreach ($DataPa as $dataPa)
                            <option value="{{$dataPa->id_pa}}">{{$dataPa->nama_pa}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
    </div>
@endsection
