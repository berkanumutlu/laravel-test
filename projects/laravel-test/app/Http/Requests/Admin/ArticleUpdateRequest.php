<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ArticleUpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title'       => ['required', 'max:80'],
            'slug_name'   => ['max:255', 'unique:articles,slug_name,'.$this->id],
            'body'        => ['required'],
            'category_id' => ['nullable', 'integer']
        ];
    }

    public function messages()
    {
        return [
            'title.required' => "Makale Adı gerekli.",
            'title.max'      => "Makale Adı en fazla :max karakter olabilir."
        ];
    }
}
