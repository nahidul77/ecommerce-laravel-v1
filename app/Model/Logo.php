<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Logo extends Model
{
    protected $fillable = ['title', 'image', 'created_by', 'updated_by'];
}
