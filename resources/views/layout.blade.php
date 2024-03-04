<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link href="/css/output.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hurricane&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <style>
        .scrollbar-hidden::-webkit-scrollbar {
            display: none;
        }
    </style>
    @stack('cssjsexternal')

<body>
    <nav class="fixed top-0 z-20 w-full bg-white shadow-xl">
        <div class="flex flex-wrap items-center justify-between max-w-screen-lg  mx-auto">
            <div class="flex justify-between mx-auto items-center container  ">

                <div class="flex justify-center gap-1">
                    <img src="/assets/mdi_collage.png" alt="" class="w-10 h-10 mt-3">
                    <span class="font-semibold mt-4 text-[1]">Ma Gallery</span>
                </div>
                <div class="flex items-center overflow-hidden">
                    <a href="/index" class="mr-6 underline font-bold">Index</a>

                    <a href="/upload" class="mr-6 font-bold">Create</a>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="mr-6 font-bold">Signout</button>
                    </form>
                    <div>
                        <a href="/profil"><img src="/profile/{{ Auth::user()->profile }}" alt=""
                                class="rounded-full w-10 h-10"></a>
                    </div>
                </div>
            </div>
    </nav>


    @yield('content')




</body>
@stack('footerjsexternal')

</html>
