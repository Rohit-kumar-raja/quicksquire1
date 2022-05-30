<section class="content-header">
    <div class="container-fluid">
        <div class="row ">
            <div class="col-sm-6">
                <h2>Add Category</h2>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Add Category</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">

                            <div class="row">

                                <div class="col-md-9">
                                    <i class="fas fa-list"></i>
                                    Add New Category
                                </div>
                                <div class="col-md-3">

                                    <a href="{{ route('admin.categories') }}" class="btn btn-secondary btn-sm"> <i
                                            class="fas fa-arrow-alt-circle-left"></i> All Categories</a>
                                </div>
                            </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-warning" role="alert">{{ Session::get('message') }}</div>
                        @endif
                        <form action="{{route('admin.category.add')}}"  method="POST" class="form-horizontal" >
                           @csrf
                            <div class="row  p-4">
                                <div class="col-md-6">
                                    <label for="name" class=" control-label">Category Name</label>
                                    <input required type="text" name="name" id="name" class="form-control"
                                        placeholder="Category Name" >
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-sm-6  ">
                                    <label for="slug" class=" control-label">Category Slug</label>
                                    <div>
                                        <input type="text" name="slug" id="slug" class="form-control"
                                            placeholder="Category Slug" >
                                        @error('slug')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>


                            </div>


                            <div class="form-group text-center  ">
                                <button type="submit" class="btn btn-primary btn-sm ">Submit</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
