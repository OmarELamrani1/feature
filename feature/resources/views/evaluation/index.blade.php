<x-app-layout>
    @section('title', 'Evaluation')

<link href="{{ asset('assets/css/main.css') }}" rel="stylesheet" type="text/css">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                <!-- article -->
                <article>

                    <div class="content">
                    <h1><span class="trackCode">TRACKING CODE : {{ $poster->tracking_code }}</span></h1>
                    <p>&nbsp;</p>
                    <div class="AbstractsTopp">
                        <ol >
                            <li>
                                <i class="fas fa-solid fa-paper-plane fa-2xl"></i>

                                @php
                                    $extension = pathinfo($poster->path, PATHINFO_EXTENSION);
                                @endphp

                                @if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'svg']))
                                    <img class="poster" src="{{ Storage::url($poster->path) }}" alt="POSTER">

                                @elseif (in_array($extension, ['doc', 'docx', 'pdf']))
                                    <a href="{{ Storage::url($poster->path) }}" target="_blank" rel="noopener noreferrer">
                                        <button>Show {{ strtoupper($extension) }}</button>
                                    </a>

                                @else
                                    <p>Invalid file type: {{ $extension }}</p>
                                @endif
                            </li>
                        </ol>
                    </div>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>

                    <form action="{{ route('evaluation.store') }}" method="post">
                        @csrf

                        <select name="status" class="form-select w-100 p-3" aria-label="Default select example">
                            <option disabled selected>Evaluation : </option>
                            <option name="status" value="Approuved">Approuved</option>
                            <option name="status" value="Modify">Modify</option>
                            <option name="status" value="Rejected">Rejected</option>
                        </select><br>

                        <input type="hidden" name="poster_id" value="{{ $poster->id }}">

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
</x-app-layout>
