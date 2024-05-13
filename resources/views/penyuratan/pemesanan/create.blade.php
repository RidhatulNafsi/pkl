@extends('data_master.layouts.main')
@section('page_title','Tambah data surat pemesanan')
@section('content')
    <div class="container">
        <h1>Buat Surat Pemesanan</h1>
        <hr>
        <form method="POST" action="{{url('admin/pemesanan')}}">
            @csrf
            <h5>Isi data surat pemesanan</h5>
            <div class="row mb-3 mt-2">
                <label class="col-sm-2 col-form-label">Nomor Surat Pesanan</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="no_surat_pesanan" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Tanggal Surat Pesanan</label>
                <div class="col-sm-10">
                <input type="date" class="form-control" name="tgl_surat_pesanan" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Pekerjaan</label>
                <div class="col-sm-10">
                    <select class="form-select" name="id_pekerjaan" required>
                        <option value="">Pilih pekerjaan</option>
                        @foreach ($DataPekerjaan as $dataPekerjaan)
                            <option value="{{$dataPekerjaan->id_pekerjaan}}">{{$dataPekerjaan->nama_pekerjaan}}</option>
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
                                <option value="{{$dataMitra->id_mitra}}">{{$dataMitra->nama_perusahaan}}</option>
                            @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Kegiatan</label>
                <div class="col-sm-10">
                    <select class="form-select" name="id_kegiatan" required onchange="pilihkegiatan(this)">
                        <option value="">Pilih kegiatan</option>
                         @foreach ($DataKegiatan as $dataKegiatan)
                            <option value="{{$dataKegiatan->id_kegiatan}}">{{$dataKegiatan->nama_kegiatan}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Sub Kegiatan</label>
                <div class="col-sm-10">
                    <select class="form-select" name="id_sub_kegiatan" id="id_sub_kegiatan" required>
                        <option value="">Pilih sub Kegiatan</option>
                            @foreach ($DataSubkegiatan as $dataSubkegiatan)
                                <option value="{{$dataSubkegiatan->id_sub_kegiatan}}">{{$dataSubkegiatan->nama_sub_kegiatan}}</option>
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
                            <option value="{{$dataKabid->id_kabid}}">{{$dataKabid->nama_kabid}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
    

<script>
    function pilihkegiatan(e){
        var html = '';
        var data = @json($DataSubkegiatan);
        var kegiatan = document.getElementById('id_sub_kegiatan');
        console.log(e.value);
        data.forEach(item => {
            if (e.value != '') {
                if(item.id_kegiatan == e.value) {
                    console.log('sama');
                    // var index = data.indexOf(item);
                
                    html += `
                        <option value="${item.id_sub_kegiatan}">${item.nama_sub_kegiatan}</option>
                    `;
                    
                } else {
                    console.log('tidak');
                }
            }
            
        });
        console.log(html);
        kegiatan.innerHTML = html;
    }
</script>
@endsection

