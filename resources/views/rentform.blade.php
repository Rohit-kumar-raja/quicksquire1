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

            .un-color {
                background-color: #133d81 !important;
                margin-top: 5px
            }

            .card-title {
                margin-top: 10px !important;
                margin-left: 10px !important;
            }

            input {
                margin-top: 8px;
            }
        </style>


        <section>
            <div class="container">
                <div class="row margin-bottom-40">
                    <div class="col-md-12">
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
                    <div class="col-lg-12">

                        <x-jet-validation-errors class="mb-4" />
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif
                        <form action="{{ route('rent.sale') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card card-default p-2">
                                <div class="card un-color">
                                    <h5 class="card-title ml-5  text-white"> 1.Basic Details </h5>
                                </div>



                                <div class="card-body">

                                    <div class="row">


                                        <div id="board_name" class="col-sm-4   mt-3">
                                            <b>Full Name * </b>
                                            <input id="form_no" type="text" name="name" class="form-control"
                                                placeholder="Full Name*">
                                        </div>

                                        <div class="col-sm-4  mt-3">
                                            <b> E-mail :</b>
                                            <input required="" type="email" name="email"
                                                placeholder=" Email Address " class="form-control">
                                        </div>

                                        <div class="col-sm-4  mt-3">
                                            <b>Mobile Number * :</b>
                                            <input type="text" name="phone" class="form-control" value=""
                                                placeholder="Phone Number">
                                        </div>



                                        <div class="col-sm-4  mt-3">
                                            <b> Rental Duration* :</b>
                                            <input required="" type="number" name="duration"
                                                placeholder=" Duration in day" class="form-control">
                                        </div>


                                        <div class="col-sm-4  mt-3">
                                            <b> Pin code :</b>
                                            <input required="" onkeyup="pin(this.value)" type="text"
                                                name="pincode" placeholder=" Pin code" class="form-control">
                                        </div>

                                        <div class="col-sm-4  mt-3">
                                            <b> State :</b>
                                            <input id="state" type="text" name="state" placeholder=" State  "
                                                class="form-control">
                                        </div>
                                        <div class="col-sm-4  mt-3">
                                            <b> District :</b>
                                            <input id="district" type="text" name="district"
                                                placeholder=" District " class="form-control">
                                        </div>

                                        <div class="col-sm-4  mt-3">
                                            <b> City :</b>
                                            <input id="city" type="text" name="city" placeholder="City "
                                                class="form-control">
                                        </div>

                                        <div class="col-sm-8  mt-3">
                                            <b> Address :</b>
                                            <textarea type="text" name="address" placeholder=" Full Address " class="form-control"> </textarea>
                                        </div>


                                    </div>

                                </div>

                                <br>

                                <!-- here to started the representetives Detailss -->
                                <div class="card un-color">
                                    <h5 class="card-title ml-5  text-white"> 2.RAM </h5>
                                </div>


                                <div class="card-body">

                                    <div class="row">
                                        {{-- <div class="col-sm-4  mt-3">
                                            <b> Ram Type :</b>
                                            <select name="ram_type" class="form-control">
                                                <option selected disabled> Select-</option>
                                                <option value="Days">DDR 3</option>
                                                <option value="Weeks">DDR 4</option>
                                            </select>
                                        </div> --}}
                                        <div class="col-sm-4  mt-3">
                                            <b> Size of Ram :</b>
                                            <input id="city" type="number" name="ram_size"
                                                placeholder=" Ram Size in GB" class="form-control">
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <!-- here to started the representetives Detailss -->
                                <div class="card un-color">
                                    <h5 class="card-title ml-5  text-white"> 3.Storage </h5>
                                </div>


                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-sm-4  mt-3">
                                            <b> Storage Type :</b>
                                            <select name="storage_type" class="form-control">
                                                <option selected disabled> Select-</option>
                                                <option value="hdd">HDD</option>
                                                <option value="sdd">SDD</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-4  mt-3">
                                            <b> Size of Storage :</b>
                                            <input id="city" type="number" name="storage_size"
                                                placeholder=" Storage Size in GB" class="form-control">
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <!-- here to started the representetives Detailss -->
                                <div class="card un-color">
                                    <h5 class="card-title ml-5  text-white"> 4. processor </h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-4  mt-3">
                                            <b> Processor Name :</b>
                                            <input name="prosessor" placeholder="Processor Name ex - inter core i3"
                                                class="form-control">
                                        </div>
                                        <div class="col-sm-4  mt-3">
                                            <b> Processor generation :</b>
                                            <input name="prosessor_generation"
                                                placeholder="Processor Generation ex - 3rd genration"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <!-- here to started the representetives Detailss -->
                                <div class="card un-color">
                                    <h5 class="card-title ml-5  text-white"> 5. Software Requirment </h5>
                                </div>


                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-sm-4  mt-3">
                                            <b> Windows Type :</b>
                                            <input name="win_type" placeholder="Window type ex - window 10"
                                                class="form-control">
                                        </div>
                                        <div class="col-sm-4  mt-3">
                                            <b> MS Office :</b>
                                            <select name="office" class="form-control">
                                                <option selected disabled> Select-</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-4  mt-3">
                                            <b> Antivirus :</b>
                                            <select name="antivirus" class="form-control">
                                                <option selected disabled> Select-</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- here to started the representetives Detailss -->
                                <div class="card un-color">
                                    <h5 class="card-title ml-5  text-white"> 4. Others Details </h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-4  mt-3">
                                            <b> System Type :</b>
                                            <select name="system_type" class="form-control">
                                                <option selected disabled> Select-</option>
                                                <option value="desktop">Desktop</option>
                                                <option value="laptop">Laptop</option>
                                                <option value="others">Others</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-4  mt-3">
                                            <b> Screen Type :</b>
                                            <select name="screen_type" class="form-control">
                                                <option selected disabled> Select-</option>
                                                <option value="led">Led</option>
                                                <option value="lcd">Lcd</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-4  mt-3">
                                            <b> Screen Size :</b>
                                            <input name="screen_size" placeholder='Screen Size ex- 16.5" '
                                                class="form-control">
                                        </div>
                                        <div class="col-sm-4  mt-3">
                                            <b> Graphics card Size (if applicaple) :</b>
                                            <input type="number" name="graphics" placeholder=" Graphic card in GB ex - 1 "
                                                class="form-control">
                                        </div>
                                        <div class="col-sm-4  mt-3">
                                            <b> Mouse :</b>
                                            <select name="mouse" class="form-control">
                                                <option selected disabled> Select-</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-4  mt-3">
                                            <b> Keyboard :</b>
                                            <select name="keyboard" class="form-control">
                                                <option selected disabled> Select-</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                            </select>
                                        </div>

                                        <div class="col-sm-4  mt-3">
                                            <b> Images :</b>
                                            <input  accept="image/*" type="file" name="image" 
                                                class="form-control">
                                        </div>


                                        <div class="col-sm-12  mt-3">
                                            <b> Description :</b>
                                            <textarea name="description" id="" cols="30" rows="10" class="form-control mt-3"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mt-5 ">
                                <label for="">
                                    <input type="checkbox" name="" id="" required=""> &nbsp;
                                    Accept our all <a href="" class="text-un" data-toggle="modal"
                                        data-target="#exampleModal">Terms &amp; Conditions</a>
                                </label>
                            </div>
                            <div class=" text-center">
                                <button type="submit" class="btn btn-success">&nbsp; &nbsp; Submit
                                    &nbsp; &nbsp;</button>
                            </div>
                        </form>
                    </div>
                    <!-- end form -->
                </div>
            </div>
        </section>
    </body>
    <!-- END BODY -->
</x-guest-layout>
