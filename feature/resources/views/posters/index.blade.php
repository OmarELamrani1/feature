<x-app-layout>
    @section('title', 'Poster')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tracking CODE : {{ $poster->tracking_code }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="container">
                        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                            <div class="panel panel-info" >
                                <div class="panel-heading">
                                    <div class="panel-title">Summary : {{ $poster->summary }}</div>
                                </div>

                                <div style="padding-top:30px" class="panel-body" >
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
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div><br><br>

        </div>
    </div>
</x-app-layout>
