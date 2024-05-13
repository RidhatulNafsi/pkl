@extends('data_master.layouts.main')
@section('page_title','Data PPK')
@section('content')

<div class="container">
    <h1>Data Seluruh PPK</h1>
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

    <a class="btn btn-primary mt-1" href="{{url('admin/ppk/create')}}" role="button">Tambah data PPK</a>
    <table class="table table-bordered mt-3">
        <thead>
            <tr align="center">
                <th scope="col">No.</th>
                <th scope="col" >Nama PPK</th>
                <th scope="col" >NIP PPK</th>
                <th scope="col" >Nomor SK</th>
                <th scope="col" >Tahun SK</th>
                <th scope="col" >Tanggal terbit SK</th>
                <th scope="col" >Status</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        @php
            $no=1;
        @endphp
        <tbody>
            @foreach ($dataPpk as $data)
                <tr>
                    <th scope="row" class="text-center">{{$no}}</th>
                    <td>{{$data->nama_ppk}}</td>
                    <td>{{$data->nip_ppk}}</td>
                    <td>{{$data->nomor_sk}}</td>
                    <td>{{$data->tahun_sk}}</td>
                    <td>{{$data->tanggal_terbit_sk}}</td>
                    <td>@if ($data->status==1)
                        Aktif
                        @else
                        Tidak Aktif
                    @endif</td>
                    <td align="center">
                        <div class="d-inline-flex gap-2">
                                <a class="btn btn-outline-warning" href="ppk/{{$data->id_ppk}}/edit" role="button">Edit</a>
                                <form action="ppk/{{$data->id_ppk}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                        <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Apakah anda yakin menghapus data?')">Hapus</button>
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
