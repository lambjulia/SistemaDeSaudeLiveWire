<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistema de Saúde</title>
    <script type='text/javascript' src='//igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js'></script>
    <link rel="stylesheet" href="{{url('css/styles.css')}}">
    <link rel="stylesheet" href="{{url('css/style.css')}}">
    <link rel="stylesheet" href="{{url('css/__codepen_io_andytran_pen.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/atlantis.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/fonts/material-icon/css/material-design-iconic-font.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/fonts.min.css')}}">
    {{-- Bootstrap Styles --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <nav class="navbar navbar-header navbar-expand-s0" style="
    background: linear-gradient(
      to left,
      #409def,
      #51a3eb,
      #a9d5f4,
      #a9d5f4
    );
    ">
    
        <div class="container-fluid">
            <a href="/">
                <img src="{{url('assets/img/logo.png')}}" class="img-navbar">
            </a>
        </div>
    </nav>
    @livewireStyles
   
       <div class="sidebar sidebar-style-2">
        <div class="sidebar-wrapper scrollbar scrollbar-inner">
            <div class="sidebar-content">
                <ul class="nav nav-primary">
    
                    <li class="nav-item {{ (request()->Is('')) ? 'active' : '' }}" class="sr-only">
                        <a href="">
                            <i class="fas fa-home"></i>
                            <p>Menu Incial</p>
                        </a>
                    </li>

                    <li class="nav-item {{ (request()->is('')) }}">
                        <a href="/pacientes">
                            <i class="fas fa-user-plus"></i>
                            <p>Pacientes</p>
                        </a>
                    </li>
                    <li class="nav-item {{ (request()->is('')) }}">
                        <a href="/medicos">
                            <i class="fas fa-user-md"></i>
                            <p>Médicos</p>
                        </a>
                    </li>      
                    
                    <li class="nav-item {{ (request()->is('')) }}">
                        <a href="">
                            <i class="fa-solid fa-hospital-user"></i>
                            <p>Consultas</p>
                        </a>
                    </li>

                    <li class="nav-item {{ (request()->is('')) || (request()->is('mulher.acolhimentos'))  ? 'active' : '' }}">
                        <a data-toggle="collapse"  aria-controls="collapseOne" href="#base">
                            <i class="fas fa-file-medical"></i>
                            <p>Dados de cadastro</p>
                            <span class="caret"></span>
                        </a>
                        <div class="expandable collapse {{ (request()->routeIs('')) || (request()->routeIs('')) || (request()->routeIs('mulher.cadastro')) ? 'show' : '' }}"
                            aria-controls="collapseOne" id="base">
                            <ul class="nav nav-collapse ">
                                <a href="/convenios">
                                    <i class="fa-regular fa-handshake"></i>
                                    <span class="sub-item">Convênios</span>
                                </a>
                                
                                <a href="/especialidades">
                                    <i class="fas fa-stethoscope"></i>
                                   <span class="sub-item">Especialidades</span>
                                </a>
                            </ul>
                        </div>
                    </li>
              
    
                    </ul>
                    </nav>
            </div>
        </div>
    </div>
</head>
<body>
 
    {{ $slot }}

    {{-- Bootstrap Scripts --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    <script src="https://kit.fontawesome.com/58e82e8236.js" crossorigin="anonymous"></script>
    @stack('scripts')
    @livewireScripts
</body>
</html>