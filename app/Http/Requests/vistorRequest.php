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
            'place_code' => 'required|numeric',
            'place_trade_number' => 'required|numeric|digits:10',
            'place_expire_date' => 'required|date',
            'Owner_identify_number' => 'required|numeric|digits:10',
            'Owner_ID_expiry_date' => 'required|date',
            'seller_identify_number' => 'required|numeric|digits:10',
            'seller_ID_expiry_date' => 'required|date',
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
            'place_code.required' => 'رقم المنشئة مطلوب',
            'place_trade_number.required' => 'رقم السجل التجارى مطلوب',
            'place_expire_date.required' => 'تاريخ انتهاء السجل مطلوب',
            'Owner_identify_number.required' => 'رقم هوية المالك مطلوب',
            'Owner_ID_expiry_date.required' => 'تاريخ انتهاء هوية المالك مطلوب',
            'seller_identify_number.required' => 'رقم هوية الموظف /البائع مطلوب',
            'seller_ID_expiry_date.required' => 'تاريخ انتهاء هوية الموظف / البائع مطلوب',
        ];
    }
}
