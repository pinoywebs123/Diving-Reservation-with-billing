<?php
use App\User;
// Route::get('/add', function(){
// 	$aw = new User;
// 	$aw->name = 'Jody Lyn Egsoc';
// 	$aw->username = 'admin123';
// 	$aw->email = 'morls@gmail.com';
// 	$aw->contact = '09650918852';
// 	$aw->password = bcrypt('admin123');
// 	$aw->role_id = 1;
// 	$aw->save();
// });


/* Reservation Status

0 - Pending
1 - Approve
3 - Iniital Submit no Confirmation
*/

//Ito lahat yung URL pagka visit mo sa URL nato e tatapon ka sa Controller
/*
Route:get means url nang site
as -> pangalan or alias nang URL
uses -> naka point yan sa controller at method pagka visit nang URL
*/

//ito yung home page
Route::get('/', function () {
    return view('home');
});

//ito yung reservation event viewing and reseving



//Ito lahat nang transaction pag hindi naka login si user
Route::group(['prefix'=> 'auth'], function(){

	Route::get('/login', [
		'as'=> 'auth_login',
		'uses'=> 'AuthController@auth_login'
	]);
	Route::post('/login_check', [
		'as'=> 'login_check',
		'uses'=> 'AuthController@login_check'
	]);
	Route::get('/register', [
		'as'=> 'auth_register',
		'uses'=> 'AuthController@auth_register'
	]);
	Route::post('/register_check', [
		'as'=> 'register_check',
		'uses'=> 'AuthController@register_check'
	]);

});

//Ito lahat nang transaction pagka login ni Customer
Route::group(['prefix'=> 'customer'], function(){
	Route::get('/home', [
		'as'=> 'customer_home',
		'uses'=> 'CustomerController@customer_home'
	]);
	Route::get('/home_logout', [
		'as'=> 'customer_logout',
		'uses'=> 'CustomerController@customer_logout'
	]);
	Route::get('/equipment', [
		'as'=> 'customer_equipment_list',
		'uses'=> 'CustomerController@customer_equipment_list'
	]);
	Route::get('/equipment-list/{id}', [
		'as'=> 'customer_equipment_details',
		'uses'=> 'CustomerController@customer_equipment_details'
	]);

	Route::get('/reservation', [
	'as'=> 'customer_reservation',
	'uses'=> 'CustomerController@customer_reservation'
	]);
	Route::post('/reservation_check', [
		'as'=> 'customer_reservation_check',
		'uses'=> 'CustomerController@customer_reservation_check'
	]);

	Route::get('/reservation-confirmation/{id}', [
		'as'=> 'customer_reservation_confirmation',
		'uses'=> 'CustomerController@customer_reservation_confirmation'
	]);

	Route::get('/reservation-history', [
		'as'=> 'customer_reservation_history',
		'uses'=> 'CustomerController@customer_reservation_history'
	]);

	Route::post('/equipment-reserve/{id}', [
		'as'=> 'equipment_reservation_reserve',
		'uses'=> 'CustomerController@equipment_reservation_reserve'
	]);

	Route::get('/equipment-history', [
		'as'=> 'customer_equipment_history',
		'uses'=> 'CustomerController@customer_equipment_history'
	]);

	Route::get('/equipment-history-approve', [
		'as'=> 'customer_equipment_history_approve',
		'uses'=> 'CustomerController@customer_equipment_history_approve'
	]);

	Route::get('/equipment-history-return-item/{id}', [
		'as'=> 'customer_equipment_history_return_item',
		'uses'=> 'CustomerController@customer_equipment_history_return_item'
	]);

	Route::get('/equipment-history-returned', [
		'as'=> 'customer_equipment_history_returned',
		'uses'=> 'CustomerController@customer_equipment_history_returned'
	]);

	Route::post('/customer-diving-course',[
		'as'=> 'customer_diving_course',
		'uses'=> 'CustomerController@customer_diving_course'
	]);

});

//Ito lahat nang transaction pagka login ni Admin
Route::group(['prefix'=> 'admin'], function(){
	Route::get('/home', [
		'as'=> 'admin_home',
		'uses'=> 'AdminController@admin_home'
	]);
	Route::get('/admin_logout', [
		'as'=> 'admin_logout',
		'uses'=> 'AdminController@admin_logout'
	]);
	Route::get('/reservation-equipments', [
		'as'=> 'admin_reservation_equipment',
		'uses'=> 'AdminController@admin_reservation_equipment'
	]);
	Route::get('/reservation-equipments-list/{id}', [
		'as'=> 'admin_reservation_equipment_list',
		'uses'=> 'AdminController@admin_reservation_equipment_list'
	]);
	Route::get('/reservation-equipments-approve/{id}', [
		'as'=> 'admin_reservation_equipment_approve',
		'uses'=> 'AdminController@admin_reservation_equipment_approve'
	]);
	Route::get('/reservation-equipments-decline/{id}', [
		'as'=> 'admin_reservation_equipment_decline',
		'uses'=> 'AdminController@admin_reservation_equipment_decline'
	]);
	Route::get('/reservation', [
		'as'=> 'admin_reservation',
		'uses'=> 'AdminController@admin_reservation'
	]);
	Route::get('/equipment', [
		'as'=> 'admin_equipment',
		'uses'=> 'AdminController@admin_equipment'
	]);
	Route::get('/equipment-create', [
		'as'=> 'admin_equipment_create',
		'uses'=> 'AdminController@admin_equipment_create'
	]);
	Route::post('/equipment-create-check', [
		'as'=> 'admin_equipment_create_check',
		'uses'=> 'AdminController@admin_equipment_create_check'
	]);
	Route::post('/equipmentdetails-create-check', [
		'as'=> 'admin_equipmentdetails_create_check',
		'uses'=> 'AdminController@admin_equipmentdetails_create_check'
	]);
	Route::get('/reservation-approve/{id}', [
		'as'=> 'admin_reservation_approve',
		'uses'=> 'AdminController@admin_reservation_approve'
	]);
	Route::get('/reservation-decline/{id}', [
		'as'=> 'admin_reservation_decline',
		'uses'=> 'AdminController@admin_reservation_decline'
	]);
	Route::get('/equipment-delete-now/{id}',[
		'as'=> 'admin_equipment_delete',
		'uses'=> 'AdminController@admin_equipment_delete'
	]);
	Route::get('/equipment-edit/{id}',[
		'as'=> 'admin_equipment_edit',
		'uses'=> 'AdminController@admin_equipment_edit'
	]);
	Route::post('/equipment-update/{id}',[
		'as'=> 'admin_equipment_update',
		'uses'=> 'AdminController@admin_equipment_update'
	]);
	Route::get('/customer-list', [
		'as'=> 'admin_customer_list',
		'uses'=> 'AdminController@admin_customer_list'
	]);
	Route::get('/payment', [
		'as'=> 'admin_payment',
		'uses'=> 'AdminController@admin_payment'
	]);
	Route::get('/reports', [
		'as'=> 'admin_reports',
		'uses'=> 'AdminController@admin_reports'
	]);
	Route::get('/reports-generate', [
		'as'=> 'admin_reports_generate',
		'uses'=> 'AdminController@admin_reports_generate'
	]);
	Route::get('/reports-course', [
		'as'=> 'admin_reports_course',
		'uses'=> 'AdminController@admin_reports_course'
	]);
	Route::get('/reports-course-generate', [
		'as'=> 'admin_reports_course_generate',
		'uses'=> 'AdminController@admin_reports_course_generate'
	]);
	Route::post('/payment', [
		'as'=> 'admin_payment_check',
		'uses'=> 'AdminController@admin_payment_check'
	]);

	Route::get('/reservation-user/{id}', [
		'as'=> 'admin_reservation_user',
		'uses'=> 'AdminController@admin_reservation_user'
	]);
	

});

//Ito yung LINK for Online Payment Transaction gamit Paypal

Route::get('paywithpaypal', array('as' => 'addmoney.paywithpaypal','uses' => 'AddMoneyController@payWithPaypal',));
Route::post('paypal', array('as' => 'addmoney.paypal','uses' => 'AddMoneyController@postPaymentWithpaypal',));
Route::get('paypal', array('as' => 'payment.status','uses' => 'AddMoneyController@getPaymentStatus',));