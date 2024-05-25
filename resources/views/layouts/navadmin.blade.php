<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default"
    data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css" />
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
    <title>POST | SMK PI</title>

    <meta name="description" content="" />

    <!-- Favicon -->


    <!-- Dashboard Icon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('logo_pi.png') }}" />
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('dashboard-admin/assets/vendor/fonts/boxicons.css') }}">
    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('dashboard-admin/assets/vendor/css/core.css') }}"
        class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('dashboard-admin/assets/vendor/css/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('dashboard-admin/assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet"
        href="{{ asset('dashboard-admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('dashboard-admin/assets/vendor/libs/apex-charts/apex-charts.css') }}" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ asset('dashboard-admin/assets/vendor/js/helpers.js') }}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('dashboard-admin/assets/js/config.js') }}"></script>


    @vite(['resources/css/app.css', 'resources/js/app.js', 'node_modules/flowbite/flowbite.min.js'])
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <div class="app-brand demo">
                        <a href="{{ url('dashboard') }}" class="app-brand-link">

                            <img src="{{ asset('logo_pi.png') }}" alt="Logo" width="25%"
                                style="margin-left: -30px">

                            <span class="app-brand-text demo menu-text fw-bold ms-2"
                                style="text-transform: uppercase;">SMK PI</span>
                        </a>
                    </div>

                    {{-- <!-- Add this button wherever you want the logout button to appear -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form> --}}

                    <a href="javascript:void(0);"
                        class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="align-middle bx bx-chevron-left bx-sm"></i>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>

                <ul class="py-1 menu-inner">
                    <!-- dashboard-admins -->
                    <x-nav-link class="menu-item" :active="request()->routeIs('dashboard')">
                        <a href="{{ route('dashboard') }}" class="menu-link ">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Dashboards">Dashboards</div>
                        </a>
                    </x-nav-link>

                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">Apps &amp; Pages</span>
                    </li>
                    <!-- Apps -->
                    <x-nav-link class="menu-item" :active="request()->routeIs('siswa.index')">
                        <a href="{{ route('siswa.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-group"></i>
                            <div data-i18n="Siswa">Siswa</div>
                            <div class="badge bg-label-primary fs-tiny rounded-pill ms-auto"></div>
                        </a>
                    </x-nav-link>
                    <x-nav-link class="menu-item" :active="request()->routeIs('kelas.index')">
                        <a href="{{ route('kelas.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-chalkboard"></i>
                            <div data-i18n="Kelas">Kelas</div>
                            <div class="badge bg-label-primary fs-tiny rounded-pill ms-auto"></div>
                        </a>
                    </x-nav-link>

                    <x-nav-link class="menu-item" :active="request()->routeIs([
                        'data.index',
                        'data.terlambat',
                        'filter.terlambat',
                        'data.guest',
                        'filter.guest',
                    ])">
                        <a href="{{ route('data.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-chalkboard"></i>
                            <div data-i18n="Kelas">Data</div>
                            <div class="badge bg-label-primary fs-tiny rounded-pill ms-auto"></div>
                        </a>
                    </x-nav-link>

                    <li class="menu-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('logout') }}" class="menu-link"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                <i class="menu-icon tf-icons bx bx-log-out"></i>
                                <div data-i18n="Log Out">Log Out</div>
                            </a>
                        </form>
                    </li>
                    <!-- Pages -->
                </ul>
            </aside>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                    id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="px-0 nav-item nav-link me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <!-- Search -->
                        <div class="navbar-nav align-items-center">
                            <div class="nav-item d-flex align-items-center">
                                <i class="bx bx-search fs-4 lh-0"></i>
                                <input type="text" class="border-0 shadow-none form-control ps-1 ps-sm-2"
                                    placeholder="Search..." aria-label="Search..." />
                            </div>
                        </div>
                        <!-- /Search -->

                        <ul class="flex-row navbar-nav align-items-center ms-auto">
                            <!-- Place this tag where you want the button to render. -->
                            <li class="nav-item lh-1 me-3">
                                <a class="github-button"
                                    href="https://github.com/themeselection/sneat-html-admin-template-free"
                                    data-icon="octicon-star" data-size="large" data-show-count="true"
                                    aria-label="Star themeselection/sneat-html-admin-template-free on GitHub">Star</a>
                            </li>
                            @php
                                use App\Models\User;

                                // Dapatkan ID pengguna yang sedang login
                                $userId = Auth::id();

                                // Cek apakah pengguna ditemukan berdasarkan ID
                                $user = User::find($userId);

                                // Jika pengguna tidak ditemukan, Anda dapat menangani sesuai dengan kebutuhan Anda
                                if (!$user) {
                                    abort(404); // atau atur $user ke nilai default, sesuai kebutuhan Anda
                                }
                            @endphp

                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                {{-- <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                    data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        @if ($user->image)
                                            <img src="{{ asset('storage/' . $user->image) }}" alt="User Image"
                                                class="h-auto img-thumbnail w-px-40 rounded-circle">
                                        @else
                                            <span>Tidak ada gambar</span>
                                        @endif
                                    </div>
                                </a> --}}
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex">
                                                {{-- <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        @if ($user->image)
                                                            <img src="{{ asset('storage/' . $user->image) }}"
                                                                alt="User Image"
                                                                class="h-auto img-thumbnail w-px-40 rounded-circle">
                                                        @else
                                                            <span>Tidak ada gambar</span>
                                                        @endif
                                                    </div>
                                                </div> --}}
                                                <div class="flex-grow-1">
                                                    @if (Auth::check())
                                                        <span
                                                            class="fw-medium d-block">{{ Auth::user()->name }}</span>
                                                        <small class="text-muted">{{ Auth::user()->usertype }}</small>
                                                    @else
                                                        <span class="fw-medium d-block">Guest</span>
                                                        <small class="text-muted">Pengguna Tamu</small>
                                                    @endif
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="bx bx-user me-2"></i>
                                            <span class="align-middle">My Profile</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="bx bx-cog me-2"></i>
                                            <span class="align-middle">Settings</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <span class="align-middle d-flex align-items-center">
                                                <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                                                <span class="align-middle flex-grow-1 ms-1">Billing</span>
                                                <span
                                                    class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <a type="submit" class="dropdown-item" href="{{ route('logout') }}">
                                                <i class="bx bx-power-off me-2"></i>
                                                <span class="align-middle">Log Out
                                                </span>
                                            </a>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            <!--/ User -->
                        </ul>
                    </div>
                </nav>

                <!-- / Navbar -->

                <div class="mt-3 content-wrapper">
                    @yield('content')
                </div>
                <!-- / Content -->

                <!-- Footer -->
                {{-- <footer class="content-footer footer bg-footer-theme">
                    <div class="flex-wrap py-2 container-xxl d-flex justify-content-between flex-md-row flex-column">
                        <div class="mb-2 mb-md-0">
                            ©
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                            , made with ❤️ by
                            <a href="https://themeselection.com" target="_blank"
                                class="footer-link fw-medium">ThemeSelection</a>
                        </div>
                        <div class="d-none d-lg-inline-block">
                            <a href="https://themeselection.com/license/" class="footer-link me-4"
                                target="_blank">License</a>
                            <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">More
                                Themes</a>

                            <a href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/documentation/"
                                target="_blank" class="footer-link me-4">Documentation</a>

                            <a href="https://github.com/themeselection/sneat-html-admin-template-free/issues"
                                target="_blank" class="footer-link">Support</a>
                        </div>
                    </div>
                </footer> --}}
                <!-- / Footer -->

                <div class="content-backdrop fade"></div>
            </div>
            <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->


    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('dashboard-admin/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('dashboard-admin/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('dashboard-admin/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('dashboard-admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('dashboard-admin/assets/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('dashboard-admin/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('dashboard-admin/assets/js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('dashboard-admin/assets/js/dashboards-analytics.js') }}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        //message with toastr
        @if (session()->has('success'))

            toastr.success('{{ session('success') }}', 'BERHASIL!');
        @elseif (session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!');
        @endif
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
