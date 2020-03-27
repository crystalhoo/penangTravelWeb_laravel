<?php

namespace App\Http\Requests;

class ScheduleRequest extends ApiFormRequest
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
            'title'           => 'required|string|max:100',
            'plan_id'         => 'required|string|max:5',
            'day_number'      => 'required|integer|max:2',
            'start_time'      => 'required',
            'full_description'=> 'string|max:500'
        ];
    }
}
