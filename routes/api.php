<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//api_test -- gurad
//apiToken -- middleware // partnerApi

//Route::any('FileManager/FileOperations','Api\Partner\FileManagerController@index');

Route::group(['namespace' => 'Api'], function () { 

    Route::get('get-category-product/{id}', 'ProductController@getCategoryProduct')->name('get-category-product');
    Route::get('get-all-category', 'CategoryController@getAllcategory')->name('get-all-category');
    Route::get('product-details/{id}', 'ProductController@productDetails')->name('product-details');
    Route::get('get-all-product', 'ProductController@getAllproduct')->name('get-all-product');

    
     


    Route::group(['namespace' => 'Auth'], function () { 
        Route::get('notvalid', 'AuthController@notValid')->name('notvalid');
        Route::post('login', 'AuthController@login')->name('login');
        Route::post('register', 'AuthController@register')->name('register');  
        Route::post('password-request', 'AuthController@passwordRequest')->name('password-request');
        Route::get('password-check/{token}', 'AuthController@password_check')->name('password-check');
        Route::post('password-reset', 'AuthController@resetPassword')->name('password-reset');  
        Route::middleware('apiAuth:api')->group(function () {
            Route::middleware('partnerApi')->group(function () { 
                //Route::get('test', 'AuthController@test')->name('test');
                Route::get('get-user-address', 'AuthController@getUserAddress')->name('get-user-address');
                Route::get('get-user-profile', 'AuthController@getUserProfile')->name('get-user-profile');
                Route::post('change-password', 'AuthController@changePassword')->name('change-password');
                Route::post('update-user-profile', 'AuthController@updateUserProfile')->name('update-user-profile');
                Route::get('logout', 'AuthController@logout')->name('logout');
            });
        });    
    });
    Route::group(['namespace' => 'Partner'], function () { 
            Route::get('get-business-type','PartnerController@get_business_type')->name('get-business-type');
            Route::get('get-country', 'PartnerController@getCountry')->name('get-country');
            Route::get('get-state/{id}', 'PartnerController@getState')->name('get-state');
            Route::get('get-city/{id}', 'PartnerController@getCity')->name('get-city');
          Route::middleware('apiAuth:api')->group(function () {
            Route::middleware('partnerApi')->group(function () { 


                       
                       
                      Route::get('category-manufacture', 'PartnerController@category_manufacture')->name('category-manufacture');
                      Route::get('get-category', 'PartnerController@get_category')->name('get-category');
                      Route::get('get-customer-group', 'PartnerController@get_customer_group')->name('get-customer-group');
                      Route::post('create-promotion', 'PartnerController@CreatePromotion')->name('create-promotion');
                      Route::get('edit-promotion/{id}', 'PartnerController@editPromotion')->name('edit-promotion');
                      Route::post('edit-promotion/{id}', 'PartnerController@editPromotion')->name('edit-promotion');
                      Route::get('get-promotion', 'PartnerController@get_promotion')->name('get-promotion');
                      Route::any('delete-promotion/{id}', 'PartnerController@delete_promotion')->name('delete-promotion');

                       Route::get('get-option', 'PartnerController@get_option')->name('get-option');
					   
					   Route::get('get-option-edit', 'PartnerController@get_edit_option')->name('get-option-edit');

                     Route::post('product-filter', 'PartnerController@product_filter')->name('product-filter');
                       Route::post('create-product', 'PartnerController@CreateProduct')->name('create-product');
                       Route::get('option-list','PartnerController@selectOptionList')->name('option-list');
                       Route::get('option-value-list/{id}','PartnerController@OptionValueList')->name('option-value-list');
					    Route::get('option-value-list-edit/{id}','PartnerController@OptionValueListEdit')->name('option-value-list-edit');
                       Route::get('get-attribute','PartnerController@get_attributes')->name('get-attribute');
                       Route::get('get-product-list','PartnerController@product_list')->name('get-product-list');
                        Route::any('delete-product/{id}', 'PartnerController@delete_product')->name('delete-product');
                          Route::get('edit-product/{id}', 'PartnerController@product_edit')->name('edit-product');
                           Route::post('edit-product/{id}', 'PartnerController@product_edit')->name('edit-product');

                       Route::get('get-support-category','PartnerController@support_category')->name('get-support-category');
                       Route::post('create-support','PartnerController@create_support')->name('create-support');
                       Route::get('get-support-list','PartnerController@get_support_list')->name('get-support-list');
                       Route::get('support-view/{id}','PartnerController@support_view')->name('support-view');

                       Route::post('create-shipping','PartnerController@create_shipping')->name('create-shipping');
                       Route::get('get-shipping','PartnerController@getShipping')->name('get-shipping');

                        Route::get('edit-shipping/{id}','PartnerController@shipping_view')->name('edit-shipping');
                        Route::post('update-shipping/{id}','PartnerController@shipping_update')->name('update-shipping');
                        Route::any('delete-shipping/{id}', 'PartnerController@delShipping')->name('delete-shipping');

                        Route::get('import-list','ImportController@listImport')->name('import-list');
                        Route::get('excel-map-field','ImportController@getMapFiled')->name('excel-map-field');
                         Route::post('import-excel','ImportController@parseImport')->name('import-excel');
                          Route::post('import-excel-parse','ImportController@processImport')->name('import-excel-parse');
                           Route::post('update-support-comment','PartnerController@update_support_comment')->name('update-support-comment');

                           Route::post('bulk-image-upload','FileManagerController@bulkUplodFiles')->name('bulk-image-upload');


            });
        });    
           
    });
            
     
   
    
 
});


/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/


