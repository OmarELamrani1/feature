<div>
    Tracking CODE : {{ $poster->tracking_code }} <br><br>

    Summary : {{ $poster->summary }} <br><br>

    <h4>
        <a href="{{ route('getPoster', $poster->id) }}">View image</a>
    </h4>

    {{-- <a href="{{ $image_url }}">
        <img src="{{ $image_url }}" alt="Poster Image">
      </a> --}}

</div>
