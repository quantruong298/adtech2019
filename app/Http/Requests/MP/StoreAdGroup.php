<?php


namespace App\Http\Requests\MP;


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
            'name' => ['required', 'string', 'max:255'],
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
}