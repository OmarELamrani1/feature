@extends('layouts.navbar')
@section('title', 'Clinical Case')

<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

<!-- summernote -->
<link href="{{ asset('assets/css/summernote/summernote.min.css') }}" rel="stylesheet" type="text/css">

<link href="{{ asset('assets/css/main.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="{{ asset('assets/css/bs-stepper.min.css') }}">

@section('content')
    <div id="content" class="user-content">
        <h1 class="text-center mb-5">CLINICAL CASE</h1>

        <div>
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
                                            <h3 class="card-title">Abstract Submission CLINICAL CASE</h3>
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

                                                    <div class="step" data-target="#introdiagnosis-part">
                                                        <button type="button" class="step-trigger" role="tab"
                                                            aria-controls="introdiagnosis-part"
                                                            id="introdiagnosis-part-trigger">
                                                            <span class="bs-stepper-circle">4</span>
                                                            <span class="bs-stepper-label">Introduction & Diagnosis</span>
                                                        </button>
                                                    </div>
                                                </div><br>

                                                <div class="bs-stepper-header" role="tablist">
                                                    <div class="step" data-target="#treatmentDiscussion-part">
                                                        <button type="button" class="step-trigger" role="tab"
                                                            aria-controls="treatmentDiscussion-part"
                                                            id="treatmentDiscussion-part-trigger">
                                                            <span class="bs-stepper-circle">5</span>
                                                            <span class="bs-stepper-label">Treatment & Discussion</span>
                                                        </button>
                                                    </div>
                                                    <div class="line"></div>

                                                    <div class="step" data-target="#affirmation-part">
                                                        <button type="button" class="step-trigger" role="tab"
                                                            aria-controls="affirmation-part"
                                                            id="affirmation-part-trigger">
                                                            <span class="bs-stepper-circle">6</span>
                                                            <span class="bs-stepper-label">Affirmation</span>
                                                        </button>
                                                    </div>
                                                    <div class="line"></div>

                                                    <div class="step" data-target="#disclosure-part">
                                                        <button type="button" class="step-trigger" role="tab"
                                                            aria-controls="disclosure-part" id="disclosure-part-trigger">
                                                            <span class="bs-stepper-circle">7</span>
                                                            <span class="bs-stepper-label">Disclosure</span>
                                                        </button>
                                                    </div>
                                                    <div class="line"></div>

                                                    <div class="step" data-target="#previewfinish-part">
                                                        <button type="button" class="step-trigger" role="tab"
                                                            aria-controls="previewfinish-part"
                                                            id="previewfinish-part-trigger">
                                                            <span class="bs-stepper-circle">8</span>
                                                            <span class="bs-stepper-label">Finish</span>
                                                        </button>
                                                    </div>
                                                </div><br><br>

                                                <form action="{{ route('abstractsubmission.store') }}" method="POST"
                                                    id="my-form">
                                                    @csrf

                                                <div class="bs-stepper-content">

                                                    <div id="TitleTopic-part" class="content" role="tabpanel"
                                                        aria-labelledby="TitleTopic-part-trigger">
                                                        <br><span>Please enter the title of your abstract, select the type
                                                            and
                                                            the topic.</span><br><br>

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
                                                            <input type="hidden" name="type" value="Clinical Case">
                                                            <select class="form-control" name="type" id="type">
                                                                <option value="Clinical Case" disabled selected>Clinical
                                                                    Case</option>
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

                                                        <button type="button" id="clinicalNext1"
                                                            onclick="validateTitleTopic()" class="btn btn-primary"
                                                            onclick="stepper.next()">Next <svg
                                                                xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor"
                                                                class="bi bi-arrow-right" viewBox="0 0 16 16">
                                                                <path fill-rule="evenodd"
                                                                    d="M4.646 11.354a.5.5 0 0 1 0-.708L7.293 8 4.646 5.354a.5.5 0 0 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0z" />
                                                                <path fill-rule="evenodd"
                                                                    d="M9 8a.5.5 0 0 0-.5-.5H3a.5.5 0 0 0 0 1h5.5A.5.5 0 0 0 9 8z" />
                                                            </svg></button>
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

                                                            <button type="button" class="btn btn-primary"
                                                                data-bs-toggle="modal" data-bs-target="#addAuthor"
                                                                data-bs-whatever="@getbootstrap">Add Author <i
                                                                    class="fas fa-user-plus"></i></button>

                                                            <div class="modal fade" id="addAuthor" tabindex="-1"
                                                                aria-labelledby="addAuthorLabel" aria-hidden="true">

                                                                <div
                                                                    class="relative w-full h-full max-w-md md:h-auto modal-dialog">
                                                                    <!-- Modal content -->
                                                                    <div class="modal-content relative bg-white rounded-lg shadow dark:bg-gray-700"
                                                                        style="width: 185% !important; padding:15px;">

                                                                        <div class="modal-header">
                                                                            <h3 class="modal-title fs-5"
                                                                                id="addAuthorLabel">Add new Author</h3>
                                                                            <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                        </div>


                                                                        <div class="px-6 py-6 lg:px-8">

                                                                            {{-- ----------------------------------------------------------------------------------------------------------------------------- --}}

                                                                            <div>
                                                                                <label for="last-name">Search by Last Name
                                                                                    :</label><br>

                                                                                <div class="mb-3"
                                                                                    style="display: flex;">
                                                                                    <input type="search" id="last-name"
                                                                                        name="lastname"
                                                                                        class="form-control"
                                                                                        id="keywords"
                                                                                        placeholder="Search authors by Last Name">
                                                                                    <button id="search-button"
                                                                                        type="button"
                                                                                        class="btn btn-primary"
                                                                                        data-search-url="{{ route('searchAuthors') }}"
                                                                                        style="margin-left: 10px;"><svg
                                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                                            width="16" height="16"
                                                                                            fill="currentColor"
                                                                                            class="bi bi-search"
                                                                                            viewBox="0 0 16 16">
                                                                                            <path
                                                                                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                                                                        </svg></button>
                                                                                </div>
                                                                            </div>

                                                                            <div id="authors-table-container"
                                                                                style="display:none;">
                                                                                <table id="authors-table"
                                                                                    class="table table-bordered"
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


                                                                            <div class="modal-body">
                                                                                <form id="step2-form" class="space-y-6"
                                                                                    action="#" method="POST">
                                                                                    @csrf

                                                                                    <input type="hidden" name="id"
                                                                                        id="last_author_id"
                                                                                        value="">

                                                                                    <div class="inline-flex"
                                                                                        style="display: flex;">
                                                                                        <div class="mb-3"
                                                                                            style="flex: 1; margin-right: 10px;">
                                                                                            <label for="firstname"
                                                                                                class="col-form-label">First
                                                                                                Name</label>
                                                                                            <input type="text"
                                                                                                name="firstname"
                                                                                                id="firstname"
                                                                                                class="form-control"
                                                                                                placeholder="First Name">
                                                                                        </div>

                                                                                        <div class="mb-3"
                                                                                            style="flex: 1;">
                                                                                            <label for="lastname"
                                                                                                class="col-form-label">Last
                                                                                                Name</label>
                                                                                            <input type="text"
                                                                                                name="lastname"
                                                                                                id="lastname"
                                                                                                class="form-control"
                                                                                                placeholder="Last Name">
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="inline-flex"
                                                                                        style="display: flex;">
                                                                                        <div class="mb-3"
                                                                                            style="flex: 1; margin-right: 10px;">
                                                                                            <label for="email"
                                                                                                class="col-form-label">Email</label>
                                                                                            <input type="email"
                                                                                                name="email"
                                                                                                id="email"
                                                                                                class="form-control"
                                                                                                placeholder="name@company.com">
                                                                                        </div>

                                                                                        <div class="mb-3"
                                                                                            style="flex: 1;">
                                                                                            <label for="adress"
                                                                                                class="col-form-label">Address</label>
                                                                                            <input type="text"
                                                                                                name="adress"
                                                                                                id="adress"
                                                                                                placeholder="Address"
                                                                                                class="form-control">
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="inline-flex"
                                                                                        style="display: flex;">
                                                                                        <div class="mb-3"
                                                                                            style="flex: 1; margin-right: 10px;">
                                                                                            <label for="phone"
                                                                                                class="col-form-label">Phone</label>
                                                                                            <input type="tel"
                                                                                                name="phone"
                                                                                                id="phone"
                                                                                                placeholder="Phone"
                                                                                                class="form-control">
                                                                                        </div>

                                                                                        <div class="mb-3"
                                                                                            style="flex: 1;">
                                                                                            <label for="departement"
                                                                                                class="col-form-label">Departement</label>
                                                                                            <input type="text"
                                                                                                name="departement"
                                                                                                id="departement"
                                                                                                placeholder="Departement"
                                                                                                class="form-control">
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="inline-flex"
                                                                                        style="display: flex;">
                                                                                        <div class="mb-3"
                                                                                            style="flex: 1; margin-right: 10px;">
                                                                                            <label for="institution"
                                                                                                class="col-form-label">Institution</label>
                                                                                            <input type="text"
                                                                                                name="institution"
                                                                                                id="institution"
                                                                                                placeholder="Institution"
                                                                                                class="form-control">
                                                                                        </div>

                                                                                        <div class="mb-3"
                                                                                            style="flex: 1;">
                                                                                            <label for="city"
                                                                                                class="col-form-label">City</label>
                                                                                            <input type="text"
                                                                                                name="city"
                                                                                                id="city"
                                                                                                placeholder="City"
                                                                                                class="form-control">
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="inline-flex"
                                                                                        style="display: flex;">
                                                                                        <div class="mb-3"
                                                                                            style="flex: 1; margin-right: 10px;">
                                                                                            <label for="state"
                                                                                                class="col-form-label">State</label>
                                                                                            <input type="text"
                                                                                                name="state"
                                                                                                id="state"
                                                                                                placeholder="State"
                                                                                                class="form-control">
                                                                                        </div>

                                                                                        <div class="mb-3"
                                                                                            style="flex: 1;">
                                                                                            <label for="country"
                                                                                                class="col-form-label">Country</label>
                                                                                            <input type="text"
                                                                                                name="country"
                                                                                                id="country"
                                                                                                placeholder="Country"
                                                                                                class="form-control">
                                                                                        </div>
                                                                                    </div>
                                                                                    <button id="submitAuthor"
                                                                                        type="button"
                                                                                        class="btn btn-primary">Add
                                                                                        Author</button>
                                                                                </form>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>


                                                            </div>

                                                        </div>
                                                        <div class="form-group">

                                                            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                                                <table id="saved-data-table" class="table table-bordered">
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
                                                                                Institution</th>
                                                                            <th scope="col" class="px-6 py-3">City</th>
                                                                            <th scope="col" class="px-6 py-3">State
                                                                            </th>
                                                                            <th scope="col" class="px-6 py-3">Country
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
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>

                                                        <button type="button" class="btn btn-primary"
                                                            onclick="stepper.previous()"><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor"
                                                                class="bi bi-arrow-left" viewBox="0 0 16 16">
                                                                <path fill-rule="evenodd"
                                                                    d="M11.354 4.646a.5.5 0 0 1 0 .708L8.707 8l2.647 2.646a.5.5 0 1 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 0 1 .708 0z" />
                                                                <path fill-rule="evenodd"
                                                                    d="M5 8a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1H5.5A.5.5 0 0 1 5 8z" />
                                                            </svg> Previous</button>

                                                        <button type="button" class="btn btn-primary"
                                                            onclick="stepper.next()">Next <svg
                                                                xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor"
                                                                class="bi bi-arrow-right" viewBox="0 0 16 16">
                                                                <path fill-rule="evenodd"
                                                                    d="M4.646 11.354a.5.5 0 0 1 0-.708L7.293 8 4.646 5.354a.5.5 0 0 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0z" />
                                                                <path fill-rule="evenodd"
                                                                    d="M9 8a.5.5 0 0 0-.5-.5H3a.5.5 0 0 0 0 1h5.5A.5.5 0 0 0 9 8z" />
                                                            </svg></button>
                                                    </div>

                                                    <div id="Keywords-part" class="content" role="tabpanel"
                                                        aria-labelledby="Keywords-part-trigger">

                                                        <div class="form-group">
                                                            <label for="keywords"><strong>Keywords</strong></label>
                                                            <p>- Please provide 1-5 keywords</p>

                                                            <div class="mb-3" style="display: flex;">
                                                                <input type="text" name="keywords"
                                                                    class="form-control" id="keywords"
                                                                    placeholder="Enter keywords">
                                                                <button id="addKeywordBtn" type="button"
                                                                    class="btn btn-primary"
                                                                    style="margin-left: 10px;">Add</button>
                                                            </div>
                                                            <ul id="keywordList"></ul>
                                                        </div>

                                                        <button type="button" class="btn btn-primary"
                                                            onclick="stepper.previous()"><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor"
                                                                class="bi bi-arrow-left" viewBox="0 0 16 16">
                                                                <path fill-rule="evenodd"
                                                                    d="M11.354 4.646a.5.5 0 0 1 0 .708L8.707 8l2.647 2.646a.5.5 0 1 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 0 1 .708 0z" />
                                                                <path fill-rule="evenodd"
                                                                    d="M5 8a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1H5.5A.5.5 0 0 1 5 8z" />
                                                            </svg> Previous</button>

                                                        <button type="button" id="clinicalNext2" class="btn btn-primary"
                                                            onclick="stepper.next()">Next <svg
                                                                xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor"
                                                                class="bi bi-arrow-right" viewBox="0 0 16 16">
                                                                <path fill-rule="evenodd"
                                                                    d="M4.646 11.354a.5.5 0 0 1 0-.708L7.293 8 4.646 5.354a.5.5 0 0 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0z" />
                                                                <path fill-rule="evenodd"
                                                                    d="M9 8a.5.5 0 0 0-.5-.5H3a.5.5 0 0 0 0 1h5.5A.5.5 0 0 0 9 8z" />
                                                            </svg></button>
                                                    </div>

                                                    <div id="introdiagnosis-part" class="content" role="tabpanel"
                                                        aria-labelledby="introdiagnosis-part-trigger">
                                                        <div class="form-group">
                                                            <label for="introduction"><strong>Introduction</strong> <em
                                                                    class="emText">limited to 300 words:</em></label>
                                                            <div class="form-group">
                                                                <span style="color: red;" id="intro-error"
                                                                    class="error"></span>
                                                                <textarea style="height: 300px" name="introduction" id="introduction" class="form-control" maxlength="300"
                                                                    placeholder="Type or paste your introduction here..."></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="diagnosis"><strong>Diagnosis</strong> <em
                                                                    class="emText">limited to 300 words:</em></label>
                                                            <div class="form-group">
                                                                <span style="color: red;" id="diagnosis-error"
                                                                    class="error"></span>
                                                                <textarea name="diagnosis" id="diagnosis" class="form-control" maxlength="300"
                                                                    placeholder="Type or paste your diagnosis here..." style="height: 300px"></textarea>
                                                            </div>
                                                        </div>
                                                        <button type="button" class="btn btn-primary"
                                                            onclick="stepper.previous()"><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor"
                                                                class="bi bi-arrow-left" viewBox="0 0 16 16">
                                                                <path fill-rule="evenodd"
                                                                    d="M11.354 4.646a.5.5 0 0 1 0 .708L8.707 8l2.647 2.646a.5.5 0 1 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 0 1 .708 0z" />
                                                                <path fill-rule="evenodd"
                                                                    d="M5 8a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1H5.5A.5.5 0 0 1 5 8z" />
                                                            </svg> Previous</button>

                                                        <button type="button" id="clinicalNext3"
                                                            onclick="validateIntroDiagnosis()" class="btn btn-primary"
                                                            onclick="stepper.next()">Next <svg
                                                                xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor"
                                                                class="bi bi-arrow-right" viewBox="0 0 16 16">
                                                                <path fill-rule="evenodd"
                                                                    d="M4.646 11.354a.5.5 0 0 1 0-.708L7.293 8 4.646 5.354a.5.5 0 0 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0z" />
                                                                <path fill-rule="evenodd"
                                                                    d="M9 8a.5.5 0 0 0-.5-.5H3a.5.5 0 0 0 0 1h5.5A.5.5 0 0 0 9 8z" />
                                                            </svg></button>
                                                    </div>

                                                    <div id="treatmentDiscussion-part" class="content" role="tabpanel"
                                                        aria-labelledby="treatmentDiscussion-part-trigger">
                                                        <div class="form-group">
                                                            <label for="treatment"><strong>Treatment</strong></label>
                                                            <div class="form-group">
                                                                <span style="color: red;" id="treatment-error"
                                                                    class="error"></span>
                                                                <textarea name="treatment" id="treatment" class="form-control" maxlength="300"
                                                                    placeholder="Type or paste your treatment here..." style="height: 300px"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="discussion"><strong>Discussion</strong></label>
                                                            <div class="form-group">
                                                                <span style="color: red;" id="discussion-error"
                                                                    class="error"></span>
                                                                <textarea name="discussion" id="discussion" class="form-control" maxlength="300"
                                                                    placeholder="Type or paste your discussion here..." style="height: 300px"></textarea>
                                                            </div>
                                                        </div>
                                                        <button type="button" class="btn btn-primary"
                                                            onclick="stepper.previous()"><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor"
                                                                class="bi bi-arrow-left" viewBox="0 0 16 16">
                                                                <path fill-rule="evenodd"
                                                                    d="M11.354 4.646a.5.5 0 0 1 0 .708L8.707 8l2.647 2.646a.5.5 0 1 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 0 1 .708 0z" />
                                                                <path fill-rule="evenodd"
                                                                    d="M5 8a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1H5.5A.5.5 0 0 1 5 8z" />
                                                            </svg> Previous</button>

                                                        <button type="button" id="clinicalNext4"
                                                            onclick="validateTreatmentDiscussion()"
                                                            class="btn btn-primary" onclick="stepper.next()">Next <svg
                                                                xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor"
                                                                class="bi bi-arrow-right" viewBox="0 0 16 16">
                                                                <path fill-rule="evenodd"
                                                                    d="M4.646 11.354a.5.5 0 0 1 0-.708L7.293 8 4.646 5.354a.5.5 0 0 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0z" />
                                                                <path fill-rule="evenodd"
                                                                    d="M9 8a.5.5 0 0 0-.5-.5H3a.5.5 0 0 0 0 1h5.5A.5.5 0 0 0 9 8z" />
                                                            </svg></button>
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
                                                                id="affirmation" name="affirmation" required><br>
                                                            <label class="form-check-label" for="affirmation"><strong>I
                                                                    Agree</strong>
                                                            </label>
                                                            <p>* You may proceed to the next step but the system will not
                                                                let
                                                                you complete your submission without entering mandatory
                                                                information.</p>
                                                        </div>

                                                        <button type="button" class="btn btn-primary"
                                                            onclick="stepper.previous()"><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor"
                                                                class="bi bi-arrow-left" viewBox="0 0 16 16">
                                                                <path fill-rule="evenodd"
                                                                    d="M11.354 4.646a.5.5 0 0 1 0 .708L8.707 8l2.647 2.646a.5.5 0 1 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 0 1 .708 0z" />
                                                                <path fill-rule="evenodd"
                                                                    d="M5 8a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1H5.5A.5.5 0 0 1 5 8z" />
                                                            </svg> Previous</button>

                                                        <button type="button" class="btn btn-primary"
                                                            onclick="stepper.next()">Next <svg
                                                                xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor"
                                                                class="bi bi-arrow-right" viewBox="0 0 16 16">
                                                                <path fill-rule="evenodd"
                                                                    d="M4.646 11.354a.5.5 0 0 1 0-.708L7.293 8 4.646 5.354a.5.5 0 0 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0z" />
                                                                <path fill-rule="evenodd"
                                                                    d="M9 8a.5.5 0 0 0-.5-.5H3a.5.5 0 0 0 0 1h5.5A.5.5 0 0 0 9 8z" />
                                                            </svg></button>
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

                                                        <button type="button" class="btn btn-primary"
                                                            onclick="stepper.previous()"><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor"
                                                                class="bi bi-arrow-left" viewBox="0 0 16 16">
                                                                <path fill-rule="evenodd"
                                                                    d="M11.354 4.646a.5.5 0 0 1 0 .708L8.707 8l2.647 2.646a.5.5 0 1 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 0 1 .708 0z" />
                                                                <path fill-rule="evenodd"
                                                                    d="M5 8a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1H5.5A.5.5 0 0 1 5 8z" />
                                                            </svg> Previous</button>

                                                        <button type="button" id="preview-button"
                                                            class="btn btn-primary" onclick="stepper.next()">Next <svg
                                                                xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor"
                                                                class="bi bi-arrow-right" viewBox="0 0 16 16">
                                                                <path fill-rule="evenodd"
                                                                    d="M4.646 11.354a.5.5 0 0 1 0-.708L7.293 8 4.646 5.354a.5.5 0 0 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0z" />
                                                                <path fill-rule="evenodd"
                                                                    d="M9 8a.5.5 0 0 0-.5-.5H3a.5.5 0 0 0 0 1h5.5A.5.5 0 0 0 9 8z" />
                                                            </svg></button>
                                                    </div>

                                                    <div id="previewfinish-part" class="content" role="tabpanel"
                                                        aria-labelledby="previewfinish-part-trigger">

                                                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                                            <table class="table table-bordered">
                                                                <thead
                                                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                                    <tr>
                                                                        <th scope="col" class="px-6 py-3">title</th>
                                                                        <th scope="col" class="px-6 py-3">Authors</th>
                                                                        <th scope="col" class="px-6 py-3">Topic</th>
                                                                        <th scope="col" class="px-6 py-3">Keywords</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr id="previewClinicalCase"></tr>
                                                                </tbody>
                                                            </table>
                                                        </div><br>

                                                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                                            <table class="table table-bordered">
                                                                <thead
                                                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                                    <tr>
                                                                        <th scope="col" class="px-6 py-3">Introduction
                                                                        </th>
                                                                        <th scope="col" class="px-6 py-3">Diagnosis
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr id="previewClinicalCase1"></tr>
                                                                </tbody>
                                                            </table>
                                                        </div><br>

                                                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                                            <table class="table table-bordered">
                                                                <thead
                                                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                                    <tr>
                                                                        <th scope="col" class="px-6 py-3">Treatment
                                                                        </th>
                                                                        <th scope="col" class="px-6 py-3">Discussion
                                                                        </th>
                                                                        <th scope="col" class="px-6 py-3">Disclosure
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr id="previewClinicalCase2"></tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <br><br>

                                                        <button type="button" class="btn btn-primary"
                                                            onclick="stepper.previous()"><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor"
                                                                class="bi bi-arrow-left" viewBox="0 0 16 16">
                                                                <path fill-rule="evenodd"
                                                                    d="M11.354 4.646a.5.5 0 0 1 0 .708L8.707 8l2.647 2.646a.5.5 0 1 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 0 1 .708 0z" />
                                                                <path fill-rule="evenodd"
                                                                    d="M5 8a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1H5.5A.5.5 0 0 1 5 8z" />
                                                            </svg> Previous</button>

                                                        <input type="hidden" name="author_id" id="author-id"
                                                            value="">
                                                        <div class="text-center">
                                                            <button type="submit" class="btn btn-success rounded-5">Submit Abstract</button>
                                                        </div>
                                                    </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card -->
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="{{ asset('assets/js/researchclinical.js') }}"></script>
    <script src="{{ asset('assets/js/clinicalValidate.js') }}"></script>

    <script>
        // BS-Stepper Init
        document.addEventListener('DOMContentLoaded', function() {
            window.stepper = new Stepper(document.querySelector('.bs-stepper'))
        })
    </script>



@endsection
