<?php

Route::get('/', 'HomeController@index')->name('home');
Route::get('/data', 'DataController@index')->name('data');
Route::get('/web', 'WebController@index');
Route::get('/branding', 'BrandingController@index');
Route::get('/testimonials', 'TestimonialController@index');



/* Authentication Routes */
Route::get('/account', 'UserController@index')->name('account');
Route::post('/account/update', 'UserController@update')->name('account');
Route::get('/account/personal', 'UserController@personal');
Route::get('/account/beneficiaries', 'UserController@beneficiaries');
Route::get('/account/preferences', 'UserController@preferences');
Route::get('/account/pass', 'UserController@passForm');
Route::post('/account/pass', 'UserController@passUpdate');

/* Support Ticket */
Route::get('/account/support', 'SupportController@index');
Route::post('/account/support', 'SupportController@store');
Route::post('/account/support/reply', 'SupportController@reply');
Route::get('/account/ticket', 'SupportController@show');
Route::get('/account/ticket/{user_id}/{id}', 'SupportController@view');

/*Route::get('/beneficiaries/create', 'BeneficiariesController@create');*/
/*Route::post('/beneficiaries/store', 'BeneficiariesController@store');*/

/* Blog Routes */
Route::get('/blog', 'PostController@index');
Route::get('/blog/author-{id}', 'PostController@list_by');
Route::get('/blog/{id}', 'PostController@show');
Route::post('/blog/{id}/comment', 'CommentController@createComment');
Route::post('/blog/create', 'PostController@create');

Auth::routes();

/* Data Routes */
Route::post('data/buy/{id}', 'DataController@getAddToCart');
Route::get('data/data-cart', 'DataController@getCart');
Route::get('/data/remove/{id}', 'DataController@removeOne');
Route::get('/data/clear', 'DataController@removeAll');
Route::get('/data/{network}', 'DataController@showNetwork');


/* Checkout & Payment Processing */
	Route::get('/checkout', 'OrderController@checkout');
Route::group(['middleware' => 'auth'], function(){
	Route::post('/pay', 'PaymentController@redirectToGateway')->name('pay');
	Route::get('/payment/callback', 'PaymentController@handleGatewayCallback');
	Route::post('/deposit', 'PaymentController@deposit')->name('deposit');
	Route::get('/checkout/success', 'PaymentController@paid');
});

/* Web Routes */
Route::get('/web/corporate', 'WebController@corporate');
Route::get('/web/schools', 'WebController@schools');
Route::get('/web/blogs', 'WebController@blogs');
Route::get('/web/shopping', 'WebController@shopping');

/* Quotes & Testimonials Routes */
Route::get('/testimonial', 'TestimonialController@index');
Route::post('/testimonial/store', 'TestimonialController@store');
Route::get('/web/create', 'WebController@create');
Route::post('/web/store', 'WebController@store');
Route::get('/branding/create', 'BrandingController@create');
Route::post('/branding/store', 'BrandingController@store');

// Facebook Socialite
Route::get('/login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('/login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

// Static Pages
Route::get('/privacy', 'PageController@privacy');
Route::get('/terms', 'PageController@terms');
Route::get('/careers','PageController@careers');
Route::get('/about-us','PageController@about');
Route::get('/testin','PageController@testing');
Route::get('/testing','PageController@testing2');

/* Administrator area */
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function(){
	Route::get('/', 'AdminController@index')->name('admin_home');

	Route::get('/login', 'AdminController@showLogin')->name('admin_login');
	Route::post('/login', 'AdminController@authenticate');
	Route::post('/logout', 'AdminController@logout')->name('admin_logout');

	Route::get('/users', 'UserController@index');
	Route::post('/user/edit/{id}', 'UserController@edit');
	Route::post('/user/store', 'UserController@store');
	Route::post('/user/delete/{id}', 'UserController@delete');
	Route::get('/users/new', 'UserController@new');
	Route::get('/users/logged', 'UserController@logged');
	Route::get('/users/page', 'UserController@page');

	Route::get('/data', 'DataController@index');

	Route::get('/blog', 'BlogController@index');
	Route::post('/blog/create', 'BlogController@create');

	Route::get('/testimonies', 'TestimonialController@index');
	Route::post('/testimonial/approve/{id}', 'TestimonialController@approve');

	Route::post('/support/close', 'SupportController@close');
	Route::get('/support', 'SupportController@index');
	Route::get('/support/{id}', 'SupportController@edit');
	Route::post('/support/reply', 'SupportController@reply');
	Route::get('/support/d/{id}', 'SupportController@delete');
});



Route::get('/contact', 'ContactsController@create');
Route::post('/contacts/store', 'ContactsController@store');
Route::get('/deals','DealsController@create');
/**Route::get('/account/benefits','BeneficiariesController@create');
Route::post('/account/benefits','BeneficiariesController@store');**/

Route::get('/beneficiaries/create', 'BeneficiariesController@create');
Route::post('/beneficiaries/store', 'BeneficiariesController@store');
Route::get('/beneficiaries/{id}','BeneficiariesController@show');
Route::get('/beneficiaries/{id}/edit','BeneficiariesController@edit');
Route::post('/beneficiaries/store/{id}', 'BeneficiariesController@update');
/**Route::post('/beneficiaries/store/{id}','BeneficiariesController@delete');**/
Route::resource('beneficiaries', 'BeneficiariesController');