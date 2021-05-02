<?php 



//==================================================
//======================= Branch Information
//==================================================


// form field name /

	branchName
	branchCode
	branchMobileNo
	branchRepresentativeName
	branchRepresentativeMobileNo
	branchAddress

// form field name /


// ------------------------------------------------


// form field name for js /

	branchName: "",
	branchCode: "",
	branchMobileNo: "",
	branchRepresentativeName: "",
	branchRepresentativeMobileNo: "",
	branchAddress: "",

// form field name for js /



// ------------------------------------------------


php artisan make:model ShopInformation/BranchInformation/BranchInformation -m

// model

protected $fillable = [
	'branchName',
	'branchCode',
	'branchMobileNo',
	'branchRepresentativeName',
	'branchRepresentativeMobileNo',
	'branchAddress',
	 ];

// model




// ------------------------------------------------


php artisan make:resource ShopInformation/BranchInformation/BranchInformation 

// resource


return [
	'id' => $this->id,
	'shopId' => $this->shopId,
	'branchName' => $this->branchName,
	'branchCode' => $this->branchCode,
	'branchMobileNo' => $this->branchMobileNo,
	'branchRepresentativeName' => $this->branchRepresentativeName,
	'branchRepresentativeMobileNo' => $this->branchRepresentativeMobileNo,
	'branchAddress' => $this->branchAddress,

	'status' => $this->status,
	'deleteStatus' => $this->deleteStatus,
	'createBy' => $this->createBy,
	'updateBy' => $this->updateBy,
	'deleteBy' => $this->deleteBy,
	'created_at' => $this->created_at,
	'updated_at' => $this->updated_at,
	'delete_at' => $this->delete_at,
	];

// resource



// ------------------------------------------------

  

// db table field

	$table->bigIncrements('id');
	$table->integer('shopId');
	$table->string('branchName','100');
	$table->integer('branchCode');
	$table->string('branchMobileNo','50');
	$table->string('branchRepresentativeName','100');
	$table->string('branchRepresentativeMobileNo','50');
	$table->string('branchAddress','255');
	$table->integer('paymentStatus');

	$table->boolean('status');
	$table->boolean('deleteStatus');
	$table->integer('createBy');
	$table->integer('updateBy')->nullable();
	$table->integer('deleteBy')->nullable();
	$table->timestamps();
	$table->dateTime('delete_at')->nullable();

// db table field


// -------------------------------------------

	php artisan make:controller ShopInformation/BranchInformation/BranchInformationController -r


// get controller request 

	$branchName = $request->get('branchName'); 
	$branchCode = $request->get('branchCode');
	$branchMobileNo = $request->get('branchMobileNo');
	$branchRepresentativeName = $request->get('branchRepresentativeName');
	$branchRepresentativeMobileNo = $request->get('branchRepresentativeMobileNo');
	$branchAddress = $request->get('branchAddress');

// get controller request 


// database fild for insert 
	
$BranchInformation->branchName = $branchName;
$BranchInformation->branchCode = $branchCode;
$BranchInformation->branchMobileNo = $branchMobileNo;
$BranchInformation->branchRepresentativeName = $branchRepresentativeName;
$BranchInformation->branchRepresentativeMobileNo = $branchRepresentativeMobileNo;
$BranchInformation->branchAddress = $branchAddress;

$BranchInformation->paymentStatus = 0;
$BranchInformation->status = 1;
$BranchInformation->deleteStatus = 1;
$BranchInformation->createBy = 1;

// database fild for insert 


// -------------------------------------------




//==================================================
//======================= // Branch Information
//==================================================