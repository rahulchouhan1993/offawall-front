<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ticketsController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/wall',[DashboardController::class,'index'])->name('offerwall');
Route::get('/track',[DashboardController::class,'track'])->name('track');
Route::get('/update-conversion',[DashboardController::class,'updateConversion'])->name('updateconversion');
Route::get('/server-postbacks',[DashboardController::class,'serverPostbacks'])->name('serverpostbacks');
Route::post('/contact',[DashboardController::class,'submitContact'])->name('contact.submit');
Route::get('/check-cookie', [DashboardController::class, 'checkAndSetCookie']);
Route::get('/completedOffers', [DashboardController::class, 'completedOffers'])->name('completedOffers');
Route::get('/blocked',[DashboardController::class,'blocked'])->name('blocked');

Route::match(['get','post'],'/login',[DashboardController::class,'login'])->name('login');
Route::match(['get','post'],'/register',[DashboardController::class,'register'])->name('register');
Route::match(['get','post'],'/forgot-password',[DashboardController::class,'forgotPassword'])->name('forgotPassword');

Route::post('/send-forgot-password-mail',[AuthController::class,'sendForgotPasswordMail'])->name('sendForgotPasswordMail');

Route::match(['get','post'],'/logout',[AuthController::class,'logout'])->name('logout');


Route::get('/email-verify',[AuthController::class,'emailVerify'])->name('email-verify');
Route::post('/store-user',[AuthController::class,'register'])->name('store.user');
Route::post('/login-user',[AuthController::class,'login'])->name('loginUser');


// Route::middleware('auth')->group(function () {

    Route::get('/tickets',[DashboardController::class,'tickets'])->name('tickets');
    Route::post('/createTicket', [ticketsController::class, 'store'])->name('createTicket');
    
    Route::get('/ticketMessages/{ticketId}', [ticketsController::class, 'getChatConversation'])->name('getChatConversation');

    Route::post('/sendMessage', [ticketsController::class, 'sendMessage'])->name('sendMessage');

    Route::get('/refresh-tickets', [TicketsController::class, 'refreshTickets']);

    Route::post('/upload-attachment', [TicketsController::class, 'uploadAttachment']);



// });

                       




