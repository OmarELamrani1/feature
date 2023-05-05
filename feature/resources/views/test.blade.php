i have this rule: class MaxWordsRule implements Rule{
    private $max_words;
    public function __construct($max_words = 300)
    {
        $this->max_words = $max_words;
    }
    public function passes($attribute, $value)
    {
        return str_word_count($value) <= $this->max_words;
    }
    public function message()
    {
        return 'The :attribute cannot be longer than '.$this->max_words.' words.';
    }} and i have this request: public function rules(){
        if (auth()->user()->role == "Personne") {
            return [
                'title' => 'required', 'max:25',
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
        }} and i have a textarea in my blade which can added table or bold text or images, so i want when user added images in this textarea so the MaxWordsRule count the all image as only one word because i have <img src and a lot of words, me i don't want he count all that, i want he count only tag <img with their content as one word, how can i do that please because with this code what i shared with you now he give me tha the colomun cannot depass 300 word even if i upload just one picture, help please
