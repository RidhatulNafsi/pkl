@extends('data_master.layouts.main')
@section('page_title','Data Rekening Kegiatan')
@section('content')

<div class="container">
    <h1>Data Seluruh Rekening Kegiatan</h1>
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

    <a class="btn btn-primary mt-1" href="{{url('admin/rekening_kegiatan/create')}}" role="button">Tambah data Rekening kegiatan</a>
    <table class="table table-bordered mt-3">
        <thead>
            <tr align="center">
                <th scope="col">No.</th>
                <th scope="col" >Isi Kode Rekening</th>
                <th scope="col">Isi Nama Kegiatan</th>
            </tr>
        </thead>
        @php
            $no=1;
        @endphp
        <tbody>
            @foreach ($datarekening_kegiatan as $data)
                <tr>
                    <th scope="row" class="text-center">{{$no}}</th>
                    <td>{{$data->kode_rekening}}</td>
                    <td>{{$data->nama_kegiatan}}</td>
                    <td align="center">
                        <div class="d-inline-flex gap-2">
                                <a class="btn btn-outline-warning" href="rekening_kegiatan/{{$data->id_kegiatan}}/edit" role="button">Edit</a>
                                <form action="rekening_kegiatan/{{$data->id_kegiatan}}" method="post">
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
