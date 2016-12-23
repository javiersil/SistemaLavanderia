<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Administrador | Panel</title>

    <link href="/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Toastr style -->
    <link href="/dist/css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="/dist/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <link href="/dist/css/animate.css" rel="stylesheet">
    <link href="/dist/css/style.css" rel="stylesheet">

</head>

<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="/img/profile_small.jpg" />
                             </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"> {{  Auth::user()->name }}</strong>
                             </span> <span class="text-muted text-xs block">Perfil <b class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="#"><i class="fa fa-home"></i> {{  Auth::user()->domicilio}} </a></li>
                                <li><a href="#"><i class="fa fa-phone"></i> {{  Auth::user()->telefono }} </a></li>
                                <li><a href="#"><i class="fa fa-envelope-o"></i> {{  Auth::user()->email }}</a></li>
                                <li class="divider"></li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out"></i> Cerrar sesion</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            IN+
                        </div>
                    </li>
                   


                   <li>
                        <a  href="{{  url('/')}}"><i class="fa fa-home"></i> <span class="nav-label">Inicio</span></a>


                    </li>



                    <li>
                        <a  href="{{  action('PedidoController@index')}}"><i class="fa fa-diamond"></i> <span class="nav-label">Pedidos</span></a>


                    </li>
               @if(Auth::check() )
            @if(Auth::user()->is_admin())

            <li><a  href="{{  action('UsuarioController@index')}}"><i class="fa fa-users"></i> <span class="nav-label">Usuarios
            </span></a></li>  
            @endif @endif


                    <li>
                        <a  href="{{  action('ClienteController@index')}}"><i class="fa fa-group"></i> <span class="nav-label">Clientes</span></a>
                     
                    </li>
                    
                  


                    
                </ul>

            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <form role="search" class="navbar-form-custom"  method="get" action="{{url('/clientes')  }}">
                <div class="form-group">
                    <input type="text" placeholder="Buscar cliente" class="form-control" name="top-search" id="top-search">
                </div>
            </form>
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">Bienvenido Panel de administrador.</span>
                </li>
               


                <li>
                    <a href="{{ url('/logout') }}">
                        <i class="fa fa-sign-out"></i> Cerrar sesion
                    </a>
                </li>
                <li>
                    <a class="right-sidebar-toggle">
                        <i class="fa fa-tasks"></i>
                    </a>
                </li>
            </ul>

        </nav>
        </div>
            
        <div class="row">
            <div class="col-lg-12">
                


                 <div class="col-lg-10">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        

                        <div class="m-t-sm">

                            <div class="row">
                                
                                <div class="col-md-10">
                                   @yield('head')


                                            <div class="col-md-4">

        @include('flash::message')

        </div>
     

  @if (count($errors) > 0)
    <div class="alert alert-danger col-md-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


                                </div>
                            </div>

                        </div>

                       

                    </div>
                </div>
            </div>

 



              <div class="col-lg-10">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        
                             
                        <div class="m-t-sm">

                            <div class="row">
                                
                                <div class="col-md-10">
                                    @yield('contenedor')
                                </div>
                            </div>

                        </div>

                       

                    </div>
                </div>
            </div>


             






            </div>

                <div class="footer">
                   
                    <div>
                        <strong>Copyright</strong> Holi-Company &copy; 2014-2015
                    </div>
                </div>
        
            </div>



        </div>
              
        </div>
       
   


      
    

      @yield('js')
    <!-- Mainly scripts -->


    <script src="/dist/js/jquery-2.1.1.js"></script>
    <script src="/dist/js/bootstrap.min.js"></script>
    <script src="/dist/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="/dist/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Flot -->
    <script src="/dist/js/plugins/flot/jquery.flot.js"></script>
    <script src="/dist/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="/dist/js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="/dist/js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="/dist/js/plugins/flot/jquery.flot.pie.js"></script>

    <!-- Peity -->
    <script src="/dist/js/plugins/peity/jquery.peity.min.js"></script>
    <script src="/dist/js/demo/peity-demo.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="/dist/js/inspinia.js"></script>
    <script src="/dist/js/plugins/pace/pace.min.js"></script>

    <!-- jQuery UI -->
    <script src="/dist/js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- GITTER -->
    <script src="/dist/js/plugins/gritter/jquery.gritter.min.js"></script>

    <!-- Sparkline -->
    <script src="/dist/js/plugins/sparkline/jquery.sparkline.min.js"></script>

    <!-- Sparkline demo data  -->
    <script src="/dist/js/demo/sparkline-demo.js"></script>

    <!-- ChartJS-->
    <script src="/dist/js/plugins/chartJs/Chart.min.js"></script>

    <!-- Toastr -->
    <script src="/dist/js/plugins/toastr/toastr.min.js"></script>


    
</body>
</html>
