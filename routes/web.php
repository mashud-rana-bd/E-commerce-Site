<?php

Route::get('/',[
	'uses' => 'NewShopController@index', 
	'as' => '/'
]);


Route::get('category_product/{id}',[
	'uses' 	=> 'NewShopController@categoryProduct', 
	'as' 	=> 'category-product'
]);

Route::get('/product/single', [
	'uses' => 'singlePageController@singlepageproductinfo', 
	'as' =>'singleproduct'
]);


Route::get('contact-mail', [
	'uses' => 'NewShopController@mail', 
	'as' => 'contact-mail'
]);


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('addcategory',[
	'uses' => 'CategoryController@addcategory', 
	'as' => 'addcategory'
]);

Route::get('managecategory', [
	'uses' => 'CategoryController@managecategory', 
	'as' => 'managecategory'
]);

Route::post('/category/save', [
	'uses' => 'CategoryController@savecategory', 
	'as' => 'new-category'
]);

Route::get('/category/Unpublished/{id}', [
	'uses' => 'CategoryController@unpublishedCategory', 
	'as' => 'unpublicshed-category'
]);

Route::get('/category/published/{id}', [
	'uses'=>'CategoryController@publishedCategory', 
	'as' =>'published-category'
]);

Route::get('/category/edit/{id}', [
	'uses' => 'CategoryController@editCategory', 
	'as' => 'edit-category'
]);

Route::post('/category/update', [
	'uses' => 'CategoryController@updateCategory', 
	'as' => 'update-category'
]);

Route::get('/category/delete/{id}', [
	'uses'  => 'CategoryController@deleteCategory', 
	'as' => 'delete-category'
]);

// Brand work

Route::get('/brand/view', [
	'uses' 	=> 'BrandController@viewBrandinfo',
	'as' 	=> 'addbrand'
]);

Route::post('/brand/store', [
	'uses' 	=> 'BrandController@storeBrandinfo' , 
	'as' 	=> 'new-brand'
]);

Route::get('/brand/show', [
	'uses' => 'BrandController@showBrandinfo',
	'as' => 'showallbrand'
]);

Route::get('/brand/public/{id}', [
	'uses' =>'BrandController@updatstatus', 
	'as' => 'publickstatus'
]);

Route::get('/brand/edit/{id}',[
	'uses' => 'BrandController@updatebrand', 
	'as' =>'updatebrand'
]);

Route::post('/brand/update',[
	'uses' =>'BrandController@updatebrandinfo',
	'as' => 'updatebrandinfo'
]);

Route::get('/brand/delete/{id}',[
	'uses' =>'BrandController@deletebrandinfo' , 
	'as' =>'deletebrand'
]);

Route::get('/product/index', [
	'uses' => 'ProductController@index', 
	'as' => 'addproduct'
]);

//product


Route::post('/product/store', [
	'uses' => 'ProductController@saveproductinfo', 
	'as' => 'new-product'
]);

Route::get('/product/manage',[
	'uses' => 'ProductController@showproduct', 
	'as' => 'manageproduct'
]);

Route::get('/product/publication/{id}',[
	'uses' => 'ProductController@publication', 
	'as' => 'productpublication'
]);

Route::get('/product/edit/{id}', [
	'uses' => 'ProductController@producteditinfo', 
	'as' => 'productedit'
]);

Route::get('/product/delete/{id}', [
	'uses' => 'ProductController@deletproductinfo', 
	'as'=>'productdeletinfo'
]);


Route::get('category/footer/{id}',[
	'uses' => 'NewShopController@brandproduct', 
	'as' =>'footermenu'
]);

Route::get('singleproduct/{id}',[
	'uses' =>'NewShopController@singleproduct', 
	'as' =>'productdetelce'
]);


Route::post('/add/add', [
	'uses' => 'CardController@addTocard', 
	'as' => 'add-to-cart'
]);


Route::get('/cart/show',[
	'uses'=>'CardController@showcard',
	 'as' =>'/cart/show',
]);

Route::get('/delete/tocart/{rowId}', [
	'uses' =>'CardController@deletTocart', 
	'as' => 'delete-cart'
]);


Route::post('/cart/edit', [
	'uses' => 'CardController@editcart' , 
	'as' => 'quanti-edit'
]);


Route::get('/get/product', [
	'uses' => 'checkOutController@index' , 
	'as'=>'cartform'
]);



Route::post('/customer/info', [
	'uses' => 'checkOutController@customerSingeUp', 
	'as' => 'new-brand'
]);

Route::post('/checkout/customer-login', [
	'uses' => 'checkOutController@customerLoginCheck', 
	'as' => 'customer-login'
]);

Route::post('/checkout/customer-logout', [
	'uses' => 'checkOutController@customerLogout', 
	'as' => 'customer-logout'
]);

Route::get('/checkout/new-customer-logout', [
	'uses' => 'checkOutController@newcustomerLogout', 
	'as' => 'new-customer-login'
]);





// This is shipping Url

Route::get('/checkout/shipping',[
	'uses' => 'checkOutController@shippingform' ,
	 'as' => 'shapping'
]);


Route::post('/add/shipping' , [
	'uses' => 'checkOutController@addshipping', 
	'as' => 'addShipping'
]);

Route::get('/checkout/payment' , [
	'uses' => 'checkOutController@prementform', 
	'as' => 'checkout-payment'
]);

Route::post('/prement/status', [
	'uses' =>'checkOutController@prementStatus', 
	'as' => 'prementmethod'
]);

Route::get('/complet/order', [
	'uses' =>'checkOutController@completorder', 
	'as' => 'complet-order'
]);

//manage order

Route::get('/manage/order',[
	'uses' => 'OrderController@index', 
	'as' => 'manage-order'
]);


Route::get('view/oreder/detail/{id}', [
	'uses' => 'OrderController@viewOrderDetail', 
	'as' => 'view-oreder-detail'
]);


Route::get('view/oreder/invoice/{id}',[
	'uses'=> 'OrderController@viewOrederInvoice' , 
	'as' =>'view-oreder-invoice'
]);

Route::get('download/pdf/{id}', [
	'uses' =>'OrderController@downloadpdf', 
	'as'=>'download-pdf'
]);