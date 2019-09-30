<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateEventRequest extends FormRequest
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
            "event_name" => 'required',
            "category_id" => 'required',
            "artist_name" => 'required',
            "event_description" => 'required',
            "what_is_included" => 'required',
            "event_start_date" => 'required',
            "event_location" => 'required',
            "event_pincode" => 'required',
            "event_district" => 'required',
            "event_state" => 'required'
        ];
    }
}
