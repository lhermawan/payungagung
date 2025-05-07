@extends('navbar-tailwind.navbar')
@section('title', 'Berita Desa')
@section('content')

    <div class="flex flex-col gap-3 md:px-20 px-5">
        <div class="flex flex-col gap-7">
            <div class="flex flex-col gap-4 bg-white border border-gray-200 shadow-lg rounded-lg p-4 mt-32">
                <div class="flex flex-row items-center gap-2">
                    <h1 class="text-2xl md:text-3xl font-dmsans mx-10 md:mx-0">Berita <strong>Desa</strong></h1>
                </div>
                <hr class="border-t-[1px] border-gray-300" />

                @if ($beritas->isEmpty())

                    <div class="flex justify-center  ">
                        <img src="{{ asset('assets/img/no-data.png') }}" class="h-[300px]" alt="">
                    </div>
                @else
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-10  w-full font-dmsans mb-10">

                        @foreach ($beritas as $data)
                            <div href="" class="w-full relative overflow-hidden rounded-2xl">
                                <img src="{{ asset($data->image) }}" alt=""
                                    class="object-cover w-full h-[inherit] brightness-75 transition-transform duration-[2000ms] transform hover:scale-110 border border-gray-200 shadow-lg">

                                <div class="absolute bottom-0 left-0 w-full p-6 bg-transparent text-white font-poppins">
                                    <a href="/showcase/berita">
                                        <h3 class="text-xl md:text-2xl font-semibold">{{ $data->heading }}:</h3>
                                        <p class="text-sm md:text-lg">{{ Str::limit($data->judul, 35, '...') }}</p>
                                    </a>
                                    <div class="flex items-center mt-3 text-xs md:text-sm text-white">
                                        <div class="flex items-center mr-4">
                                            <i class="fa-solid fa-calendar-check mr-1"></i>
                                            <span>{{ $data->tanggal }}</span>
                                        </div>
                                        <div class="flex items-center">
                                            <i class="fa-solid fa-comment mr-1 "></i>
                                            <span>0 Comment</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>

                @endif


            </div>

        </div>
    </div>

@endsection
