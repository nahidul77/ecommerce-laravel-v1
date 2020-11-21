<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    protected $fillable = ['title', 'sub_title', 'description', 'image', 'created_by', 'updated_by'];
}
