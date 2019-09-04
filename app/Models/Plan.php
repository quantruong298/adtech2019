<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $table = 'mp_plans';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = [];
    public function media()
    {
        return $this->belongsTo('App\Models\Media','media_id');
    }
    public function campaign()
    {
        return $this->belongsTo('App\Models\Campaign','campaign_id');
    }
    public function adGroup()
    {
        return $this->belongsTo('App\Models\adGroup','ad_group_id');
    }
    public function flag()
    {
        return $this->belongsTo('App\Models\Flag','flag_id');
    }
}
