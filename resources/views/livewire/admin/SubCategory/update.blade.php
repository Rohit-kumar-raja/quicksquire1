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
        <div class="container" style="padding:30px 0;">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <form action="{{ route('admin.SubCategory.update') }}" method="POST" class="form-horizontal">
                            @csrf
                            <div class="row  p-2">
                                <input type="hidden" name="updated_at" value="{{ date('Y-m-d h:m:s') }}" id="">
                                <input type="hidden" name="id" value="{{ $subcategores->id }}">
                                <div class="col-md-4">
                                    <label for="slug" class=" control-label">Parent Category</label>
                                    <select required class="form-control input-md" name="category_id">
                                        <?php 
                                            $cat = DB::table('categories')->find($subcategores->category_id);
                                        ?>
                                        <option value="{{$subcategores->category_id}}">{{$cat->name}}</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">
                                                {{ $category->name }}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="col-md-4">
                                    <label for="name" class=" control-label">SubCategory Name</label>
                                    <input onkeyup="slug1(this.value)" value="{{ $subcategores->name }}" required
                                        type="text" name="name" id="name" class="form-control"
                                        placeholder="SubCategory Name">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label for="slug" class=" control-label">SubCategory Slug</label>
                                    <input required type="text" value="{{ $subcategores->slug }}" name="slug"
                                        id="slug" class="form-control" placeholder="SubCategory Slug">
                                    @error('slug')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>
                            <div class="form-group mt-4 text-center">
                                <button type="submit" class="btn btn-primary btn-sm ">Submit</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function slug1(data) {
            document.getElementById('slug').value = data.toLowerCase();
        }
    </script>

</x-adminlayout>
