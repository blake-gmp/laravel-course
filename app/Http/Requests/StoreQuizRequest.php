<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuizRequest extends FormRequest
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
            'englishName' => 'required|max:150',
            'correctAnswer' => 'required|max:50',
            'wrongAnswerA' => 'required|max:50',
            'wrongAnswerB' => 'required|max:50',
            'wrongAnswerC' => 'required|max:50'
        ];
    }
}
