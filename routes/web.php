<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\ReviewController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; // Add this at the top
use App\Models\User;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Backend\TeamController;
use App\Http\Controllers\Backend\BlogController;


Route::get('/', function(){
    return view('home.index');
})->name('index');




// PROTECTED DASHBOARD (Login required)
Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth'])->name('dashboard'); 

// 2. Standard User Profile Routes (Renamed URL to /user/profile)
Route::middleware('auth')->group(function () {
    Route::get('/user/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/user/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/user/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 3. Admin Routes (Grouped with a prefix for better organization)
Route::middleware('auth')->prefix('admin')->group(function(){
    
    // Admin Profile
    Route::get('/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/profile/store', [AdminController::class, 'ProfileStore'])->name('profile.store');
    
    // Admin Security
    Route::post('/password/update', [AdminController::class, 'PasswordUpdate'])->name('admin.password.update');
    Route::get('/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
});

// 4. Auth & Verification
require __DIR__.'/auth.php';

Route::post('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');
Route::get('/verify', [AdminController::class, 'ShowVerification'])->name('custom.verification.form');
Route::post('/verify', [AdminController::class, 'VerificationVerify'])->name('custom.verification.verify');


Route::middleware('auth')->group(function () {

Route::controller(ReviewController::class)->group(function(){
    Route::get('/all/review', 'AllReview')->name('all.review');
    Route::get('/add/review', 'AddReview')->name('add.review');
    Route::post('/store/review', 'StoreReview')->name('store.review');
    Route::get('/edit/review/{id}', 'EditReview')->name('edit.review');
    Route::get('/delete/review/{id}', 'DeleteReview')->name('delete.review');

});

Route::controller(SliderController::class)->group(function(){
    Route::get('/get/slider', 'GetSlider')->name('get.slider');
    Route::post('/update/slider', 'UpdateSlider')->name('update.slider');
  

});



Route::controller(FrontendController::class)->group(function(){
   
    Route::get('/all/contact/message', 'ContactAllMessage')->name('contact.all.message');


}); 

Route::controller(FrontendController::class)->group(function(){
   
    Route::get('/get/about', 'GetAboutUs')->name('get.about.us');
    Route::get('/about','AboutUs')->name('about.us');
    Route::get('/update/about', 'UpdateAbout')->name('update.about');


}); 

Route::controller(BlogController::class)->group(function(){
    // CHANGE THIS FROM POST TO GET
    Route::get('/blog/category', 'BlogCategory')->name('all.blog.category'); 
    
    Route::post('/store/blog/category', 'StoreBlogCategory')->name('store.blog.category');
    Route::get('/edit/blog/category/{id}', 'EditBlogCategory');
    Route::post('/update/blog/category/{id}', 'UpdateBlogCategory')->name('update.blog.category');
    Route::get('/delete/blog/category/{id}', 'DeleteBlogCategory')->name('delete.blog.category');


    // posts

    Route::get('/all/blog/post', 'AllBlogPost')->name('all.blog.post');
    Route::get('/add/blog/post', 'AddBlogPost')->name('add.blog.post'); 
    Route::post('/store/blog/post', 'StoreBlogPost')->name('store.blog.post'); 
    Route::get('/edit/blog/post/{id}', 'EditBlogPost')->name('edit.blog.post');
    Route::get('/delete/blog/post/{id}', 'DeleteBlogPost')->name('delete.blog.post');
    Route::post('/update/blog/post', 'UpdateBlogPost')->name('update.blog.post');



});




});

//out of miidleware

Route::controller(TeamController::class)->group(function(){
    Route::get('/all/team', 'AllTeam')->name('all.team');
    Route::get('/add/team', 'AddTeam')->name('add.team');
    Route::post('/store/team', 'StoreTeam')->name('store.team');
    Route::get('/edit/team/{id}', 'EditTeam')->name('edit.team');
    Route::get('/delete/team/{id}', 'DeleteTeam')->name('delete.team');

});  



Route::get('/team',[FrontendController::class,'OurTeam'])->name('our.team'); 
  

 
Route::get('/about',[FrontendController::class,'AboutUs'])->name('about.us'); 

Route::get('/contact',[FrontendController::class,'ContactUs'])->name('contact.us'); 
Route::post('/contact/message',[FrontendController::class,'ContactMessage'])->name('contact.message');

Route::get('/blog',[FrontendController::class,'BlogPage'])->name('blog.page');

Route::get('/blog/details/{slug}',[FrontendController::class,'BlogDetails']);

Route::get('/blog/category/{id}',[FrontendController::class,'BlogCategory']);

Route::get('/home',[FrontendController::class,'Home'])->name('home.index');



