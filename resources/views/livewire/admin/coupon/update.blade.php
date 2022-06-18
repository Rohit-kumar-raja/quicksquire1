<x-adminlayout>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-sm-6">
                    <h2>Update Coupon</h2>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active"> Coupon</li>
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
                        <form action="{{ route('admin.coupon.update',$data->id) }}" method="POST" class="form-horizontal">
                            @csrf
                            <input type="hidden" name="created_at" value="{{ date('Y-m-d h:m:s') }}" id="">
                            <div class="row  p-2">

                                <div class="col-md-4">
                                    <label for="slug" class=" control-label">Parent Category</label>
                                    <select required class="form-control input-md" name="category_id">
                                        <option value="{{ $data->category_id}}" >{{ DB::table('categories')->find($data->category_id)->name ?? ''}}</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">
                                                {{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label for="min" class=" control-label"> Coupon Name </label>
                                    <input required placeholder=" Coupon Name" class="form-control" type="text"
                                      value="{{ $data->coupon_name }}"  name="coupon_name" id="coupon_name">
                                </div>
                                <div class="col-md-4">
                                    <label for="min" class=" control-label"> Link </label>
                                    <input required placeholder="Max ex- 10000" class="form-control" type="text"
                                    value="{{ $data->link }}"    name="link" id="link">
                                </div>
                                <div class="col-md-4">
                                    <label for="min" class=" control-label"> Banner Image </label>
                                   <div class="row">
                                    <div class="col-6"> <input accept="image/*" class="form-control" type="file" name="images" id="min"></div>
                                    <div class="col-6">
                                        <img src="{{ asset('assets/pages/img/coupon/'.$data->images) }}" alt="">
                                    </div>
                                   </div>
                                </div>

                                <div class="col-md-4">
                                    <label for="min" class=" control-label">Min Cart Value</label>
                                    <input required  value="{{ $data->min}}" placeholder="Min ex- 20000" class="form-control" type="number"
                                        name="min" id="min">
                                </div>
                                <div class="col-md-4">
                                    <label for="min" class=" control-label"> Max Cart Value</label>
                                    <input required value="{{ $data->max}}" placeholder="Max ex- 10000" class="form-control" type="number"
                                        name="max" id="min">
                                </div>
                                <div class="col-md-4">
                                    <label for="min" class=" control-label"> Gain By Percentage(%)</label>
                                    <input  class="form-control"  value="{{ $data->gain_by_per}}" placeholder="Ex - 5%" type="number"
                                        name="gain_by_per" id="min">
                                </div>
                                <div class="col-md-4">
                                    <label for="min" class=" control-label">redeem By Percenttage(%)</label>
                                    <input  placeholder="Maximum cart coin ex - 100 "  value="{{ $data->redeem_by_per}}" class="form-control"
                                        type="number" name="redeem_by_per" id="min">
                                </div>
                                <div class="col-md-4">
                                    <label for="min" class=" control-label">Flat Gain Coin</label>
                                    <input  placeholder="Flat cart coin ex - 100 "  value="{{ $data->flat_gain}}" class="form-control"
                                        type="number" name="flat_gain" id="min">
                                </div>
                                <div class="col-md-4">
                                    <label for="min" class=" control-label">Flat Redeem Coin</label>
                                    <input  placeholder="Flat cart coin ex - 100 "  value="{{ $data->flat_use}}" class="form-control"
                                        type="number" name="flat_use" id="min">
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
        function slug1(data) {
            document.getElementById('slug').value = data.toLowerCase();
        }
    </script>

</x-adminlayout>
