<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'title' => 'required|string',
            'content' => 'required|string',
            'preview_image' => 'nullable|file',
            'main_image' => 'nullable|file',
            'category_id' => 'required|integer|exists:categories,id',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'nullable|integer|exists:tags,id',
        ];
    }
    public function messages()
    {
        return [
            'title.required'=>'Это поле обязательно для заполнения',
            'content.required'=>'Это поле обязательно для заполнения',
            'preview_image.required'=>'Это поле обязательно для заполнения',
            'main_image.required'=>'Это поле обязательно для заполнения',
            'category_id.required'=>'Это поле обязательно для заполнения',
            'title.string'=>'Это поле должно соответствовать строчному типу',
            'content.string'=>'Это поле должно соответствовать строчному типу',
            'preview_image.file'=>'Это поле должно соответствовать файловому типу',
            'main_image.file'=>'Это поле должно соответствовать файловому типу',
            'category_id.integer'=>'Это поле должно соответствовать целочисленному типу',
            'tag_ids.array'=>'Необходимо отправить массив данных'
        ];
    }
}
