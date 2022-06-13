<x-adminlayout>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-sm-6">
                    <h2>Update Orders</h2>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active"> Orders</li>
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
                        <form action="{{ route('admin.orders.update', $data->id) }}" method="POST"
                            class="form-horizontal">
                            @csrf
                            <input type="hidden" name="updated_at" value="{{ date('Y-m-d h:m:s') }}" id="">
                            <div class="row  p-2">

                                <div class="col-md-4">
                                    <label for="pincode" class=" control-label">Tranking id</label>
                                    <input value="{{ $data->traking_id ?? '' }}"
                                        placeholder="Enter Consigment or Traking id" class="form-control" type="text"
                                        name="traking_id" id="pincode">
                                </div>

                                <div class="col-md-4">
                                    <label for="min" class=" control-label">Status</label>
                                    <select required placeholder="Flat cart coin ex - 100 " class="form-control"
                                        name="status">
                                        @if ($data->status != '')
                                            <option value="{{ $data->status }}">{{ $data->status }}</option>
                                        @else
                                            <option selected disabled> - Select Status - </option>
                                        @endif
                                        <option value="dispatched">dispatched</option>
                                        <option value="delivered">delivered</option>
                                        <option value="canceled">canceled</option>
                                        <option value="padding">padding</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="delivered_date" class=" control-label">Delivered Date</label>
                                    <input value="{{ $data->delivered_date }}" class="form-control" type="date"
                                        name="delivered_date" id="delivered_date">
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
</x-adminlayout>
