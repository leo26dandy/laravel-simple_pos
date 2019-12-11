@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="card-title">Data Produk</h3>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ url('/product/create') }}" class="btn btn-primary btn-sm float-right">Tambah Data</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {!! session('success') !!}
                            </div>
                        @endif
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama Produk</th>
                                    <th>Deskripsi</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    {{-- <th>Tanggal</th> --}}
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $product)
                                <tr>
                                    <td>{{ $product->nama_barang }}</td>
                                    <td>{{ str_limit($product->deskripsi, 50) }}</td>
                                    <td>Rp {{ number_format($product->harga) }}</td>
                                    <td>{{ $product->stok }}</td>
                                    {{-- <td>{{ $product->created_at->format('d-m-Y') }}</td> --}}
                                    <td>
                                        <form action="{{ url('/product/' . $product->id )}}" method="POST">
                                            @csrf
                                            <a href="{{ url('/product/' . $product->id . '/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="6">Tidak ada data</td>
                                    </tr>    
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection