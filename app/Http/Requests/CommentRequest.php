<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'content' => 'required|string|max:10000|min:3',
            'parent_id' => 'integer|int',
            'post_id' => 'integer|int',
        ];
    }

    /**
     * Get the error messages for the defined validation rules
     *
     * @return array
     */

    public function messages()
    {
        return [
            'content.min' => 'Минимальная длина статьи [:min] символов',
            'parent_id' => 'Parent id must be integer',
            'post_id' => 'Post id must be integer',
        ];
    }
}
