<?php

use Illuminate\Http\Request;



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('paymentStatus','shopPaymentStatusController');





Route::get('getTotalBranch','ShopInformation\ShopBranchController@getTotalBranch');

Route::post('BranchInformationUpdate/{id}','ShopInformation\BranchInformation\BranchInformationController@update');
Route::get('getBranchInformationEdit/{id}','ShopInformation\BranchInformation\BranchInformationController@show');
Route::get('getTotalBranchCreate','ShopInformation\BranchInformation\BranchInformationController@getTotalBranchCreate');

Route::resource('BranchInformation','ShopInformation\BranchInformation\BranchInformationController');



Route::resource('/shopTypeEntry','ShopTypeEntryController');
Route::resource('currencyList','currencyController');
Route::resource('countryList','countryController');
Route::resource('divisionList','divisionController');
Route::get('divisionListById/{id}','divisionController@divisionListById');
Route::resource('districtList','districtController');
Route::get('districtListById/{id}','districtController@districtListById');
Route::resource('upazilaList','upazillaController');
Route::get('upazilaListById/{id}','upazillaController@upazilaListById');
Route::resource('unionList','unionController');
Route::get('unionListById/{id}','unionController@unionListById');
Route::resource('wardList','wardController');
Route::get('wardListById/{id}','wardController@wardListById');

Route::resource('qrCodeSetup','QrCodeSetupController');
Route::get('/qrCodeSetup/changeStatus/{id}','QrCodeSetupController@changeStatus');




Route::resource('invoiceSetup','invoiceSetupController');
Route::get('/invoiceTypeList','invoiceSetupController@invoiceTypeList');
Route::get('/invoiceForList','invoiceSetupController@invoiceForList');
Route::get('/invoiceSetup/changeStatus/{id}','invoiceSetupController@changeStatus');

Route::get('/purchaseType','PurchaseTypeController@index');
Route::post('/purchaseType/create','purchaseTypeController@store');
Route::get('/purchase/edit/{id}','purchaseTypeController@edit');
Route::get('/purchaseStatusChange/{id}','purchaseTypeController@statusChange');
Route::post('/purchase/update/{id}','purchaseTypeController@update');
Route::get('/purchase/delete/{id}','purchaseTypeController@delete');
Route::get('/purchase/edit/{id}','purchaseTypeController@edit');

Route::get('/vendors','VendorController@index');
Route::post('/vendor/create','VendorController@store');
Route::get('/vendor/edit/{id}','VendorController@edit');
Route::get('/vendor/delete/{id}','VendorController@delete');

Route::post('/basicInfo/create','BasicInfoController@store');