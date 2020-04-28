<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CrudUser extends Model
{
    protected $fillable = ['username','email','mobile'];
}
