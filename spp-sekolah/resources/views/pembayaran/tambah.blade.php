@extends('main.bootstrap')

@section('content')
<div class="text-center py-5 h-100 bg-dark text-white">
    <h3>Kelola User</h3>
</div>

<div class="container mt-4">
    <div class="d-flex justify-content-between">
        <div>
            <h4>Tambah User</h4>
        </div>
        <a href="{{ url('user') }}" class="btn btn-warning">Kembali</a>
    </div>
    <hr>
    <form action="{{ url('/user/simpan') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="Nama">Nama</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="Email">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="Password">Password</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="level">level</label>
            <select name="level" id="" class="form-select" required>
                <option value="" disabled selected>pilih level user</option>
                <option value="Admin">Admin</option>
                <option value="Petugas">Petugas</option>
                <option value="Siswa">Siswa</option>
            </select>
        </div>

        <div class="mt-3 text-end">
            <button type="reset" class="btn btn-secondary">reset</button>
            <button type="submit" class="btn btn-success">simpan</button>
        </div>
    </form>
</div>
@endsection