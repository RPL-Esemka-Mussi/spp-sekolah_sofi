@extends('main.navbar')

@section('content')
    <section id="hero" class="bg-dark py-5">
        <div class="container">
            <div class="text-center text-white">
                <h1>USER</h1>
                <h4>Detail User Pembayaran SPP Sekolah </h4>
            </div>
        </div>
    </section>
    <section id="user" class="mt-4">
        <div class="container">
            <div class="row mt-5 gy-4 justify-content-center">
                <div class="col-lg-10">
                    <div class="row mb-3">
                        <div class="col">
                            <h2>List Users</h2>
                        </div>
                        <div class="col text-end">
                            <a href="{{ url('user/create') }}" class="btn btn-success"><i class="bi bi-plus-circle"></i> Add User</a>
                        </div>
                    </div>
                    @if(Session::has('sukses'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Sukses!</strong> {{ Session::get('sukses') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                        </div>
                    @elseif(Session::has('gagal'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Gagal!</strong> {{ Session::get('gagal') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <table class="table table-striped table-bordered">
                        <thead align="center">
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Level</th>
                            <th><i class="bi bi-gear-fill"></i></th>
                        </thead>
                        @foreach ($user as $data)
                            <tbody>
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td><span class="badge bg-secondary">{{ ucfirst($data->level) }}</span></td>
                                    <td>
                                        <div class="d-grid">
                                            <a href="{{ url("/user/edit/$data->id") }}"
                                                class="btn btn-sm btn-primary mb-1"><i class="bi bi-pencil-fill"></i> Edit</a>
                                            <a href="{{ url('/user/destroy' . '/' . $data->id) }}"
                                                class="btn btn-sm btn-danger"><i class="bi bi-trash3-fill"></i> Hapus</a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    @endsection
