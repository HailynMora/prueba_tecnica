<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bodega extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'bodegas';

    protected $fillable = ['nombre'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bodegaproductos()
    {
        return $this->hasMany('App\Models\Bodegaproducto', 'id_bodega', 'id');
    }
    
}
