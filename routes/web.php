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

/*

Route::get('/', function () {
   	return view('front.auth.login');
});
*/

Auth::routes();



Route::get('/', 'HomeController@index')->name('index');
Route::post('/login', 'HomeController@login')->name('admin.login');
//category and pages




Route::get('/page/{slug}','PageController@index')->name('page.index');
Route::get('/category/{slug}','CategoryController@index')->name('category.index');

Route::get('/view/all','CategoryController@listAll')->name('listing.all');

Route::get('/location/{id}','CategoryController@listingByLocation')->name('location.listing');

Route::get('/listing/{id}','ListingController@index')->name('listing.index');

Route::any('/filter/listing','ListingController@getFilterListings')->name('listing.filter');


Route::get('ajax/filter/listing','ListingController@getAjaxFilterListings')->name('ajax');

Route::get('/product/{cat}','CategoryController@listProduct')->name('list.product');





Route::group(['namespace' => 'Admin'], function () {
	
Route::get('/logout', 'HomeController@logout')->name('admin.logout');
Route::post('/login', 'HomeController@login')->name('admin.login');
Route::get('/home', 'HomeController@index')->name('admin.home');

//lisitng

Route::get('/listing', 'ListingController@index')->name('admin.listing');
Route::get('create/lisitng', 'ListingController@create')->name('admin.create.listing');

//upload bulk sheet

Route::get('/import/list', 'ImportController@listImport')->name('admin.import.list');
Route::get('/import/file', 'ImportController@getImport')->name('admin.file.import');
Route::get('/import/parse', 'ImportController@parseImport')->name('admin.import.parse');
Route::post('/import/parse', 'ImportController@parseImport')->name('admin.import.parse');
Route::get('/import/process', 'ImportController@processImport')->name('admin.import.process');
Route::post('/import/process', 'ImportController@processImport')->name('admin.import.process');


//country	
Route::get('/country/list', 'LocalisationController@showCountries')->name('admin.country.list');
Route::post('/country/create','LocalisationController@createCountry')->name('admin.country.create');
Route::post('/country/edit', 'LocalisationController@editCountry')->name('admin.country.edit');
Route::get('/country/delete/{id}', 'LocalisationController@deleteCountry')->name('admin.country.delete');

//state
Route::get('/state/list', 'LocalisationController@showState')->name('admin.state.list');
Route::post('/state/list', 'LocalisationController@showState')->name('admin.state.list');
Route::post('/state/create','LocalisationController@createState')->name('admin.state.create');
Route::post('/state/edit', 'LocalisationController@editState')->name('admin.state.edit');
Route::get('/state/delete/{id}', 'LocalisationController@deleteState')->name('admin.state.delete');

//city
Route::get('/city/list', 'LocalisationController@showCity')->name('admin.city.list');
Route::post('/city/list', 'LocalisationController@showCity')->name('admin.city.list');
Route::post('/city/create','LocalisationController@createCity')->name('admin.city.create');
Route::post('/city/edit', 'LocalisationController@editCity')->name('admin.city.edit');
Route::get('/city/delete/{id}', 'LocalisationController@deleteCity')->name('admin.city.delete');

//option
Route::get('/option','OptionController@index')->name('admin.option');
Route::get('/option/create','OptionController@createOption')->name('admin.option.create');
Route::post('/option/create','OptionController@createOption')->name('admin.option.create');
Route::get('/option/edit/{id}','OptionController@editOption')->name('admin.option.edit');
Route::post('/option/edit/{id}','OptionController@editOption')->name('admin.option.edit');
Route::get('/option/delete/{id}','OptionController@deleteOption')->name('admin.option.delete');





// Attribute

Route::get('/attribute','AttributeController@showAttribute')->name('admin.attribute');
Route::post('/attribute/edit', 'AttributeController@editAttribute')->name('admin.attribute.edit');
Route::post('/create/attribute','AttributeController@createAttribute')->name('admin.attribute.create');
Route::get('/delete/attribute/{id}','AttributeController@deleteAttribute')->name('admin.attribute.delete');

// Attribute Group

Route::get('/attributegroup','AttributeGroupController@showAttributeGroup')->name('admin.attribute_group');
Route::post('/attributegroup/edit','AttributeGroupController@editAttributeGroup')->name('admin.attribute_group.edit');
Route::post('/create/attributegroup','AttributeGroupController@createAttributeGroup')->name('admin.attribute_group.create');
Route::get('/delete/attributegroup/{id}','AttributeGroupController@deleteAttributeGroup')->name('admin.attribute_group.delete');

// Manufacture

Route::get('/manufacture','ManufactureController@showManufacturer')->name('admin.manufacture');
Route::post('/manufacture','ManufactureController@createManufacturer')->name('admin.manufacture.create');
Route::post('/manufacture/edit/{id}','ManufactureController@editManufacturer')->name('admin.manufacture.edit');
Route::get('manufacture/delete/{id}','ManufactureController@deleteManufacturer')->name('admin.manufacture.delete');




//Category
Route::get('/category','CategoryController@showCategory')->name('admin.category.list');
Route::post('/category','CategoryController@showCategory')->name('admin.category.list');
Route::get('/create/category','CategoryController@createCategory')->name('admin.category.create');
Route::post('/create/category','CategoryController@createCategory')->name('admin.category.create');
Route::get('/edit/category/{id}', 'CategoryController@editCategory')->name('admin.category.edit');
Route::post('/edit/category/{id}', 'CategoryController@editCategory')->name('admin.category.edit');
Route::get('/delete/category/{id}','CategoryController@deleteCategory')->name('admin.category.delete');

//Product

Route::get('/product-list','ProductController@index')->name('admin.product');
Route::post('/product-list','ProductController@index')->name('admin.product');
Route::get('/create/product','ProductController@createProduct')->name('admin.product.add');
Route::post('/create/product','ProductController@createProduct')->name('admin.product.add');
Route::get('/product/edit/{id}','ProductController@editProduct')->name('admin.product.edit');
Route::post('/product/edit/{id}','ProductController@editProduct')->name('admin.product.edit');
Route::get('/product/delete/{id}','ProductController@deleteProduct')->name('admin.product.delete');
Route::get('/product-inventory','ProductController@inventory')->name('admin.product.inventory');
Route::post('/product-inventory','ProductController@inventory')->name('admin.product.inventory');

Route::get('/product-approval','ProductController@productApproval')->name('admin.product-approval');
Route::post('/product-approval','ProductController@productApproval')->name('admin.product-approval');

Route::get('/product-featured','ProductController@productFeatured')->name('admin.product-featured');
Route::post('/product-featured','ProductController@productFeatured')->name('admin.product-featured');

Route::get('/update-bulk-status','BulkUpdateStatus@index')->name('admin.bulk.status');
Route::post('/update-bulk-status','BulkUpdateStatus@index')->name('admin.bulk.status');


Route::get('/update-bulk-status','BulkUpdateStatus@index')->name('admin.bulk.status');
Route::post('/update-bulk-status','BulkUpdateStatus@index')->name('admin.bulk.status');


Route::get('ajaxUpdateMenuStatus', array('as'=> 'ajaxUpdateMenuStatus','uses'=> 'AjaxController@ajaxUpdateMenuStatus'));
Route::post('ajaxUpdateMenuStatus', array('as'=> 'ajaxUpdateMenuStatus','uses'=> 'AjaxController@ajaxUpdateMenuStatus'));

Route::get('ajaxUpdateFeature', array('as'=> 'ajaxUpdateFeature','uses'=> 'AjaxController@ajaxUpdateFeature'));
Route::post('ajaxUpdateFeature', array('as'=> 'ajaxUpdateFeature','uses'=> 'AjaxController@ajaxUpdateFeature'));

//bulk status update ajax
Route::get('ajaxBulkUpdate', array('as'=> 'ajaxBulkUpdate','uses'=> 'AjaxController@ajaxBulkUpdate'));
Route::post('ajaxBulkUpdate', array('as'=> 'ajaxBulkUpdate','uses'=> 'AjaxController@ajaxBulkUpdate'));




//support
Route::get('/support','SupportController@index')->name('admin.support');
Route::get('/support/edit/{id}','SupportController@editSupport')->name('admin.support.edit');
Route::post('/support/commnet','SupportController@addCommnet')->name('admin.support.comment');



//Filter:-


Route::get('/filter','FilterController@showfilter')->name('admin.filter');
Route::post('/filter/edit','FilterController@editFilter')->name('admin.filter.edit');
Route::post('/create/filter','FilterController@createFilter')->name('admin.filter.create');
Route::get('/filter/delete/{id}','FilterController@deleteFilter')->name('admin.filter.delete');

//----------------------------------------------------------------------------------------------------------------------------

//Filter Group

Route::get('/filtergroup','FilterGroupController@showFilterGroup')->name('admin.filter_group');
Route::post('/filtergroup/edit','FilterGroupController@editFilterGroup')->name('admin.filter_group.edit');
Route::post('/create/filtergroup','FilterGroupController@createFilterGroup')->name('admin.filter_group.create');
Route::get('/filtergroup/delete/{id}','FilterGroupController@deleteFilterGroup')->name('admin.filter_group.delete');


//----------------------------------------------------------------------------------------------------------------------------

//Customer Group:-

Route::get('/customergroup','CustomerGroupController@showCustomerGroup')->name('admin.customer_group');
Route::post('/customergroup/edit','CustomerGroupController@editCustomerGroup')->name('admin.customer_group.edit');
Route::post('/create/customergroup','CustomerGroupController@createCustomerGroup')->name('admin.customer_group.create');
Route::get('/deletecustomer/{id}','CustomerGroupController@deleteCustomerGroup')->name('admin.customer_group.delete');

//----------------------------------------------------------------------------------------------------------------------------



// Promotion:-

// view Promotion Page
Route::get('/promotion','PromotionController@showPromotion')->name('admin.promotion');
Route::get('/promotion/edit/{id}','PromotionController@editPromotion')->name('admin.promotion.edit');
Route::post('/promotion/edit/{id}','PromotionController@editPromotion')->name('admin.promotion.edit');
Route::get('/create/promotion','PromotionController@createPromotion')->name('admin.promotion.create');
Route::post('/create/promotion','PromotionController@createPromotion')->name('admin.promotion.create');
Route::get('/deletepromotion/{id}','PromotionController@deletePromotion')->name('admin.promotion.delete');
Route::get('/promotionname','PromotionController@showPromotion')->name('admin.promotion_name');

//----------------------------------------------------------------------------------------------------------------------------

// Bussiness Type

Route::get('/businesstype','CommonController@showBusinessType')->name('admin.businesstype');
Route::get('/edit/businesstype/{id}','CommonController@editBusinesstype')->name('admin.edit_businesstype');
Route::post('/edit/businesstype/{id}','CommonController@editBusinesstype')->name('admin.edit_businesstype');
Route::get('/create/businesstype','CommonController@createBusinesstype')->name('admin.create_businesstype');
Route::post('/create/businesstype','CommonController@createBusinesstype')->name('admin.create_businesstype');
Route::get('/delete/businesstype/{id}','CommonController@deleteBussinessType')->name('admin.businesstype.delete');

//information page
Route::get('information','InformationController@showInformation')->name('admin.information');
Route::get('create/information','InformationController@createInformation')->name('admin.create_information');
Route::post('create/information','InformationController@createInformation')->name('admin.create_information');
Route::get('edit/information/{id}','InformationController@editInformation')->name('admin.edit_information');
Route::post('edit/information/{id}','InformationController@editInformation')->name('admin.edit_information');
Route::get('/delete/information/{id}','InformationController@deleteInformation')->name('admin.delete_information');


//pages
Route::get('/page/{seo_url}', 'PageController@getPage')->name('page');

// Setting :-

//Route::get('/setting','SettingController@showSetting')->name('admin.setting');
//Route::get('/edit/setting/{id}','SettingController@editSetting')->name('admin.edit_setting');
//Route::post('/edit/setting/{id}','SettingController@editSetting')->name('admin.edit_setting');
Route::get('/website/setting','SettingController@createSetting')->name('admin.website.setting');
Route::post('/website/setting','SettingController@createSetting')->name('admin.website.setting');


// User :-

Route::get('/user','UserController@showUser')->name('admin.user');
Route::get('/edit/user/{id}','UserController@editUser')->name('admin.edit_user');
Route::post('/edit/user/{id}','UserController@editUser')->name('admin.edit_user');
Route::get('/editpassword/user/{id}','UserController@editpassword')->name('admin.editpassword_user');
Route::post('/editpassword/user/{id}','UserController@editpassword')->name('admin.editpassword_user');
Route::get('/create/user','UserController@createUser')->name('admin.create_user');
Route::post('/create/user','UserController@createUser')->name('admin.create_user');
Route::get('/user/delete/{id}','UserController@deleteUser')->name('admin.user.delete');
//----------------------------------------------------------------------------------------------------------------------------


// seller Profile:-

Route::get('/seller/list','SellerProfileController@showSeller')->name('admin.seller.list');
Route::get('/seller/create','SellerProfileController@createSeller')->name('admin.seller.create');
Route::post('/seller/create','SellerProfileController@createSeller')->name('admin.seller.create');
Route::get('/seller/edit/{id}','SellerProfileController@editSeller')->name('admin.seller.edit');
Route::post('/seller/edit/{id}','SellerProfileController@editSeller')->name('admin.seller.edit');
Route::get('/seller/delete/{id}','SellerProfileController@deleteSeller')->name('admin.seller.delete');

//get ajax state and city
Route::get('/state','AjaxController@selectState')->name('admin.state');
Route::get('/city','AjaxController@selectCity')->name('admin.city');
Route::get('/option/list','AjaxController@selectOptionList')->name('admin.option.list');






//Commission
Route::get('/commision/list','CommisionController@showCommision')->name('admin.commision-list');
Route::get('/commision/create','CommisionController@createCommision')->name('admin.commision.create');
Route::post('/commision/create','CommisionController@createCommision')->name('admin.commision.create');
Route::get('/commision/edit/{id}','CommisionController@editCommision')->name('admin.edit-commision');
Route::post('/commision/edit/{id}','CommisionController@editCommision')->name('admin.edit-commision');
Route::get('/commision/delete/{id}','CommisionController@deleteCommision')->name('admin.commision-delete');




// Master-Commission

Route::get('/mastercommission','MasterCommisionController@showMasterCommision')->name('admin.mastercommission');
Route::post('/mastercommission/edit', 'MasterCommisionController@editMasterCommision')->name('admin.mastercommission.edit');
Route::post('/create/mastercommission','MasterCommisionController@createMasterCommision')->name('admin.mastercommission.create');
Route::get('/delete/mastercommission/{id}','MasterCommisionController@deleteMasterCommision')->name('admin.mastercommission.delete');



Route::get('/feature/list','ProductController@showFeatureProducts')->name('admin.feature_products');
Route::get('/sponser/list','ProductController@showSponserProducts')->name('admin.sponser_products');


Route::get('/bulk/image/upload','FileManagerController@bulkUplodFiles')->name('admin.bulk.image.upload');
Route::post('/bulk/image/upload','FileManagerController@bulkUplodFiles')->name('admin.bulk.image.upload');

});




// Localisation
	
