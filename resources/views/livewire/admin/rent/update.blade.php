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
                        <form action="{{ route('admin.brand.update', $data->id) }}" method="POST" enctype="multipart/form-data"
                            class="form-horizontal">
                            @csrf
                            <input type="hidden" name="updated_at" value="{{ date('Y-m-d h:m:s') }}" id="">
                            <div class="row  p-2">
                                <div class="form-group col-sm-4">
                                    <label class=" control-label">Brand Title</label>
                                    <div>
                                        <input type="text" value="{{ $data->title}}" class="form-control input-md" placeholder="Title"
                                            name="title">
                                    </div>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label class=" control-label">Brand Subtitle</label>
                                    <div>
                                        <input type="text" value="{{ $data->subtitle }}" class="form-control input-md" placeholder="Subtitle"
                                            name="subtitle">
                                    </div>
                                </div>
                                {{-- <div class="form-group col-sm-4">
                                    <label class=" control-label">Brand Link</label>
                                    <div>
                                        <input type="text" class="form-control input-md" placeholder="Link" name="link">
                                    </div>
                                </div> --}}
                                <div class="form-group col-sm-4">
                                    <label class=" control-label">Brand Image</label>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <input type="file" accept="image/*" class="form-control" name="image">

                                        </div>
                                        <div class="col-sm-6">
                                            <img src="{{ asset('assets/pages/img/brands') }}/{{ $data->image }}"
                                            class="img-fluid">
                                        </div>


                                    </div>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label class=" control-label">Status</label>
                                    <div>
                                        <select class="form-control" name="status">
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center p-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
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
