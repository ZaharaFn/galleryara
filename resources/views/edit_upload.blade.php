<!doctype html>
<html class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/output.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hurricane&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body>
    <nav class="fixed top-0 z-20 w-full bg-white shadow-xl">
        <div class="flex flex-wrap items-center justify-between max-w-screen-lg  mx-auto">
            <div class="flex justify-between mx-auto items-center container  ">

                <div class="flex justify-center gap-1">
                    <img src="/assets/mdi_collage.png" alt="" class="w-10 h-10 mt-3">
                    <span class="font-semibold mt-4 text-[1]">Ma Gallery</span>
                </div>
                <div class="flex items-center overflow-hidden">
                    <a href="/index" class="mr-6 font-bold">Index</a>
                    <a href="/upload" class="mr-6 underline font-bold">Create</a>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="mr-6 font-bold">Signout</button>
                    </form>
                    <a href="/profil"><img src="/profile/{{ Auth::user()->profile }}" alt=""
                            class="rounded-full w-10 h-10"></a>
                </div>
            </div>
    </nav>

    <section>
        <form action="{{ route('edit_upload.update', $foto) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
                <div class="flex justify-center gap-8 flex-wrap overflow-hidden mx-auto mt-[130px]">
                    <div class="">
                        <div class="flex items-center justify-center w-full pt-8">
                            <label for="dropzone-file"
                            class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600 ">
                            <img src="/foto/{{ $foto->lokasi_file }}" alt="{{ $foto->judul_foto }}" class="h-64 w-auto">
                        </label>
                        </div>
                    </div>
                    <div class="mt-7 gap-8 ">
                        <div class="flex flex-col">
                            <div class="">
                                <span class="font font-regular">Judul Foto</span>
                                <input type="text" id="judul_foto" name="judul_foto" value="{{ $foto->judul_foto }}"
                                    class="mt-2 px- bg-gray- border border-gray-900 text-gray-900 text-sm rounded-md block w-full p-2.5"
                                    placeholder="" required />
                            </div>

                            <div class="mt-4">
                                <span class="font font-regular">Deskripsi Foto</span>
                                <input type="text" id="deskripsi" rows="4" name="deskripsi" value="{{ $foto->deskripsi_foto }}"
                                    class="mt-2 bg-gray- border border-gray-900 text-gray-900 text-sm rounded-md block w-full p-2.5"
                                    placeholder="" required />
                            </div>

                            <div class="flex mt-5">
                                <div class="w-">
                                    <select id="" name="nama_album"
                                        class="block w-full p-2.5 mb-6 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
                                        <option value="" class="text-black hidden">Choose Album</option>
                                        @foreach ($albums as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama_album }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>


                                <!-- Modal toggle -->
                                <a href="/buatalbum"><button data-modal-target="default-modal"
                                        data-modal-toggle="default-modal"
                                        class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 h-full ml-4"
                                        type="button">
                                        <i class="bi bi-plus-lg"></i>
                                    </button></a>

                            </div>

                            <div class="w-12">
                                <button type="submit"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 mt-5 width dark:bg-blue-800 dark:hover:bg-blue-700 focus:outline-none dark:focus :ring-blue-800">upload</a>
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            </div>
            <form>


    </section>
</body>

</html>
