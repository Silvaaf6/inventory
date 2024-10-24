<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
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
        $kategori = Kategori::paginate(2);
        confirmDelete('Hapus!', 'Anda Yakin Akan Menghapus?');
        return view('kategori.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = kategori::all();
        return view('kategori.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|unique:kategoris',
        ], [
            'nama_kategori.required' => 'nama kategori harus diisi',
        ]);

        $kategori = new kategori;
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->save();
        Alert::success('Sukses', 'Data Berhasil Di Tambahkan')->autoClose(1000);
        return redirect()->route('kategori.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kategori = kategori::findOrFail($id);
        return view('kategori.edit', compact('kategori'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' => 'required|unique:kategoris',
        ]);

        $kategori = kategori::findOrFail($id);
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->save();
        Alert::success('Sukses', 'Data Berhasil Di Ubah')->autoClose(1000);
        return redirect()->route('kategori.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kategori = kategori::findOrFail($id);
        $kategori->delete();
        Alert::success('Sukses', 'Data Berhasil Di Hapus')->autoClose(1000);
        return redirect()->route('kategori.index');

    }
}
