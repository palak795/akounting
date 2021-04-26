<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->
@include('layouts.partials.head')

<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-color="bg-gradient-x-purple-red" data-col="2-columns">
  
  
  
<!-- BEGIN: Header-->
@include('layouts.partials.header')
<!-- END: Header-->


<!-- BEGIN: Main Menu-->
@include('layouts.partials.slidebar')
<!-- END: Main Menu-->
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
@yield('content')
    </div>
</div>  
    

@include('layouts.partials.footer')
<!-- Page Scripts -->
@yield('scripts')
<!-- Page scripts end -->
  

</body>
<!-- END: Body-->

</html>
