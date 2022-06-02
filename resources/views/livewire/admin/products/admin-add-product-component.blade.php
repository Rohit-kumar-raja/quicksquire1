<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">

                            <div class="row">
                                <i class="fas fa-list"></i>
                                <div class="">
                                    Add New Product
                                </div>
                                <!-- <div class="">
                                    <a href="{{ route('admin.products') }}" class="btn btn-success pull-right">All Products</a>
                                </div> -->
                            </div>
                    </div>
                    <div class="panel-body ">
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                        @endif
                        <form action="" class="form-horizontal" enctype="multipart/form-data"
                            wire:submit.prevent="addProduct">
                            <div class="row p-3">
                                <div class="form-group  col-sm-4">
                                    <label class=" control-label">Product Name:</label>
                                    <div class="">
                                        <input type="text" class="form-control input-md" placeholder="Product Name"
                                            wire:model="name" wire:keyup="generateSlug" />
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group  col-sm-4">
                                    <label class=" control-label">Product Slug:</label>
                                    <div class="">
                                        <input type="text" class="form-control input-md" placeholder="Product Slug"
                                            wire:model="slug" />
                                        @error('slug')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group  col-sm-4">
                                    <label class=" control-label">Short Description:</label>
                                    <div class="" wire:ignore>
                                        <textarea class="form-control input-md" id="short_description" placeholder="Short Description"
                                            wire:model="short_description"></textarea>
                                        @error('short_description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group  col-sm-4">
                                    <label class=" control-label">Description:</label>
                                    <div class="" wire:ignore>
                                        <textarea class="form-control input-md" id="description" placeholder="Description" wire:model="description"></textarea>
                                        @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group  col-sm-4">
                                    <label class=" control-label">Regular Price:</label>
                                    <div class="">
                                        <input type="text" class="form-control input-md" placeholder="Regular Price"
                                            wire:model="regular_price" />
                                        @error('regular_price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group  col-sm-4">
                                    <label class=" control-label">Sale Price:</label>
                                    <div class="">
                                        <input type="text" class="form-control input-md" placeholder="Sale Price"
                                            wire:model="sale_price" />
                                        @error('sale_price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group  col-sm-4">
                                    <label class=" control-label">SKU:</label>
                                    <div class="">
                                        <input type="text" class="form-control input-md" placeholder="SKU"
                                            wire:model="SKU" />
                                        @error('SKU')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group  col-sm-4">
                                    <label class=" control-label">Stock Status:</label>
                                    <div class="">
                                        <select class="form-control" wire:model="stock_status">
                                            <option value="instock">In Stock</option>
                                            <option value="outofstock">Out of Stock</option>
                                        </select>
                                        @error('stock_status')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group  col-sm-4">
                                    <label class=" control-label">GST :</label>
                                    <div class="">
                                        <!--<input type="text" class="form-control input-md" placeholder="GST" wire:model="GST" />-->
                                        <select class="form-control" wire:model="GST">
                                            <option value="0">Choose GST</option>
                                            <option value="5">5%</option>
                                            <option value="12">12%</option>
                                            <option value="18">18%</option>
                                            <option value="28">28%</option>
                                        </select>
                                        @error('GST')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group  col-sm-4">
                                    <label class=" control-label">HSN No. :</label>
                                    <div class="">
                                        <input type="text" class="form-control input-md" placeholder="HSN No."
                                            wire:model="HSN_No" />
                                        @error('HSN_No')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group  col-sm-4">
                                    <label class=" control-label">Featured:</label>
                                    <div class="">
                                        <select class="form-control" wire:model="featured">
                                            <option value="0">No</option>
                                            <option value="1">Yes</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="form-group  col-sm-4">
                                    <label class=" control-label">Quantity</label>
                                    <div class="">
                                        <input type="text" class="form-control input-md" placeholder="Quantity"
                                            wire:model="quantity" />
                                        @error('quantity')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group  col-sm-4">
                                    <label class=" control-label">Product Image:</label>
                                    <div class="">
                                        <input type="file" class="input-file" wire:model="image" />
                                        @if ($image)
                                            <img src="{{ $image->temporaryUrl() }}" alt="" width="200" />
                                        @endif
                                        @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group  col-sm-4">
                                    <label class=" control-label">Product Gallery:</label>
                                    <div class="">
                                        <input type="file" class="input-file" wire:model="images" multiple />
                                        @if ($images)
                                            @foreach ($images as $image)
                                                <img src="{{ $image->temporaryUrl() }}" alt="" width="200" />
                                            @endforeach
                                        @endif
                                        @error('images')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group  col-sm-4">
                                    <label class=" control-label">Category:</label>
                                    <div class="">
                                        <select class="form-control" wire:model="category_id"
                                            wire:change="changeSubcategory">
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
                                <div class="form-group  col-sm-4">
                                    <label class=" control-label">Subategory:</label>
                                    <div class="">
                                        <select class="form-control" wire:model="scategory_id">
                                            <option value="0">Select Subategory</option>
                                            @foreach ($scategories as $scategory)
                                                <option value="{{ $scategory->id }}">{{ $scategory->name }}
                                                </option>
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
                                        <select class="form-control">
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
                            <div class="form-group  col-sm-4">
                                <label class=" control-label"></label>
                                <div class="">
                                    <button type="submit" class="btn btn-primary"> Submit</button>
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
