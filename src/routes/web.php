<?php

use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;


// Used on password reset
use App\Models\User;
use App\Models\Contact;
use App\Models\Client;
use Illuminate\Auth\Events\PasswordReset;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

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

$controller_path = 'App\Http\Controllers';

// authentication by guests
Route::get('/auth/login-basic', $controller_path . '\authentications\LoginBasic@index')->name('auth-login-basic')->middleware('guest');
// Force Reset Password
  // Route::get('/auth/reset-password', [SessionsController::class, 'changePassword'])
  // ->name('reset-password');
  // ->middleware('auth');
  Route::get('/auth/force-password-reset', $controller_path . '\authentications\ForcePasswordReset@index')->name('auth-force-password-reset');
  Route::post('/auth/force-password-reset', $controller_path . '\authentications\ForcePasswordReset@passwordReset')->name('force-password-reset');
  Route::post('/logout', $controller_path . '\SessionsController@destroy')->name('logout')->middleware('auth');


Route::middleware(['reset_password'])->group(function () {

  $controller_path = 'App\Http\Controllers';

  // Main Page Route
    Route::get('/analytics', $controller_path . '\dashboard\Analytics@index')->name('dashboard-analytics')->middleware('auth');
    Route::get('/', $controller_path . '\dashboard\Main@index')->name('dashboard-main')->middleware('auth');
    Route::get('/dashboard', $controller_path . '\dashboard\Main@index')->name('dashboard-main')->middleware('auth');
    Route::post('/change-password', $controller_path . '\SessionsController@changePassword')->name('change-password')->middleware('auth');
    Route::post('/edit-profile', $controller_path . '\dashboard\main@edit')
    ->name('auth-edit-main')
      ->middleware('auth');
      // management
    Route::get('/user-management', $controller_path . '\management\UserManagement@index')
      ->name('user-management')
        ->middleware('admin');
    Route::get('/client-management', $controller_path . '\management\ClientManagement@index')
      ->name('client-management')
        ->middleware('manager');


  // show user profile with user ID
  Route::get('/users/{id}',  $controller_path . '\pages\PagesUserProfile@showUserProfile')->name('user.profile')->middleware('auth');

  // show client profile with client ID
  Route::get('/client/{id}',  $controller_path . '\pages\PagesClientProfile@showClientProfile')->name('client.profile')->middleware('auth');

  // authentication by autheds
  Route::get('/auth/register-basic', $controller_path . '\authentications\RegisterBasic@index')->name('auth-register-basic')->middleware('admin');
  Route::post('login', [SessionsController::class, 'login'])->middleware('guest');

  // Change Password with token
  Route::get('/auth/change-password-basic', $controller_path . '\authentications\ChangePasswordBasic@index')->name('auth-change-password-basic')->middleware('guest');

  // Register User
  Route::post('/auth/register-basic', $controller_path . '\authentications\RegisterBasic@store')
    ->name('auth-register-basic')
      ->middleware('admin');

  // Register client
  Route::post('/auth/register-client', $controller_path . '\authentications\RegisterClient@store')
  ->name('auth-register-client')
    ->middleware('admin');

  // Register Contact
  Route::post('/auth/register-contact', $controller_path . '\authentications\RegisterContact@store')
  ->name('auth-register-contact')
    ->middleware('admin');

  // edit user
  Route::post('/auth/edit-basic', $controller_path . '\authentications\EditBasic@edit')
  ->name('auth-edit-basic')
    ->middleware('admin');

  // edit client
  Route::post('/auth/edit-client', $controller_path . '\authentications\EditClient@edit')
  ->name('auth-edit-client')
    ->middleware('admin');

  // edit contact
  Route::post('/auth/edit-contact', $controller_path . '\authentications\EditContact@edit')
  ->name('auth-edit-contact')
    ->middleware('admin');


  //Route for contact pagination on edit client
  Route::get('/client/{id}/contacts', $controller_path . '\pages\PagesClientProfile@getContacts');



  //delete user from database
  Route::delete('/user-management/{id}', $controller_path . '\management\UserManagement@destroy')
    ->name('user-management.destroy')
      ->middleware('admin');

  //delete client from database
  Route::delete('/client-management/{id}', $controller_path . '\management\ClientManagement@destroy')
  ->name('client-management.destroy')
    ->middleware('admin');

  //delete contact from database
  Route::delete('/client-contact/{id}', $controller_path . '\management\ContactManagement@destroy')
  ->name('contact-management.destroy')
    ->middleware('admin');


  //block user
  Route::put('/users/{user}/block', $controller_path . '\management\UserManagement@blockUser')
    ->name('users.block')
      ->middleware('admin');


  //force user to reset password
  Route::put('/users/{user}/forcePasswordReset', $controller_path . '\management\UserManagement@forcePasswordReset')
  ->name('users.forcePasswordReset')
    ->middleware('admin');

});


// teste


Route::get('tabledit', $controller_path . '\TableditController@index');

Route::post('tabledit/action', $controller_path . '\TableditController@action')->name('tabledit.action');

// teste2

Route::get('/livetable', $controller_path .'\LiveTable@index'); //not used
Route::get('/livetable/fetch_data/{id}', $controller_path .'\LiveTable@fetch_data');
Route::post('/livetable/add_data', $controller_path .'\LiveTable@add_data')->name('livetable.add_data'); //not used
Route::post('/livetable/update_data', $controller_path .'\LiveTable@update_data')->name('livetable.update_data');
Route::post('/livetable/delete_data', $controller_path .'\LiveTable@delete_data')->name('livetable.delete_data');
Route::post('/livetable/check-email', $controller_path .'\LiveTable@checkEmail')->name('livetable.check_email');



//---------------------------- forgot password handler ------------------------------------//
//1
Route::get('/auth/forgot-password-basic', $controller_path . '\authentications\ForgotPasswordBasic@index')->name('password.request')->middleware('guest');

// 2
Route::post('/forgot-password-basic', function (Request $request) {
  $request->validate(['email' => 'required|email']);

  $status = Password::sendResetLink(
    $request->only('email')
  );

  return $status === Password::RESET_LINK_SENT
  ? back()->with(['status' => __($status)])
  : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');

//3
Route::get('/change-password-basic/{token}', function (string $token) {
    return view('content.authentications.auth-change-password-basic', ['token' => $token]);
  })->middleware('guest')->name('password.reset');

  //4
Route::post('/change-password-basic', function (Request $request) {
  $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
      ]);

      $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function (User $user, string $password) {
          // Log::info("New password: $password"); logging for debug purp.
          $user->forceFill([
            'password' => $password
            ])->setRememberToken(Str::random(60));
            //dd($password); //check pw
            $user->save();
            // Log::info("Hashedpassword3: $password");
            // Get the attributes, including the hashed password
          event(new PasswordReset($user));
          //  Log::info("Hashedpassword4: $hashedPassword");
        }
      );
      // dump($request->only('email', 'password', 'password_confirmation', 'token'));
    return $status === Password::PASSWORD_RESET
                ? redirect()->route('auth-login-basic')->with('success', 'Your password has been updated.')
                : back()->withErrors(['email' => [__($status)]]);
              })->middleware('guest')->name('password.update');

              //---------------------------- !forgot password handler ------------------------------------//




              //---------------------------------------- OLD ------------------------------
// cards
Route::get('/cards/basic', $controller_path . '\cards\CardBasic@index')->name('cards-basic');
// User Interface
Route::get('/ui/accordion', $controller_path . '\user_interface\Accordion@index')->name('ui-accordion');
Route::get('/ui/alerts', $controller_path . '\user_interface\Alerts@index')->name('ui-alerts');
Route::get('/ui/badges', $controller_path . '\user_interface\Badges@index')->name('ui-badges');
Route::get('/ui/buttons', $controller_path . '\user_interface\Buttons@index')->name('ui-buttons');
Route::get('/ui/carousel', $controller_path . '\user_interface\Carousel@index')->name('ui-carousel');
Route::get('/ui/collapse', $controller_path . '\user_interface\Collapse@index')->name('ui-collapse');
Route::get('/ui/dropdowns', $controller_path . '\user_interface\Dropdowns@index')->name('ui-dropdowns');
Route::get('/ui/footer', $controller_path . '\user_interface\Footer@index')->name('ui-footer');
Route::get('/ui/list-groups', $controller_path . '\user_interface\ListGroups@index')->name('ui-list-groups');
Route::get('/ui/modals', $controller_path . '\user_interface\Modals@index')->name('ui-modals');
Route::get('/ui/navbar', $controller_path . '\user_interface\Navbar@index')->name('ui-navbar');
Route::get('/ui/offcanvas', $controller_path . '\user_interface\Offcanvas@index')->name('ui-offcanvas');
Route::get('/ui/pagination-breadcrumbs', $controller_path . '\user_interface\PaginationBreadcrumbs@index')->name('ui-pagination-breadcrumbs');
Route::get('/ui/progress', $controller_path . '\user_interface\Progress@index')->name('ui-progress');
Route::get('/ui/spinners', $controller_path . '\user_interface\Spinners@index')->name('ui-spinners');
Route::get('/ui/tabs-pills', $controller_path . '\user_interface\TabsPills@index')->name('ui-tabs-pills');
Route::get('/ui/toasts', $controller_path . '\user_interface\Toasts@index')->name('ui-toasts');
Route::get('/ui/tooltips-popovers', $controller_path . '\user_interface\TooltipsPopovers@index')->name('ui-tooltips-popovers');
Route::get('/ui/typography', $controller_path . '\user_interface\Typography@index')->name('ui-typography');

// extended ui
Route::get('/extended/ui-perfect-scrollbar', $controller_path . '\extended_ui\PerfectScrollbar@index')->name('extended-ui-perfect-scrollbar');
Route::get('/extended/ui-text-divider', $controller_path . '\extended_ui\TextDivider@index')->name('extended-ui-text-divider');

// icons
Route::get('/icons/boxicons', $controller_path . '\icons\Boxicons@index')->name('icons-boxicons');

// form elements
Route::get('/forms/basic-inputs', $controller_path . '\form_elements\BasicInput@index')->name('forms-basic-inputs');
Route::get('/forms/input-groups', $controller_path . '\form_elements\InputGroups@index')->name('forms-input-groups');

// form layouts
Route::get('/form/layouts-vertical', $controller_path . '\form_layouts\VerticalForm@index')->name('form-layouts-vertical');
Route::get('/form/layouts-horizontal', $controller_path . '\form_layouts\HorizontalForm@index')->name('form-layouts-horizontal');

// tables
Route::get('/tables/basic', $controller_path . '\tables\Basic@index')->name('tables-basic');

// layout
Route::get('/layouts/without-menu', $controller_path . '\layouts\WithoutMenu@index')->name('layouts-without-menu');
Route::get('/layouts/without-navbar', $controller_path . '\layouts\WithoutNavbar@index')->name('layouts-without-navbar');
Route::get('/layouts/fluid', $controller_path . '\layouts\Fluid@index')->name('layouts-fluid');
Route::get('/layouts/container', $controller_path . '\layouts\Container@index')->name('layouts-container');
Route::get('/layouts/blank', $controller_path . '\layouts\Blank@index')->name('layouts-blank');

// pages
Route::get('/pages/account-settings-account', $controller_path . '\pages\AccountSettingsAccount@index')->name('pages-account-settings-account');
Route::get('/pages/account-settings-notifications', $controller_path . '\pages\AccountSettingsNotifications@index')->name('pages-account-settings-notifications');
Route::get('/pages/account-settings-connections', $controller_path . '\pages\AccountSettingsConnections@index')->name('pages-account-settings-connections');
Route::get('/pages/misc-error', $controller_path . '\pages\MiscError@index')->name('pages-misc-error');
Route::get('/pages/misc-under-maintenance', $controller_path . '\pages\MiscUnderMaintenance@index')->name('pages-misc-under-maintenance');
Route::get('/pages/pages-user-profile', $controller_path . '\pages\PagesUserProfile@index')->name('pages-user-profile');
