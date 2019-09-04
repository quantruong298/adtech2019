<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdGroup extends Model
{
    protected $table = 'ad_groups';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = [];
    public function adGroupDetail()
    {
        return $this->hasOne('App\Models\AdGroupDetail','id','id');
    }
    public function campaign()
    {
        return $this->belongsTo('App\Models\Campaign','campaign_id');
    }
    public function flag()
    {
        return $this->belongsTo('App\Models\Flag','flag_id');
    }
//    public function adgroupPerformances()
//    {
//        return $this->hasMany('publisher_adgroups_performance', 'adgroup_id','adgroup_id');
//    }
//
//    public function adses(){
//        return $this->hasMany(Ads::class,'adgroup_id','adgroup_id');
//    }
}
