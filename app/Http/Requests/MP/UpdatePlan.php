<?php


namespace App\Http\Requests\MP;


use Illuminate\Foundation\Http\FormRequest;

class UpdatePlan extends FormRequest
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
            'area_name' => ['required', 'string', 'max:255'],
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
                    $validator->errors()->add('period_to_time', 'Period To (time) must later than Period From (time)!');
            }
            if($this->input('period_from_date')>$this->input('period_to_date')){
                $validator->errors()->add('period_to_date', 'Period To (date) must later than Period From (date)!');
            }
        });
    }
}