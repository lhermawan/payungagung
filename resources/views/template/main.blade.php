<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Font Awesome 6 Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/assets/dist/css/adminlte.min.css">
    <link rel="shortcut icon" href="assets/img/mountain.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@7.2.96/css/materialdesignicons.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<style>
    @layer utilities {
        @media (max-width: 768px) {
            .pagination .page-item {
                display: none;
            }

            .pagination .page-item:first-child,
            .pagination .page-item:last-child,
            .pagination .page-item:nth-child(-n+6):not(:first-child):not(:last-child) {
                display: inline-block;
            }
        }
    }
</style>

<body class="hold-transition sidebar-mini">

    @include('sweetalert::alert')

    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/dashboard" class="nav-link">Dashboard</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>

                                    {{-- sas --}}
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="/dashboard" class="brand-link">
                <img src="/assets/img/mountain.png" alt="AdminLTE Logo" class="brand-image " style="opacity: .8">
                <span class="brand-text font-weight-semibold">SIPAGUNG</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex items-center">
                    <div class="image">
                        <img src="assets/img/boy.png" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="/dashboard" class="d-block">{{ auth()->user()->name }}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="/dashboard" class="nav-link">
                                <i class="nav-icon fa-solid fa-gauge-high"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        @if (auth()->user()->level == 'Admin')
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-sitemap"></i>
                                    <p>
                                        Informasi
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="/admin/visi-misi" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Visi Misi</p>
                                        </a>
                                    </li>

                                </ul>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="/admin/sejarah" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Sejarah</p>
                                        </a>
                                    </li>
                                </ul>

                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="/admin/berita" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Berita Desa</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a href="/admin/lapakdesa" class="nav-link">
                                    <i class="nav-icon fa-solid fa-store"></i>
                                    <p>
                                        Lapak Desa
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/users" class="nav-link">
                                    <i class="nav-icon fa-solid fa-key"></i>
                                    <p>
                                        User Management
                                    </p>
                                </a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a href="/penduduk" class="nav-link">
                                <i class="nav-icon fa-solid fa-user"></i>
                                <p>
                                    Data Penduduk
                                </p>
                            </a>
                        </li>



                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-database"></i>
                                <p>
                                    Master
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            @if (auth()->user()->level == 'Admin')
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="/master/pekerjaan" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Pekerjaan</p>
                                        </a>
                                    </li>

                                </ul>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="/master/bantuan" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Bantuan Sosial</p>
                                        </a>
                                    </li>

                                </ul>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="/master/kis" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>JKN-KIS</p>
                                        </a>
                                    </li>

                                </ul>
                            @endif
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/mdisabilitas" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Penyandang Disabilitas</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-chart-simple"></i>
                                <p>
                                    Demografi
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="/pendidikan" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Pendidikan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/pekerjaan" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Pekerjaan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/agama" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Agama</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/jeniskelamin" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Jenis Kelamin</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/umur" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Umur</p>
                                    </a>
                                </li>
                                @if (auth()->user()->level == 'Admin')
                                    <li class="nav-item">
                                        <a href="/luaswilayah" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>
                                                Luas Wilayah
                                            </p>
                                        </a>
                                    </li>
                                @endif
                                <li class="nav-item">
                                    <a href="/disabilitas" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Penyandang Disabilitas</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item mt-3">
                            <form id="logging-out" action="/logout" method="POST" style="display: none;">
                                @csrf
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </form>
                            <a href="#" class="nav-link log-out">
                                <i class="nav-icon fa-solid fa-power-off" style="color: red"></i>
                                <p>Logout</p>
                            </a>
                        </li>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        @yield('content')

        <!-- Content Wrapper. Contains page content -->
        {{-- content here --}}
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">

            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2024 <a href="">SIPAGUNG</a>.</strong> All rights
            reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->


    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="/assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="/assets/plugins/jszip/jszip.min.js"></script>
    <script src="/assets/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="/assets/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="/assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="/assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="/assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>


    <!-- AdminLTE App -->
    <script src="/assets/dist/js/adminlte.min.js"></script>
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(function() {
            var url = window.location;
            $('ul.nav-sidebar a').filter(function() {
                return this.href == url;
            }).addClass('active');
            $('ul.nav-treeview a').filter(function() {
                    return this.href == url;
                }).parentsUntil(".nav-sidebar > .nav-treeview")
                .css({
                    'display': 'block'
                })
                .addClass('menu-open').prev('a')
                .addClass('active');
        });
    </script>

    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": [{
                        extend: "copy",
                        exportOptions: {
                            columns: ':not(:last-child)'
                        }
                    },
                    {
                        extend: "csv",
                        exportOptions: {
                            columns: ':not(:last-child)'
                        }
                    },
                    {
                        extend: "excel",
                        exportOptions: {
                            columns: ':not(:last-child)'
                        }
                    },
                    {
                        extend: "pdf",
                        orientation: "landscape",
                        pageSize: "A4",
                        customize: function(doc) {
                            doc.defaultStyle.fontSize = 8;
                            doc.pageMargins = [10, 10, 10, 10];
                        },
                        exportOptions: {
                            columns: ':not(:last-child)'
                        }
                    },
                    {
                        extend: "print",
                        customize: function(win) {
                            $(win.document.body)
                                .css('font-size', '8pt')
                                .prepend(
                                    '<style>' +
                                    '@page { size: A4 landscape; margin: 10mm; }' +
                                    'h1 { text-align: center;  font-weight:bold;}' +
                                    // Center the title
                                    '</style>'
                                );
                            $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                        },
                        exportOptions: {
                            columns: ':not(:last-child)'
                        }
                    },
                    "colvis"
                ]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

            $("#example2").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": [{
                        extend: "copy",
                        exportOptions: {
                            columns: ':not(:last-child)'
                        }
                    },
                    {
                        extend: "csv",
                        exportOptions: {
                            columns: ':not(:last-child)'
                        }
                    },
                    {
                        extend: "excel",
                        exportOptions: {
                            columns: ':not(:last-child)'
                        }
                    },
                    {
                        extend: "pdf",
                        orientation: "landscape",
                        pageSize: "A4",
                        customize: function(doc) {
                            doc.defaultStyle.fontSize = 8;
                            doc.pageMargins = [10, 10, 10, 10];
                        },
                        exportOptions: {
                            columns: ':not(:last-child)'
                        }
                    },
                    {
                        extend: "print",
                        customize: function(win) {
                            $(win.document.body)
                                .css('font-size', '8pt')
                                .prepend(
                                    '<style>' +
                                    '@page { size: A4 landscape; margin: 10mm; }' +
                                    'h1 { text-align: center;  font-weight:bold;}' +
                                    // Center the title
                                    '</style>'
                                );
                            $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                        },
                        exportOptions: {}
                    },
                    "colvis"
                ]
            }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');


            $("#example3").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "paging": false,
                "ordering": false,
                "info": false,
                "searching": false,
                "buttons": [{
                        extend: "copy",
                        exportOptions: {
                            columns: ':not(:last-child)'
                        }
                    },
                    {
                        extend: "csv",
                        exportOptions: {
                            columns: ':not(:last-child)'
                        }
                    },
                    {
                        extend: "excel",
                        exportOptions: {
                            columns: ':not(:last-child)'
                        }
                    },
                    {
                        extend: "pdf",
                        orientation: "landscape",
                        pageSize: "A4",
                        customize: function(doc) {
                            doc.defaultStyle.fontSize = 8;
                            doc.pageMargins = [10, 10, 10, 10];
                        },
                        exportOptions: {
                            columns: ':not(:last-child)'
                        }
                    },
                    {
                        extend: "print",
                        customize: function(win) {
                            $(win.document.body)
                                .css('font-size', '8pt')
                                .prepend(
                                    '<style>' +
                                    '@page { size: A4 landscape; margin: 10mm; }' +
                                    'h1 { text-align: center;  font-weight:bold;}' +
                                    '</style>'
                                );
                            $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                        },
                        exportOptions: {
                            columns: ':not(:last-child)'
                        }
                    },
                    "colvis"
                ]
            }).buttons().container().appendTo('#example3_wrapper .col-md-6:eq(0)');

        });
    </script>





    <script type="text/javascript">
        $(document).on('click', '#btn-delete', function(e) {
            e.preventDefault();
            var form = $(this).closest("form");
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Anda tidak akan dapat mengembalikan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#7367f0',
                cancelButtonColor: '#82868b',
                confirmButtonText: 'Yes, delete!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            })
        });
    </script>

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
    <script>
        $(document).ready(function() {
            $(".log-out").on('click', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Anda tidak akan dapat mengembalikan ini!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#7367f0',
                    cancelButtonColor: '#82868b',
                    confirmButtonText: 'Yes, Log Out !'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#logging-out').submit();
                    }
                });
            });
        });
    </script>

</body>

</html>
