<?php

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();





Route::prefix('shop')->group(function() {
    Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('logout/', 'Auth\AdminLoginController@logout')->name('admin.logout');
    Route::get('/', 'Auth\AdminController@index')->name('admin.dashboard');
   });






//    -------------- Developer : Nazmul Huda - Doofaz IT Limited

Route::get('getVoucherEntryInformationById/{id}','Accounting\voucherEntryController@getVoucherEntryInformationById');
Route::get('getSubHeadOfAccounts/{id}','Accounting\voucherEntryController@getSubHeadOfAccounts');
Route::get('getVoucherHeadCashbookCode/{id}','Accounting\voucherEntryController@getVoucherHeadCashbookCode');
Route::get('getVoucherCode/{id}','Accounting\voucherEntryController@getVoucherCode');
Route::resource('/voucherEntryInformation','Accounting\voucherEntryController');

Route::get('/accountSetupHeadNameList/{id}','Accounting\accountSetupController@accountSetupHeadNameList');
Route::get('/placementTypeList','Accounting\accountSetupController@placementTypeList');
Route::resource('/accountSetupInfo','Accounting\accountSetupController');

Route::get('/getDownlinkInformation/{id}','Accounting\chartOfAccountController@getDownlinkInformation');
Route::get('/getUplinkInformation/{id}','Accounting\chartOfAccountController@getUplinkInformation');
Route::get('/accountGroupTypes','Accounting\chartOfAccountController@chartOfAccountGroupType');
Route::resource('/chartOfAccount','Accounting\chartOfAccountController');

Route::get('/getAccountGroup','Accounting\chartOfAccountController@getAccountGroup');
Route::get('/getPurchaseProductList','PurchaseController@getPurchaseProductList');
Route::get('/getInvoiceSetupInformation','PurchaseController@getInvoiceSetupInformation');
Route::get('/getInvoiceInformation/{id}','PurchaseController@getInvoiceInformation');
Route::get('/getSupllierInfo/{id}','PurchaseController@getSupllierInformation');


Route::get('getTotalBranchCreate','ShopInformation\ShopBranchController@getTotalBranchCreate');
Route::get('getAuthInfo','UserInfoController@getAuthInfo');
Route::get('getAccountInfoById','ShopInformation\shopAccountIntormationController@getAccountInfoById');
Route::get('getAccountInfoByShopId/{id}','ShopInformation\shopAccountIntormationController@getAccountInfoByShopId');
Route::get('getCurrencyRate','ShopInformation\shopInformationController@getCurrencyRate');
Route::get('getMyCurrency','ShopInformation\shopAccountIntormationController@getMyCurrency');

Route::get('shopBillDateExpired','ShopInformation\shopInformationController@shopBillDateExpired');
Route::get('branchInformationByShop','ShopInformation\BranchInformation\BranchInformationController@branchInformationByShop');
Route::get('getBranchCode','ShopInformation\BranchInformation\BranchInformationController@getBranchCode');




Route::resource('shopInformation','ShopInformation\ShopInformationController');
Route::get('/getMyGuard','ShopInformation\ShopInformationController@getMyGuard');
Route::get('/shopInformationSearch/{id}','ShopInformation\ShopInformationController@shopInformationSearch');
Route::get('/getShopId/{id}','ShopInformation\ShopInformationController@getShopId');
Route::get('/shopInformation/changeStatus/{id}','ShopInformation\ShopInformationController@changeStatus');
Route::post('topupBalance','ShopInformation\ShopInformationController@topupBalance');
Route::post('payBill','ShopInformation\ShopInformationController@payBill');

Route::get('/checkShopUserName/{userName}','ShopInformation\ShopInformationController@checkShopUserName');


Route::resource('shopStatus','shopStatusController');

Route::get('getTotalBranch','ShopInformation\ShopBranchController@getTotalBranch');

Route::post('BranchInformationUpdate/{id}','ShopInformation\BranchInformation\BranchInformationController@update');
Route::get('getBranchInformationEdit/{id}','ShopInformation\BranchInformation\BranchInformationController@show');


Route::resource('BranchInformation','ShopInformation\BranchInformation\BranchInformationController');

//    -------------- Developer : Nazmul Huda - Doofaz IT Limited
 
 









Route::get('/home', 'HomeController@index')->name('home');
/////////////////  Admin  configuration Route    //////////////////
//  AdminMenuTitle













Route::get('getUserInfoWtihShopType','UserInfoController@getUserInfoWtihShopType');
Route::resource('getUserInfo','UserInfoController');





// website information 
Route::post('/website/create', 'websiteInfoController@store');
Route::get('/website/edit/{id}', 'websiteInfoController@edit');
Route::post('/website/update/{id}', 'websiteInfoController@update');
Route::delete('/website/delete/{id}', 'websiteInfoController@delete');
Route::resource('websiteInfo', 'websiteInfoController');



 
Route::resource('/adminMenuTitle','AdminMenuTitleController');

Route::get('/statusChangeEvent/{adminMenuTitleId}','AdminMenuTitleController@changeStatuas');
//  AdminMenu
Route::resource('/adminMenu','AdminMenuController');
Route::get('/statusChangeEventMenu/{id}','AdminMenuController@changeStatus');
Route::get('/adminMenulistById/{id}','AdminMenuController@adminMenulistById');
Route::get('/adminMenuTitlelist','AdminMenuController@adminMenuTitlelist');
Route::get('/adminMenuTitlePositionSelect/{adminMenuTitleId}','AdminMenuController@menuTitlePositionSelect');
//  AdminSubMenu
Route::resource('/adminSubMenu','AdminSubMenuController');
Route::get('/adminSubMenueStatus/{adminSubMenuId}','AdminSubMenuController@adminSubMenueStatus');
Route::get('/adminMenuPositionSelect/{adminMenuId}','AdminSubMenuController@menuPositionSelect');
//  AdminTypeName
Route::resource('/adminTypeName','AdminTypeNameController');
//  AdminEntry
Route::resource('/adminEntry','AdminEntryController');
Route::get('/adminEntryUserId','AdminEntryController@adminEntryUserId');
//  AdminSetup
Route::resource('/adminSetup','AdminSetupController');
Route::get('/admintypename','AdminSetupController@admintypename');
// AdminMenuPermission
Route::resource('/adminMenuPermission','AdminMenuPermissionController');
Route::get('/permissionmenushow','AdminMenuPermissionController@permissionmenushow');
Route::get('/adminTypeShow/{adminId}','AdminMenuPermissionController@adminTypeShow');
Route::get('/adminSubMenuShow','AdminMenuPermissionController@adminSubMenuShow');
Route::get('/adminMenuShow/{adminId}/{menuId}','AdminMenuPermissionController@adminMenuShow');
Route::get('/adminSingleSubMenuShow/{adminId}/{menuId}','AdminMenuPermissionController@adminSubMenuEditShow');
Route::get('/adminPermissionMenus/{adminId}/{adminType}','AdminMenuPermissionController@adminPermissionMenus');
Route::get('/adminPermissionSubMenus/{adminId}/{adminType}','AdminMenuPermissionController@adminPermissionSubMenus');
Route::get('/adminMenuPermissionChange/{adminId}/{adminType}/{menuId}','AdminMenuPermissionController@adminMenuPermissionChange');
Route::get('/adminSubMenuPermissionChange/{adminId}/{adminType}/{subMenuId}','AdminMenuPermissionController@adminSubMenuPermissionChange');
/////////////////   Admin  Configuration  Setup Route        //////////////////
Route::resource('/adminBussinessType','AdminBussinessTypeController');
Route::resource('/uniteEntry','UniteEntryController');
Route::resource('/assetBrandEntry','AssetEntryController');
Route::resource('/shopCustomerTypeEntry','ShopCustomerTypeEntryController');
Route::resource('/shopTypeEntry','ShopTypeEntryController');
Route::resource('/bankTypeEntry','BankTypeEntryController');
Route::resource('/bankEntry','BankEntryController');
Route::resource('/adminHolidayType','AdminHolidayTypeController');
Route::resource('/commissionTypeEntry','CommissionTypeEntryController');
Route::resource('/productBrandEntry','ProductBrandEntryController');
Route::resource('/adminLicenceType','AdminlicenceTypeController');
Route::resource('/adminMetaKeyDescription','AdminMetaKeyDescriptionController');
Route::resource('/adminPurchaseType','AdminPurchaseTypeController');
Route::resource('/adminEducationEntry','AdminEducationController');

Route::get('/nameOfDegreeEditData/{nameOfDegreeId}','AdminEducationController@nameOfDegreeEdit');
Route::post('/nameOfDegreeUpdate','AdminEducationController@nameOfDegreeUpdate');

Route::get('/gradeEditData/{gradeId}','AdminEducationController@gradeEditData');
Route::post('/gradeUpdate','AdminEducationController@gradeUpdate');

Route::get('/skillGradeEditData/{skillGradeId}','AdminEducationController@skillGradeEditData');
Route::post('/skillGradeUpdate','AdminEducationController@skillGradeUpdate');

Route::get('/degreeChangeStatus/{nameOfDegreeId}','AdminEducationController@degreeChangeStatus');
Route::get('/gradeChangeStatus/{gradeId}','AdminEducationController@gradeChangeStatus');
Route::get('/skillGradeChangeStatus/{skillGradeId}','AdminEducationController@skillGradeChangeStatus');

Route::get('/degreeDistroy/{nameOfDegreeId}','AdminEducationController@degreeDistroy');
Route::get('/gradeDistroy/{gradeId}','AdminEducationController@gradeDistroy');
Route::get('/skillGradeDistroy/{skillGradeId}','AdminEducationController@skillGradeDistroy');

////////////////  Admin Shop Login Route    //////////////////
// Route::get('/shop/login','AdminShopInformationController@shoplogin');
Route::resource('/adminshopInformation','AdminShopInformationController');

/////////////////      Sales Route        //////////////////
// Sales
Route::resource('/salesInvoiceEntry','SalesInvoiceController');
Route::resource('/salesProductEntry','SalesProductController');
Route::post('/customerInformationEntry','SalesProductController@customerInformationEntry');
Route::get('/salesStackProductWithPrice','SalesProductController@salesStackProductWithPrice');
Route::post('/salesProductQuantityUpdate','SalesProductController@salesProductQuantityUpdate');
Route::get('/customerTypeIdCatch/{customerTypeId}','SalesProductController@customerTypeIdCatch');
Route::get('/customerIdCatch/{customerId}','SalesProductController@customerIdCatch');
Route::get('/salesTotalBalanceWithInvoice/{salesInvoiceNo}','SalesProductController@salesTotalBalance');
Route::get('/purchaseProductIdCatch/{purchaseProductId}/{priceType}','SalesProductController@purchaseProductIdCatch');
// Product Price
Route::resource('/salesProductPriceEntry','SalesProductPriceEntryController');
Route::get('/salesProductNameShow','SalesProductPriceEntryController@salesProductNameShow');
Route::get('/productUnitePrice/{purchaseProductId}','SalesProductPriceEntryController@productUnitePrice');
// Product Discount
Route::resource('/salesProductDiscountPriceEntry','SalesProductDiscountPriceEntryController');
Route::get('/productPriceEntryInfo/{purchaseProductId}','SalesProductDiscountPriceEntryController@productPriceEntryInfo');

// Product Report
Route::get('/salesProductPriceReport','SalesProductReportController@salesProductPriceReport');
Route::get('/salesProductDiscountPriceReport','SalesProductReportController@salesProductDiscountPriceReport');
Route::get('/salesCustomerListReport','SalesProductReportController@salesCustomerListReport');
Route::post('/serchCustomerInfo','SalesProductReportController@serchCustomerInfo');


/////////////////      Purchase Route        //////////////////
//  Brand Entry
Route::resource('/purchaseBrandEntry','BrandEntryController');
Route::get('/purchaseBrandEntry/changeStatus/{id}','BrandEntryController@changeStatus');
//  Purchase Entry
Route::resource('/purchaseInvoice','PurchaseController');
Route::get('/shopWishProductSupplier','PurchaseController@shopWishProductSupplier');
Route::get('/shopWishProductSupplierId/{ProductSupplierId}','PurchaseController@shopWishProductSupplierId');
Route::get('/purchaseInvoiceShow','PurchaseController@purchaseInvoiceShow');
Route::get('/purchaseTypeShow','PurchaseController@purchaseTypeShow');
Route::get('/unitNameShow','PurchaseController@unitNameShow');
Route::get('/productNameShow','PurchaseController@productNameShow');
Route::post('/productEntry','PurchaseController@productEntry');
Route::post('/productQuantityUpdate','PurchaseController@productQuantityUpdate');
Route::get('/productList','PurchaseController@purchaseProductList');
Route::get('/totalPurchaseValue/{purchaseInvoiceNo}','PurchaseController@totalPurchaseValue');
Route::post('/purchaseProductDetails','PurchaseController@purchaseProductDetails');
Route::get('/purchaseProductInfo/{purchaseProductId}','PurchaseController@purchaseProductInfo');
Route::get('/invoiceProductMoreDetails/{productId}/{invoiceNo}','PurchaseController@invoiceProductMoreDetails');
Route::get('/purchaseProductMoreFieldDelete/{id}','PurchaseController@purchaseProductMoreFieldDelete');
Route::post('/purchaseProductDetailsUpdate','PurchaseController@purchaseProductDetailsUpdate');
Route::resource('/addProductSupplier','ShopAddProductSupplierController');


// Purchase Report
Route::get('/productSupplierReport','PurchaseReportController@productSupplierReport');
Route::get('/supplierInvoiceDetails/{productSupplierId}','PurchaseReportController@supplierInvoiceDetails');
Route::get('/purchaseInvoiceReport','PurchaseReportController@purchaseInvoiceReport');
Route::get('/purchaseProductReport','PurchaseReportController@purchaseProductReport');
Route::get('/purchaseProductReportList/{purchaseProductId}','PurchaseReportController@purchaseProductReportList');
Route::get('/purchaseProductReportDetails/{purchaseProductId}','PurchaseReportController@purchaseProductReportDetails');



/////////////////     Inventory Route        //////////////////
// Category Route
Route::resource('/category','CategoryController');
Route::get('/cateorySelectList','CategoryController@cateorySelectList');
Route::get('/categoryId/{categoryId}','CategoryController@categoryId');
Route::get('/subCategoryId/{subCategoryId}','CategoryController@subCategoryId');
Route::get('/thirdCategoryId/{thirdCategoryId}','CategoryController@thirdCategoryId');
Route::get('/fourCategoryId/{fourCategoryId}','CategoryController@fourCategoryId');
Route::get('/fiveCategoryId/{fiveCategoryId}','CategoryController@fiveCategoryId');
Route::get('/sixCategoryId/{sixCategoryId}','CategoryController@sixCategoryId');
Route::get('/sevenCategoryId/{sevenCategory}','CategoryController@sevenCategoryId');
Route::get('/adminShopTypeIdSelect/{shopTypeId}','CategoryController@adminShopTypeIdSelect');
Route::get('/categoryEdit/allCategory','CategoryController@categoryEditallCategory');

// Product Route
Route::resource('/productName','ProductNameController');
Route::get('/productCateorySelectList','ProductNameController@productCateorySelectList');
Route::get('/productCategoryId/{categoryId}','ProductNameController@productCategoryId');
Route::get('/productSubCategoryId/{subCategoryId}','ProductNameController@productSubCategoryId');
Route::get('/productThirdCategoryId/{thirdCategoryId}','ProductNameController@productThirdCategoryId');
Route::get('/productFourCategoryId/{fourCategoryId}','ProductNameController@productFourCategoryId');
Route::get('/productFiveCategoryId/{fiveCategoryId}','ProductNameController@productFiveCategoryId');
Route::get('/productSixCategoryId/{sixCategoryId}','ProductNameController@productSixCategoryId');

// Inventory Report Route
Route::get('/stockSummaryProductReport','InventoryReportController@stockSummaryProductReport');
Route::get('/stockSummaryProductDetails/{purchaseProductId}','InventoryReportController@stockSummaryProductDetails');
Route::get('/stockShortageProductReport','InventoryReportController@stockShortageProductReport');
Route::get('/inventoryProductNameWithoutPrice','InventoryReportController@inventoryProductNameWithoutPrice');
Route::get('/inventoryProductNameWithPrice','InventoryReportController@inventoryProductNameWithPrice');
Route::get('/invetoryCategoryWithoutPriceList','InventoryReportController@invetoryCategoryWithoutPriceList');
Route::get('/invetoryCategoryWithPriceList','InventoryReportController@invetoryCategoryWithPriceList');
Route::get('/lowQuantityProductList','InventoryReportController@lowQuantityProductList');
Route::get('/expireDateOverProductList','InventoryReportController@expireDateOverProductList');
Route::get('/expireDateSoonProductList','InventoryReportController@expireDateSoonProductList');
// Inventory Shortage Route
Route::get('/brandWithProductShortage','InventoryShortageController@brandWithProductShortage');
Route::get('/supplierWithProductShortage','InventoryShortageController@supplierWithProductShortage');



/////////////////        HR  Management Route         //////////////////
// HR Management Route
Route::resource('/salaryStartSetup','SalaryStartSetupController');
Route::get('/salaryGradeName/{employeEntryId}','SalaryStartSetupController@salaryGradeName');
Route::get('/salaryPaymentStatus/{salarySetupId}','SalaryStartSetupController@salaryPaymentStatus');
Route::resource('/jobDepartmentEntry','JobDepartmentEntryController');
Route::resource('/holidaySetup','HolidaySetupController');
Route::resource('/salaryGradeEntry','SalaryGradeEntryController');
Route::resource('/salaryGradeSetup','SalaryGradeSetupController');
Route::get('/employeeName','SalaryGradeSetupController@employeeName');
Route::get('/salaryGradeList','SalaryGradeSetupController@salaryGradeList');
Route::get('/salaryGradeAmount/{gradeEntryId}','SalaryGradeSetupController@salaryGradeAmount');
Route::resource('/employeeLeaveEntry','EmployeeLeaveEntryController');
Route::resource('/employeeAttendance','EmployeeAttendanceController');
Route::get('/clickForAttendanceLeave','EmployeeAttendanceController@clickForAttendanceLeave');
Route::get('/clickForAttendanceAbsent','EmployeeAttendanceController@clickForAttendanceAbsent');


// HR Report Route
Route::get('/employeeReport','HrReportController@employeeReport');
Route::get('/employeeReportView/{employeeId}','HrReportController@employeeReportView');
Route::get('/salarySheetReport','HrReportController@salarySheetReport');
Route::post('/serchEmployeeSalary','HrReportController@serchEmployeeSalary');
Route::get('/salarySheetStatement/{employeEntryId}','HrReportController@salarySheetStatement');
Route::get('/salaryGradeReport','HrReportController@salaryGradeReport');
Route::get('/salaryGradeSetupReport','HrReportController@salaryGradeSetupReport');
Route::get('/jobDepartmentReport','HrReportController@jobDepartmentReport');
Route::get('/holidaySetupReport','HrReportController@holidaySetupReport');
Route::get('/employeeSuspendUnsuspend/{shopEmployeeEntryId}','HrReportController@employeeStatus');
Route::get('/employeeAttendanceReport','HrReportController@employeeAttendanceReport');
Route::get('/leaveReport','HrReportController@leaveReport');



/////////////////        Shop User Route         //////////////////
// ShopUser Menu Permission
Route::resource('/shopEmployeeType','ShopEmployeeTypeController');
Route::resource('/shopEmployeeEntry','ShopEmployeeEntryController');
Route::get('/employeeNameList','ShopEmployeeEntryController@employeeNameList');
Route::get('/bankTypeLists','ShopEmployeeEntryController@bankTypeList');
Route::get('/bankNameLists/{bankTypeId}','ShopEmployeeEntryController@bankNameList');
Route::get('/educationInformation','ShopEmployeeEntryController@educationInformation');
Route::post('/educationEntry','ShopEmployeeEntryController@educationEntry');
Route::post('/professionalEntry','ShopEmployeeEntryController@professionalEntry');
Route::post('/skillEntry','ShopEmployeeEntryController@skillEntry');
Route::post('/bankingEntry','ShopEmployeeEntryController@bankingEntry');

Route::resource('/shopMenuPermission','ShopMenuPermissionController');
Route::get('/shopEmployeeEntryLists','ShopMenuPermissionController@shopEmployeeEntryLists');
Route::get('/shopEmployeeTypeName/{shopEmployeeEntryId}','ShopMenuPermissionController@shopEmployeeTypeName');
Route::get('/shopMenuTittleShow','ShopMenuPermissionController@shopMenuTittleShow');
Route::get('/shopMenuShow','ShopMenuPermissionController@shopMenuShow');
Route::get('/shopSubMenuShow','ShopMenuPermissionController@shopSubMenuShow');
Route::get('/shopPermissionMenuShows/{employeeEntryId}/{employeeTypeId}','ShopMenuPermissionController@shopPermissionMenuShows');
Route::get('/shopPermissionSubMenuShows/{employeeEntryId}/{employeeTypeId}','ShopMenuPermissionController@shopPermissionSubMenuShows');
Route::get('/shopMenuPermissionChange/{employeeEntryId}/{employeeTypeId}/{menuId}','ShopMenuPermissionController@shopMenuPermissionChange');
Route::get('/shopSubMenuStatusDeactive/{employeeEntryId}/{employeeTypeId}/{subMenuId}','ShopMenuPermissionController@shopSubMenuStatusDeactive');
Route::get('/shopSubMenuStatusActiveFullAccess/{employeeEntryId}/{employeeTypeId}/{subMenuId}','ShopMenuPermissionController@shopSubMenuStatusActiveFullAccess');
Route::get('/shopSubMenuStatusActiveViewAccess/{employeeEntryId}/{employeeTypeId}/{subMenuId}','ShopMenuPermissionController@shopSubMenuStatusActiveViewAccess');
Route::get('/shopSubMenuStatusActiveAddAccess/{employeeEntryId}/{employeeTypeId}/{subMenuId}','ShopMenuPermissionController@shopSubMenuStatusActiveAddAccess');
Route::get('/shopSubMenuStatusActiveEditAccess/{employeeEntryId}/{employeeTypeId}/{subMenuId}','ShopMenuPermissionController@shopSubMenuStatusActiveEditAccess');
Route::resource('/shopproductBrandEntry','ShopProductBrandController');
Route::get('/adminProductBrandPosition/{shopTypeId}','ShopProductBrandController@adminProductBrandPosition');
Route::get('/shopProductBrandPosition','ShopProductBrandController@shopProductBrandPosition');
Route::get('/shopProductBrandReport','ShopProductBrandController@productBrandReport');
Route::get('/shopProductBrandReportList/{uniqueId}','ShopProductBrandController@shopProductBrandReportList');
Route::get('/ownSubCategoryReportList/{ownGlobal}','ShopProductBrandController@ownSubCategoryReportList');
Route::get('/shopcategoryReportList/{uniqueId}','ShopProductBrandController@shopcategoryReportList');
Route::get('/shopProductBrandReportListForAdmin/{uniqueId}','ShopProductBrandController@shopProductBrandReportListForAdmin');
Route::resource('/shopAssetBrandEntry','ShopAssetBrandController');
Route::get('/shopAssetBrandReport','ShopAssetBrandController@shopAssetBrandReport');

////////////////////////////// Shop Admin Setting ////////////////////////////////////


Route::resource('/addAssetSupplier','ShopAddAssetSupplierController');
Route::get('/assetSupplierList','ShopAddAssetSupplierController@assetSupplierList');

Route::resource('/shopAssetCategory','ShopAssetCategoryController');
Route::get('/assetCateorySelectList','ShopAssetCategoryController@assetCateorySelectList');
Route::get('/assetCategoryId/{assetCategoryId}','ShopAssetCategoryController@assetCategoryId');
Route::get('/assetSubCategoryId/{assetSubCategoryId}','ShopAssetCategoryController@assetSubCategoryId');
Route::get('/assetThirdCategoryId/{assetThirdCategoryId}','ShopAssetCategoryController@assetThirdCategoryId');
Route::get('/assetFourCategoryId/{assetFourCategoryId}','ShopAssetCategoryController@assetFourCategoryId');
Route::get('/assetFiveCategoryId/{assetFiveCategoryId}','ShopAssetCategoryController@assetFiveCategoryId');
Route::get('/assetSixCategoryId/{assetSixCategoryId}','ShopAssetCategoryController@assetSixCategoryId');
Route::get('/assetSevenCategoryId/{assetSevenCategoryId}','ShopAssetCategoryController@assetSevenCategoryId');

Route::resource('/shopAssetEntry','ShopAssetEntryController');
Route::get('/assetEntryEdit/allCategoryShow','ShopAssetEntryController@allCategoryShow');
Route::resource('/assetCodeEntry','AssetCodeEntryController');
Route::resource('/assetStatus','AssetStatusController');






Route::resource('/addBank','ShopAddBankController');
Route::get('/bankTypeEntryList','ShopAddBankController@bankTypeEntryList');
Route::get('/bankNameList/{bankTypeId}','ShopAddBankController@bankNameList');


// Product Setup
Route::resource('/shopLoanProviderEntry','ShopLoanProviderEntryController');
Route::resource('/shopLoanEntry','ShopLoanEntryController');
Route::resource('/shopIncomeTypeEntry','ShopIncomeTypeEntryController');
Route::get('/shopIncomeTypeReport','ShopIncomeTypeEntryController@shopIncomeTypeReport');
Route::resource('/shopExpenceTypeEntry','ShopExpenceTypeEntryController');
Route::get('/shopExpenceTypeReport','ShopExpenceTypeEntryController@shopExpenceTypeReport');
Route::resource('/ShopEmployeeLoginTimeEntry','ShopEmployeeLoginTimeEntryController');
// Product Price Setup
Route::resource('/productPriceSetup','ProductPriceSetupController');
Route::get('/productCategoryLists','ProductPriceSetupController@productCategoryLists');
Route::get('/productCategoryIdCatch/{categoryId}','ProductPriceSetupController@productCategoryIdCatch');
Route::get('/productNameIdCatch/{productNameId}','ProductPriceSetupController@productNameIdCatch');

// Shop Report
Route::get('/shopTypeNameList','ShopReportController@shoptype');
Route::get('/categoryNameList','ShopReportController@categorydata');
Route::get('/categoryOwnerShow/{categoryLabel}','ShopReportController@categoryOwnerShow');
Route::get('/categoryGlobalShow/{categoryLabel}','ShopReportController@categoryGlobalShow');
Route::get('/condition','ShopReportController@condition');
Route::get('/shopTypeTable','ShopReportController@shopTypeTable');
Route::get('/adminCategoryListShow/{shopTypeId}/{labelId}','ShopReportController@adminCategoryListShow');
Route::get('/categoryGlobalCount','ShopReportController@categoryGlobalCount');
Route::get('/shopAssetCategoryReportOwner','ShopReportController@shopAssetCategoryReportOwner');
Route::get('/shopAssetCategoryReportOwnerShow/{labelId}','ShopReportController@shopAssetCategoryReportOwnerShow');
Route::get('/shopAssetCategoryReportGlobal','ShopReportController@shopAssetCategoryReportGlobal');
Route::get('/shopAssetCategoryReportGlobalShow/{labelId}','ShopReportController@shopAssetCategoryReportGlobalShow');
Route::get('/shopAssetEntryReport','ShopReportController@shopAssetEntryReport');
Route::get('/shopAssetDamageReport','ShopReportController@shopAssetDamageReport');
Route::get('/shopAssetWarantyReport','ShopReportController@shopAssetWarantyReport');
Route::get('/shopAssetGuranteeReport','ShopReportController@shopAssetGuranteeReport');
Route::get('/shopAssetUnusedReport','ShopReportController@shopAssetUnusedReport');
Route::get('/shopAssetTheftReport','ShopReportController@shopAssetTheftReport');

// Asset Code Report
Route::get('/assetCodeReport','ShopReportController@assetCodeReport');

/////////////////     Setting Route         //////////////////
//change Password
Route::resource('/changePassword','PasswordChangeController');
//profile setting
Route::resource('/settingsProfile','SettingsController');
Route::resource('companyInfo','CompanyInformationController');


Route::get('{anypath}','HomeController@index')->where( 'path', '([A-z\d-\/_.]+)? ');

