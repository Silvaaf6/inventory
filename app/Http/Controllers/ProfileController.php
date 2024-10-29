<?php

namespace App\Http\Controllers;

use App\Models\hobby;
use App\Models\profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
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
        $hobby = Hobby::all();
        $profile = Profile::where('id_user', Auth::id())->first();

        // dd($profile);
        return view('profile.index', compact('profile', 'hobby'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $hobi = Hobby::all();
        return view('profile.create', compact('hobi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required|date|before_or_equal:' . now()->subYears(13)->format('Y-m-d'),
            'agama' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'no_telp' => 'required',
            'id_hobby' => 'required',

        ], [
            'username.required' => 'nama penulis harus diisi',
            'tempat_lahir.required' => 'tempat lahir harus diisi',
            'tgl_lahir.required' => 'tanggal lahir harus diisi',
            'agama.required' => 'agama harus diisi',
            'alamat.required' => 'alamat harus diisi',
            'jenis_kelamin.required' => 'jenis kelamin harus diisi',
            'no_telp.required' => 'no telepon harus diisi',
            'id_hobby.required' => 'hobi harus dipilih',
        ]);

        $profile = new profile;
        $profile->id_user = auth()->user()->id; // Ambil ID dari user yang login
        $profile->username = $request->username;
        $profile->tempat_lahir = $request->tempat_lahir;
        $profile->tgl_lahir = $request->tgl_lahir;
        $profile->agama = $request->agama;
        $profile->alamat = $request->alamat;
        $profile->jenis_kelamin = $request->jenis_kelamin;
        $profile->no_telp = $request->no_telp;
        $profile->id_hobby = $request->id_hobby;

        //upload image
        if ($request->hasFile('cover')) {
            $img = $request->file('cover');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/profile/', $name);
            $profile->cover = $name;
        }

        $profile->save();
        return redirect()->route('profile.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $profile = profile::find($id);
        $hobi = Hobby::all();
        return view('profile.edit', compact('profile', 'hobi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'username' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required|date|before_or_equal:' . now()->subYears(13)->format('Y-m-d'),
            'agama' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'no_telp' => 'required',
            'id_hobby' => 'required',

        ], [
            'username.required' => 'nama penulis harus diisi',
            'tempat_lahir.required' => 'tempat lahir harus diisi',
            'tgl_lahir.required' => 'tanggal lahir harus diisi',
            'agama.required' => 'agama harus diisi',
            'alamat.required' => 'alamat harus diisi',
            'jenis_kelamin.required' => 'jenis kelamin harus diisi',
            'no_telp.required' => 'no telepon harus diisi',
            'id_hobby.required' => 'hobi harus dipilih',
        ]);

        $profile = profile::findOrFail($id);
        $profile->id_user = auth()->user()->id; // Ambil ID dari user yang login
        $profile->username = $request->username;
        $profile->tempat_lahir = $request->tempat_lahir;
        $profile->tgl_lahir = $request->tgl_lahir;
        $profile->agama = $request->agama;
        $profile->alamat = $request->alamat;
        $profile->jenis_kelamin = $request->jenis_kelamin;
        $profile->no_telp = $request->no_telp;
        $profile->id_hobby = $request->id_hobby;

//upload image
        if ($request->hasFile('cover')) {
            $img = $request->file('cover');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/profile/', $name);
            $profile->cover = $name;
        }

        $profile->save();
        return redirect()->route('profile.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(profile $profile)
    {
        //
    }
}
