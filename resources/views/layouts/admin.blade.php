<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('css/_all-skins.min.css')}}">
    <link rel="apple-touch-icon" href="img/apple-touch-icon.png">
    <link rel="shortcut icon" href="img/favicon.ico">

    <link rel="stylesheet" href="{{asset('plugins/trumbowyg/ui/trumbowyg.css')}}">

    <link rel="stylesheet" href="{{asset('plugins/chosen/chosen.css')}}">

   
    

  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        @if (Auth::guard('profesor')->check()|| Auth::guard("apoderado")->check() || Auth::guard("administrativo")->check() || Auth::guard("alumno")->check()|| Auth::guard("administrador")->check())
        <!-- Logo -->
        <a href="{{url('home')}}" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b></b>Inet</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Inicio</b></span>
        </a>
        
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">  
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
        @endif   
              <!-- User Account: style can be found in dropdown.less -->
              @if(Auth::guard('profesor')->check())
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                  <small class="bg-red"><b> Profesor </b></small>&nbsp;&nbsp;
                  {{ Auth::guard('profesor')->user()->name_and_last }}
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    
                    <p>
                    @if((Auth::guard('profesor')->user()->foto)!= "")
                    <img src="{{ asset('imagenes/profesores/'. Auth::guard('profesor')->user()->foto) }}" height="100px" width="100px">
                    @else
                     <img src="{{ asset('imagenes/profesores/default.jpg') }}" height="100px" width="100px">
                     @endif
                    </p>
                  </li>
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">    
                    <div class="pull">
                      <a href="{{url('profesores/modificar')}}"><i class="fa fa-btn fa-user"></i> Editar Usuario</a>  
                    </div>
                    <div class="pull">
                      <a href="{{ url('profesores/logout') }}"><i class="fa fa-btn fa-sign-out"></i> Cerrar Sesión</a>
                    </div>
                  </li>
                </ul>
              </li>
              @elseif(Auth::guard('administrativo')->check())
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                  <small class="bg-yellow"><b> Administrativo </b></small>&nbsp;&nbsp;
                  {{ Auth::guard('administrativo')->user()->name_and_last }}
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <p>
                    @if((Auth::guard('administrativo')->user()->foto)!= "")
                     <img src="{{ asset('imagenes/administrativos/'. Auth::guard('administrativo')->user()->foto) }}" height="100px" width="100px">
                     @else
                     <img src="{{ asset('imagenes/administrativos/default.jpg') }}" height="100px" width="100px">
                     @endif
                    </p>
                  </li>
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">    
                    <div class="pull">
                      <a href="{{url('administrativos/modificar')}}"><i class="fa fa-btn fa-user"></i> Editar Usuario</a>  
                    </div>
                    <div class="pull">
                      <a href="{{ url('administrativos/logout') }}"><i class="fa fa-btn fa-sign-out"></i> Cerrar Sesión</a>
                    </div>
                  </li>
                </ul>
              </li>
              @elseif(Auth::guard('administrador')->check())
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                  <small style="background-color: rgb(0,31,63); border-color: rgb(0, 31, 63);"><b> Administrador </b></small>&nbsp;&nbsp;
                  {{ Auth::guard('administrador')->user()->name_and_last}}
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <p>
                    
                     
                    <img src="{{ asset('imagenes/administrador/administrador.png') }}" height="100px" width="100px">
                   
                    </p>
                  </li>
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">    
                    <div class="pull">
                      <a href="{{url('administradores/modificar')}}"><i class="fa fa-btn fa-user"></i> Editar Usuario</a>  
                    </div>
                    <div class="pull">
                      <a href="{{ url('administradores/logout') }}"><i class="fa fa-btn fa-sign-out"></i> Cerrar Sesión</a>
                    </div>
                  </li>
                </ul>
              </li>
                @elseif(Auth::guard('apoderado')->check())
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                  <small class="bg-green"><b> Apoderado </b></small>&nbsp;&nbsp;
                  {{ Auth::guard('apoderado')->user()->name_and_last }}
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    
                    <p>
                    @if((Auth::guard('apoderado')->user()->foto)!= "")
                     <img src="{{ asset('imagenes/apoderados/'. Auth::guard('apoderado')->user()->foto) }}" height="100px" width="100px">
                      @else
                     <img src="{{ asset('imagenes/apoderados/default.jpg') }}" height="100px" width="100px">
                     @endif
                    </p>
                  </li>
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">    
                    <div class="pull">
                      <a href="{{url('apoderados/modificar')}}"><i class="fa fa-btn fa-user"></i> Editar Usuario</a>  
                    </div>
                    <div class="pull">
                      <a href="{{ url('apoderados/logout') }}"><i class="fa fa-btn fa-sign-out"></i> Cerrar Sesión</a>
                    </div>
                  </li>
                </ul>
              </li>
              @elseif(Auth::guard('alumno')->check())
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                  <small class="bg-blue"><b> Alumno </b></small>&nbsp;&nbsp;
                  {{ Auth::guard('alumno')->user()->name_and_last }}
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    
                    <p>
                     @if((Auth::guard('alumno')->user()->foto)!= "")
                     <img src="{{ asset('imagenes/alumnos/'. Auth::guard('alumno')->user()->foto) }}" height="100px" width="100px">
                     @else
                     <img src="{{ asset('imagenes/alumnos/default.jpg') }}" height="100px" width="100px">
                     @endif
                    </p>
                  </li>
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">    
                    <div class="pull">
                      <a href="{{url('alumnos/modificar')}}"><i class="fa fa-btn fa-user"></i> Editar Usuario</a>  
                    </div>
                    <div class="pull">
                      <a href="{{ url('alumnos/logout') }}"><i class="fa fa-btn fa-sign-out"></i> Cerrar Sesión</a>
                    </div>
                  </li>
                </ul>
              </li>
              @endif
            </ul>
          </div>

        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
           
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
                    
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"> --------------------------------------------------- </li>
            
            @if (Auth::guard("administrador")->check())
            <li class="treeview">
              <a href="#">
                <i class="fa fa-users"></i>
                <span>Usuarios</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">

               <li>
              <a href="{{URL::asset('alumnos')}}">
                <i class="fa  fa-user"></i> <span>Alumnos</span> 
                <i class="pull-right fa fa-circle text-blue"></i>
              </a>
            </li>
                
                 <li>
              <a href="{{URL::asset('apoderados')}}">
                <i class="fa fa-male"></i> <span>Apoderados</span>
                <i class="pull-right fa fa-circle text-green"></i>
              </a>
            </li>

              <li>
              <a href="{{URL::asset('administrativos')}}">
                <i class="fa fa-user-secret"></i> <span>Administrativos</span>
                <i class="pull-right fa fa-circle text-yellow"></i>
              </a>
            </li>
               <li>
              <a href="{{URL::asset('profesores')}}">
                <i class="fa fa-user-md"></i> <span>Profesores</span>
                <i class="pull-right fa fa-circle text-red"></i>
              </a>
            </li>
              </ul>
            </li>

           
            <li>
              <a href="{{URL::asset('cursos')}}">
                <i class="fa fa-graduation-cap"></i> <span>Cursos</span>
                <small class="label pull-right bg-yellow"></small>
              </a>
            </li>

             <li>
              <a href="{{URL::asset('asignaturas')}}">
                <i class="fa fa-book"></i> <span>Asignaturas</span>
                <small class="label pull-right bg-red"></small>
              </a>
            </li>

            <li>
              <a href="{{URL::asset('cargos')}}">
                <i class="fa fa-briefcase"></i> <span>Cargos</span>
                <small class="label pull-right bg-yellow"></small>
              </a>
            </li>

            
           
            <li>
              <a href="{{URL::asset('salas')}}">
                <i class="fa fa-building"></i> <span>Sala</span>
                <small class="label pull-right bg-red"></small>
              </a>
            </li>      

            <li>
              <a href="{{URL::asset('noticias')}}">
                <i class="fa fa-newspaper-o"></i> <span>Noticias</span>
                <small class="label pull-right bg-red"></small>
              </a>
            </li>

            <li>
              <a href="{{URL::asset('matriculas')}}">
                <i class="fa fa-edit "></i> <span>Matriculas</span>
                <small class="label pull-right bg-red"></small>
              </a>
            </li>

           

           
            @elseif(Auth::guard('alumno')->check())

            <li>
              <a href="{{URL::asset('datos-alumno/personal')}}">
                <i class="fa  fa-user"></i> <span>Informacion Personal</span>
                <i class="pull-right fa fa-circle text-blue"></i>
              </a>
            </li>

            <li>
              <a href="{{URL::asset('datos-alumno/asignaturas')}}">
                <i class="fa fa-book"></i> <span>Mis Asignaturas</span>
                <small class="label pull-right bg-red"></small>
              </a>
            </li>

            <li>
              <a href="{{URL::asset('datos-alumno/conductas')}}">
                <i class="fa fa-clone"></i> <span>Libro de Anotaciones</span>
                <small class="label pull-right bg-red"></small>
              </a>
            </li>

            

            @elseif(Auth::guard('apoderado')->check())

            <li>
              <a href="{{URL::asset('datos-apoderado/personal')}}">
                <i class="fa  fa-user"></i> <span>Informacion Personal</span>
                <i class="pull-right fa fa-circle text-green"></i>
              </a>
            </li>

            <li>
              <a href="{{URL::asset('datos-apoderado/alumnos')}}">
                <i class="fa fa-users"></i> <span>Mis Alumnos</span>
                <small class="label pull-right bg-red"></small>
              </a>
            </li>

           

            

            @elseif(Auth::guard('profesor')->check())

            <li>
              <a href="{{URL::asset('datos-profesor/personal')}}">
                <i class="fa  fa-user"></i> <span>Informacion Personal</span>
                <i class="pull-right fa fa-circle text-red"></i>
              </a>
            </li> 

            <li>
              <a href="{{URL::asset('datos-profesor/asignaturas')}}">
                <i class="fa fa-book"></i> <span>Mis Asignaturas</span>
                <small class="label pull-right bg-red"></small>
              </a>
            </li>

            <li>
              <a href="{{URL::asset('conductas')}}">
                <i class="fa fa-clone"></i> <span>Conductas</span>
                <small class="label pull-right bg-red"></small>
              </a>
            </li>

            <li>
              <a href="{{URL::asset('evaluaciones')}}">
                <i class="fa fa-file-text-o"></i> <span>Evaluaciones</span>
                <small class="label pull-right bg-red"></small>
              </a>
            </li>

            <li>
              <a href="{{URL::asset('eventos')}}">
                <i class="fa fa-calendar"></i> <span>Eventos</span>
                <small class="label pull-right bg-red"></small>
              </a>
            </li>

             @elseif(Auth::guard('administrativo')->check())

             <li>
              <a href="{{URL::asset('datos-administrativo/personal')}}">
                <i class="fa  fa-user"></i> <span>Informacion Personal</span>
                <i class="pull-right fa fa-circle text-yellow"></i>
              </a>
            </li>

             <li>
              <a href="{{URL::asset('cursos')}}">
                <i class="fa fa-graduation-cap"></i> <span>Cursos</span>
                <small class="label pull-right bg-yellow"></small>
              </a>
            </li>

              <li>
              <a href="{{URL::asset('noticias')}}">
                <i class="fa fa-newspaper-o"></i> <span>Noticias</span>
                <small class="label pull-right bg-red"></small>
              </a>
            </li>

             
            <li class="treeview">
              <a href="#">
                <i class="fa fa-users"></i>
                <span>Alumnos</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">

               <li>
              <a href="{{URL::asset('alumnos/register')}}">
                <i class="fa  fa-user"></i> <span>Registrar Alumno</span>
                <small class="label pull-right bg-blue">1</small>
              </a>
            </li>
                
              <li>
              <a href="{{URL::asset('alumnos')}}">
                <i class="fa fa-male"></i> <span>Alumnos</span>
                <small class="label pull-right bg-green">2</small>
              </a>
            </li>

            <li>
              <a href="{{URL::asset('matriculas')}}">
                <i class="fa fa-edit "></i> <span>Matricular</span>
                <small class="label pull-right bg-red">3</small>
              </a>
            </li>

            
              </ul>
            </li>

            

            @endif
                        
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
  





       <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        
        <!-- Main content -->
        <section class="content">
          
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">@yield('title','Default')</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    
                    <!--<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>-->
                  </div>
                </div>
               
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                      <div class="col-md-12">
                              <!--Contenido-->
                              @include('flash::message')
                              @yield('content')
                              <!--Fin Contenido-->
                           </div>
                        </div>
                        
                      </div>
                    </div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <!--Fin-Contenido-->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0.0
        </div>
        <strong>TrrblHD Developers.</strong> All rights reserved.
      </footer>

      
    <!-- jQuery 2.1.4 -->
    <script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>

    <script src="{{asset('js/jQuery.Rut.js')}}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('js/app.min.js')}}"></script>

    <script src="{{asset('plugins/trumbowyg/trumbowyg.js')}}"></script>

    <script src="{{asset('js/dist/langs/es.min.js')}}"></script>

    <script src="{{asset('plugins/chosen/chosen.jquery.js')}}"></script>

    <script src="{{asset('plugins/rut/jquery.rut.js')}}"></script> 

    



    <script>
    $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
    </script>

   @yield('js') 
  
  </body>
</html>
