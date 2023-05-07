
<nav class="navbar navbar-expand-lg navbar-light bg-light ">
  <a class="navbar-brand" href="#">THE POST</a>
  <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  @auth
  <li class="nev-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"  role= "button" data-bs-toggle="dropdown" aria-expanded="false">
      Benvenuto {{Auth::user()->name}}
    </a>
    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
      <li><a class="dropdown-item" href="">Profilo</a></li>
      @if(Auth::user()->is_admin)
        <li><a class="dropdown-item" href="{{route('admin.dashboard')}}">Dashboard Admin</a></li>
        @endif
      </li>

      @if(Auth::user()->is_revisor)
        <li><a class="dropdown-item" href="{{route('revisor.dashboard')}}">Dashboard del Revisore</a></li>
        @endif
      </li>

      
      @if(Auth::user()->is_writer)
        <li><a class="dropdown-item" href="{{route('writer.dashboard')}}">Dashboard del Redattore</a></li>
        @endif
      </li>
      
      
      <li class="nav-item">
        <a class="nav-link" href="{{route('article.create')}}">Inserisci un articolo</a>
      </li>

  
     
     
      <li><hr class="dropdown-divider" ></li>
      <li><a  class="dropdown-item" href="#" onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">Logout</a></li>
        <form method="post" action="{{route('logout')}}" id="form-logout" class="d-none">
          @csrf
        </form>
</ul>
  </li>

  @endauth
  
  @guest
  <li class="nev-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    Benvenuto Ospite
    </a>
    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
      <li><a class="dropdown-item" href="{{route('register')}}">Registrati</a></li>
      <li><a class="dropdown-item" href="{{route('login')}}">Accedi</a></li>
    </ul>
  </li>
  @endguest

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{route('homepage')}}">Home <span class="sr-only"></span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{route('article.create')}}">Inserisci un articolo</a>
      </li>
     
      <li class="nav-item">
        <a class="nav-link" href="{{route('careers')}}">lavora con noi</a>
      </li>

      <form class="d-flex" method="GET" action="{{route('article.search')}}">
        <input class="form-control me-2" type="search" nome="query" placeholder="Cosa stai cercando?" aria-label="Search">
        <button class="btn btn-outline-info" type="submit">Cerca</button>
        
      </form>
      

     
  </div>
</nav>
