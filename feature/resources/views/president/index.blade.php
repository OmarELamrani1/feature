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
                        <thead>
                            <tr class="text-center font-bold">
                                <td class="border px-6 py-4">Tracking Number</td>
                                <td class="border px-6 py-4">Title</td>
                                <td class="border px-6 py-4">Action</td>
                            </tr>
                        </thead>
                        @forelse ($abstractsubmissions as $abstractsubmission)
                            <tr>
                                <td class="border px-6 py-4">{{ $abstractsubmission->tracking_code }}</td>
                                <td class="border px-6 py-4">{{ $abstractsubmission->title }}</td>

                                @if ($abstractsubmission->evaluation && $abstractsubmission->evaluation->status == 'Modify' && $abstractsubmission->updated_at == $abstractsubmission->created_at)
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

                                            <a href="{{ route('deleteAbstract', $abstractsubmission->id) }}"
                                                class="text-red-500 hover:text-red-900 inline-flex float-right space-x-2 flex-shrink-0">
                                                <i class="fas fa-trash"></i>
                                                <span>Delete</span>
                                            </a>
                                        </span>
                                    </td>
                                @else
                                    <td class="border px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        @if ($abstractsubmission->evaluation)
                                            <span>Abstract modified</span>
                                        @endif
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
                                @endif

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
