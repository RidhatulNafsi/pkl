@extends('data_master.layouts.main')
@section('page_title','Data Kepala Bidang')
@section('content')

<div class="container">
    <h1>Data Seluruh Kepala Bidang</h1>
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

    <a class="btn btn-primary mt-1" href="{{url('admin/kabid/create')}}" role="button">Tambah data kabid</a>
    <table class="table table-bordered mt-3">
        <thead>
            <tr align="center">
                <th scope="col">No.</th>
                <th scope="col" >Nama Kabid</th>
                <th scope="col" >NIP Kabid</th>
                <th scope="col" >Bidang Kabid</th>
                <th scope="col" >Status Kabid</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        @php
            $no=1;
        @endphp
        <tbody>
            @foreach ($datakabid as $data)
                <tr>
                    <th scope="row" class="text-center">{{$no}}</th>
                    <td>{{$data->nama_kabid}}</td>
                    <td>{{$data->nip_kabid}}</td>
                    <td>{{$data->bidang_kabid}}</td>
                    <td>@if ($data->status_kabid==1)
                        Aktif
                    @else
                        Tidak aktif
                    @endif</td>
                    <td align="center">
                        <div class="d-inline-flex gap-2">
                                <a class="btn btn-outline-warning" href="kabid/{{$data->id_kabid}}/edit" role="button">Edit</a>
                                <form action="kabid/{{$data->id_kabid}}" method="post">
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
