<x-app-layout>
    @section('title', 'poster')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ Auth::user()->role }}
        </h2>
    </x-slot>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.16/tailwind.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
    </head>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("POSTERS REMOVED :") }}<br><br>
                    <table class="w-full whitespace-no-wrapw-full whitespace-no-wrap">
                        <thead>
                            <tr class="text-center font-bold">
                                <td class="border px-6 py-4">Code & Poster</td>
                                <td class="border px-6 py-4">Action</td>
                            </tr>
                        </thead>
                        @forelse ($posters as $poster)
                            <tr>

                                @if ($poster->deleted_at)
                                    <td class="border px-6 py-4">

                                        Tracking CODE : {{ $poster->tracking_code }}
                                        @php
                                            $extension = pathinfo($poster->path, PATHINFO_EXTENSION);
                                        @endphp

                                        @if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'svg']))
                                            <div class="flex">
                                                <img class="poster w-50 ml-auto mr-auto" src="{{ Storage::url($poster->path) }}" alt="POSTER">
                                            </div>

                                        @elseif (in_array($extension, ['doc', 'docx', 'pdf']))
                                            <div class="flex text-center">
                                                <a href="{{ Storage::url($poster->path) }}" target="_blank" rel="noopener noreferrer">
                                                    <button class="btn btn-info">Show {{ strtoupper($extension) }}</button>
                                                </a>
                                            </div>

                                        @else
                                            <p>Invalid file type: {{ $extension }}</p>
                                        @endif

                                    </td>
                                    <td class="border px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <div class="flex">
                                            <form action="{{ url('/poster/' . $poster->id . '/restore') }}"
                                                method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <x-success-button x-data="">
                                                    {{ __('Restore') }}
                                                </x-success-button>
                                            </form>


                                            <x-danger-button
                                                data-modal-target="deletePosterDefinitly_{{ $poster->id }}"
                                                data-modal-toggle="deletePosterDefinitly_{{ $poster->id }}">
                                                {{ __('Delete definitely') }}
                                            </x-danger-button>


                                            <form action="{{ url('/poster/' . $poster->id . '/forceDelete') }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div id="deletePosterDefinitly_{{ $poster->id }}"
                                                    tabindex="-1"
                                                    class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                                                    <div class="relative w-full h-full max-w-md md:h-auto">
                                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                            <button type="button"
                                                                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                                                data-modal-hide="deletePosterDefinitly_{{ $poster->id }}">
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
                                                                    Are you sure you want to delete this Poster :
                                                                    <br>{{ $poster->tracking_code }} ?</h3>
                                                                <button data-modal-hide="deletePosterDefinitly_{{ $poster->id }}"
                                                                    type="submit"
                                                                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                                    Yes, I'm sure
                                                                </button>
                                                                <button data-modal-hide="deletePosterDefinitly_{{ $poster->id }}"
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
                                <span>No poster found yet !</span>
                            </td>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
