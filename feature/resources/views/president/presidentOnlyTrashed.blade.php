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

                    <!-- Add President modal -->
                    <div id="addPresident" tabindex="-1" aria-hidden="true"
                        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                        <div class="relative w-full h-full max-w-md md:h-auto">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <button type="button"
                                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                    data-modal-hide="addPresident">
                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                                <div class="px-6 py-6 lg:px-8">
                                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Add new President
                                    </h3>
                                    <form class="space-y-6" action="{{ route('administrator.store') }}" method="POST">
                                        @csrf

                                        <div>
                                            <label for="nom"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last
                                                Name</label>
                                            <input type="text" name="nom" id="nom"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                placeholder="Your firstName..." required>
                                        </div>

                                        <div>
                                            <label for="prenom"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First
                                                Name</label>
                                            <input type="text" name="prenom" id="prenom"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                placeholder="Your lastName..." required>
                                        </div>

                                        <div>
                                            <label for="email"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                            <input type="email" name="email" id="email"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                placeholder="name@company.com" required>
                                        </div>
                                        <div>
                                            <label for="password"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                            <input type="password" name="password" id="password" placeholder="••••••••"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                required>
                                        </div>
                                        <button type="submit"
                                            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create
                                            President account</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                    {{ __('PRESIDENTS :') }}

                    <div class="panel-title" style="float:right; position: relative; top:-17px">
                        <!-- Modal toggle -->
                        <button data-modal-target="addPresident" data-modal-toggle="addPresident"
                            class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            type="button">
                            Add President <i class="fas fa-user-plus"></i>
                        </button>
                    </div>

                    <table class="w-full whitespace-no-wrapw-full whitespace-no-wrap">
                        <thead>
                            <tr class="text-center font-bold">
                                <td class="border px-6 py-4">Nom</td>
                                <td class="border px-6 py-4">Prenom</td>
                                <td class="border px-6 py-4">Email</td>
                                <td class="border px-6 py-4">Action</td>
                            </tr>
                        </thead>
                        @forelse ($presidents as $president)
                            <tr>

                                @if ($president->deleted_at)
                                    <td class="border px-6 py-4">{{ $president->nom }}</td>
                                    <td class="border px-6 py-4">{{ $president->prenom }}</td>
                                    <td class="border px-6 py-4">{{ $president->email }}</td>
                                    <td class="border px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <div class="flex justify-between">
                                            <form action="{{ url('/president/' . $president->id . '/restore') }}"
                                                method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <x-success-button x-data="">
                                                    {{ __('Restore') }}
                                                </x-success-button>
                                            </form>

                                            <x-danger-button
                                                data-modal-target="deletePresidentDefinitly_{{ $president->id }}"
                                                data-modal-toggle="deletePresidentDefinitly_{{ $president->id }}">
                                                {{ __('Delete definitely') }}
                                            </x-danger-button>


                                            <form action="{{ url('/president/' . $president->id . '/forceDelete') }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div id="deletePresidentDefinitly_{{ $president->id }}"
                                                    tabindex="-1"
                                                    class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                                                    <div class="relative w-full h-full max-w-md md:h-auto">
                                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                            <button type="button"
                                                                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                                                data-modal-hide="deletePresidentDefinitly_{{ $president->id }}">
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
                                                                    Are you sure you want to delete this Topic :
                                                                    <br>{{ $president->nom }} {{ $president->prenom }} ?</h3>
                                                                <button data-modal-hide="deletePresidentDefinitly_{{ $president->id }}"
                                                                    type="submit"
                                                                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                                    Yes, I'm sure
                                                                </button>
                                                                <button data-modal-hide="deletePresidentDefinitly_{{ $president->id }}"
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
                                @else
                                    <td class="border px-6 py-4">{{ $president->user->nom }}</td>
                                    <td class="border px-6 py-4">{{ $president->user->prenom }}</td>
                                    <td class="border px-6 py-4">{{ $president->user->email }}</td>

                                    <td class="border px-6 py-4 whitespace-nowrap text-sm font-medium">

                                        <x-danger-button
                                            data-modal-target="deletePresidentAccount_{{ $president->user->id }}"
                                            data-modal-toggle="deletePresidentAccount_{{ $president->user->id }}">
                                            {{ __('Delete President Account') }}
                                        </x-danger-button>

                                        <form action="{{ route('administrator.destroy', $president->user->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div id="deletePresidentAccount_{{ $president->user->id }}"
                                                tabindex="-1"
                                                class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                                                <div class="relative w-full h-full max-w-md md:h-auto">
                                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                        <button type="button"
                                                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                                            data-modal-hide="deletePresidentAccount_{{ $president->user->id }}">
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
                                                                Are you sure you want to delete this Account of :
                                                                <br>{{ $president->user->nom }}
                                                                {{ $president->user->prenom }}?</h3>
                                                            <button data-modal-hide="deletePresidentAccount_{{ $president->user->id }}"
                                                                type="submit"
                                                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                                Yes, I'm sure
                                                            </button>
                                                            <button data-modal-hide="deletePresidentAccount_{{ $president->user->id }}"
                                                                type="button"
                                                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                                                                cancel</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>

                                    </td>
                                @endif
                            </tr>
                        @empty
                            <td class="border px-6 py-4 text-center" colspan="4" rowspan="4">
                                <span>No president found yet !</span>
                            </td>
                        @endforelse
                        {{ $presidents->links() }}
                    </table>
                </div>
            </div><br><br>
        </div>
    </div>
</x-app-layout>
