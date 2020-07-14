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

Route::get('/', function () {
    return view('admin.home');
});

Auth::routes();
/*Route::group(['middleware' => ['freelancer']], function () {

 });*/

Route::group(['namespace' => 'Admin'], function () {  
	Route::get('/home', 'HomeController@index')->name('admin.home');
	
	Route::GET('/country', 'LocalisationController@showCountries')->name('admin.country');
Route::GET('/state', 'LocalisationController@showStates')->name('admin.state');
Route::GET('/city', 'LocalisationController@showCities')->name('admin.city');
Route::POST('/country/edit', 'LocalisationController@editCountry')->name('admin.country.edit');
Route::POST('/state/edit', 'LocalisationController@editState')->name('admin.state.edit');
Route::POST('/city/edit', 'LocalisationController@editCity')->name('admin.city.edit');
Route::post('/create/country','LocalisationController@createCountry')->name('admin.country.create');
Route::get('delete','LocalisationController@createcountry@destroy');

// Attribute

Route::get('/attribute','AttributeController@showAttribute')->name('admin.attribute');
Route::POST('/attribute/edit', 'AttributeController@editAttribute')->name('admin.attribute.edit');
Route::post('/create/attribute','AttributeController@createAttribute')->name('admin.attribute.create');
Route::get('/delete/attribute/{id}','AttributeController@deleteAttribute')->name('admin.attribute.delete');

// Attribute Group

Route::get('/attributegroup','AttributeGroupController@showAttributeGroup')->name('admin.attribute_group');
Route::POST('/attributegroup/edit','AttributeGroupController@editAttributeGroup')->name('admin.attribute_group.edit');
Route::POST('/create/attributegroup','AttributeGroupController@createAttributeGroup')->name('admin.attribute_group.create');


// Manufacture

Route::get('/manufacture','ManufactureController@showManufacturer')->name('admin.manufacture');
Route::post('/manufacture','ManufactureController@createManufacturer')->name('admin.manufacture');
Route::get('/delete/{id}','ManufactureController@deleteManufacturer')->name('admin.manufacture.delete');



Route::get('/category-list','CategoryController@index')->name('admin.category');
Route::get('/create/category','CategoryController@CreateCategory')->name('admin.category.add');
Route::post('/create/category','CategoryController@CreateCategory')->name('admin.category.add');
Route::get('/category/edit/{id}','CategoryController@editCategory')->name('admin.category.edit');
Route::post('/category/edit/{id}','CategoryController@editCategory')->name('admin.category.edit');


Route::get('/product-list','ProductController@index')->name('admin.product');

Route::get('/create/product','ProductController@CreateProduct')->name('admin.product.add');
Route::post('/create/product','ProductController@CreateProduct')->name('admin.product.add');

Route::get('/product/edit/{id}','ProductController@editProduct')->name('admin.product.edit');
Route::post('/product/edit/{id}','ProductController@editProduct')->name('admin.product.edit');

Route::get('/product-inventory','ProductController@inventory')->name('admin.product.inventory');

//support
Route::get('/support','SupportController@index')->name('admin.support');
Route::get('/support/edit/{id}','SupportController@editSupport')->name('admin.support.edit');
Route::post('/support/commnet','SupportController@addCommnet')->name('admin.support.comment');
Route::get('/option/list','AjaxController@selectOptionList')->name('admin.option.list');

Route::get('csv-import','ExcelContoller@importExcel')->name('admin.csvImport');
Route::post('csv-import','ExcelContoller@importExcel')->name('admin.csvImport');






});




// Localisation
	
