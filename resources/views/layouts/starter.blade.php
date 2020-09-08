<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>AdminLTE 3 | Starter</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="/{{ env('URL_REMOTE', '') }}plugins/fontawesome-free/css/all.min.css">

  <!-- Select2 -->
  <link rel="stylesheet" href="/{{ env('URL_REMOTE', '') }}plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="/{{ env('URL_REMOTE', '') }}plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="/{{ env('URL_REMOTE', '') }}dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <link rel="stylesheet" href="/{{ env('URL_REMOTE', '') }}css/style.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  @include('layouts.partials.navbar')

  @include('layouts.partials.sidebar')

  @yield('content')
  



  

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  @include('layouts.partials.footer')
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="/{{ env('URL_REMOTE', '') }}plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/{{ env('URL_REMOTE', '') }}plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/{{ env('URL_REMOTE', '') }}dist/js/adminlte.min.js"></script>

<script src="/{{ env('URL_REMOTE', '') }}js/script.js"></script>

@stack('scripts')
@stack('scripts2')
</body>
</html>
