
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Dashboard Template for Bootstrap</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

    <!-- Bootstrap core CSS -->
    {{-- <link href="../../dist/css/bootstrap.min.css" rel="stylesheet"> --}}

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    {{-- <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet"> --}}

    <!-- Custom styles for this template -->
    {{-- <link href="dashboard.css" rel="stylesheet"> --}}

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    {{-- <script src="../../assets/js/ie-emulation-modes-warning.js"></script> --}}

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    @yield('style')

    <style>/*
        * Base structure
        */

       /* Move down content because we have a fixed navbar that is 50px tall */
       body {
         padding-top: 50px;
       }


       /*
        * Global add-ons
        */

       .sub-header {
         padding-bottom: 10px;
         border-bottom: 1px solid #eee;
       }

       /*
        * Top navigation
        * Hide default border to remove 1px line.
        */
       .navbar-fixed-top {
         border: 0;
       }

       /*
        * Sidebar
        */

       /* Hide for mobile, show later */
       .sidebar {
         display: none;
       }
       @media (min-width: 768px) {
         .sidebar {
           position: fixed;
           top: 51px;
           bottom: 0;
           left: 0;
           z-index: 1000;
           display: block;
           padding: 20px;
           overflow-x: hidden;
           overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
           background-color: #f5f5f5;
           border-right: 1px solid #eee;
         }
       }

       /* Sidebar navigation */
       .nav-sidebar {
         margin-right: -21px; /* 20px padding + 1px border */
         margin-bottom: 20px;
         margin-left: -20px;
       }
       .nav-sidebar > li > a {
         padding-right: 20px;
         padding-left: 20px;
       }
       .nav-sidebar > .active > a,
       .nav-sidebar > .active > a:hover,
       .nav-sidebar > .active > a:focus {
         color: #fff;
         background-color: #428bca;
       }


       /*
        * Main content
        */

       .main {
         padding: 20px;
       }
       @media (min-width: 768px) {
         .main {
           padding-right: 40px;
           padding-left: 40px;
         }
       }
       .main .page-header {
         margin-top: 0;
       }


       /*
        * Placeholder dashboard ideas
        */

       .placeholders {
         margin-bottom: 30px;
         text-align: center;
       }
       .placeholders h4 {
         margin-bottom: 0;
       }
       .placeholder {
         margin-bottom: 20px;
       }
       .placeholder img {
         display: inline-block;
         border-radius: 50%;
       }</style>
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
          <li class={{url()->current() == url('/dashboard')?"active":"" }} ><a href="{{url('/dashboard')}}">Dashboard</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Help</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">

        <div class="col-sm-3 col-md-2 sidebar"  id="sideLeft">
          <ul class="nav nav-sidebar">
            <li class={{url()->current() == url('/dashboard')?"active":"" }} ><a href="{{url('/dashboard')}}">Reports</a></li>
            <li><a href="#">Analytics</a></li>
            <li><a href="#">Export</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="">Nav item</a></li>
            <li><a href="">Nav item again</a></li>
            <li><a href="">One more nav</a></li>
            <li><a href="">Another nav item</a></li>
            <li><a href="">More navigation</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="">Nav item again</a></li>
            <li><a href="">One more nav</a></li>
            <li><a href="">Another nav item</a></li>
          </ul>
        </div>
        @yield('request-details')

        @yield('dashboard-home')

      </div>
    </div>

    @yield('script')
  </body>
</html>
