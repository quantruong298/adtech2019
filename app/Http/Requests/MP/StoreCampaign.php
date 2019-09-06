<?php


namespace App\Http\Requests\MP;


use Illuminate\Foundation\Http\FormRequest;

class StoreCampaign extends FormRequest
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
            'advertiser_email' => ['required', 'string', 'email', 'max:255'],
            'media_id' => ['required', 'integer'],
            'kpi' => ['required', 'integer'],
            'objective_id' => ['required','integer'],
            'period_from_date'=>['required','date'],
            'period_from_time'=>['required'],
            'period_to_date'=>['required','date'],
            'period_to_time'=>['required'],
            'budget_type_id' => ['required','integer'],
            'campaign_period_budget' => ['required','integer'],
            'std_daily_budget' => ['required','integer'],
            'std_bidding_method_id' => ['required','integer'],
        ];
    }
}