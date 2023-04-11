<x-app-layout>
    @section('title', 'STATUS')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tracking CODE : {{ $checkStatus->abstractsubmission->tracking_code }}
        </h2>
    </x-slot>

    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.16/tailwind.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>

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

                            @if ($checkStatus->status == 'Approuved' || $checkStatus->status == 'Rejected')
                                <div class="panel-heading">
                                    <div class="panel-title">Status : {{ $checkStatus->status }}</div>

                                    <a href="{{ route('printsubmission',   $checkStatus->abstractsubmission->id) }}" target="blank">
                                        <button>
                                            <i class="fa fa-print" aria-hidden="true"></i>Print
                                        </button>
                                    </a>
                                </div>
                            @endif

                            <h1><span class="trackCode">TRACKING CODE :
                                    {{ $checkStatus->abstractsubmission->tracking_code }}</span>
                            </h1>
                            <p>&nbsp;</p>


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
                                                    <th scope="col" class="px-6 py-3">type</th>
                                                    <th scope="col" class="px-6 py-3">Topic</th>
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
                                                    <td class="border px-6 py-4">

                                                        @if ($checkStatus->abstractsubmission->type === 'Research Paper')
                                                        <input type="hidden" name="type" value="Research Paper">
                                                        <input type="text" name="type"
                                                            value="{{ $checkStatus->abstractsubmission->type }}"
                                                            disabled value="Research Paper">
                                                        @else
                                                        <input type="hidden" name="type" value="Clinical Case">
                                                        <input type="text" name="type"
                                                            value="{{ $checkStatus->abstractsubmission->type }}"
                                                            disabled value="Clinical Case">
                                                        @endif

                                                    </td>
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
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div><br><br>

                                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                            <thead
                                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                <tr>
                                                    <th scope="col" class="px-6 py-3">Keywords</th>
                                                    <th scope="col" class="px-6 py-3">introduction</th>
                                                    @if ($checkStatus->abstractsubmission->type === 'Research Paper')
                                                        <th scope="col" class="px-6 py-3">objective</th>
                                                        <th scope="col" class="px-6 py-3">method</th>
                                                        <th scope="col" class="px-6 py-3">result</th>
                                                        <th scope="col" class="px-6 py-3">conclusion</th>
                                                    @else
                                                        <th scope="col" class="px-6 py-3">Diagnosis</th>
                                                        <th scope="col" class="px-6 py-3">Treatment</th>
                                                        <th scope="col" class="px-6 py-3">Discussion</th>
                                                    @endif


                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="border px-6 py-4">
                                                        <input type="text" name="keywords"
                                                            value="{{ $checkStatus->abstractsubmission->keywords }}">
                                                    </td>
                                                    <td class="border px-6 py-4">
                                                        <input type="text" name="introduction"
                                                            value="{{ $checkStatus->abstractsubmission->introduction }}">
                                                    </td>

                                                    @if ($checkStatus->abstractsubmission->type === 'Research Paper')
                                                        <td class="border px-6 py-4">
                                                            <input type="text" name="objective"
                                                                value="{{ $checkStatus->abstractsubmission->objective }}">
                                                        </td>
                                                        <td class="border px-6 py-4">
                                                            <input type="text" name="method"
                                                                value="{{ $checkStatus->abstractsubmission->method }}">
                                                        </td>
                                                        <td class="border px-6 py-4">
                                                            <input type="text" name="result"
                                                                value="{{ $checkStatus->abstractsubmission->result }}">
                                                        </td>
                                                        <td class="border px-6 py-4">
                                                            <input type="text" name="conclusion"
                                                                value="{{ $checkStatus->abstractsubmission->conclusion }}">
                                                        </td>
                                                    @else
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
                                                    @endif

                                                </tr>
                                            </tbody>
                                        </table>
                                    </div><br><br>

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
                                                1. I confirm that I have previewed this abstract and that all information is correct and in accordance to the abstract submission guidelines provided on the Congress website. I accept that the contents of this abstract cannot be modified or corrected after final submission and I am aware that it will be published exactly as submitted.
                                            </p>
                                            <br><br>
                                            <p>
                                                2. Submission of the abstract constitutes my consent to publication (e.g., Congress website, Congress Notes book, etc.)
                                            </p>
                                            <br><br>
                                            <p>
                                                3. I warrant and represent that I am the sole owner or have the rights of all the information and content ('Content') provided to MEAVC 2023 Conferences (Hereafter: 'Organizers'). The publication of the abstract does not infringe any third-party rights including, but not limited to, intellectual property rights.
                                            </p>
                                            <br><br>
                                            <p>
                                                4. I grant the Organizers a royalty-free, perpetual, irrevocable nonexclusive license to use, reproduce, publish, translate, distribute, and display the Content.
                                            </p>
                                            <br><br>
                                            <p>
                                                5. The Organizers reserve the right to remove from any publication an abstract which does not comply with the above.
                                            </p>
                                            <br><br>
                                            <p>
                                                6. I herewith confirm that the contact details saved in this system are correct, which will be used to notify me about the status of the abstract. I am responsible for informing the other authors about the status of the abstract.​
                                            </p>
                                            <br><br>
                                            <input class="form-check-input" type="checkbox" id="affirmation"
                                                name="affirmation" required>
                                            <label class="form-check-label" for="affirmation"><strong>I
                                                    Agree</strong>
                                            </label>
                                            {{-- <input type="checkbox" name="affirmation" id="affirmation">
                                                        <strong>I
                                                            Agree</strong> --}}
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
</x-app-layout>
