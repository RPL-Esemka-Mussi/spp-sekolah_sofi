@extends('main.navbar')

@section('content')
    <section id="hero" class="bg-dark py-5">
        <div class="container">
            <div class="text-center text-white">
                <h1>SPP</h1>
                <h4>Tambah SPP Siswa </h4>
            </div>
        </div>
    </section>

    <section id="blog" class="mt-4">
        <div class="container">
            <div class="row mt-5 gy-4 justify-content-center">
                <div class="col-lg-5">
                    <div class="row mb-3">
                        <div class="col">
                            <h2>Add SPP</h2>
                        </div>
                        <div class="col text-end">
                            <a href="{{ url('/spp/tampil') }}" class="btn btn-warning">Back</a>
                        </div>
                    </div>
                    <form action="{{ url('/spp/store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="tahun">Tahun</label>
                            <input type="text" name="tahun" id="tahun" class="form-control" />
                        </div>
                        <div class="form-group mb-2">
                            <label for="nominal">Nominal</label>
                            <input type="text" name="nominal" id="nominal" class="form-control" />
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
