@extends('layouts.app')
@section('title', __('Prueba'))
@section('content')
<div class="container-fluid">
<div class="row justify-content-center">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header"><h5><span class="text-center fa fa-home"></span> Prueba</h5></div>
			<div class="card-body">
				<a type="button" class="btn btn-primary" href="/productos">Productos</a>
				<a type="button" class="btn btn-primary" href="/bodegas">Bodegas</a>
				<a type="button" class="btn btn-primary" href="/bodegaproducto">Añadir a bodega</a>
				</br> 
				<hr>
								
			
		</div>
	</div>
</div>
</div>
@endsection