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
                        <form action="{{ route('admin.edit.product.update') }}" method="POST" class="form-horizontal"
                            enctype="multipart/form-data">@csrf
                            <input type="hidden" name="product_id" value="{{ $product_id }}">

                            <div class="row p-3">
                                <div class="form-group col-sm-4">
                                    <label class=" control-label">Product Name:</label>

                                    <div>
                                        <input type="text" onkeyup="slug1(this.value)" class="form-control input-md"
                                            placeholder="Product Name" name="name" value="{{ $name }}" />
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label class=" control-label">Product Slug:</label>
                                    <div>
                                        <input type="text" id="slug" class="form-control input-md"
                                            placeholder="Product Slug" name="slug" value="{{ $slug }}" />
                                        @error('slug')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label class=" control-label">Product Brand:</label>
                                    <div>
                                        <select class="form-control" name="brand">
                                            @if ($brand != '')
                                                <option value="{{ $brand }}">{{ $brand }}
                                                @else
                                                <option selected disabled>Select Brand</option>
                                            @endif
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
                                            name="short_description">{{ $short_description }}</textarea>
                                        @error('short_description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label class=" control-label">Description:</label>
                                    <div wire:ignore>
                                        <textarea class="form-control input-md ckeditor" id="description" placeholder="Description" name="description">{{ $description }}</textarea>
                                        @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label class=" control-label">Regular Price:</label>
                                    <div>
                                        <input type="text" class="form-control input-md" placeholder="Regular Price"
                                            name="regular_price" value="{{ $regular_price }}" />
                                        @error('regular_price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label class=" control-label">Sale Price:</label>
                                    <div>
                                        <input type="text" class="form-control input-md" placeholder="Sale Price"
                                            name="sale_price" value="{{ $sale_price }}" />
                                        @error('sale_price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group  col-sm-4">
                                    <label class=" control-label"> Bajaj Image </label>
                                    <div class="">
                                        <div class="row">
                                            <div class="col-6"> <input name="SKU" accept="image/*" type="file"
                                                    class="form-control input-md" />
                                            </div>
                                            <div class="col-6">
                                                @if ($SKU)
                                                    <img src="{{ asset('assets/pages/img/products') . '/' . $SKU }}"
                                                        alt="{{ $SKU }}" width="100" />
                                                @endif
                                            </div>
                                        </div>

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
                                        <input name="featured" type="text" value="{{ $featured }}" class="form-control input-md"
                                            placeholder=" Bajaj link" placeholder="featured" />
                                        @error('featured')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label class=" control-label">Stock Status:</label>
                                    <div>
                                        <select class="form-control" name="stock_status">
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
                                        <!--<input type="text" class="form-control input-md" placeholder="GST" value="GST" />-->
                                        <select name="GST" class="form-control">
                                            @if ($GST != '')
                                                <option value="{{ $GST }}">{{ $GST }}%</option>
                                            @else
                                                <option selected disabled>Choose GST</option>
                                            @endif
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
                                            placeholder="HSN No." value="{{ $HSN_No }}" />
                                        @error('HSN_No')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                              
                                <div class="form-group col-sm-4">
                                    <label class=" control-label">Quantity</label>
                                    <div>
                                        <input type="text" class="form-control input-md" placeholder="Quantity"
                                            name="quantity" value="{{ $quantity }}" />
                                    </div>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label class=" control-label">Product Image:</label>
                                    <div>
                                        <input name="newimage" type="file" class="input-file form-control " />
                                        @if ($newimage)
                                            <img src="{{ $newimage->temporaryUrl() }}" alt=""
                                                width="100" />
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
                                        <input type="file" accept="image/*" class="input-file form-control"
                                            name="newimages[]" multiple />
                                        @if ($newimages)
                                            @foreach ($newimages as $newimage)
                                                @if ($newimage)
                                                    <img src="{{ $newimage->temporaryUrl() }}" alt=""
                                                        width="100" />
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
                                        <select onchange="change_subCategory(this.value)" class="form-control"
                                            name="category_id">

                                            @if ($category_id)
                                                <option value="{{ $category_id }}">
                                                    {{ DB::table('categories')->where('id', $category_id)->first()->name ?? '' }}
                                                </option>
                                            @else
                                                <option selected disabled>Select Category</option>
                                            @endif

                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}
                                                </option>
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
                                        <div class="">

                                            <select id="scategory_id1" class="form-control" name="scategory_id1">

                                                @if ($scategory_id)
                                                    <option value="{{ $scategory_id }}">
                                                        {{ DB::table('subcategories')->where('id', $scategory_id)->first()->name ?? '' }}
                                                    </option>
                                                @endif


                                            </select>
                                        </div>
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
                                                @if (in_array($feature->name, $feature_id))
                                                    <option selected value="{{ $feature->name }}">
                                                        {{ $feature->name }}
                                                    @else
                                                    <option value="{{ $feature->name }}">{{ $feature->name }}
                                                @endif

                                                </option>
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
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/js/bootstrap-select.js"></script>

<style>
    .form-horizontal .form-group {
        margin-right: 0px;
        margin-left: 0px;
    }

    .dropdown-menu {
        min-height: 300px !important;
        max-height: 300px !important;
    }
</style>


<script>
    function change_subCategory(id) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            //console.log(this.responseText);
            document.getElementById('scategory_id1').innerHTML = this.responseText;
        }
        xmlhttp.open("GET", "{{ route('admin.getSubCategory') }}/" + id);
        xmlhttp.send();
    }
</script>
<script>
    function slug1(data) {
        document.getElementById('slug').value = data.toLowerCase().replaceAll(' ', '-');
    }
</script>
