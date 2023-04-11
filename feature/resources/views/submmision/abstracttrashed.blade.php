<x-app-layout>
    @section('title', 'Abstracts Trashed')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ Auth::user()->role }}
        </h2>
    </x-slot>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.16/tailwind.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="{{ asset('assets/css/flowbite.min.css') }}" rel="stylesheet" type="text/css">
        <script src="{{ asset('assets/js/flowbite.min.js') }}"></script>
    </head>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Abstracts REMOVED :") }}<br><br>

                    <table class="w-full whitespace-no-wrapw-full whitespace-no-wrap">
                        <thead>
                            <tr class="text-center font-bold">
                                <td class="border px-6 py-4">Title & Code</td>
                                <td class="border px-6 py-4">Type</td>
                                <td class="border px-6 py-4">Topic</td>
                                <td class="border px-6 py-4">Action</td>
                            </tr>
                        </thead>
                        @forelse ($abstractsubmissions as $abstractsubmission)
                            <tr>

                                @if ($abstractsubmission->deleted_at)
                                    <td class="border px-6 py-4">
                                        <center>
                                            <p>
                                                {{ $abstractsubmission->title }}
                                            </p>
                                            Tracking CODE : <strong>{{ $abstractsubmission->tracking_code }}</strong>
                                        </center>

                                    </td>
                                    <td class="border px-6 py-4">{{ $abstractsubmission->type }}</td>
                                    <td class="border px-6 py-4">{{ $abstractsubmission->topic->name }}</td>
                                    <td class="border px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <div class="flex">
                                            <form action="{{ url('/abstract/' . $abstractsubmission->id . '/restore') }}"
                                                method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <x-success-button x-data="">
                                                    {{ __('Restore') }}
                                                </x-success-button>
                                            </form>


                                            <x-danger-button
                                                data-modal-target="deleteabstractsubmissionDefinitly_{{ $abstractsubmission->id }}"
                                                data-modal-toggle="deleteabstractsubmissionDefinitly_{{ $abstractsubmission->id }}">
                                                {{ __('Delete definitely') }}
                                            </x-danger-button>


                                            <form action="{{ url('/abstract/' . $abstractsubmission->id . '/forceDelete') }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div id="deleteabstractsubmissionDefinitly_{{ $abstractsubmission->id }}"
                                                    tabindex="-1"
                                                    class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                                                    <div class="relative w-full h-full max-w-md md:h-auto">
                                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                            <button type="button"
                                                                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                                                data-modal-hide="deleteabstractsubmissionDefinitly_{{ $abstractsubmission->id }}">
                                                                <svg aria-hidden="true" class="w-5 h-5"
                                                                    fill="currentColor" viewBox="0 0 20 20"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path fill-rule="evenodd"
                                                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                                        clip-rule="evenodd"></path>
                                                                </svg>
                                                                <span class="sr-only">Close modal</span>
                                                            </button>
                                                            <div class="p-6 text-center">
                                                                <svg aria-hidden="true"
                                                                    class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200"
                                                                    fill="none" stroke="currentColor"
                                                                    viewBox="0 0 24 24"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2"
                                                                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                                                    </path>
                                                                </svg>
                                                                <h3
                                                                    class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                                                                    Are you sure you want to delete this Abstract :
                                                                    <br>CODE : {{ $abstractsubmission->tracking_code }} ?</h3>
                                                                <button data-modal-hide="deleteabstractsubmissionDefinitly_{{ $abstractsubmission->id }}"
                                                                    type="submit"
                                                                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                                    Yes, I'm sure
                                                                </button>
                                                                <button data-modal-hide="deleteabstractsubmissionDefinitly_{{ $abstractsubmission->id }}"
                                                                    type="button"
                                                                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                                                                    cancel</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </td>
                                @endif
                            </tr>
                        @empty
                            <td class="border px-6 py-4 text-center" colspan="4" rowspan="4">
                                <span>No Abstract found yet !</span>
                            </td>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
