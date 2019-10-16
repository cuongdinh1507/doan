<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <!-- Page level plugin CSS-->
  {{-- <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet"> --}}

  <!-- Custom styles for this template-->
  <link href="{{ asset('css/sb-admin.css') }}" rel="stylesheet">
  <link rel="icon" href="{{asset('img/favicon.png')}}">
</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="{{ route('admin.dashboard') }}">Management</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>
  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-home"></i>
          <span>Home</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.users') }}">
          <i class="fas fa-user"></i>
          <span>Users</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.subjects') }}">
          <i class="fas fa-book"></i>
          <span>Subjects</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.roles') }}">
          <i class="fas fa-user-tag"></i>
          <span>Roles</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.events') }}">
          <i class="far fa-calendar-alt"></i>
          <span>Events</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.projectInfo') }}">
          <i class="far fa-newspaper"></i>
          <span>Project Information</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.projectDescription') }}">
          <i class="fas fa-newspaper"></i>
          <span>Project Description</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.projectPersonnel') }}">
          <i class="fas fa-users"></i>
          <span>Project Personnel</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.projectDD') }}">
          <i class="far fa-file"></i>
          <span>Project Data Description</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
          <i class="fas fa-sign-out-alt"></i>
          <span>Logout</span></a>
      </li>
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        <div id="middle">
          @yield('content')
        </div>

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Hydrologyshare 2019</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <a class="btn btn-primary" href="{{ route('logout') }}"
          onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">Logout</a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>

  {{-- <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script> --}}

  {{-- <!-- Page level plugin JavaScript-->
  <script src="{{ asset('vendor/datatables/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('js/sb-admin.min.js') }}"></script>

  <!-- Demo scripts for this page-->
  <script src="{{ asset('js/demo/datatables-demo.js') }}"></script> --}}

</body>
<script>
  $(function(){
    $.get('{!! route('admin.tu') !!}', function(data){
      $(".totalUser").text(data.length + (data.length > 1 ? " USERS!" : " USER!"));
    });
    $.get('{!! route('admin.tp') !!}', function(data){
      $(".totalPost").text(data.length + (data.length > 1 ? " POSTS!" : " POST!"));
    });
    $.get('{!! route('admin.tfu') !!}', function(data){
      $(".totalFileUploaded").text(data.length + (data.length > 1 ? " FILES UPLOADED!" : " FILE UPLOADED!"));
    });
    $.get('{!! route('admin.tpt') !!}', function(data){
      $(".postToday").text(data.length + (data.length > 1 ? " NEW POSTS TODAY!" : " NEW POST TODAY!"));
    });
  });
</script>
</html>
