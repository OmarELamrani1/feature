<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>POSTER</title>
    <link rel='stylesheet' href='{{ asset('assets/css/572.css') }}' media='all' />
    <link rel='stylesheet' href='{{ asset('assets/css/universal.css') }}' media='all' />
</head>

<body>

    <div id='inner_content-9-242' class='ct-inner-content'>
        <section id="section-2442-546" class=" ct-section contact-section">
            <div class="ct-section-inner-wrap">
                <div id="div_block-2444-546" class="ct-div-block img-bg">
                    <h1 id="headline-2445-546" class="ct-headline">Submit your poster & summary</h1>
                </div>
                <div id="new_columns-2450-546" class="ct-new-columns">
                    <div id="div_block-2455-546" class="ct-div-block">
                        <div id="new_columns-2456-546" class="ct-new-columns">
                            <div id="div_block-2457-546" class="ct-div-block">
                                <div id="shortcode-2800-572" class="ct-shortcode">
                                    <div class='fluentform fluentform_wrapper_4'>
                                        <style id="fluentform_custom_css_4" type="text/css">
                                            .fluent_form_4 .ff-el-form-control {
                                                background-color: #F2F2F2 !important;
                                            }

                                            .fluent_form_4 .ff-el-form-control::placeholder {
                                                color: #222222 !important;
                                            }

                                            .fluent_form_4 .ff_btn_style {
                                                background-color: #F2592D !important;
                                                font-family: inherit;
                                                border-radius: 25px !important;
                                                font-weight: 500 !important;
                                            }

                                            .fluent_form_4 .ff_btn_style:hover {
                                                background-color: #00A888 !important;
                                            }

                                            .fluent_form_4 .ff-el-input--label label {
                                                color: #212222;
                                                font-weight: 700 !important;
                                                font-size: 24px;
                                                padding-left: 25px !important;
                                            }

                                            .fluent_form_4 .ff-el-form-control {
                                                border-radius: 38px !important;
                                                padding: 10px 25px !important;
                                                border-color: transparent !important;
                                            }

                                            .fluent_form_4 .ff-el-form-control::placeholder {
                                                color: #222222 !important;
                                                font-size: 18px !important;
                                                font-weight: 500 !important;
                                            }

                                            .fluent_form_4 .ff-btn-submit {
                                                padding-left: 82px !important;
                                                padding-right: 82px !important;
                                            }

                                            #fluentform_4_success {
                                                border: unset;
                                                box-shadow: unset;
                                                margin-top: 0;
                                                padding: 0;
                                                position: relative;
                                                font-size: 18px;
                                                font-weight: 700;
                                                margin: 0 auto;
                                            }

                                            .fluent_form_4 #ff_4_message {
                                                resize: vertical;
                                            }
                                        </style>

                                        <form  action="{{ route('posters.store') }}" method="POST" enctype="multipart/form-data" id="fluentform_4"
                                            class="frm-fluent-form fluent_form_4 ff-el-form-top ff_form_instance_4_1 ff-form-loading">
                                            @csrf

                                                <div class='ff-el-group'>
                                                    <div class="ff-el-input--label ff-el-is-required asterisk-right">
                                                        <label for='path' aria-label="Poster">Poster</label>
                                                    </div>
                                                    <div class='ff-el-input--content'>
                                                        <input type="file" id="path" name="path" type="file" class="ff-el-form-control" placeholder="Poster" aria-required=true>
                                                    </div>
                                                </div>
                                                <div class='ff-el-group'>
                                                    <div class="ff-el-input--label ff-el-is-required asterisk-right">
                                                        <label for='summary' aria-label="Your Summary">Summary</label>
                                                    </div>
                                                    <div class='ff-el-input--content'>
                                                        <textarea id="summary" name="summary" class="ff-el-form-control"
                                                            placeholder="Write your summary here" rows="4" cols="2"></textarea>
                                                    </div>
                                                </div>
                                                <div class='ff-el-group ff-text-center ff_submit_btn_wrapper'>
                                                    <button type="submit" class="ff-btn ff-btn-submit ff-btn-md ff_btn_style">Submit Form</button>
                                                </div>
                                        </form>
                                        <div id='fluentform_4_errors'
                                            class='ff-errors-in-stack ff_form_instance_4_1 ff-form-loading_errors ff_form_instance_4_1_errors'>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="div_block-2663-546" class="ct-div-block"><img id="image-2664-546" alt="white tour shape" src="{{ asset('assets/images/contact2.png') }}" class="ct-image" /></div>
                <div id="div_block-2668-546" class="ct-div-block"><img id="image-2669-546" alt="white shape" src="{{ asset('assets/images/contact.png') }}" class="ct-image" /></div>
            </div>
        </section>
    </div>

    <link rel='stylesheet' id='fluent-form-styles-css' href='{{ asset('assets/css/fluent-forms-public.css') }}' media='all' />
    <link rel='stylesheet' id='fluentform-public-default-css' href='{{ asset('assets/css/fluentform-public-default.css') }}' media='all' />

</body>

</html>

