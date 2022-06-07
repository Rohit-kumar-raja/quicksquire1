<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand bg-white d-flex align-items-center justify-content-center" href="{{ route('admin.dashboard') }}">
      <img class="img-fluid" src="{{ asset('images/logo.png') }}" alt="">
    </a>

    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCat"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-dumpster"></i>
            <span>Master</span>
        </a>
        <div id="collapseCat" class="collapse" aria-labelledby="headingTwo"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="{{ route('admin.categories') }}">All Categories</a>
                <a class="collapse-item" href="{{ route('admin.subcategories') }}">All SubCategories</a>
                <a class="collapse-item" href="{{ route('admin.brand') }}"> Brands</a>
                <a class="collapse-item" href="{{ route('admin.wallet') }}"> Wallet</a>
                <a class="collapse-item" href="{{ route('admin.addfeature') }}">Add New Feature</a>
                <a class="collapse-item" href="{{ route('admin.coupon') }}">Coupon</a>
                <a class="collapse-item" href="{{ route('admin.banner') }}">Manage Banner</a>
        
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#users"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-users fa-cog"></i> 
            <span>Users</span>
        </a>
        <div id="users" class="collapse" aria-labelledby="headingTwo"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">All Users:</h6>
                <a class="collapse-item" href="{{ route('admin.users') }}">All Users</a>

            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-sitemap fa-cog"></i>
            <span>Products</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="{{ route('admin.products') }}">All Products</a>
                <a class="collapse-item" href="{{ route('admin.addproduct') }}">Add New Product</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseorder"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-shopping-bag fa-cog"></i> 
            <span>Orders</span>
        </a>
        <div id="collapseorder" class="collapse" aria-labelledby="headingTwo"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="{{ route('admin.order') }}">All Orders</a>
                {{-- <a class="collapse-item" href="#">Return Orders</a> --}}
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseHC"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-sliders-h fa-cog"></i>
            <span>Manage Home Category</span>
        </a>
        <div id="collapseHC" class="collapse" aria-labelledby="headingTwo"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="{{ route('admin.homecategories') }}">Tab Category</a>

            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseHB"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-sliders-h fa-cog"></i>
            <span>Manage Brands Slider</span>
        </a>
        <div id="collapseHB" class="collapse" aria-labelledby="headingTwo"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="{{ route('admin.brand') }}">Manage Brands</a>

            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseHS"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-sliders-h fa-cog"></i> 
            <span>Manage Home Slider</span>
        </a>
        <div id="collapseHS" class="collapse" aria-labelledby="headingTwo"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="{{ route('admin.slider') }}">Manage Offer Slider</a>

            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pincode"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-sliders-h fa-cog"></i> 
            <span>Pincode</span>
        </a>
        <div id="pincode" class="collapse" aria-labelledby="headingTwo"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">pincode section:</h6>
                <a class="collapse-item" href="{{ route('admin.pincode') }}">Pincopde</a>

            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>