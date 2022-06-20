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
                            
                        

                                <div id="loginwith" class="animate form">
                                    <x-jet-validation-errors class="mb-4" />
                                    <form action="{{ route('login.with.otp.generate') }}" method="POST" autocomplete="on">
                                        @csrf
                                        <h1>Log with otp</h1>
                                        <p>
                                            <label for="username" class="uname" data-icon="u"> Your email or
                                                username
                                            </label>
                                            <input id="username" name="email" required="required" type="text"
                                            placeholder="phone number or mymail@mail.com" :value="old('email')"
                                                required autofocus />
                                        </p>

                                        <p class="keeplogin">
                                            <input type="checkbox" name="remember" id="loginkeeping"
                                                value="forever" />
                                            <label for="loginkeeping">Keep me logged in</label>
                                        </p>


                                        <a href="{{ route('password.request') }}" class="">Forget
                                            Password ?</a>

                                
                                        <p class="login button">
                                            <input type="submit" value="Send Otp" />
                                        </p>
                                        <p class="change_link">
                                            Not a member yet ?
                                            <a href="{{route('login')}}#toregister" class="to_register">Join us</a>
                                            <a href="{{route('login')}}#login" class="to_register">Login</a>

                                        </p>
                                
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
