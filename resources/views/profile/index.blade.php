@extends('layouts.app')
@section('content')
    @if (session('error'))
        <div class="bg-red-600 text-white p-3 rounded mb-4 mt-3 w-[770px] text-center mx-auto">
            {{ session('error') }}
        </div>
    @endif
    @if ($profile)
        <div class="card mt-3 max-w-3xl mx-auto">
            <div class="card-header flex justify-between bg-gray-200 p-4 rounded-t-lg">
                <a href="" class="text-black font-semibold no-underline">Profile</a>
                <a href="{{ route('password.edit', Auth::user()) }}"
                    class="text-black font-semibold no-underline">Password</a>
            </div>
            <div class="card-body bg-white p-6 rounded-b-lg shadow-lg">
                <div class="flex flex-col lg:flex-row justify-center gap-4">
                    <div class=" lg:w-1/3 flex flex-col items-center bg-gray-50 p-4 shadow-md">
                        <img src="{{ asset('/images/profile/' . $profile->cover) }}" class="mx-auto w-96">
                    </div>

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
                                <ol>
                                    @foreach ($profile->hobi as $data)
                                        <li type="1" class="font-semibold">{{ $data->nama_hobi }}</li>
                                    @endforeach
                                </ol>
                            </div>

                            <div class="flex justify-end mt-4">
                                <a href="{{ route('profile.edit', $profile->id) }}"
                                    class="bg-teal-500 text-white px-3 py-2 rounded-lg hover:bg-teal-600 text-sm no-underline">
                                    Edit
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="alert alert-warning mt-3 md:mt-6 lg:mt-8">
            Anda belum memiliki profile.
        </div>
        <a href="{{ route('profile.create') }}" class="btn btn-primary">
            Buat Profile
        </a>
    @endif
@endsection
