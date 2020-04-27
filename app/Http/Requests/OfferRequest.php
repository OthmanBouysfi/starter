<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferRequest extends FormRequest
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
            'name_en' => 'required|max:100|unique:offers,name_en',
            'name_fr' => 'required|max:100|unique:offers,name_fr',
            'name_ar' => 'required|max:100|unique:offers,name_ar',
            'price' => ' required|numeric',
            'details_en' => 'required',
            'details_fr' => 'required',
            'details_ar' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name_ar.required' => __('messages.offer name required'),
            'name_en.required' => __('messages.offer name required'),
            'name_fr.required' => __('messages.offer name required'),
            'name_ar.unique' => 'اسم العرض موجود ',
            'name_en.unique' => 'Offer name  is exists ',
            'name_fr.unique' => 'nom offre déja existes ',
            'price.numeric' => 'سعر العرض يجب ان يكون ارقام',
            'price.required' => 'السعر مطلوب',
            'details_ar.required' => 'ألتفاصيل مطلوبة ',
            'details_en.required' => 'ألتفاصيل مطلوبة ',
            'details_fr.required' => 'ألتفاصيل مطلوبة ',
            'photo.required' =>  'صوره العرض مطلوب',
            'photo.mimes' =>  'صوره غير صالحة',

        ];
    }
}
