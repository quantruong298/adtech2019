<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $table = 'campaigns';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = [];

    public function campaignDetail()
    {
        return $this->hasOne('App\Models\CampaignDetail','id','id');
    }
    public function media()
    {
        return $this->belongsTo('App\Models\Media','media_id');
    }
    public function advertiser()
    {
        return $this->belongsTo('App\Models\Advertiser','advertiser_email','email');
    }
    public function flag()
    {
        return $this->belongsTo('App\Models\Flag','flag_id');
    }
//    public function campaignPerformances()
//    {
//        return $this->hasMany(CampaignPerformance::class, 'campaign_id','campaign_id');
//    }
//    public function adGroups()
//    {
//        return $this->hasMany(AdGroup::class, 'campaign_id','campaign_id');
//    }
   /* public function adses(){
        return $this->hasMany(Ads::class,'ag_id','id');
    }*/
}
