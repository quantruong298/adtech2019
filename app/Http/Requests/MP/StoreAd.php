<?php


namespace App\Http\Requests\MP;


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
            'name' => ['required', 'string', 'max:255'],
            'ad_group_id' => ['required', 'integer'],
            'creative_preview' => ['required', 'string'],
            'creative_type_id' => ['required', 'integer'],
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
}