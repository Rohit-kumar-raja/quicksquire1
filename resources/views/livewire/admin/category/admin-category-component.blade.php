<section class="content-header">
    <div class="container-fluid">
        <div class="row ">
            <div class="col-sm-6">
                <h2>Add Category</h2>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active"> Categories</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<div>
    <div class="container" style="padding:30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">

                            <div class="col-md-10">
                                <i class="fas fa-list"></i>
                                All Categories
                            </div>
                            <div class="col-md-2">
                                <a href="{{ route('admin.addcategory') }}" class="btn btn-primary btn-sm ">Add New
                                    Category</a>

                            </div>
                        </div>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            @if (Session::has('message'))
                                <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                            @endif
                            <table class="table table-striped table-bordered">
                                <thead class=" text-primary">
                                    <th>
                                        S.NO
                                    </th>
                                    <th>
                                        Category Name
                                    </th>
                                    <th>
                                        Slug
                                    </th>

                                    <th>
                                        Sub Category
                                    </th>
                                    <th>

                                        Action
                                    </th>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>
                                            <td>
                                                {{ $category->name }}
                                            </td>
                                            <td>
                                                {{ $category->slug }}
                                            </td>
                                            <td>
                                                <ul class="sclist">
                                                    @foreach ($category->subCategories as $scategory)
                                                        <li><i class="fa fa-caret-right"></i>
                                                            {{ $scategory->name }}
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.editcategory', ['category_slug' => $category->slug]) }}"
                                                    class="btn btn-success btn-sm">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="#" onclick="delete{{$category->id}}()" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>

                                        <script>
                                            function delete{{$category->id}}() {
                                                if (confirm('Are you sure, You want to delete this category?')) {
                                                    window.location.replace("{{ route('admin.category.delete', $category->id) }}")
                                                }
                                            }
                                        </script>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
