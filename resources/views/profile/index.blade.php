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
        <div class="card mt-3 max-w-3xl mx-auto">
            <div class="card-header flex justify-between bg-gray-200 p-4 rounded-t-lg">
                <a href="" class="text-teal-600 font-semibold no-underline">Profile</a>
                <a href="" class="text-teal-600 font-semibold no-underline">Password</a>
            </div>
            <div class="card-body bg-white p-6 rounded-b-lg shadow-lg">
                <form action="{{ route('profile.store', $profile->id) }}" method="POST" role="form"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="flex flex-col lg:flex-row justify-center gap-4">
                        <!-- Left side (Profile Card) -->
                        <div class=" lg:w-1/3 flex flex-col items-center bg-gray-50 p-4  shadow-md">
                            <img src="{{ asset('/images/profile/' . $profile->cover) }}" class="mx-auto">
                        </div>

                        <!-- Right side (Profile Information) -->
                        <div class="w-full lg:w-2/3">
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
                                    {{-- @foreach ($hobby as $item) --}}
                                    <span class="font-semibold">{{ $profile->hobby->nama_hobby }}</span>
                                    {{-- @endforeach --}}
                                </div>

                                <div class="flex justify-end mt-4">
                                    <a href="{{ route('profile.edit', ['id' => $profile->id]) }}"
                                        class="bg-teal-500 text-white px-3 py-2 rounded-lg hover:bg-teal-600 text-sm no-underline">
                                        Edit
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endsection
</body>

</html>
