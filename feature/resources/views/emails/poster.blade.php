<div>
    Tracking CODE : {{ $abstractsubmission->tracking_code }} <br><br>

    Summary : {{ $abstractsubmission->title }} <br><br>

    <h4>
        <a href="{{ route('getPoster', $abstractsubmission->id) }}">View Abstract</a>
    </h4>

</div>
