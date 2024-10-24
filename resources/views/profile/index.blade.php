<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    @extends('layouts.app')
    @section('content')
        <h1 class="text-2xl font-bold mb-3 text-center mt-5">--- Profile ---</h1>

        <div class=" mx-auto p-6">
            <form action="{{ route('profile.store', $profile->id) }}" method="POST" role="form"
                enctype="multipart/form-data">
                @csrf
                <div class="flex flex-col lg:flex-row justify-center gap-6">
                    <!-- Left side (Profile Card) -->
                    <div class="bg-white shadow-lg rounded-lg p-6 w-full lg:w-1/3 flex flex-col items-center">
                        <img src="{{ asset('/images/profile/' . $profile->cover) }}" class="mx-auto">
                    </div>

                    <!-- Right side (Profile Information) -->
                    <div class="bg-white shadow-lg rounded-lg p-6 w-full lg:w-2/3">
                        <div class="flex flex-col space-y-4">
                            <div class="flex justify-between border-b pb-2">
                                <span class="text-gray-600">Nama</span>
                                <span class="font-semibold">{{ $profile->username }}</span>
                            </div>

                            <div class="flex justify-between border-b pb-2">
                                <span class="text-gray-600">Tempat lahir</span>
                                <span class="font-semibold">{{ $profile->tempat_lahir }}</span>
                            </div>

                            <div class="flex justify-between border-b pb-2">
                                <span class="text-gray-600">Tanggal Lahir</span>
                                <span class="font-semibold">{{ $profile->tgl_lahir }}</span>
                            </div>

                            <div class="flex justify-between border-b pb-2">
                                <span class="text-gray-600">Agama</span>
                                <span class="font-semibold">{{ $profile->agama }}</span>
                            </div>

                            <div class="flex justify-between border-b pb-2">
                                <span class="text-gray-600">Alamat</span>
                                <span class="font-semibold">{{ $profile->alamat }}</span>
                            </div>

                            <div class="flex justify-between border-b pb-2">
                                <span class="text-gray-600">Jenis Kelamin</span>
                                <span class="font-semibold">{{ $profile->jenis_kelamin }}</span>
                            </div>

                            <div class="flex justify-between border-b pb-2">
                                <span class="text-gray-600">No Telepon</span>
                                <span class="font-semibold">{{ $profile->no_telp }}</span>
                            </div>
                            <div class="flex justify-between border-b pb-2">
                                <span class="text-gray-600">Hobi</span>
                                {{-- <span class="font-semibold">{{ $profile->hobby->nama_hobby }}</span> --}}
                                <ol class="font-semibold">
                                    @foreach ($hobi as $item)
                                        <li type="1">
                                            {{ $item->nama_hobby }}
                                        </li>
                                    @endforeach
                                </ol>
                            </div>

                            <div class="flex justify-end mt-4">
                                <button class="bg-teal-500 text-white px-4 py-2 rounded-lg"><a
                                        class="text-black no-underline text-lg"
                                        href="{{ route('profile.edit', ['id' => $profile->id]) }}">Edit</a></button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    @endsection
</body>

</html>
