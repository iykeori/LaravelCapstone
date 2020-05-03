<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class items_sold  extends Model
{
    use SoftDeletes;

    public $table = 'items_solds';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    protected $dates = ['deleted_at'];

    public function item() {
        
        return $this->hasOne('\App\Item','id', 'item_id')->orderBy('title','ASC');
    }
}
