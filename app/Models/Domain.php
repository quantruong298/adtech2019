<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    protected $table = 'domain_ssp';
    protected $primaryKey = 'id';
    protected $fillable = ['domain'];
}
