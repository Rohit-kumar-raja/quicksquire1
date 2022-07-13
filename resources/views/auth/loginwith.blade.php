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


        <section style=" margin-top: -23px;
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
                        <div id="container_demo" style="margin-top: 5em;">
                            <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                            <a class="hiddenanchor" id="toregister"></a>
                            <a class="hiddenanchor" id="tologin"></a>
                            <div id="wrapper">
                            
                        

                                <div id="login" class="animate form">
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
                                        <p class="join-us" style="float: right;">
                                            Not a member yet ?
                                            <a href="{{route('login')}}#toregister" class="to_reg">Join us</a>
                                            <a href="{{route('login')}}#login" class="to_reg">Login</a>

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
