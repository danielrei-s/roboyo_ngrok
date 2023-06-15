<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

  <!-- ! Hide app brand if navbar-full -->
  <div class="app-brand demo">
    <a href="{{secure_url('/')}}" class="app-brand-link">
      <span class="app-brand-logo demo">
        <img src="{{asset('assets/img/icons/brands/roboyo_R_12.jpg')}}">
      </span>
      <span class="app-brand-text demo menu-text fw-bold ms-2">{{config('variables.templateName')}}</span>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-autod-block d-xl-none">
      <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
  </div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
    @foreach ($menuData[0]->menu as $menu) <!-- Menus defined in verticalMenu.json! -->

    {{-- adding active and open class if child is active --}}
    {{-- menu headers --}}

    @if (isset($menu->menuHeader))

    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">{{ $menu->menuHeader }}</span>
    </li>

    @else
      @if (!Auth::check() && in_array($loop->iteration, [1, 2, 3, 4]))
        @continue {{-- hide first four menus if user is not authenticated --}}
      @endif
      @if (Auth::check())
        @if (auth()->user()->admin == 1 && in_array($loop->iteration, [2]))
          @continue {{-- skip User Management if user is manager --}}
        @elseif (!(auth()->user()->admin == 2) && !(auth()->user()->admin == 1) && in_array($loop->iteration, [2, 3]))
          @continue {{-- skip User and Client Managment if user is neither admin nor manager (can only be pentester) --}}
        @endif
      @endif

    {{-- active menu method --}}
    @php
    $activeClass = null;
    $currentRouteName = Route::currentRouteName();

    if ($currentRouteName === $menu->slug) {
      $activeClass = 'active';
    }
    elseif (isset($menu->submenu)) {
      if (gettype($menu->slug) === 'array') {
        foreach($menu->slug as $slug){
          if (str_contains($currentRouteName,$slug) and strpos($currentRouteName,$slug) === 0) {
            $activeClass = 'active open';
          }
        }
      }
      else{
        if (str_contains($currentRouteName,$menu->slug) and strpos($currentRouteName,$menu->slug) === 0) {
          $activeClass = 'active open';
        }
      }
    }
    @endphp

    {{-- main menu --}}
    <li class="menu-item {{$activeClass}}">
      <a href="{{ isset($menu->url) ? url($menu->url) : 'javascript:void(0);' }}" class="{{ isset($menu->submenu) ? 'menu-link menu-toggle' : 'menu-link' }}" @if (isset($menu->target) and !empty($menu->target)) target="_blank" @endif>
        @isset($menu->icon)
          <i class="{{ $menu->icon }}"></i>
        @endisset
        <div>{{ isset($menu->name) ? __($menu->name) : '' }}</div>
      </a>

      {{-- submenu --}}
      @isset($menu->submenu)
      @include('layouts.sections.menu.submenu',['menu' => $menu->submenu])
      @endisset
    </li>
    @endif
    @endforeach
  </ul>

</aside>
