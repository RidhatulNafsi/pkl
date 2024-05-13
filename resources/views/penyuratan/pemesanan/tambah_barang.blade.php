@extends('data_master.layouts.main')
@section('page_title','Tambah data barang')
@section('content')
<div class="container">
<form  method="POST" action="{{url('admin/tambah_barang')}}">
    @csrf
    <h5 class="mt-4">Isi data barang pesanan</h5>
                <h6>Barang 1</h6>
                <div class="row mb-3 mt-2">
                <label class="col-sm-2 col-form-label">Pilih Nama Barang</label>
                    <div class="col-sm-10">
                        <input type="hidden" name="id_transaksi" value="{{$id_transaksi}}">
                        <select class="form-select" name="id_barang[]" required>
                            <option value="">Pilih barang</option>
                            @foreach ($dataBarang as $DataBarang)
                                <option value="{{$DataBarang->id_barang}}">{{$DataBarang->nama_barang}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mb-3 mt-2">
                    <label class="col-sm-2 col-form-label">Isi Satuan Barang</label>
                    <div class="col-sm-10">
                        <select class="form-select" name="id_satuan[]" required>
                            <option value="" disabled>Pilih Satuan</option>
                                @foreach ($dataSatuan as $DataSatuan)
                            <option value="{{$DataSatuan->id_satuan}}">{{$DataSatuan->nama_satuan}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Isi Jumlah Barang</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="jumlah[]" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <a href="#" class="tambahbarang btn btn-primary" role="button" style="float: right">Tambah Barang</a>
                    </div>
                </div>
                <div class="barang"></div>

            <button type="submit" class="btn btn-primary">Simpan</button>
 </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
    <script type="text/javascript">
        var countBarang = 1;

        $(document).on('click', '.tambahbarang', function () {
            tambahbarang();
        });

        function tambahbarang() {
            countBarang++;
            var barang = `
            <div class="barang-item">
                <h6>Barang ' + countBarang + '</h6>
                <div class="row mb-3 mt-2">
                    <label class="col-sm-2 col-form-label">Pilih Nama Barang</label>
                <div class="col-sm-10">
                    <select class="form-select" name="id_barang[]" required>
                        <option value="">Pilih barang</option>
                        @foreach ($dataBarang as $barang)
                        <option value="{{$barang->id_barang}}">{{$barang->nama_barang}}</option>
                        @endforeach
                        </select>
                        </div></div><div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Isi Satuan Barang</label>
                    <div class="col-sm-10">
                    <select class="form-select" name="id_satuan[]" required>
                            <option value="" disabled>Pilih Satuan</option>
                                @foreach ($dataSatuan as $DataSatuan)
                            <option value="{{$DataSatuan->id_satuan}}">{{$DataSatuan->nama_satuan}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    </div><div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Isi Jumlah Barang</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="jumlah[]" required>
                            </div></div><div class="form-group row">
                                <label class="col-sm-2 col-form-label"></label><div class="col-sm-10">
                                    <a href="#" class="remove btn btn-danger" role="button" style="float: right">Hapus Barang</a></div></div></div>`;
            $('.barang').append(barang);
            updateNomorBarang();
        };

        function updateNomorBarang() {
            $('.barang-item').each(function (index) {
                $(this).find('h6').text('Barang ' + (index + 2));
            });
        }

        $(document).on('click', '.remove', function () {
            $(this).closest('.barang-item').remove();
            countBarang--; // Kurangi jumlah barang saat barang dihapus
            updateNomorBarang();
        });
    </script> 
@endsection