<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model as EloquentModel;

class Model extends EloquentModel
{
    public $timestamps = false;

    protected $table = 'models';
    protected $fillable = ['name'];

    public function brand()
    {
        return $this->belongsTo('App\Entity\Make', 'make_id', 'id');
    }
}
