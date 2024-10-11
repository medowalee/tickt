<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AdminController;

// الصفحة الرئيسية
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// 
Route::middleware(['auth'])->group(function () {
    // طرق خدمات الدردشة
Route::get('/services', [ServiceController::class, 'index'])->name('services.index'); // عرض قائمة الخدمات
Route::get('/service/{id}', [ServiceController::class, 'show'])->name('service.show'); // عرض خدمة معينة
Route::post('/services/{service}/chat', [ChatController::class, 'startChat'])->name('services.chat'); // لبدء الدردشة
// تنفيذ عملية الشراء
Route::post('/services/{id}/purchase', [ServiceController::class, 'purchase'])->name('services.purchase');

// طرق الدردشة
Route::get('/chat/{chat}', [ChatController::class, 'showChat'])->name('chat.show'); // لعرض محادثة معينة
Route::post('/chat/send', [ChatController::class, 'sendMessage'])->name('chat.send'); // لإرسال الرسالة
Route::post('/chat/{id}/accept', [ChatController::class, 'acceptChat'])->name('chat.accept');
Route::post('/chat/{id}/close', [ChatController::class, 'closeChat'])->name('chat.close');
Route::delete('/chat/{id}/delete', [ChatController::class, 'deleteChat'])->name('chat.delete');
// admin
Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard.index');
// users
Route::get('/admin/users', [AdminController::class, 'userStatistics'])->name('admin.dashboard.users');
Route::get('/admin/users/{id}/statistics', [AdminController::class, 'userStatistics'])->name('admin.dashboard.users.statistics');


// عرض قائمة المحادثات
Route::get('/admin/chats', [ChatController::class, 'index'])->name('admin.chats.index');

// عرض تفاصيل المحادثة
Route::get('/admin/chats/{id}', [ChatController::class, 'show'])->name('admin.chats.show');

// إغلاق المحادثة
Route::post('/admin/chats/{id}/close', [ChatController::class, 'close'])->name('admin.chats.close');

// حذف المحادثة
Route::delete('/admin/chats/{id}', [ChatController::class, 'destroy'])->name('admin.chats.destroy');

 // مسارات إدارة الخدمات
 Route::get('/admin/services', [AdminController::class, 'services'])->name('admin.dashboard.services');
 Route::get('/admin/services/create', [AdminController::class, 'createService'])->name('admin.dashboard.services.create');
 Route::post('/admin/services', [AdminController::class, 'storeService'])->name('admin.dashboard.services.store');
 Route::get('/admin/services/{id}/edit', [AdminController::class, 'editService'])->name('admin.dashboard.services.edit');
 Route::put('/admin/services/{id}', [AdminController::class, 'updateService'])->name('admin.dashboard.services.update');
 Route::delete('/admin/services/{id}', [AdminController::class, 'destroyService'])->name('admin.dashboard.services.destroy');

  // عرض صفحة اختيار الخدمة
  Route::get('/services/show/{id}', [ServiceController::class, 'show'])->name('services.show');

 // عرض صفحة اختيار الخدمة
Route::get('/services/purchase', [ServiceController::class, 'purchase'])->name('services.purchase');

// مسار لشراء الخدمة (تأكد من إضافة هذا إذا كنت بحاجة إلى منطق الشراء)
Route::get('/services/buy/{id}', [ServiceController::class, 'buy'])->name('services.buy');

Route::get('/user/input', [UserController::class, 'input'])->name('user.input');


// طرق الملف الشخصي
Route::get('/profile', [UserController::class, 'showProfile'])->middleware('auth')->name('profile'); // عرض الملف الشخصي
Route::post('/profile/update', [UserController::class, 'updateProfile'])->middleware('auth')->name('profile.update'); // تحديث الملف الشخصي

});

// طرق تسجيل الدخول والخروج
Auth::routes();

Auth::routes(); // طرق تسجيل الدخول والخروج الافتراضية

// يمكن إضافة المزيد من الطرق حسب الحاجة

Auth::routes();

Auth::routes();

