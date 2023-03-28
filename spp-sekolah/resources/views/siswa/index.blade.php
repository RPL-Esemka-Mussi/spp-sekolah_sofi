@extends('main.navbar')

@section('content')
    <section id="hero" class="bg-dark py-5">
        <div class="container">
            <div class="text-center text-white">
                <h1>SISWA</h1>
                <h4>Detail Siswa</h4>
            </div>
        </div>
    </section>
    <section id="blog" class="mt-4">
        <div class="container">
            <div class="row mt-5 gy-4 justify-content-center">
                <div class="col-lg-10">
                    <div class="row mb-3">
                        <div class="col">
                            <h2>List Siswa </h2>
                        </div>
                        <div class="col text-end">
                            <a href="{{ url('/siswa/tambah') }}" class="btn btn-success"><i class="bi bi-plus-circle"></i>
                                Add Siswa</a>
                        </div>
                    </div>
                    <table class="table table-striped table-bordered">
                        <thead align="center">
                            <th>No</th>
                            <th>Nama</th>
                            <th>NIS</th>
                            <th>Kelas</th>
                            <th>Alamat</th>
                            <th>No.Telp</th>
                            <th>Dibayarkan</th>
                            <th><i class="bi bi-gear-fill"></i></th>
                        </thead>
                        @foreach ($data as $dataSiswa)
                            <tbody>
                                <tr>
                                    <td>{{ $dataSiswa->id }}</td>
                                    <td>{{ $dataSiswa->user->name }}</td>
                                    <td>{{ $dataSiswa->nis }}</td>
                                    <td>{{ $dataSiswa->kelas->kelas }}</td>
                                    <td>{{ $dataSiswa->alamat }}</td>
                                    <td>{{ $dataSiswa->no_telp }}</td>
                                    <td>{{ $dataSiswa->spp->nominal }}</td>
                                    <td>
                                        <div class="d-grid">
                                            <a href="{{ url('/siswa/edit' . '/' . $dataSiswa->id) }}" class="btn btn-sm btn-primary mb-1"><i
                                                    class="bi bi-pencil-fill"></i> Edit</a>
                                            <a href="{{ url('/siswa/destroy' . '/' . $dataSiswa->id) }}" class="btn btn-sm btn-danger"><i
                                                    class="bi bi-trash3-fill"></i> Hapus</a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
