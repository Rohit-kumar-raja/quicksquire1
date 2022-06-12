<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Wallet <i class="fas fa-wallet    "></i>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="{{ route('admin.pincode.add') }}" method="POST" class="form-horizontal">
                    @csrf
                    <input type="hidden" name="created_at" value="{{ date('Y-m-d h:m:s') }}" id="">
                    <div class="row  p-2">


                        <div class="col-md-4">
                            <label for="pincode" class=" control-label">Pincode</label>
                            <input required onkeyup="check_pincode(this.value)" placeholder="Pincode No ex- 824125" class="form-control" type="text"
                                name="pincode" id="pincode">
                        </div>
                        <div class="col-md-4">
                            <label for="min" class=" control-label">City</label>
                            <input required placeholder="City Name" class="form-control" type="text" name="city"
                                id="city">
                        </div>
                        <div class="col-md-4">
                            <label for="min" class=" control-label"> District</label>
                            <input class="form-control" placeholder="District Name" type="text" name="district"
                                id="district">
                        </div>
                        <div class="col-md-4">
                            <label for="min" class=" control-label">State</label>
                            <input placeholder="Maximum cart coin ex - 100 " class="form-control" type="text"
                                name="state" id="state">
                        </div>
                        <div class="col-md-4">
                            <label for="min" class=" control-label">Country</label>
                            <input placeholder="Country Name " class="form-control" type="text" name="country"
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
