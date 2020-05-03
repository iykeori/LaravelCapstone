<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use SoftDeletes;

    public $table = 'items';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    protected $dates = ['deleted_at'];

    public function category() {
        // return $this->hasOne('\App\Category','id', 'category_id')->orderBy('name','ASC');
        return $this->belongsTo('\App\Category','id', 'category_id')->orderBy('name','ASC');
    }
}
