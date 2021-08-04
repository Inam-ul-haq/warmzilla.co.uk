<!DOCTYPE html>
<html lang="en">
@include('layouts.head')
  <body>
    <!-- ===================navbar================== -->
    <!-- ===================navbar================== -->
    @include('layouts.navbar')

    <!-- ===================navbar================== -->
    <!-- ===================navbar================== -->
    @yield('content')
    <!-- ===================end banner================== -->
    <!-- ===================end banner================== -->

    <!--===================footer================== -->


    @include('layouts.footer')
    @include('layouts.scripts')
  </body>
</html>
