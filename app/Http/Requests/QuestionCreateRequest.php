<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionCreateRequest extends FormRequest
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
            'question'=>'required|min:3',
            'image'=>'image|nullable|max:2048|mimes:jpg,jpeg,png,gif',
            'answer1'=>'required|min:1',
            'answer2'=>'required|min:1',
            'answer3'=>'required|min:1',
            'answer4'=>'required|min:1',
            'correct_answer'=>'required',
        ];
    }

    public function attributes()
    {
        return [
            'question'=>'Soru',
            'image'=>'Soru fotoğrafı',
            'answer1'=>'1. cevap',
            'answer2'=>'2. cevap',
            'answer3'=>'3. cevap',
            'answer4'=>'4. cevap',
            'correct_answer'=>'Doğru cevap',
        ];
    }
}
