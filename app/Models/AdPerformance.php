<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdPerformance extends Model
{
    protected $table = 'campaign_performance';
    protected $primaryKey = 'id';
    protected $guarded = [];
    public $timestamps = false;

    public function adgroups(){
        return $this->hasMany(AdGroup::class,'campaign_id','id');
    }
}
