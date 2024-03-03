<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/output.css" rel="stylesheet">
    {{-- @vite('resources/css/app.css') --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hurricane&display=swap" rel="stylesheet">
</head>

<body>

    <!-- form -->
    <form action="/cek_login" method="post">
        @csrf
        <section class="mt-[40px]">
            <div class="w-[364px] bg-white rounded-md shadow-2xl mx-auto px-9 py-9">
                <div class="flex flex-col">
                    <!-- header login -->
                    <div class="flex items-center justify-between max-w-screen-md mx-auto w-9 h-8">
                        <img src="/assets/mdi_collage.png">
                    </div>
                    <span class="mt-2 text-3xl font-fontfamily mx-auto text-blue-500">Login to see more</span>
                    <!-- end -->
                    <!-- input login -->
                    <span class="text-sm mt-5 mb-1">Username</span>
                    <input type="text" id="username" name="username"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                        placeholder="" required />
                    <span class="text-sm mt-4 mb-1">Password</span>
                    <input type="password" id="password" name="password"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                        placeholder="" required />
                    <!-- button -->
                    <button type="submit"
                        class="mt-7 text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-500 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Login
                    </button>
                    <span class="mt-3 text-center text-sm">Belum punya account?
                        <a href="/register" class="underline text-sky-500">Register</a></span>

                </div>
            </div>

        </section>
        </div>
    </form>
    </section>
    @include('sweetalert::alert')

</body>

</html>
