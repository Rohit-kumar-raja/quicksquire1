<?php

use App\Http\Controllers\Admin\PincodeController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\WalletController;
use App\Http\Controllers\PdfController;
use App\Http\Livewire\Admin\AdminAddBrandComponent;
use App\Http\Livewire\Admin\AdminEditCategoryComponent;
use App\Http\Livewire\Admin\AdminAddCategoryComponent;
use App\Http\Livewire\Admin\AdminAddFeatureCcomponent;
use App\Http\Livewire\Admin\AdminAddProductComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\AboutComponent;
use App\Http\Livewire\ServiceuseComponent;
use App\Http\Livewire\ReturnPolicyComponent;
use App\Http\Livewire\ShippingPolicyComponent;
use App\Http\Livewire\PrivacyPolicyComponent;
use App\Http\Livewire\TermuseComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\Admin\AdminHomeBannerComponent;
use App\Http\Livewire\Admin\AdminAddHomeBannerComponent;
use App\Http\Livewire\Admin\AdminEditHomeBannerComponent;
use App\Http\Livewire\Admin\HomeCouponComponent;
use App\Http\Livewire\Admin\HomeAddCouponComponent;
use App\Http\Livewire\Admin\AdminCategoryComponent;
use App\Http\Livewire\Admin\AdminBrandSliderComponent;
use App\Http\Livewire\Admin\AdminAddBrandSliderComponent;
use App\Http\Livewire\Admin\AdminEditBrandSliderComponent;
use App\Http\Livewire\Admin\AdminEditProductComponent;
use App\Http\Livewire\Admin\AdminHomeCategoryComponent;
use App\Http\Livewire\Admin\AdminHomeSliderComponent;
use App\Http\Livewire\Admin\AdminAddHomeSliderComponent;
use App\Http\Livewire\Admin\AdminBrandComponent;
use App\Http\Livewire\Admin\AdminEditHomeSliderComponent;
use App\Http\Livewire\Admin\AdminFeatureComponent;
use App\Http\Livewire\Admin\AdminOrderComponent;
use App\Http\Livewire\Admin\AdminOrderDetailsComponent;
use App\Http\Livewire\Admin\AdminProductComponent;
use App\Http\Livewire\SearchComponent;
use App\Http\Livewire\ThankYouComponent;
use App\Http\Livewire\User\UserDashboardComponent;
use App\Http\Livewire\User\UserEditProfileComponent;
use App\Http\Livewire\User\UserOrderDetailsComponent;
use App\Http\Livewire\User\UserOrdersComponent;
use App\Http\Livewire\User\UserProfileComponent;
use App\Http\Livewire\User\UserReviewComponent;
use App\Http\Livewire\WishListComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\ProductDetailsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', HomeComponent::class)->name('index');
Route::get('/cart/{product_id}', [CartController::class, 'store'])->name('addcart');
Route::post('cart/addwith', [CartController::class, 'addwith'])->name('addwith');
Route::post('cart/addwithonemore', [CartController::class, 'cartAddOneMore'])->name('cart.addwithmore');

Route::get('/shop', ShopComponent::class)->name('product.shop');
// Route::get('/shop/{sort}/{item}', ShopComponent::class)->name('product.shop');
// cart start
Route::get('/cart', CartComponent::class)->name('product.cart');
Route::get('/cart/increase/{rowid}', [CartComponent::class, 'increaseQuantity'])->name('product.increase');
Route::get('/cart/decrease/{rowid}', [CartComponent::class, 'decreaseQuantity'])->name('product.decrease');
Route::get('/cart/del/{rowid}', [CartComponent::class, 'del'])->name('product.del');
Route::get('cart/checkout', CheckoutComponent::class)->name('cart.checkout');
// cart end

// wishlist start


// wishlist end


Route::get('/checkout', CheckoutComponent::class)->name('checkout');
Route::post('/checkout/placeOrder', [CheckoutComponent::class, 'placeOrder'])->name('checkout.placeOrder');

Route::get('/product/{slug}', DetailsComponent::class)->name('product.details');
Route::get('product/pincode/',[ProductDetailsController::class,'pincode'])->name('product.details.pincode');
Route::get('product/pincode/{pincode}',[ProductDetailsController::class,'pincode']);

Route::get('/search', SearchComponent::class)->name('product.search');
// Route::post('/searchproduct' ,[SearchController::class,'index'])->name('products.search');

Route::get('/product-category/{category_slug}/{scategory_slug?}', CategoryComponent::class)->name('product.category');

// wishlist start
Route::get('wishlist/add/{id}', [ShopComponent::class, 'add'])->name('wishlist.add');
Route::get('wishlist/remove/{id}', [ShopComponent::class, 'remove'])->name('wishlist.remove');
Route::get('/wishlist', WishListComponent::class)->name('product.wishlist');
Route::get('wishlist/movetocart/{id}', [WishListComponent::class, 'moveProductFromWishlistToCart'])->name('wishlist.movetocart');
// wishlist end


Route::get('/thank-you', ThankYouComponent::class)->name('thankyou');
Route::get('/aboutus', AboutComponent::class);
Route::get('/serviceuse', ServiceuseComponent::class);
Route::get('/returnpolicy', ReturnPolicyComponent::class);
Route::get('/shippingpolicy', ShippingPolicyComponent::class);
Route::get('/privacypolicy', PrivacyPolicyComponent::class);
Route::get('/termuse', TermuseComponent::class);

// Route::get('/download-pdf', [PdfController::class, 'downloadPDF']);




// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

// For User
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/user/dashboard', UserDashboardComponent::class)->name('user.dashboard');
    Route::get('/user/orders', UserOrdersComponent::class)->name('user.orders');
    Route::get('/user/order/{order_id}', UserOrderDetailsComponent::class)->name('user.orderdetails');
    Route::get('/user/review/{order_item_id}', UserReviewComponent::class)->name('user.review');
    Route::get('/user/profile', UserProfileComponent::class)->name('user.profile');
    Route::get('/user/profile/edit', UserEditProfileComponent::class)->name('user.editprofile');
    Route::post('/user/profile/update', [UserEditProfileComponent::class, 'updateProfile'])->name('user.update');

    // Route::get('/get/order/{order_id}', [PdfController::class, 'getAllOrders']);
    // Route::get('/download-pdf', [PdfController::class, 'downloadPDF']);
    Route::get('/getor', [PdfController::class, 'viewCart']);
    Route::get('/download-pdf', [PdfController::class, 'printCart'])->name('download-pdf');
});


// For Admin
Route::middleware(['auth:sanctum', 'verified', 'authadmin'])->group(function () {
    Route::get('/admin/dashboard', AdminDashboardComponent::class)->name('admin.dashboard');
    // category
    Route::get('/admin/categories', AdminCategoryComponent::class)->name('admin.categories');
    Route::get('/admin/category/add', AdminAddCategoryComponent::class)->name('admin.addcategory');
    Route::get('/admin/category/delete/{id}', [AdminCategoryComponent::class, 'deleteCategory'])->name('admin.category.delete');
    Route::post('/admin/add/category', [AdminAddCategoryComponent::class, 'storeCategory'])->name('admin.category.add');

    Route::get('/admin/category/edit/{category_slug}/{scategory_slug?}/{feature_slug?}', AdminEditCategoryComponent::class)->name('admin.editcategory');

    // subcategory star

    Route::get('/admin/subcategories', [SubCategoryController::class, 'index'])->name('admin.subcategories');
    Route::post('/admin/subcategory/add', [SubCategoryController::class, 'store'])->name('admin.subCategory.add');
    Route::get('/admin/subcategory/edit/{id}', [SubCategoryController::class, 'edit'])->name('admin.SubCategory.edit');
    Route::post('/admin/subcategory/update', [SubCategoryController::class, 'update'])->name('admin.SubCategory.update');
    Route::get('/admin/subcategory/delete/{id}', [SubCategoryController::class, 'destroy'])->name('admin.SubCategory.delete');

    // subcategory end

    // product start
    Route::get('/admin/products', AdminProductComponent::class)->name('admin.products');
    Route::get('/admin/product/add', AdminAddProductComponent::class)->name('admin.addproduct');
    Route::post('/admin/product/store', [AdminAddProductComponent::class, 'store'])->name('admin.addproduct.store');

    Route::get('/admin/product/edit/{product_slug}', AdminEditProductComponent::class)->name('admin.editproduct');
    Route::get('/admin/home-categories', AdminHomeCategoryComponent::class)->name('admin.homecategories');
    Route::get('/admin/orders', AdminOrderComponent::class)->name('admin.order');
    Route::get('/admin/order/{order_id}', AdminOrderDetailsComponent::class)->name('admin.orderdetails');
    // product end


    // Route::get('/admin/home-slider', AdminHomeSliderComponent::class)->name('admin.homeslider');
    // Route::get('/admin/home-slider/add', AdminAddHomeSliderComponent::class)->name('admin.addhomeslider');
    // Route::get('/admin/home-slider/edit/{slider_id}', AdminEditHomeSliderComponent::class)->name('admin.edithomeslider');
    Route::get('admin/feature/add', AdminAddFeatureCcomponent::class)->name('admin.addfeature');
    Route::get('admin/features/{feature_slug?}', AdminFeatureComponent::class)->name('admin.features');
    // Route::get('/admin/brand', AdminBrandSliderComponent::class)->name('admin.brand');
    // Route::get('/admin/brand/add', AdminAddBrandSliderComponent::class)->name('admin.addbrand');
    // Route::get('/admin/brand/edit/{brand_id}', AdminEditBrandSliderComponent::class)->name('admin.editbrand');
    Route::get('/admin/slider', AdminHomeSliderComponent::class)->name('admin.slider');
    Route::get('/admin/slider/add', AdminAddHomeSliderComponent::class)->name('admin.addslider');
    Route::get('/admin/slider/edit/{slider_id}', AdminEditHomeSliderComponent::class)->name('admin.editslider');
    Route::get('/admin/coupon', HomeCouponComponent::class)->name('admin.coupon');
    Route::get('/admin/coupon/add', HomeAddCouponComponent::class)->name('admin.addcoupon');
    Route::get('/admin/banner', AdminHomeBannerComponent::class)->name('admin.banner');
    Route::get('/admin/banner/add', AdminAddHomeBannerComponent::class)->name('admin.addbanner');
    Route::get('/admin/banner/edit/{banner_id}', AdminEditHomeBannerComponent::class)->name('admin.editbanner');

    Route::get('/admin/wallet', [WalletController::class, 'index'])->name('admin.wallet');
    Route::post('/admin/wallet/add', [WalletController::class, 'store'])->name('admin.wallet.add');
    Route::get('/admin/wallet/edit/{id}', [WalletController::class, 'edit'])->name('admin.wallet.edit');
    Route::post('/admin/wallet/update/{id}', [WalletController::class, 'update'])->name('admin.wallet.update');
    Route::get('/admin/wallet/delete/{id}', [WalletController::class, 'destroy'])->name('admin.wallet.destroy');
    Route::get('/admin/wallet/status/{id}', [WalletController::class, 'status'])->name('admin.wallet.status');

    // pin code start
    Route::get('/admin/pincode', [PincodeController::class, 'index'])->name('admin.pincode');
    Route::post('/admin/pincode/add', [PincodeController::class, 'store'])->name('admin.pincode.add');
    Route::get('/admin/pincode/edit/{id}', [PincodeController::class, 'edit'])->name('admin.pincode.edit');
    Route::post('/admin/pincode/update/{id}', [PincodeController::class, 'update'])->name('admin.pincode.update');
    Route::get('/admin/pincode/delete/{id}', [PincodeController::class, 'destroy'])->name('admin.pincode.destroy');
    Route::get('/admin/pincode/status/{id}', [PincodeController::class, 'status'])->name('admin.pincode.status');
    // pin code end

    // users code start
    Route::get('/admin/users', [UsersController::class, 'index'])->name('admin.users');
    Route::post('/admin/users/add', [UsersController::class, 'store'])->name('admin.users.add');
    Route::get('/admin/users/edit/{id}', [UsersController::class, 'edit'])->name('admin.users.edit');
    Route::post('/admin/users/update/{id}', [UsersController::class, 'update'])->name('admin.users.update');
    Route::get('/admin/users/delete/{id}', [UsersController::class, 'destroy'])->name('admin.users.destroy');
    Route::get('/admin/users/status/{id}', [UsersController::class, 'status'])->name('admin.users.status');
    // users code end

    // brand code start
    Route::get('/admin/brand', [BrandController::class, 'index'])->name('admin.brand');
    Route::post('/admin/brand/add', [BrandController::class, 'store'])->name('admin.brand.add');
    Route::get('/admin/brand/edit/{id}', [BrandController::class, 'edit'])->name('admin.brand.edit');
    Route::post('/admin/brand/update/{id}', [BrandController::class, 'update'])->name('admin.brand.update');
    Route::get('/admin/brand/delete/{id}', [BrandController::class, 'destroy'])->name('admin.brand.destroy');
    Route::get('/admin/brand/status/{id}', [BrandController::class, 'status'])->name('admin.brand.status');
    // brand code end
});
