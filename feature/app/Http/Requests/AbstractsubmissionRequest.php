<?php

namespace App\Http\Requests;

use App\Rules\MaxWordsRule;
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
        if (auth()->user()->role == "Personne") {
            return [
                'title' => 'required', new MaxWordsRule(25),
                'type' => 'required','max:25',
                'topic_id' => 'required|exists:topics,id',
                'keywords' => 'required',
                'introduction' => ['required', new MaxWordsRule(300)],
                'objective' => ['nullable', new MaxWordsRule(300)],
                'method' => ['nullable', new MaxWordsRule(300)],
                'result' => ['nullable', new MaxWordsRule(300)],
                'conclusion' => ['nullable', new MaxWordsRule(300)],
                'diagnosis' => ['nullable', new MaxWordsRule(300)],
                'treatment' => ['nullable', new MaxWordsRule(300)],
                'discussion' => ['nullable', new MaxWordsRule(300)],
                'affirmation' => 'required',
                'disclosure' => 'nullable',
                'president_id' => 'nullable'
            ];
        } else{
            return [
                'president_id' => 'required'
            ];
        }
    }
}
