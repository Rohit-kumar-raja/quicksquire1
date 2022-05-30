<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add SubCategory
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="{{ route('admin.subCategory.add') }}" method="POST" class="form-horizontal">
                    @csrf
                    <input type="hidden" name="created_at" value="{{ date('Y-m-d h:m:s') }}" id="">
                    <div class="row  p-2">

                        <div class="col-md-4">
                            <label for="slug" class=" control-label">Parent Category</label>
                            <select required class="form-control input-md" name="category_id">
                                <option value="">Select Parent Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">
                                        {{ $category->name }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="col-md-4">
                            <label for="name" class=" control-label">SubCategory Name</label>
                            <input onkeyup="slug1(this.value)" required type="text" name="name" id="name"
                                class="form-control" placeholder="SubCategory Name">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label for="slug" class=" control-label">SubCategory Slug</label>
                            <input required type="text" name="slug" id="slug" class="form-control"
                                placeholder="SubCategory Slug">
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
<script>
    function slug1(data) {
        document.getElementById('slug').value = data.toLowerCase();
    }
</script>
