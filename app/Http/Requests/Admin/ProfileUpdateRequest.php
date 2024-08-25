<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Yetkilendirme buraya yapılır ama yapmadık TRUE yaptık ki direkt dogruladı kullanıcıyı yani
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'avatar' => ['nullable','image','max:000'],
            'name' => ['required','max:250','string'],
            'email' => ['required','max:250','email'],
            'vergi_no' => ['nullable','max:250'],
            'phone' => ['nullable','max:250'],
            'address' => ['nullable','max:500'],
            'il' => ['nullable','max:250'],
            'ilce' => ['nullable','max:250'],
            'website' => ['nullable','max:250'],
            'facebook' => ['nullable','max:250'],
            'x_link' => ['nullable','max:250'],
            'insta' => ['nullable','max:250'],
        ];
    }
}
