<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\buku;
use App\Models\kategori;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:read_buku', ['only' => ['index']]);
        $this->middleware('permission:create_buku', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit_buku', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete_buku', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $buku = buku::paginate(2);
        confirmDelete('Hapus!', 'Anda Yakin Akan Menghapus?');
        return view('buku.index', compact('buku'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('buku.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'id_kategori' => 'required',
            'penulis' => 'required',
            'jml_hlmn' => 'required|numeric|max:200',
            'penerbit' => 'required',
            'tgl_terbit' => 'required',
        ], [
            'judul.required' => 'judul buku harus diisi',
            'id_kategori.required' => 'jenis kategori harus dipillih',
            'penulis.required' => 'nama penulis harus diisi',
            'jml_hlmn.required' => 'jumlah halaman harus diisi',
            'penerbit.required' => 'nama penerbit harus diisi',
            'tgl_terbit.required' => 'tanggal terbit harus diisi',
        ]);

        $buku = new Buku();
        $buku->judul = $request->judul;
        $buku->id_kategori = $request->id_kategori;
        $buku->penulis = $request->penulis;
        $buku->jml_hlmn = $request->jml_hlmn;
        $buku->penerbit = $request->penerbit;
        $buku->tgl_terbit = $request->tgl_terbit;

        //upload image
        if ($request->hasFile('cover')) {
            $img = $request->file('cover');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/buku/', $name);
            $buku->cover = $name;
        }

        $buku->save();  
        Alert::success('Sukses', 'Data Berhasil Di Tambahkan')->autoClose(1000);
        return redirect()->route('buku.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(buku $buku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kategori = Kategori::all();
        $buku = Buku::findOrFail($id);
        return view('buku.edit', compact('buku', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'id_kategori' => 'required',
            'penulis' => 'required',
            'jml_hlmn' => 'required|numeric|max:200',
            'penerbit' => 'required',
            'tgl_terbit' => 'required',
        ], [
            'judul.required' => 'judul buku harus diisi',
            'id_kategori.required' => 'jenis kategori harus dipillih',
            'penulis.required' => 'nama penulis harus diisi',
            'jml_hlmn.required' => 'jumlah halaman harus diisi',
            'penerbit.required' => 'nama penerbit harus diisi',
            'tgl_terbit.required' => 'tanggal terbit harus diisi',
        ]);

        $buku = Buku::findOrFail($id);
        $buku->cover = $request->cover;
        $buku->judul = $request->judul;
        $buku->id_kategori = $request->id_kategori;
        $buku->penulis = $request->penulis;
        $buku->jml_hlmn = $request->jml_hlmn;
        $buku->penerbit = $request->penerbit;
        $buku->tgl_terbit = $request->tgl_terbit;

        //upload image
        if ($request->hasFile('cover')) {
            $buku->deleteImage();
            $img = $request->file('cover');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/buku', $name);
            $buku->cover = $name;
        } else {
            $buku->cover = $buku->getOriginal('cover');
        }

        $buku->save();
        Alert::success('Sukses', 'Data Berhasil Di Ubah')->autoClose(1000);
        return redirect()->route('buku.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);
        $buku->deleteImage();
        $buku->delete();
        Alert::success('Sukses', 'Data Berhasil Di Hapus')->autoClose(1000);
        return redirect()->route('buku.index');
    }
}
