@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Data Pelanggan</h3>
                    </div>
                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form action="{{ url('/customer/' . $customer->id) }}" method="post">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="">Nama Lengkap</label>
                                <input type="text" name="nama" class="form-control {{ $errors->has('nama') ? 'is-invalid':'' }}" value="{{ $customer->nama }}" placeholder="Masukkan nama lengkap">
                                <p class="text-danger">{{ $errors->first('nama') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="">Alamat</label>
                                <textarea name="alamat" cols="5" rows="5" class="form-control {{ $errors->has('alamat') ? 'is-invalid':'' }}">{{ $customer->alamat }}</textarea>
                                <p class="text-danger">{{ $errors->first('alamat') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="">Nomor telepon</label>
                                <input type="text" name="telp" class="form-control {{ $errors->has('telp') ? 'is-invalid':'' }}" value="{{ $customer->telp }}">
                                <p class="text-danger">{{ $errors->first('telp') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid':'' }}" value="{{ $customer->email }}" readonly>
                                <p class="text-danger">{{ $errors->first('email') }}</p>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-danger btn-sm">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection