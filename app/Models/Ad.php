<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    protected $table = 'ads';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = [];
    public function adDetail()
    {
        return $this->hasOne('App\Models\AdDetail');
    }
    public function adGroup()
    {
        return $this->belongsTo('App\Models\adGroup','ad_group_id');
    }
    public function campaign()
    {
        return $this->belongsTo('App\Models\Campaign','campaign_id');
    }
    public function flag()
    {
        return $this->belongsTo('App\Models\Flag','flag_id');
    }
}
