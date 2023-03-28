@extends('main.navbar')

@section('content')
    <section id="hero" class="bg-dark py-5">
        <div class="container">
            <div class="text-center text-white">
                <h1>KELAS</h1>
                <h4>Detail Kelas Siswa</h4>
            </div>
        </div>
    </section>

    <section id="kelas" class="mt-4">
        <div class="container">
            <div class="row mt-5 gy-4 justify-content-center">
                <div class="col-lg-8">
                    <div class="row mb-3">
                        <div class="col">
                            <h4>List Kelas</h4>
                        </div>
                        <div class="col text-end">
                            <a href="{{ url('/kelas/tambah') }}" class="btn btn-success"><i class="bi bi-plus-circle"></i>
                                Add Kelas</a>
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
                            <th>Kelas</th>
                            <th>Kompetensi Keahlian</th>
                        </thead>
                        <tbody>
                        @if($kelas->count() == 0)
                            <tr class="text-center">
                                <td colspan="4"><strong>Belum ada data.</strong></td>
                            </tr>
                        @else
                            @foreach ($kelas as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->kelas }}</td>
                                    <td>{{ $data->kompetensi_keahlian }}</td>
                                    <td>
                                        <div class="d-grid">
                                            <a href="{{ "/kelas/edit/$data->id" }}"
                                               class="btn btn-sm btn-primary mb-1"><i class="bi bi-pencil-fill"></i> Edit</a>
                                            <a href="{{ "/kelas/destroy/$data->id" }}"
                                               class="btn btn-sm btn-danger"><i class="bi bi-trash3-fill"></i> Hapus</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
