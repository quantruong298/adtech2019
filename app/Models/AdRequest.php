<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdRequest extends Model
{
    protected $table = 'ad_request';
    protected $primaryKey = 'id';
    protected $fillable = [
        'client_ip',
        'timezone',
        'latitude',
        'longitude',
        'pgid',
        'content_cat',
        'url',
        'tid',
        'zipcode',
        'aus',
        'xemail',
        'product_id',
        'c_key',
        'token',
        'bidfloor',
    ];

    public $timestamps = false;
}
