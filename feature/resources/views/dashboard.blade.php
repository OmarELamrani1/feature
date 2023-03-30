<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

<head>
    <title>Publication Submission</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <link rel="stylesheet" href="{{ asset('assets/css/layout.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dash.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
</head>

<body>

    <div id="master">

        <div id="logged">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <img class="profile-photo" src="{{ asset('assets/images/logo1.png') }}"
                alt="{{ asset('assets/images/logo1.png') }}" />
                <x-responsive-nav-link :href="route('logout')"
                    onclick="event.preventDefault();
                                        this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-responsive-nav-link>
            </form>
        </div>

        <div class="space-x-8 sm:-my-px sm:ml-10 sm:flex" id="topnav">

            <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                {{ __('Home') }}
            </x-nav-link>

            <x-nav-link :href="route('check')" :active="request()->routeIs('check')">
                {{ __('Dashboard') }}
            </x-nav-link>

            <x-responsive-nav-link :href="route('profile.edit')">
                {{ __('Profile') }}
            </x-responsive-nav-link>

        </div>

        <div id="content" class="user-content">

            <form name="overview_form" method="POST" action="https://cpaper.ctimeetingtech.com/wsava23/submission">

                <input type="hidden" id="publication_id" name="publication_id" />
                <input type="hidden" id="action" name="action" />

                <div>

                    <h1>
                        <p>My abstracts</p>
                        <p style="color:red">If you re-open your abstract, please make sure to check all authors
                            affiliations are correct as well as all answered questions are completed before
                            re-submitting</p>
                    </h1>

                    @php
                    $hasSubmittedAbstract = false;
                        if (auth()->user()->personnes != null) {
                            $hasSubmittedAbstract = auth()->user()->personnes->abstractsubmission !== null;
                        }
    // $hasSubmittedAbstract = auth()->user()->personnes->abstractsubmission !== null;
@endphp

@if ($abstractsubmissions && $abstractsubmissions->evaluation)
    <a href="{{ route('checkStatus') }}">Check Status</a>
@elseif ($hasSubmittedAbstract)
    <p>You have already submitted an abstract</p>
@else
    <a href="{{ route('researchPaper') }}"><button type="button" class="btn btn-primary"
            style="margin: 10px 0;">Submit a new
            abstract (Research Paper)</button></a>
    <a href="{{ route('clinicalCase') }}"><button type="button" class="btn btn-primary"
            style="margin: 10px 0;">Submit a new
            abstract (Clinical case)</button></a>
@endif

                    {{-- @php
                        $hasSubmittedPoster = false;
                        if (auth()->user()->personnes != null) {
                            $hasSubmittedPoster = auth()->user()->personnes->abstractsubmission !== null;
                        }
                    @endphp

                    @if (!empty($evaluation->status))
                        <a href="{{ route('checkStatus') }}">Check Status</a>
                    @elseif ($hasSubmittedPoster)
                        <p>You have already submitted an abstract</p>
                    @else
                        <a href="{{ route('researchPaper') }}"><button type="button" class="btn btn-primary"
                                style="margin: 10px 0;">Submit a new abstract (Research Paper)</button></a>
                        <a href="{{ route('clinicalCase') }}"><button type="button" class="btn btn-primary"
                                style="margin: 10px 0;">Submit a new abstract (Clinical case)</button></a>
                    @endif --}}



                    {{-- @php
                        $hasSubmittedPoster = auth()->user()->personnes->contains(function ($personne) {
                            return $personne->abstractsubmission !== null;
                        });
                    @endphp

                    @if (!empty($evaluation->status))
                        <a href="{{ route('checkStatus') }}">Check Status</a>

                    @elseif ($hasSubmittedPoster)
                        <p>You have already submitted a Abstract</p>

                    @else
                        <a href="{{ route('researchPaper') }}"><button type="button" class="btn btn-primary"
                                style="margin: 10px 0;">Submit a new
                                abstract (Research Paper)</button></a>
                        <a href="{{ route('clinicalCase') }}"><button type="button" class="btn btn-primary"
                                style="margin: 10px 0;">Submit a new
                                abstract (Clinical case)</button></a>
                    @endif --}}

                    {{-- @if ($hasSubmittedAbstract) --}}

                    <div style="">

                        <div>
                            <span>
                                <h3>Submitted (3)</h3>
                            </span>
                        </div>
                        <div>
                            <div>
                                {{-- @forelse ($abstractsubmissions as $abstractsubmission) --}}
                                    <table cellpadding="0" class="abstract_box">
                                        <tr>
                                            <td class="publication_id">
                                                #{{ $abstractsubmissions->id ?? NULL}}
                                            </td>
                                            <td class="abstract_box_title">{{ $abstractsubmissions->title ?? NULL}}</td>
                                            <td rowspan="2" class="action_btn">
                                                <a href="{{ optional($abstractsubmissions)->id ? route('abstractsubmission.show', $abstractsubmissions->id) : '#' }}" title="View"><i class="fa fa-eye" aria-hidden="true"></i></a>

                                                {{-- <a href="{{ route('abstractsubmission.show', $abstractsubmissions->id) }}"
                                                    title="View"><i class="fa fa-eye" aria-hidden="true"></i></a> --}}
                                                <a href="#" title="Delete"><i class="fa fa-trash"
                                                        aria-hidden="true"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>
                                                <span class="abstract_box_tag">Submitted:</span>
                                                {{ $abstractsubmissions->created_at ?? NULL}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>
                                                <span class="abstract_box_tag">Topic:</span>
                                                {{ $abstractsubmissions->topic->name ?? NULL}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>
                                                <span class="abstract_box_tag">Type:</span>
                                                {{ $abstractsubmissions->type ?? NULL}}
                                            </td>
                                        </tr>
                                    </table>
                                {{-- @empty --}}
                                    {{-- <p>Null</p> --}}
                                {{-- @endforelse --}}




                            </div>
                        </div><br />
                    </div>
                    {{-- @endif --}}


                </div>
                <div style="clear:both"><br clear="all" /></div>

            </form>
        </div>
    </div>
    <div id="footer">
        <div class="footer">
            <p style="text-align:center;">WSAVA {{ date('Y') }}. All rights reserved.</p>
        </div>
    </div>

</body>

</html>
