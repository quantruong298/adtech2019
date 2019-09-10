<?php


namespace App\Http\Requests\MP;


use Illuminate\Foundation\Http\FormRequest;

class UpdateAd extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'ad_group_id' => ['required', 'integer'],
            'creative_type_id' => ['required', 'integer'],
            'creative_preview' => ['required', 'string'],
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
            if ($this->input('ag_period_budget')<$this->input('std_bidding_amount')) {
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
        });
    }
}