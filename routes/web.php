<?php
use App\Http\Controllers\AdminController; use App\Http\Controllers\InquiryController; use App\Http\Controllers\SiteController; use Illuminate\Support\Facades\Route;
Route::get('/',[SiteController::class,'index'])->name('home');
Route::get('/api/site-data',[SiteController::class,'data'])->name('site.data');
Route::post('/api/inquiry',[InquiryController::class,'store'])->middleware('throttle:10,1')->name('inquiry.store');
Route::post('/api/application',[InquiryController::class,'application'])->middleware('throttle:10,1')->name('application.store');
Route::get('/admin',[AdminController::class,'index'])->name('admin');
Route::get('/admin/csrf-token', function(){ return response()->json(['token'=>csrf_token(),'authenticated'=>\Illuminate\Support\Facades\Auth::check()])->header('Cache-Control','no-store, no-cache, must-revalidate, max-age=0'); })->name('admin.csrf');
Route::post('/admin/login',[AdminController::class,'login'])->name('admin.login');
Route::middleware('auth')->prefix('admin')->group(function(){Route::post('/logout',[AdminController::class,'logout'])->name('admin.logout');Route::get('/state',[AdminController::class,'state'])->name('admin.state');Route::put('/state',[AdminController::class,'saveState'])->name('admin.state.save');Route::post('/portfolio/upload',[AdminController::class,'uploadPortfolioImage'])->name('admin.portfolio.upload');Route::post('/content/upload',[AdminController::class,'uploadContentImage'])->name('admin.content.upload');Route::post('/notices/send',[AdminController::class,'sendNotice'])->name('admin.notices.send');Route::post('/account',[AdminController::class,'account'])->name('admin.account');Route::delete('/messages/{uid}',[AdminController::class,'deleteMessage'])->name('admin.messages.delete');Route::post('/reset',[AdminController::class,'reset'])->name('admin.reset');});
