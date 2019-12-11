@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tambah Data Produk</h3>
                </div>  
                <div class="card-body">
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form action="{{ url('/product') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Nama Produk</label>
                            <input type="text" name="nama_barang" class="form-control {{ $errors->has('nama_barang') ? 'is-invalid':'' }}" placeholder="Masukkan nama produk">
                            <p class="text-danger">{{ $errors->first('nama_barang')}}</p>
                        </div>
                        <div class="form-group">
                            <label for="">Deskripsi</label>
                            <textarea name="deskripsi" cols="10" rows="10" class="form-control {{ $errors->has('deskripsi') ? 'is-invalid':'' }}"></textarea>
                            <p class="text-danger">{{ $errors->first('deskripsi')}}</p>
                        </div>
                        <div class="form-group">
                            <label for="">Harga</label>
                            <input type="number" name="harga" class="form-control {{ $errors->has('harga') ? 'is-invalid':'' }}">
                            <p class="text-danger">{{ $errors->first('harga')}}</p>
                        </div>
                        <div class="form-group">
                            <label for="">Stok</label>
                            <input type="number" name="stok" class="form-control {{ $errors->has('stok') ? 'is-invalid':'' }}">
                            <p class="text-danger">{{ $errors->first('stok')}}</p>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger btn-sm">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection