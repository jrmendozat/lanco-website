<div class="navbar navbar-expand-md fixed-top navbar-light bg-light">
  
  <a href="/" class="navbar-brand"><img src="/image/logos/LOGO_LANCO-01.png" alt="Logo" ></a>
    
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
          <a style="color:black; margin-right:10px" class="nav-link" href="{{ route('go-corporation')}}" >Empresa<span class="caret"></span></a>
          
          
      </li>
      <li class="nav-item dropdown">
        <a style="color:black; margin-right:10px" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="download">Productos <span class="caret"></span></a>
        <div class="dropdown-menu" aria-labelledby="download">
          
          <a style="color:black; text-decoration: underline; font-weight: bold; font-size: 16px;" href="{{ route('go-store',[1,0])}}" class="dropdown-header" >Lubricantes</a>
          <a class="dropdown-item" href="{{ route('go-store',[1,1])}}">Motores a Gasolina</a>
          <a class="dropdown-item" href="{{ route('go-store',[1,2])}}">Motores a Diesel</a>
          <a class="dropdown-item" href="{{ route('go-store',[1,3])}}">Motos</a>
          <a class="dropdown-item" href="{{ route('go-store',[1,4])}}">Marinos</a>
          <a class="dropdown-item" href="{{ route('go-store',[1,5])}}">Transmisión Automotriz</a>
          <a class="dropdown-item" href="{{ route('go-store',[1,6])}}">Industrial</a>
          <div class="dropdown-divider"></div> 
          <a style="color:black; text-decoration: underline; font-weight: bold; font-size: 16px;" href="{{ route('go-store',[2,0])}}" class="dropdown-header" >Especialidades</a>
          <a class="dropdown-item" href="{{ route('go-store',[2,7])}}">Liga para Frenos</a>
          <a class="dropdown-item" href="{{ route('go-store',[2,8])}}">Refrigerantes</a>
                 
        </div>
      </li>
      <li class="nav-item">
        <a style="color:black; " class="nav-link" href="{{ route('contactus.create')}}">Contactos</a>
      </li>

      @if(Auth::check()) 
        @can('IsCreator')
          <li class="nav-item">	
            <a style="color:Black; " class="nav-link" href="{{ route('dashboard.index') }}">Panel Administación</a>
          </li>
        @endcan
        @can('IsSuperAdmin')
          <li class="nav-item">	
            <a style="color:Black; " class="nav-link" href="{{ route('dashboard.index') }}">Panel Administación</a>
          </li>
        @endcan
        <li class="nav-item">
          <a style="color:black" class="nav-link" href="#" >{{ Auth::user()->name }}  ({{ Auth::user()->user_type }}) </a>
          
        </li>
          
        <li class="nav-item">	
          <a style="color:black" class="nav-link" href="{{ route('logout') }}">Finalizar sesión</a>
        </li>
      @else
        <li class="nav-item">	
            <a style="color:white; margin-left:80%" class="nav-link" href="{{ route('login') }}">IS</a>
        </li> 
      @endif 
      
    </ul>
  </div>
</div>


<!--

  <div style="color:black;" class="dropdown-menu" aria-labelledby="download">
              <a style="color:black; " class="dropdown-item" href="#" data-toggle="modal" data-target="#ModalMision">Misión</a>
              <a style="color:black; " class="dropdown-item" href="#" data-toggle="modal" data-target="#ModalVision">Visión</a>
          </div>  
--> 

<!-- Auto-hiding fixed navbar 
<script src="{{ asset('js/jquery.bootstrap-autohidingnavbar.js') }}" ></script>
        

<script>
  $("div.navbar.fixed-top").autoHidingNavbar();
</script>
-->

<div class="modal fade" id="ModalMision">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h1 style="font-family: 'Montserrat', sans-serif; font-weight: 700" class="modal-title"><span><img src="/image/logos/LANCO_INDICADOR.png" style="width:15%; margin-right:20px" alt=""></span>
          Misión</h1>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body text-justify">
          <h5 style="font-family: 'Open Sans', sans-serif; font-weight: 400">
              En CORPORACION LANCO, C.A., Nos dedicamos a la fabricación de productos para el mantenimiento y cuidado automotriz, 
              industrial y agrícola, cumpliendo con los estándares de calidad en sus procesos, productos y servicios, 
              en un ambiente de armonía laboral y estricto apego a nuestros valores, en constante evolución e innovación, 
              evaluando continuamente los procesos de mejoras, contribuyendo con el medio ambiente y superando 
              las expectativas de nuestros clientes.
          </h5>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        </div>
        
      </div>
    </div>
  </div>

  <div class="modal fade" id="ModalVision">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h1 style="font-family: 'Montserrat', sans-serif; font-weight: 700" class="modal-title"><span><img src="/image/logos/LANCO_INDICADOR.png" style="width:15%; margin-right:20px" alt=""></span>
          Visión</h1>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body text-justify">
          <h5 style="font-family: 'Open Sans', sans-serif; font-weight: 400">
              Lograr una posición de mercado en el ámbito nacional, en los sectores donde se desarrolle, 
              respetada y reconocida por alcanzar y mantener el máximo nivel de calidad en sus productos, servicios 
              y satisfacción al cliente, a través de un personal altamente calificado y compromiso de responsabilidad social.  
              CORPORACION LANCO, C.A. se propone mejorar la calidad de vida de los consumidores, asegurando el suministro de 
              todos sus productos competitivos y de alta calidad, colocándonos entre las mejores Industrias de Venezuela.
          </h5>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        </div>
        
      </div>
    </div>
  </div>

  <div class="modal fade" id="ModalObjetivo">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h1 style="font-family: 'Montserrat', sans-serif; font-weight: 700" class="modal-title"><span><img src="/image/logos/LANCO_INDICADOR.png" style="width:15%; margin-right:20px" alt=""></span>
          Objetivo</h1>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body text-justify">
          <h5 style="font-family: 'Open Sans', sans-serif; font-weight: 400">
            Lograr una posición de mercado en el ámbito nacional, en los sectores donde se desarrolle, siendo
            respetada y reconocida por alcanzar y mantener el máximo nivel de calidad en sus productos,
            servicios y satisfacción al cliente, a través de un personal altamente calificado y comprometido con
            la responsabilidad social.
          </h5>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>

  <div class="modal fade" id="ModalValores">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h1 style="font-family: 'Montserrat', sans-serif; font-weight: 700" class="modal-title"><span><img src="/image/logos/LANCO_INDICADOR.png" style="width:15%; margin-right:20px" alt=""></span>
          Valores</h1>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body text-justify">
          <h6 style="font-family: 'Open Sans', sans-serif; font-weight: 400">1. <strong>HONESTIDAD</strong>, cualidad valiosa de nuestra gente en Corporación</h6>
          <h6 style="font-family: 'Open Sans', sans-serif; font-weight: 400">2. Sentirnos parte de Corporación Lanco, es tener <strong>SENTIDO DE PERTENENCIA</strong>.</h6>
          <h6 style="font-family: 'Open Sans', sans-serif; font-weight: 400">3. <strong>CALIDAD</strong>, estrategia fundamental para la satisfacción de nuestros clientes.</h6>
          <h6 style="font-family: 'Open Sans', sans-serif; font-weight: 400">4. Invertir en el <strong>DESARROLLO</strong> organizacional, para alcanzar la mayor capacidad de producción.</h6>
          <h6 style="font-family: 'Open Sans', sans-serif; font-weight: 400">5. En Corporación Lanco, <strong>COMPROMETIDOS</strong>, en la contribución social y mejoramiento de la calidad</h6>
          
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  
