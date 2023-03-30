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
                            <h1><span class="trackCode">TRACKING CODE : {{ $abstractsubmission->tracking_code }}</span>
                            </h1>
                            <p>&nbsp;</p>

                            <form action="{{ route('evaluation.store') }}" method="post">
                                @csrf

                                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                        <thead
                                            class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
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
                                </div><br><br>
                                <select name="status" class="form-select w-100 p-3"
                                    aria-label="Default select example">
                                    <option disabled selected>Evaluation : </option>
                                    <option name="status" value="Approuved">Approuved</option>
                                    <option name="status" value="Modify">Modify</option>
                                    <option name="status" value="Rejected">Rejected</option>
                                </select><br>

                                <input type="hidden" name="abstractsubmission_id"
                                    value="{{ $abstractsubmission->id }}">

                                <div class="text-center">
                                    <p class="align_c"><button type="submit" class="btnStyle">Submit
                                            Evaluation</button></p>
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
</x-app-layout>
