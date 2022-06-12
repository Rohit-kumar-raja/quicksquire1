<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">

                            <div class="row">
                                <i class="fas fa-list"></i>
                                <div>
                                    Edit Product
                                </div>

                            </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                        @endif
                        <form action="" class="form-horizontal" enctype="multipart/form-data"
                            wire:submit.prevent="updateProduct">
                            <div class="row p-3">
                                <div class="form-group col-sm-4">
                                    <label class=" control-label">Product Name:</label>
                                    <div>
                                        <input type="text" class="form-control input-md" placeholder="Product Name"
                                            wire:model="name" wire:keyup="generateSlug" />
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label class=" control-label">Product Slug:</label>
                                    <div>
                                        <input type="text" class="form-control input-md" placeholder="Product Slug"
                                            wire:model="slug" />
                                        @error('slug')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label class=" control-label">Product Brand:</label>
                                    <div>
                                        <select class="form-control" wire:model="brand">
                                            <option selected disabled>Select Brand</option>
                                            @foreach ($brands as $brand)
                                            <option value="{{ $brand->subtitle }}">{{ $brand->title }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('brand')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label class=" control-label">Short Description:</label>
                                    <div wire:ignore>
                                        <textarea class="form-control input-md ckeditor" id="short_description" placeholder="Short Description"
                                            wire:model="short_description"></textarea>
                                        @error('short_description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label class=" control-label">Description:</label>
                                    <div wire:ignore>
                                        <textarea class="form-control input-md ckeditor" id="description" placeholder="Description"
                                            wire:model="description"></textarea>
                                        @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label class=" control-label">Regular Price:</label>
                                    <div>
                                        <input type="text" class="form-control input-md" placeholder="Regular Price"
                                            wire:model="regular_price" />
                                        @error('regular_price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label class=" control-label">Sale Price:</label>
                                    <div>
                                        <input type="text" class="form-control input-md" placeholder="Sale Price"
                                            wire:model="sale_price" />
                                        @error('sale_price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label class=" control-label">SKU:</label>
                                    <div>
                                        <input type="text" class="form-control input-md" placeholder="SKU"
                                            wire:model="SKU" />
                                        @error('SKU')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label class=" control-label">Stock Status:</label>
                                    <div>
                                        <select class="form-control" wire:model="stock_status">
                                            <option value="instock">In Stock</option>
                                            <option value="outofstock">Out of Stock</option>
                                        </select>
                                        @error('stock_status')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label class=" control-label">Featured:</label>
                                    <div>
                                        <select class="form-control" wire:model="featured">
                                            <option value="0">No</option>
                                            <option value="1">Yes</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label class=" control-label">Quantity</label>
                                    <div>
                                        <input type="text" class="form-control input-md" placeholder="Quantity"
                                            wire:model="quantity" />
                                    </div>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label class=" control-label">Product Image:</label>
                                    <div>
                                        <input type="file" class="input-file" wire:model="newimage" />
                                        @if ($newimage)
                                            <img src="{{ $newimage->temporaryUrl() }}" alt="" width="100" />
                                        @else
                                            <img src="{{ asset('assets/pages/img/products') }}/{{ $image }}"
                                                alt="" width="200" />
                                        @endif
                                        @error('newimage')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label class=" control-label">Product Gallery:</label>
                                    <div>
                                        <input type="file" class="input-file" wire:model="newimages" multiple />
                                        @if ($newimages)
                                            @foreach ($newimages as $newimage)
                                                @if ($newimage)
                                                    <img src="{{ $newimage->temporaryUrl() }}" alt="" width="100" />
                                                @endif
                                            @endforeach
                                        @else
                                            @foreach ($images as $image)
                                                @if ($image)
                                                    <img src="{{ asset('assets/pages/img/products') }}/{{ $image }}"
                                                        alt="" width="100" />
                                                @endif
                                            @endforeach
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group col-sm-4">
                                    <label class=" control-label">Category:</label>
                                    <div>
                                        <select class="form-control" wire:model="category_id"
                                            wire:chnage="changeSubcategory">
                                            <option value="">Select Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label class=" control-label">Subategory:</label>
                                    <div>
                                        <select class="form-control" wire:model="scategory_id">
                                            <option value="0">Select Subategory</option>
                                            @foreach ($scategories as $scategory)
                                                <option value="{{ $scategory->id }}">{{ $scategory->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('scategory_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group  col-sm-4">
                                    <label class=" control-label">Feature:</label>
                                    <div class="">
                                        <select multiple data-live-search="true" name="featured[]" wire:modal="featured"
                                            class=" selectpicker form-control">
                                            <option value="0">Select Feature</option>
                                            @foreach ($features as $feature)
                                                <option value="{{ $feature->id }}">{{ $feature->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('feature_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group text-center ">
                                <label class=" control-label"></label>
                                <div>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/js/bootstrap-select.js"></script>

<style>
 .form-horizontal .form-group {
    margin-right: 0px;
    margin-left: 0px;
}
.dropdown-menu {
    min-height: 300px!important;
    max-height: 300px !important;
}
</style>
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
