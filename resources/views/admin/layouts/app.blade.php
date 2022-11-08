<!doctype html>
<html lang="en">
  @include('admin.includes.head')

  <body class="vertical  light  ">
    <div class="wrapper">
      {{-- Navbar --}}
      @include('admin.includes.navbar')
      {{-- End Navbar --}}

      {{-- Sidebar --}}
      @include('admin.includes.sidebar')
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