<?php



use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', \App\Http\Controllers\Main\IndexController::class)->name('main.index');

Route::group(['prefix' => 'posts'], function(){
    Route::get('/', \App\Http\Controllers\Post\IndexController::class)->name('post.index');
    Route::get('/{post}', \App\Http\Controllers\Post\ShowController::class)->name('post.show');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function() {
    Route::get('/', \App\Http\Controllers\Admin\Main\IndexMainController::class)->name('admin.main.index');
});


Route::group(['prefix' => 'post'], function(){
    Route::get('/', \App\Http\Controllers\Admin\Post\IndexPostController::class)->name('admin.post.index');
    Route::get('/create', \App\Http\Controllers\Admin\Post\CreatePostController::class)->name('admin.post.create');
    Route::post('/', \App\Http\Controllers\Admin\Post\StorePostController::class)->name('admin.post.store');
    Route::get('/{post]}', \App\Http\Controllers\Admin\Post\ShowPostController::class)->name('admin.post.show');
    Route::get('/{post}/edit', \App\Http\Controllers\Admin\Post\EditPostController::class)->name('admin.post.edit');
    Route::patch('/{post}', \App\Http\Controllers\Admin\Post\UpdatePostController::class)->name('admin.post.update');
    Route::delete('/{post}', \App\Http\Controllers\Admin\Post\DeletePostController::class)->name('admin.post.delete');
});



Route::group(['prefix' => 'category'], function(){
    Route::get('/', \App\Http\Controllers\Admin\Category\IndexCategoryController::class)->name('admin.category.index');
    Route::get('/create', \App\Http\Controllers\Admin\Category\CreateCategoryController::class)->name('admin.category.create');
    Route::post('/', \App\Http\Controllers\Admin\Category\StoreCategoryController::class)->name('admin.category.store');
    Route::get('/{category}', \App\Http\Controllers\Admin\Category\ShowCategoryController::class)->name('admin.category.show');
    Route::get('/{category}/edit', \App\Http\Controllers\Admin\Category\EditCategoryController::class)->name('admin.category.edit');
    Route::patch('/{category}', \App\Http\Controllers\Admin\Category\UpdateCategoryController::class)->name('admin.category.update');
    Route::delete('/{category}', \App\Http\Controllers\Admin\Category\DeleteCategoryController::class)->name('admin.category.delete');
});


Route::group(['prefix' => 'tags'], function(){
    Route::get('/', \App\Http\Controllers\Admin\Tag\IndexTagController::class)->name('admin.tag.index');
    Route::get('/create', \App\Http\Controllers\Admin\Tag\CreateTagController::class)->name('admin.tag.create');
    Route::post('/', \App\Http\Controllers\Admin\Tag\StoreTagController::class)->name('admin.tag.store');
    Route::get('/{tag}', \App\Http\Controllers\Admin\Tag\ShowTagController::class)->name('admin.tag.show');
    Route::get('/{tag}/edit', \App\Http\Controllers\Admin\Tag\EditTagController::class)->name('admin.tag.edit');
    Route::patch('/{tag}', \App\Http\Controllers\Admin\Tag\UpdateTagController::class)->name('admin.tag.update');
    Route::delete('/{tag}', \App\Http\Controllers\Admin\Tag\DeleteTagController::class)->name('admin.tag.delete');
});


Route::group(['prefix' => 'user'], function(){
    Route::get('/', \App\Http\Controllers\Admin\User\IndexUserController::class)->name('admin.user.index');
    Route::get('/create', \App\Http\Controllers\Admin\User\CreateUserController::class)->name('admin.user.create');
    Route::post('/', \App\Http\Controllers\Admin\User\StoreUserController::class)->name('admin.user.store');
    Route::get('/{user}', \App\Http\Controllers\Admin\User\ShowUserController::class)->name('admin.user.show');
    Route::get('/{user}/edit', \App\Http\Controllers\Admin\User\EditUserController::class)->name('admin.user.edit');
    Route::patch('/{user}', \App\Http\Controllers\Admin\User\UpdateUserController::class)->name('admin.user.update');
    Route::delete('/{user}', \App\Http\Controllers\Admin\User\DeleteUserController::class)->name('admin.user.delete');
});

Auth::routes([]);
