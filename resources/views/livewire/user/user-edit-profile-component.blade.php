<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>Update Profile</h2>
                </div>
                <div class="panel-body">
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <form action="{{ route('user.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-4">
                            @if ($newimage)
                                <img src="{{ $newimage->temporaryUrl() }}" width="100%" alt="">
                            @elseif($image)
                                <img src="{{ asset('assets/pages/img/profile/') }}/{{ $user->profile->image }}"
                                    width="100%" alt="">
                            @else
                                <img src="{{ asset('assets/images/profile/User-Profile-PNG.png') }}" width="100%"
                                    alt="">
                            @endif
                            <input type="file" class="form-control" name="newimage">
                        </div>
                        <div class="col-md-8">
                            <p><b>Name: </b> <input type="text" class="form-control" name="name" value="{{ $user->name}}" ></p>
                            <p><b>Email: </b> {{ $email }}</p>
                            <p><b>Phone: </b> <input type="text" class="form-control" value="{{ $user->phone }}" name="mobile"></p>
                            <hr>
                            <p><b>Line1: </b> <input type="text" class="form-control" value="{{ $profile->line1 }}" name="line1"></p>
                            <p><b>Line2: </b> <input type="text" class="form-control" value="{{ $profile->line2 }}" name="line2"></p>
                            <p><b>City: </b> <input type="text" class="form-control" value="{{ $profile->city }}" name="city"></p>
                            <p><b>Province: </b> <input type="text" class="form-control" value="{{ $profile->province }}" name="province"></p>
                            <p><b>Country: </b> <input type="text" class="form-control" value="{{ $profile->country }}" name="country"></p>
                            <p><b>Postal Code: </b> <input type="text" class="form-control" value="{{ $profile->zipcode }}" name="zipcode"></p>
                            <button type="submit" class="btn btn-info pull-right">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
