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
                <input type="text" class="border-0 shadow-none form-control ps-1 ps-sm-2" placeholder="Search..."
                    aria-label="Search..." />
            </div>
        </div>
        <!-- /Search -->

        <ul class="flex-row navbar-nav align-items-center ms-auto">
            <!-- Place this tag where you want the button to render. -->
            <li class="nav-item lh-1 me-3">
                <a class="github-button" href="https://github.com/themeselection/sneat-html-admin-template-free"
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
                                        <span class="fw-medium d-block">{{ Auth::user()->name }}</span>
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
                        <a class="dropdown-item" href="javascript:void(0);">
                            <i class="bx bx-power-off me-2"></i>
                            <span class="align-middle">Log Out

                            </span>
                        </a>
                    </li>
                </ul>
            </li>
            <!--/ User -->
        </ul>
    </div>
</nav>