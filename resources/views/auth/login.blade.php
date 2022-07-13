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


        <section style="
   margin-top: -23px;
    background-image: url(https://craftindustryalliance.org/CIAJune/ecommercelede.png);
    width: 100%;
    height: 100%;
    background-repeat: no-repeat;
    background-size: cover;
">
            <div class="container">
                <div class="row margin-bottom-40">
                    
                    <!-- END CONTENT -->
                    <!-- starting form -->
                    <div class="col-lg-6 m-auto">
                        <div id="container_demo" >
                            <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                            <a class="hiddenanchor" id="toregister"></a>
                            <a class="hiddenanchor" id="tologin"></a>
                            <div id="wrapper">
                                <div id="login" class="animate form">
                                    <x-jet-validation-errors class="mb-4" />
                                    <form action="{{ route('login.verify') }}" method="POST" autocomplete="on">
                                        @csrf
                                        <h1>Log in to your account</h1>
                                        <p>
                                            <label for="username" class="uname" data-icon="u"> Your email or
                                                username
                                            </label>
                                            <input id="username" name="email" required="required" type="text"
                                                placeholder="phone number or mymail@mail.com" :value="old('email')"
                                                required autofocus />
                                        </p>
                                        <p>
                                            <label for="password" class="youpasswd" data-icon="p"> Your password
                                            </label>
                                            <input id="password" name="password" required="required" type="password"
                                                placeholder="eg. X8df!90EO" required autocomplete="current-password" />
                                        </p>
                                        <p class="keeplogin">
                                            <input type="checkbox" name="remember" id="loginkeeping" value="forever" />
                                            <label for="loginkeeping">Keep me logged in</label>
                                        </p>


                                        <a href="{{ route('password.request') }}" class="">Forget
                                            Password ?</a>

                                        <a href="{{ route('login.with') }}" class="to_register" >Login With Otp ?</a>
                                        <p class="login button">
                                            <input type="submit" value="Login" class="join-us" style="text-align: center;"/>
                                            
                                        </p>
                                        <p style="float: right;"><span class="join-us">Not a member yet ? <a href="#toregister" class="to_reg">Signup</a></span></p>
                                        <!--<p class="change_link">-->
                                        <!--</p>-->
                                        <!-- <p class="change_link">
                                            Forget Password ?
                                            <a href="{{ route('password.request') }}" class="to_register">Forget
                                                Password ?</a>
                                        </p> -->

                                    </form>
                                </div>

                                <div id="register" class="animate form">
                                    <x-jet-validation-errors class="mb-4" />
                                    <form action="{{ route('register.otp') }}" method="POST" autocomplete="on">
                                        @csrf
                                        <h1> Sign up </h1>
                                        <p>
                                            <label for="usernamesignup" class="uname" data-icon="u">Your
                                                username</label>
                                            <input id="usernamesignup" name="name" type="text"
                                                placeholder="mysuperusername690" :value="name" required
                                                autofocus autocomplete="name" />
                                        </p>
                                        <p>
                                            <label for="phone" class="phone" data-icon="ph">
                                                Phone number</label>
                                            <input id="phone" name="phone" type="text" max="12"
                                                placeholder="Enter 10 digit mobile valid mobile number"
                                                :value="phone" />
                                        </p>
                                        <p>
                                            <label for="emailsignup" class="youmail" data-icon="e"> Your
                                                email</label>
                                            <input id="emailsignup" name="email" type="email"
                                                placeholder="mysupermail@mail.com" :value="email" />
                                        </p>
                                        <p>
                                            <label for="passwordsignup" class="youpasswd" data-icon="p">Your
                                                password
                                            </label>
                                            <input id="passwordsignup" name="password" type="password"
                                                placeholder="eg. X8df!90EO" required autocomplete="new-password" />
                                        </p>
                                        <p>
                                            <label for="passwordsignup_confirm" class="youpasswd"
                                                data-icon="p">Please
                                                confirm your password </label>
                                            <input id="passwordsignup_confirmation" name="password_confirmation"
                                                type="password" placeholder="eg. X8df!90EO" />
                                        </p>
                                        <p class="signin button ">
                                            <input type="submit" value="Signup" name="register" /></p>
                                            <p class="join-us" style="text-align: right;">Already a member ?
                                            <a href="#tologin" class="to_reg"> Login </a>
                                        </p>
                                        <!--<p class="change_link">-->
                                            
                                        <!--</p>-->
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
