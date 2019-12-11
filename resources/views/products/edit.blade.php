@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Data Produk</h3>
                    </div>
                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form action="{{ url('/product/' . $product->id) }}" method="post">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="">Nama Produk</label>
                                <input type="text" name="nama_barang" class="form-control @error('nama_barang') is-invalid @enderror" value="{{ $product->nama_barang }}" placeholder="Masukkan nama produk">
                                <p class="text-danger">{{ $errors->first('nama_barang')}}</p>
                            </div>
                            <div class="form-group">
                                <label for="">Deskripsi</label>
                                <textarea name="deskripsi" cols="10" rows="10" class="form-control @error('deskripsi') is-invalid @enderror">{{ $product->deskripsi}}</textarea>
                                <p class="text-danger">{{ $errors->first('deskripsi')}}</p>
                            </div>
                            <div class="form-group">
                                <label for="">Harga</label>
                                <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror" value="{{ $product->harga }}">
                                <p class="text-danger">{{ $errors->first('harga')}}</p>
                            </div>
                            <div class="form-group">
                                <label for="">Stok</label>
                                <input type="number" name="stok" class="form-control @error('stok') is-invalid @enderror" value="{{ $product->stok }}">
                                <p class="text-danger">{{ $errors->first('stok')}}</p>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-sm">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection