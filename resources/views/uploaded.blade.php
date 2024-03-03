<!doctype html>
<html class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/output.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Hurricane&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body>
    <nav class="fixed top-0 z-20 w-full bg-white shadow-xl">
        <div class="flex flex-wrap items-center justify-between max-w-screen-lg  mx-auto">
            <div class="flex justify-between mx-auto items-center container  ">

                <div class="flex justify-center gap-1">
                    <img src="/assets/mdi_collage.png" alt="" class="w-10 h-10 mt-3">
                    <span class="font-fontfamily  font-bold mt-4 text-1xl">Ma Gallery</span>
                </div>
                <div class="flex items-center overflow-hidden">
                    <a href="/index" class="mr-6  font-bold">index</a>
                    <a href="/upload" class="mr-6  font-bold">Create</a>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="mr-6 font-semibold">Signout</button>
                    </form>
                    <a href="/profil"><img src="/profile/{{ Auth::user()->profile }}" alt=""
                            class="rounded-full w-10 h-10"></a>

                </div>
            </div>
    </nav>

    <div class="flex flex-col items-center max-w-screen-md px-2 mx-auto mt-20">
        <div>
            <img src="/profile/{{ Auth::user()->profile }}" alt="" class="w-24 h-24 rounded-full">
        </div>
        <h3 class="text-xl text-abuabu mt-4">
            {{ Auth::user()->username }}
        </h3>
        <h5 class="text-xs mt-4">
            {{ Auth::user()->bio }}
        </h5>

        <div class="flex flex-row ">

            <button class="px-4 mt-7 text-white bg-blue-500 font-fontutama rounded-md shadow-xl"><a
                    href="/editprofile">Edit Profile</a></button>
            <button class="px-4 mt-7 text-white bg-blue-500 font-fontutama rounded-md shadow-xl ml-2"><a
                    href="/album">Album</a></button>
        </div>
    </div>
    </section>



    <body>

        <div class="relative overflow-x-auto pt-32 max-w-screen-xl mx-auto flex justify-center">
            <table class="w-auto lg:w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 mt-5">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3 rounded-s-lg">
                            Judul foto
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Album
                        </th>
                        <th scope="col" class="px-6 py-3 rounded-e-lg">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datafoto as $index => $foto)
                        <tr class="bg-white dark:bg-gray-800">
                            <td class="px-6 py-4">
                                {{ $index + 1 }}
                            </td>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $foto->judul_foto }}
                            </th>
                            <td class="px-6 py-4">
                                {{ optional($foto->album)->nama_album }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex ">
                                    <div class="mx-2">
                                        <a href="{{ route('edit_upload.edit', $foto) }}">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                    </div>
                                    <div class="mx-2">
                                        <form action="{{ route('photos.destroy', $foto) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                onclick="return confirm('Are you sure you want to delete this photo?')"
                                                class="text-red-600">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach


                </tbody>

            </table>
        </div>
        @include('sweetalert::alert')
        <script src="/javascript/postingku.js"></script>
    </body>

</html>
