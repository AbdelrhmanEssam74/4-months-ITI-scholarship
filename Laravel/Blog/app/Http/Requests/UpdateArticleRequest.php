<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
//        return auth()->check(); // Ensure the user is authenticated
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */

    public function rules(): array
    {
        $article = $this->route('article'); // This is the Article model (bound via slug)

        return [
            'title' => 'required|max:255',
            'slug' => [
                'required',
                $article
                    ? Rule::unique('articles', 'slug')->ignore($article->slug, 'slug')
                    : Rule::unique('articles', 'slug'),
            ],
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'content' => 'required|min:100',
            'tags' => 'nullable|string',
        ];
    }
}
