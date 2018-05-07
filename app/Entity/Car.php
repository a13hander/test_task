<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'import_id',
        'price',
        'kilometrage',
        'model_id',
        'y',
        'body_type',
        'doors',
        'color',
        'fuel_type',
        'engine_size',
        'power',
        'transmission',
        'drive_type',
        'images'
    ];

    protected $casts = [
        'images' => 'array'
    ];

    public function model()
    {
        return $this->belongsTo('App\Entity\Model', 'model_id', 'id');
    }
}
