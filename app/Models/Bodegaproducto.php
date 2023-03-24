<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bodegaproducto extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'bodegaproducto';

    protected $fillable = ['id_producto','id_bodega','precio'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function bodega()
    {
        return $this->hasOne('App\Models\Bodega', 'id', 'id_bodega');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function producto()
    {
        return $this->hasOne('App\Models\Producto', 'id', 'id_producto');
    }
    
}
