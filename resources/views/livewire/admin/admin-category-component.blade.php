<div>
    <style>
        nav svg {
            height: 20px;
        }

        nav .hidden {
            display: block !important;
        }

        .sclist {
            list-style: none;
        }
    </style>
    <div class="container" style="padding:30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            <div class="row">
                                <i class="fas fa-list"></i>
                                <div class="col-md-6">
                                    All Categories
                                </div>
                                <!-- <div class="col-md-6">
                                    <a href="{{route('admin.addcategory')}}" class="btn btn-success pull-right">Add New</a>
                                </div> -->
                            </div>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            @if(Session::has('message'))
                            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                            @endif
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>
                                        ID
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
                                            {{ $category->id }}
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
                                            <a href="{{route('admin.editcategory',['category_slug'=>$category->slug])}}" class="btn btn-success btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="#" onclick="confirm('Are you sure, You want to delete this category?') || event.stopImmediatePropagation()" class="btn btn-danger btn-sm" wire:click.prevent="deleteCategory({{$category->id}})">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $categories->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>