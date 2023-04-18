<x-app-layout>
    @section('title', 'Research Paper')

    <head>

        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.16/tailwind.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="{{ asset('assets/css/flowbite.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet" type="text/css">

        <!-- summernote -->
        <link href="{{ asset('assets/css/summernote/summernote.min.css') }}" rel="stylesheet" type="text/css">

        <meta name="csrf-token" content="{{ csrf_token() }}">

    </head>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-default">
                                <div class="card-header">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    @if (session('successAbstract'))
                                        <div class="alert alert-success">
                                            {{ session('successAbstract') }}
                                        </div>
                                    @endif
                                    <h3 class="card-title">Abstract Submission RESEARCH PAPER</h3>
                                </div>
                                <div class="card-body p-0">
                                    <div class="bs-stepper">
                                        <div class="bs-stepper-header" role="tablist">
                                            <!-- your steps here -->

                                            <div class="step" data-target="#TitleTopic-part">
                                                <button type="button" class="step-trigger" role="tab"
                                                    aria-controls="TitleTopic-part" id="TitleTopic-part-trigger">
                                                    <span class="bs-stepper-circle">1</span>
                                                    <span class="bs-stepper-label">Title, Type and Topic</span>
                                                </button>
                                            </div>
                                            <div class="line"></div>

                                            <div class="step" data-target="#Authors-part">
                                                <button type="button" class="step-trigger" role="tab"
                                                    aria-controls="Authors-part" id="Authors-part-trigger">
                                                    <span class="bs-stepper-circle">2</span>
                                                    <span class="bs-stepper-label">Authors</span>
                                                </button>
                                            </div>
                                            <div class="line"></div>

                                            <div class="step" data-target="#Keywords-part">
                                                <button type="button" class="step-trigger" role="tab"
                                                    aria-controls="Keywords-part" id="Keywords-part-trigger">
                                                    <span class="bs-stepper-circle">3</span>
                                                    <span class="bs-stepper-label">Keywords</span>
                                                </button>
                                            </div>
                                            <div class="line"></div>

                                            <div class="step" data-target="#introobjective-part">
                                                <button type="button" class="step-trigger" role="tab"
                                                    aria-controls="introobjective-part"
                                                    id="introobjective-part-trigger">
                                                    <span class="bs-stepper-circle">4</span>
                                                    <span class="bs-stepper-label">Introduction & Objectives</span>
                                                </button>
                                            </div>
                                        </div>

                                        <div class="bs-stepper-header" role="tablist">
                                            <div class="step" data-target="#methodresult-part">
                                                <button type="button" class="step-trigger" role="tab"
                                                    aria-controls="methodresult-part" id="methodresult-part-trigger">
                                                    <span class="bs-stepper-circle">5</span>
                                                    <span class="bs-stepper-label">Method & Result</span>
                                                </button>
                                            </div>
                                            <div class="line"></div>

                                            <div class="step" data-target="#conclusion-part">
                                                <button type="button" class="step-trigger" role="tab"
                                                    aria-controls="conclusion-part" id="conclusion-part-trigger">
                                                    <span class="bs-stepper-circle">6</span>
                                                    <span class="bs-stepper-label">Conclusion</span>
                                                </button>
                                            </div>
                                            <div class="line"></div>

                                            <div class="step" data-target="#affirmation-part">
                                                <button type="button" class="step-trigger" role="tab"
                                                    aria-controls="affirmation-part" id="affirmation-part-trigger">
                                                    <span class="bs-stepper-circle">7</span>
                                                    <span class="bs-stepper-label">Affirmation</span>
                                                </button>
                                            </div>
                                            <div class="line"></div>

                                            <div class="step" data-target="#disclosure-part">
                                                <button type="button" class="step-trigger" role="tab"
                                                    aria-controls="disclosure-part" id="disclosure-part-trigger">
                                                    <span class="bs-stepper-circle">8</span>
                                                    <span class="bs-stepper-label">Disclosure</span>
                                                </button>
                                            </div>
                                            <div class="line"></div>



                                            <div class="step" data-target="#previewfinish-part">
                                                <button type="button" class="step-trigger" role="tab"
                                                    aria-controls="previewfinish-part"
                                                    id="previewfinish-part-trigger">
                                                    <span class="bs-stepper-circle">9</span>
                                                    <span class="bs-stepper-label">Finish</span>
                                                </button>
                                            </div>
                                        </div>

                                        <form action="{{ route('abstractsubmission.store') }}" method="POST"
                                            id="my-form">
                                            @csrf
                                            <div class="bs-stepper-content">
                                                <!-- your steps content here -->
                                                <div id="TitleTopic-part" class="content" role="tabpanel"
                                                    aria-labelledby="TitleTopic-part-trigger">
                                                    <br><span>Please enter the title of your abstract, select the type
                                                        and the topic.</span><br><br>
                                                    <div class="form-group">
                                                        <label for="title">Title * <em class="emText">limited to 25
                                                                words in UPPER CASE</em></label><br>
                                                        <span style="color: red;" id="title-error"
                                                            class="error"></span>
                                                        <textarea class="form-control" name="title" id="title" maxlength="25"
                                                            oninput="this.value = this.value.toUpperCase()"></textarea>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="type">Type:*</label>
                                                        <input type="hidden" name="type" value="Research Paper">
                                                        <select class="form-control" name="type" id="type">
                                                            <option value="Research Paper" disabled selected>Research
                                                                Paper</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="topic_id">Main Topic:*</label>
                                                        <span style="color: red;" id="topic-error"
                                                            class="error"></span>
                                                        <select class="form-control" name="topic_id" id="topic_id">
                                                            <option value="choose" disabled selected>Choose Topic
                                                            </option>
                                                            @foreach ($topics as $topic)
                                                                <option name="topic_id" value="{{ $topic->id }}">
                                                                    {{ $topic->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <button type="button" id="next-button-1"
                                                        onclick="validateTitleTopic()"
                                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm px-4 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                                        onclick="stepper.next()">Next</button>
                                                </div>

                                                <div id="Authors-part" class="content" role="tabpanel"
                                                    aria-labelledby="Authors-part-trigger">
                                                    <div class="form-group">
                                                        <span><strong>Please read carefully:</strong></span>
                                                        <p>- When adding co-authors, please first search by last name
                                                            only.
                                                            If no results are provided, please add the co-author and
                                                            affiliation.</p>
                                                        <p>- Please make sure each co-author has a unique email address.
                                                        </p>
                                                        <p>- In order to select your own affiliation, please tick the
                                                            box on
                                                            the relevant address.</p>
                                                        <p>- Please remember to tick the box in order to choose the
                                                            presenter.</p>
                                                        <p>- 5 presentations maximum per presenter.</p><br>


                                                        <!-- Add Author modal -->
                                                        <div id="addAuthor" tabindex="-1" aria-hidden="true"
                                                            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                                                            <div class="relative w-full h-full max-w-md md:h-auto">
                                                                <!-- Modal content -->
                                                                <div
                                                                    class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                                    <button type="button" id="closeModal"
                                                                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                                                        data-modal-hide="addAuthor">
                                                                        <svg aria-hidden="true" class="w-5 h-5"
                                                                            fill="currentColor" viewBox="0 0 20 20"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path fill-rule="evenodd"
                                                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                                                clip-rule="evenodd"></path>
                                                                        </svg>
                                                                        <span class="sr-only">Close modal</span>
                                                                    </button>
                                                                    <div class="px-6 py-6 lg:px-8">
                                                                        <h3
                                                                            class="mb-4 text-xl font-medium text-gray-900 dark:text-white">
                                                                            Add new Author
                                                                        </h3>

                                                                        {{-- ----------------------------------------------------------------------------------------------------------------------------- --}}

                                                                        <div>
                                                                            <label for="last-name">Search by Last
                                                                                Name:</label><br>
                                                                            <div class="inline-flex mb-3">
                                                                                <input type="text" id="last-name"
                                                                                    name="lastname">
                                                                                <button type="button"
                                                                                    data-search-url="{{ route('searchAuthors') }}"
                                                                                    class="ml-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm px-4 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                                                                    id="search-button">Search</button>
                                                                            </div>
                                                                        </div>

                                                                        <div id="authors-table-container"
                                                                            style="display:none;">
                                                                            <table id="authors-table"
                                                                                style="border: 1px solid black;">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>First Name</th>
                                                                                        <th>Last Name</th>
                                                                                        <th>Email</th>
                                                                                        <th>Adress</th>
                                                                                        <th>Phone</th>
                                                                                        <th>Departement</th>
                                                                                        <th>Institution</th>
                                                                                        <th>City</th>
                                                                                        <th>State</th>
                                                                                        <th>Country</th>
                                                                                        <th>Action</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>

                                                                        <p id="no-authors-message"
                                                                            style="display:none;">No authors found.</p>

                                                                        {{-- ----------------------------------------------------------------------------------------------------------------------------- --}}



                                                                        <form id="step2-form" class="space-y-6"
                                                                            action="#" method="POST">
                                                                            @csrf

                                                                            <input type="hidden" name="id"
                                                                                id="last_author_id" value="">

                                                                            <div>
                                                                                <label for="firstname"
                                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Firstname</label>
                                                                                <input type="text" name="firstname"
                                                                                    id="firstname"
                                                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                                                    placeholder="Your firstName...">
                                                                            </div>

                                                                            <div>
                                                                                <label for="lastname"
                                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lastname</label>
                                                                                <input type="text" name="lastname"
                                                                                    id="lastname"
                                                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                                                    placeholder="Your lastName...">
                                                                            </div>

                                                                            <div>
                                                                                <label for="email"
                                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                                                                <input type="email" name="email"
                                                                                    id="email"
                                                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                                                    placeholder="name@company.com">
                                                                            </div>
                                                                            <div>
                                                                                <label for="adress"
                                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Adress</label>
                                                                                <input type="text" name="adress"
                                                                                    id="adress"
                                                                                    placeholder="Adress"
                                                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                                                                            </div>

                                                                            <div>
                                                                                <label for="phone"
                                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone</label>
                                                                                <input type="tel" name="phone"
                                                                                    id="phone" placeholder="Phone"
                                                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                                                                            </div>

                                                                            <div>
                                                                                <label for="departement"
                                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">departement</label>
                                                                                <input type="text"
                                                                                    name="departement"
                                                                                    id="departement"
                                                                                    placeholder="departement"
                                                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                                                                            </div>

                                                                            <div>
                                                                                <label for="institution"
                                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">institution</label>
                                                                                <input type="text"
                                                                                    name="institution"
                                                                                    id="institution"
                                                                                    placeholder="institution"
                                                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                                                                            </div>

                                                                            <div>
                                                                                <label for="city"
                                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">city</label>
                                                                                <input type="text" name="city"
                                                                                    id="city" placeholder="city"
                                                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                                                                            </div>

                                                                            <div>
                                                                                <label for="state"
                                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">state</label>
                                                                                <input type="text" name="state"
                                                                                    id="state" placeholder="state"
                                                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                                                                            </div>

                                                                            <div>
                                                                                <label for="country"
                                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">country</label>
                                                                                <input type="text" name="country"
                                                                                    id="country"
                                                                                    placeholder="country"
                                                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                                                                            </div><br><br>
                                                                            <button id="submitAuthor"
                                                                                class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                                                                type="button">Add Author</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <button data-modal-target="addAuthor"
                                                            data-modal-toggle="addAuthor"
                                                            class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                                            type="button">
                                                            Add Author <i class="fas fa-user-plus"></i>
                                                        </button>

                                                    </div>
                                                    <div class="form-group">

                                                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                                            <table id="saved-data-table"
                                                                class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                                                <thead
                                                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                                    <tr>
                                                                        <th scope="col" class="px-6 py-3">First
                                                                            Name</th>
                                                                        <th scope="col" class="px-6 py-3">Last Name
                                                                        </th>
                                                                        <th scope="col" class="px-6 py-3">Email
                                                                        </th>
                                                                        <th scope="col" class="px-6 py-3">Adress
                                                                        </th>
                                                                        <th scope="col" class="px-6 py-3">Phone
                                                                        </th>
                                                                        <th scope="col" class="px-6 py-3">
                                                                            departement</th>
                                                                        <th scope="col" class="px-6 py-3">
                                                                            institution</th>
                                                                        <th scope="col" class="px-6 py-3">city</th>
                                                                        <th scope="col" class="px-6 py-3">state
                                                                        </th>
                                                                        <th scope="col" class="px-6 py-3">country
                                                                        </th>
                                                                        <th scope="col" class="px-6 py-3">Action
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr id="todo-list" style="text-align: center;">
                                                                        <td class="firstname"></td>
                                                                        <td class="lastname"></td>
                                                                        <td class="email"></td>
                                                                        <td class="adress"></td>
                                                                        <td class="phone"></td>
                                                                        <td class="departement"></td>
                                                                        <td class="institution"></td>
                                                                        <td class="city"></td>
                                                                        <td class="state"></td>
                                                                        <td class="country"></td>
                                                                        {{-- <td id="authorData">
                                                                            @if ($author)
                                                                              <button class="delete-author-btn" id="hhh" data-author-id="{{ $author->id }}">
                                                                                <i class='fa fa-trash'></i>
                                                                              </button>
                                                                            @endif
                                                                        </td> --}}
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>

                                                    <button type="button"
                                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm px-4 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                                        onclick="stepper.previous()">Previous</button>

                                                    <button type="button"
                                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm px-4 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                                        onclick="stepper.next()">Next</button>
                                                </div>

                                                <div id="Keywords-part" class="content" role="tabpanel"
                                                    aria-labelledby="Keywords-part-trigger">

                                                    <div class="form-group">
                                                        <label for="keywords"><strong>Keywords</strong></label>
                                                        <p>- Please provide 1-5 keywords</p>
                                                        <div class="inline-flex mb-3">
                                                            <input type="text" name="keywords"
                                                                class="form-control" id="keywords"
                                                                placeholder="Enter keywords">
                                                            <button id="addKeywordBtn" type="button"
                                                                class="ml-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm px-4 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add</button>
                                                        </div>
                                                        <ul id="keywordList"></ul>
                                                    </div>

                                                    <button type="button"
                                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm px-4 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                                        onclick="stepper.previous()">Previous</button>

                                                    <button type="button" id="next-button-2"
                                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm px-4 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                                        onclick="stepper.next()">Next</button>
                                                </div>

                                                <div id="introobjective-part" class="content" role="tabpanel"
                                                    aria-labelledby="introobjective-part-trigger">
                                                    <div class="form-group">
                                                        <label for="introduction"><strong>Introduction</strong> <em
                                                                class="emText">limited to 300 words:</em></label>
                                                        <div class="form-group">
                                                            <span style="color: red;" id="introduction-error"
                                                                class="error"></span>
                                                            <textarea name="introduction" id="introduction" class="form-control"
                                                                placeholder="Type or paste your introduction here..."></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="objective"><strong>Objectives</strong> <em
                                                                class="emText">limited to 300 words:</em></label>
                                                        <div class="form-group">
                                                            <span style="color: red;" id="objective-error"
                                                                class="error"></span>
                                                            <textarea name="objective" id="objective" class="form-control" placeholder="Type or paste your objective here..."></textarea>
                                                        </div>
                                                    </div>

                                                    <button type="button"
                                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm px-4 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                                        onclick="stepper.previous()">Previous</button>

                                                    <button type="button" id="next-button-3"
                                                        onclick="validateIntroObject()"
                                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm px-4 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                                        onclick="stepper.next()">Next</button>
                                                </div>

                                                <div id="methodresult-part" class="content" role="tabpanel"
                                                    aria-labelledby="methodresult-part-trigger">
                                                    <div class="form-group">
                                                        <label for="method"><strong>Method</strong> <em
                                                                class="emText">limited to 300 words:</em></label>
                                                        <div class="form-group">
                                                            <span style="color: red;" id="method-error"
                                                                class="error"></span>
                                                            <textarea name="method" id="method" class="form-control" maxlength="300"
                                                                placeholder="Type or paste your method here..." style="height: 300px"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="result"><strong>Result</strong> <em
                                                                class="emText">limited to 300 words:</em></label>
                                                        <div class="form-group">
                                                            <span style="color: red;" id="result-error"
                                                                class="error"></span>
                                                            <textarea name="result" id="result" class="form-control" maxlength="300"
                                                                placeholder="Type or paste your result here..." style="height: 300px"></textarea>
                                                        </div>
                                                    </div>

                                                    <button type="button"
                                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm px-4 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                                        onclick="stepper.previous()">Previous</button>

                                                    <button type="button" id="next-button-4"
                                                        onclick="validateMethodResult()"
                                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm px-4 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                                        onclick="stepper.next()">Next</button>
                                                </div>

                                                <div id="conclusion-part" class="content" role="tabpanel"
                                                    aria-labelledby="conclusion-part-trigger">
                                                    <div class="form-group">
                                                        <label for="conclusion"><strong>Conclusion</strong> <em
                                                                class="emText">limited to 300 words:</em></label>
                                                        <div class="form-group">
                                                            <span style="color: red;" id="conclusion-error"
                                                                class="error"></span>
                                                            <textarea name="conclusion" id="conclusion" class="form-control" style="height: 300px"></textarea>
                                                        </div>
                                                    </div>

                                                    <button type="button"
                                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm px-4 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                                        onclick="stepper.previous()">Previous</button>

                                                    <button type="button" id="next-button-5"
                                                        onclick="validateConclusion()"
                                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm px-4 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                                        onclick="stepper.next()">Next</button>
                                                </div>

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
                                                            1. I confirm that I have previewed this abstract and that
                                                            all information is correct and in accordance to the abstract
                                                            submission guidelines provided on the Congress website. I
                                                            accept that the contents of this abstract cannot be modified
                                                            or corrected after final submission and I am aware that it
                                                            will be published exactly as submitted.
                                                        </p>
                                                        <br><br>
                                                        <p>
                                                            2. Submission of the abstract constitutes my consent to
                                                            publication (e.g., Congress website, Congress Notes book,
                                                            etc.)
                                                        </p>
                                                        <br><br>
                                                        <p>
                                                            3. I warrant and represent that I am the sole owner or have
                                                            the rights of all the information and content ('Content')
                                                            provided to MEAVC 2023 Conferences (Hereafter:
                                                            'Organizers'). The publication of the abstract does not
                                                            infringe any third-party rights including, but not limited
                                                            to, intellectual property rights.
                                                        </p>
                                                        <br><br>
                                                        <p>
                                                            4. I grant the Organizers a royalty-free, perpetual,
                                                            irrevocable nonexclusive license to use, reproduce, publish,
                                                            translate, distribute, and display the Content.
                                                        </p>
                                                        <br><br>
                                                        <p>
                                                            5. The Organizers reserve the right to remove from any
                                                            publication an abstract which does not comply with the
                                                            above.
                                                        </p>
                                                        <br><br>
                                                        <p>
                                                            6. I herewith confirm that the contact details saved in this
                                                            system are correct, which will be used to notify me about
                                                            the status of the abstract. I am responsible for informing
                                                            the other authors about the status of the abstract.​
                                                        </p>
                                                        <br><br>
                                                        <input class="form-check-input" type="checkbox"
                                                            id="affirmation" name="affirmation" required>
                                                        <label class="form-check-label" for="affirmation"><strong>I
                                                                Agree</strong>
                                                        </label>
                                                        <p>* You may proceed to the next step but the system will not
                                                            let
                                                            you complete your submission without entering mandatory
                                                            information.</p>
                                                    </div>

                                                    <button type="button"
                                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm px-4 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                                        onclick="stepper.previous()">Previous</button>

                                                    <button type="button"
                                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm px-4 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                                        onclick="stepper.next()">Next</button>
                                                </div>

                                                <div id="disclosure-part" class="content" role="tabpanel"
                                                    aria-labelledby="disclosure-part-trigger">
                                                    <div class="form-group">
                                                        <label for="disclosure"><strong>Disclosure</strong></label>
                                                        <p>Do you or any of the co-authors have a significant financial
                                                            interest, consultancy or other relationship with products,
                                                            manufacturer(s) of products or providers of services related
                                                            to
                                                            this abstract?</p>


                                                        <div class="flex items-center mb-4">

                                                            <input type="radio" name="disclosure"
                                                                value="provide_disclosure" id="provide_disclosure">
                                                            <label for="disclosure">Please provide your statement (max.
                                                                255 characters)</label>

                                                            <div class="form-group" id="disclosure_field"
                                                                style="display: none;">
                                                                <textarea name="disclosure" id="disclosure" class="form-control"
                                                                    style="margin-left: 30px; width:600px; height: 300px;"></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="flex items-center">
                                                            <input type="radio" name="disclosure"
                                                                value="No significant relationships"
                                                                id="No significant relationships"> No significant
                                                            relationships
                                                        </div>

                                                    </div>

                                                    <button type="button"
                                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm px-4 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                                        onclick="stepper.previous()">Previous</button>

                                                    <button type="button" id="preview-button"
                                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm px-4 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                                        onclick="stepper.next()">Next</button>
                                                </div>

                                                <div id="previewfinish-part" class="content" role="tabpanel"
                                                    aria-labelledby="previewfinish-part-trigger">

                                                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                                        <table
                                                            class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                                            <thead
                                                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                                <tr>
                                                                    <th scope="col" class="px-6 py-3">title</th>
                                                                    <th scope="col" class="px-6 py-3">Topic</th>
                                                                    <th scope="col" class="px-6 py-3">Keywords</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr id="preview"></tr>
                                                            </tbody>
                                                        </table>
                                                    </div><br>

                                                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                                            <thead
                                                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                                <tr>
                                                                    <th scope="col" class="px-6 py-3">introduction</th>
                                                                        <th scope="col" class="px-6 py-3">objective</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr id="preview1"></tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <br><br>

                                                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                                            <thead
                                                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                                <tr>
                                                                    <th scope="col" class="px-6 py-3">method</th>
                                                                    <th scope="col" class="px-6 py-3">result</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr id="preview2"></tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <br><br>

                                                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                                            <thead
                                                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                                <tr>
                                                                    <th scope="col" class="px-6 py-3">conclusion</th>
                                                                    <th scope="col" class="px-6 py-3">Disclosure</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr id="preview3"></tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <br><br>

                                                    <button type="button"
                                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm px-4 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                                        onclick="stepper.previous()">Previous</button>

                                                    <input type="hidden" name="author_id" id="author-id"
                                                        value="">

                                                    <div class="text-center">
                                                        <p class="align_c"><button type="submit"
                                                                class="btnStyle">Submit Abstract</button></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>


                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    Abstract Submission RESEARCH PAPER
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="{{ asset('assets/css/bs-stepper.min.css') }}">

    <style>
        #keywordList li {
            display: inline-block;
            margin-right: 5px;
            margin-bottom: 5px;
            padding: 5px 10px;
            background-color: lightblue;
            border-radius: 5px;
            color: white;
            font-size: 14px;
        }

        #authors-table th,
        #authors-table td {
            border: 1px solid black;
        }
    </style>

    <script src="{{ asset('assets/js/researchclinical.js') }}"></script>
    <script src="{{ asset('assets/js/researchValidate.js') }}"></script>

    <script>
        // BS-Stepper Init
        document.addEventListener('DOMContentLoaded', function() {
            window.stepper = new Stepper(document.querySelector('.bs-stepper'))
        })
    </script>

</x-app-layout>
