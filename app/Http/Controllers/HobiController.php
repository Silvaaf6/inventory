<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\hobi;
use App\Models\profile;
use Illuminate\Http\Request;

class HobiController extends Controller
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
        $hobi = Hobi::paginate(2);
        confirmDelete('Hapus!', 'Anda Yakin Akan Menghapus?');
        return view('hobi.index', compact('hobi'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $hobi = Hobi::all();
        return view('hobi.create', compact('hobi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_hobi' => 'required|unique:hobis',
        ], [
            'nama_hobi.required' => 'nama hobi harus diisi',
        ]);

        $hobi = new Hobi;
        $hobi->nama_hobi = $request->nama_hobi;
        $hobi->save();
        Alert::success('Sukses', 'Data Berhasil Di Tambahkan')->autoClose(1000);
        return redirect()->route('hobi.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(hobi $hobi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $hobi = Hobi::findOrFail($id);
        return view('hobi.edit', compact('hobi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_hobi' => 'required|unique:hobis',
        ]);

        $hobi = Hobi::find($id);
        $hobi->nama_hobi = $request->nama_hobi;
        $hobi->save();
        Alert::success('Sukses', 'Data Berhasil Di Ubah')->autoClose(1000);
        return redirect()->route('hobi.index', ['id' => $id]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $hobi = Hobi::findOrFail($id);
        $hobi->delete();
        Alert::success('Sukses', 'Data Berhasil Di Hapus')->autoClose(1000);
        return redirect()->route('hobi.index');

    }
}
