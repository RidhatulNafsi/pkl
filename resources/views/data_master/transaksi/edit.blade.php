@extends('data_master.layouts.main')
@section('page_title','Tambah data transaksi')
@section('content')
    <div class="container">
        <h1> Edit Data transaksi </h1>
        <hr>
     <form method="POST" action="{{url('transaksi',$datatransaksi->id_transaksi)}}">
            @csrf
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">No Surat Pesanan </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="no_surat_pesanan">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Tanggal Surat Pesanan </label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name="tgl_surat_pesanan">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Id Pekerjaan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="id_pekerjaan">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Id Mitra </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="id_mitra">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Id Kegiatan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="id_kegiatan">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Id Sub Kegiatan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="id_sub_kegiatan">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Id Kabid </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="id_kabid">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Status </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="status">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Id Pkk</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="id_ppk">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">No DPA </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="no_dpa">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Tanggal DPA</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="tgl_dpa">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Id Pa</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="id_pa">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Jumlah</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="jumlah">
                </div>
            </div>
            <button type="submit" class ="btn btn-primary">Simpan </button>
         </form>     
    </div>
@endsection