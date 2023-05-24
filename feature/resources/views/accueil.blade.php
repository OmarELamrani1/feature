<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="content-language" content="en">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>MEAVC - Poster presentations</title>
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">

</head>

<body>

    <!-- menu -->
    <div class="bgWrapper"></div>
    <h4 class="openMenu">Menu</h4>
    <div id="menuWrapper">

        @guest
        <ul id="menu">
            <li><a href="{{ route('register') }}">Submit Abstract</a></li>
            <li><a href="{{ route('login') }}">Login</a></li>
        </ul>
        @endguest

        @auth
        <ul id="menu">
            <li><a href="{{ route('check') }}">Dashboard</a></li>
        </ul>
        @endauth


        <div class="shrink-0 flex items-center">
            <a href="{{ url('/') }}">
                <x-application-logo class="block h-10 w-auto fill-current text-gray-800" style="display:block; height:60px; left:30px; position:absolute; margin-top:5px;" />
            </a>
        </div>

    </div>
    <!-- menu end -->

    <!-- track -->
    <div id="track" class="nowrap"> <a href="{{ url('/') }}">Home</a> <span>/</span> Abstracts <span>/</span>
        Call for Abstracts</div>
    <!-- track end -->
    <!-- article -->
    <article>
        <!-- left -->
        <div id="left">
            <div id="sidebar">
                <h4></h4>

                <ul class="list">
                    <li class="selected"><a href="#">Call for Abstracts</a></li>
                    <li><a href="#">Poster Proceedings</a></li>
                </ul>

            </div>
        </div>
        <!-- left end -->
        <!-- right -->
        <div id="right" class="content">
            <h1>Call for Abstracts</h1>
            <p>&nbsp;</p>
            <div class="AbstractsTop">
                <ol>
                    <li><i class="fas fa-regular fa-calendar-days fa-2xl"></i>
                        <h3>1 <sup>st</sup> of July, 2023</h3>
                        <p>Abstract Submission Deadline</p>
                    </li>
                    <li><i class="fas fa-solid fa-paper-plane fa-2xl"></i></i>
                        <h3>1<sup>st</sup> September. 2023 </h3>
                        <p>Confirmation of acceptance or rejection of the presentation</p>
                    </li>
                    <li><i class="fas fa-solid fa-reply fa-2xl"></i></i>
                        <h3>15 <sup>th</sup> of October, 2023</h3>
                        <p>Deadline for one author to register <br>for the Congress</p>
                        <p>Deadline to submit the Poster </p>
                    </li>
                </ol>
            </div>
            <p class="clear">&nbsp;</p>
            <p>&nbsp;</p>
            <h3>Abstract Topics</h3>
            <p class="divider">&nbsp;</p>
            <ol class="number">
                <li>Alternative medicine, homeopathy and acupuncture</li>
                <li>Anesthesia</li>
                <li>Animal Welfare</li>
                <li>Behavior</li>
                <li>Clinical Pathology</li>
                <li>Critical care and emergency medicine</li>
                <li>Dentistry</li>
                <li>Dermatology </li>
                <li>Diagnostic imaging</li>
                <li>Endocrinology</li>
                <li>EQUINE MEDICINE & SURGERY</li>
                <li>Exotics</li>
                <li>Feline medicine</li>
                <li>Gastroenterology and hepatology</li>
                <li>Hereditary diseases</li>
                <li>Infectious and emerging diseases</li>
                <li>Internal medicine (OTHER)</li>
                <li>Nephrology and Urology</li>
                <li>Neurology/Neurosurgery</li>
                <li>Nutrition</li>
                <li>Oncology</li>
                <li>One health</li>
                <li>Ophthalmology</li>
                <li>Orthopedics</li>
                <li>Pain management</li>
                <li>Pharmacology</li>
                <li>Practice management</li>
                <li>Reproduction, pediatrics</li>
                <li>Soft tissue surgery and Oncosurgery</li>
                <li>Sports Medicine and Rehabilitation</li>
            </ol>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <div id="abstract-submission-guidelines">
                <h3>ABST​RACT SUBMISSION GUIDELINES</h3>
                <p class="divider">&nbsp;</p>
                <p><strong>Abstracts must be submitted via this website. Faxed or emailed abstracts will not be
                        considered.</strong></p>
                <ul class="disc">
                    <li>All abstracts must be submitted in English​​.</li>
                    <li>Abstracts may be submitted ONLY for poster presentation</li>
                    <li>Abstracts previously published in other journals or conferences will be automatically rejected</li>
                    <li>Each author may submit a maximum of 3 abstracts.</strong></li>
                    <li>A maximum of 2​ images and 2 tables are allowed to be submitted as part of each abstract.</li>
                    <li>Once completing submission, a confirmation that the abstract has been submitted will be sent,
                        indicating the abstract number which has been allocated.
                        <span style="text-decoration: underline;">Please refer to the abstract number in all correspondence
                            regarding the abstract.</span>
                    </li>
                    <li>Submitted abstracts cannot be modified or corrected after the submission deadline.</li>
                    <li>The first author or a co-author is expected to attend the Congress and present the abstract. Only
                        abstracts of presenting authors, who have paid their registration fee by 15th of October 2023 will
                        be included in the program.</li>
                    <li>All research presented must comply with international standards pertaining to animal welfare, ethics
                        and data protection.</li>
                </ul>
            </div>

            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <div id="abstract-preparation">
                <h3>ABSTRACT PREPARATION</h3>
                <p class="divider">&nbsp;</p>
                <p><strong>Before you begin, please prepare the following information:</strong></p>
                <ol class="number">
                    <li>Presenting author's contact details
                        <ul class="disc">
                            <li>Email address</li>
                            <li>Full postal address</li>
                            <li>Daytime and evening phone number</li>
                        </ul>
                    </li>
                    <li>Author and co-authors' details
                        <ul class="disc">
                            <li>Full first and family name(s).</li>
                            <li>Authors' names must be in upper and lower case (J.J.C. Smith)</li>
                            <li>Affiliation details: department, institution, city, state (if relevant), country</li>
                        </ul>
                    </li>
                    <li>Abstract title
                        <ul class="disc">
                            <li>limited to <strong>25 words in UPPER CASE</strong></li>
                        </ul>
                    </li>
                    <li>Abstract text
                        <ul class="disc">
                            <li>limited to <strong>300 words</strong></li>
                        </ul>
                    </li>

                    <p>(Please be sure that you do not include extra spaces and symbols as these are included in the word
                        count. Word count is also affected when graphs/tables/images are included)</p>
                    <p>We recommend using a word-processing software (for example, Word) for editing your abstract and
                        counting the number of words. Typing your text directly into the field is not recommended.</p>

                    <li>Abstracts should clearly state:
                        <ul class="disc">
                            <li><strong>Introduction:</strong></li>
                            <li><strong>Objectives:</strong></li>
                            <li><strong>Methods:</strong></li>
                            <li><strong>Results:</strong></li>
                            <li><strong>Conclusions:</strong></li>
                        </ul>
                    </li>
                    <p><strong>OR in case reports:</strong></p>
                    <ul class="disc">
                        <li><strong>Clinical History & Presentation</strong></li>
                        <li><strong>Physical Examination & Diagnostic Workup</strong></li>
                        <li><strong>Treatment & Discussion</strong></li>
                    </ul>

                    <li>Graphs and images
                        <ul class="disc">
                            <p>When including a table, it is recommended to
                                save the table as an image and then upload it into the abstract.  Please note: word count is
                                affected when graphs/tables/images are added. The maximum file size of each image is 500 KB. The maximum pixel size of the graph/image is 600(w) x 800(h) pixels. You may upload images in JPG, GIF, or PNG format.</p>
                             <p>All personal information should be removed from images submitted.</p>
                        </ul>
                    </li>

                    <li>DRAFT abstracts
                        <ul class="disc">
                            <p>There is no option to save the abstract as draft and to submit it at a later stage. If you do
                                not submit your abstract, the information will be deleted. Please note that abstracts must
                                be SUBMITTED before the deadline in order to be sent to review for inclusion in the
                                Scientific Program.</p>
                        </ul>
                    </li>

                    <li>Abstracts are to be submitted using the form available here</li>

                    <li><strong>TECHNICAL SPECS</strong>
                        <p>The dimensions of the poster board are PORTRAIT style.</p>
                        <p>It is recommended that your poster be no larger than 90cm wide x 120cm high (Portrait style).</p>
                        <p>Posters should be prepared on one sheet.</p>
                        <p>The text, illustrations, etc should be bold enough to be read from a distance of two meters. No figures or tables other than those submitted along with the abstract are allowed to be included in the poster.</p>
                        <p>Double-sided tape will be available in the poster area for hanging of posters. Staff will also be
                            in the poster area to assist you.</p>
                        <p>The organisers are not responsible for any posters that have not been removed by the end of the
                            sessions on the day in which they have been scheduled.</p>
                    </li>
                </ol>

            </div>

            <p>&nbsp;</p>
            <h3>EVALUATION PROCEDURE</h3>
            <p class="divider">&nbsp;</p>
            <ul class="disc">
                <li>Once the Abstracts have been received, they will be evaluated by members of the MEAVC Scientific
                    Committee or other expert evaluators using only the abstract number of the essay; never with the
                    name and personal details of the author.</li>
                <li>Once the Abstracts have been evaluated, the authors will be informed as to whether or not their
                    essay has been accepted.</li>
                <li>When considered necessary, authors will be asked to make modifications or corrections to some
                    aspects of their poster. This means that the newly revised poster will have to be resubmitted, with
                    new deadlines to be specified to each author.</li>
                <li>There will be only one round of reviewing.</li>
            </ul>

            <p>&nbsp;</p>
            <h3>GUIDELINES FOR ACCEPTED POSTERS</h3>
            <p class="divider">&nbsp;</p>
            <p>Authors of Accepted Clinical Cases or Scientific communications will have to</p>
            <ul class="disc">
                <li>Print a poster to display during the conference</li>
                <li>Submit the Poster for the MEAVC Congress Platform</li>
            </ul>
            <p>Download HERE The template to print and submit the poster for the platform.</p>

            <p>&nbsp;</p>
            <div id="regulations">
                <h3>REGULATIONS</h3>
                <p class="divider">&nbsp;</p>
                <p><strong>Before submitting the abstract, the Abstract Submitter will be asked to confirm the
                        following:</strong></p>
                <ul class="disc">
                    <li>I confirm that I have previewed this abstract and that all information is correct and in accordance
                        to the abstract submission guidelines provided on the Congress website. I accept that the contents
                        of this abstract cannot be modified or corrected after final submission and I am aware that it will
                        be published exactly as submitted.</li>
                    <p>&nbsp;</p>
                    <li>Submission of the abstract constitutes my consent to publication (e.g., Congress website, Congress
                        Notes book, etc.)</li>
                    <p>&nbsp;</p>
                    <li>I warrant and represent that I am the sole owner or have the rights of all the information and
                        content ('Content') provided to MEAVC 2023 Conferences (Hereafter: 'Organizers'). The publication of
                        the abstract does not infringe any third-party rights including, but not limited to, intellectual
                        property rights</li>
                    <p>&nbsp;</p>
                    <li>I grant the Organizers a royalty-free, perpetual, irrevocable nonexclusive license to use,
                        reproduce, publish, translate, distribute, and display the Content.</li>
                    <p>&nbsp;</p>
                    <li>The Organizers reserve the right to remove from any publication an abstract which does not comply
                        with the above</li>
                    <p>&nbsp;</p>
                    <li>I herewith confirm that the contact details saved in this system are correct, which will be used to
                        notify me about the status of the abstract. I am responsible for informing the other authors about
                        the status of the abstract</li>
                     <li>Only images submitted for review will be allowed on the poster.</li>
                </ul>
            </div>
            <p>&nbsp;</p>
            <h3>POSTER SESSION OVERVIEW</h3>
            <p class="divider">&nbsp;</p>
            <ul class="disc">
                <li>Poster boards will be displayed over two Congress days: November 11-12, 2023.</li>
                <li>Presenters are requested to stand by their posters during the lunch and coffee breaks for informal
                    discussions</li>
                <li>Presenters are able to set up their posters from 8.30 on Saturday, November 11, 2023</li>
                <li>Posters should be removed after 19.00 on Sunday, November 12, 2023</li>
                <p>&nbsp;</p>
                <p><strong>IMPORTANT DATES</strong></p>
                <li>Last day for submission of abstracts ---- 1st of July 2023</li>
                <li>Confirmation of acceptance or rejection of abstracts ---- 1st of September 2023</li>
                <li>Deadline for one author to register for the Congress ---- 15th of October, 2023</li>
                <li>Deadline to submit the Poster ---- 15th of October, 2023</li>
            </ul>
            <p>&nbsp;</p>
        </div>
        <p class="clear">&nbsp;</p>
    </article>
    <!-- article end -->

    <!--------------------- footer --------------------->
    <footer>
        <div class="left">
            <a href="#">
                <img src="{{ asset('assets/images/logofooter.png') }}" alt="LOGO FOOTER">
            </a>
        </div>

        <div class="right">
            <p class="bold">CONTACT</p>
            <p>+971 4 447 5580</p>
            <p><a href="mailto:abstracts@meavc.com">abstracts@meavc.com</a></p>
            <p>&nbsp;</p>

            <p class="bold">LOCATION</p>
            <p>YES BUSINESS TOUR Office number 505, Barsha 1, Dubai - UAE</p>
            <p>&nbsp;</p>

        </div>
        <p class="clear"></p>
        <hr>
        <p style="text-align: center;" class="text-center">All rights reserved {{ date('Y') }} Copyright &copy;</p>
    </footer>
    <div id="toTop"><i class="fas fa-arrow-circle-up"></i></div>

    <!--------------------- footer end --------------------->
    <script type="text/javascript" src="{{ asset('assets/js/jquery-2.2.4.min.js') }}"></script>
    <!-- for slider effect-->
    <script type="text/javascript" src="{{ asset('assets/js/swiper.min.js') }}"></script>
    <script type="text/javascript" src=" {{ asset('assets/js/banner.js') }}"></script>
    <!-- for all -->
    <script type="text/javascript" src=" {{ asset('assets/js/menu.js') }}"></script>
</body>

</html>
