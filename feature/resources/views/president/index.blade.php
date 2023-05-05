<x-app-layout>
    @section('title', 'President')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ Auth::user()->role }}
        </h2>
    </x-slot>

    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.16/tailwind.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    </head>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @if (session('deletedAbstract'))
                        <div class="alert alert-danger">
                            {{ session('deletedAbstract') }}
                        </div>
                    @endif

                    {{ __('ABSTRACT SUBMISSIONS :') }}<br><br>
                    <table class="w-full whitespace-no-wrapw-full whitespace-no-wrap">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif


                        <thead>
                            <tr class="text-center font-bold">
                                <td class="border px-6 py-4">Tracking Number</td>
                                <td class="border px-6 py-4">Title</td>
                                <td class="border px-6 py-4">President</td>
                                <td class="border px-6 py-4">Action</td>
                            </tr>
                        </thead>
                        @forelse ($abstractsubmissions as $abstractsubmission)
                            <tr>
                                <td class="border px-6 py-4">{{ $abstractsubmission->tracking_code }}</td>
                                <td class="border px-6 py-4">{{ $abstractsubmission->title }}</td>

                                <td class="border px-6 py-4">
                                    @if ($abstractsubmission->president_id == NULL)
                                        <form action="{{ route('abstractsubmission.update', $abstractsubmission->id) }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <select class="form-control" name="president_id" id="president_id">
                                                <option value="choose" selected disabled>Assign evaluation to :</option>
                                                @foreach ($presidents as $president)
                                                        <option value="{{ $president->id }}">{{ $president->user->nom }} {{ $president->user->prenom }}</option>
                                                @endforeach
                                            </select>

                                            <button type="submit" class="mt-2 text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 rounded-lg text-sm px-4 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Assign</button>
                                        </form>
                                    @else
                                        Assigned to : {{ $abstractsubmission->president->user->nom }} {{ $abstractsubmission->president->user->prenom }}
                                    @endif

                                </td>

                            @can('president')
                                @if ($abstractsubmission->evaluation && $abstractsubmission->evaluation->status == 'Modify' && $abstractsubmission->modified == false)
                                    <td class="border px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <span>Abstract Evaluated: Modification Needed

                                            <a href="{{ route('deleteAbstract', $abstractsubmission->id) }}"
                                                class="text-red-600 hover:text-red-900 inline-flex float-right space-x-2 flex-shrink-0">
                                                <i class="fas fa-trash"></i>
                                                <span>Delete</span>
                                            </a>
                                        </span>
                                    </td>
                                @elseif (!empty($abstractsubmission->evaluation) && $abstractsubmission->evaluation->status != 'Modify')
                                    <td class="border px-6 py-4">
                                        <span>Abstract already evaluated - {{ $abstractsubmission->evaluation->status }}

                                            @if ($abstractsubmission->president_id == auth()->user()->presidents->id)
                                                <a href="{{ route('deleteAbstract', $abstractsubmission->id) }}"
                                                    class="text-red-500 hover:text-red-900 inline-flex float-right space-x-2 flex-shrink-0">
                                                    <i class="fas fa-trash"></i>
                                                    <span>Delete</span>
                                                </a>
                                            @endif
                                        </span>
                                    </td>

                                @elseif (empty($abstractsubmission->evaluation->status) && $abstractsubmission->president_id != NULL && $abstractsubmission->president_id == auth()->user()->presidents->id)
                                    <td class="border px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <div class="flex justify-between">
                                            <a href="{{ route('getAbstract', $abstractsubmission->id) }}"
                                                class="text-blue-600 hover:text-blue-900 flex items-center space-x-2">
                                                <i class="fas fa-eye"></i>
                                                <span>View</span>
                                            </a>
                                            <a href="{{ route('deleteAbstract', $abstractsubmission->id) }}"
                                                class="text-red-600 hover:text-red-900 flex items-center space-x-2 flex-shrink-0">
                                                <i class="fas fa-trash"></i>
                                                <span>Delete</span>
                                            </a>
                                        </div>
                                    </td>
                                @else
                                    <td class="border px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        @if ($abstractsubmission->updated_at != $abstractsubmission->created_at)
                                            <span>Abstract modified</span><br>
                                            <a href="{{ route('getAbstract', $abstractsubmission->id) }}"
                                                class="text-blue-600 hover:text-blue-900 flex items-center space-x-2">
                                                <i class="fas fa-eye"></i>
                                                <span>View</span>
                                            </a>
                                        @elseif ($abstractsubmission->president_id == NULL)
                                            Abstract should be assigned to a president to evaluate
                                        @else
                                            Processing...
                                        @endif
                                    </td>
                                @endif
                            @endcan

                            @can('action')
                                <td class="border px-6 py-4 whitespace-nowrap text-sm font-medium">

                                    <div class="flex justify-between">

                                        <a href="{{ optional($abstractsubmission)->id ? route('abstractsubmission.show', $abstractsubmission->id) : '#' }}"
                                            title="View"><i class="fa fa-eye" aria-hidden="true"></i>View</a>

                                        <a href="{{ route('deleteAbstract', $abstractsubmission->id) }}"
                                            class="text-red-600 hover:text-red-900 flex items-center space-x-2 flex-shrink-0">
                                            <i class="fas fa-trash"></i>
                                            <span>Delete</span>
                                        </a>
                                    </div>


                                </td>
                            @endcan

                            </tr>
                        @empty
                            <td class="border px-6 py-4 text-center" colspan="4" rowspan="4">
                                <span>No Abstracts submitted yet !</span>
                            </td>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
