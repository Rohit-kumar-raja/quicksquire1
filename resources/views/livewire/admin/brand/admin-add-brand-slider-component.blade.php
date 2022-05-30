<section class="content-header">
    <div class="container-fluid">
        <div class="row ">
            <div class="col-sm-6">
                <h2>Add Brand</h2>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active"> Brand</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading row pb-4">
                        <div class="col-sm-9">
                            Add New Brand
                        </div>
                        <div class="col-sm-2" >
                            <a href="{{ route('admin.brand') }}" class="btn btn-secondary btn-sm "> <i class="fa fa-arrow-left" aria-hidden="true"></i> All Brands</a>
                        </div>
                    </div>
                </div>
                <div class="panel-body card p-3">
                    @if (Session::has('message'))
                        <div class="alert alert-success">
                            {{ Session::get('message') }}
                        </div>
                    @endif
                    <form action="" class="form-horizontal" wire:submit.prevent="addSlide">
                        <div class="row">
                            <div class="form-group col-sm-4">
                                <label class=" control-label">Brand Title</label>
                                <div>
                                    <input type="text" class="form-control input-md" placeholder="Title"
                                        wire:model="title">
                                </div>
                            </div>
                            <div class="form-group col-sm-4">
                                <label class=" control-label">Brand Subtitle</label>
                                <div>
                                    <input type="text" class="form-control input-md" placeholder="Subtitle"
                                        wire:model="subtitle">
                                </div>
                            </div>
                            <div class="form-group col-sm-4">
                                <label class=" control-label">Brand Link</label>
                                <div>
                                    <input type="text" class="form-control input-md" placeholder="Link"
                                        wire:model="link">
                                </div>
                            </div>
                            <div class="form-group col-sm-4">
                                <label class=" control-label">Brand Image</label>
                                <div>
                                    <input type="file" class="input-file" wire:model="image">
                                    @if ($image)
                                        <img src="{{ $image->temporaryUrl() }}" width="120">
                                    @endif
                                </div>
                            </div>
                            <div class="form-group col-sm-4">
                                <label class=" control-label">Status</label>
                                <div>
                                    <select class="form-control" wire:model="status">
                                        <option value="0">Inactive</option>
                                        <option value="1">Active</option>
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
