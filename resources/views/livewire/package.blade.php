<x-guest-layout>
    <link rel="stylesheet" href="{{ asset('assets/pages/css/package.css') }}">
    <div class="pricing-table pricing-three-column row">
      @foreach ( $packages as $data )
      <div class="plan col-sm-3 col-lg-3 mb-4">
        <div class="plan-name-bronze" style="background-color:#{{ rand(100,999) }}">
            <h2>{{ $data->package_name }}</h2>
            <span>₹ {{ $data->basic_price }} for {{ $data->duration }} Year</span>
        </div>
        <ul>
            <li class="plan-feature"> Product Range {{ $data->price_from}} to {{ $data->proce_to }}</li>
            <li class="plan-feature">{{ $data->item }}</li>
            <li class="plan-feature"><a href="{{ route('amc.package.details',$data->id) }}" class="btn btn-primary btn-plan-select"><i
                        class="icon-white icon-ok"></i> Select</a></li>
        </ul>
    </div>
      @endforeach

    </div>

</x-guest-layout>
