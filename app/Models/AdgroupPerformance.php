<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdgroupPerformance extends Model
{
    protected $table = 'campaign_performance';
    protected $primaryKey = 'id';
    protected $guarded = [];
    public $timestamps = false;

    public function adgroup(){
        return $this->belongTo(AdGroup::class,'campaign_id','id');
    }
}
