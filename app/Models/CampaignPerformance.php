<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CampaignPerformance extends Model
{
    protected $table = 'publisher_campaigns_performance';
    protected $primaryKey = 'id';
    protected $guarded = [];
    public $timestamps = false;

    public function campaign(){
        return $this->belongsTo(campaign::class,'campaign_id','campaign_id');
    }
}
