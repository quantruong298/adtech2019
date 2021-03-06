<?php


namespace App\Http\Requests\MP;


use App\Models\AdGroupDetail;
use Illuminate\Foundation\Http\FormRequest;

class StoreAd extends FormRequest
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
            'name' => ['required', 'string', 'max:255','unique:ads'],
            'ad_group_id' => ['required', 'integer'],
            'creative_type_id' => ['required', 'integer'],
            'creative_preview' => ['required','file'],
            'url' => ['required', 'string'],
            'cost_bidding' => ['required', 'integer'],
            'period_from_date'=>['required','date'],
            'period_from_time'=>['required'],
            'period_to_date'=>['required','date'],
            'period_to_time'=>['required'],
            'ads_period_budget' => ['required','integer'],
            'ads_period_budget_from' => ['required','integer'],
            'ads_period_budget_to' => ['required','integer'],
            'std_daily_budget' => ['required','integer'],
            'std_bidding_amount' => ['required','integer'],
        ];
    }
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($this->input('ads_period_budget')<$this->input('std_daily_budget')) {
                $validator->errors()->add('std_daily_budget', 'Daily Budget must less than Period Budget!');
            }
            if ($this->input('ads_period_budget')<$this->input('std_bidding_amount')) {
                $validator->errors()->add('std_bidding_amount', 'Bidding Amount must less than Period Budget!');
            }
            if ($this->input('ads_period_budget')<$this->input('cost_bidding')) {
                $validator->errors()->add('cost_bidding', 'Cost Bidding must less than Period Budget!');
            }
            if ($this->input('ads_period_budget')<$this->input('ads_period_budget_from')) {
                $validator->errors()->add('ads_period_budget_from', 'Budget From must less than Period Budget!');
            }
            if ($this->input('ads_period_budget')<$this->input('ads_period_budget_to')) {
                $validator->errors()->add('ads_period_budget_to', 'Budget To must less than Period Budget!');
            }
            if ($this->input('ads_period_budget_from')>$this->input('ads_period_budget_to')) {
                $validator->errors()->add('ads_period_budget_to', 'Budget To must bigger than Budget From!');
            }
            if ($this->input('period_from_date')==$this->input('period_to_date')) {
                if ($this->input('period_from_time')>$this->input('period_to_time'))
                    $validator->errors()->add('period_to_time', 'Period To (time) must later than Period From (time)!');
            }
            if($this->input('period_from_date')>$this->input('period_to_date')){
                $validator->errors()->add('period_to_date', 'Period To (date) must later than Period From (date)!');
            }
            if($this->input('ad_group_id')!=null){
                $adGroupDetail = AdGroupDetail::find($this->input('ad_group_id'));
                if ($this->input('period_from_date')<$adGroupDetail->period_from) {
                    $validator->errors()->add('period_from_date', 'Ad Period From (date) must later than AdGroup Period From (date)!');
                }
                if ($this->input('period_to_date')>$adGroupDetail->period_to) {
                    $validator->errors()->add('period_to_date', 'Ad Period To (date) must earlier than AdGroup Period To (date)!');
                }
            }
        });
    }
}