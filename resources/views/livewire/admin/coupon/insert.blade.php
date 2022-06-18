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

                <form action="{{ route('admin.wallet.add') }}" method="POST" class="form-horizontal">
                    @csrf
                    <input type="hidden" name="created_at" value="{{ date('Y-m-d h:m:s') }}" id="">
                    <div class="row  p-2">

                        <div class="col-md-4">
                            <label for="slug" class=" control-label">Parent Category</label>
                            <select required class="form-control input-md" name="category_id">
                                <option value="">Select Parent Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">
                                        {{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="min" class=" control-label"> Max Cart Value</label>
                            <input required placeholder="Max ex- 10000" class="form-control" type="number" name="max"
                                id="min">
                        </div>
                        <div class="col-md-4">
                            <label for="min" class=" control-label">Min Cart Value</label>
                            <input required placeholder="Min ex- 20000" class="form-control" type="number" name="min"
                                id="min">
                        </div>
                        <div class="col-md-4">
                            <label for="min" class=" control-label"> Gain By Percentage(%)</label>
                            <input  class="form-control" placeholder="Ex - 5%" type="number"
                                name="gain_by_per" id="min">
                        </div>
                        <div class="col-md-4">
                            <label for="min" class=" control-label">redeem By Percenttage(%)</label>
                            <input  placeholder="Maximum cart coin ex - 100 " class="form-control"
                                type="number" name="redeem_by_per" id="min">
                        </div>
                        <div class="col-md-4">
                            <label for="min" class=" control-label">Flat Gain Coin</label>
                            <input  placeholder="Flat cart coin ex - 100 " class="form-control" type="number"
                                name="flat_gain" id="min">
                        </div>
                        <div class="col-md-4">
                            <label for="min" class=" control-label">Flat Redeem Coin</label>
                            <input  placeholder="Flat cart coin ex - 100 " class="form-control" type="number"
                                name="flat_use" id="min">
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
    function slug1(data) {
        document.getElementById('slug').value = data.toLowerCase();
    }
</script>
