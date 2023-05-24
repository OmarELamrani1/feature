@component('mail::message')
    # Confirmation of Abstract Submission

    Dear {{ $abstractsubmissionSuccess->personne->user->nom }},

    Thank you very much for your Abstract Submission System.
    Your Abstract has been successfully submitted.

    **Number:**  #{{ $abstractsubmissionSuccess->id }}<br>
    **Title:** {{ $abstractsubmissionSuccess->title }}<br>
    **Tracking CODE:**  {{ $abstractsubmissionSuccess->tracking_code }}<br>
    **Topic:**  {{ $abstractsubmissionSuccess->topic->name }}

    @component('mail::button', ['url' => route('abstractsubmission.show', $abstractsubmissionSuccess->id)])
    Click here to view your submitted abstract
    @endcomponent

    Kind Regards,
    This email is automatically generated on behalf of MEAVC 2023.
    For further information regarding the content of this email, please contact abstracts@meavc.com

    {{ config('app.name') }}
@endcomponent
