<?php


namespace App\Http\Requests\MP;


use App\Models\Campaign;
use App\Models\CampaignDetail;
use Illuminate\Foundation\Http\FormRequest;

class StorePlan extends  FormRequest
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
            'area_name' => ['required', 'string', 'max:255','unique:mp_plans'],
            'campaign_id' => ['required', 'integer'],
            'period_from_date'=>['required','date'],
            'period_from_time'=>['required'],
            'period_to_date'=>['required','date'],
            'period_to_time'=>['required'],
        ];
    }
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($this->input('period_from_date')==$this->input('period_to_date')) {
                if ($this->input('period_from_time')>$this->input('period_to_time'))
                    $validator->errors()->add('period_to_time', 'Plan Period To (time) must later than Plan Period From (time)!');
            }
            if($this->input('period_from_date')>$this->input('period_to_date')){
                $validator->errors()->add('period_to_date', 'Plan Period To (date) must later than Plan Period From (date)!');
            }
            $campaignDetail = CampaignDetail::find($this->input('campaign_id'));
            if ($this->input('period_from_date')>$campaignDetail->period_from) {
                $validator->errors()->add('period_from_date', 'Plan Period From (date) must earlier than Campaign Period From (date)!');
            }
            if ($this->input('period_to_date')<$campaignDetail->period_from) {
                $validator->errors()->add('period_to_date', 'Plan Period To (date) must later than Campaign Period To (date)!');
            }
        });
    }
}