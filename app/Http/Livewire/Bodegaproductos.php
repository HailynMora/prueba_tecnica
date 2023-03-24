<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Bodegaproducto;
use App\Models\Producto;
use App\Models\Bodega;
use BD;

class Bodegaproductos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $id_producto, $id_bodega, $precio;
    public $updateMode = false;

    public function render()
    {
        $bode = Bodega::select('bodegas.nombre','bodegas.id as idbo')
            ->get();
        $pro = Producto::select('productos.nombre','productos.id as idpro')
            ->get();
        
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.bodegaproductos.view', [
            'bodegaproductos' => Bodegaproducto::join('productos','productos.id','=','bodegaproducto.id_producto')
                        ->join('bodegas','bodegas.id','=','bodegaproducto.id_bodega')
                        ->select('productos.nombre as npo','bodegas.nombre as nbo','id_producto','id_bodega','precio')
						->orWhere('id_producto', 'LIKE', $keyWord)
						->orWhere('id_bodega', 'LIKE', $keyWord)
						->orWhere('precio', 'LIKE', $keyWord)
						->paginate(10),
        ],['pro' => $pro, 'bode' => $bode]);
    }
	
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
	
    private function resetInput()
    {		
		$this->id_producto = null;
		$this->id_bodega = null;
		$this->precio = null;
    }

    public function store()
    {
        $this->validate([
		'id_producto' => 'required',
		'id_bodega' => 'required',
		'precio' => 'required',
        ]);

        Bodegaproducto::create([ 
			'id_producto' => $this-> id_producto,
			'id_bodega' => $this-> id_bodega,
			'precio' => $this-> precio
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Bodegaproducto Successfully created.');
    }

    public function edit($id)
    {
        $record = Bodegaproducto::findOrFail($id);

        $this->selected_id = $id; 
		$this->id_producto = $record-> id_producto;
		$this->id_bodega = $record-> id_bodega;
		$this->precio = $record-> precio;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'id_producto' => 'required',
		'id_bodega' => 'required',
		'precio' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Bodegaproducto::find($this->selected_id);
            $record->update([ 
			'id_producto' => $this-> id_producto,
			'id_bodega' => $this-> id_bodega,
			'precio' => $this-> precio
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Bodegaproducto Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Bodegaproducto::where('id', $id);
            $record->delete();
        }
    }
}
