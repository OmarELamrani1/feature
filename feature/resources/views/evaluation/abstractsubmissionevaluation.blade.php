<x-app-layout>
    @section('title', 'Evaluation')

    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.16/tailwind.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <!-- article -->
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

                            <h1><span class="trackCode">TRACKING CODE : {{ $abstractsubmission->tracking_code }}</span>
                            </h1>
                            <p>&nbsp;</p>

                            <form action="{{ route('evaluation.store') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                            <tr>
                                                <th scope="col" class="px-6 py-3">title</th>
                                                <th scope="col" class="px-6 py-3">type</th>
                                                <th scope="col" class="px-6 py-3">Topic</th>
                                                <th scope="col" class="px-6 py-3">Keywords</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="border px-6 py-4">{{ $abstractsubmission->title }}</td>
                                                <td class="border px-6 py-4">{{ $abstractsubmission->type }}</td>
                                                <td class="border px-6 py-4">{{ $abstractsubmission->topic->name }}</td>
                                                <td class="border px-6 py-4">{{ $abstractsubmission->keywords }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            <br><br>

                                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                            <tr>
                                                @if ($abstractsubmission->type === "Research Paper")
                                                    <th scope="col" class="px-6 py-3">introduction</th>
                                                @elseif ($abstractsubmission->type === "Clinical Case")
                                                    <th scope="col" class="px-6 py-3">Clinical History & Presentation</th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="evaluate border px-6 py-4">{!! $abstractsubmission->introduction !!}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            <br><br>

                            @if ($abstractsubmission->type === "Research Paper")
                                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                            <tr>
                                                <th scope="col" class="px-6 py-3">objective</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="evaluate border px-6 py-4">{!! $abstractsubmission->objective !!}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            <br><br>

                                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                            <tr>
                                                <th scope="col" class="px-6 py-3">method</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="evaluate border px-6 py-4">{!! $abstractsubmission->method !!}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            <br><br>

                                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                            <tr>
                                                <th scope="col" class="px-6 py-3">result</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="evaluate border px-6 py-4">{!! $abstractsubmission->result !!}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            <br><br>

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">conclusion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="evaluate border px-6 py-4">{!! $abstractsubmission->conclusion !!}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                <br><br>
                            @elseif ($abstractsubmission->type === "Clinical Case")
                                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                            <tr>
                                                <th scope="col" class="px-6 py-3">Physical Examination & Diagnostic Workup</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="evaluate border px-6 py-4">{!! $abstractsubmission->diagnosis !!}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            <br><br>

                                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                            <tr>
                                                <th scope="col" class="px-6 py-3">treatment</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="evaluate border px-6 py-4">{!! $abstractsubmission->treatment !!}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            <br><br>

                                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                            <tr>
                                                <th scope="col" class="px-6 py-3">discussion</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="border px-6 py-4">{!! $abstractsubmission->discussion !!}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            <br><br>

                            @endif

                                <select name="status" id="status-select" class="form-select w-100 p-3"
                                    aria-label="Default select example">
                                    <option disabled selected>Evaluation : </option>
                                    <option name="status" value="Approved">Approved</option>
                                    <option name="status" value="Modify">Modify</option>
                                    <option name="status" value="Rejected">Rejected</option>
                                </select><br>

                                <div id="comment-input" style="display: none;">
                                    <label for="comment">Reason for the modification<span style="color:red;">*</span> :</label>
                                    <input type="text" name="comment" id="comment" placeholder="Reason for the modification . . ." style="width: 60%;" autofocus> <br><br>

                                    <label for="file">Add doc - docx - pdf :</label>
                                    <input type="file" name="file" id="file">
                                </div> <br>

                                <input type="hidden" name="abstractsubmission_id" value="{{ $abstractsubmission->id }}">

                                <div class="text-center">
                                    <p class="align_c"><button type="submit" class="btnStyle">Submit Evaluation</button></p>
                                </div>
                            </form>

                        </div>
                        <p class="clear">&nbsp;</p>
                    </article>
                    <!-- article end -->

                </div>
            </div>

        </div>
    </div>

    <script>
        const selectBox = document.getElementById('status-select');
        const commentInput = document.getElementById('comment-input');
        selectBox.addEventListener('change', () => {
            if (selectBox.value === 'Modify') {
                commentInput.style.display = 'block';
            } else {
                commentInput.style.display = 'none';
            }
        });
    </script>

</x-app-layout>
