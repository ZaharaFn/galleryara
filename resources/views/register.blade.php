<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/output.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hurricane&display=swap" rel="stylesheet">
</head>

<body>
    <!-- Nav -->
    <section class="mt-[20px]">

        <div class="w-[364px] bg-white mx-auto px-9 py-9 rounded-md shadow-xl">

            <div class="flex flex-col">
                <!-- header login -->
                <div class="flex items-center justify-between max-w-screen-md mx-auto w-9 h-8">
                    <img src="/assets/mdi_collage.png">

                    <form action="/registered" method="post">
                        @csrf
                </div>
                <span class="mt-2 text-2xl font-fontfamily mx-auto text-blue-500">Welcome to Ma Gallery</span>
                <span class="text-sm mt-4 mb-1">Username</span>
                <input type="text" name="username" id="username"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                    placeholder="" value="{{ old('username') }}" required />
                @error('username')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

                <span class="text-sm mt-5 mb-1">Email</span>
                <input type="email" id="email" name="email"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                    placeholder="" required />
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

                <span class="text-sm mt-4 mb-1">Password</span>
                <input type="password" id="password" name="password"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                    placeholder="" value="{{ old('password') }}" required />
                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror



                <button type="submit"
                    class="mt-7 text-white bg-blue-500 hover:bg-blue-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Register
                </button>

                <span class="mt-3 text-center text-sm">Already a member?
                    <a href="/login" class="underline text-sky-500">log in</a></span>

            </div>
        </div>
        </form>
    </section>
    @include('sweetalert::alert')

</body>

</html>
