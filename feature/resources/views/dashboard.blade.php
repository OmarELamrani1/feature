@extends('layouts.navbar')
    @section('title', 'Publication Submission')
        @section('content')
            <div id="content" class="user-content">
                <h1>My abstracts</h1>

                @if ($researchPaperCount < 3)
                    <span>You have {{ 3 - $researchPaperCount }} Research Paper submissions left</span>
                    <a href="{{ route('researchPaper') }}">
                        <button type="button" class="btn btn-primary" style="margin: 10px 0;">
                            Submit a new abstract (Research Paper)
                        </button>
                    </a><br><br>
                @endif

                @if ($clinicalCaseCount < 3)
                    <span>You have {{ 3 - $clinicalCaseCount }} Clinical Case submissions left</span>
                    <a href="{{ route('clinicalCase') }}">
                        <button type="button" class="btn btn-primary" style="margin: 10px 0;">
                            Submit a new abstract (Clinical Case)
                        </button>
                    </a>
                @endif

                @if ($researchPaperCount >= 3 && $clinicalCaseCount >= 3)
                    <p>You have already submitted 3 abstracts for both Research Paper and Clinical Case</p>
                @endif

                <div style="">

                    <div>
                        <span>
                            <h3>Abstract Submitted ({{ $researchPaperCount + $clinicalCaseCount }})</h3>
                        </span>
                    </div>
                    <div>
                        <div>

                            @if (empty($researchPaperCount || $clinicalCaseCount))
                                <table cellpadding="0" class="abstract_box">
                                    <tr>
                                        <td class="abstract_box_title" style="text-align: center;">You don't have any files.</td>
                                    </tr>
                                </table>
                            @endif
                            @foreach ($abstractsubmissions as $abstract)
                                <table cellpadding="0" class="abstract_box">
                                    <tr>
                                        <td class="abstract_box_status">
                                            @if ($abstract && $abstract->evaluation && $abstract->modified == false)
                                                <a href="{{ route('checkStatus', $abstract->id) }}">
                                                    <h3 style="color:rgb(74, 128, 72)">
                                                        Check Status
                                                    </h3>
                                                </a>
                                            @elseif (
                                                $abstract->evaluation &&
                                                    $abstract->evaluation->status == 'Modify' &&
                                                    $abstract->updated_at != $abstract->created_at)
                                                <p>Abstract modified, wait for evaluation...</p>
                                            @elseif ($abstract && $abstract->evaluation)
                                                <a href="{{ route('checkStatus', $abstract->id) }}">
                                                    <h3 style="color:rgb(74, 128, 72)">
                                                        re-Check Status
                                                    </h3>
                                                </a>
                                            @else
                                                <p>
                                                    <font color="blue">Processing...</font>
                                                </p>
                                            @endif

                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="publication_id">
                                            #{{ $abstract->id ?? null }}
                                        </td>
                                        <td class="abstract_box_title">{{ $abstract->title ?? null }}</td>
                                        <td rowspan="2" class="action_btn">

                                            <a href="{{ optional($abstract)->id ? route('abstractsubmission.show', $abstract->id) : '#' }}"
                                                title="View"><i class="fa fa-eye" aria-hidden="true"></i></a>

                                                <form method="POST" action="{{ route('abstractsubmission.destroy', $abstract->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button title="Delete">
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                    </button>
                                                </form>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>
                                            <span class="abstract_box_tag">Submitted:</span>
                                            {{ $abstract->created_at ?? null }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>
                                            <span class="abstract_box_tag">Topic:</span>
                                            {{ $abstract->topic->name ?? null }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>
                                            <span class="abstract_box_tag">Type:</span>
                                            {{ $abstract->type ?? null }}
                                        </td>
                                    </tr>
                                </table><br><br>
                            @endforeach

                        </div>
                    </div><br />
                </div>
            </div>
@endsection
