<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParkingSpotRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // authorized
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'park' => 'string',
            'parking_lot.parking_lot_id' => 'required|exists:parking_lots,id',
        ];
    }

    /**
	 * Get error response in case validation failed.
	 *
	 * @param array $errors
	 * @return json
	 */
	public function response(array $errors)
	{
		return response()->json([
			'errors' => $errors
		]);
	}

    /**
	 * Custom message for validation
	 *
	 * @return array
	 */
	public function messages()
	{
		return [
			'park.string' => 'Group Name is required!',
			'parking_lot.required' => 'Group description is required!'
		];
	}
}
