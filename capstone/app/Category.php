<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    public $table = 'categories';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    protected $dates = ['deleted_at'];

    public function items() {
        return $this->hasMany('\App\Item','category_id', 'id')->orderBy('title','ASC');
    }

    public function items1() {
        return $this->hasMany('\App\Item','category_id', 'id')->orderBy('picture','ASC');
    }
}
