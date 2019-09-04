<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BiddingMethod extends Model
{
    protected $table = 'std_bidding_methods';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = [];
}
