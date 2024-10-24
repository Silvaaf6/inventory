<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="./output.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>kategori</title>
</head>

<body>
    @extends('layouts.app')
    @section('content')
        <h1 class="text-2xl font-bold mb-3 text-center mt-5">--- Daftar Kategori ---</h1>
        <div class="card prose container px-6 py-3 mt-4">
            <div class="px-6 py-4">
                <a href="{{ route('kategori.create') }}"
                    class="bg-gray-500 hover:bg-blue-700 text-white py-2 px-4 rounded mx-2 no-underline">
                    Tambah
                </a>
            </div>

            <!-- Tabel kategori -->
            <table class="border-collapse border border-slate-500 ...">
                <thead>
                    <tr>
                        <th class="text-center border border-slate-300 ...">NO</th>
                        <th class="px-2 text-center border border-slate-300 ...">Nama Kategori</th>
                        <th width="220px" class="px-2 text-center border border-slate-300 ...">Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = ($kategori->currentPage() - 1) * $kategori->perPage() + 1; @endphp
                    @foreach ($kategori as $data)
                        <tr>
                            <th class="text-center border">{{ $no++ }}</th>
                            <td class="text-center border">{{ $data->nama_kategori }}</td>
                            <form action="{{ route('kategori.destroy', $data->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <td class="border text-center">
                                    <a href="{{ route('kategori.edit', $data->id) }}"
                                        class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded mx-2 no-underline">
                                        Edit
                                    </a>
                                    <a href="{{ route('kategori.destroy', $data->id) }}" type="submit"
                                        class="bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded mx-2 no-underline"
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
                    <a class="text-light no-underline" href="{{ route('home') }}"> Kembali</a>
                </button>
            </div>

            <div class="mt-4">
                {{ $kategori->links() }}
            </div>

        </div>
    @endsection
</body>

</html>
