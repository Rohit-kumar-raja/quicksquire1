<x-adminlayout>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-sm-6">
                    <h2>Update Wallet</h2>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active"> Wallet</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div>
        <div class="container" style="padding:30px 0;">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <form action="" method="POST" class="form-horizontal">
                            @csrf
                            <input disabled type="hidden" name="updated_at" value="{{ date('Y-m-d h:m:s') }}" id="">
                            <div class="row  p-2">
                                <div class="col-md-4">
                                    <label for="min" class=" control-label">name</label>
                                    <input disabled value="{{ $data->name }}" required placeholder="City Name"
                                        class="form-control" type="text" name="city" id="city">
                                </div>
                                <div class="col-md-4">
                                    <label for="min" class=" control-label"> email</label>
                                    <input disabled value="{{ $data->email }}" class="form-control"
                                        placeholder="District Name" type="text" name="district" id="district">
                                </div>
                                <div class="col-md-4">
                                    <label for="min" class=" control-label">phone</label>
                                    <input disabled value="{{ $data->phone ?? '' }}" placeholder=" Phone Number "
                                        class="form-control" type="text" name="state" id="state">
                                </div>
                            

                                {{-- details start from --}}
                                <div class="col-md-4">
                                    <label for="min" class=" control-label">line1</label>
                                    <textarea disabled placeholder="Country Name "
                                        class="form-control" >{{ $details->line1 ?? '' }}</textarea>
                                </div>
                                <div class="col-md-4">
                                    <label for="min" class=" control-label">line1</label>
                                    <textarea disabled placeholder="Country Name "
                                        class="form-control" >{{ $details->line1 ?? '' }}</textarea>
                                </div>
                                <div class="col-md-4">
                                    <label for="min" class=" control-label">city</label>
                                    <input disabled value="{{ $details->city ?? '' }}" placeholder="Country Name "
                                        class="form-control" type="text" name="country" id="country">
                                </div>
                                <div class="col-md-4">
                                    <label for="min" class=" control-label">country</label>
                                    <input disabled value="{{ $details->country ?? '' }}" placeholder="Country Name "
                                        class="form-control" type="text" name="country" id="country">
                                </div>

                                <div class="col-md-4">
                                    <label for="min" class=" control-label">zipcode</label>
                                    <input disabled value="{{ $details->zipcode ?? '' }}" placeholder="Country Name "
                                        class="form-control" type="text" name="country" id="country">
                                </div>
                                <div class="col-md-4">
                                    <label for="min" class=" control-label">Profile Image</label>
                                    <img src="{{ asset('assets/pages/img/profile/') }}/{{ $details->image ?? '' }}"
                                                        width="200">
                                </div>

                             

                                {{-- details end here --}}

                            </div>
                            <hr>
                            <div class="form-group mt-4 text-center">
                                <a href="{{ route('admin.users') }}" class="btn btn-primary btn-sm ">Back</a>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-adminlayout>
