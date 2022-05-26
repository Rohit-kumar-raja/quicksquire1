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
                                    Add New Category
                                </div>
                                <!-- <div class="col-md-6">
                                    <a href="{{route('admin.categories')}}" class="btn btn-success pull-right">All Categories</a>
                                </div> -->
                            </div>
                    </div>
                    <div class="panel-body">
                        @if(Session::has('message'))
                        <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                        @endif
                        <form action="" class="form-horizontal" wire:submit.prevent="storeCategory">
                            <div class="form-group">
                                <label for="name" class="col-md-3 control-label">Category Name</label>
                                <div class="col-md-6">
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Category Name" wire:model="name" wire:keyup="generateslug">
                                    @error('name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="slug" class="col-md-3 control-label">Category Slug</label>
                                <div class="col-md-6">
                                    <input type="text" name="slug" id="slug" class="form-control" placeholder="Category Slug" wire:model="slug">
                                    @error('slug')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="slug" class="col-md-3 control-label">Parent Category</label>
                                <div class="col-md-6">
                                    <select class="form-control input-md" wire:model="category_id">
                                        <option value="">Select Parent Category</option>
                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="form-group">
                                <!-- <label for="slug" class="col-md-3 control-label">Sub Category</label>
                                <div class="col-md-6">
                                    <select class="form-control input-md" wire:model="subcategory_id">
                                        <option value="">Select Sub Category</option>
                                        @foreach($subcategories as $subcategory)
                                        <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                                        @endforeach
                                    </select>
                                </div> -->

                                <div class="form-group">
                                    <div class="col-md-9 col-md-offset-3">
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