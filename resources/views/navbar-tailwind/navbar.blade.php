<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Informasi Desa Payungagung</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description"
        content="Desa Payungagung adalah sebuah desa yang terletak di Kecamatan Panumbangan Kabupaten Ciamis, dengan berbagai potensi alam dan budaya yang menarik untuk dijelajahi. Temukan lebih lanjut tentang Desa Payungagung." />
    <meta name="keywords" content="Desa Payungagung, desa, potensi alam, budaya, wisata desa" />
    <meta name="author" content="Developer Desa Payungagung" />
    <meta property="og:title" content="Desa Payungagung" />
    <meta property="og:description"
        content="Desa Payungagung adalah sebuah desa yang terletak di Kecamatan Panumbangan Kabupaten Ciamis, dengan berbagai potensi alam dan budaya yang menarik untuk dijelajahi." />
    <meta property="og:image" content="/assets/img/logo.png" />
    <meta property="og:url" content="https://payungagung.com" />
    <meta name="robots" content="noindex,nofollow">
    <meta name="google" content="nositelinkssearchbox">
    <meta name="googlebot" content="notranslate">
    <meta name="google" content="nopagereadaloud">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Font Awesome 6 Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="shortcut icon" href="assets/img/mountain.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@7.2.96/css/materialdesignicons.min.css" rel="stylesheet">


    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="hold-transition sidebar-mini bg-white text-black dark:bg-gray-900 dark:text-white ">



    <nav class="fixed top-0 z-50 w-full bg-transparent px-10">
        <div class="container mx-auto mt-8 mb-8 bg-transparent py-3 rounded-full relative transition ease-in"
            id="bg-navbar">
            <div class="flex flex-wrap justify-between items-center mx-10">
                <div class="flex items-center">
                    <a href="#" class="nav-link"><img src="/assets/img/mountain.png" class="h-7"
                            alt="" /></a>
                    <a href="#" class="nav-link ml-3 text-xl text-gray-800 font-medium">SI<b>PAGUNG</b></a>
                </div>
                <button type="button"
                    class="flex md:hidden p-2 hover:cursor-pointer text-primary hover:text-primaryhover transition duration-200 ease-in-out"
                    onclick="openNavbar()">
                    <i class="fas fas fa-bars"></i>
                </button>
                <div class="hidden md:block w-full md:w-auto font-dm-sans font-medium text-white py-4 px-3 md:p-0 rounded-xl md:rounded-none md:text-gray-700 bg-primary md:bg-transparent mt-5 md:mt-0 absolute md:relative top-full left-0 right-0 z-10"
                    id="navbar">
                    <ul class="flex flex-col md:flex-row gap-3 md:gap-9">
                        <li class="md:hover:bg-transparent md:hover:text-primary transition duration-200 ease-in-out">
                            <a href="/" class="">Beranda</a>
                        </li>
                        <li class="relative">
                            <a class="cursor-pointer nav-link md:hover:bg-transparent md:hover:text-primary transition duration-200 ease-in-out inline-flex items-center"
                                onclick="toggleDropdownProfil(event)">
                                Profil
                                <svg class="w-2.5 h-2.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>
                            </a>
                            <ul id="dropdownMenuProfil"
                                class="absolute left-0 z-50 hidden bg-white text-gray-800 py-2 mt-2 w-48 rounded-lg shadow-lg">
                                <li class="hover:bg-gray-100 hover:text-primary">
                                    <a href="/showcase/profile/visi-misi" class="block px-4 py-2">Visi Misi Desa</a>
                                </li>
                                <li class="hover:bg-gray-100 hover:text-primary">
                                    <a href="/showcase/profile/sejarah" class="block px-4 py-2">Sejarah Desa</a>
                                </li>
                                <li class="hover:bg-gray-100 hover:text-primary">
                                    <a href="/showcase/profile/aparat" class="block px-4 py-2">Aparatur Desa</a>
                                </li>
                            </ul>
                        </li>
                        <li class="md:hover:bg-transparent md:hover:text-primary transition duration-200 ease-in-out">
                            <a href="/showcase/idm/ {{ date('Y') }}" class="">IDM</a>
                        </li>
                        <li class="md:hover:bg-transparent md:hover:text-primary transition duration-200 ease-in-out">
                            <a href="/showcase/laporan_apdes" class="">LAPORAN APDES</a>
                        </li>
                        <li class="relative">
                            <a class="cursor-pointer nav-link md:hover:bg-transparent md:hover:text-primary transition duration-200 ease-in-out inline-flex items-center"
                                onclick="toggleDropdownDemo(event)">
                                Demografi
                                <svg class="w-2.5 h-2.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>
                            </a>
                            <ul id="dropdownMenuDemo"
                                class="absolute left-0 z-50 hidden bg-white text-gray-800 py-2 mt-2 w-48 rounded-lg shadow-lg">
                                {{-- <li class="hover:bg-gray-100 hover:text-primary">
                                    <a href="/#" class="block px-4 py-2">Wilayah Administratif</a>
                                </li> --}}
                                <li class="hover:bg-gray-100 hover:text-primary">
                                    <a href="{{ URL::to('/showcase/demografi/pendidikan') }}" class="block px-4 py-2">Pendidikan</a>
                                </li>
                                <li class="hover:bg-gray-100 hover:text-primary">
                                    <a href="{{ URL::to('/showcase/demografi/pekerjaan') }}" class="block px-4 py-2">Pekerjaan</a>
                                </li>
                                <li class="hover:bg-gray-100 hover:text-primary">
                                    <a href="{{ URL::to('/showcase/demografi/agama') }}" class="block px-4 py-2">Agama</a>
                                </li>
                                <li class="hover:bg-gray-100 hover:text-primary">
                                    <a href="{{ URL::to('/showcase/demografi/jeniskelamin') }}" class="block px-4 py-2">Jenis
                                        Kelamin</a>
                                </li>
                                <li class="hover:bg-gray-100 hover:text-primary">
                                    <a href="{{ URL::to('/showcase/demografi/umur') }}" class="block px-4 py-2">Umur</a>
                                </li>
                                <li class="hover:bg-gray-100 hover:text-primary">
                                    <a href="{{ URL::to('/showcase/demografi/luaswilayah') }}" class="block px-4 py-2">Luas Wilayah</a>
                                </li>
                                <li class="hover:bg-gray-100 hover:text-primary">
                                    <a href="{{ URL::to('/showcase/demografi/disabilitas') }}" class="block px-4 py-2">Disabilitas</a>
                                </li>
                            </ul>
                        </li>
                        <li class="relative">
                            <a class="cursor-pointer nav-link md:hover:bg-transparent md:hover:text-primary transition duration-200 ease-in-out inline-flex items-center"
                                onclick="toggleDropdownPotensi(event)">
                                Potensi
                                <svg class="w-2.5 h-2.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>
                            </a>
                            <ul id="dropdownMenuPotensi"
                                class="absolute left-0 z-50 hidden bg-white text-gray-800 py-2 mt-2 w-48 rounded-lg shadow-lg">
                                <li class="hover:bg-gray-100 hover:text-prim
                                ary">
                                    <a href="/showcase/lapak" class="block px-4 py-2">Lapak Desa</a>
                                </li>
                            </ul>
                        </li>
                        <li class="md:hover:bg-transparent md:hover:text-primary transition duration-200 ease-in-out">
                            <a href="/showcase/berita" class="">Berita</a>
                        </li>
                        <li class="relative">
                            <a class="cursor-pointer nav-link md:hover:bg-transparent md:hover:text-primary transition duration-200 ease-in-out inline-flex items-center"
                                onclick="toggleDropdownRumahDataku(event)">
                                RumahDataku
                                <svg class="w-2.5 h-2.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>
                            </a>
                            <ul id="dropdownMenuRumahDataku"
                                class="absolute left-0 z-50 hidden bg-white text-gray-800 py-2 mt-2 w-48 rounded-lg shadow-lg">
                                <li class="hover:bg-gray-100 hover:text-primary
                                ary">
                                    <a href="https://rumahdataku.payungagung.com/demografi"
                                        class="block px-4 py-2">Data Demografi</a>
                                </li>
                                <li class="hover:bg-gray-100 hover:text-primary
                                ary">
                                    <a href="https://rumahdataku.payungagung.com/potensi" class="block px-4 py-2">Data
                                        Potensi</a>
                                </li>

                            </ul>
                        </li>


                    </ul>
                </div>
                <div class="hidden md:block">
                    {{-- <button onclick="toggleDarkMode()" class="p-2 rounded bg-gray-200 dark:bg-gray-700">
                        Toggle Mode
                    </button> --}}
                </div>
            </div>
        </div>
    </nav>


    @yield('content')

    <footer class="container mx-auto py-10 md:py-20">
        <div id="contact" class="mx-10 md:mx-20">
            <div class="flex justify-between items-center">
                <h1 class="flex flex-col md:flex-row md:gap-4 text-2xl md:text-5xl font-dmsans font-bold">
                    <span>Maju, </span><span><span class="text-primary">Mandiri!
                            {{-- </span> There!</span> --}}
                </h1>
                <div class="hidden md:flex bg-black rounded-full">
                    <div class="flex justify-between text-lg">
                        <button class="p-1">
                            <i
                                class="fa-solid fa-arrow-right bg-white rounded-full p-3 hover:bg-gray-100 transition duration-300 ease-in-out"></i>
                        </button>
                        <button onclick="window.location.href='https://wa.me/6285223303712';"
                            class="text-sm bg-primary rounded-full py-3 px-6 font-semibold hover:bg-primaryhover text-white transition duration-300 ease-in-out">
                            Hubungi Kami
                        </button>
                    </div>
                </div>
            </div>
            <hr class="border-t-[1px] border-gray-300 mt-10 mb-10" />

            <div class="flex flex-col md:grid md:grid-cols-3 py-0 md:py-5 gap-16">
                <div class="order-3 md:order-1">
                    <div class="flex flex-col gap-y-8">
                        <div class="flex items-center">
                            <a href="#"><img src="/assets/img/mountain.png" class="h-7"
                                    alt="" /></a>
                            <a href="#"
                                class="ml-3 text-xl text-gray-800 font-medium font-faktum">SI<b>PAGUNG</b></a>
                        </div>
                        <p class="text-sm md:text-base text-gray-500 font-dm-sans">
                            Website Resmi Pemerintah <br />Desa Payungagung, Kecamatan Panumbangan, Kabupaten Ciamis.
                        </p>
                        <div class="flex flex-row space-x-3">
                            <a href="" target="_blank">
                                <i
                                    class="fa-brands fa-square-facebook text-white p-4 rounded-full bg-primary hover:bg-primaryhover transition duration-300 ease-in-out"></i>
                            </a>
                            <a href="https://www.instagram.com/desa.payungagung" target="_blank">
                                <i
                                    class="fa-brands fa-instagram text-white p-4 rounded-full bg-primary hover:bg-primaryhover transition duration-300 ease-in-out"></i>
                            </a>

                            <a href="" target="_blank">
                                <i
                                    class="fa-brands fa-youtube text-white p-4 rounded-full bg-primary hover:bg-primaryhover transition duration-300 ease-in-out"></i>
                            </a>
                            <a href="https://wa.me/6285223303712" target="_blank">
                                <i
                                    class="fa-brands fa-whatsapp text-white p-4 rounded-full bg-primary hover:bg-primaryhover transition duration-300 ease-in-out"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="order-1 md:order-2 grid grid-cols-2 font-dm-sans">
                    <div>
                        <h3 class="text-base md:text-lg text-primary font-nunito mb-7 font-semibold">
                            Navigasi
                        </h3>
                        <div class="flex flex-col gap-y-5">
                            <a href="#" class="text-gray-500 text-xs md:text-sm">Beranda</a>
                            <a href="#" class="text-gray-500 text-xs md:text-sm">Profil</a>
                            <a href="#" class="text-gray-500 text-xs md:text-sm">Demografi</a>
                            <a href="/showcase/lapak" class="text-gray-500 text-xs md:text-sm">Potensi</a>
                            <a href="/showcase/berita" class="text-gray-500 text-xs md:text-sm">Berita</a>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-base md:text-lg text-primary font-nunito mb-7 font-semibold">
                            Kontak
                        </h3>
                        <div class="flex flex-col gap-y-5">
                            <h5 class="text-gray-500 text-xs md:text-sm">
                                +62-8522-3024-909
                            </h5>
                            <h5 class="text-gray-500 text-xs md:text-sm">
                                www.example.com
                            </h5>
                            <h5 class="text-gray-500 text-xs md:text-sm">
                                name@gmail.com
                            </h5>
                            <h5 class="text-gray-500 text-xs md:text-sm">
                                6 Rancapetir Street,<br />Ciamis 46211
                            </h5>
                            <h5 class="text-gray-500 text-xs md:text-sm">Blogs</h5>
                            <h5 class="text-gray-500 text-xs md:text-sm">FAQs</h5>
                        </div>
                    </div>
                </div>
                <div class="order-2 md:order-3">
                    <h3 class="text-base md:text-lg text-primary font-nunito mb-7 font-semibold">
                        Dapatkan informasi terbaru
                    </h3>
                    <div class="bg-white rounded-lg flex overflow-hidden">
                        <input type="email" placeholder="Alamat email"
                            class="py-2 px-4 bg-gray-100 text-gray-700 focus:outline-none" />
                        <button
                            class="bg-primary hover:bg-primaryhover rounded-tr-lg rounded-br-lg p-4 flex items-center justify-center text-white transition duration-300 ease-in-out">
                            <i class="fa-solid fa-paper-plane"></i>
                        </button>
                    </div>
                </div>
            </div>

            <hr class="border-t-[1px] border-gray-300 mt-14 mb-14" />

            <div
                class="flex flex-col md:flex-row md:justify-between text-center md:text-justify text-gray-800 font-dm-sans text-sm md:text-base">
                <h5>
                    Copyright &copy;
                    <a href="" class="text-primary">SI<b>PAGUNG</b></a>. All
                    Rights Reserved.
                </h5>
                <h5 class="hidden md:inline">
                    <a class="hover:text-primary transition duration-300 ease-in-out"
                        href="https://www.termsfeed.com/live/85606666-de6c-4a0c-abac-95e546c7cb7a"
                        target="_blank">User Terms &
                        Conditions</a> | <a class="hover:text-primary transition duration-300 ease-in-out"
                        href="https://www.termsfeed.com/live/bcaf666a-d317-4de8-8109-e3a335528bf7"
                        target="_blank">Privacy Policy</a>
                </h5>
            </div>
        </div>
    </footer>

    <div class="fixed z-30 bottom-5 right-5 md:right-10">

        <button onclick="openLayananMandiri()"
            class=" bg-amber-400 hover:bg-yellow-400 active:scale-95 transition duration-200 ease-in-out rounded-full px-5 py-1.5 font-semibold text-white ">
            <div class="flex items-center space-x-2">
                <i class="mdi mdi-face-agent text-white text-xl"></i>
                <p class="text-sm">Layanan Mandiri</p>
            </div>
        </button>

    </div>

    <div id="layananMandiriModal"
        class="hidden fixed inset-0 bg-gray-500 bg-opacity-50 flex justify-center items-center z-50 ">
        <div
            class="w-10/12 md:w-4/12 bg-white border border-gray-200 shadow-lg rounded-2xl px-5 md:px-10 py-6 md:text-center space-y-5">

            <div class=" flex items-center justify-between">
                <h2 class="font-base font-bold text-xl">Layanan Mandiri</h2>
                <button onclick="closeLayananMandiri()">
                    <x-heroicon-s-x-mark
                        class="w-8 h-8 text-primary bg-transparent hover:bg-slate-100 transition duration-200 ease rounded-full p-1.5 cursor-pointer" /></button>
            </div>
            <hr class="border-t-[1px] border-gray-300 mt-14 mb-14" />
            <div class="flex items-center bg-gray-100 border-l-4 border-primary px-4 py-2">
                <svg class="h-6 w-6 text-primary mr-2" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M12 12h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span class="text-gray-700 text-xs">Hubungi Operator Desa untuk memperoleh PIN</span>
            </div>

            <div class="space-y-3">
                <input type="text" name="nik"
                    class="w-full border border-gray-200 focus:ring-primary focus:border-primary rounded-lg px-5 py-2"
                    placeholder="Nomor Induk Kependudukan" />
                <input type="password" name="pin"
                    class="w-full border border-gray-200 focus:ring-primary focus:border-primary rounded-lg px-5 py-2"
                    placeholder="Kode Pin" />
                <p id="alert" class="text-red-500 text-sm hidden">Mohon maaf, fitur ini belum tersedia.</p>
                <button onclick="alertFitur()"
                    class="w-full bg-primary hover:bg-primaryhover transition ease-in-out duration-300 text-white text-sm font-dm-sans py-2 px-5 rounded-lg">
                    Masuk
                </button>
            </div>

        </div>
    </div>
    <script>
        function toggleDarkMode() {
            document.documentElement.classList.toggle('dark');
            // simpan preferensi ke localStorage (optional)
            if (document.documentElement.classList.contains('dark')) {
                localStorage.setItem('theme', 'dark');
            } else {
                localStorage.setItem('theme', 'light');
            }
        }

        // optional: load preferensi saat halaman dibuka
        if (localStorage.getItem('theme') === 'dark') {
            document.documentElement.classList.add('dark');
        }
    </script>
    <script>
        function openNavbar() {
            let navbar = document.getElementById("navbar");
            navbar.classList.toggle("hidden");
        }

        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('bg-navbar');
            if (window.scrollY > 0) {
                navbar.classList.add('bg-white');
            } else {
                navbar.classList.remove('bg-white');
            }
        });

        document.addEventListener("DOMContentLoaded", () => {
            const links = document.querySelectorAll(".nav-link");

            for (const link of links) {
                link.addEventListener("click", (e) => {
                    e.preventDefault();
                    const targetId = link.getAttribute("href");

                    if (targetId === "#") {
                        window.scrollTo({
                            top: 0,
                            behavior: "smooth"
                        });
                    } else {
                        const targetElement = document.querySelector(targetId);
                        if (targetElement) {
                            targetElement.scrollIntoView({
                                behavior: "smooth"
                            });
                        }
                    }
                });
            }
        });

        function toggleDropdownProfil(event) {
            event.preventDefault();
            event.stopPropagation();
            const dropdownMenu = document.getElementById('dropdownMenuProfil');
            toggleDropdown(dropdownMenu);
        }

        function toggleDropdownDemo(event) {
            event.preventDefault();
            event.stopPropagation();
            const dropdownMenu = document.getElementById('dropdownMenuDemo');
            toggleDropdown(dropdownMenu);
        }

        function toggleDropdownPotensi(event) {
            event.preventDefault();
            event.stopPropagation();
            const dropdownMenu = document.getElementById('dropdownMenuPotensi');
            toggleDropdown(dropdownMenu);
        }

        function toggleDropdownRumahDataku(event) {
            event.preventDefault();
            event.stopPropagation();
            const dropdownMenu = document.getElementById('dropdownMenuRumahDataku');
            toggleDropdown(dropdownMenu);
        }

        function toggleDropdown(currentDropdown) {
            const allDropdowns = ['dropdownMenuProfil', 'dropdownMenuDemo', 'dropdownMenuPotensi',
                'dropdownMenuRumahDataku'
            ];
            allDropdowns.forEach(function(id) {
                const dropdownMenu = document.getElementById(id);

                if (dropdownMenu !== currentDropdown && !dropdownMenu.classList.contains('hidden')) {
                    dropdownMenu.classList.add('hidden');
                }
            });

            currentDropdown.classList.toggle('hidden');
        }

        document.addEventListener('click', function(event) {

            const dropdowns = ['dropdownMenuProfil', 'dropdownMenuDemo', 'dropdownMenuPotensi',
                'dropdownMenuRumahDataku'
            ];
            dropdowns.forEach(function(id) {
                const dropdownMenu = document.getElementById(id);
                if (!dropdownMenu.contains(event.target)) {
                    dropdownMenu.classList.add('hidden');
                }
            });
        });
    </script>

    <script>
        function openLayananMandiri() {
            document.getElementById('layananMandiriModal').classList.remove('hidden');
        }

        function closeLayananMandiri() {
            document.getElementById('layananMandiriModal').classList.add('hidden');
            document.getElementById('alert').classList.add('hidden');
        }

        function alertFitur() {
            document.getElementById('alert').classList.remove('hidden');
        }
    </script>
@yield('scripts')
</body>
