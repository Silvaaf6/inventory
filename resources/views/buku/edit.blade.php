@extends('layouts.app')
@section('content')
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="bg-white p-8 rounded-lg shadow-lg w-[900px] mt-5">
            <h2 class="text-2xl font-bold  mb-6">Edit Data Buku</h2>
            <form action="{{ route('buku.update', $buku->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label for="judul" class="block text-sm font-medium leading-6 text-gray-900">
                            Judul
                        </label>
                        <input type="text" name="judul" id="judul" required
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            value="{{ $buku->judul }}">
                    </div>

                    <div>
                        <label for="id_kategori" class="block text-sm font-medium leading-6 text-gray-900">
                            Kategori
                        </label>
                        <select
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            name="id_kategori">
                            @foreach ($kategori as $data)
                                <option value="{{ $data->id }}">{{ $data->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="penulis" class="block text-sm font-medium text-gray-900">Penulis</label>
                        <input type="text" name="penulis" id="penulis"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            value="{{ $buku->penulis }}">
                    </div>

                    <div>
                        <label for="penerbit" class="block text-sm font-medium text-gray-900">Penerbit</label>
                        <input type="text" name="penerbit" id="penerbit"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            value="{{ $buku->penerbit }}">
                    </div>

                    <div>
                        <label for="jml_hlmn" class="block text-sm font-medium text-gray-900">Jumlah Halaman</label>
                        <input type="number" name="jml_hlmn" id="jml_hlmn"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            value="{{ $buku->jml_hlmn }}">
                    </div>

                    <div>
                        <label for="tgl_terbit" class="block text-sm font-medium text-gray-900">Tanggal Terbit</label>
                        <input type="date" name="tgl_terbit" id="tgl_terbit"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            value="{{ $buku->tgl_terbit }}">
                    </div>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Foto</label>
                    <img src="{{ asset('/images/buku/' . $buku->cover) }}" width="100" class="mb-2">
                    <input type="file" accept=".jpg,.jpeg,.png"
                        class="border rounded w-full py-2 px-3 text-gray-700 focus:outline-none @error('cover') border-red-500 @enderror"
                        name="cover" value="{{ $buku->cover }}">
                    @error('cover')
                        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <a href="{{ route('buku.index') }}"
                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Kembali
                    </a>
                    <button type="submit"
                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Edit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
