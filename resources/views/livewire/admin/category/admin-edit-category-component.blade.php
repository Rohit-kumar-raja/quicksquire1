<div>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-sm-6">
                    <h2>Edit Category</h2>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Edit Category</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            <div class="row">
                                <div class="col-md-10 ">
                                    <i class="fas fa-list"></i> Edit Category
                                </div>
                                <div class="col-md-2 ">
                                    <a href="{{ route('admin.categories') }}" class="btn btn-secondary pull-right"> <i class="fa fa-arrow-left" aria-hidden="true"></i> All
                                        Categories</a>
                                </div>
                            </div>
                    </div>
                    <div class="panel-body card p-3 ">
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                        @endif
                        <form action="" class="form-horizontal" wire:submit.prevent="updateCategory">
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="name" class=" control-label">Category Name</label>
                                    <div>
                                        <input type="text" name="name" id="name" class="form-control"
                                            placeholder="Category Name" wire:model="name" wire:keyup="generateslug">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-sm-6  ">
                                    <label for="slug" class=" control-label">Category Slug</label>
                                    <div>
                                        <input type="text" name="slug" id="slug" class="form-control"
                                            placeholder="Category Slug" wire:model="slug">
                                        @error('slug')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group text-center p-4">

                                <button type="submit" class="btn btn-primary">Update</button>

                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
