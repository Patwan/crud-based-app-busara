 <?php

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

/*User Authentication Routes*/
Route::get('/', 'Auth\LoginController@showLoginForm')->name('get.login'); 
Route::post('login', 'Auth\LoginController@login')->name('post.login'); 
Route::post('logout', 'Auth\LoginController@logout')->name('logout'); 
// Registration Routes... 
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('get.register');
Route::post('register', 'Auth\RegisterController@register')->name('post.register'); 
// Password Reset Routes... 
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.reset.get');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email'); 
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset'); 
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.reset.post');
/*END USER AUTHENTICATION ROUTES*/ 

/*Admin routes*/
Route::prefix('admin')->group(function(){
	Route::get('/login', 'Auth\AdminLoginController@LoginForm')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::get('product/create' , 'ProductsController@create')->name('product.create');
	Route::get('product/index' , 'ProductsController@index')->name('product.index');
	Route::get('product/{id}/edit', 'ProductsController@edit')->name('product.edit');
	Route::put('product/{id}', 'ProductsController@update')->name('product.update');
	Route::get('products/{id}/delete', 'ProductsController@delete')->name('product.delete');
	Route::delete('products/{id}/destroy', 'ProductsController@destroy')->name('product.destroy');
	Route::post('product' , 'ProductsController@store')->name('api.store');
});
/*End admin routes*/

//Auth user route
Route::get('/user', 'UserController@showCont')->name('show.contact');

//PDF routes
Route::get('/getPDF', 'PDFController@getPDF')->name('get.pdf');


/*Facebook login credentials*/
//Redirect users to oAuth provider
Route::get('login/facebook', 'Auth\LoginController@redirectToFacebook')->name('facebook.login');
//Redirect users after authentication
Route::get('auth/facebook/callback', 'Auth\LoginController@facebookCallback');
/*End*/

/*Google login credentials*/
//Redirect users to oAuth provider
Route::get('login/google', 'Auth\LoginController@redirectToGoogle')->name('google.login');
//Redirect users after authentication
Route::get('auth/google/callback', 'Auth\LoginController@googleCallback');
/*End*/







