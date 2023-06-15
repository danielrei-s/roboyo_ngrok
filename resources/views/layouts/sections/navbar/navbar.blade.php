@php
$containerNav = $containerNav ?? 'container-fluid';
$navbarDetached = ($navbarDetached ?? '');

@endphp

<!-- Navbar -->
@if(isset($navbarDetached) && $navbarDetached == 'navbar-detached')
<nav class="layout-navbar {{$containerNav}} navbar navbar-expand-xl {{$navbarDetached}} align-items-center bg-navbar-theme" id="layout-navbar">
  @endif
  @if(isset($navbarDetached) && $navbarDetached == '')
  <nav class="layout-navbar navbar navbar-expand-xl align-items-center bg-navbar-theme" id="layout-navbar">
    <div class="{{$containerNav}}">
      @endif

      <!--  Brand demo (display only for navbar-full and hide on below xl) -->
      @if(isset($navbarFull))
      <div class="navbar-brand app-brand demo d-none d-xl-flex py-0 me-4">
        <a href="{{secure_url('/')}}" class="app-brand-link gap-2">
          <span class="app-brand-logo demo">
            <img src="{{asset('assets/img/icons/brands/roboyo_R_12.jpg')}}">   <!-- Roboyo Logo -->
          </span>
          <span class="app-brand-text demo menu-text fw-bolder">{{config('variables.templateName')}}</span>
        </a>
      </div>
      @endif

      <!-- ! Not required for layout-without-menu -->
      @if(!isset($navbarHideToggle))
      <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0{{ isset($menuHorizontal) ? ' d-xl-none ' : '' }} {{ isset($contentNavbar) ?' d-xl-none ' : '' }}">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
          <i class="bx bx-menu bx-sm"></i>
        </a>
      </div>
      @endif

       <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <ul class="navbar-nav flex-row align-items-center ms-auto">
          {{--<button id="dark-mode-toggle"><i class="bx bx-sm bx-moon"></i></button>

          DARK MODE, TBC --}}


          <!-- User -->
          @auth
            @if (auth()->user()->admin == 1)
             @php $role = 'Manager'; @endphp            <!-- Verificar que tipo de utilizador -->
            @elseif (auth()->user()->admin == 2)                   <!-- Colocar tipo em $role -->
             @php $role = 'Admin'; @endphp
            @else
             @php $role = 'Pentester'; @endphp
            @endif

          <li class="nav-item navbar-dropdown dropdown-user dropdown">
            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
              <div class="avatar avatar-online">
                <img src="{{ asset(auth()->user()->picture) }}" alt class="w-px-40 h-auto rounded-circle">
              </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li>
                <a class="dropdown-item" href="/dashboard">
                  <div class="d-flex">
                    <div class="flex-shrink-0 me-3">
                      <div class="avatar avatar-online">
                        <img src="{{ asset(auth()->user()->picture) }}" alt class="w-px-40 h-auto rounded-circle">
                      </div>
                    </div>
                    <div class="flex-grow-1">
                      <span class="fw-semibold d-block">{{auth()->user()->firstName}} {{auth()->user()->lastName}}</span>
                      <small class="text-muted">{{$role}}</small>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <div class="dropdown-divider"></div>
              </li>
              <li>
                <a href="{{secure_url('/dashboard')}}" class="dropdown-item">
                  <i class="bx bx-user me-2"></i>
                  <span class="align-middle">My Profile</span>
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="{{secure_url('/pages/account-settings-account')}}">
                  <i class='bx bx-cog me-2'></i>
                  <span class="align-middle">Settings</span>
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="javascript:void(0);">
                  <span class="d-flex align-items-center align-middle">
                    <i class="flex-shrink-0 bx bx-bell me-2 pe-1"></i>
                    <span class="flex-grow-1 align-middle">Notifications</span>
                    <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
                  </span>
                </a>
              </li>
              <li>
                <div class="dropdown-divider"></div>
              </li>
              <li>
                <a class="dropdown-item" href="javascript:void(0);">
                  <div class="d-flex justify-content-center">
                    <form method="POST" action="/logout">
                      @csrf
                      <button class="btn rounded-pill btn-outline-danger text-center"><i class='bx bx-power-off me-2'></i>  Log out  </button>
                    </form>
                  </div>
                </a>
              </li>
            </ul>
          </li>
          @endauth
          <!--/ User -->
          <!-- Guest -->
          @guest
           <button class="btn btn-outline-primary" type="button" onclick="location.href='/auth/login-basic'">Login</button>
          @endguest
          <!--/ Guest -->
        </ul>
      </div>

      @if(!isset($navbarDetached))
    </div>
    @endif
  </nav>
  <!-- / Navbar -->
