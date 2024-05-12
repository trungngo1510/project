<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\BlogsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\frontend\MemberController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\Frontend\SearchController;
use App\Http\Controllers\Auth\LoginController;
// use App\Models\player;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Route::get('/index1',[PlayerController::class, 'index']);
// Route::post('/insert_player',[PlayerController::class,'store']);
// Route::get('/edit/{id}',[PlayerController::class,'edit']);
// Route::post('/edit/{id}',[PlayerController::class,'update']);
//  Route::get('delete/{id}',[PlayerController::class,'destroy']);



// Route::get('/home', function () {
//     return view('home');
// });






//frontend
Route::group(['prefix' => 'frontend'], function () {


    //blog
    Route::get('/listblog', [BlogController::class, 'index']);
    Route::get('/detailblog', [BlogController::class, 'show_detail_blog']);
    Route::get('/detailblog/{id}', [BlogController::class, 'show_detail_blog']);


    //index
    Route::get('/index', [ProductController::class, 'index']);
    Route::post('/index', [ProductController::class, 'store'])->name('product.add');
    Route::get('/product-detail/{id}', [ProductController::class, 'show'])->name('product.detail');
    Route::get('/cart', [ProductController::class, 'create'])->name('product.cart');
    Route::post('/cart/up', [ProductController::class, 'ajax_up_cart'])->name('product.up-cart');
    Route::post('/cart/down', [ProductController::class, 'ajax_down_cart'])->name('product.down-cart');
    Route::post('/cart/delete', [ProductController::class, 'ajax_delete_cart'])->name('product.delete-cart');

    //checkout 
    Route::get('/checkout', [ProductController::class, 'checkout'])->name('product.checkout');
    Route::post('/checkout', [ProductController::class, 'register'])->name('register.quick');

    Route::get('/indexEmail', [MailController::class, 'index'])->name('sendmail');

    //search
    Route::get('/search-product', [SearchController::class, 'search_view'])->name('product.search-view');
    Route::post('/search-product', [SearchController::class, 'search_product'])->name('product.search');


    Route::post('index/price', [SearchController::class, 'price_range'])->name('product.price-range');

    Route::group(['middleware' => 'memberNotLogin'], function () {
         //member->register
         Route::get('/register', [MemberController::class, 'index']);
         Route::post('/register', [MemberController::class, 'register'])->name('frontend.register');
         //login
         Route::get('/login', [MemberController::class, 'showlogin']);
         Route::post('/login', [MemberController::class, 'login'])->name('frontend.login');
    });

    Route::group(['middleware' => 'member'], function () {
        //account
        Route::get('/account/account', [MemberController::class, 'showAccount'])->name('account.account');
        Route::get('/account/account_update', [MemberController::class, 'getAccount'])->name('account.get');
        Route::post('/account/account_update', [MemberController::class, 'update_account'])->name('account.update');
        Route::get('/account/my-product', [MemberController::class, 'showlist_product'])->name('account.showListProduct');
        Route::get('/account/add-product', [MemberController::class, 'add_product'])->name('account.addProduct');
        Route::post('/account/add-product', [MemberController::class, 'post_product'])->name('account.postProduct');
        Route::get('/account/edit-product/{id}', [MemberController::class, 'edit_product'])->name('account.editProduct');
        Route::post('/account/edit-product/{id}', [MemberController::class, 'update_product'])->name('account.updateProduct');
        Route::get('/delete/{id}', [MemberController::class, 'destroy'])->name('account.delete');
        Route::get('/logout', [MemberController::class, 'logout'])->name('frontend.logout');

        //blog
        Route::post('/detailblog/rate/ajax', [BlogController::class, 'rate'])->name('blogs');
        Route::post('/detailblog/comment/ajax', [BlogController::class, 'comment'])->name('comment');

        
    });
});

Auth::routes();

Route::group([
    'prefix' => 'admin',
], function () {
    Route::get('/',[LoginController::class, 'showLoginForm']);
    Route::get('/login',[LoginController::class, 'showLoginForm']);
    Route::post('/login',[LoginController::class, 'login']);
    Route::get('/logout',[LoginController::class, 'logout'])->name('admin.logout');
});

Route::group([
    'prefix' => 'admin',
    'middleware' => ['admin']
], function () {
   
        
   

   
    
    Route::get('/dashboard', [DashboardController::class, 'index']);

    //frofile
    Route::get('/profile', [UsersController::class, 'index']);
    Route::get('/profile', [UsersController::class, 'create']);
    Route::post('/profile', [UsersController::class, 'update']);

    //country
    Route::get('/country', [CountryController::class, 'index']);
    Route::get('/addCountry', [CountryController::class, 'create']);
    Route::post('/addCountry', [CountryController::class, 'store']);
    Route::get('/delete/{id}', [CountryController::class, 'destroy'])->name('country.delete');

    //blogs
    Route::get('/blogs', [BlogsController::class, 'index']);
    Route::get('/addBlogs', [BlogsController::class, 'create']);
    Route::post('/addBlogs', [BlogsController::class, 'store']);
    Route::get('/editBlogs/{id}', [BlogsController::class, 'edit']);
    Route::post('/editBlogs/{id}', [BlogsController::class, 'update']);
    Route::get('/delete/{id}', [BlogsController::class, 'destroy'])->name('blog.delete');

    //Category
    Route::get('/category', [CategoryController::class, 'index']);
    Route::get('/add_category', [CategoryController::class, 'create']);
    Route::post('/add_category', [CategoryController::class, 'store']);
    Route::get('/delete/{id}', [CategoryController::class, 'destroy'])->name('category.delete');

    //brands
    Route::get('/brand', [BrandController::class, 'index']);
    Route::get('/add_brand', [BrandController::class, 'create']);
    Route::post('/add_brand', [BrandController::class, 'store']);
    Route::get('/delete/{id}', [BrandController::class, 'destroy'])->name('brand.delete');
});







