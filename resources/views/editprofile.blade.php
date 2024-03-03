<!doctype html>
<html class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/build.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hurricane&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body>
    <nav class="fixed top-0 z-20 w-full bg-white shadow-md">
        <div class="flex flex-wrap items-center justify-between max-w-screen-lg  mx-auto">
            <div class="flex justify-between mx-auto items-center container  ">

                <div class="flex justify-center gap-1">
                    <img src="/assets/mdi_collage.png" alt="" class="w-10 h-10 mt-3">
                    <span class="font-bold mt-4 text-[1]">Ma Gallery</span>
                </div>
                <div class="flex items-center overflow-hidden">
                    <a href="/editprofile" class="mr-6 font-bold underline">Edit Profile</a>
                    <a href="/home" class="mr-6 font-bold">Index</a>
                    <a href="/login" class="mr-6 font-bold">Signout</a>
                    <div>
                        <a href="/profil"><img src="/profile/{{ Auth::user()->profile }}" alt=""
                                class="rounded-full w-10 h-10"></a>
                    </div>
                </div>
            </div>
    </nav>


    <section class="mt-20">
        <form action="/updateprofile" method="post" enctype="multipart/form-data">
            @csrf
            <div class="flex mx-auto">
                <div class="w-1/2">
                    <div class="flex flex-col">
                        <div class="flex items-center justify-between">
                            <div>
                                <div class="flex gap-4 justify-center mx-auto ml-[300px]">
                                    <div>
                                        <section class="mt-[50px] lg:px-10 py-10 flex flex-col lg:flex-row mt-10">
                                            <div class="flex flex-col mx-auto">
                                                <div class="lg:w-[280px] w-full h-[200px] rounded-xl bg-gray shadow-xl">
                                                    <div class="flex justify-center items-center py-7">
                                                        <img src="/profile/{{ Auth::user()->profile }}"
                                                            class="rounded-full w-24 h-24 hover tra">
                                                    </div>
                                                    <div class="px-6">
                                                        <input type="file" name="profile" class="-ml-2">
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>

                                    <div class="w-[364px] bg-gray rounded-md shadow-xl mb-10 mx-auto px-10 py-5 mt-10">
                                        <span class="text-sm mb-1">Nama Lengkap</span>
                                        <input type="text" id="nama-lengkap" name="nama_lengkap"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                                            placeholder="" value="{{ $dataprofile->nama_lengkap }}" required />
                                        <!-- <span class="text-sm mt-4 mb-1">Deskripsi</span>
                            <input type="text" id="deskripsi" name="deskripsi" class="bg-gray-50 py-10 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" placeholder="" required /> -->
                                        <span class="text-sm mb-1">Username</span>
                                        <input type="text" id="username" name="username"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                                            placeholder="" value="{{ $dataprofile->username }}"required />
                                        <span class="text-sm mt-4 mb-1">Alamat</span>
                                        <input type="text" id="alamat" name="alamat"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                                            placeholder="" value="{{ $dataprofile->alamat }}" required />
                                            <span class="text-sm mt-4 mb-1">bio</span>
                                        <input type="text" id="bio" name="bio"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                                            placeholder="" value="{{ $dataprofile->bio }}" required />
                                        <div class="flex mt-8 gap-2 justify-between ml-14">
                                            <button type="button"
                                                class="bg-gray-800 text-white rounded-md px-2 py-2"><a
                                                    href="/ubahpass">Ubah Password</button></a>

                                            <button type="submit"
                                                class="bg-gray-800 text-white rounded-md px-2 py-2">Perbaharui</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>

    @include('sweetalert::alert')

</body>

</html>
