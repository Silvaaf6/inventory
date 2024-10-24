<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title></title>
</head>

<body class="bg-red-100">
    @extends('layouts.app')
    @section('content')
        <div class="flex items-center justify-center min-h-screen">
            <div class="bg-white shadow-md rounded-lg p-5 w-full max-w-lg">
                <h2 class="text-2xl font-semibold text-center text-gray-900">Tambah Kategori</h2>
                <form action="{{ route('kategori.store') }}" method="POST" role="form" enctype="multipart/form-data" class="mt-4">
                    @csrf
                    <div class="mb-4">
                        <label for="nama_kategori" class="block text-lg font-medium text-gray-700">Nama Kategori</label>
                        <input type="text" name="nama_kategori" id="nama_kategori" required
                            class="mt-3 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            placeholder="Masukkan Nama Kategori">
                        @error('nama_kategori')
                            <span class="text-red-700 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mt-8 flex items-center justify-between">
                        <a href="{{ route('kategori.index') }}"
                            class="no-underline bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">
                            Kembali
                        </a>

                        <button type="submit"
                            class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">
                            Simpan
                        </button>
                    </div>

                </form>
            </div>
        </div>
    @endsection
</body>


</html>
