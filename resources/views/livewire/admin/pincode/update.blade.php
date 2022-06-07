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
                        <form action="{{ route('admin.pincode.update', $data->id) }}" method="POST"
                            class="form-horizontal">
                            @csrf
                            <input type="hidden" name="updated_at" value="{{ date('Y-m-d h:m:s') }}" id="">
                            <div class="row  p-2">

                                <div class="col-md-4">
                                    <label for="pincode" class=" control-label">Pincode</label>
                                    <input value="{{ $data->pincode}}" required onclick="check_pincode(this.value)"
                                        onkeyup="check_pincode(this.pincode)" placeholder="Pincode No ex- 824125"
                                        class="form-control" type="text" name="pincode" id="pincode">
                                </div>
                                <div class="col-md-4">
                                    <label for="min" class=" control-label">City</label>
                                    <input value="{{ $data->city}}" required placeholder="City Name" class="form-control" type="text"
                                        name="city" id="city">
                                </div>
                                <div class="col-md-4">
                                    <label for="min" class=" control-label"> District</label>
                                    <input value="{{ $data->district}}" class="form-control" placeholder="District Name" type="text"
                                        name="district" id="district">
                                </div>
                                <div class="col-md-4">
                                    <label for="min" class=" control-label">State</label>
                                    <input value="{{ $data->state}}" placeholder="Maximum cart coin ex - 100 " class="form-control" type="text"
                                        name="state" id="state">
                                </div>
                                <div class="col-md-4">
                                    <label for="min" class=" control-label">Country</label>
                                    <input  value="{{ $data->country}}" placeholder="Country Name " class="form-control" type="text" name="country"
                                        id="country">
                                </div>

                                <div class="col-md-4">
                                    <label for="min" class=" control-label">Status</label>
                                    <select required placeholder="Flat cart coin ex - 100 " class="form-control"
                                        name="status">
                                        <option value="1">Active</option>
                                        <option value="0">Deactivate</option>

                                    </select>
                                </div>

                            </div>
                            <hr>
                            <div class="form-group mt-4 text-center">
                                <button type="submit" class="btn btn-primary btn-sm ">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function check_pincode(pincode) {
            console.log(pincode);
            if (pincode.length == 6) {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    data = this.responseText;
                    var data = JSON.parse(data);
                    document.getElementById('state').value = data[0].PostOffice[0].State
                    document.getElementById('city').value = data[0].PostOffice[0].Block
                    document.getElementById('country').value = data[0].PostOffice[0].Country
                    document.getElementById('district').value = data[0].PostOffice[0].District
                    document.getElementById('pincode').style.borderColor = 'green';
                }
                xmlhttp.open("GET", "https://api.postalpincode.in/pincode/" + pincode);
                xmlhttp.send();
            } else {
                document.getElementById('state').value = '';
                document.getElementById('city').value = '';
                document.getElementById('pincode').style.borderColor = 'red';
            }
        }
    </script>

</x-adminlayout>
