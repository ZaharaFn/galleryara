<!doctype html>
<html class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/output.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
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
                    <span class="font-fontfamily  font-bold mt-4 text-1xl">Ma Gallery</span>
                </div>
                <div class="flex items-center overflow-hidden">
                    <a href="/index" class="mr-6  font-bold">index</a>
                    <a href="/upload" class="mr-6  font-bold">Create</a>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="mr-6 font-bold">Signout</button>
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
            <button class="px-4 mt-7 text-white bg-blue-500 font-fontutama rounded-md shadow-xl ml-2"><a
                    href="/uploaded">Uploaded</a></button>
        </div>
    </div>
    </section>



    <body>

        <div class="flex max-w-screen-md mx-auto flex-wrap mt-20" id="postingku">

        </div>
        @include('sweetalert::alert')
        <script src="/javascript/postingku.js"></script>
    </body>

</html>
