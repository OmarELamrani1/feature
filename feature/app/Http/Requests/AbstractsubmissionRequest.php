<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AbstractsubmissionRequest extends FormRequest
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
            'title' => 'required',
            'type' => 'required','max:25',
            'topic_id' => 'required|exists:topics,id',
            'keywords' => 'required',
            'introduction' => 'required', 'max:300',
            'objective' => 'nullable', 'max:300',
            'method' => 'nullable', 'max:300',
            'result' => 'nullable', 'max:300',
            'conclusion' => 'nullable', 'max:300',
            'diagnosis' => 'nullable', 'max:300',
            'treatment' => 'nullable', 'max:300',
            'discussion' => 'nullable', 'max:300',
            'affirmation' => 'required',
            'disclosure' => 'nullable',
        ];
    }
}
