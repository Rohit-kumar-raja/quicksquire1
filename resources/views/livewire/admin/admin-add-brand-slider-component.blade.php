<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="col-md-6">
                            Add New Brand
                        </div>
                        <div class="col-md-6">
                            <a href="{{route('admin.brand')}}" class="btn btn-success pull-right">All Brands</a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{ Session::get('message') }}
                    </div>
                    @endif
                    <form action="" class="form-horizontal" wire:submit.prevent="addSlide">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Brand Title</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control input-md" placeholder="Title" wire:model="title">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Brand Subtitle</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control input-md" placeholder="Subtitle" wire:model="subtitle">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Brand Link</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control input-md" placeholder="Link" wire:model="link">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Brand Image</label>
                            <div class="col-md-6">
                                <input type="file" class="input-file" wire:model="image">
                                @if ($image)
                                <img src="{{$image->temporaryUrl()}}" width="120">
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Status</label>
                            <div class="col-md-6">
                                <select class="form-control" wire:model="status">
                                    <option value="0">Inactive</option>
                                    <option value="1">Active</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label"></label>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>