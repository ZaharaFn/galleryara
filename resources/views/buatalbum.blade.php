<!doctype html>
<html  class="scroll-smooth">
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
<nav class="fixed top-0 z-20 w-full bg-white shadow-xl py-2">
<div class="flex flex-wrap items-center justify-between max-w-screen-lg  mx-auto">
<div class="flex justify-between mx-auto items-center container  ">

<div class="flex justify-center gap-1">
          <img src="/assets/mdi_collage.png" alt="" class="w-10 h-10 mt-3">
          <span class="font-bold mt-4 text-[20px]">Ma Gallery</span>
</div>
    <div class="flex items-center overflow-hidden">
        <a href="/home" class="mr-6 font-bold">Home</a>
        <a href="/index" class="mr-6 font-bold">Index</a>
        <a href="/upload" class="mr-6 font-bold">Create</a>
        <a href="/login" class="mr-6 font-bold">Signout</a>
        <img src="/assets/i'm.jpg" alt="" class="w-10 h-10 mt-3 rounded-full">
     </div>
</div>
</nav>
<!--foto 1-->
<div>
    <div class="flex justify-center gap-8 flex-wrap overflow-hidden mx-auto mt-[130px]">
        <div class="">

</div>
<form action="/tambah_album" method="post">
@csrf
<div class="mt-7 gap-8 ">
<div class="w-[364px] bg-white rounded-md shadow-2xl mx-auto px-8 py-9">
    <div class="flex flex-col">
         <div class="px-5">
           <span class="font font-regular">Judul Album</span>
           <input type="text" id="text" name="nama_album" class="mt-2 px-10 bg-gray-80 gap-4 border border-gray-200 text-gray-900 text-sm rounded-md block w-full p-2.5" placeholder="" required/>
         </div>
         <div class="px-5">
           <span class="font font-regular">Deskripsi</span>
           <input type="text" id="text" name="deskripsi" class="mt-2 px-10 bg-gray-80 border border-gray-200 text-gray-700 text-sm rounded-md block w-full p-2.5" placeholder="" required/>
         </div>

          <div class="mt-4 px-5">
            <button type="submit" class="text-white bg-blue-700 hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm w-full sm:w-auto px-5 py-2 text-center dark:bg-blue-800">Buat</button>
          </div>
         <div>
         </div>
    </div>
   </div>
</div>
</form>
</div>
</section>
</body>
</html>
