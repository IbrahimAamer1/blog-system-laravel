<?php
use App\Http\Controllers\BlogControler;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\ContactController;
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
//theme routes
Route::controller(ThemeController::class)->name('theme.')->group(function(){
    Route::get('/', 'index')->name('index');
    route::get('/category/{id}', 'category')->name('category');
    route::get('/contact', 'contact')->name('contact');
    route::get('/singleblog', 'singleblog')->name('singleblog');
});

//subscriber route
Route::post('/subscribe/store', [SubscriberController::class, 'store'])->name('subscribe.store');
//contact route
Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');


//blog routes
route::get('/my-blogs', [BlogControler::class, 'myBlogs'])->name('blog.my-blogs');
route::resource('blog', BlogControler::class);





Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group( function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
