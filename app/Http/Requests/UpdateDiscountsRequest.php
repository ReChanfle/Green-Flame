<?php

namespace App\Http\Requests;

use App\Models\Discounts;
use App\Models\DiscountsRanges;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class UpdateDiscountsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        //dd($this->get('name'));
        $rules = [
            'name' => 'required|regex:/^[a-zA-Z0-9]+$/|max:30',Rule::unique('discounts', 'name')->ignore($this->get('name')),
            'brand_id' => 'required|exists:brands,id',
            'active' => 'required|numeric',
            'access_type_code' => 'required|exists:access_types,code',
            'priority' => 'required|numeric|between:1,1000',
            'region_id' => 'required|exists:regions,id',
            'start_date'=> 'required|date',
            'end_date' => 'required|date',
            'from_days1' => 'required|numeric',
            'to_days1' => 'required|numeric',
            'discount1' => 'sometimes','regex:/^[a-zA-Z0-9]+$/',
            'code1' => 'sometimes','regex:/^[a-zA-Z0-9]+$/',
            'from_days2' => 'sometimes','numeric',
            'to_days2' => 'sometimes','numeric',
            'discount2' => 'sometimes','regex:/^[a-zA-Z0-9]+$/',
            'code2' => 'sometimes','regex:/^[a-zA-Z0-9]+$/',
            'from_days2' => 'sometimes','numeric',
            'to_days2' => 'sometimes','numeric',
            'discount2' => 'sometimes','regex:/^[a-zA-Z0-9]+$/',
            'code2' => 'sometimes','regex:/^[a-zA-Z0-9]+$/',

         ];


         return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es requerido.',
            'name.unique' => 'El nombre debe ser unico.',
            'name.max' => 'El nombre no debe contener mas de 30 caracteres',
            'brand_id.required' => 'El identificador de marca es requerido',
            'brand_id.exists' => 'El identificador de marca debe existir.',
            'access_type_code.required' => 'El tipo de acceso es requerido',
            'access_type_code.exists' => 'El tipo de acceso debe existir',
            'priority.numeric' => 'La prioridad debe ser un numero',
            'priority.between' => 'La prioridad debe ser un numero entre 1 y 1000',
            'region_id.required' => 'La region es requerida',
            'region_id.exists' => 'La region debe existir',
            'start_date.required' => 'La fecha de inicio es requerida',
            'end_date.required' => 'La fecha de finalizacion es requerida',
            'from_days.required' => 'El campo de periodo de aplicacion es requerido',
            'from_days.numeric' => 'El campo de periodo de aplicacion debe ser numerico',
            'to_days.required' => 'El campo de periodo de aplicacion es requerido',
            'to_days.numeric' => 'El campo de periodo de aplicacion debe ser numerico',
        ];
    }
}
