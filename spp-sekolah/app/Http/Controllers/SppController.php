<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Spp;
class SppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spp = Spp::all();
        return view('spp.tampilspp', compact('spp'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('spp.createspp');
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
            Spp::create([
               'tahun' => $request->tahun,
                'nominal' => $request->nominal,
            ]);

            return redirect('spp/tampil')->with('sukses', 'Data Berhasil Ditambahkan✔✔');
        }catch(\Exception $e){
            return redirect('spp/tampil')->with('gagal', 'Data Gagal Ditambahkan❌❌');
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
            $spp = Spp::findOrFail($id);
            return view('spp.editspp', compact('spp'));
        }catch(\Exception $e){
            return redirect('spp/tampil')->with('gagal', 'Data Tidak Ditemukan❌.');
        }
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
        try {
            Spp::where('id', $request->id)->update([
                'tahun' => $request->tahun,
                'nominal' => $request->nominal,
            ]);

            return redirect('spp/tampil')->with('sukses', 'Data Berhasil Diupdate✔✔');
        }catch(\Exception $e){
            return redirect('spp/tampil')->with('gagal', 'Data Gagal Diupdate❌❌');
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
            Spp::findOrFail($id);
            Spp::destroy($id);

            return redirect('spp/tampil')->with('sukses', 'Data Berhasil Dihapus✔✔');
        }catch(\Exception $e){
            return redirect('spp/tampil')->with('gagal', 'Data Gagal Dihapus❌❌');
        }
    }
}

?>
