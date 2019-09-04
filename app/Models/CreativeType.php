<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CreativeType extends Model
{
    protected $table = 'creative_types';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = [];
}
