<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Nacional Group Admin DB</title>
    <link rel="icon" href="{{ asset('images/logo/'.$header[8]->value .'') }}">

    <!-- Bootstrap core CSS-->
    <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('css/sb-admin.css')}}" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- New Add to Master -->
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/REG_FORM.css')}}" rel="stylesheet" type="text/css" />
    <!-- Text Editor Library -->
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>

 <style>
  .form-control{
   width:60%;
  }
 </style>

  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="/admin">Nacional Group  DB</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar Search -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
        </div>
      </form>

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow mx-1">
          {{-- <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell fa-fw"></i>
            <span class="badge badge-danger">9+</span>
          </a> --}}
          {{-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div> --}}
        </li>
        {{-- <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-envelope fa-fw"></i>
            <span class="badge badge-danger">7</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li> --}}
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            {{-- <a class="dropdown-item" href="#">Settings</a> --}}
          <a class="dropdown-item" href="{{url('/') }}">Back to Site</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
          </div>
        </li>
      </ul>

    </nav>

    <div id="wrapper">

     <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
          <li class="nav-item active">
              <a class="nav-link" href="/admin">
                  <i class="fas fa-fw fa-tachometer-alt"></i>
                  <span>Dashboard</span>
              </a>
          </li>
		  <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-fw fa-folder"></i>
                  <span>Master Page</span>
              </a>
              <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                  <a class="dropdown-item" href="{{url('/admin/header')}}">Header&Footer</a>
              </div>
          </li>
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-fw fa-folder"></i>
                  <span>Home Page</span>
              </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                    <a class="dropdown-item" href="{{url('/admin/main')}}">Main Panel</a>
                    {{-- <a class="dropdown-item" href="{{url('/admin/profile')}}">Profile</a>
    				<a class="dropdown-item" href="{{url('/admin/team')}}">Team</a>
    				<a class="dropdown-item" href="{{url('/admin/stat')}}">Statistics</a>
    				<a class="dropdown-item" href="{{url('/admin/history')}}">History</a>
    				<a class="dropdown-item" href="{{url('/admin/mission')}}">Mission</a> --}}

                </div>
          </li>
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-fw fa-folder"></i>
                  <span>About Page</span>
              </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                    <a class="dropdown-item" href="{{url('/admin/aboutmain')}}">Main Panel</a>
                    {{-- <a class="dropdown-item" href="{{url('/admin/Vission')}}">Vission</a>
                    <a class="dropdown-item" href="{{url('/admin/mission')}}">Mission</a>
                    <a class="dropdown-item" href="{{url('/admin/Values')}}">Values</a> --}}
                    <a class="dropdown-item" href="{{url('/admin/Faq')}}">Faq</a>



                    {{-- <a class="dropdown-item" href="{{url('/admin/wedo')}}">What We Do</a>
                    <a class="dropdown-item" href="{{url('/admin/agents')}}">Agents</a>
                    <a class="dropdown-item" href="{{url('/admin/response')}}">Responsibility</a> --}}
                </div>
          </li>
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-fw fa-folder"></i>
                  <span>Contact us</span>
              </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                    <a class="dropdown-item" href="{{url('/admin/contact')}}">Contact Page</a>
                    <a class="dropdown-item" href="{{url('/admin/messages')}}">Messages</a>
                    <a class="dropdown-item" href="{{url('/admin/news')}}">Newsletter</a>
                </div>
          </li>
          <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Partners</span>
                </a>
                  <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                        <a class="dropdown-item" href="{{url('/admin/clients')}}">Partners</a>
                        <a class="dropdown-item" href="{{url('/admin/Testimonials')}}">Testimonials  </a>
                  </div>
         </li>
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-fw fa-folder"></i>
                  <span>Blogs</span>
              </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                    <a class="dropdown-item" href="{{url('/admin/blogs')}}">Blogs Control</a>
                    <a class="dropdown-item" href="{{url('/admin/comments')}}">Comments</a>
                </div>
          </li>
          {{-- <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-fw fa-folder"></i>
                  <span>Health & Media</span>
              </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                    <a class="dropdown-item" href="/admin/health">Health</a>
                    <a class="dropdown-item" href="/admin/media">Media</a>
                </div>
          </li> --}}
          {{-- <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-fw fa-folder"></i>
                  <span>Projects</span>
              </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                    <a class="dropdown-item" href="/admin/projects">Projects</a>
                </div>
          </li> --}}
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-fw fa-folder"></i>
                  <span>Admin Control</span>
              </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                    <a class="dropdown-item" href="{{url('/admin/admin')}}">Change Data</a>
                </div>
          </li>
      </ul>

      @yield('content')

      <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="/out">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('js/sb-admin.min.js')}}"></script>

  </body>

</html>
