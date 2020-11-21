<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = ['short_title', 'long_title', 'image', 'created_by', 'updated_by'];
}
