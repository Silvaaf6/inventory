<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\hobby;
use App\Models\profile;
use Illuminate\Http\Request;

class HobbyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); 
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hobby = hobby::paginate(2);
        confirmDelete('Hapus!', 'Anda Yakin Akan Menghapus?');
        return view('hobby.index', compact('hobby'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $hobby = hobby::all();
        return view('hobby.create', compact('hobby'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_hobby' => 'required|unique:hobbies',
        ], [
            'nama_hobby.required' => 'nama hobby harus diisi',
        ]);

        $hobby = new hobby;
        $hobby->nama_hobby = $request->nama_hobby;
        $hobby->save();
        Alert::success('Sukses', 'Data Berhasil Di Tambahkan')->autoClose(1000);
        return redirect()->route('hobby.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(hobby $hobby)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $hobby = hobby::findOrFail($id);
        return view('hobby.edit', compact('hobby'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_hobby' => 'required|unique:hobbies',
        ]);

        $hobby = hobby::find($id);
        $hobby->nama_hobby = $request->nama_hobby;
        $hobby->save();
        Alert::success('Sukses', 'Data Berhasil Di Ubah')->autoClose(1000);
        return redirect()->route('hobby.index', ['id' => $id]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $hobby = hobby::findOrFail($id);
        $hobby->delete();
        Alert::success('Sukses', 'Data Berhasil Di Hapus')->autoClose(1000);
        return redirect()->route('hobby.index');

    }
}
