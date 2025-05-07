@extends('navbar-tailwind.navbar')
@section('title', 'Sejarah Desa')
@section('content')

<div class="flex flex-col gap-3 md:px-20">
    <div class="text-center">
    <h1 class="mt-32 text-2xl md:text-4xl text-primary font-dmsans mx-10 md:mx-0">
        Sejarah Desa<span class="text-blue-600"> Payungagung</span>
    </h1>
    </div>
    @foreach ($sejarah as $item)
    <div class="flex flex-col md:flex-row items-center gap-10 mb-16 bg-white p-6 rounded-2xl shadow-lg transition duration-300 hover:shadow-2xl">
        <div class="md:w-1/2">
            <img src="{{ URL::to($item->picture) }}"
                 alt="Gambar Sejarah"
                 class="w-full h-64 object-cover rounded-xl shadow-md hover:scale-105 transition duration-300 ease-in-out">
        </div>
        <div class="md:w-1/2 text-gray-700">

            <div class="prose max-w-none prose-p:leading-relaxed prose-p:mb-4">
                {!! $item->sejarah !!}
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection
