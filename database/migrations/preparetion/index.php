<?php




ShopInformation					

php artisan make:model ShopInformation/ShopInformation -m

// model

'shopInfoId',
'shopName',
'shopSirialId',
'shopUserName',
'password',
'pass',
'lastLoginIp',
'refferTypeId',
'refferUserId',
'shopTypeId',
'shopLicenceTypeId',
'website',
'facebook',
'youtube',
'haveBranch',
'totalBranch',
'status',
'deleteStatus'

// model




php artisan make:resource ShopInformation/ShopInformation

// resouce 

'shopInfoId' => $this->shopInfoId,
'shopName' => $this->shopName,
'shopSirialId' => $this->shopSirialId,
'shopUserName' => $this->shopUserName,
'password' => $this->password,
'pass' => $this->pass,
'lastLoginIp' => $this->lastLoginIp,
'refferTypeId' => $this->refferTypeId,
'refferUserId' => $this->refferUserId,
'shopTypeId' => $this->shopTypeId,
'shopLicenceTypeId' => $this->shopLicenceTypeId,
'website' => $this->website,
'facebook' => $this->facebook,
'youtube' => $this->youtube,
'haveBranch' => $this->haveBranch,
'totalBranch' => $this->totalBranch,

'status' => $this->status,
'deleteStatus' => $this->deleteStatus,
'createBy' => $this->createBy,
'updateBy' => $this->updateBy,
'deleteBy' => $this->deleteBy,
'created_at' => $this->created_at,
'updated_at' => $this->updated_at,
'delete_at' => $this->delete_at,

// resouce 


php artisan make:controller ShopInformation/ShopInformationController -r



$table->bigIncrements('shopInfoId');
$table->string('shopName','100');
$table->integer('shopSirialId');
$table->string('shopUserName','100');
$table->string('password','255');
$table->string('pass','255');
$table->string('lastLoginIp','255');
$table->integer('refferTypeId');
$table->integer('refferUserId');
$table->integer('shopTypeId');
$table->integer('shopLicenceTypeId');
$table->string('website')->nullable();
$table->string('facebook')->nullable();
$table->string('youtube')->nullable();
$table->integer('haveBranch');
$table->integer('totalBranch');

$table->boolean('status');
$table->boolean('deleteStatus');
$table->integer('createBy');
$table->integer('updateBy')->nullable();
$table->integer('deleteBy')->nullable();
$table->timestamps();
$table->dateTime('delete_at')->nullable();

//--------------- done



ShopOwnerInformation					

php artisan make:model ShopInformation/ShopOwnerInformation -m
// model
protected $fillable = [
                        'shopOwnerInfoId',
                        'shopId',
                        'name',
                        'mobileNo',
                        'email',
                        'address',
                        'phoneNo',
                        'status',
                        'deleteStatus',
                        'createBy',
                        'updateBy',
                        'deleteBy',
                        'created_at',
                        'updated_at',
                        'delete_at'
                      ];
// model

php artisan make:resource ShopInformation/ShopOwnerInformation
php artisan make:controller ShopInformation/ShopOwnerInformationController -r			


$table->bigIncrements('shopOwnerInfoId'); 

$table->integer('shopId');
$table->string('shopOwnerName','100');
$table->string('shopOwnerMobileNo','50');
$table->string('shopOwnerEmail','100')->nullable();
$table->string('shopOwnerAddress')->nullable();
$table->string('shopOwnerPhoneNo','50')->nullable();

$table->boolean('status');
$table->boolean('deleteStatus');
$table->integer('createBy');
$table->integer('updateBy')->nullable();
$table->integer('deleteBy')->nullable();
$table->timestamps();
$table->dateTime('delete_at')->nullable();




ShopRepresentativeInformation	

shopOwnerName
shopOwnerMobileNo
shopOwnerEmail
shopOwnerAddress
shopOwnerPhoneNo

php artisan make:model ShopInformation/ShopRepresentativeInformation -m

// model
protected $fillable = [
                        'shopRepInfoId',
                        'shopId',
                        'shopOwnerName',
                        'shopOwnerMobileNo',
                        'shopOwnerEmail',
                        'shopOwnerAddress',
                        'shopOwnerPhoneNo',
                        'status',
                        'deleteStatus',
                        'createBy',
                        'updateBy',
                        'deleteBy',
                        'created_at',
                        'updated_at',
                        'delete_at'
                      ];
// model


// resouce 
'shopRepInfoId' => $this->shopRepInfoId,
'shopId' => $this->shopId,
'shopOwnerName' => $this->shopOwnerName,
'shopOwnerMobileNo' => $this->shopOwnerMobileNo,
'shopOwnerEmail' => $this->shopOwnerEmail,
'shopOwnerAddress' => $this->shopOwnerAddress,
'shopOwnerPhoneNo' => $this->shopOwnerPhoneNo,

'status' => $this->status,
'deleteStatus' => $this->deleteStatus,
'createBy' => $this->createBy,
'updateBy' => $this->updateBy,
'deleteBy' => $this->deleteBy,
'created_at' => $this->created_at,
'updated_at' => $this->updated_at,
'delete_at' => $this->delete_at,
// resouce 
php artisan make:resource ShopInformation/ShopRepresentativeInformation
php artisan make:controller ShopInformation/ShopRepresentativeInformationController -r			


$table->bigIncrements('shopRepInfoId'); 

$table->integer('shopId');
$table->string('shopOwnerName','100');
$table->string('shopOwnerMobileNo','50');
$table->string('shopOwnerEmail','100')->nullable();
$table->string('shopOwnerAddress')->nullable();
$table->string('shopOwnerPhoneNo','50')->nullable();

$table->boolean('status');
$table->boolean('deleteStatus');
$table->integer('createBy');
$table->integer('updateBy')->nullable();
$table->integer('deleteBy')->nullable();
$table->timestamps();
$table->dateTime('delete_at')->nullable();



 ShopContactPersonInformation

CPName
CPMobileNo
CPEmail
CPAddress
CPPhoneNo

php artisan make:model ShopInformation/ShopContactPersonInformation -m

// model
protected $fillable = [
                        'shopCPInfoId',
                        'shopId',
                        'CPName',
                        'CPMobileNo',
                        'CPEmail',
                        'CPAddress',
                        'CPPhoneNo',
                        'status',
                        'deleteStatus',
                        'createBy',
                        'updateBy',
                        'deleteBy',
                        'created_at',
                        'updated_at',
                        'delete_at'
                      ];
// model


// resouce 
return [
'shopCPInfoId' => $this->shopCPInfoId,
'shopId' => $this->shopId,

'CPName' => $this->CPName,
'CPMobileNo' => $this->CPMobileNo,
'CPEmail' => $this->CPEmail,
'CPAddress' => $this->CPAddress,
'CPPhoneNo' => $this->CPPhoneNo,

'status' => $this->status,
'deleteStatus' => $this->deleteStatus,
'createBy' => $this->createBy,
'updateBy' => $this->updateBy,
'deleteBy' => $this->deleteBy,
'created_at' => $this->created_at,
'updated_at' => $this->updated_at,
'delete_at' => $this->delete_at,
];
// resouce 
php artisan make:resource ShopInformation/ShopContactPersonInformation
php artisan make:controller ShopInformation/ShopContactPersonInformationController -r			


$table->bigIncrements('shopCPInfoId'); 

$table->integer('shopId');

$table->string('CPName','100');
$table->string('CPMobileNo','50');
$table->string('CPEmail','100')->nullable();
$table->string('CPAddress')->nullable();
$table->string('CPPhoneNo','50')->nullable();

$table->boolean('status');
$table->boolean('deleteStatus');
$table->integer('createBy');
$table->integer('updateBy')->nullable();
$table->integer('deleteBy')->nullable();
$table->timestamps();
$table->dateTime('delete_at')->nullable();



    																				

php artisan make:model ShopInformation/ShopAddressLocation -m

// model
protected $fillable = [
                        'shopALId',
                        'shopId',
                        'branchId',
                        'countryId',
                        'divisionId',
                        'distrinctId',
                        'thanaId',
                        'unionId',
                        'wardId',
                        'addressLine1',
                        'addressLine2',
                        'front',
                        'back',
                        'left',
                        'right',
                        'shopSize',
                        'marketName',
                        'shopNo',
                        'areaKnownName',
                        'right',
                        'status',
                        'deleteStatus',
                        'createBy',
                      ];
// model


// resouce 
'shopALId' => $this->shopALId,
'shopId' => $this->shopId,
'branchId' => $this->branchId,
'countryId' => $this->countryId,
'divisionId' => $this->divisionId,
'distrinctId' => $this->distrinctId,
'thanaId' => $this->thanaId,
'unionId' => $this->unionId,
'wardId' => $this->wardId,
'addressLine1' => $this->addressLine1,
'addressLine2' => $this->addressLine2,
'front' => $this->front,
'back' => $this->back,
'left' => $this->left,
'right' => $this->right,
'shopSize' => $this->shopSize,
'marketName' => $this->marketName,
'shopNo' => $this->shopNo,
'areaKnownName' => $this->areaKnownName,

'status' => $this->status,
'deleteStatus' => $this->deleteStatus,
'createBy' => $this->createBy,
'updateBy' => $this->updateBy,
'deleteBy' => $this->deleteBy,
'created_at' => $this->created_at,
'updated_at' => $this->updated_at,
'delete_at' => $this->delete_at,
// resouce 
php artisan make:resource ShopInformation/ShopAddressLocation
php artisan make:controller ShopInformation/ShopAddressLocationController -r			


$table->bigIncrements('shopALId'); 

$table->integer('shopId');
$table->integer('branchId');
$table->integer('countryId');
$table->integer('divisionId');
$table->integer('distrinctId');
$table->integer('thanaId');
$table->integer('unionId')->nullable();
$table->integer('wardId')->nullable();
$table->string('addressLine1');
$table->string('addressLine2')->nullable();
$table->string('front','255')->nullable();
$table->string('back','255')->nullable();
$table->string('left','255')->nullable();
$table->string('right','255')->nullable();
$table->string('shopSize','255')->nullable();
$table->string('marketName','255')->nullable();
$table->string('shopNo','255')->nullable();
$table->string('areaKnownName','255')->nullable();

$table->boolean('status');
$table->boolean('deleteStatus');
$table->integer('createBy');
$table->integer('updateBy')->nullable();
$table->integer('deleteBy')->nullable();
$table->timestamps();
$table->dateTime('delete_at')->nullable();



 ShopBranchInformation																				

php artisan make:model ShopInformation/ShopBranchInformation -m
php artisan make:resource ShopInformation/ShopBranchInformation
php artisan make:controller ShopInformation/ShopBranchInformationController -r			


$table->bigIncrements('shopBranchInfoId'); 

$table->integer('shopId');
$table->string('name','100');
$table->string('mobileNo','50');
$table->string('email','100')->nullable();
$table->string('address')->nullable();
$table->string('phoneNo','50')->nullable();

$table->boolean('status');
$table->boolean('deleteStatus');
$table->integer('createBy');
$table->integer('updateBy')->nullable();
$table->integer('deleteBy')->nullable();
$table->timestamps();
$table->dateTime('delete_at')->nullable();





 ShopLoginInformation																									

php artisan make:model ShopInformation/ShopLoginInformation -m
php artisan make:resource ShopInformation/ShopLoginInformation
php artisan make:controller ShopInformation/ShopLoginInformationController -r


$table->bigIncrements('shopLoginInfoId'); 

$table->integer('shopId');
$table->integer('branchId');
$table->integer('shopEmployeeId');
$table->string('ipAddress','100');
$table->string('macAddress','100');
$table->dateTime('loginDateTime');
$table->string('location','255')->nullable();

$table->boolean('status');
$table->boolean('deleteStatus');
$table->integer('createBy');
$table->integer('updateBy')->nullable();
$table->integer('deleteBy')->nullable();
$table->timestamps();
$table->dateTime('delete_at')->nullable();



 ShopIpSetup																														

php artisan make:model ShopInformation/ShopIpSetup -m
php artisan make:resource ShopInformation/ShopIpSetup
php artisan make:controller ShopInformation/ShopIpSetupController -r


$table->bigIncrements('shopIpSetupId'); 

$table->integer('shopId');
$table->integer('branchId');
$table->integer('shopEmployeeId');
$table->string('ipAddress','100');
$table->string('macAddress','100');
$table->dateTime('loginDateTime');
$table->integer('approvedBy')->nullable();

$table->boolean('status');
$table->boolean('deleteStatus');
$table->integer('createBy');
$table->integer('updateBy')->nullable();
$table->integer('deleteBy')->nullable();
$table->timestamps();
$table->dateTime('delete_at')->nullable();



 ShopPasswordBackup																																			

php artisan make:model ShopInformation/ShopPasswordBackup -m
php artisan make:resource ShopInformation/ShopPasswordBackup
php artisan make:controller ShopInformation/ShopPasswordBackupController -r


$table->bigIncrements('shopBPid'); 

$table->integer('shopId');
$table->integer('branchId');
$table->string('password','100');
$table->string('pass','100');

$table->boolean('status');
$table->boolean('deleteStatus');
$table->integer('createBy');
$table->integer('updateBy')->nullable();
$table->integer('deleteBy')->nullable();
$table->timestamps();
$table->dateTime('delete_at')->nullable();



 ShopReferenceType																																								

php artisan make:model ShopInformation/ShopReferenceType -m
php artisan make:resource ShopInformation/ShopReferenceType
php artisan make:controller ShopInformation/ShopReferenceTypeController -r


$table->bigIncrements('shopRefTypeId'); 

$table->string('ShopRefTypeName','100'); 

$table->boolean('status');
$table->boolean('deleteStatus');
$table->integer('createBy');
$table->integer('updateBy')->nullable();
$table->integer('deleteBy')->nullable();
$table->timestamps();
$table->dateTime('delete_at')->nullable();



 ShopIncomeType																																													

php artisan make:model ShopInformation/ShopIncomeType -m
php artisan make:resource ShopInformation/ShopIncomeType
php artisan make:controller ShopInformation/ShopIncomeTypeController -r


$table->bigIncrements('shopRefTypeId'); 

$table->string('ShopRefTypeName','100'); 

$table->boolean('status');
$table->boolean('deleteStatus');
$table->integer('createBy');
$table->integer('updateBy')->nullable();
$table->integer('deleteBy')->nullable();
$table->timestamps();
$table->dateTime('delete_at')->nullable();