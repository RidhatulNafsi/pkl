@extends('layouts.main')
@section('page_title','Edit data surat pemesanan')
@section('content')
    <div class="container">
        <h1>Edit Data Surat Pemesanan</h1>
        <hr>
        <form method="POST" action="{{url('pemesanan',$dataPemesanan->id_transaksi)}}">
            @method('PUT')
            @csrf
            <h5>Edit data surat pemesanan</h5>
            <div class="row mb-3 mt-2">
                <label class="col-sm-2 col-form-label">Nomor Surat Pesanan</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="no_surat_pesanan" value="{{old('no_surat_pesanan',$dataPemesanan->no_surat_pesanan)}}" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Tanggal Surat Pesanan</label>
                <div class="col-sm-10">
                <input type="date" class="form-control" name="tgl_surat_pesanan" value="{{old('tgl_surat_pesanan',$dataPemesanan->tgl_surat_pesanan)}}" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Perihal</label>
                <div class="col-sm-10">
                    <select class="form-select" name="id_perihal" required>
                        <option value="">Pilih perihal</option>
                        @foreach ($DataPerihal as $dataPerihal)
                            <option value="{{$dataPerihal->id_perihal}}"
                                @if ($dataPemesanan->id_perihal==$dataPerihal->id_perihal)
                                    selected
                                @endif>{{$dataPerihal->nama_perihal}}</option>
                        @endforeach

                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Pilih Nama Perusahaan</label>
                <div class="col-sm-10">
                    <select class="form-select" name="id_mitra" required>
                        <option value="">Pilih perusahaan</option>
                            @foreach ($DataMitra as $dataMitra)
                                <option value="{{$dataMitra->id_mitra}}"
                                    @if ($dataPemesanan->id_mitra==$dataMitra->id_mitra)
                                        selected
                                    @endif>{{$dataMitra->nama_perusahaan}}</option>
                            @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Kegiatan</label>
                <div class="col-sm-10">
                    <select class="form-select" name="id_kegiatan" required>
                        <option value="">Pilih kegiatan</option>
                         @foreach ($DataKegiatan as $dataKegiatan)
                            <option value="{{$dataKegiatan->id_kegiatan}}"
                                @if ($dataPemesanan->id_kegiatan==$dataKegiatan->id_kegiatan)
                                    selected
                                @endif>{{$dataKegiatan->nama_kegiatan}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Sub Kegiatan</label>
                <div class="col-sm-10">
                    <select class="form-select" name="id_sub_kegiatan" required>
                        <option value="">Pilih sub Kegiatan</option>
                            @foreach ($DataSubkegiatan as $dataSubkegiatan)
                                <option value="{{$dataSubkegiatan->id_sub_kegiatan}}"
                                    @if ($dataPemesanan->id_sub_kegiatan==$dataSubkegiatan->id_sub_kegiatan)
                                        selected
                                    @endif>{{$dataSubkegiatan->nama_sub_kegiatan}}</option>
                            @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Kabid</label>
                <div class="col-sm-10">
                    <select class="form-select" name="id_kabid" required>
                        <option value="">Pilih Kabid</option>
                         @foreach ($DataKabid as $dataKabid)
                            <option value="{{$dataKabid->id_kabid}}"
                                @if ($dataPemesanan->id_kabid==$dataKabid->id_kabid)
                                    selected
                                @endif>{{$dataKabid->nama_kabid}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <h5 class="mt-4">Isi data barang pesanan</h5>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <a href="javascript:" class="tambahbarang btn btn-primary" role="button" style="float: right">Tambah Barang</a>
                    </div>
                </div>
            @foreach ($dataPemesanan->pembelian as $item)
                <div class="barang-item">
                <h6 class="mt-4">Barang {{$loop->iteration}}</h6>
                <div class="row mb-3 mt-2">
                <label class="col-sm-2 col-form-label">Pilih Nama Barang</label>
                    <div class="col-sm-10">
                        <select class="form-select" name="id_barang[]" required>
                            <option value="">Pilih barang</option>
                            @foreach ($DataBarang as $dataBarang)
                                <option value="{{$dataBarang->id_barang}}"
                                    @if ($item->id_barang==$dataBarang->id_barang)
                                        selected
                                    @endif>{{$dataBarang->nama_barang}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Isi Satuan Barang</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="satuan[]" value="{{old('satuan[]',$item->satuan)}}" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Isi Jumlah Barang</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="jumlah[]" value="{{old('jumlah[]',$item->jumlah)}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <a href="javascript:" class="remove btn btn-danger" role="button" style="float: right">Hapus Barang</a>
                    </div>
                </div>
                </div>
            @endforeach
                <hr>
                <div class="barang"></div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<script type="text/javascript">
    $(document).on('click', '.tambahbarang', function () {
        tambahbarang();
    });

    function tambahbarang() {
        var barang = '<div class="barang-item mt-5"><div class="row mb-3 mt-2"><label class="col-sm-2 col-form-label">Pilih Nama Barang</label><div class="col-sm-10"><select class="form-select" name="id_barang[]" required><option value="">Pilih barang</option>@foreach ($DataBarang as $dataBarang)<option value="{{$dataBarang->id_barang}}">{{$dataBarang->nama_barang}}</option>@endforeach</select></div></div><div class="row mb-3"><label class="col-sm-2 col-form-label">Isi Satuan Barang</label><div class="col-sm-10"><input type="text" class="form-control" name="satuan[]" required></div></div><div class="row mb-3"><label class="col-sm-2 col-form-label">Isi Jumlah Barang</label><div class="col-sm-10"><input type="number" class="form-control" name="jumlah[]" required></div></div><div class="form-group row"><label class="col-sm-2 col-form-label"></label><div class="col-sm-10"><a href="#" class="remove btn btn-danger" role="button" style="float: right">Hapus Barang</a></div></div></div>';
        $('.barang').append(barang);
    };

    $(document).on('click', '.remove', function () {
        $(this).closest('.barang-item').remove();
        countBarang--; // Kurangi jumlah barang saat barang dihapus
    });
</script>





@endsection
