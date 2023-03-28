@extends('main.bootstrap')

@section('content')
<div class="text-center py-5 h-100 bg-dark text-white">
    <h3>Transaksi SPP</h3>
</div>
<div class="container mt-4"></div>
    <div class="d-flex justify-content-center text-center">
    <div class="card text-bg-success ms-5 me-2 w-100">
        <div class="card-header">
            <b>Total Dibayar</b>
        </div>
        <div class="card-body">
           <h3>Rp. {{ $total['total_dibayar'] }}</h3>
        </div>
    </div>

    <div class="card text-bg-danger me-5 ms-2 w-100">
        <div class="card-header"></div>
            <b>Total Belum Dibayar</b>
        <div class="card-body">
           <h3>Rp. {{ $total['total_belumdibayar'] }}</h3>
        </div>
    </div>
    </div>
    <hr>
    @if(Session::has('sukses'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Sukses!</strong> {{ Session::get('sukses') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @elseif(Session::has('gagal'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Gagal!</strong> {{ Session::get('gagal') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="d-flex justify-content-between">
        <div>
            <h4>History Transaksi</h4>
        </div>
        <div class="d-flex justify-content-center align-items-center">
            <div class="me-2"><b>NIS : {{ $siswa->nis }}</b></div>
            <div class="me-2"><b>Nama : {{ $siswa->user->name }}</b></div>
            <div><b>Kelas : {{ $siswa->kelas->kelas }}</b></div>
        </div>
        <div>
            <a href="{{url ('pembayaran')}}" class="btn btn-warning">Kembali</a>
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Tambah
</button>

        </div>
    </div>
    <hr>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Petugas</th>
                <th>Tanggal</th>
                <th>SPP</th>
                <th>Jumlah Bayar</th>
                <th>Kelola</th>
            </tr>
        </thead>

        <tbody>
            @if($pembayaran->count() == 0)
            <tr class="text-center">
                <td colspan="6"><strong>Belum ada transaksi.</strong></td>
            </tr>
            @else
            @foreach($pembayaran as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->user->name }}</td>
                <td>{{ $data->tanggal_bayar }}</td>
                <td>{{ $data->spp->tahun }}</td>
                <td>{{ 'Rp.' . $data->jumlah_bayar }}</td>
                <td>
                    <a href='{{ url("/spp/hapus/$data->id") }}' class="btn btn-sm btn-danger">Hapus</a>
                    <a href='{{ url("/spp/edit/$data->id") }}' class="btn btn-sm btn-primary">Edit</a>
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>

    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Transaksi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ url('pembayaran/simpan')}}" method="post">
            @csrf
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
            <input type="hidden" name="siswa_id" value="{{ $siswa->id }}">
        <div class="form-group">
            <label for="petugas">Petugas</label>
            <input type="text" name="petugas" id="petugas" readonly value="{{ auth()->user()->name }}" class="form-control" required>
        </div>
        <div class="form-group mt-2">
            <label for="siswa">Siswa</label>
            <input type="text" name="siswa" id="siswa" readonly value="{{ $siswa->user->name }}" class="form-control" required>
        </div>
        
        <div class="form-group mt-2">
           <label for="spp_id">SPP</label>
           <select name="spp_id" id="spp_id" class="form-select" required>
            <option value="" selected disabled>-Pilih SPP-</option>
            @foreach($spp as $data)
            @php $kurang = $data->nominal - $pembayaranSPP[$loop->iteration-1]; $kurangnya = "(Rp. $kurang)" @endphp
            <option value="{{ $data->id }}" {{ $pembayaranSPP[$loop->iteration-1] >= $data->nominal ? 'disabled' : '' }}> {{ $data->tahun . ' - Rp.' . $data->nominal }} {{ $pembayaranSPP[$loop->iteration-1] >= $data->nominal ? '(LUNAS)' : $kurangnya }} </option>
            @endforeach
           </select>
        </div>

        <div class="form-group mt-2">
            <label for="tanggal_bayar">Tanggal</label>
            <input type="date" name="tanggal_bayar" id="tanggal_bayar" class="form-control">
        </div>
        <div class="form-group">
            <label for="jumlah_bayar">Jumlah Bayar</label>
            <input type="number" name="jumlah_bayar" id="jumlah_bayar" class="form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="sumbit" class="btn btn-success">Simpan</button>
      </div>
    </div>
  </div>
  </form>
</div>
</div>
@endsection