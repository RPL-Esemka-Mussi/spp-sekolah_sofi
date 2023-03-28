@extends('main.navbar')

@section('content')
    <section id="hero" class="bg-dark py-5">
        <div class="container">
            <div class="text-center text-white">
                <h1>KELAS</h1>
                <h4>Edit Kelas Siswa </h4>
            </div>
        </div>
    </section>

    <section id="blog" class="mt-4">
        <div class="container">
            <div class="row mt-5 gy-4 justify-content-center">
                <div class="col-lg-8">
                    <div class="row mb-3">
                        <div class="col">
                            <h2>Edit Kelas</h2>
                        </div>
                        <div class="col text-end">
                            <a href="{{ url('/kelas/tampil') }}" class="btn btn-warning">Back</a>
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
                    <form action="{{ url("/kelas/update/$kelas->id") }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $kelas->id }}">
                        <div class="form-group mb-2">
                            <label for="kelas">Kelas</label>
                            <input type="text" name="kelas" id="kelas" class="form-control" value="{{ $kelas->kelas }}" />
                        </div>
                        <div class="form-group mb-2">
                            <label for="kompetensi_keahlian">Kompetensi Keahlian</label>
                            <input type="text" name="kompetensi_keahlian" id="kompetensi_keahlian" class="form-control" value="{{ $kelas->kompetensi_keahlian }}" />
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
