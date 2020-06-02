
@extends('plantilla.plantilla')

@section('titulo','Confirmar')

@section('contenido')

<div class="container py-5">
	<h1> Deseas Eliminar el Registro de {{$Agenda->nombres}} {{$Agenda->apellidos}} ? </h1>

	<form method="POST" action="{{ route('agenda.destroy',$Agenda->id) }}">
		@method('DELETE')
		@csrf

		<button type="submit"  class="redondo btn btn-danger">
			<i  class="fas fa-trash-alt"> Eliminar </i>
		</button>

		<!-- //nombre de cancelar en la ruta dentro de routers web -->

		<a class="redondo btn btn-secondary" href="{{route('cancelar') }}">
			<i class="fas fa-ban" > Cancelar</i>
		</a>
		
	</form>
	
</div>
<!-- pasamos el foooter -->
@include('plantilla.footer',['container'=>'container'])

@endsection

