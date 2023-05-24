@extends('layouts.navbar')
    @section('title', 'Check status')


    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet" type="text/css">

    @section('content')

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
                                    method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="panel-heading">
                                        <div class="panel-title">Status :  <span style="color: red;">{{ $checkStatus->status }}</span> </div>
                                        <div class="panel-title">Reason : <b>{{ $checkStatus->comment }}</b> </div><br><br>
                                        @php
                                            $extension = pathinfo($checkStatus->file, PATHINFO_EXTENSION);
                                        @endphp

                                        @if (in_array($extension, ['doc', 'docx', 'pdf']))
                                            <div class="flex text-center">
                                                <a href="{{ Storage::url($checkStatus->file) }}" target="_blank" rel="noopener noreferrer">
                                                    <button type="button" class="btn btn-info">Show {{ strtoupper($extension) }}</button>
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                    <br>

                                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                        <table class="table table-bordered">
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
                                                        <input type="text" name="title" id="title" class="form-control" maxlength="25"
                                                            oninput="this.value = this.value.toUpperCase()"
                                                            value="{{ $checkStatus->abstractsubmission->title }}">
                                                    </td>

                                                    @if ($checkStatus->abstractsubmission->type === 'Research Paper')
                                                        <input type="hidden" name="type" value="Research Paper">
                                                    @else
                                                        <input type="hidden" name="type" value="Clinical Case">
                                                    @endif

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

                                                        <div class="mb-3" style="display: flex;">
                                                            <input type="text" name="keywords" class="form-control" id="keywords" placeholder="Enter new keywords">
                                                            <button id="addKeywordBtn" type="button" class="ml-3 btn btn-primary" style="margin-left: 10px;">Add</button>
                                                        </div>

                                                        {{-- <div class="inline-flex mb-3">
                                                            <input type="text" name="keywords" class="form-control"
                                                                id="keywords" placeholder="Enter new keywords">
                                                            <button id="addKeywordBtn" type="button"
                                                                class="ml-3 btn btn-primary">Add</button>
                                                        </div> --}}
                                                        <p>keywords:</p>
                                                        <input id="keywordinput" type="text" name="keywords"
                                                            value="{{ $checkStatus->abstractsubmission->keywords }}">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div><br><br>

                                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                        <table class="table table-bordered">
                                            <thead
                                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                <tr>
                                                    <th scope="col" class="px-6 py-3">introduction</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="border px-6 py-4">
                                                        <textarea id="introduction" class="intro block w-full mt-1 rounded-md" name="introduction" rows="3">{!! $checkStatus->abstractsubmission->introduction !!}</textarea>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div><br><br>

                                @if ($checkStatus->abstractsubmission->type === 'Research Paper')
                                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                        <table class="table table-bordered">
                                            <thead
                                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                <tr>
                                                    <th scope="col" class="px-6 py-3">Objectives</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="border px-6 py-4">
                                                        <textarea id="objective" class="intro block w-full mt-1 rounded-md" name="objective" rows="3">{!! $checkStatus->abstractsubmission->objective !!}</textarea>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div><br><br>

                                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                        <table class="table table-bordered">
                                            <thead
                                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                <tr>
                                                    <th scope="col" class="px-6 py-3">method</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="border px-6 py-4">
                                                        <textarea id="method" class="intro block w-full mt-1 rounded-md" name="method" rows="3">{!! $checkStatus->abstractsubmission->method !!}</textarea>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div><br><br>

                                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                        <table class="table table-bordered">
                                            <thead
                                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                <tr>
                                                    <th scope="col" class="px-6 py-3">result</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="border px-6 py-4">

                                                        <textarea id="result" class="intro block w-full mt-1 rounded-md" name="result" rows="3">{!! $checkStatus->abstractsubmission->result !!}</textarea>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div><br><br>

                                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                        <table class="table table-bordered">
                                            <thead
                                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                <tr>
                                                    <th scope="col" class="px-6 py-3">conclusion</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="border px-6 py-4">
                                                        <textarea id="conclusion" class="intro block w-full mt-1 rounded-md" name="conclusion" rows="3">{!! $checkStatus->abstractsubmission->conclusion !!}</textarea>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div><br><br>

                                @else
                                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                        <table class="table table-bordered">
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
                                                            value="{!! $checkStatus->abstractsubmission->diagnosis !!}">
                                                    </td>
                                                    <td class="border px-6 py-4">
                                                        <input type="text" name="treatment"
                                                            value="{!! $checkStatus->abstractsubmission->treatment !!}">
                                                    </td>
                                                    <td class="border px-6 py-4">
                                                        <input type="text" name="discussion"
                                                            value="{!! $checkStatus->abstractsubmission->discussion !!}">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                @endif

                                    <div id="affirmation-part" class="content" role="tabpanel"
                                        aria-labelledby="affirmation-part-trigger">
                                        <div class="form-group">
                                            <label for="affirmation"><strong>Affirmation</strong></label>
                                            <p>Please read all items carefully, click "I agree". You will
                                                not be
                                                able to complete your submission without having agreed to
                                                all
                                                mandatory items.</p><br>
                                            <p>
                                                1. I confirm that I have previewed this abstract and that all
                                                information is correct and in accordance to the abstract submission
                                                guidelines provided on the Congress website. I accept that the contents
                                                of this abstract cannot be modified or corrected after final submission
                                                and I am aware that it will be published exactly as submitted.
                                            </p>
                                            <br>
                                            <p>
                                                2. Submission of the abstract constitutes my consent to publication
                                                (e.g., Congress website, Congress Notes book, etc.)
                                            </p>
                                            <br>
                                            <p>
                                                3. I warrant and represent that I am the sole owner or have the rights
                                                of all the information and content ('Content') provided to MEAVC 2023
                                                Conferences (Hereafter: 'Organizers'). The publication of the abstract
                                                does not infringe any third-party rights including, but not limited to,
                                                intellectual property rights.
                                            </p>
                                            <br>
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
                                            <br>
                                            <p>
                                                6. I herewith confirm that the contact details saved in this system are
                                                correct, which will be used to notify me about the status of the
                                                abstract. I am responsible for informing the other authors about the
                                                status of the abstract.​
                                            </p>
                                            <br>
                                            <input class="form-check-input" type="checkbox" id="affirmation"
                                                name="affirmation" required> <label class="form-check-label" for="affirmation"><strong> I Agree</strong></label>
                                            <p>* entering mandatory information.</p>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success rounded-5">Update Abstract</button>
                                        {{-- <p class="align_c">
                                            <button type="submit" class="btnStyle">Update Abstract</button>
                                        </p> --}}
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>

    <script>

        const introductionInput = document.getElementById("introduction");
        const objectiveInput = document.getElementById("objective");
        const methodInput = document.getElementById("method");
        const resultInput = document.getElementById("result");
        const conclusionInput = document.getElementById("conclusion");
        const clinicalDiagnosis = document.getElementById("diagnosis");
        const clinicalTreatment = document.getElementById("treatment");
        const clinicalDiscussion = document.getElementById("discussion");


        ClassicEditor
            .create(document.querySelector('#method'), {
                ckfinder: {
                    uploadUrl: "{{ route('image.upload') . '?_token=' . csrf_token() }}",
                }
            })
            .then(editor => {
                // add an event listener to detect when the instance is ready
                editor.model.document.on('change:data', () => {
                    methodInput.value = editor.getData();
                });
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#objective'), {
                ckfinder: {
                    uploadUrl: "{{ route('image.upload') . '?_token=' . csrf_token() }}",
                }
            })
            .then(editor => {
                // add an event listener to detect when the instance is ready
                editor.model.document.on('change:data', () => {
                    objectiveInput.value = editor.getData();
                });
            })
            .catch(error => {
                console.error(error);
            });


        ClassicEditor
            .create(document.querySelector('#result'), {
                ckfinder: {
                    uploadUrl: "{{ route('image.upload') . '?_token=' . csrf_token() }}",
                }
            })
            .then(editor => {
                editor.model.document.on('change:data', () => {
                    resultInput.value = editor.getData();
                });
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#introduction'), {
                ckfinder: {
                    uploadUrl: "{{ route('image.upload') . '?_token=' . csrf_token() }}",
                }
            })
            .then(editor => {
                // add an event listener to detect when the instance is ready
                editor.model.document.on('change:data', () => {
                    introductionInput.value = editor.getData();
                });
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#conclusion'), {
                ckfinder: {
                    uploadUrl: "{{ route('image.upload') . '?_token=' . csrf_token() }}",
                }
            })
            .then(editor => {
                // add an event listener to detect when the instance is ready
                editor.model.document.on('change:data', () => {
                    conclusionInput.value = editor.getData();
                });
            })
            .catch(error => {
                console.error(error);
            });

            ClassicEditor
                .create(document.querySelector('#discussion'), {
                    ckfinder: {
                        uploadUrl: "{{ route('image.upload') . '?_token=' . csrf_token() }}",
                    }
                })
                .then(editor => {
                    // add an event listener to detect when the instance is ready
                    editor.model.document.on('change:data', () => {
                        clinicalDiscussion.value = editor.getData();
                    });
                })
                .catch(error => {
                    console.error(error);
                });


            ClassicEditor
                .create(document.querySelector('#diagnosis'), {
                    ckfinder: {
                        uploadUrl: "{{ route('image.upload') . '?_token=' . csrf_token() }}",
                    }
                })
                .then(editor => {
                    // add an event listener to detect when the instance is ready
                    editor.model.document.on('change:data', () => {
                        clinicalDiagnosis.value = editor.getData();
                    });
                })
                .catch(error => {
                    console.error(error);
                });

            ClassicEditor
                .create(document.querySelector('#treatment'), {
                    ckfinder: {
                        uploadUrl: "{{ route('image.upload') . '?_token=' . csrf_token() }}",
                    }
                })
                .then(editor => {
                    // add an event listener to detect when the instance is ready
                    editor.model.document.on('change:data', () => {
                        clinicalTreatment.value = editor.getData();
                    });
                })
                .catch(error => {
                    console.error(error);
                });
    </script>

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
    </script>
    @endsection
