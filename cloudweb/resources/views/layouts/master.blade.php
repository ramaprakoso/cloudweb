<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->
@include('includes.head')
<!-- END: Head-->

<!-- BEGIN: Body-->
<body class="vertical-layout vertical-compact-menu 2-columns   fixed-navbar" data-open="click"
    data-menu="vertical-compact-menu" data-col="2-columns">
  <!-- BEGIN: Header-->
  @include('includes.header')
  <!-- END: Header-->
  <!-- BEGIN: Main Menu-->
  @include('includes.sidemenu')
  <!-- END: Main Menu-->
  <!-- BEGIN: Content-->
  <div class="app-content content">
    <div class="content-wrapper">
        <!-- eCommerce statistic -->
      @yield('content')
        <!--/ eCommerce statistic -->
    </div>
  </div>
  <!-- END: Content-->

  <div class="sidenav-overlay"></div>
  <div class="drag-target"></div>

  <!-- BEGIN: Footer-->
  @include('includes.footer')
  <!-- END: Footer-->

  <!-- BEGIN: Vendor JS-->
  @include('includes.jscript')
  <!-- END: Page JS-->
</body>
<!-- END: Body-->
</html>
