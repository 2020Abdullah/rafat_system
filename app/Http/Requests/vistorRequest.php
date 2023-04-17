<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class vistorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'vistor_phone' => 'required',
            'vistor_balance' => 'required',
            'vistor_count_slides' => 'required',
            'vistor_count_activity' => 'required',
            'lat' => 'required',
            'long' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'lat.required' => 'يجب السماح بتحديد موقعك',
            'long.required' => 'يجب السماح بتحديد موقعك',
            'vistor_phone.required' => 'حقل رقم الهاتف مطلوب',
            'vistor_balance.required' => 'حقل رصيد اليوزر مطلوب',
            'vistor_count_slides.required' => 'حقل شرائح اليوزر مطلوب',
            'vistor_count_activity.required' => 'حقل عدد التفعيلات مطلوب',
        ];
    }
}
