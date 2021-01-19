<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="{{ route('home') }}">{{$config_quoteandsell->company_name}}</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

 

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard.index') }}"  ><i class="fas fa-tachometer-alt"></i> Panel </a>
      </li>  
      <li class="nav-item">
        <a class="nav-link" href="{{ route('home') }}" ><i class="fas fa-home"></i>Home </a>
      </li>  
      <ul class="nav navbar-nav navbar-right">
         <li class="nav-item">
       	    <a class="nav-link" href="#" >
    	   	    <i class="fa fa-user"></i> {{ Auth::user()->user }}  ({{ Auth::user()->user_type }}) <span class="caret"></span>
		        </a>
	        </li>
          <li class="nav-item">	
		        <a class="nav-link" href="{{ route('logout') }}">Finalizar sesión</a>
	        </li>
      </ul>
    </ul>
  </div>
</nav>