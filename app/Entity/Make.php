<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Make extends Model
{
    public $timestamps = false;

    protected $fillable = ['name'];
}
