<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Añadir producto a bodega</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
				<form>
            <div class="form-group">
                <label for="id_producto">Producto</label><br>
                <select class="from-select rounded-lg" wire:model="id_producto" >
                    <option value="">Seleccionar</option>
                        @foreach($pro as $p)
                        <option value="{{ $p->idpro}}">{{ $p->nombre}}</option>
                        @endforeach
                </select>
               <!-- <input wire:model="id_producto" type="text" class="form-control" id="id_producto" placeholder="Producto">@error('id_producto') <span class="error text-danger">{{ $message }}</span> @enderror-->
            </div>
            <div class="form-group">
                <label for="id_bodega">Bodega</label><br>
                <select class="from-select rounded-lg" wire:model="id_bodega" >
                    <option value="">Seleccionar</option>
                        @foreach($bode as $d)
                        <option value="{{ $d->idbo}}">{{ $d->nombre}}</option>
                        @endforeach
                </select>
                <!--<input wire:model="id_bodega" type="text" class="form-control" id="id_bodega" placeholder="Bodega">@error('id_bodega') <span class="error text-danger">{{ $message }}</span> @enderror-->
            </div>
            <div class="form-group">
                <label for="precio"></label>
                <input wire:model="precio" type="text" class="form-control" id="precio" placeholder="Precio">@error('precio') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Cerrar</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal">Guardar</button>
            </div>
        </div>
    </div>
</div>
