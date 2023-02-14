<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ Auth::user()->role }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @if (!empty($evaluation->status))
                        <a href="{{ route('checkStatus') }}">Check Status</a>
                    @else
                        {{ __("Submit your summary POSTER:") }}
                        @include('form')
                    @endif

                </div>
            </div><br><br>

        </div>
    </div>
</x-app-layout>
