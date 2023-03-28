@extends('main.navbar')

@section('content')
    <section id="hero" class="bg-dark py-5">
        <div class="container">
            <div class="text-center text-white">
                <h1>SISWA</h1>
                <h4>Edit Data Siswa</h4>
            </div>
        </div>
    </section>

    <section id="spp" class="mt-4">
        <div class="container">
            <div class="row mt-5 gy-4 justify-content-center">
                <div class="col-lg-10">
                    <div class="row mb-3">
                        <div class="col">
                            <h2>Edit Data Siswa</h2>
                        </div>
                        <div class="col text-end">
                            <a href="{{ url('/siswa/tampil') }}" class="btn btn-warning">Back</a>
                        </div>
                    </div>
                    <form action="{{ url('/siswa/update' . '/' . $siswa->id) }}" method="post">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="name">Nama</label>
                            <select name="user" id="user" class="form-select">
                                <option value="">Silahkan Pilih</option>
                                @foreach ($user as $user)
                                    <option value="{{ $user->id }}" {{ $siswa->user_id == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <label for="nis">NIS</label>
                            <input type="text" name="nis" id="nis" class="form-control"
                                value="{{ $siswa->nis }}" />
                        </div>
                        <div class="form-group mb-2">
                            <label for="kelas">Kelas</label>
                            <select name="kelas" id="kelas" class="form-select">
                                <option value="">Silahkan Pilih</option>
                                @foreach ($kelas as $kelas)
                                    <option value="{{ $kls->id }}"
                                        {{ $siswa->kelas_id == $kelas->id ? 'selected' : '' }}>{{ $kelas->kelas }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control">{{ $siswa->alamat }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="no_telp">No.Telp</label>
                            <input type="text" name="no_telp" id="no_telp" class="form-control mb-2"
                                value="{{ $siswa->no_telp }}" />
                        </div>
                        <div class="form-group">
                            <label for="dibayarkan">SPP</label>
                            <select name="spp" id="spp" class="form-select">
                                <option value="">Silahkan Pilih</option>
                                @foreach ($spp as $spp)
                                    <option value="{{ $spp->id }}" {{ $siswa->spp_id == $spp->id ? 'selected' : '' }}>{{ $sp->nominal }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mt-3 mb-5">
                            <button type="submit" class="btn btn-primary">Add</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
