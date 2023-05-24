<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class MaxWordsRule implements Rule
{
    private $maxWords;
    private $maxWordsTitle;

    public function __construct($maxWords = 300, $maxWordsTitle = 25)
    {
        $this->maxWords = $maxWords;
        $this->maxWordsTitle = $maxWordsTitle;
    }

    public function passes($attribute, $value)
    {
        if ($attribute === 'title') {
            return $this->checkWordCount($value, $this->maxWordsTitle);
        }

        return $this->checkWordCount($value, $this->maxWords);
    }

    private function checkWordCount($value, $maxWords)
    {
        $value = preg_replace('/<img\b[^>]*>/i', '', $value);
        return str_word_count($value) <= $maxWords;
    }

    public function message()
    {
        return 'The :attribute cannot be longer than :max_words words.';
    }
}
