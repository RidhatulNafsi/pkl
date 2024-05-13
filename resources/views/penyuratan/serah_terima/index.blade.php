@extends('data_master.layouts.main')
@section('page_title', 'Data Surat Serah Terima Surat')
@section('content')

    <div class="container">
        <h1>Data Serah Terima</h1>
        <hr>
        @if (session()->has('success'))
            <div class="alert alert-success mt-1" role="alert">
                {{ session('success') }}
            </div>
        @elseif (session()->has('error'))
            <div class="alert alert-danger mt-1" role="alert">
                {{ session('error') }}
            </div>
        @endif
        
        <table class="table table-bordered mt-3">
            <thead>
                <tr align="center">
                    <th scope="col">No.</th>
                    <th scope="col">Nomor surat pesanan</th>
                    <th scope="col">Tanggal Surat</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            @php
                $no = 1;
            @endphp
            <tbody>
                @foreach ($dataTransaksi as $data)
                    <tr>
                        <th scope="row" class="text-center">{{ $no }}</th>
                        <td>{{ $data->no_surat_pesanan }}</td>
                        <td>{{ $data->tgl_surat_pesanan }}</td>
                        <td align="center">
                            <div class="d-inline-flex gap-2">
                                <a class="btn btn-outline-success" href="cetak-serah_terima/{{ $data->id_transaksi }}"
                                    role="button" target="_blank">Cetak</a>
                                <a class="btn btn-outline-warning" href="" role="button">Selesai</a>
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
