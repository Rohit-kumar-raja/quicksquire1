<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="fa fa-list"></i>
                            Manage Home Categories
                        </h3>
                    </div>
                    <div class="panel-body">
                        @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                        @endif
                        <form action="" class="form-horizontal" wire:submit.prevent="updateHomeCategory">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Choose Categories</label>
                                <div class="col-md-4" wire:ignore>
                                    <select class="sel_categories form-control" name="categories[]" multiple="multiple" wire:model="selected_categories">
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{$category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">No. Of Product</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" wire:model="numberofproducts" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function() {
        $('.sel_categories').select2({
            placeholder: 'Select Categories',
            allowClear: true
        });
        $('.sel_categories').on('change', function(e) {
            var data = $('.sel_categories').select2("val");
            @this.set('selected_categories', data);
        });
    });
</script>
@endpush