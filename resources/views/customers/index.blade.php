@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="card-title">Data Pelanggan</h3>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ url('/customer/create') }}" class="btn btn-primary btn-sm float-right">Tambah Data</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{!! session('success') !!}}
                            </div>
                        @endif
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama Lengkap</th>
                                    <th>Nomor Telepon</th>
                                    <th>Alamat</th>
                                    <th>Email</th>
                                    <th colspan="2">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($customers as $customer)
                                <tr>
                                    <td>{{ $customer->nama }}</td>
                                    <td>{{ str_limit($customer->telp, 10) }}</td>
                                    <td>{{ str_limit($customer->alamat, 20) }}</td>
                                    <td><a href="mailto:{{ $customer->email }}">{{ str_limit($customer->email, 20) }}</a></td>
                                    <td>
                                        <form action="{{ url('/customer/' . $customer->id)}}" method="post">
                                            @csrf
                                            <a href="{{ url('/customer/' . $customer->id . '/edit')}}" class="btn btn-warning btn-sm">Edit</a>
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{ route('invoice.store') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="customer_id" value="{{ $customer->id }}" class="form-control">
                                            <button class="btn btn-primary btn-sm">Buat Invoice</button>
                                        </form>
                                    </td>
                                </tr>    
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="5">Tidak ada data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="float-right">
                            {{ $customers->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection