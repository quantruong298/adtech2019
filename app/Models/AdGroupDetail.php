<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdGroupDetail extends Model
{
    protected $table = 'ad_groups_detail';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = [];

}
