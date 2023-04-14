@extends('layouts/commonMaster' )

@section('layoutContent')
<button id="dark-mode-toggle">Toggle Dark Mode<i class="bx bx-sm bx-moon"></i></button>

<!-- Content -->
@yield('content')
<!--/ Content -->

@endsection
