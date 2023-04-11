<!DOCTYPE html>
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
                    <h1>
                        <p>My abstracts</p>
                    </h1>

                    @php
                        $hasSubmittedAbstract = false;
                        if (auth()->user()->personnes != null) {
                            $hasSubmittedAbstract = auth()->user()->personnes->abstractsubmission !== null;
                        }
                        // $hasSubmittedAbstract = auth()->user()->personnes->abstractsubmission !== null;
                    @endphp

                    @if ($abstractsubmissions && $abstractsubmissions->evaluation && $abstractsubmissions->updated_at == $abstractsubmissions->created_at)
                        <a href="{{ route('checkStatus') }}">
                            <h1>
                                <p style="color:red">Check Status</p>
                            </h1>
                        </a>

                    @elseif($hasSubmittedAbstract && empty($abstractsubmissions->evaluation->status))
                        <p>Processing...</p>

                    @elseif ( $abstractsubmissions  && $abstractsubmissions->evaluation->status == 'Modify' && $abstractsubmissions->updated_at != $abstractsubmissions->created_at)
                        <p>Abstract modified, wait for evaluation...</p>

                    @elseif ($abstractsubmissions && $abstractsubmissions->evaluation)
                        <a href="{{ route('checkStatus') }}">
                            <h1>
                                <p style="color:red">re-Check Status</p>
                            </h1>
                        </a>

                    @elseif ($hasSubmittedAbstract)
                        <h1>
                            <p style="color:red">You have already submitted an abstract</p>
                        </h1>
                    @else
                        <a href="{{ route('researchPaper') }}"><button type="button" class="btn btn-primary"
                                style="margin: 10px 0;">Submit a new
                                abstract (Research Paper)</button></a>
                        <a href="{{ route('clinicalCase') }}"><button type="button" class="btn btn-primary"
                                style="margin: 10px 0;">Submit a new
                                abstract (Clinical case)</button></a>
                    @endif

                    <div style="">

                        <div>
                            <span>
                                <h3>Abstract Submitted</h3>
                            </span>
                        </div>
                        <div>
                            <div>
                                {{-- @forelse ($abstractsubmissions as $abstractsubmission) --}}
                                <table cellpadding="0" class="abstract_box">
                                    <tr>
                                        <td class="publication_id">
                                            #{{ $abstractsubmissions->id ?? null }}
                                        </td>
                                        <td class="abstract_box_title">{{ $abstractsubmissions->title ?? null }}</td>
                                        <td rowspan="2" class="action_btn">
                                            <a href="{{ optional($abstractsubmissions)->id ? route('abstractsubmission.show', $abstractsubmissions->id) : '#' }}"
                                                title="View"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>
                                            <span class="abstract_box_tag">Submitted:</span>
                                            {{ $abstractsubmissions->created_at ?? null }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>
                                            <span class="abstract_box_tag">Topic:</span>
                                            {{ $abstractsubmissions->topic->name ?? null }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>
                                            <span class="abstract_box_tag">Type:</span>
                                            {{ $abstractsubmissions->type ?? null }}
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div><br />
                    </div>
        </div>
    </div>
    <div id="footer">
        <div class="footer">
            <p style="text-align:center;">WSAVA {{ date('Y') }}. All rights reserved.</p>
        </div>
    </div>

</body>

</html>
