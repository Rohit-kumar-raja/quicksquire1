<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                <a href="{{route('admin.brand')}}" class="btn btn-success">All Brands</a>
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.addbrand')}}" class="btn btn-primary pull-right">Add New Brand</a>
                            </div>

                            <div class="panel-body">
                                @if (session('message'))
                                <div class="alert alert-success">
                                    {{ session('message') }}
                                </div>
                                @endif
                                <form action="" class="form-horizontal" wire:submit.prevent="addBrand">
                                    <div class="form-group">
                                        <label class="col-md-4 ontrol-label">Brand Name</label>
                                        <div class="col-md-4">
                                            <input type="text" placeholder="Brand Name" class="form-control input-md" wire:model="brand_name" wire:keyup="generateslug">
                                            @error('brand_name')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 ontrol-label">Brand Slug</label>
                                        <div class="col-md-4">
                                            <input type="text" placeholder="Brand Slug" class="form-control input-md" wire:model="brand_slug">
                                            @error('brand_slug')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 ontrol-label">Brand Image</label>
                                        <div class="col-md-4">
                                            <input type="file" class="imput-file" wire:model="brand_image">
                                            @if($brand_image)
                                            <img src="{{ $brand_image->temporaryUrl()}}" alt="" width="100">
                                            @endif
                                            @error('brand_image')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-4">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>