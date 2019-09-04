<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Objective extends Model
{
    protected $table = 'objectives';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = [];
}
