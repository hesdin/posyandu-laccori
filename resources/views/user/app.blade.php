<!doctype html>
<html lang="en">
@include('admin.includes.head')

<body class="vertical  light  ">
  <div class="wrapper">
    @if (Auth::guard('web'))
      {{-- Navbar --}}
      @include('user.includes.navbar')
      {{-- End Navbar --}}
    @endif

    {{-- Sidebar --}}
    @include('user.includes.sidebar')
    {{-- End Sidebar --}}
    <main role="main" class="main-content">
      {{-- Main --}}
      @yield('content')
      {{-- End Main --}}
    </main> <!-- main -->
  </div> <!-- .wrapper -->
  {{-- Script --}}
  @include('admin.includes.script')
  {{-- End Script --}}
</body>

</html>
