<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tracking CODE : {{ $checkStatus->poster->tracking_code }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @if ($checkStatus->status == "Approuved" || $checkStatus->status == "Rejected")
                        <div class="panel-heading">
                            {{-- <div class="panel-title">Tracking CODE : {{ $checkStatus->poster->tracking_code }}</div> --}}
                            <div class="panel-title">Status : {{ $checkStatus->status }}</div>
                        </div>
                    @endif

                @if ($checkStatus->status == "Modify")
                    <div class="container">
                        <div id="loginbox" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                            <div class="panel-heading">
                                <div class="panel-title">Status : {{ $checkStatus->status }}</div><br>
                                {{-- <div class="panel-title" style="float:right; position: relative; top:-20px">Status : {{ $checkStatus->status }}</div> --}}
                            </div>

                            <form class="form-horizontal" action="{{ route('posters.update', $checkStatus->poster->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div style="margin-bottom: 25px" class="input-group">
                                    <img class="img-thumbnail w-100 p-3" src="{{ Storage::url($checkStatus->poster->path) }}" alt="POSTER">
                                    <input type="file" class="form-control-plaintext mt-3" value="{{ $checkStatus->poster->path }}"name="path" id="path">
                                </div>

                                <div style="margin-bottom: 25px" class="input-group">
                                    <label for="summary" class="sr-only">Summary : </label>
                                    <input type="summary" class="form-control" value="{{ $checkStatus->poster->summary }}"name="summary" id="summary" placeholder="summary">
                                </div>

                                    <button type="submit" class="btn btn-primary mb-2 bg-primary">Confirm</button>
                            </form>

                        </div>
                    </div>
                @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
