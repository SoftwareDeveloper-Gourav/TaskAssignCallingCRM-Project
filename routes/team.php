<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TeamController;

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

Route::get('/team',function(){
    return view('team.index');
});
Route::post('/team-login',[TeamController::class,'login']);

// THIS IS PROTECTED ROUTE FOR TEAM MEMBERS
Route::group(['middleware'=>['team']],function(){
Route::get('/team/dashboard',[TeamController::class,'dashboard'])->name('team-dashboard');
Route::get('/team/update-credintials',[TeamController::class,'changeUsernamePage'])->name('team.change_username');
Route::get('/team/password-change',[TeamController::class,'chnagePasswordPage'])->name('team.change-password');
Route::post('/team/change_password',[TeamController::class,'changePassword']);
Route::get('team/logout',[TeamController::class,'logout'])->name('team-logout');
Route::get('/team/add-customer',[TeamController::class,'addCustomer'])->name('team.add-customer');
Route::post('/team/create_customer',[TeamController::class,'customerAdd']);
Route::get('/team/customer',[TeamController::class,'myCustomer'])->name('team.customer');
Route::post('/team/change_username',[TeamController::class,'changeUsername']);
Route::get('/team/send-email/{id}',[TeamController::class,'emailText'])->name('team.send-email');
Route::post('/team/send-email',[TeamController::class,'emailSendToClient']);

Route::get('/team/send-message/{id}',[TeamController::class,'messageText'])->name('team.send-message');
Route::get('/team/call/{id}',[TeamController::class,'callPage'])->name('team.call');

Route::post('/team/send-message',[TeamController::class,'sendSms']);
Route::get('/team/send-emails',[TeamController::class,'myEmail'])->name('team.email');
Route::get('/team/email-show/{id}',[TeamController::class,'emailShow'])->name('team.emailshow');
Route::get('/team/sms',[TeamController::class,'smsPage'])->name('team.sms');
Route::get('/team/message-show/{id}',[TeamController::class,'smsShow'])->name('team.smsShow');

});


// Route::get('/sms',[TeamController::class,'sendSms']);
Route::get('/call',[TeamController::class,'makeCall']);
Route::get('/twilio/voice', [TeamController::class, 'handleVoice']);