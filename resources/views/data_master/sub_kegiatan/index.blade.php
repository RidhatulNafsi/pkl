@extends('data_master.layouts.main')
@section('content')
@section('page_title','Data Sub Kegiatan')
    <div class="container">
        <h1>Data Seluruh Sub Kegiatan</h1>
        <hr>
        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{session('success')}}
            </div>
        @elseif (session()->has('error'))
            <div class="alert alert-success" role="alert">
                {{session('error')}}
            </div>
        @endif
        {{-- <a class="btn btn-primary mt-1" href="{{url('sub_kegiatan/create')}}" role="button">Create</a> --}}
        <a class="btn btn-primary mt-1" href="{{url('admin/tbh_sub_keg')}}" role="button">Create</a>
        <table class="table table-bordered mt-3">
            <thead>
              <tr align="center">
                <th scope="col">No</th>
                <th scope="col">Nama Kegiatan</th>
                <th scope="col">Nama Sub Kegiatan</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            @php
                $no=1;
            @endphp
            <tbody>
        @foreach ($datasubKegiatan as $data)
        
        <tr>
        <th scope="row" class="text-center">{{$no}}</th>
        @if ($data->kegiatan)
            <td>{{ $data->kegiatan->nama_kegiatan }}</td>
        @else
            <td>Data kegiatan tidak ditemukan.</td>
        @endif
        <td>{{ $data->nama_sub_kegiatan }}</td>
        <td align="center">
            <div class="d-inline-flex gap-2">
            <a class="btn btn-outline-warning" href="sub_kegiatan/{{$data->id_sub_kegiatan}}/edit" role="button">Edit</a>
            <form action="sub_kegiatan/{{$data->id_sub_kegiatan}}" method="post">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Apakah anda yakin menghapus data?')"> Delete</button>
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
    </div>
@endsection