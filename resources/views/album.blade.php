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
                    <span class="font-fontfamily mt-4 text-[1]">Ma Gallery</span>
                </div>
                <div class="flex items-center overflow-hidden">
                    <a href="/album" class="mr-6 underline">Album</a>
                    <a href="/upload" class="mr-6">Create</a>
                    <a href="/index" class="mr-6">Index</a>
                    <div>
                        <a href="/profil"><img src="/profile/{{ Auth::user()->profile }}" alt=""
                                class="rounded-full w-10 h-10"></a>
                    </div>
                </div>
            </div>
    </nav>

    <body>



        <div class="mt-20">
            <div class="flex flex-col lg:flex-row mx-auto max-w-screen-xl gap-8">
                @foreach ($tampilAlbum as $album)
                    <a href="{{ route('foto_album', $album->id) }}" class="mx-2">
                        <img src="/assets/WhatsApp Image 2024-02-24 at 14.38.28_6c3b43d1.jpg" class="w-full h-auto mx-2"
                            alt="">
                        <p>{{ $album->nama_album }}</p>
                    </a>
                @endforeach
            </div>
        </div>

    </body>
