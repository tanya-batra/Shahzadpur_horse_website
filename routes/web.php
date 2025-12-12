<?php

use App\Models\Blog;
use App\Models\Gallery;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BreedController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminProfileController;
  use App\Http\Controllers\HorseDetailController;
  use App\Models\listingCategory;

Route::get('/', function () {
     $galleries = Category::with('galleries')->get(); 
      $categories = ListingCategory::where('status', 0)->get();
       $featureCategories = ListingCategory::where('status', 1)->get();
     $breedingCategory = ListingCategory::where('name', 'Breeding Stallions')->first();

    $breedingSubcategories = [];
    if($breedingCategory) {
        $breedingSubcategories = Subcategory::where('category_id', $breedingCategory->id)->get();
    }

    return view('index' , compact('categories', 'breedingSubcategories','galleries' , 'featureCategories'));
})->name('home');

Route::get('/detail/{id}', function ($id) {
    $category = listingCategory::with('subcategories')->findOrFail($id);
    return view('listingdetail', compact('category'));
})->name('listing');

Route::get('/subcategory/{id}', function ($id) {
    $subcategory = Subcategory::with('horses', 'horses.images')->findOrFail($id);
    return view('categorydetail', compact('subcategory'));
})->name('subcat.detail');


Route::get('/horse', function () {

    $category = ListingCategory::with(['subcategories' => function ($query) {}])->where('name', 'Horses for Sale')->first();
    $breedingCategory = ListingCategory::where('name', 'Breeding Stallions')->first();
 $heritageCategory = ListingCategory::where('name', 'Our Heritage')->first();
    $breedingSubcategories = [];
    if ($breedingCategory) {
        $breedingSubcategories = Subcategory::where('category_id', $breedingCategory->id)->get();
    }


    return view('horse', compact('category', 'breedingSubcategories' , 'heritageCategory'));
})->name('horses');

Route::get('/heritage', function () {
      $heritageCategory = ListingCategory::where('name', 'Our Heritage')->first();

    $heritageSubcategories = [];
    if ($heritageCategory) {
        $heritageSubcategories = Subcategory::where('category_id', $heritageCategory->id)->get();
    }
    return view('heritage' , compact('heritageSubcategories'));
})->name('heritage');



Route::get('/blog', function () {
    $blogs = Blog::latest()->paginate(6); 
    return view('blog', compact('blogs'));
})->name('blog');

Route::get('/blog/{slug}', function ($slug) {
    $blog = Blog::where('slug', $slug)->firstOrFail();
    return view('blog-detail', compact('blog'));
})->name('blog.show');

Route::get('/about', function () {
    return view('about');
})->name('about');

route::get('/contact', [ContactController::class, 'index'])->name('contact');
route::post('/contact', [ContactController::class, 'store'])->name('contact.store');


Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');
Route::get('/admin/dashboard', [AuthController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/profile', [AdminProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [AdminProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/password', [AdminProfileController::class, 'updatePassword'])->name('profile.password');
Route::post('/admin/profile/request-email-change', [AdminProfileController::class, 'requestEmailChange'])->name('profile.request.email');
Route::post('/admin/profile/verify-email-otp', [AdminProfileController::class, 'verifyEmailOtp'])->name('profile.verify.email');

Route::middleware(['auth'])->group(function () {
    Route::get('/blogs/create', [BlogController::class, 'create'])->name('blogs.create');
    Route::post('/blogs', [BlogController::class, 'store'])->name('blogs.store');
    Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.view');
    Route::get('/blogs/{blog}', [BlogController::class, 'show'])->name('blogs.show');
    Route::get('/blogs/{blog}/edit', [BlogController::class, 'edit'])->name('blogs.edit');
    Route::put('/blogs/{blog}', [BlogController::class, 'update'])->name('blogs.update');
    Route::delete('/blogs/{blog}', [BlogController::class, 'destroy'])->name('blogs.destroy');
});



Route::get('gallery/categories/{category}/edit', [CategoryController::class, 'editCategory'])->name('gallery.categories.edit');
Route::put('gallery/categories/{category}', [CategoryController::class, 'updateCategory'])->name('gallery.categories.update');
Route::delete('gallery/categories/{category}', [CategoryController::class, 'destroyCategory'])->name('gallery.categories.destroy');
Route::get('gallery/create', [CategoryController::class, 'createCategory'])->name('gallery.categories.create');
Route::post('gallery/create', [CategoryController::class, 'storeCategory'])->name('gallery.categories.store');
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
Route::get('/gallery/{id}', [GalleryController::class, 'show'])->name('gallery.images');
// Route::get('gallery', [CategoryController::class, 'indexCategories'])->name('gallery.categories.index');
Route::get('gallery/images/create', [GalleryController::class, 'createImages'])->name('gallery.images.create');

Route::post('gallery/images/store', [GalleryController::class, 'storeImages'])->name('gallery.images.store');
//BREED ROUTES
Route::get('/breeds/create', [BreedController::class, 'create'])->name('breeds.create');
Route::post('/breeds', [BreedController::class, 'store'])->name('breeds.store');
Route::get('/breeds/{breed}/edit', [BreedController::class, 'edit'])->name('breeds.edit');
Route::put('/breeds/{breed}', [BreedController::class, 'update'])->name('breeds.update');
Route::delete('/breeds/{breed}', [BreedController::class, 'destroy'])->name('breeds.destroy');

/* CATEGORY */
Route::get('/categories', [ListingController::class, 'categoryIndex'])->name('categories.index');
Route::get('/categories/create', [ListingController::class, 'categoryCreate'])->name('categories.create');
Route::post('/categories', [ListingController::class, 'categoryStore'])->name('categories.store');
Route::get('/categories/{category}/edit', [ListingController::class, 'categoryEdit'])->name('categories.edit');
Route::put('/categories/{category}', [ListingController::class, 'categoryUpdate'])->name('categories.update');
Route::delete('/categories/{category}', [ListingController::class, 'categoryDestroy'])->name('categories.destroy');

Route::get('/subcategory', [ListingController::class, 'subindex'])->name('subcategory.index');
Route::get('/subcategories/create', [ListingController::class, 'Create'])->name('subcategories.create');
Route::post('/admin/subcategories', [ListingController::class, 'Store'])->name('subcategories.store');
  Route::get('subcategories/{subcategory}/edit', [ListingController::class, 'edit'])->name('subcategories.edit');
    Route::put('subcategories/{subcategory}', [ListingController::class, 'update'])->name('subcategories.update');
    Route::delete('subcategories/{subcategory}', [ListingController::class, 'destroy'])->name('subcategories.destroy');

  Route::patch('/categories/{category}/toggle-status', [ListingController::class, 'toggleStatus'])
    ->name('categories.toggleStatus');


Route::prefix('horses')->name('horses.')->group(function () {
    Route::get('/', [HorseDetailController::class, 'index'])->name('index');
    Route::get('/create', [HorseDetailController::class, 'create'])->name('create');
    Route::post('/store', [HorseDetailController::class, 'store'])->name('store');
    Route::get('/{horse}/edit', [HorseDetailController::class, 'edit'])->name('edit');
    Route::put('/{horse}', [HorseDetailController::class, 'update'])->name('update');
    Route::delete('/{horse}', [HorseDetailController::class, 'destroy'])->name('destroy');
    Route::delete('/images/{image}', [HorseDetailController::class, 'deleteImage'])->name('images.destroy');
});
