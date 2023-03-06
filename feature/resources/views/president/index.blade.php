<x-app-layout>
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
                    {{ __("POSTERS :") }}<br><br>
                    <table class="w-full whitespace-no-wrapw-full whitespace-no-wrap">
                        <thead>
                            <tr class="text-center font-bold">
                                <td class="border px-6 py-4">Tracking Number</td>
                                <td class="border px-6 py-4">Summary</td>
                                <td class="border px-6 py-4">User Name</td>
                                <td class="border px-6 py-4">Action</td>
                            </tr>
                        </thead>
                        @forelse ($posters as $poster)
                            <tr>
                                <td class="border px-6 py-4">{{ $poster->tracking_code }}</td>
                                <td class="border px-6 py-4">{{ $poster->summary }}</td>
                                <td class="border px-6 py-4">{{ $poster->personne->user->nom }} {{ $poster->personne->user->prenom }}</td>

                                {{-- @if ($poster->evaluation && !empty($poster->evaluation->status == "Modify")) --}}
                                @if ($poster->evaluation && $poster->evaluation->status == "Modify" && $poster->updated_at == $poster->created_at)
                                    <td class="border px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <span>Should be modify - {{ $poster->evaluation->status }}</span>

                                        <div class="flex justify-between">
                                        <a href="{{ route('getPoster', $poster->id) }}" class="text-blue-600 hover:text-blue-900 flex items-center space-x-2">
                                            <i class="fas fa-eye"></i>
                                            <span>View</span>
                                        </a>
                                        <a href="{{ route('deletePoster', $poster->id) }}" class="text-red-600 hover:text-red-900 flex items-center space-x-2 flex-shrink-0">
                                            <i class="fas fa-trash"></i>
                                            <span>Delete</span>
                                        </a>
                                        </div>
                                    </td>

                                @elseif (!empty($poster->evaluation) && $poster->evaluation->status != "Modify")
                                    <td class="border px-6 py-4">
                                        <span>Poster aleready evaluated - {{ $poster->evaluation->status }}</span>
                                    </td>

                                @else
                                    <td class="border px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        @if ($poster->evaluation)
                                            <span>Poster modified</span>
                                        @endif
                                        <div class="flex justify-between">
                                        <a href="{{ route('getPoster', $poster->id) }}" class="text-blue-600 hover:text-blue-900 flex items-center space-x-2">
                                            <i class="fas fa-eye"></i>
                                            <span>View</span>
                                        </a>
                                        <a href="#" class="ml-4 text-green-600 hover:text-green-900">
                                            <i class="fas fa-check"></i>
                                            Approve
                                        </a>
                                        <a href="{{ route('deletePoster', $poster->id) }}" class="text-red-600 hover:text-red-900 flex items-center space-x-2 flex-shrink-0">
                                            <i class="fas fa-trash"></i>
                                            <span>Delete</span>
                                        </a>
                                        </div>
                                    </td>
                                @endif

                            </tr>
                        @empty
                        <td class="border px-6 py-4 text-center" colspan="4" rowspan="4">
                            <span>No posters submitted yet !</span>
                        </td>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
