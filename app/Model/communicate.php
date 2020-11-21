<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class communicate extends Model
{
    protected $fillable = ['first_name', 'last_name', 'email', 'mobile', 'subject', 'message'];
}
