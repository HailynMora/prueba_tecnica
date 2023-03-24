@section('title', __('Bodegaproductos'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i ></i>
							Productos en Bodega </h4>
						</div>
						<div wire:poll.60s>
							
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Buscar">
						</div>
						<div class="btn btn-sm btn-info" data-toggle="modal" data-target="#createDataModal">
						<i class="fa fa-plus"></i>  Agregar
						</div>
					</div>
				</div>
				<div class="card-body">
						@include('livewire.bodegaproductos.create')
						@include('livewire.bodegaproductos.update')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Bodega</th>
								<th>Producto</th>
								<th>Precio</th>
							</tr>
						</thead>
						<tbody>

							@foreach($bodegaproductos as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->nbo}}</td>
								<td>{{ $row->npo}}</td>
								<td>{{ $row->precio }}</td>
							@endforeach
						</tbody>
					</table>						
					{{ $bodegaproductos->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
