<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->
@include('layouts.partials.head')

<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 2-columns  fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-color="bg-gradient-x-purple-red" data-col="2-columns">
  
  
  
<!-- BEGIN: Header-->
@include('layouts.partials.header')
<!-- END: Header-->


<!-- BEGIN: Main Menu-->
@include('layouts.partials.sidebar')
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
  
<script src="//cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js">
</script>
<script>
jQuery(document).ready(function() {
    jQuery('.js-example-basic-multiple').select2();
});
</script>
</body>
<!-- END: Body-->

</html>
