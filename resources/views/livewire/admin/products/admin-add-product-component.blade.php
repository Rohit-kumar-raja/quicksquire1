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
                        <form action="{{ route('admin.addproduct.store') }}" method="POST" class="form-horizontal"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row p-3">
                                <div class="form-group  col-sm-4">
                                    <label class=" control-label">Product Name:</label>
                                    <div class="">
                                        <input type="text" onkeyup="slug1(this.value)" class="form-control input-md" name="name"
                                            placeholder="Product Name"  />
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group  col-sm-4">
                                    <label class=" control-label">Product Slug:</label>
                                    <div class="">
                                        <input id="slug" type="text" class="form-control input-md" placeholder="Product Slug"
                                            name="slug" placeholder="slug" />
                                        @error('slug')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label class=" control-label">Product Brand:</label>
                                    <div>
                                        <select name="brand" class="form-control" 
                                        >
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
                                <div class="form-group  col-sm-12">
                                    <label class=" control-label">Short Description:</label>
                                    <div class="" wire:ignore>
                                        <textarea name="short_description" class="form-control input-md ckeditor " id="short_description"
                                            placeholder="Short Description" placeholder="short_description"></textarea>
                                        @error('short_description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group  col-sm-12">
                                    <label class=" control-label">Description:</label>
                                    <div class="" wire:ignore>
                                        <textarea name="description" class="form-control ckeditor input-md" id="description" placeholder="Description"
                                            placeholder="description"></textarea>
                                        @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group  col-sm-4">
                                    <label class=" control-label">Regular Price:</label>
                                    <div class="">
                                        <input name="regular_price" type="text" class="form-control  input-md"
                                            placeholder="Regular Price" placeholder="regular_price" />
                                        @error('regular_price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group  col-sm-4">
                                    <label class=" control-label">Sale Price:</label>
                                    <div class="">
                                        <input name="sale_price" type="text" class="form-control input-md"
                                            placeholder="Sale Price" placeholder="sale_price" />
                                        @error('sale_price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group  col-sm-4">
                                    <label class=" control-label"> Bajaj Image </label>
                                    <div class=""> 
                                        <input name="SKU" accept="image/*" type="file" class="form-control input-md" placeholder="SKU"
                                            placeholder="SKU" />
                                          
                                        @error('images')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                       @error('SKU')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group  col-sm-4">
                                    <label class=" control-label"> Bajaj Link </label>
                                    <div class=""> 
                                        <input name="featured"  type="text" class="form-control input-md" placeholder=" Bajaj link"
                                            placeholder="featured" />
                                       @error('featured')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group  col-sm-4">
                                    <label class=" control-label">Stock Status:</label>
                                    <div class="">
                                        <select name="stock_status" class="form-control" 
                                        >
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
                                        <!--<input type="text" class="form-control input-md" placeholder="GST" placeholder="GST" />-->
                                        <select name="GST" class="form-control" placeholder="GST">
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
                                        <input name="HSN_No" type="text" class="form-control input-md"
                                            placeholder="HSN No." placeholder="HSN_No" />
                                        @error('HSN_No')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                              
                                <div class="form-group  col-sm-4">
                                    <label class=" control-label">Quantity</label>
                                    <div class="">
                                        <input name="quantity" type="text" class="form-control input-md"
                                            placeholder="Quantity" placeholder="quantity" />
                                        @error('quantity')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group  col-sm-4">
                                    <label class=" control-label">Product Image:</label>
                                    <div class="">
                                        <input name="image[]" accept="image/*" type="file" class="input-file form-control "
                                            />
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
                                        <input name="images[]" accept="image/*" type="file" class="input-file form-control "
                                             multiple />
                                        @if ($images)
                                            @foreach ($images as $image)
                                                <img src="{{ $image->temporaryUrl() }}" alt="" width="100" />
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
                                        <select onchange="change_subCategory(this.value)" name="category_id" class="form-control" 
                                            >
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
                                        <select name="scategory_id" class="form-control" id="scategory_id">
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
                                        <select multiple data-live-search="true" name="feature_id[]" 
                                            class=" selectpicker form-control">
                                            <option value="0">Select Feature</option>
                                            @foreach ($features as $feature)
                                                <option value="{{ $feature->name }}">{{ $feature->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('feature_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group  col-sm-12">
                                    <label class=" control-label"> Keyword :</label>
                                    <div class="">
                                        <textarea name="keyword" class="form-control input-md  " id="keyword"
                                            placeholder=" keyword ex - 'best laptop , brand name laptop etc' " placeholder="keyword"></textarea>
                                        @error('keyword')
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
<script>
    function change_subCategory(id){
        var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                console.log(this.responseText);
                document.getElementById('scategory_id').innerHTML=this.responseText;
            }
            xmlhttp.open("GET", "{{ route('admin.getSubCategory') }}/" + id);
            xmlhttp.send();
    }
</script>
<script>
    function slug1(data) {
        document.getElementById('slug').value = data.toLowerCase().replaceAll(' ','-');
    }
</script>