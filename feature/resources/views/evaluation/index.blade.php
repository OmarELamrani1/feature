<x-app-layout>
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
                                        {{-- <div class="panel-title" style="float:right; position: relative; top:-20px">Summary : {{ $poster->summary }}</div> --}}
                                    </div>

                                    <div style="padding-top:30px" class="panel-body" >

                                        <img class="img-thumbnail w-100 p-3" src="{{ Storage::url($poster->path) }}" alt="POSTER">

                                        <br><br><br>

                                        <form action="{{ $request->isMethod('put') ? route('evaluation.update', $poster->evaluation->id) : route('evaluation.store')  }}" method="post">
                                            @csrf

                                            <select name="status" class="form-select w-100 p-3" aria-label="Default select example">
                                                <option disabled selected>Evaluation : </option>
                                                <option name="status" value="Approuved">Approuved</option>
                                                <option name="status" value="Modify">Modify</option>
                                                <option name="status" value="Rejected">Rejected</option>
                                            </select><br>

                                            <input type="hidden" name="poster_id" value="{{ $poster->id }}">

                                            <div class="text-center">
                                                <button type="submit" class="btn btn-success bg-success">Submit</button>
                                            </div>

                                        </form>

                                    </div>
                                </div>
                        </div>
                    </div>

                </div>
            </div><br><br>

        </div>
    </div>
</x-app-layout>
