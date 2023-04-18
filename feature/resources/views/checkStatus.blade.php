<x-app-layout>
    @section('title', 'STATUS')

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.16/tailwind.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet" type="text/css">

    <!-- summernote -->
    <link href="{{ asset('assets/css/summernote/summernote.min.css') }}" rel="stylesheet" type="text/css">

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <article>
                        <div class="content">

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <h1><span class="trackCode">TRACKING CODE :
                                    {{ $checkStatus->abstractsubmission->tracking_code }}</span>
                            </h1><br>

                            @if ($checkStatus->status == 'Approved' || $checkStatus->status == 'Rejected')
                                <div class="panel-heading">
                                    <div class="panel-title">Status : {{ $checkStatus->status }}</div><br>

                                    <a href="{{ route('printsubmission', $checkStatus->abstractsubmission->id) }}"
                                        target="blank">
                                        <button>
                                            <i class="fa fa-print" aria-hidden="true"></i>Print
                                        </button>
                                    </a>
                                </div>
                            @endif

                            @if ($checkStatus->status == 'Modify')
                                <form
                                    action="{{ route('abstractsubmission.update', $checkStatus->abstractsubmission->id) }}"
                                    method="post">
                                    @csrf
                                    @method('PUT')


                                    <div class="panel-heading">
                                        <div class="panel-title">Status : {{ $checkStatus->status }}</div><br>
                                    </div><br>
                                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                            <thead
                                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                <tr>
                                                    <th scope="col" class="px-6 py-3">title</th>
                                                    <th scope="col" class="px-6 py-3">Topic</th>
                                                    <th scope="col" class="px-6 py-3">Keywords</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="border px-6 py-4">
                                                        <input type="text" name="title" id="title"
                                                            maxlength="25"
                                                            oninput="this.value = this.value.toUpperCase()"
                                                            value="{{ $checkStatus->abstractsubmission->title }}">
                                                    </td>
                                                    {{-- <td class="border px-6 py-4"> --}}

                                                    @if ($checkStatus->abstractsubmission->type === 'Research Paper')
                                                        <input type="hidden" name="type" value="Research Paper">
                                                        {{-- <input type="text" name="type"
                                                            value="{{ $checkStatus->abstractsubmission->type }}"
                                                            disabled value="Research Paper"> --}}
                                                    @else
                                                        <input type="hidden" name="type" value="Clinical Case">
                                                    @endif

                                                    {{-- </td> --}}
                                                    <td class="border px-6 py-4">

                                                        <select class="form-control" name="topic_id" id="topic_id">
                                                            <option
                                                                value="{{ $checkStatus->abstractsubmission->topic->id }}"
                                                                selected>
                                                                {{ $checkStatus->abstractsubmission->topic->name }}
                                                            </option>
                                                            @foreach ($topics as $topic)
                                                                <option value="{{ $topic->id }}">
                                                                    {{ $topic->name }}</option>
                                                            @endforeach
                                                            <option value="" disabled>---</option>
                                                        </select>
                                                    </td>

                                                    <td class="border px-6 py-4">
                                                        <div class="inline-flex mb-3">
                                                            <input type="text" name="keywords" class="form-control"
                                                                id="keywords" placeholder="Enter new keywords">
                                                            <button id="addKeywordBtn" type="button"
                                                                class="ml-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm px-4 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add</button>
                                                        </div>
                                                        <p>keywords:</p>
                                                        <input id="keywordinput" type="text" name="keywords"
                                                            value="{{ $checkStatus->abstractsubmission->keywords }}">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div><br><br>

                                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                            <thead
                                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                <tr>
                                                    <th scope="col" class="px-6 py-3">introduction</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="border px-6 py-4">
                                                        <textarea name="introduction" id="introduction" class="form-control"
                                                        value="{!! $checkStatus->abstractsubmission->introduction !!}"></textarea>
                                                        {{-- <input type="text" name="introduction"
                                                            value="{!! $checkStatus->abstractsubmission->introduction !!}"> --}}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div><br><br>

                                @if ($checkStatus->abstractsubmission->type === 'Research Paper')
                                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                            <thead
                                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                <tr>
                                                    <th scope="col" class="px-6 py-3">Objectives</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="border px-6 py-4">
                                                        <textarea name="objective" id="objective" class="form-control"
                                                        value="{!! $checkStatus->abstractsubmission->objective !!}"></textarea>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div><br><br>

                                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                            <thead
                                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                <tr>
                                                    <th scope="col" class="px-6 py-3">method</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="border px-6 py-4">
                                                        <textarea name="method" id="method" class="form-control"
                                                        value="{!! $checkStatus->abstractsubmission->method !!}"></textarea>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div><br><br>

                                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                            <thead
                                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                <tr>
                                                    <th scope="col" class="px-6 py-3">result</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="border px-6 py-4">
                                                        <textarea name="result" id="result" class="form-control"
                                                        value="{!! $checkStatus->abstractsubmission->result !!}"></textarea>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div><br><br>

                                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                            <thead
                                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                <tr>
                                                    <th scope="col" class="px-6 py-3">conclusion</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="border px-6 py-4">
                                                        <textarea name="conclusion" id="conclusion" class="form-control"
                                                        value="{!! $checkStatus->abstractsubmission->conclusion !!}"></textarea>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div><br><br>

                                @else
                                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                            <thead
                                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                <tr>
                                                        <th scope="col" class="px-6 py-3">Diagnosis</th>
                                                        <th scope="col" class="px-6 py-3">Treatment</th>
                                                        <th scope="col" class="px-6 py-3">Discussion</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="border px-6 py-4">
                                                        <input type="text" name="diagnosis"
                                                            value="{{ $checkStatus->abstractsubmission->diagnosis }}">
                                                    </td>
                                                    <td class="border px-6 py-4">
                                                        <input type="text" name="treatment"
                                                            value="{{ $checkStatus->abstractsubmission->treatment }}">
                                                    </td>
                                                    <td class="border px-6 py-4">
                                                        <input type="text" name="discussion"
                                                            value="{{ $checkStatus->abstractsubmission->discussion }}">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div><br><br>
                                @endif

                                    <div id="affirmation-part" class="content" role="tabpanel"
                                        aria-labelledby="affirmation-part-trigger">
                                        <div class="form-group">
                                            <label for="affirmation"><strong>Affirmation</strong></label>
                                            <p>Please read all items carefully, click "I agree". You will
                                                not be
                                                able to complete your submission without having agreed to
                                                all
                                                mandatory items.</p>
                                            <br><br>
                                            <p>
                                                1. I confirm that I have previewed this abstract and that all
                                                information is correct and in accordance to the abstract submission
                                                guidelines provided on the Congress website. I accept that the contents
                                                of this abstract cannot be modified or corrected after final submission
                                                and I am aware that it will be published exactly as submitted.
                                            </p>
                                            <br><br>
                                            <p>
                                                2. Submission of the abstract constitutes my consent to publication
                                                (e.g., Congress website, Congress Notes book, etc.)
                                            </p>
                                            <br><br>
                                            <p>
                                                3. I warrant and represent that I am the sole owner or have the rights
                                                of all the information and content ('Content') provided to MEAVC 2023
                                                Conferences (Hereafter: 'Organizers'). The publication of the abstract
                                                does not infringe any third-party rights including, but not limited to,
                                                intellectual property rights.
                                            </p>
                                            <br><br>
                                            <p>
                                                4. I grant the Organizers a royalty-free, perpetual, irrevocable
                                                nonexclusive license to use, reproduce, publish, translate, distribute,
                                                and display the Content.
                                            </p>
                                            <br><br>
                                            <p>
                                                5. The Organizers reserve the right to remove from any publication an
                                                abstract which does not comply with the above.
                                            </p>
                                            <br><br>
                                            <p>
                                                6. I herewith confirm that the contact details saved in this system are
                                                correct, which will be used to notify me about the status of the
                                                abstract. I am responsible for informing the other authors about the
                                                status of the abstract.​
                                            </p>
                                            <br><br>
                                            <input class="form-check-input" type="checkbox" id="affirmation"
                                                name="affirmation" required><br>
                                            <label class="form-check-label" for="affirmation"><strong>I Agree</strong></label>
                                            <p>* entering mandatory information.</p>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <p class="align_c">
                                            <button type="submit" class="btnStyle">Update Abstract</button>
                                        </p>
                                    </div>
                                </form>
                            @endif


                        </div>
                        <p class="clear">&nbsp;</p>
                    </article>
                </div>
            </div>
        </div>
    </div>

    <script>
        const addKeywordBtn = document.getElementById('addKeywordBtn');
        const keywordInput = document.getElementById('keywords');
        const keywordList = document.getElementById('keywordinput');

        addKeywordBtn.addEventListener('click', function() {
            const keyword = keywordInput.value.trim();
            if (keyword.length > 0) {
                const currentKeywords = keywordList.value.trim();
                const newKeywords = currentKeywords.length > 0 ? currentKeywords + ',' + keyword : keyword;
                keywordList.value = newKeywords;
                keywordInput.value = '';
            }
        });

        $(function () {
            $('#introduction').summernote(),
            $('#introduction').summernote('code', {!! json_encode($checkStatus->abstractsubmission->introduction) !!});

            $('#objective').summernote(),
            $('#objective').summernote('code', {!! json_encode($checkStatus->abstractsubmission->objective) !!});

            $('#method').summernote(),
            $('#method').summernote('code', {!! json_encode($checkStatus->abstractsubmission->method) !!});

            $('#result').summernote(),
            $('#result').summernote('code', {!! json_encode($checkStatus->abstractsubmission->result) !!});

            $('#conclusion').summernote(),
            $('#conclusion').summernote('code', {!! json_encode($checkStatus->abstractsubmission->conclusion) !!});
        });
    </script>
</x-app-layout>
