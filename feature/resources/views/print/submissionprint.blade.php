<!DOCTYPE html>
<html>

<head>
    <title>Print Submission</title>
</head>

<style>
    #master {
        margin-bottom: 30px;
        position: relative;
    }

    #content {
        padding: 35px 20px 60px 20px;
        background: rgba(242, 242, 242, .8);
    }

    .user-content {
        /* width: 1200px; */
        margin: 0 auto;
    }

    .preview-content-box {
        border-top: 1px solid #AFB2B5;
        border-bottom: 1px solid #AFB2B5;
        padding: 15px 0;
        list-style: none;
    }

    .label {
        background: #54BFD3;
        color: #fff;
        border-radius: 30px;
        padding: 10px;
        margin-right: 2px;
        margin-bottom: 5px;
        display: inline-flex;
        vertical-align: middle;
        line-height: 20px;
    }

    #affirmations-details {
        color: #07C;
        cursor: pointer;
    }
</style>

<body>
    <div id="master">

        <div id="content" class="user-content">

            <table id="preview">
                <tr>
                    <td>
                        <h1 style="text-align: center;">#{{ $abstractsubmission->id }} - {{ $abstractsubmission->title }}</h1>
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
                        </table>
                    </td>
                </tr>

                <tr>
                    <td height="20px"></td>
                </tr>

                <tr>
                    <td class="preview-content-box">
                        <b>Introduction</b>
                        <div class="preview-content">
                            <p>{!! $abstractsubmission->introduction !!}</p>
                        </div>
                        <br style="clear: both;" />

                        @if ($abstractsubmission->type === 'Clinical Case')
                            <b>Diagnosis</b>
                            <div class="preview-content">
                                <p>{{ $abstractsubmission->diagnosis }}</p>
                            </div>
                            <br style="clear: both;" />
                            <b>Treatment</b>
                            <div class="preview-content">
                                <p>{{ $abstractsubmission->treatment }}</p>
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
                                            1. I confirm that I have previewed this abstract and that all information is
                                            correct and in accordance to the abstract submission guidelines provided on
                                            the Congress website. I accept that the contents of this abstract cannot be
                                            modified or corrected after final submission and I am aware that it will be
                                            published exactly as submitted.
                                        </p>
                                        <br>
                                        <p>
                                            2. Submission of the abstract constitutes my consent to publication (e.g.,
                                            Congress website, Congress Notes book, etc.)
                                        </p>
                                        <br>
                                        <p>
                                            3. I warrant and represent that I am the sole owner or have the rights of
                                            all the information and content ('Content') provided to MEAVC 2023
                                            Conferences (Hereafter: 'Organizers'). The publication of the abstract does
                                            not infringe any third-party rights including, but not limited to,
                                            intellectual property rights.
                                        </p>
                                        <br>
                                        <p>
                                            4. I grant the Organizers a royalty-free, perpetual, irrevocable
                                            nonexclusive license to use, reproduce, publish, translate, distribute, and
                                            display the Content.
                                        </p>
                                        <br>
                                        <p>
                                            5. The Organizers reserve the right to remove from any publication an
                                            abstract which does not comply with the above.
                                        </p>
                                        <br>
                                        <p>
                                            6. I herewith confirm that the contact details saved in this system are
                                            correct, which will be used to notify me about the status of the abstract. I
                                            am responsible for informing the other authors about the status of the
                                            abstract.​
                                        </p>
                                        <p>
                                            @if (empty($abstractsubmission->evaluation->status))
                                                <font color="blue" size="2">(Processing...)</font>
                                            @elseif ($abstractsubmission->evaluation->status === "Approved")
                                                <font color="green" size="2">({{ $abstractsubmission->evaluation->status }})</font>
                                            @else
                                                <font color="red" size="2">({{ $abstractsubmission->evaluation->status }})</font>
                                            @endif
                                        </p>
                                    </td>
                                </tr>


                            </table>
                        </div><br /><br />

            </table>
        </div>
    </div>

</body>

</html>
