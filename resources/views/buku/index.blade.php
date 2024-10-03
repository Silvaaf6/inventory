<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="./output.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>buku</title>
</head>

<body>
    @extends('layouts.app')
    @section('content')
        <div class="card prose container px-4 py-3">
            <h1 class="text-2xl font-bold mb-3 text-center">Daftar Buku</h1>
            <div class="px-6 py-4">
                <a href="{{ route('buku.create') }}"
                    class="bg-gray-500 hover:bg-blue-700 text-white py-2 px-4 rounded mx-2">
                    Tambah
                </a>
            </div>
            <table class="table-auto min-w-full border-separate border border-slate-400 ... ">
                <thead>
                    <tr>
                        <th class="px-2 text-center border border-slate-300 ...">NO</th>
                        <th class="px-2 text-center border border-slate-300 ...">Sampul</th>
                        <th class="px-2 text-center border border-slate-300 ...">Judul</th>
                        <th class="px-2 text-center border border-slate-300 ...">Kategori</th>
                        <th class="px-2 text-center border border-slate-300 ...">Penulis</th>
                        <th class="px-2 text-center border border-slate-300 ...">Jumlah Halaman</th>
                        <th class="px-2 text-center border border-slate-300 ...">Penerbit</th>
                        <th class="px-2 text-center border border-slate-300 ...">Tanggal Terbit</th>
                        <th width="220px" class="px-2 text-center border border-slate-300 ..."></th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach ($buku as $data)
                        <tr>
                            <th class="text-center border">{{ $no++ }}</th>
                            <td class="text-center border">
                                <img src="{{ asset('/images/buku/' . $data->cover) }}" width="100">
                                {{-- {{ $data->cover }} --}}
                            </td>
                            <td class="text-center border">{{ $data->judul }}</td>
                            <td class="text-center border">{{ $data->kategori->nama_kategori }}</td>
                            <td class="text-center border">{{ $data->penulis }}</td>
                            <td class="text-center border">{{ $data->jml_hlmn }}</td>
                            <td class="text-center border">{{ $data->penerbit }}</td>
                            <td class="text-center border">{{ $data->tgl_terbit }}</td>
                            <form action="{{ route('buku.destroy', $data->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <td class="border text-center">
                                    <a href="{{ route('buku.edit', $data->id) }}"
                                        class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded mx-2">
                                        Edit
                                    </a>
                                    <a href="{{route('buku.destroy', $data->id)}}" type="submit" class="bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded mx-2"
                                        data-confirm-delete="true">
                                        Hapus
                                    </a>
                                </td>
                            </form>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="flex justify-end">
                <button class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded mt-3">
                    <a class="text-light" href="{{ route('home') }}"> Kembali</a>
                </button>
            </div>
        </div>
    @endsection
</body>

</html>
