<!doctype html>
    <html>
        <head>
            <meta charset="utf-8">
            <meta http-equiv="content-language" content="en">
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
            <meta name="keywords" content="">
            <meta name="description" content="">
            <title>Home</title>
            <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet" type="text/css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        </head>
<body>

<!-- menu -->
    <div class="bgWrapper"></div>
    <h4 class="openMenu">Menu</h4>
        <div id="menuWrapper">

            @guest
                <ul id="menu">
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                </ul>
            @endguest

            @auth
                <ul id="menu">
                    <li><a href="{{ route('check') }}">Dashboard</a></li>
                </ul>
            @endauth


            <div class="shrink-0 flex items-center">
                <a href="{{ url('/') }}">
                    <x-application-logo class="block h-10 w-auto fill-current text-gray-800" style="display:block; height:60px; margin-left:auto; margin-right:auto; margin-top:5px;"/>
                </a>
            </div>

        </div>
<!-- menu end -->

<!-- track -->
<div id="track" class="nowrap"> <a href="{{ url('/') }}">Home</a> <span>/</span> Abstracts <span>/</span> Call for Abstracts</div>
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
    <h1><span>Call for Abstracts</span></h1>
    <p>&nbsp;</p>
    <div class="AbstractsTop">
      <ol >
        <li><i class="fas fa-regular fa-calendar-days fa-2xl"></i>
          <h3>1 <sup>st</sup> of June, 2023</h3>
          <p>Abstract Submission Deadline</p>
        </li>
        <li><i class="fas fa-solid fa-paper-plane fa-2xl"></i></i>
          <h3>1<sup>st</sup> August. 2023 </h3>
          <p>Confirmation of acceptance or rejection of the presentation</p>
        </li>
        <li><i class="fas fa-solid fa-reply fa-2xl"></i></i>
          {{-- <h3>15 <sup>th</sup> of October, 2023</h3> --}}
          <h3>15 <sup>th</sup> of October, 2023</h3>
          <p>Deadline for one author to register <br>for the Congress</p>
          <p>Deadline to submit the Poster </p>
        </li>
      </ol>
    </div>
    <p class="clear">&nbsp;</p>
    <p>&nbsp;</p>
    <p class="align_L"><a href="mailto:abstracts@meavc.com" class="btnStyle" target="_blank">Submit Abstract To: abstracts@meavc.com</a></p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <!--<p class="align_c"><img src="images/empty.png"></p>-->
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
        <li>Others...</li>
    </ol>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <h3>Rules for submission</h3>
    <p class="divider">&nbsp;</p>
    <p><strong>Please read the submission rules before submitting an abstract.</strong></p>
    <ul class="disc">
      <li>The same person may serve as the Abstracts must be submitted online via the official email: abstracts@meavc.com. </li>
      <li>
        <p>Presentation Type: Abstracts may be  submitted for <span class="red"><b>Oral</b> Presentation</span> or <b>Poster</b> Presentation, <span class="red">which will be determined by the  review board and notified in the acceptance acknowledgement by email.</span></p>
      </li>
      <li>Abstracts must be received by the announced deadline. Abstracts received after the deadline will not be considered.</li>
      <li>The same person may submit up to 5 abstracts regardless of presenting author.</li>
      <li>The same person may serve as the presenting author on up to 3 abstracts.</li>
      <li>Submission of an abstract acknowledges your acceptance for the abstract to be published in the official congress publications.</li>
      <li>The presenting author is required to ensure that all co-authors are aware of the content of the abstract and agree to its submission, before submitting the abstract.</li>
      <li>All accepted abstracts will be published in the congress proceedings e-book.</li>
      <li>Presenting authors must be registered participants. Only abstracts of authors who have <strong>paid</strong> their registration fees will be scheduled for presentation and included for publication.</li>
      <li>Abstracts must be submitted in English. All abstracts should be submitted and presented in clear English with accurate grammar and spelling of a quality suitable for publication. If you need help, please arrange for the review of your abstract by a colleague who is a native English speaker, by a university specific publications office (or other similar facility) or by a copy editor, prior to submission.</li>
      <li>Abstracts must be original and must not have been published or presented at any other meeting prior to this Congress.</li>
      <li>Disclosure of Conflicts of Interest: Abstract submitters will be required to disclose any conflict of interests in the submission form.</li>
      <li>All research presented must comply with international standards pertaining to animal welfare, ethics and data protection. <a href="downloads/WVAC2023_Animal_Research_Self_Assessment.pdf" target="_blank">CLICK HERE</a> to review the WVAC Animal Research Self-Assessment for Abstracts involving the use of Live Animals.</li>
    </ul>
    <p>&nbsp;</p>
    <h3>Guidelines for submission</h3>
    <p class="divider">&nbsp;</p>
    <p><strong>Before you begin, please prepare the following information:</strong></p>
    <p><strong>Abstracts must be submitted via this website. Faxed or emailed abstracts will not be considered.</strong></p>
    <ul class="disc">
      <li>All abstracts must be submitted in English​​.</li>
      <li>Abstracts may be submitted ONLY for poster presentation</li>
      <li>Abstract title:&nbsp; <strong>UPPER  CASE, and limited to&nbsp;25&nbsp;words</strong>&nbsp; </li>
      <li>Abstracts text: <strong>limited to 300  words (not including title and authors) </strong></li>
      <li>Summaries previously published in other journals or conferences will be automatically rejected</li>
      <li>Each author may submit a maximum of 3 abstracts.</li>
      <li>A maximum of 2​ images and 2 tables are allowed to be submitted as part of each abstract.</li>
      <li>Submitted abstracts cannot be modified or corrected after the submission deadline.</li>
      <li>Abstracts must be structured with  the following:
        <ol class="number">
          <li><strong>Introduction</strong></li>
          <li><strong> Methods</strong></li>
          <li><strong> Results</strong></li>
          <li><strong> Conclusion</strong></li>
        </ol>
      </li>
    </ul>
    <p>&nbsp;</p>
    <h3>REGULATIONS</h3>
    <p class="divider">&nbsp;</p>
    <p><strong>Before submitting the abstract, the Abstract Submitter will be asked to confirm the following:</strong></p>
    <ul class="disc">
      <li>I confirm that I have previewed this abstract and that all information is correct and in accordance to the abstract submission guidelines provided on the Congress website. I accept that the contents of this abstract cannot be modified or corrected after final submission and I am aware that it will be published exactly as submitted.</li><p>&nbsp;</p>
      <li>Submission of the abstract constitutes my consent to publication (e.g., Congress website, Congress Notes book, etc.)</li><p>&nbsp;</p>
      <li>I warrant and represent that I am the sole owner or have the rights of all the information and content ('Content') provided to MEAVC 2023 Conferences (Hereafter: 'Organizers'). The publication of the abstract does not infringe any third-party rights including, but not limited to, intellectual property rights</li><p>&nbsp;</p>
      <li>I grant the Organizers a royalty-free, perpetual, irrevocable nonexclusive license to use, reproduce, publish, translate, distribute, and display the Content.</li><p>&nbsp;</p>
      <li>The Organizers reserve the right to remove from any publication an abstract which does not comply with the above</li><p>&nbsp;</p>
      <li>I herewith confirm that the contact details saved in this system are correct, which will be used to notify me about the status of the abstract. I am responsible for informing the other authors about the status of the abstract</li>
    </ul>
    <p>&nbsp;</p>
    <h3>POSTER SESSION OVERVIEW</h3>
    <p class="divider">&nbsp;</p>
    <ul class="disc">
      <li>Poster boards will be displayed over two Congress days: November 11-12, 2023.</li>
      <li>Presenters are requested to stand by their posters during the lunch and coffee breaks for informal discussions</li>
      <li>Presenters are able to set up their posters from 8.30 on Saturday, November 11, 2023</li>
      <li>Posters should be removed after 19.00 on Sunday, November 12, 2023</li><p>&nbsp;</p>
      <p><strong>IMPORTANT DATES</strong></p>
      <li>Last day for submission of Communications / Case Reports ---- 1st of June 2023</li>
      <li>Confirmation of acceptance or rejection of the presentation ---- 1st of August 2023</li>
      <li>Deadline for one author to register for the Congress ---- 15th of October, 2023</li>
      <li>Deadline to submit the Poster ---- 15th of October, 2023</li>
    </ul>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p class="align_c"><a href="{{ asset('assets/images/Abstract_Submitters_Declaration.pdf') }}" class="btnStyle" target="_blank">Abstract Submitters’ Declaration</a></p>
    <p class="align_c">&nbsp;</p>
    <p class="align_c">&nbsp;</p>
    <p class="align_c">&nbsp;</p>
    <!--<h1 class="align_c">Coming Soon</h1>-->
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
{{-- <script type="text/javascript" src="js/stickySidebar.js"></script> --}}
<script type="text/javascript" src=" {{ asset('assets/js/menu.js') }}"></script>
</body>
</html>
