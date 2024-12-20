<?php

namespace App\Http\Controllers;

use App\Models\Hobi;
use App\Models\Profile;
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
        // $profile = Profile::where('id_user', Auth::id())->first();
        $user = auth()->user();

        $profile = $user->profile()->with('hobi')->first();

        $profile = Profile::where('id_user', auth()->id())->first();
        // dd($profile);

        // $profile = Profile::all();
        $hobi = Hobi::where('id_hobi');
        return view('profile.index', compact('profile', 'hobi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $existingProfile = Profile::where('id_user', auth()->id())->first();

        // if ($existingProfile) {
        //     // Jika sudah ada profil, arahkan ke halaman profil atau tampilkan pesan
        //     return redirect()->back()->with('error', 'Anda sudah memiliki profile!');
        // }

        $hobi = Hobi::all();
        return view('profile.create', compact('hobi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);

        // Cek apakah pengguna sudah memiliki profil
        $existingProfile = Profile::where('id_user', auth()->id())->first();

        // if ($existingProfile) {
        //     // Jika sudah ada profil, batalkan penyimpanan dan kembali ke halaman profil
        //     return redirect()->back()->with('error', 'Anda sudah memiliki profile!');
        // }

        $request->validate([
            'cover' => 'required|mimes:jpg,jpeg,png|max:65535',
            'username' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required|date|before_or_equal:' . now()->subYears(13)->format('Y-m-d'),
            'agama' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'no_telp' => 'required',
            'hobi' => 'required',

        ], [
            'cover.required' => 'Foto harus diisi',
            'username.required' => 'nama penulis harus diisi',
            'tempat_lahir.required' => 'tempat lahir harus diisi',
            'tgl_lahir.required' => 'tanggal lahir harus diisi',
            'agama.required' => 'agama harus diisi',
            'alamat.required' => 'alamat harus diisi',
            'jenis_kelamin.required' => 'jenis kelamin harus diisi',
            'no_telp.required' => 'no telepon harus diisi',
        ]);

        $profile = new Profile;
        $profile->id_user = auth()->user()->id; // Ambil ID dari user yang login
        $profile->username = $request->username;
        $profile->tempat_lahir = $request->tempat_lahir;
        $profile->tgl_lahir = $request->tgl_lahir;
        $profile->agama = $request->agama;
        $profile->alamat = $request->alamat;
        $profile->jenis_kelamin = $request->jenis_kelamin;
        $profile->no_telp = $request->no_telp;

        //upload image
        if ($request->hasFile('cover')) {
            $img = $request->file('cover');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/profile/', $name);
            $profile->cover = $name;
        }

        $profile->save();
        $profile->hobi()->attach($request->hobi);
        return redirect()->route('profile.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(profile $profile)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $profile = profile::findOrFail($id);
        $hobi = Hobi::all();
        return view('profile.edit', compact('profile', 'hobi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'cover' => 'mimes:jpg,jpeg,png|max:65535',
            'username' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required|date|before_or_equal:' . now()->subYears(13)->format('Y-m-d'),
            'agama' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'no_telp' => 'required',
            'hobi' => 'array', // Pastikan hobi berupa array
            'hobi.*' => 'integer|exists:hobis,id', // Validasi setiap hobi yang dipilih
        ], [
            'username.required' => 'Nama penulis harus diisi',
            'tempat_lahir.required' => 'Tempat lahir harus diisi',
            'tgl_lahir.required' => 'Tanggal lahir harus diisi',
            'agama.required' => 'Agama harus diisi',
            'alamat.required' => 'Alamat harus diisi',
            'jenis_kelamin.required' => 'Jenis kelamin harus diisi',
            'no_telp.required' => 'No telepon harus diisi',
        ]);

        $profile = Profile::findOrFail($id);
        $profile->id_user = auth()->user()->id; // Ambil ID dari user yang login
        $profile->username = $request->username;
        $profile->tempat_lahir = $request->tempat_lahir;
        $profile->tgl_lahir = $request->tgl_lahir;
        $profile->agama = $request->agama;
        $profile->alamat = $request->alamat;
        $profile->jenis_kelamin = $request->jenis_kelamin;
        $profile->no_telp = $request->no_telp;

        // Upload image
        if ($request->hasFile('cover')) {
            $img = $request->file('cover');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/profile/', $name);
            $profile->cover = $name;
        }

        $profile->save();
        $profile->hobi()->sync($request->hobi); // Sinkronkan hobi terpilih dengan tabel pivot
        return redirect()->route('profile.index')->with('success', 'Profil berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(profile $profile)
    {
        //
    }
}
