<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CampaignDetail extends Model
{
    protected $table = 'campaigns_detail';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = [];


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
