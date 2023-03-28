@extends('main.navbar')

@section('content')
    <section id="hero" class="bg-dark py-5">
        <div class="container">
            <div class="text-center text-white">
                <h1>KELAS</h1>
                <h4>Tambah Kelas Siswa</h4>
            </div>
        </div>
    </section>

    <section id="blog" class="mt-4">
        <div class="container">
            <div class="row mt-5 gy-4 justify-content-center">
                <div class="col-lg-8">
                    <div class="row mb-3">
                        <div class="col">
                            <h2>Add Kelas</h2>
                        </div>
                        <div class="col text-end">
                            <a href="{{ url('/kelas/tampil') }}" class="btn btn-warning">Back</a>
                        </div>
                    </div>
                    <form action="{{ url('/kelas/store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="kelas">Kelas</label>
                            <input type="text" name="kelas" id="kelas" class="form-control" />
                        </div>
                        <div class="form-group mb-2">
                            <label for="kompetensi_keahlian">Kompetensi Keahlian</label>
                            <input type="text" name="kompetensi_keahlian" id="kompetensi_keahlian" class="form-control" />
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
