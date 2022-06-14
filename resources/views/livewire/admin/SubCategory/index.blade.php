<x-adminlayout>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-sm-6">
                    <h2>Add SubCategory</h2>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active"> SubCategories</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div>
        @include('livewire.admin.SubCategory.insert')

        <div class="container" style="padding:30px 0;">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">

                            <div class="row">
                                <div class="col-md-10">
                                    <i class="fas fa-list"> All SubCategories</i>
                                   
                                </div>
                                <div class="col-md-2">
                                    <a class="btn btn-primary btn-sm" data-toggle="modal"
                                        data-target="#exampleModal">Add New
                                    </a>

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
                                            S.No
                                        </th>
                                        <th>
                                            Sub Category
                                        </th>
                                        <th>
                                            Slug
                                        </th>
                                        <th>
                                            Category Name
                                        </th>

                                        <th>

                                            Action
                                        </th>
                                    </thead>
                                    <tbody>
                                        @foreach ($subcategories as $category)
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

                                                    {{ DB::table('categories')->find($category->category_id)->name ?? '' }}

                                                </td>


                                                <td>
                                                    <a href="{{ route('admin.SubCategory.edit', $category->id) }}"
                                                        class="btn btn-success btn-sm">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="#"
                                                        onclick="delete{{$category->id}}()"
                                                        class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                                <script>
                                                    function delete{{$category->id}}() {
                                                        if (confirm('Are you sure, You want to delete this SubCategory?')) {
                                                            window.location.replace("{{ route('admin.SubCategory.delete', $category->id) }}")
                                                        }
                                                    }
                                                </script>
                                            </tr>
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


</x-adminlayout>
