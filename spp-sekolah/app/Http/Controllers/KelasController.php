<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelas = Kelas::all();
        return view('kelas.index', compact('kelas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kelas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            Kelas::create([
                'kelas' => $request->kelas,
                'kompetensi_keahlian' => $request->kompetensi_keahlian
            ]);

            return redirect('kelas/tampil')->with('sukses', 'Data Berhasil Ditambahkan✔✔');
        }catch(\Exception $e){
            return redirect('kelas/tampil')->with('gagal', 'Data Gagal Ditambahkan❌❌');
        }
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
        try {
            $kelas = Kelas::findOrFail($id);

            return view('kelas.edit', compact('kelas'));

        }catch(\Exception $e){
            return redirect('kelas/tampil')->with('gagal', 'Data Tidak Ditemukan❌.');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
            Kelas::where('id', $request->id)->update([
                'kelas' => $request->kelas,
                'kompetensi_keahlian' => $request->kompetensi_keahlian,
            ]);
            return redirect('kelas/tampil')->with('sukses', 'Data Berhasil Diupdate✔✔');

        }catch(\Exception $e){
            return redirect('kelas/tampil')->with('gagal', 'Data Gagal Diupdate❌❌');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Kelas::findOrFail($id);
            Kelas::destroy($id);

            return redirect('kelas/tampil')->with('sukses', 'Data Berhasil Dihapus✔✔');
        }catch(\Exception $e){
            return redirect('kelas/tampil')->with('gagal', 'Data Gagal Dihapus❌❌');
        }

    }
}

?>
