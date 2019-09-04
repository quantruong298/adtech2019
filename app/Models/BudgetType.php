<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BudgetType extends Model
{
    protected $table = 'campaign_budget_types';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = [];
}
