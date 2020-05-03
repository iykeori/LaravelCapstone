<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class shopping_cart extends Model
{
    use SoftDeletes;

    public $table = 'shopping_carts';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    protected $dates = ['deleted_at'];

    // public function items() {
    //     return $this->hasMany('\App\Item','item_id', 'id')->orderBy('title','ASC');
    // }
    public function item() {
        
        return $this->belongsTo('\App\Item','item_id', 'id')->orderBy('title','ASC');
    }
    public function itemprice() {
        
        return $this->belongsTo('\App\Item','item_id', 'id')->orderBy('price','ASC');
    }
}
