<div>
    <p>Dear {{ $abstractsubmissionSuccess->personne->user->nom }},</p>

    <p>
        Thank you very much for your Abstract Submission System.
        <br>
        Your Abstract has been successfully submitted.
    </p>

    <p>Abstract #: {{ $abstractsubmissionSuccess->id }}</p>

    <p>Tracking CODE : {{ $abstractsubmissionSuccess->tracking_code }}</p>

    <p>Abstract Title: {{ $abstractsubmissionSuccess->title }}</p>

    <p>Abstract Topic: {{ $abstractsubmissionSuccess->topic->name }}</p>

    <p>*To view your submitted abstract, please <a href="{{ route('abstractsubmission.show', $abstractsubmissionSuccess->id) }}">click here.</a></p>

    Kind Regards,
    This email is automatically generated on behalf of  WSAVA 2023.
    For further information regarding the content of this email please contact abstracts@meavc.com
</div>
