<!doctype html>
<html lang="en">
@include('admin.includes.head')

<body class="vertical  light  ">
  <div class="wrapper">
    @if (Auth::guard('puskesmas'))
      {{-- Navbar --}}
      @include('puskesmas.includes.navbar')
      {{-- End Navbar --}}
    @endif

    @if (Auth::guard('puskesmas'))
      {{-- Sidebar --}}
      @include('puskesmas.includes.sidebar')
      {{-- End Sidebar --}}
    @endif

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
