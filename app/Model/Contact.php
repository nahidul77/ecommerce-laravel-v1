<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['name', 'email', 'mobile', 'fb_link', 'yt_link', 'address', 'created_by', 'updated_by'];
}
