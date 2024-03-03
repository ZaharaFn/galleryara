@extends('layout')
@push('cssjsexternal')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    @section('content')
        <nav class="fixed top-0 z-20 w-full bg-white shadow-xl">
            <div class="flex flex-wrap items-center justify-between max-w-screen-lg  mx-auto">
                <div class="flex justify-between mx-auto items-center container  ">

                    <div class="flex justify-center gap-1">
                        <img src="/assets/mdi_collage.png" alt="" class="w-10 h-10 mt-3">
                        <span class="font-fontfamily mt-4 text-[1]">Ma Gallery</span>
                    </div>
                    <div class="flex items-center overflow-hidden">
                        <a href="/detailcomment" class="mr-6 font-bold underline">Detail Comment</a>
                        <a href="/index" class="mr-6 font-bold">Index</a>
                        <a href="/upload" class="mr-6 font-bold">Create</a>
                        <a href="/profil"><img src="/profile/{{ Auth::user()->profile }}" alt=""
                                class="rounded-full w-10 h-10"></a>
                    </div>
                </div>
        </nav>

        <div class="flex flex-wrap justify-center gap-4 mt-10">
            <div>
                <div class="flex flex-col gap-4">

                    <section>



                        <div class="mx-auto max-w-screen-2xl flex justify-center bg-white pt-32">

                            <div class=" shadow-xl w-[600px]">
                                <img src="/assets/1.jpg" class=" w-full h-auto p-5 rounded-md" id="fotodetail">

                            </div>
                            <div class=" shadow-xl w-">
                                <div class="flex flex-col mr-2 w-64">
                                    <div class="flex">
                                        <img src="/assets/3.jpg" alt="" class="w-10 h-10 rounded-full mr-2 ml-4" id="profile">
                                        <h2 class="text-lg ml-2 font-semibold mb-4" id="username">Georgia Aurora </h2>
                                    </div>

                                   <div class="mt-5 font-semibold ml-5">
                                    Komentar
                                   </div>

                                   <div class="relative flex flex-col overflow-y-auto h-[290px]" id="listkomentar">
                                    <div class="flex mt-4">
                                        <img src="/assets/awa.jpg" class="w-8 h-8 rounded-full ml-5" alt="">
                                        <div>
                                            <h2 class="text-sm mt-1 ml-2 font-semibold">ara22fn</h2>
                                            <small class="text-xs ml-2 text-gray-500">13.00</small>
                                        </div>
                                        <h5 class="text-sm mt-1 ml-2">Georgeos</h5>
                                    </div>

                                    <div class="flex mt-4">
                                        <img src="/assets/awa.jpg" class="w-8 h-8 rounded-full ml-5" alt="">
                                        <div>
                                            <h2 class="text-sm mt-1 ml-2 font-semibold">ara22fn</h2>
                                            <small class="text-xs ml-2 text-gray-500">13.00</small>
                                        </div>
                                        <h5 class="text-sm mt-1 ml-2">Georgeos</h5>
                                    </div>

                                    <div class="flex mt-4">
                                        <img src="/assets/awa.jpg" class="w-8 h-8 rounded-full ml-5" alt="">
                                        <div>
                                            <h2 class="text-sm mt-1 ml-2 font-semibold">ara22fn</h2>
                                            <small class="text-xs ml-2 text-gray-500">13.00</small>
                                        </div>
                                        <h5 class="text-sm mt-1 ml-2">Georgeos</h5>
                                    </div>

                                    <div class="flex mt-4">
                                        <img src="/assets/awa.jpg" class="w-8 h-8 rounded-full ml-5" alt="">
                                        <div>
                                            <h2 class="text-sm mt-1 ml-2 font-semibold">ara22fn</h2>
                                            <small class="text-xs ml-2 text-gray-500">13.00</small>
                                        </div>
                                        <h5 class="text-sm mt-1 ml-2">Georgeos</h5>
                                    </div>
                                    <div class="flex mt-4">
                                        <img src="/assets/awa.jpg" class="w-8 h-8 rounded-full ml-5" alt="">
                                        <div>
                                            <h2 class="text-sm mt-1 ml-2 font-semibold">ara22fn</h2>
                                            <small class="text-xs ml-2 text-gray-500">13.00</small>
                                        </div>
                                        <h5 class="text-sm mt-1 ml-2">Georgeos</h5>
                                    </div>
                                    <div class="flex mt-4">
                                        <img src="/assets/awa.jpg" class="w-8 h-8 rounded-full ml-5" alt="">
                                        <div>
                                            <h2 class="text-sm mt-1 ml-2 font-semibold">ara22fn</h2>
                                            <small class="text-xs ml-2 text-gray-500">13.00</small>
                                        </div>
                                        <h5 class="text-sm mt-1 ml-2">Georgeos</h5>
                                    </div>
                                   </div>

                                   <div class="flex gpa-2 mt-4">
                                    @csrf
                                    <img src="/assets/charm_message.png" class="w-10 h-10 rounded-full" alt="">
                                    <div class="w-3/4">
                                        <input type="text" id="" name="isi_komentar"
                                            class="w-full px-6 py-2 rounded-full border border-black"
                                            placeholder="Tulis Komentar">
                                    </div>
                                    <div class="flex flex-col overflow-y-auto h-[200px] scrollbar-hidden relative">
                                        <button type="submit" id="btn-post" class="px-4 rounded-full bg-biru"
                                            onclick="kirimkomentar()"><span class="bi bi-send">post</span></button>
                                    </div>
                                   </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        </div>
        </section>
        <div class="w-[1300px] bg-bray-800 rounded-md shadow-xl mx-auto ">
            <section class="mt-20 mb-8 w-full">
                <div class="flex max-w-screen-xl mx-auto flex-wrap p-5" id="postinganlain">


                </div>
            </section>
        </div>
    @endsection
    @push('footerjsexternal')
        <script src="/javascript/komen.js"></script>
    @endpush
