<nav class="navbar navbar-light">
  <a href="{{ route('agenda.index') }}" class="navbar-brand">
  	<img  class="img-responsive" 
    src="/img/libreta.png"> direc </a>

  <ul class="nav flex-column text-center">
  <li class="nav-item">
    <span class="nav-link active">Bienvenido {{ Auth::user()->name }}</span>
  </li>
  <li class="nav-item">
   

  		<!-- copiado de layouts/app.blade.php -->

  		<a class="nav-link"  href="{{ route('logout') }}" onclick="event.preventDefault();
		 document.getElementById('logout-form').submit();">
 		Cerrar Sesion
		</a>

		<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
		    @csrf
		</form>



  </li>
</ul>

</nav>

