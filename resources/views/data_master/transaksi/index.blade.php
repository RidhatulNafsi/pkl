@extends('data_master.layouts.main')
@section('content')
@section('page_title','Data transaksi')
<div class="container">
    <h1>Data Seluruh transaksi</h1>
    <hr>
    @if (session()->has('success'))
        <div class="alert alert-success mt-1" role="alert">
            {{session('success')}}
         </div>  
    @elseif (session()->has('error'))
        <div class="alert alert-danger mt-1" role="alert">
            {{session('error')}}
        </div>
      
    @endif
    <a class="btn btn-primary mt-1" href="{{url('transaksi/create')}}" role="button">Tambah data transaksi</a>
    <table class="table table-bordered mt-3">
        <thead>
          <tr align="center">
            <th scope="col">No</th>
            <th scope="col">No Surat Pesanan</th>
            <th scope="col">Tanggal Surat Pesanan</th>
            <th scope="col">Id Pekerjaan</th>
            <th scope="col">Id Mitra</th>
            <th scope="col">Id Kegiatan</th>
            <th scope="col">Id Sub Kegiatan</th>
            <th scope="col">Id Kabid</th>
            <th scope="col">Status</th>
            <th scope="col">Id PPK</th>
            <th scope="col">No DPA</th>
            <th scope="col">Tanggal DPA</th>
            <th scope="col">Id Pa</th>
            <th scope="col">jumlah</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        @php
            $no=1;
        @endphp
        <tbody>
            @foreach ($datatransaksi as $data )
            <tr>
                <th scope="row" class ="text-center">{{$no}}</th>
                <td>{{$data->no_surat_pesanan}}</td>
                <td>{{$data->tgl_surat_pesanan}}</td>
                <td>{{$data->id_pekerjaan}}</td>
                <td>{{$data->id_mitra}}</td>
                <td>{{$data->id_kegiatan}}</td>
                <td>{{$data->id_sub_kegiatan}}</td>
                <td>{{$data->id_kabid}}</td>
                <td>@if ($data->status==1)
                    Aktif
                    @else
                    Tidak Aktif
                    @endif</td>
                <td>{{$data->id_ppk}}</td>
                <td>{{$data->no_dpa}}</td>
                <td>{{$data->tgl_dpa}}</td>
                <td>{{$data->id_pa}}</td>
                <td>{{$data->jumlah}}</td>
                
                <td align ='center'>
                    <div class ="d-inline-flex gap-2">
                        <a class="btn btn-outline-warning" href="transaksi/{{$data->id_transaksi}}/edit" role="button">Edit</a>
                        <form action="transaksi/{{$data->id_transaksi}}" method="post">
                            @method('DELETE')
                            @csrf
                                <button type="submit" class="btn btn-outline-danger" >Hapus</button>
                        </form>
                    </div>
                    
                </td>
              </tr>
              @php
                  $no++;
              @endphp
            @endforeach 
        </tbody>
      </table>
</div>
@endsection


