@extends('data_master.layouts.main')
@section('content')
@section('page_title','Data Mitra')
<div class="container">
    <h1>Data Seluruh Mitra</h1>
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

    <a class="btn btn-primary mt-1" href="{{url('admin/mitra/create')}}" role="button">Tambah data mitra</a>
    <table class="table table-bordered mt-3">
        <thead>
            <tr align="center">
                <th scope="col">No.</th>
                <th scope="col" >Nama Perusahaan</th>
                <th scope="col">Alamat Perusahaan</th>
                <th scope="col">Nama Perwakilan</th>
                <th scope="col">Jabatan Perwakilan</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        @php
            $no=1;
        @endphp
        <tbody>
            @foreach ($datamitra as $data)
                <tr>
                    <th scope="row" class="text-center">{{$no}}</th>
                    <td>{{$data->nama_perusahaan}}</td>
                    <td>{{$data->alamat_perusahaan}}</td>
                    <td>{{$data->nama_perwakilan}}</td>
                    <td>{{$data->jabatan_perwakilan}}</td>
                    <td align="center">
                        <div class="d-inline-flex gap-2">
                                <a class="btn btn-outline-warning" href="mitra/{{$data->id_mitra}}/edit" role="button">Edit</a>
                                <form action="mitra/{{$data->id_mitra}}" method="post">
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
