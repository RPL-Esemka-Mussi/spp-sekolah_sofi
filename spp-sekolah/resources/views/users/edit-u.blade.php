@extends('main.navbar')

@section('content')
    <section id="hero" class="bg-dark py-5">
        <div class="container">
            <div class="text-center text-white">
                <h1>USER</h1>
                <h4>Edit User Pembayaran SPP Sekolah </h4>
            </div>
        </div>
    </section>

    <section id="blog" class="mt-4">
        <div class="container">
            <div class="row mt-5 gy-4 justify-content-center">
                <div class="col-lg-10">
                    <div class="row mb-3">
                        <div class="col">
                            <h2>Edit User</h2>
                        </div>
                        <div class="col text-end">
                            <a href="{{ url('/user/tampil') }}" class="btn btn-warning">Back</a>
                        </div>
                    </div>
                    <form action="{{ url('/user/update' . '/' . $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <div class="form-group mb-2">
                            <label for="name">Nama</label>
                            <input type="text" name="name" id="name" class="form-control"
                                value="{{ $user->name }}" />
                        </div>
                        <div class="form-group mb-2">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" class="form-control"
                                value="{{ $user->email }}" />
                        </div>
                        <div class="form-group mb-2">
                            <label for="password">Password</label><br>
                            <small>Diisi jika ingin diganti*</small>
                            <input type="text" name="password" id="password" class="form-control mb-2" />
                        </div>
                        <div class="form-group">
                            <label for="level">level</label>
                            <select name="level" id="level" class="form-select">
                                <option value="" disabled selected>-Pilih Level-</option>
                                <option value="admin" @if($user->level == 'admin') selected @endif>Admin</option>
                                <option value="petugas" @if($user->level == 'petugas') selected @endif>Petugas</option>
                                <option value="siswa" @if($user->level == 'siswa' ) selected @endif>Siswa</option>
                            </select>
                        </div>
                        <div class="mt-3 mb-5">
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
