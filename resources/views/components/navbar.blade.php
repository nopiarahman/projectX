<div>
  <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
      <div class="me-3">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
      </div>
      <div>
        <a class="navbar-brand brand-logo" href="index.html">
          <h2 class="fw-bolder">PASOK</h2>
          {{-- <img src="{{ asset('admin/images/logo.svg') }}" alt="logo" /> --}}
        </a>
        <a class="navbar-brand brand-logo-mini" href="index.html">
          {{-- <h2>P</h2> --}}
          {{-- <img src="{{ asset('admin/images/logo-mini.svg') }}" alt="logo" /> --}}
        </a>
      </div>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-top">
      <ul class="navbar-nav">
        <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
          <h1 class="welcome-text"> {{ $greetings }}, <span class="text-black fw-bold">{{ $nama }}</span>
          </h1>
          <h3 class="welcome-sub-text">{{ $pesan }}</h3>
        </li>
        <li>
          <span class="welcome-sub-text d-lg-none ms-0">{{ $pesan }}</span>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto">
        {{-- <li class="nav-item dropdown d-none d-lg-block">
          <a class="nav-link dropdown-bordered dropdown-toggle dropdown-toggle-split" id="messageDropdown" href="#"
            data-bs-toggle="dropdown" aria-expanded="false"> Select Category </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0"
            aria-labelledby="messageDropdown">
            <a class="dropdown-item py-3">
              <p class="mb-0 font-weight-medium float-left">Select category</p>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item preview-item">
              <div class="preview-item-content flex-grow py-2">
                <p class="preview-subject ellipsis font-weight-medium text-dark">Bootstrap Bundle </p>
                <p class="fw-light small-text mb-0">This is a Bundle featuring 16 unique dashboards</p>
              </div>
            </a>
            <a class="dropdown-item preview-item">
              <div class="preview-item-content flex-grow py-2">
                <p class="preview-subject ellipsis font-weight-medium text-dark">Angular Bundle</p>
                <p class="fw-light small-text mb-0">Everything you’ll ever need for your Angular projects</p>
              </div>
            </a>
            <a class="dropdown-item preview-item">
              <div class="preview-item-content flex-grow py-2">
                <p class="preview-subject ellipsis font-weight-medium text-dark">VUE Bundle</p>
                <p class="fw-light small-text mb-0">Bundle of 6 Premium Vue Admin Dashboard</p>
              </div>
            </a>
            <a class="dropdown-item preview-item">
              <div class="preview-item-content flex-grow py-2">
                <p class="preview-subject ellipsis font-weight-medium text-dark">React Bundle</p>
                <p class="fw-light small-text mb-0">Bundle of 8 Premium React Admin Dashboard</p>
              </div>
            </a>
          </div>
        </li> --}}
        <li class="nav-item d-none d-lg-block">
          <div id="datepicker-popup" class="input-group date datepicker navbar-date-picker">
            <span class="input-group-addon input-group-prepend border-right">
              <span class="icon-calendar input-group-text calendar-icon"></span>
            </span>
            <input type="text" class="form-control">
          </div>
        </li>
        <li class="nav-item">
          <form class="search-form" action="#">
            <i class="icon-search"></i>
            <input type="search" class="form-control" placeholder="Search Here" title="Search here">
          </form>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link count-indicator" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
            <i class="icon-mail icon-lg"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0"
            aria-labelledby="notificationDropdown">
            <a class="dropdown-item py-3 border-bottom">
              <p class="mb-0 font-weight-medium float-left">Cooming Soon! Insyaa Allah </p>
              <span class="badge badge-pill badge-primary float-right">View all</span>
            </a>
            {{-- <a class="dropdown-item preview-item py-3">
              <div class="preview-thumbnail">
                <i class="mdi mdi-alert m-auto text-primary"></i>
              </div>
              <div class="preview-item-content">
                <h6 class="preview-subject fw-normal text-dark mb-1">Application Error</h6>
                <p class="fw-light small-text mb-0"> Just now </p>
              </div>
            </a>
            <a class="dropdown-item preview-item py-3">
              <div class="preview-thumbnail">
                <i class="mdi mdi-settings m-auto text-primary"></i>
              </div>
              <div class="preview-item-content">
                <h6 class="preview-subject fw-normal text-dark mb-1">Settings</h6>
                <p class="fw-light small-text mb-0"> Private message </p>
              </div>
            </a>
            <a class="dropdown-item preview-item py-3">
              <div class="preview-thumbnail">
                <i class="mdi mdi-airballoon m-auto text-primary"></i>
              </div>
              <div class="preview-item-content">
                <h6 class="preview-subject fw-normal text-dark mb-1">New user registration</h6>
                <p class="fw-light small-text mb-0"> 2 days ago </p>
              </div>
            </a> --}}
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link count-indicator" id="countDropdown" href="#" data-bs-toggle="dropdown"
            aria-expanded="false">
            <i class="icon-bell"></i>
            <span class="count"></span>
          </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0"
            aria-labelledby="countDropdown">
            <a class="dropdown-item py-3">
              <p class="mb-0 font-weight-medium float-left">Cooming Soon! Insyaa Allah </p>
              <span class="badge badge-pill badge-primary float-right">View all</span>
            </a>
            <div class="dropdown-divider"></div>
            {{-- <a class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <img src="images/faces/face10.jpg" alt="image" class="img-sm profile-pic">
              </div>
              <div class="preview-item-content flex-grow py-2">
                <p class="preview-subject ellipsis font-weight-medium text-dark">Marian Garner </p>
                <p class="fw-light small-text mb-0"> The meeting is cancelled </p>
              </div>
            </a>
            <a class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <img src="images/faces/face12.jpg" alt="image" class="img-sm profile-pic">
              </div>
              <div class="preview-item-content flex-grow py-2">
                <p class="preview-subject ellipsis font-weight-medium text-dark">David Grey </p>
                <p class="fw-light small-text mb-0"> The meeting is cancelled </p>
              </div>
            </a>
            <a class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <img src="images/faces/face1.jpg" alt="image" class="img-sm profile-pic">
              </div>
              <div class="preview-item-content flex-grow py-2">
                <p class="preview-subject ellipsis font-weight-medium text-dark">Travis Jenkins </p>
                <p class="fw-light small-text mb-0"> The meeting is cancelled </p>
              </div>
            </a> --}}
          </div>
        </li>
        {{-- <x-jet-dropdown align="right" width="48"> --}}
        <x-slot name="trigger">
          @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <button
              class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
              <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                alt="{{ Auth::user()->name }}" />
            </button>
          @else
            <span class="inline-flex rounded-md">
              <button type="button"
                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                {{ Auth::user()->name }}

                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                  fill="currentColor">
                  <path fill-rule="evenodd"
                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                    clip-rule="evenodd" />
                </svg>
              </button>
            </span>
          @endif
        </x-slot>

        <x-slot name="content">
          <!-- Account Management -->
          <div class="block px-4 py-2 text-xs text-gray-400">
            {{ __('Manage Account') }}
          </div>

          <x-jet-dropdown-link href="{{ route('profile.show') }}">
            {{ __('Profile') }}
          </x-jet-dropdown-link>

          @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
            <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
              {{ __('API Tokens') }}
            </x-jet-dropdown-link>
          @endif

          <div class="border-t border-gray-100"></div>

          <!-- Authentication -->
          <form method="POST" action="{{ route('logout') }}">
            @csrf

            <x-jet-dropdown-link href="{{ route('logout') }}" onclick="event.preventDefault();
                                              this.closest('form').submit();">
              {{ __('Log Out') }}
            </x-jet-dropdown-link>
          </form>
        </x-slot>
        {{-- </x-jet-dropdown> --}}

        <li class="nav-item dropdown d-none d-lg-block user-dropdown">
          <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">

            <img class="img-xs rounded-circle" src="{{ Auth::user()->profile_photo_url }}" alt="Profile image">
          </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
            <div class="align-center d-flex justify-content-center mt-3">
              <div class="rounded-circle"
                style="display:flex; justify-content:center; overflow: hidden; width:100px; height:100px">
                <img class="" src="{{ Auth::user()->profile_photo_url }}" alt="Profile image"
                  style="object-fit: cover; min-height:100%; min-width: 100%; ">
              </div>
            </div>
            <div class="dropdown-header text-center">
              <p class="mb-1 mt-2 font-weight-semibold">{{ auth()->user()->name }}</p>
              <p class="fw-light text-muted mb-0">{{ auth()->user()->email }}</p>
            </div>
            <a href="{{ route('profile.show') }}" class="dropdown-item"><i
                class="dropdown-item-icon mdi mdi-account-outline  me-2"></i>
              My Profile
              {{-- <span class="badge badge-pill badge-primary">1</span> --}}
            </a>
            {{-- <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-message-text-outline text-primary me-2"></i>
              Messages</a> --}}
            {{-- <a class="dropdown-item"><i
                class="dropdown-item-icon mdi mdi-calendar-check-outline text-primary me-2"></i> Activity</a> --}}

            <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-help-circle-outline me-2"></i>
              FAQ</a>
            <!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}">
              @csrf

              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                              this.closest('form').submit();">
                <i class="dropdown-item-icon mdi mdi-power me-2"></i> {{ __('Log Out') }}
              </a>
            </form>
            {{-- <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out</a> --}}
          </div>
        </li>
      </ul>
      <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
        data-bs-toggle="offcanvas">
        <span class="mdi mdi-menu"></span>
      </button>
    </div>
  </nav>
</div>
