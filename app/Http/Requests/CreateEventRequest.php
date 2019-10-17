<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/** 
 * @bodyParam event_name string required The name of the event.
 * @bodyParam category_id int required The category id of the event.
 * @bodyParam artist_name string required Artist of the event. Example: Martin Garrix.
 * @bodyParam event_description string required Description of the event.
 * @bodyParam optional_description string Description of the event.
 * @bodyParam what_is_included Array required What is included with the event. Example: ['asjkdhff', 'sadfjksadf', 'asdfsad']
 * @bodyParam event_start_date date required Event start date.
 * @bodyParam event_end_date date Event end date.
 * @bodyParam event_location string required Venue of the event.
 * @bodyParam event_pincode int required Pincode of the event venue.
 * @bodyParam event_district string required District where event is being held.
 * @bodyParam event_state string required State where event is being held. 
 */
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
