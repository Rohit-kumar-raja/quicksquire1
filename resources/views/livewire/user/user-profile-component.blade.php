<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>Profile</h2>
                </div>
                <div class="panel-body">
                    <div class="col-md-4">
                        @if($user->profile->image)
                        <img src="{{asset('assets/pages/img/profile/')}}/{{$profile->image}}" width="100%" alt="">
                        @else
                        <img src="{{asset('assets/images/profile/User-Profile-PNG.png')}}" width="100%" alt="">
                        @endif
                    </div>
                    <div class="col-md-8">
                        <p><b>Name: </b> {{$user->name}}</p>
                        <p><b>Email: </b> {{$user->email}}</p>
                        <p><b>Phone: </b> {{$user->phone}}</p>
                        <hr>
                        <p><b>Line1: </b> {{$profile->line1}}</p>
                        <p><b>Line2: </b> {{$profile->line2}}</p>
                        <p><b>City: </b> {{$profile->city}}</p>
                        <p><b>Province: </b> {{$profile->province}}</p>
                        <p><b>Country: </b> {{$profile->country}}</p>
                        <p><b>Postal Code: </b> {{$profile->zipcode}}</p>
                        <a href="{{route('user.editprofile')}}" class="btn btn-info pull-right">Update Profile</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>