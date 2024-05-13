@extends('data_master.layouts.main')
@section('page_title','Data Pekerjaan')
@section('content')

<div class="container">
    <h1>Data Seluruh Pekerjaan</h1>
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

    <a class="btn btn-primary mt-1" href="{{url('admin/pekerjaan/create')}}" role="button">Tambah data Pekerjaan</a>
    <table class="table table-bordered mt-3">
        <thead>
            <tr align="center">
                <th scope="col">No.</th>
                <th scope="col" >Isi Kode Rekening</th>
                <th scope="col">Isi Nama Pekerjaan</th>
                <th scope="col">Isi Nama Perihal</th>
            </tr>
        </thead>
        @php
            $no=1;
        @endphp
        <tbody>
            @foreach ($datapekerjaan as $data)
                <tr>
                    <th scope="row" class="text-center">{{$no}}</th>
                    <td>{{$data->kode_rekening}}</td>
                    <td>{{$data->nama_pekerjaan}}</td>
                    <td>{{$data->nama_perihal}}</td>
                    <td align="center">
                        <div class="d-inline-flex gap-2">
                                <a class="btn btn-outline-warning" href="pekerjaan/{{$data->id_pekerjaan}}/edit" role="button">Edit</a>
                                <form action="pekerjaan/{{$data->id_pekerjaan}}" method="post">
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
