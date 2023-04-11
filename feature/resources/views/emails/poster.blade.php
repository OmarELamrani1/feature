<div>
    <p>An abstract has been submitted</p>

    <p>Abstract #: {{ $abstractsubmission->id }}</p>

    <p>Tracking CODE : <strong>{{ $abstractsubmission->tracking_code }}</strong></p>

    <p>*To view the abstract submitted, please <a href="{{ route('getAbstract', $abstractsubmission->id) }}">click here.</a></p>
</div>
