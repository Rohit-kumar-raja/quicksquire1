<li class="menu-search">
    <span class="sep"></span>
    <i class="fa fa-search search-btn"></i>
    <div class="search-box" style="display:none;">
        <form action="{{route('product.search')}}">
            <div class="input-group">
                <input type="text" name="search" value="{{  session('search')}}" placeholder="Search" class="form-control">
                <span class="input-group-btn">
                    <button class="btn btn-primary" type="submit">Search</button>
                </span>
            </div>
        </form>
    </div>
</li>