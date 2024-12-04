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
        <h1 class="text-2xl font-bold mb-2 text-center mt-5">--- Daftar Buku ---</h1>
        <div class="card prose container px-8 py-3 mt-4">
            <div class="py-2">
                @can('create_buku')
                    <a href="{{ route('buku.create') }}"
                        class="bg-gray-500 hover:bg-blue-700 text-white py-2 px-4 rounded mx-2 no-underline">
                        Tambah
                    </a>
                @endcan
            </div>
            <div class="overflow-x-auto"> <!-- Tambahkan ini untuk membuat tabel responsif -->
                <table class="table-auto w-full border border-slate-400">
                    <thead>
                        <tr>
                            <th class="px-2 py-3 text-center border border-slate-300">NO</th>
                            <th class="px-2 py-3 text-center border border-slate-300">Sampul</th>
                            <th class="px-2 py-3 text-center border border-slate-300">Judul</th>
                            <th class="px-2 py-3 text-center border border-slate-300">Kategori</th>
                            <th class="px-2 py-3 text-center border border-slate-300">Penulis</th>
                            <th class="px-2 py-3 text-center border border-slate-300">Jumlah Halaman</th>
                            <th class="px-2 py-3 text-center border border-slate-300">Penerbit</th>
                            <th class="px-2 py-3 text-center border border-slate-300">Tanggal Terbit</th>
                            @can(['edit_buku', 'delete_buku'])
                                <th class="px-2 py-3 text-center border border-slate-300">Aksi</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = ($buku->currentPage() - 1) * $buku->perPage() + 1; @endphp
                        @foreach ($buku as $data)
                            <tr>
                                <td class="text-center border px-2 py-2 align-middle">{{ $no++ }}</td>
                                <td class="text-center border px-2 py-2">
                                    <img src="{{ asset('/images/buku/' . $data->cover) }}" width="100" class="mx-auto">
                                </td>
                                <td class="text-center border px-2 py-2 align-middle">{{ $data->judul }}</td>
                                <td class="text-center border px-2 py-2 align-middle">{{ $data->kategori->nama_kategori }}
                                </td>
                                <td class="text-center border px-2 py-2 align-middle">{{ $data->penulis }}</td>
                                <td class="text-center border px-2 py-2 align-middle">{{ $data->jml_hlmn }}</td>
                                <td class="text-center border px-2 py-2 align-middle">{{ $data->penerbit }}</td>
                                <td class="text-center border px-2 py-2 align-middle">{{ $data->tgl_terbit }}</td>
                                <td class="border text-center px-2 py-2 align-middle">
                                    @can('edit_buku')
                                        <a href="{{ route('buku.edit', $data->id) }}"
                                            class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded mx-2 no-underline">
                                            Edit
                                        </a>
                                    @endcan
                                    @can('delete_buku')
                                        <a href="{{ route('buku.destroy', $data->id) }}"
                                            class="bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded mx-2 no-underline"
                                            data-confirm-delete="true">
                                            Hapus
                                        </a>
                                    @endcan
                                    {{-- <form action="{{ route('buku.destroy', $data->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-700 hover:bg-red-800 text-white py-2 px-4 rounded mx-2 no-underline">
                                        Hapus
                                    </button>
                                </form> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="flex justify-end">
                <button class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded mt-3">
                    <a class="text-light no-underline" href="{{ route('home') }}"> Kembali</a>
                </button>
            </div>
            <div class="mt-4">
                {{ $buku->links() }}
            </div>
        </div>
    @endsection

</body>

</html>
