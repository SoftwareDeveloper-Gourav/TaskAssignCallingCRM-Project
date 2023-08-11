<?php

use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/admin', function () {
    return view('admin.login');
});
Route::get('/admin/forgot-password',function(){
    return view('admin.forgot');
});

Route::post('/admin/reset_password',[AdminController::class,'forgotCheck']);
Route::post('/admin/otp_check',[AdminController::class,'otpCheck']);
Route::post('/admin/new_password',[AdminController::class,'newPassword']);
Route::post('/admin-login',[AdminController::class,'login']);

// THIS IS A PROTECTED ROUTES 


Route::group(['middleware' => ['admin']], function () {
   Route::get('/admin/dashboard',[AdminController::class,'dashboardPage'])->name('admin-dashboard');
  Route::get('admin/password-change',[AdminController::class,'chnagePasswordPage'])->name('change-password');
Route::get('admin/logout',[AdminController::class,'logout'])->name('admin-logout');
Route::post('/admin/change_password',[AdminController::class,'changePassword']);
Route::get('/admin/add-contact',[AdminController::class,'addContactPage'])->name('admin.add-contact');
Route::post('/admin/create_contact',[ContactController::class,'contactAdd']);
Route::get('/admin/contacts',[ContactController::class,'contactPage'])->name('admin.contact');
Route::get('/admin/change_password',[AdminController::class,'changeUsernamePage'])->name('admin.change_username');
Route::post('/admin/change_username',[AdminController::class,'changeUsername']);
Route::get('admin/edit/{id}',[ContactController::class,'editUserPage'])->name('admin.edit');
Route::post('/admin/update_contact',[ContactController::class,'updateContact']);
Route::get('/admin/team_delete',[ContactController::class,'deleteTeam']);
Route::get('/admin/clients',[ContactController::class,'Clientspage'])->name('admin.customer');
Route::get('/admin/assign-clients',[ContactController::class,'assginClientspage'])->name('admin.assign');
Route::get('/admin/none-assign-clients',[ContactController::class,'noneAssginClientspage'])->name('admin.noneassign');
Route::post('/admin/assign',[ContactController::class,'assign']);
Route::get('/admin/email',[ContactController::class,'emailPage'])->name('admin.email');
Route::get('/admin/email-show/{id}',[ContactController::class,'emailShow'])->name('admin.emailshow');
Route::get('/export',[ContactController::class,'export'])->name('admin.export');
Route::get('admin/import',[ContactController::class,'importPage'])->name('admin.import');
Route::post('/admin/upload_csv',[ContactController::class,'import']);
Route::get('/admin/sms',[ContactController::class,'smsPage'])->name('admin.sms');
Route::get('/admin/message-show/{id}',[ContactController::class,'smsShow'])->name('admin.smsShow');
Route::post('/admin/client_delete',[ContactController::class,'deleteClient']);


});