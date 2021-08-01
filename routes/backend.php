<?php

use App\Http\Controllers\Backend\Admin\Ads\AdsController;
use App\Http\Controllers\Backend\Admin\Books\BookController;
use App\Http\Controllers\Backend\Admin\Books\ChapterController;
use App\Http\Controllers\Backend\Admin\Books\PageController;
use App\Http\Controllers\Backend\Admin\Books\VolumeController;
use App\Http\Controllers\Backend\Admin\Country\CountryController;
use App\Http\Controllers\Backend\Admin\DashboardController;
use App\Http\Controllers\Backend\Admin\RoleAndPermission\PermissionController;
use App\Http\Controllers\Backend\Admin\RoleAndPermission\RoleController;
use App\Http\Controllers\Backend\Admin\Setting\SettingController;
use App\Http\Controllers\Backend\Admin\User\UserController;
use App\Http\Controllers\Backend\Admin\Tags\TagsController;
use Illuminate\Support\Facades\Route;
Route::middleware(['auth:sanctum', 'verified'])->get('/reader/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::group(['middleware' => ['permission:admin|create series|delete series|edit series']],
   function () {

       Route::get('admin/dashboard', [DashboardController::class, 'dash_home'])->name('admin.dashboard');
       Route::get('admin/books', [BookController::class, 'dash_books'])->name('admin.books');
       Route::get('admin/book/{book}/edit',\App\Http\Livewire\Backend\Admin\Books\Book\Edit::class)->name('admin.book.edit'); //book edit
       Route::get('admin/book/{book}',[VolumeController::class, 'dash_book_volumes'])->name('admin.book.show');
       Route::get('admin/book/{book}/volume/{volume}',[ChapterController::class, 'dash_volume_chapter'])->name('admin.volume.show');
       Route::get('admin/book/{book}/volume/{volume}/edit', \App\Http\Livewire\Backend\Admin\Books\Volume\Edit::class)->name('admin.volume.edit');

       Route::get('admin/book/{book}/volume/{volume}/chapter/{chapter}',[PageController::class, 'dash_chapter_page'])->name('admin.chapter.show');
       Route::get('admin/book/{book}/volume/{volume}/chapter/{chapter}/edit', \App\Http\Livewire\Backend\Admin\Books\Chapter\Edit::class)->name('admin.chapter.edit');

       Route::post('admin/book/{book}/volume/{volume}/chapter/{chapter}/upload', [PageController::class, 'upload_pages'])->name('admin.page.upload'); //comic
       Route::get('admin/book/{book}/volume/{volume}/chapter/{chapter}/page/{page}', [PageController::class, 'view_page'])->name('admin.page.view'); //comic
       Route::post('admin/book/{book}/volume/{volume}/chapter/{chapter}/page/{page}', [PageController::class, 'view_page'])->name('admin.page.view');
   });
Route::group(['middleware' => ['permission:admin']], function (){
    Route::get('admin/management/users', [UserController::class, 'dash_users'])->name('admin.users');
    Route::get('admin/management/user/{user}/edit', [UserController::class, 'dash_user_edit'])->name('admin.user.edit');
    Route::put('admin/management/user/{user}/update', [UserController::class, 'dash_user_update'])->name('admin.user.update');
    Route::get('admin/management/roles', [RoleController::class, 'dash_roles'])->name('admin.roles');
    Route::get('admin/management/permissions', [PermissionController::class, 'dash_permission'])->name('admin.permissions');
 //   Route::get('admin/management/tags', [TagsController::class, 'dash_tags'])->name('admin.tags');
    Route::get('admin/management/countries', [CountryController::class, 'dash_country'])->name('admin.countries');
});
Route::group(['middleware' => ['permission:admin']], function (){
    Route::get('admin/settings/setting', [SettingController::Class, 'dash_users'])->name('admin.settings');
    Route::get('admin/settings/features', [SettingController::class, 'dash_users'])->name('admin.features');
    Route::get('admin/settings/admin/view', [SettingController::class, 'dash_users'])->name('admin.features');
});
Route::group(['middleware' => ['permission:admin']], function (){
    Route::get('admin/advertisement/ads', [AdsController::Class, 'dash_ads'])->name('admin.ads');
});
