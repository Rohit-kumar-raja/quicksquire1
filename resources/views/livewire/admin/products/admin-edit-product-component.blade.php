<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">

                            <div class="row">
                                <i class="fas fa-list"></i>
                                <div class="col-md-6">
                                    Edit Product
                                </div>

                            </div>
                    </div>
                    <div class="panel-body">
                        @if(Session::has('message'))
                        <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                        @endif
                        <form action="" class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="updateProduct">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Product Name:</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control input-md" placeholder="Product Name" wire:model="name" wire:keyup="generateSlug" />
                                    @error('name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Product Slug:</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control input-md" placeholder="Product Slug" wire:model="slug" />
                                    @error('slug')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Short Description:</label>
                                <div class="col-md-6" wire:ignore>
                                    <textarea class="form-control input-md" id="short_description" placeholder="Short Description" wire:model="short_description"></textarea>
                                    @error('short_description')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Description:</label>
                                <div class="col-md-6" wire:ignore>
                                    <textarea class="form-control input-md" id="description" placeholder="Description" wire:model="description"></textarea>
                                    @error('description')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Regular Price:</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control input-md" placeholder="Regular Price" wire:model="regular_price" />
                                    @error('regular_price')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Sale Price:</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control input-md" placeholder="Sale Price" wire:model="sale_price" />
                                    @error('sale_price')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">SKU:</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control input-md" placeholder="SKU" wire:model="SKU" />
                                    @error('SKU')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Stock Status:</label>
                                <div class="col-md-6">
                                    <select class="form-control" wire:model="stock_status">
                                        <option value="instock">In Stock</option>
                                        <option value="outofstock">Out of Stock</option>
                                    </select>
                                    @error('stock_status')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Featured:</label>
                                <div class="col-md-6">
                                    <select class="form-control" wire:model="featured">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Quantity</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control input-md" placeholder="Quantity" wire:model="quantity" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Product Image:</label>
                                <div class="col-md-6">
                                    <input type="file" class="input-file" wire:model="newimage" />
                                    @if($newimage)
                                    <img src="{{$newimage->temporaryUrl()}}" alt="" width="100" />
                                    @else
                                    <img src="{{asset('assets/pages/img/products')}}/{{$image}}" alt="" width="200" />
                                    @endif
                                    @error('newimage')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Product Gallery:</label>
                                <div class="col-md-6">
                                    <input type="file" class="input-file" wire:model="newimages" multiple />
                                    @if($newimages)
                                    @foreach($newimages as $newimage)
                                    @if($newimage)
                                    <img src="{{$newimage->temporaryUrl()}}" alt="" width="100" />
                                    @endif
                                    @endforeach
                                    @else
                                    @foreach($images as $image)
                                    @if($image)
                                    <img src="{{asset('assets/pages/img/products')}}/{{$image}}" alt="" width="100" />
                                    @endif
                                    @endforeach
                                    @endif
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-4 control-label">Category:</label>
                                <div class="col-md-6">
                                    <select class="form-control" wire:model="category_id" wire:chnage="changeSubcategory">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Subategory:</label>
                                <div class="col-md-6">
                                    <select class="form-control" wire:model="scategory_id">
                                        <option value="0">Select Subategory</option>
                                        @foreach ($scategories as $scategory)
                                        <option value="{{$scategory->id}}">{{$scategory->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('scategory_id')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
    $(function() {
        tinymce.init({
            selector: "#short_description",
            setup: function(editor) {
                editor.on('Change', function(e) {
                    tinyMCE.triggerSave();
                    var sd_data = $('#short_description').val();
                    @this.set('short_description', sd_data);
                });
            }
        })
        tinymce.init({
            selector: "#description",
            setup: function(editor) {
                editor.on('Change', function(e) {
                    tinyMCE.triggerSave();
                    var d_data = $('#description').val();
                    @this.set('description', d_data);
                });
            }
        })
    });
</script>

@endpush