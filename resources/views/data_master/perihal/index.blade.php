@extends('data_master.layouts.main')
@section('content')
@section('page_title','Data_perihal')
<div class="#">
    <h1>Data Seluruh Perihal</h1>
    <hr>
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{session('success')}}
        </div>    
    @elseif (session()->has('error'))
         <div class="alert alert-danger" role="alert">
            {{session('error')}}
        </div>
    @endif
    <a class="btn btn-primary mt-1" href="{{'perihal/create'}}" role="button">Create</a>
    <table class="table table-bordered mt-3">
        <thead>
          <tr align="center">
            <th scope="col">No</th>
            <th scope="col">Nama Perihal</th>
            <th scope="col">Keterangan Perihal</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        @php
            $no=1;
        @endphp
        <tbody>
    @foreach ($dataperihal as $data)
    <tr>
    <th scope="row" class="text-center">{{$no}}</th>
    <td>{{ $data->nama_perihal }}</td>
    <td>{{ $data->ket_perihal }}</td>
    <td align="center">
        <div class="d-inline-flex gap-2">
        <a class="btn btn-outline-warning" href="perihal/{{$data->id_perihal}}/edit" role="button">Edit</a>
        <form action="perihal/{{$data->id_perihal}}" method="post">
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
@endsection