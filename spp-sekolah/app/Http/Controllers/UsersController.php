<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();

        return view('users.tampil-u', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create-u');
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
            User::create([
                'nama' => $request->nama,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'level' => $request->level,
            ]);
            return redirect('user/tampil')->with('sukses', 'Data Berhasil Ditambahkan✔✔');
        }catch(\Exception $e){
            return redirect('user/tampil')->with('gagal', 'Data Gagal Ditambahkan❌❌');
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
            $user = User::findOrFail($id);
            return view('users.edit-u', compact('user'));

        }catch(\Exception $e){
            return redirect('user/tampil')->with('gagal', 'Data Tidak Ditemukan❌.');
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
            if($request->password != null){
                User::where('id', $request->id)->update([
                    'nama' => $request->nama,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                    'level' => $request->level,
                ]);
            }else{
                User::where('id', $request->id)->update([
                    'nama' => $request->nama,
                    'email' => $request->email,
                    'level' => $request->level
                ]);
            }
            return redirect('user/tampil')->with('sukses', 'Data Berhasil Diupdate✔✔');

        }catch (\Exception $e){
            return redirect('user/tampil')->with('gagal', 'Data Gagal Diupdate❌❌');
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
            User::findOrFail($id);
            User::destroy($id);

            return redirect('user/tampil')->with('sukses', 'Data Berhasil Dihapus✔✔');
        }catch (\Exception $e){
            return redirect('user/tampil')->with('gagal', 'Data Gagal Dihapus❌❌');
        }
    }
}

?>
