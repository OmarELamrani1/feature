<!DOCTYPE html>
<html>

    <head>
        <title>Publication Submission</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

        <link rel="stylesheet" href="{{ asset('assets/css/layout.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/dash.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

        <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">

        <style>
            .preview-content img {
                max-width: 200px;
                max-height: 200px;
            }
        </style>
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

            <a href="{{ route('printsubmission', $abstractsubmission->id) }}" target="blank">
                <button>
                    <i class="fa fa-print" aria-hidden="true"></i>Print
                </button>
            </a>

            <table id="preview">
                <tr>
                    <td style="padding-bottom: 25px;">
                        <h1>#{{ $abstractsubmission->id }} {{ $abstractsubmission->title }}</h1>
                        <p><span id="76"><u>{{ $abstractsubmission->personne->user->nom }}
                                    {{ $abstractsubmission->personne->user->prenom }}</u></span></p>

                        <table>
                            <tr>
                                <td>
                                    Type : {{ $abstractsubmission->type }}
                                </td>
                            </tr>
                            <tr>
                                <td>Topic : {{ $abstractsubmission->topic->name }}</td>
                            </tr>

                            <tr>
                                <td>Authors:
                                    @if ($abstractsubmission->authorAbstractsubmission->isNotEmpty())
                                        @foreach ($abstractsubmission->authorAbstractsubmission as $authorAbstractsubmission)
                                            {{ $authorAbstractsubmission->authors->firstname }} {{ $authorAbstractsubmission->authors->lastname }},
                                        @endforeach
                                    @else
                                        There are no authors for this abstract.
                                    @endif
                                </td>
                            </tr>
                            
                        </table>
                    </td>
                </tr>

                <tr>
                    <td height="25px"></td>
                </tr>
                <tr>
                    <td class="preview-content-box">
                        <b>Clinical History & Presentation</b>
                        <div class="preview-content">
                            <p>{!! $abstractsubmission->introduction !!}</p>
                        </div>
                        <br style="clear: both;" />

                        @if ($abstractsubmission->type === 'Clinical Case')
                            <b>Physical Examination & Diagnostic Workup</b>
                            <div class="preview-content">
                                <p>{!! $abstractsubmission->diagnosis !!}</p>
                            </div>
                            <br style="clear: both;" />
                            <b>Treatment</b>
                            <div class="preview-content">
                                <p>{!! $abstractsubmission->treatment !!}</p>
                            </div>
                            <br style="clear: both;" />
                            <b>Discussion</b>
                            <div class="preview-content">
                                <p>{!! $abstractsubmission->discussion !!}</p>
                            </div>
                        @else
                            <b>Objectives</b>
                            <div class="preview-content">
                                <p>{!! $abstractsubmission->objective !!}</p>
                            </div>
                            <br style="clear: both;" />
                            <b>Methods</b>
                            <div class="preview-content">
                                <p>{!! $abstractsubmission->method !!}</p>
                            </div>
                            <br style="clear: both;" />
                            <b>Results</b>
                            <div class="preview-content">
                                <p>{!! $abstractsubmission->result !!}</p>
                            </div>
                            <br style="clear: both;" />
                            <b>Conclusions</b>
                            <div class="preview-content">
                                <p>{!! $abstractsubmission->conclusion !!}</p>
                            </div>
                        @endif
                        <br style="clear: both;" />

                        <span class="label">#{{ $abstractsubmission->keywords }}</span>


                    </td>
                </tr>
                <tr>
                    <td height="25px"></td>
                </tr>
                <tr>
                    <td>
                        <span id="affirmations-details">Affirmations</span>
                        <div class="preview-affirmations">
                            <!-- $Id$ -->
                            <table cellspacing="10">

                                <tr>
                                    <td valign="top">
                                        <p>
                                            1. I confirm that I have previewed this abstract and that all information is
                                            correct and in accordance to the abstract submission guidelines provided on
                                            the Congress website. I accept that the contents of this abstract cannot be
                                            modified or corrected after final submission and I am aware that it will be
                                            published exactly as submitted.
                                        </p>
                                        <br>
                                        <p>
                                            2. Submission of the abstract constitutes my consent to publication (e.g.,
                                            Congress website, Congress Notes book, etc.)
                                        </p>
                                        <br>
                                        <p>
                                            3. I warrant and represent that I am the sole owner or have the rights of
                                            all the information and content ('Content') provided to MEAVC 2023
                                            Conferences (Hereafter: 'Organizers'). The publication of the abstract does
                                            not infringe any third-party rights including, but not limited to,
                                            intellectual property rights.
                                        </p>
                                        <br>
                                        <p>
                                            4. I grant the Organizers a royalty-free, perpetual, irrevocable
                                            nonexclusive license to use, reproduce, publish, translate, distribute, and
                                            display the Content.
                                        </p>
                                        <br>
                                        <p>
                                            5. The Organizers reserve the right to remove from any publication an
                                            abstract which does not comply with the above.
                                        </p>
                                        <br>
                                        <p>
                                            6. I herewith confirm that the contact details saved in this system are
                                            correct, which will be used to notify me about the status of the abstract. I
                                            am responsible for informing the other authors about the status of the
                                            abstract.​
                                        </p>
                                        <p>
                                            <img src="{{ asset('assets/images/active.gif') }}" width="16"
                                                height="16" align="absmiddle" /> Affirmations Accepted

                                            @if (empty($abstractsubmission->evaluation->status))
                                                <font color="blue" size="2">(Processing...)</font>
                                            @elseif ($abstractsubmission->evaluation->status === "Approved")
                                                <font color="green" size="2">({{ $abstractsubmission->evaluation->status }})</font>

                                            @elseif ($abstractsubmission->evaluation && $abstractsubmission->evaluation->status == 'Modify' && $abstractsubmission->modified == true)
                                                <font color="grey" size="2">(Abstract modified, wait for evaluation...)</font>
                                            @else
                                                <font color="red" size="2">({{ $abstractsubmission->evaluation->status }})</font>
                                            @endif

                                        </p>
                                    </td>
                                </tr>


                            </table>
                        </div><br /><br />

            </table>
            <div id="footer">
                <div class="footer">
                    <p style="text-align:center;">MEAVC {{ date('Y') }}. All rights reserved.</p>
                </div>
            </div>


</body>

</html>
