<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdDetail extends Model
{
    protected $table = 'ads_detail';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = [];
}
