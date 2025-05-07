<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="shortcut icon" href="/assets/img/mountain.png" type="image/x-icon" />
    <title>Login Page</title>

</head>

<body class="bg-gray-50">
    @include('sweetalert::alert')

    <section class="bg-gray-50 h-screen flex justify-center items-center dark:bg-gray-900 font-montserrat">
        <div class="flex flex-col items-center justify-center space-y-5 px-10 py-8 mx-auto md:h-screen w-full lg:py-0">
            <a href="/">
                <div class="flex items-center space-x-2 mb-5">
                    <img src="assets/img/mountain.png" class="w-10 h-10 " alt="">
                    <h1 class="font-semibold md:text-2xl text-xl">Sistem Informasi <br class="md:hidden"> Desa
                        Payungagung
                    </h1>
                </div>
            </a>
            <div
                class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1
                        class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Masuk ke akun anda
                    </h1>
                    <form class="needs-validation space-y-4 md:space-y-6" novalidate action="/login" method="POST">
                        @csrf

                        <div>
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <input type="email" name="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-teal-600 focus:border-teal-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="name@gmail.com" required="">
                        </div>
                        <div>
                            <label for="password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-teal-600 focus:border-teal-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required="">
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="flex items-center h-5">
                                    <input id="remember" aria-describedby="remember" type="checkbox"
                                        class="w-4 h-4 border border-gray-300 rounded text-primaryhover bg-gray-50 focus:ring-3 focus:ring-primary dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primaryhover dark:ring-offset-gray-800">
                                </div>
                                <div class="ml-2 text-xs md:text-sm">
                                    <label for="remember" class="text-gray-500 dark:text-gray-300">Ingat saya</label>
                                </div>
                            </div>
                            <a href="#"
                                class="text-xs md:text-sm font-medium text-teal-600 hover:underline dark:text-teal-500">Lupa
                                password?</a>
                        </div>
                        <button type="submit"
                            class="w-full text-white bg-teal-600 hover:bg-teal-700 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800">Log
                            in</button>
                        {{-- <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                      Belum punya akun? <a href="/register" class="font-medium text-teal-600 hover:underline dark:text-teal-500">Daftar</a>
                  </p> --}}
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script src="/assets/plugins/jquery/jquery.min.js"></script>

    <script src="/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="/assets/dist/js/adminlte.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                var forms = document.getElementsByClassName('needs-validation');
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>

</body>

</html>
