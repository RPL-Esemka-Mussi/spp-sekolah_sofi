<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\SPP;
use App\Models\pembayaran;


use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index(Request $request)
    {
        $keyword = null;

       if($request->cari != null) {
          $siswa = Siswa::with('user')->whereRelation('user', 'name', 'like', "%$request->cari%")->orderBy('kelas_id', 'ASC')->get();
          $keyword = $request->cari;
       }else{
        $siswa = Siswa::orderBy('kelas_id', 'ASC')->get();
       }
       
        return view('pembayaran.index', compact('siswa', 'keyword'));
    }

    public function transaksi($id)
    {
        $dibayar = 0;
        $tagihan = 0;
        $pembayaranSPP = [];

        try{
            $siswa = Siswa::findOrFail($id);
            $pembayaran = Pembayaran::where('siswa_id', $id)->get();
            $spp = SPP::get();

            foreach ($pembayaran as $data)
            {
                $dibayar += $data->jumlah_bayar;
            }

            foreach ($spp as $data)
            {
                $tagihan += $data->nominal;
            }

            $total = [
                'total_dibayar' => $dibayar,
                'total_belumdibayar' => $tagihan - $dibayar
            ];
        }

        catch (\Exception $e)
        {
            return redirect('pembayaran')->with('gagal'. 'Data tidak ditemukan.');
        }

        return view('pembayaran.transaksi', compact('spp', 'pembayaran', 'siswa', 'total', 'pembayaranSPP'));
    }

    public function simpan(Request $request)
    {
        try{
            Pembayaran::create([
                'user_id' => auth()->user()->id,
                'siswa_id' => $request->siswa_id,
                'spp_id' => $request->spp_id,
                'tanggal_bayar' => $request->tanggal_bayar,
                'jumlah_bayar' => $request->jumlah_bayar,
            ]);

            return redirect()->back()->with('sukses'. 'Transaksi berhasil disimpan.');

        }
        catch (\Exception $e)
        {
            return redirect()->back()->with('gagal'. 'Transaksi gagal diproses.');
        }
    }
}
