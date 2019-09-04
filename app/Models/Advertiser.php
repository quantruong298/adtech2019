<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advertiser extends Model
{
    protected $table = 'advertiser_accounts';
    protected $primaryKey = 'id';
    public $timestamps =false;
    protected $guarded =[];
}
