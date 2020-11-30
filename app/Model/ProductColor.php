<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    protected $fillable = ['product_id', 'color_id'];

    public function color(){
        return $this->belongsTo(Color::class, 'color_id', 'id');
    }
}
