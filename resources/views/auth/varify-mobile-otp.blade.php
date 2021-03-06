<x-guest-layout>




    <!-- Body BEGIN -->
    <link rel="shortcut icon" href="../favicon.ico">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/demo.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/animate-custom.css') }}" />

    <body class="ecommerce ">
        <style>
            .text-red-600 {
                color: red;
            }
        </style>


        <section>
            <div class="container">
                <div class="row margin-bottom-40">
                    <div class="col-md-6 col-sm-9 mb-5">
                        <h1>Terms & Conditions</h1>
                        <div class="content-page">
                            <p><img src="{{ asset('assets/pages/img/img1.jpg') }}" alt="About us"
                                    class="img-responsive">
                            </p>


                            <h2>QSIPL SERVICE</h2>

                            <p>a. Use of QSIPL Services on a Product. To use certain QSIPL Services on a Product, you
                                must have your own QSIPL.in account, be logged in to your account on the Product, and
                                have a valid payment method associated with your account. </p>
                            <br>
                            b. Use of the QSIPL Site. Except as provided in this section, you may use the QSIPL website
                            only on your Product. For additional terms that apply to the QSIPL web site, see the
                            Additional QSIPL terms contained in the quicksecureindia.com Conditions of Use and the terms
                            contained in the Legal section of the Settings menu of the QSIPL Services on your Product or
                            the QSIPL App. QSIPL web site licensed under an open source license is governed solely by
                            the terms of that open source license

                            <!--<h3>Investigationes demonstraverunt</h3>-->
                            <!--<ul>-->
                            <!--    <li>Lorem ipsum dolor sit amet</li>-->
                            <!--    <li>Claritas est etiam processus dynamicus</li>-->
                            <!--    <li>Duis autem vel eum iriure dolor</li>-->
                            <!--    <li>Eodem modo typi</li>-->
                            <!--</ul>-->



                        </div>
                    </div>
                    <!-- END CONTENT -->
                    <!-- starting form -->
                    <div class="col-lg-6">
                        <div id="container_demo" style="margin-top: 5em;">
                            <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                            <a class="hiddenanchor" id="toregister"></a>
                            <a class="hiddenanchor" id="tologin"></a>
                            <div id="wrapper">
                                <div id="login" class="animate form">
                                    <x-jet-validation-errors class="mb-4" />
                                    <form action="{{ route('verify.otp') }}" method="POST" autocomplete="on">
                                        @csrf
                                        <h1>Log in to your account</h1>
                                        <p>
                                            <label for="Otp" class="uname" data-icon="u">Enter Your
                                                Otp
                                            </label>
                                            <input id="Otp" name="otp" required="required" type="text"
                                                maxlength="6" placeholder="Enter 6 digit otp" required  />
                                            <small class="text-success">Otp has been send your <i
                                                    class="fas fa-mobile-phone"></i> Mobile number and <i
                                                    class="fas fa-envelope"></i> Email address</small>
                                        </p>
                                        <button type="submit" class="btn btn-primary">Submit Otp</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end form -->
                </div>
            </div>
        </section>

    </body>
    <!-- END BODY -->
</x-guest-layout>
