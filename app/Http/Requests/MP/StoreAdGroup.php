<?php


namespace App\Http\Requests\MP;


use App\Models\CampaignDetail;
use Illuminate\Foundation\Http\FormRequest;

class StoreAdGroup extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255','unique:ad_groups'],
            'campaign_id' => ['required', 'integer'],
            'period_from_date'=>['required','date'],
            'period_from_time'=>['required'],
            'period_to_date'=>['required','date'],
            'period_to_time'=>['required'],
            'ag_period_budget' => ['required','integer'],
            'ag_period_budget_from' => ['required','integer'],
            'ag_period_budget_to' => ['required','integer'],
            'std_daily_budget' => ['required','integer'],
            'std_bidding_amount' => ['required','integer'],
        ];
    }
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($this->input('ag_period_budget')<$this->input('std_daily_budget')) {
                $validator->errors()->add('std_daily_budget', 'Daily Budget must less than Period Budget!');
            }
            if ($this->input('ag_period_budget')<$this->input('std_bidding_amount')) {
                $validator->errors()->add('std_bidding_amount', 'Bidding Amount must less than Period Budget!');
            }
            if ($this->input('ag_period_budget')<$this->input('ag_period_budget_from')) {
                $validator->errors()->add('ag_period_budget_from', 'Budget From must less than Period Budget!');
            }
            if ($this->input('ag_period_budget')<$this->input('ag_period_budget_to')) {
                $validator->errors()->add('ag_period_budget_to', 'Budget To must less than Period Budget!');
            }
            if ($this->input('ag_period_budget_from')>$this->input('ag_period_budget_to')) {
                $validator->errors()->add('ag_period_budget_to', 'Budget To must bigger than Budget From!');
            }
            if ($this->input('period_from_date')==$this->input('period_to_date')) {
                if ($this->input('period_from_time')>$this->input('period_to_time'))
                    $validator->errors()->add('period_to_time', 'Period To (time) must later than Period From (time)!');
            }
            if($this->input('period_from_date')>$this->input('period_to_date')){
                $validator->errors()->add('period_to_date', 'Period To (date) must later than Period From (date)!');
            }
            $campaignDetail = CampaignDetail::find($this->input('campaign_id'));
            if ($this->input('period_from_date')<$campaignDetail->period_from) {
                $validator->errors()->add('period_from_date', 'AdGroup Period From (date) must later than Campaign Period From (date)!');
            }
            if ($this->input('period_to_date')>$campaignDetail->period_from) {
                $validator->errors()->add('period_to_date', 'AdGroup Period To (date) must earlier than Campaign Period To (date)!');
            }
        });
    }
}