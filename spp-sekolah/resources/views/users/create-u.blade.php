@extends('main.navbar')

@section('content')
    <section id="hero" class="bg-dark py-5">
        <div class="container">
            <div class="text-center text-white">
                <h1>USER</h1>
                <h4>Tambah User Pembayaran SPP Sekolah </h4>
            </div>
        </div>
    </section>

    <section id="blog" class="mt-4">
        <div class="container">
            <div class="row mt-5 gy-4 justify-content-center">
                <div class="col-lg-10">
                    <div class="row mb-3">
                        <div class="col">
                            <h2>Add Users</h2>
                        </div>
                        <div class="col text-end">
                            <a href="{{ url('user/tampil') }}" class="btn btn-warning">Back</a>
                        </div>
                    </div>
                    <form action="{{ url('user/store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="name">Nama</label>
                            <input type="text" name="name" id="name" class="form-control" />
                        </div>
                        <div class="form-group mb-2">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" class="form-control" />
                        </div>
                        <div class="form-group mb-2">
                            <label for="password">Password</label>
                            <input type="text" name="password" id="password" class="form-control mb-2" />
                        </div>
                        <div class="form-group">
                            <label for="level">level</label>
                            <select name="level" id="level" class="form-select">
                                <option value="" disabled selected>-Pilih Level-</option>
                                <option value="admin">Admin</option>
                                <option value="petugas">Petugas</option>
                                <option value="siswa">Siswa</option>
                            </select>
                        </div>
                        <div class="mt-3 mb-5">
                            <button type="submit" class="btn btn-success">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
