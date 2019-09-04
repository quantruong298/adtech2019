<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Flag extends Model
{
    protected $table = 'flags';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = [];
}
