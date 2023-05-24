@component('mail::message')
# Abstract submitted

Dear,

An abstract has been submitted and requires evaluation. Here are the details:

**Number:**  #{{ $abstractsubmission->id }} <br>
**Tracking CODE:**  {{ $abstractsubmission->tracking_code }}

@component('mail::button', ['url' => route('getAbstract', $abstractsubmission->id)])
To view the abstract submitted, please click here.
@endcomponent

Thanks.
@endcomponent



