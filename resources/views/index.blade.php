@extends('layout')
@push('cssjsexternal')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
@endpush
@section('content')
    <!--Section Gambar-->
    <section class="mt-20 bg-white-300">
        @csrf
        <div class="flex max-w-screen-md mx-auto flex-wrap" id="exploredata">
            
        </div>

    </section>
    @include('sweetalert::alert')

    </h1>
@endsection
@push('footerjsexternal')
    <script src="/javascript/explore.js"></script>
@endpush
