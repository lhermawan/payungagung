<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Register Page | SIPAGUNG</title>
</head>

<body class="hold-transition register-page">
    @include('sweetalert::alert')

    <section class="bg-gray-50 dark:bg-gray-900 font-montserrat">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                <img class="w-10 h-10 mr-2" src="assets/img/mountain.png" alt="logo">
                Sistem Informasi Desa Payungagung
            </a>
            <div
                class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1
                        class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Buat akun
                    </h1>
                    <form id="registerForm" class="space-y-4 md:space-y-6 needs-validation" novalidate
                        action="/register" method="POST">
                        @csrf
                        <div class="input-group mb-3">
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                Lengkap</label>
                            <input type="text" name="name" id="name"
                                class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg @error('name') is-invalid @enderror focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Fahri Muhammad" value="{{ old('name') }}" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                            @error('name')
                                <span class="invalid-feedback text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="input-group mb-3">
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <input type="email" name="email" id="email"
                                class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg @error('email') is-invalid @enderror focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="nama@gmail.com" value="{{ old('email') }}" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                            @error('email')
                                <span class="invalid-feedback text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="input-group mb-3">
                            <label for="password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="password" id="password"
                                class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg @error('password') is-invalid @enderror focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="••••••••" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                            @error('password')
                                <span class="invalid-feedback text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="input-group mb-3">
                            <label for="passwordConfirm"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Konfirmasi
                                Password</label>
                            <input type="password" name="passwordConfirm" id="passwordConfirm"
                                class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg @error('passwordConfirm') is-invalid @enderror focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="••••••••" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                            @error('passwordConfirm')
                                <span class="invalid-feedback text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit"
                            class="w-full text-white bg-teal-600 hover:bg-teal-700 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800">Register</button>
                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            Sudah punya akun? <a href="/login"
                                class="font-medium text-primary-600 hover:underline dark:text-primary-500">Login
                                disini</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script src="/assets/plugins/jquery/jquery.min.js"></script>
    <script src="/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
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


                            var emailField = form.querySelector('[name="email"]');
                            if (emailField && !emailField.validity.valid) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Email tidak valid',
                                    text: 'Masukkan format email yang benar.',
                                });
                            }
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
</body>

</html>
