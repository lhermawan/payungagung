@extends('navbar-tailwind.navbar')
@section('title', 'Lapak Desa')
@section('content')

    <div class="flex flex-col gap-3 md:px-20 px-5">
        <div class="flex flex-col gap-7">
            <div class="flex flex-col gap-4 bg-white border border-gray-200 shadow-lg rounded-lg p-4 mt-32">
                <div class="flex flex-row items-center gap-2">
                    <h1 class="text-2xl md:text-3xl font-dmsans mx-10 md:mx-0">Lapak <strong>Desa</strong></h1>
                </div>
                <hr class="border-t-[1px] border-gray-300" />
                <div class="hidden md:flex items-center bg-gray-100 border-l-4 border-primary px-4 py-2">
                    <svg class="h-6 w-6 text-primary mr-2" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M12 12h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="text-gray-700 text-xs">Lapak Desa atau Pasar Desa Online merupakan media promosi produk
                        lokal desa yang bertujuan untuk membantu warga desa dalam memasarkan dan memperkenalkan produknya
                        kepada masyarakat luas</span>
                </div>

                @if ($lapakdesas->isEmpty())

                    <div class="flex justify-center  ">
                        <img src="{{ asset('assets/img/no-data.png') }}" class="h-[300px]" alt="">
                    </div>
                @else
                    <div class="flex flex-row gap-4">

                        <form class=" max-w-lg">
                            <div class="flex">
                                <button id="dropdown-button" data-dropdown-toggle="dropdown"
                                    class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600"
                                    type="button">Semua Kategori <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 4 4 4-4" />
                                    </svg></button>
                                <div id="dropdown"
                                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                        aria-labelledby="dropdown-button">
                                        <li>
                                            <button type="button"
                                                class="inline-flex w-full px-4 py-2 hover:bg-gray-100 hover:text-primary transition duration-300 ease-in-out dark:hover:bg-gray-600 dark:hover:text-white">Makanan</button>
                                        </li>
                                        <li>
                                            <button type="button"
                                                class="inline-flex w-full px-4 py-2 hover:bg-gray-100 hover:text-primary transition duration-300 ease-in-out dark:hover:bg-gray-600 dark:hover:text-white">Pakaian</button>
                                        </li>
                                        <li>
                                            <button type="button"
                                                class="inline-flex w-full px-4 py-2 hover:bg-gray-100 hover:text-primary transition duration-300 ease-in-out dark:hover:bg-gray-600 dark:hover:text-white">Kerajinan</button>
                                        </li>
                                        <li>
                                            <button type="button"
                                                class="inline-flex w-full px-4 py-2 hover:bg-gray-100 hover:text-primary transition duration-300 ease-in-out dark:hover:bg-gray-600 dark:hover:text-white">Hasil
                                                Bumi</button>
                                        </li>
                                    </ul>
                                </div>
                                <div class="relative w-full">
                                    <input type="search" id="search-dropdown"
                                        class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-primary focus:border-primary dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-primary"
                                        placeholder="Cari Produk" required />
                                    <button type="submit"
                                        class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-primary rounded-e-lg border border-primary hover:bg-primaryhover focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-primary dark:hover:bg-primaryhover dark:focus:ring-primary transition duration-300 ease-in-out">
                                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                        </svg>
                                        <span class="sr-only">Search</span>
                                    </button>
                                </div>



                            </div>
                        </form>




                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-10 mb-10 w-full font-dmsans">
                        @foreach ($lapakdesas as $data)
                            <div class="border border-gray-200 rounded-lg shadow-lg p-4 bg-white">
                                <img src="{{ asset($data->image) }}" alt="Produk"
                                    class="w-full h-48 object-cover rounded-lg mb-4">

                                <h3 class="font-semibold text-lg">{{ $data->nama_produk }}</h3>
                                <p class="text-primary font-semibold text-lg">Rp. {{ $data->harga }}/pcs</p>
                                <p class="text-gray-600 text-sm mt-2 mb-2 md:mb-3 md:mt-3">{{ $data->deskripsi }}</p>
                                <p class="text-sm text-gray-500 flex items-center">
                                    <svg class="h-4 w-4 text-gray-500 mr-1" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 14l9-5-9-5-9 5 9 5zm0 7l9-5-9-5-9 5 9 5z" />
                                    </svg>
                                    {{ $data->mitra }}
                                </p>
                                <div class="flex flex-row gap-2 items-center mt-4">
                                    <a href="{{ $data->link_wa }}" target="_blank"
                                        class="bg-primary hover:bg-primaryhover transition duration-300 ease-in-out text-white rounded-md py-2 px-4">Beli
                                        Sekarang</a>
                                    <a href="{{ $data->link_maps }}" target="_blank"
                                        class="bg-secondary hover:bg-amber-400 transition duration-300 ease-in-out text-white rounded-md py-2 px-4">Lokasi</a>
                                </div>
                            </div>
                        @endforeach
                    </div>

                @endif

            </div>

        </div>
    </div>

@endsection
