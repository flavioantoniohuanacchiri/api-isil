<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Business extends Model
{
    use SoftDeletes;
    
    protected $table = "business";
    
    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format("Y-m-d h:i:s a");
    }

    protected $softDelete = true;
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
}
