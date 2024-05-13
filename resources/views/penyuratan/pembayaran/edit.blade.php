@extends('layouts.main')
@section('page_title','Edit data Surat Pembayaran')
@section('content')
    <div class="container">
        <h1>Edit data surat pembayaran</h1>
        <hr>
    <form method="POST" action="{{url('pembayaran',$dataTransaksi->id_transaksi)}}">
        @method('PUT')
        @csrf
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Nominal</label>
            <div class="col-sm-10">
            <input type="number" class="form-control" name="jumlah" value="{{old('jumlah',$dataTransaksi->jumlah)}}" required>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Nomor Rekening</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="no_rekening" value="{{old('no_rekening',$dataTransaksi->no_rekening)}}" required>
            </div>
        </div>
         <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Nama Pa</label>
                <div class="col-sm-10">
                    <select class="form-select" name="id_pa" required>
                        <option value="">Pilih PPK</option>
                         @foreach ($DataPa as $dataPa)
                            <option value="{{$dataPa->id_pa}}"
                                @if ($dataTransaksi->id_pa==$dataPa->id_pa)
                                    selected
                                @endif
                                >{{$dataPa->nama_pa}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
    </div>
@endsection
