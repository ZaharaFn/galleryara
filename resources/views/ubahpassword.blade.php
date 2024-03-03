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

    <!-- form -->
    <form action="/up_password" method="post">
        @csrf
        <div>

            <section class="mt-[40px]">
                <div class="w-[364px] bg-white rounded-md shadow-2xl mx-auto px-9 py-9">
                    <div class="flex flex-col">
                        <!-- header login -->
                        <div class="flex items-center justify-between max-w-screen-md mx-auto w-10 h-10">
                            <img src="/assets/mdi_collage.png">
                        </div>
                        <span class="mt-2 text-2xl font-fontfamily mx-auto text-blue-500">Change Your Password</span>
                        <!-- end -->
                        <!-- input login -->
                        <span class="text-sm mt-5 mb-1">Old Password</span>
                        <input type="password" id="old password" name="current_password"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" placeholder="" required />
                        <span class="text-sm mt-4 mb-1"> New Password</span>
                        <input type="password" id="new password" name="new_password"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                            placeholder="" required />
                        <span class="text-sm mt-4 mb-1"> confirm</span>
                        <input type="password" id="confirm" name="new_password_confirmation"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                            placeholder="" required />
                        <!-- button -->
                        <button type="submit"
                            class="mt-7 text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-500 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Perbaharui
                        </button>


                    </div>
                </div>

            </section>
        </div>
    </form>
    @include('sweetalert::alert')
</body>

</html>
