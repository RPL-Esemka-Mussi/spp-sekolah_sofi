<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Spp;
use App\Models\User;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Siswa::with('kelas')->get();

        return view('siswa.index', ['data' => $data])->with([
            'data', $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();
        $kelas = Kelas::all();
        $spp = Spp::all();
        return view('siswa.create', [
            'user' => $user,
            'kelas' => $kelas,
            'spp' => $spp,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            Siswa::create([
                'user_id' => $request->user,
                'nis' => $request->nis,
                'kelas_id' => $request->kelas,
                'alamat' => $request->alamat,
                'no_telp' => $request->no_telp,
                'spp_id' => $request->spp
            ]);

        return redirect('/siswa/tampil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $siswa = Siswa::find($id);
        $user = User::all();
        $kelas = Kelas::all();
        $spp = Spp::all();
        return view('siswa.edit', [
            'siswa' => $siswa,
            'user' => $user,
            'kelas' => $kelas,
            'spp' => $spp,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Siswa::findOrFail($id)->update([
            'user_id' => $request->user,
            'nis' => $request->nis,
            'kelas_id' => $request->kelas,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'spp_id' => $request->spp
        ]);

        return redirect('/siswa/tampil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Siswa::findOrFail($id);
        $item->delete();
        return redirect('/siswa/tampil');

    }
}
