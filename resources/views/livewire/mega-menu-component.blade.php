<li class="dropdown dropdown-megamenu">
    <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="{{route('product.search')}}">
        Products

    </a>
    <ul class="dropdown-menu">
        <li>
            <div class="header-navigation-content">
                <div class="row">
                    @foreach ($categories as $category)
                        <div class="col-md-4 header-navigation-col">
                            <h4>{{ $category->name }}</h4>
                            <ul>
                                @if (count($category->subCategories) > 0)
                                    @foreach ($category->subCategories->take(10) as $scategory)
                                        <li><a
                                                href="{{ route('product.category', ['category_slug' => $category->slug, 'scategory_slug' => $scategory->slug]) }}">{{ $scategory->name }}</a>
                                        </li>
                                    @endforeach
                                @endif
                                <a class="text-link p-3" href="/product-category/{{ strtolower($category->name)  }}"> See all 
                                 </a> 

                            </ul>
                        </div>
                    @endforeach


                </div>
            </div>
        </li>
    </ul>
</li>