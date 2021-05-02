////////////////       Admin Menu Create



import index from'./index'
import shop from'./index-shop'

import purchaseTEdit from'./admin/adminmenucreate/purchaseTEdit'
import purchaseTypeNew from'./admin/adminmenucreate/purchaseTypeNew'
import purchaseTypeCreate from'./admin/adminmenucreate/purchaseTypeCreate'
import vendorEdit from'./admin/adminmenucreate/vendorEdit'
import vendorCreate from'./admin/adminmenucreate/VendorCreate'
import vendor from'./admin/adminmenucreate/vendor'
import website from'./admin/adminmenucreate/website'
import AdminMenuTitle from'./admin/adminmenucreate/adminmenu@title'
import AdminMenuTitleEdit from'./admin/adminmenucreate/edit/adminmenu@titleEdit'
import AdminMenuCreate from'./admin/adminmenucreate/adminmenu@create'
import AdminMenuEdit from'./admin/adminmenucreate/edit/adminmenu@edit'
import AdminSubmenuCreate from'./admin/adminmenucreate/adminsubmenu@create'
import AdminSubmenuEdit from'./admin/adminmenucreate/edit/adminsubmenu@edit'
import AdminTypeCreate from'./admin/adminmenucreate/admintype@create'
import AdminTypeEdit from'./admin/adminmenucreate/edit/admintype@edit'
import AdminEntryCreate from'./admin/adminmenucreate/adminentry@create'
import AdminEntryEdit from'./admin/adminmenucreate/edit/adminentry@edit'
import AdminSetupCreate from'./admin/adminmenucreate/adminsetup@create'
import AdminMenuPermission from'./admin/adminmenucreate/adminmenu@permission'
import AdminMenuPermissionList from'./admin/adminmenucreate/adminmenu@permissionlist'
import AdminMenuPermissionEdit from'./admin/adminmenucreate/edit/adminmenu@permission@edit'


/////////////  Admin Configuration Setup
import AdminAssetBrandEntry from './admin/adminconfigurationsetup/assetbrand@entry'
import CompanyInformation from './admin/adminconfigurationsetup/CompanyInformation'
import AdminAssetBrandEntryEdit from './admin/adminconfigurationsetup/edit/assetbrand@entryEdit'
import BankEntry from './admin/adminconfigurationsetup/bank@entry'
import BankEntryEdit from './admin/adminconfigurationsetup/edit/bank@entryEdit'
import BankTypeEntry from './admin/adminconfigurationsetup/banktype@entry'
import BankTypeEntryEdit from './admin/adminconfigurationsetup/edit/banktype@entryEdit'
import BussinessTypeCreate from './admin/adminconfigurationsetup/bussinesstype@create'
import BussinessTypeEdit from './admin/adminconfigurationsetup/edit/bussinesstype@edit'
import CommissionTypeEntry from './admin/adminconfigurationsetup/commissiontype@entry'
import CommissionTypeEntryEdit from './admin/adminconfigurationsetup/edit/commissiontype@entryEdit'
import AdminHolidayEntry from './admin/adminconfigurationsetup/holiday@type'
import AdminHolidayTypeEdit from './admin/adminconfigurationsetup/edit/holidaytype@edit'
import LicenceTypeEntry from './admin/adminconfigurationsetup/licencetype@entry'
import LicenceTypeEdit from './admin/adminconfigurationsetup/edit/licencetype@edit'
import MetakeyDescriptionEntry from './admin/adminconfigurationsetup/metakeydescription@entry'
import MetakeyDescriptionEntryEdit from './admin/adminconfigurationsetup/edit/metakeydescription@entryEdit'
import ProductBrandEntry from './admin/adminconfigurationsetup/productbrand@entry'
import ProductBrandEntryEdit from './admin/adminconfigurationsetup/edit/productbrand@entryEdit'
import ShopCustomerTypeEntry from './admin/adminconfigurationsetup/shopcustomertype@entry'
import ShopCustomerTypeEntryEdit from './admin/adminconfigurationsetup/edit/shopcustomertype@entryEdit'
import ShopTypeEntry from './admin/adminconfigurationsetup/shoptype@entry'
import ShopTypeEntryEdit from './admin/adminconfigurationsetup/edit/shoptype@entryEdit'
import UniteEntry from './admin/adminconfigurationsetup/unite@entry'
import UniteEntryEdit from './admin/adminconfigurationsetup/edit/unite@entryEdit'
import PurchasetypeEntry from './admin/adminconfigurationsetup/purchasetype@entry'
import PurchasetypeEdit from './admin/adminconfigurationsetup/edit/purchasetype@Edit'
import EducationinfoEntry from './admin/adminconfigurationsetup/educationinfo@entry'
import NameOfInstituteEdit from './admin/adminconfigurationsetup/edit/nameofinstitute@edit'
import NameOfDegreeEdit from './admin/adminconfigurationsetup/edit/nameofdegree@edit'
import GradeEdit from './admin/adminconfigurationsetup/edit/grade@edit'
import SkillGradeEdit from './admin/adminconfigurationsetup/edit/skillGrade@edit'
import ShopEmployeeYypeCreate from './admin/adminconfigurationsetup/adminemployee@typecreate'

///////////////        Admin Shop Information
import shopRegistration from'./admin/shopinformation/shopRegistration'
import shopRegistrationEdit from'./admin/shopinformation/shopRegistration@Edit'
import branchSetupEdit from'./admin/shopinformation/branchSetup@Edit'
import shopBranchUpdate from'./admin/shopinformation/shopBranch@update'
import shopBillDateUpdate from'./admin/shopinformation/shopBillDate@update'
import topUp from'./admin/shopinformation/topUp'
import shopBillPay from'./admin/shopinformation/shopBillPay'
import branchSetup from'./admin/shopinformation/branchSetup'
import invoiceSetup from'./admin/shopinformation/invoiceSetup'
import qrCodeSetup from'./admin/shopinformation/qrCodeSetup'
import qrCodeSetupEdit from'./admin/shopinformation/qrCodeSetup@Edit'
import ShopAddressLocationList from './admin/shopInformation/shopaddress@locationlist'
import ShopInformationList from './admin/shopInformation/shopinformation@list'
import adminReportShopList from './admin/shopInformation/adminReportShopList'

/////////////////////   Sales Page
// Product Sale
import ProductSale from'./admin/page/sales/product@sale'
import ProductSaleEdit from'./admin/page/sales/edit/productsale@edit'
import ProductPriceEntry from'./admin/page/sales/productprice@entry'
import ProductPriceEntryEdit from'./admin/page/sales/edit/productprice@entryEdit'
import ProductDiscountEntry from'./admin/page/sales/productpricediscount@entry'
import ProductDiscountEntryEdit from'./admin/page/sales/edit/productpricediscount@entryEdit'

// Product Report
import SalesProductPrice from'./admin/page/sales/product@report/salesproduct@price'
import SalesProductDiscountPrice from'./admin/page/sales/product@report/salesproduct@discountprice'
import DiscountWishPrice from'./admin/page/sales/product@report/discountwish@price'
import ProductShortage from'./admin/page/sales/product@report/product@shortage'
import DamageProduct from'./admin/page/sales/product@report/damage@product'
import DateExpairedProduct from'./admin/page/sales/product@report/dataexpaired@product'
import DateExpairedNotifcation from'./admin/page/sales/product@report/dataexpaired@notification'

// Sales Report
import TodayCashSales from'./admin/page/sales/sales@report/todaycash@sales'
import TodayDueSales from'./admin/page/sales/sales@report/todaydue@sales'
import TodayCashReceive from'./admin/page/sales/sales@report/todaycash@receive'
import TodayDiscount from'./admin/page/sales/sales@report/today@discount'
import TotalDue from'./admin/page/sales/sales@report/total@due'
import TotalSale from'./admin/page/sales/sales@report/total@sale'
import TotalReceive from'./admin/page/sales/sales@report/total@receive'
import TotalDiscount from'./admin/page/sales/sales@report/total@discount'
import FixedCustomerList from'./admin/page/sales/sales@report/fixedcustomer@list'
import LocalCustomerList from'./admin/page/sales/sales@report/localcustomer@list'
import CustomerListReport from'./admin/page/sales/sales@report/customerlist@report'

////////////////    Purchase Page
// Purchase Entry
import BrandEntry from'./admin/page/purchase/purchase/brand@entry'
import BrandEntryEdit from './admin/page/purchase/purchase/edit/brand@entryEdit'
import PurchaseEntry from'./admin/page/purchase/purchase/purchase@entry'
import PurchaseEntryEdit from'./admin/page/purchase/purchase/edit/purchase@entryEdit'
import ProductSupplierEntry from'./admin/page/purchase/purchase/productsupplier@entry'

// Purchase Report
import ProductInvoiceView from'./admin/page/purchase/purchase@report/purchase@entryInvoiceView'
import ProductSupplierReport from'./admin/page/purchase/purchase@report/productsupplier@report'
import SupplierInvoiceDetails from'./admin/page/purchase/purchase@report/supplierinvoice@details'
import DueSupplierList from'./admin/page/purchase/purchase@report/duesupplier@list'
import SupplierPayment from'./admin/page/purchase/purchase@report/supplier@payment'
import PurchaseReturn from'./admin/page/purchase/purchase@report/purchase@return'
import PurchaseInvoiceReport from'./admin/page/purchase/purchase@report/purchaseinvoice@report'
import PurchaseProductReport from'./admin/page/purchase/purchase@report/purchaseproduct@report'
import PurchaseProductReportDetails from'./admin/page/purchase/purchase@report/purchaseproduct@reportdetails'

////////////////   Inventory Page
// Inventory
import Category from'./admin/page/inventory/inventory/category'
import CategoryEdit from'./admin/page/inventory/inventory/edit/CategoryEdit'
import ProductName from'./admin/page/inventory/inventory/product@name'
// Inventory Report
import StockSummaryReport from'./admin/page/inventory/inventory@report/stocksummary@report'
import StockShortageReport from'./admin/page/inventory/inventory@report/stockshortage@report'
import ProductNameWithoutPrice from'./admin/page/inventory/inventory@report/productname@withoutprice'
import ProductNameWithPrice from'./admin/page/inventory/inventory@report/productname@withprice'
import ProductCategoryWithoutPrice from'./admin/page/inventory/inventory@report/productcategory@withoutprice'
import ProductCategoryWithPrice from'./admin/page/inventory/inventory@report/productcategory@withprice'
import LowQuantityProductReport from'./admin/page/inventory/inventory@report/lowquantityproduct@report'
import ExpireDateOverProductReport from'./admin/page/inventory/inventory@report/expiredateoverproduct@report'
import ExpireDateSoonProductReport from'./admin/page/inventory/inventory@report/expiredatesoonproduct@report'


// Inventory Shortage
import BrandWiseShortage from'./admin/page/inventory/inventory@shortage/brandwise@shortage'
import SupplierWiseShortage from'./admin/page/inventory/inventory@shortage/supplierwise@shortage'

//////////////// HR Management Page
// HR Management
import EmployeeEntry from'./admin/page/hrmanagement/hrmanagement/employee@entry'
import EmployeeEdit from'./admin/page/hrmanagement/hrmanagement/edit/employee@edit'
import EmployeeDetail from'./admin/page/hrmanagement/hrmanagement/employee@detail'
import SalaryStartSetup from'./admin/page/hrmanagement/hrmanagement/salarystart@setup'
import SalaryStartSetupEdit from'./admin/page/hrmanagement/hrmanagement/edit/salarystartsetup@edit'
import SalaryGradeEntry from'./admin/page/hrmanagement/hrmanagement/salarygrade@entry'
import SalaryGradeEdit from'./admin/page/hrmanagement/hrmanagement/edit/salarygrade@edit'
import HolidaySetup from'./admin/page/hrmanagement/hrmanagement/holiday@setup'
import HolidaySetupEdit from './admin/page/hrmanagement/hrmanagement/edit/holidaysetup@edit'
import LeaveEntry from'./admin/page/hrmanagement/hrmanagement/leave@entry'
import LeaveEntryEdit from'./admin/page/hrmanagement/hrmanagement/edit/leave@entryEdit'
import JobDepartmentEntry from'./admin/page/hrmanagement/hrmanagement/jobdepartment@entry'
import JobDepartmentEntryEdit from './admin/page/hrmanagement/hrmanagement/edit/jobdepartment@entryEdit'
import SalaryIncrementEntry from'./admin/page/hrmanagement/hrmanagement/salaryincrement@entry'
import SalaryGradeSetup from'./admin/page/hrmanagement/hrmanagement/salarygrade@setup'
import SalaryGradeSetupEdit from'./admin/page/hrmanagement/hrmanagement/edit/salarygradesetup@edit'
import EmployeeAtttendance from'./admin/page/hrmanagement/hrmanagement/employee@atttendance'

// HR Report
import EmployeeReport from'./admin/page/hrmanagement/hrreport/employee@report'
import SalarySheetReport from'./admin/page/hrmanagement/hrreport/salarysheet@report'
import SalarySheetStatement from'./admin/page/hrmanagement/hrreport/salarysheet@statement'
import JobDepartmentReport from'./admin/page/hrmanagement/hrreport/jobdepartment@report'
import SalaryGradeReport from'./admin/page/hrmanagement/hrreport/salarygrade@report'
import SalaryGradeSetupReport from'./admin/page/hrmanagement/hrreport/salarygradesetup@report'
import HolidayReport from'./admin/page/hrmanagement/hrreport/holiday@report'
import LeaveReport from'./admin/page/hrmanagement/hrreport/leave@report'
import AttendanceReport from'./admin/page/hrmanagement/hrreport/attendance@report'



//////////////// Asset Page
// Asset
import AssetEntry from'./admin/page/asset/asset/asset@entry'
import AssetEntryEdit from'./admin/page/asset/asset/edit/assetentry@Edit'
import AssetBrandEntry from'./admin/page/asset/asset/assetbrand@entry'
import AssetBrandEntryEdit from'./admin/page/asset/asset/edit/assetbrand@entryEdit'
import AssetCategoryEntry from'./admin/page/asset/asset/assetcategory@entry'
import AssetCategoryEdit from'./admin/page/asset/asset/edit/assetcategory@edit'
import AssetProductEntry from'./admin/page/asset/asset/assetproduct@entry'
import AssetProductEdit from'./admin/page/asset/asset/edit/assetproduct@edit'
import AssetSupplierEntry from'./admin/page/asset/asset/assetsupplier@entry'
import AssetSupplierEntryEdit from'./admin/page/asset/asset/edit/assetsupplier@entryEdit'
import AssetStatus from'./admin/page/asset/asset/asset@status'

// Asset Report
import AssetEntryReport from'./admin/page/asset/asset@report/assetentry@report'
import AssetBrandReport from'./admin/page/asset/asset@report/assetbrand@report'
import AssetCategoryReport from'./admin/page/asset/asset@report/assetcategory@report'
import AssetCategoryOwnerReport from'./admin/page/asset/asset@report/assetcategory@ownerreport'
import AssetCategoryGlobalReport from'./admin/page/asset/asset@report/assetcategory@globalreport'
import AssetCodeReport from'./admin/page/asset/asset@report/assetcode@report'
import AssetWarantyReport from'./admin/page/asset/asset@report/assetwaranty@report'
import AssetUnusedReport from'./admin/page/asset/asset@report/assetunused@report'
import AssetTheftReport from'./admin/page/asset/asset@report/assettheft@report'
import AssetGuranteeReport from'./admin/page/asset/asset@report/assetgurantee@report'
import AssetDamageReport from'./admin/page/asset/asset@report/assetdamage@report'



////////////////     Admin Page
// Admin Setup
import AccountingOnlyCompany from'./admin/adminpage/adminsetup/accountingonly@company'
import CreateBusinessType from'./admin/adminpage/adminsetup/createbusiness@type'
import CreateClient from'./admin/adminpage/adminsetup/create@client'
import CreateStaff from'./admin/adminpage/adminsetup/create@staff'
import CreateMenu from'./admin/adminpage/adminsetup/create@menu'
import CreateMarketingType from'./admin/adminpage/adminsetup/createmarketing@type'
import CreateCommission from'./admin/adminpage/adminsetup/create@commission'
import CreateAdmin from'./admin/adminpage/adminsetup/create@admin'
import CreateAgent from'./admin/adminpage/adminsetup/create@agent'
import CreateLianaType from'./admin/adminpage/adminsetup/createliana@type'
import ProcessShop from'./admin/adminpage/adminsetup/process@shop'
import SalesTargetCreate from'./admin/adminpage/adminsetup/salestarget@create'
import CreateclientIp from'./admin/adminpage/adminsetup/createclient@ip'
import Purchase from'./admin/adminpage/adminsetup/purchase'
import IpNotice from'./admin/adminpage/adminsetup/ip@notice'
import Sales from'./admin/adminpage/adminsetup/sales'
import DeliverySection from'./admin/adminpage/adminsetup/delivery@section'
import Inventory from'./admin/adminpage/adminsetup/inventory'
import ClientFollowp from'./admin/adminpage/adminsetup/client@followp'
import Asset from'./admin/adminpage/adminsetup/asset'
import Hr from'./admin/adminpage/adminsetup/hr'
import Reporting from'./admin/adminpage/adminsetup/reporting'
import Message from'./admin/adminpage/adminsetup/message'
import Notification from'./admin/adminpage/adminsetup/notification'
// Mother Page
import Setup from'./admin/adminpage/motheradmin/setup'
import SupportAdmin from'./admin/adminpage/motheradmin/support@admin'
import BillingAddress from'./admin/adminpage/motheradmin/billing@address'
import SubAdmin from'./admin/adminpage/motheradmin/sub@admin'
import SuspendUnsuspendAdmin from'./admin/adminpage/motheradmin/suspend@unsuspend@admin'
import MarketingAdmin from'./admin/adminpage/motheradmin/marketing@admin'
import CommissionBaseMan from'./admin/adminpage/motheradmin/commissionbase@man'
import DeliveryMohter from'./admin/adminpage/motheradmin/delivery@section'
import IpqueryBlockadmin from'./admin/adminpage/motheradmin/ipquery@blockadmin'
import InformationEdit from'./admin/adminpage/motheradmin/information@edit'
import SalesTeam from'./admin/adminpage/motheradmin/sales@team'
import ShopList from'./admin/adminpage/motheradmin/shop@list'
import Report from'./admin/adminpage/motheradmin/report'
import MenuPermission from'./admin/adminpage/motheradmin/menu@permission'
// Support Admin
import ProblemEntry from'./admin/adminpage/supportadmin/problem@entry'
import ClientUpdata from'./admin/adminpage/supportadmin/client@update'
import TodaySupportCalendar from'./admin/adminpage/supportadmin/todaysupport@calendar'
import Feedback from'./admin/adminpage/supportadmin/feedback'
import SupportMessage from'./admin/adminpage/supportadmin/support@message'
// Billing Admin
import BillingReportDaily from'./admin/adminpage/billingadmin/billingreport@daily'
import DueBill from'./admin/adminpage/billingadmin/due@bill'
import DueBillFeedback from'./admin/adminpage/billingadmin/duebill@feedback'
import BillingMessage from'./admin/adminpage/billingadmin/billing@message'
import OverDueBill from'./admin/adminpage/billingadmin/overdue@bill'
// Sub Admin
import SubadminMenuPermission from'./admin/adminpage/subadmin/subadmin@menu@permission'
import SubadminMenuNotification from'./admin/adminpage/subadmin/subadmin@menu@notification'
import SubadminMessage from'./admin/adminpage/subadmin/subadmin@message'
import SubadminReport from'./admin/adminpage/subadmin/subadmin@report'
// Suspend And Unsuspend
import BillingadminReport from'./admin/adminpage/suspend@unsuspend/billingadmin@report'
import SuspendList from'./admin/adminpage/suspend@unsuspend/suspend@list'
import UnsuspendList from'./admin/adminpage/suspend@unsuspend/unsuspend@list'
import SuspendUnsuspendMessage from'./admin/adminpage/suspend@unsuspend/suspend@unsuspend@message'
// Marketing Admin
import MarketingSalermanList from'./admin/adminpage/marketingadmin/marketing@salermanlist'
import MarketingSalerTarget from'./admin/adminpage/marketingadmin/marketing@salertarget'
import MarketingAchieve from'./admin/adminpage/marketingadmin/marketing@achieve'
import MarketingInactiveList from'./admin/adminpage/marketingadmin/marketing@inactivelist'
import MarketingPoposedClient from'./admin/adminpage/marketingadmin/marketing@poposedclient'
import MarketingPoposedFollowp from'./admin/adminpage/marketingadmin/marketing@poposedfollowp'
import MarketingMessage from'./admin/adminpage/marketingadmin/marketing@message'
import MarketingShopEntry from'./admin/adminpage/marketingadmin/marketing@shopentry'
// Saler Man
import SalermanShopEntry from'./admin/adminpage/salerman/salerman@shopentry'
import SalermanProposerShop from'./admin/adminpage/salerman/salerman@proposershop'
import SalermanInctiveList from'./admin/adminpage/salerman/salerman@inactivelist'
import SalermanProfile from'./admin/adminpage/salerman/salerman@profile'
import SalermanMessage from'./admin/adminpage/salerman/salerman@message'
import SalermanTotalEarning from'./admin/adminpage/salerman/salerman@totalearning'
import SalermanMonthlyEarning from'./admin/adminpage/salerman/salerman@monthlyearning'
// Delivery Section
import UpdateShopInformation from'./admin/adminpage/deliverysection/update@shopinformation'
import DeliveryReport from'./admin/adminpage/deliverysection/delivery@report'
import DeliveryCalender from'./admin/adminpage/deliverysection/delivery@calender'
import DeliveryRequest from'./admin/adminpage/deliverysection/delivery@request'
import DeliveryMessage from'./admin/adminpage/deliverysection/delivery@message'
import DeliverySupportadmin from'./admin/adminpage/deliverysection/delivery@supportadmin'
// IP Query
import IPAdd from'./admin/adminpage/ipquery/ip@add'
import IPLock from'./admin/adminpage/ipquery/ip@lock'
import IPUnblock from'./admin/adminpage/ipquery/ip@unblock'
import IpQueryMessage from'./admin/adminpage/ipquery/ipquery@message'
// Information Edit Admin
import SupportPanding from'./admin/adminpage/informationedit/support@panding'
import ComplateEdit from'./admin/adminpage/informationedit/complate@edit'
import EditadminSearch from'./admin/adminpage/informationedit/editadmin@search'
import EditadminMessage from'./admin/adminpage/informationedit/editadmin@message'


///////////       Setting
import Help from'./admin/generalpage/help'
import Password from'./admin/generalpage/password'
import Refer from'./admin/generalpage/refer'
import Profile from'./admin/generalpage/profile'
import Offer from'./admin/generalpage/offer'
import Setting from'./admin/generalpage/setting'

/////////////////     Shop Menu Permission
import ShopEmployeeTypeCreate from'./shopuser/shopInformation/shopemployee@typecreate'
import ShopEmployeeTypeEdit from'./shopuser/shopInformation/edit/shopemployee@typeEdit'
import ShopMenuPermission from'./shopuser/shopInformation/shopmenu@permission'
import ShopMenuPermissionList from'./shopuser/shopInformation/shopmenu@permissionlist'
import ShopMenuPermissionEdit from'./shopuser/shopInformation/edit/adminmenu@permission@edit'

//////////////////  Shop Admin Setting ////////////////
// Shop Setting
import ShopAddCategory from'./shopuser/shopadminsetting/shopadd@category'
import ShopAddProductBrand from'./shopuser/shopadminsetting/shopaddproduct@brand'

import ShopAddEmployee from'./shopuser/shopadminsetting/shopadd@employee'
import ShopAddProductSupplierEntry from'./shopuser/shopadminsetting/shopaddproductsupplier@entry'
import ShopProductSupplierEntryEdit from'./shopuser/shopadminsetting/edit/shopproductsupplier@entryEdit'
import ShopProductBrandEntryEdit from'./shopuser/shopadminsetting/edit/shopproductbrand@entryEdit'
import ShopAddBank from './shopuser/shopadminsetting/shopadd@bank'
import ShopAddBankEdit from './shopuser/shopadminsetting/edit/shopadd@bankEdit'
import ShopProductCodeEntry from'./shopuser/productsetup/shopproductcode@entry'
import ShopProductPriceSetup from'./shopuser/productsetup/shopproductprice@setup'
import ShopDiscountSetup from'./shopuser/productsetup/shopdiscount@setup'
import CategoryReport1 from'./shopuser/shopreport/category@report'
import CategoryReport from'./shopuser/shopreport/categoryReport'
import ProductReport from'./shopuser/shopreport/product@report'

// Shop Product Setup
import ShopAddExpenceTypeEntry from './shopuser/productsetup/shopaddexpencetype@entry'
import ShopAddExpenceTypeEditEntry from './shopuser/productsetup/edit/shopaddexpencetype@Editentry'
import ShopLoanProviderEntry from './shopuser/productsetup/shoploanprovider@entry'
import ShopLoanProviderEditEntry from './shopuser/productsetup/edit/shoploanprovider@Editentry'
import ShopLoanEntry from './shopuser/productsetup/shoploan@entry'
import ShopLoanEditEntry from './shopuser/productsetup/edit/shoploan@Editentry'
import ShopIncomeTypeEntry from './shopuser/productsetup/shopaddincometype@entry'
import ShopIncomeTypeEntryEdit from './shopuser/productsetup/edit/shopaddincometype@entryEdit'
import ShopEmployeeeLoginTimeSetup from  './shopuser/productsetup/shopemployeelogintime@setup'
import ShopEmployeeeLoginTimeSetupEdit from './shopuser/productsetup/edit/shopemployeelogintime@setupEdit'

//////   Shop Report
import AdminCategoryList from  './shopuser/shopreport/admincategory@list'
import CategoryOwnerList from  './shopuser/shopreport/category@ownerlist'
import CategoryGlobalList from  './shopuser/shopreport/category@globallist'
import ShopProductSupplierList from'./shopuser/shopreport/productsupplier@list'
import ShopAssetSupplierReport from'./shopuser/shopreport/assetsupplier@report'
import IncomeTypeReport from'./shopuser/shopreport/incometype@report'
import ExpenceTypeReport from'./shopuser/shopreport/expencetype@report'
import ProductBrandReport from'./shopuser/shopreport/productbrand@report'
import ProductBrandReportList from'./shopuser/shopreport/productbrand@reportList'

//////   Accounting
import voucherEntry from  './admin/page/accounting/entry/voucherEntryNew'
import chartOfAccounts from  './admin/page/accounting/entry/chartOfAccounts'
import chartOfAccountEdit from  './admin/page/accounting/edit/chartOfAccountEdit'
import accountSetup from  './admin/page/accounting/entry/accountSetup'
import accountSetupEdit from  './admin/page/accounting/edit/accountSetupEdit'
import viewVoucher from  './admin/page/accounting/view/viewVoucher'


export const routes = [
    //////////////////   Start Admin Configuration Menu Route
 
    {
        path: '/viewVoucher:id',
        component:viewVoucher,
    },  
    {
        path: '/voucherEntry',
        component:voucherEntry,
    },  
    {
        path: '/accountSetupEdit:id',
        component:accountSetupEdit,
    },  
    {
        path: '/accountSetup',
        component:accountSetup,
    },  

    {
        path: '/chartOfAccountEdit:id',
        component:chartOfAccountEdit,
    }, 
    {
        path: '/chartOfAccounts',
        component:chartOfAccounts,
    }, 
    {
        path: '/ProductInvoiceView:id',
        component:ProductInvoiceView,
    },
    {
        path: '/shop',
        component:shop,
    },
    {
        path: '/index',
        component:index,
    },
    {
        path: '/home',
        component:index,
    },
    {
        path: '/shopRegistration',
        component:shopRegistration,
    },
    {
        path: '/shopBranchUpdate',
        component:shopBranchUpdate,
    },
    {
        path: '/branchSetup',
        component:branchSetup,
    },
    {
        path: '/topUp',
        component:topUp,
    },
    {
        path: '/shopBillPay',
        component:shopBillPay,
    },
    {
        path: '/branchSetup@Edit:id',
        component:branchSetupEdit,
    },
    {
        path: '/shopRegistration@Edit:id',
        component:shopRegistrationEdit,
    },
    {
        path: '/invoiceSetup',
        component:invoiceSetup,
    },
    {
        path: '/qrCodeSetup',
        component:qrCodeSetup,
    },
    {
        path: '/shopBranch@update:id',
        component:shopBranchUpdate,
    },
    {
        path: '/shopBillDate@update:id',
        component:shopBillDateUpdate,
    },
    {
        path: '/qrCodeSetup@Edit:id',
        component:qrCodeSetupEdit,
    },
    {
        path: '/basicInfo',
        component:AdminMenuTitle,
    },
    {
        path: '/adminmenu@title',
        component:AdminMenuTitle,
    },
    {
        path: '/purchaseTypeCreate',
        component:purchaseTypeCreate,
    },
    {
        path: '/purchaseTypeNew',
        component:purchaseTypeNew,
    },
    {
        path: '/purchasetype@Edit:id',
        component:purchaseTEdit,
    },
 
    {
        path: '/vendor',
        component:vendor,
    },
    {
        path:'/vendorCreate',
        component:vendorCreate,
    },
    {
        path:'/vendorEdit:id',
        component:vendorEdit,
    },
    {
        path: '/website',
        component:website,
    },


    {
        path: '/adminmenu@titleEdit:adminMenuTitleId',
        component:AdminMenuTitleEdit,
    },

    {
        path: '/adminmenu@create',
        component:AdminMenuCreate,
    },
    {
        path: '/adminmenu@Edit:adminMenuId',
        component:AdminMenuEdit,
    },

    {
        path: '/adminsubmenu@create',
        component:AdminSubmenuCreate,
    },
    {
        path: '/adminsubmenu@Edit:adminSubMenuId',
        component:AdminSubmenuEdit,
    },
    {
        path: '/companyInformation',
        component:CompanyInformation,
    },
    {
        path: '/admintype@create',
        component:AdminTypeCreate,
    },

    {
        path: '/admintype@Edit:adminTypeId',
        component:AdminTypeEdit,
    },

    {
        path: '/adminentry@create',
        component:AdminEntryCreate,
    },
    {
        path: '/adminentry@Edit:adminId',
        component:AdminEntryEdit,
    },
    {
        path: '/adminsetup@create',
        component:AdminSetupCreate,
    },
    {
        path: '/adminmenu@permission',
        component:AdminMenuPermission,
    },
    {
        path: '/adminmenu@permissionlist',
        component:AdminMenuPermissionList,
    },
    {
        path: '/adminmenu@permission@edit:adminId:menuId',
        component:AdminMenuPermissionEdit,
    },

    /////////////////////   End Admin Configuration Menu Route

    /////////////////////    Start Admin Configuration Setup Route
    {
        path: '/adminassetbrand@entry',
        component: AdminAssetBrandEntry,
    },
    {
        path: '/adminAssetBrand@entryEdit:assetBrandEntryId',
        component: AdminAssetBrandEntryEdit,
    },
    {
        path: '/bank@entry',
        component: BankEntry,
    },
    {
        path: '/bank@entryEdit:bankEntryId',
        component: BankEntryEdit,
    },
    {
        path: '/banktype@entry',
        component: BankTypeEntry,
    },
    {
        path: '/banktype@entryEdit:bankTypeEntryId',
        component: BankTypeEntryEdit,
    },
    {
        path: '/bussinesstype@create',
        component: BussinessTypeCreate,
    },
    {
        path: '/bussinesstype@edit:bussinessTypeId',
        component: BussinessTypeEdit,
    },

    {
        path: '/commissiontype@entry',
        component: CommissionTypeEntry,
    },

    {
        path: '/commissiontype@entryEdit:commissionTypeEntryId',
        component: CommissionTypeEntryEdit,
    },

    {
        path: '/adminholiday@entry',
        component: AdminHolidayEntry,
    },
    {
        path: '/adminholidaytype@edit:holidayTypeId',
        component: AdminHolidayTypeEdit,
    },

    {
        path: '/licencetype@entry',
        component: LicenceTypeEntry,
    },
    {
        path: '/licencetype@edit:licenceTypesId',
        component: LicenceTypeEdit,
    },
    {
        path: '/metakeydescription@entry',
        component: MetakeyDescriptionEntry,
    },
    {
        path: '/metakeydescription@entryEdit:metaKeyId',
        component: MetakeyDescriptionEntryEdit,
    },
    {
        path: '/productbrand@entry',
        component: ProductBrandEntry,
    },
    {
        path: '/productbrand@entryEdit:productBrandEntryId',
        component: ProductBrandEntryEdit,
    },
    {
        path: '/shopcustomertype@entry',
        component: ShopCustomerTypeEntry,
    },
    {
        path: '/shopCustomerType@entryEdit:shopCustomerTypeEntryId',
        component: ShopCustomerTypeEntryEdit,
    },
    {
        path: '/shoptype@entry',
        component: ShopTypeEntry,
    },
    {
        path: '/shopType@entryEdit:shopTypeEntryId',
        component: ShopTypeEntryEdit,
    },
    {
        path: '/unite@entry',
        component: UniteEntry,
    },
    {
        path: '/unite@entryEdit:uniteEntryId',
        component: UniteEntryEdit,
    },
    {
        path: '/purchasetype@entry',
        component: PurchasetypeEntry,
    },
    {
        path: '/purchasetype@edit:purchaseTypeId',
        component: PurchasetypeEdit,
    },
    {
        path: '/educationinfo@entry',
        component: EducationinfoEntry,
    },
    {
        path: '/nameofinstitute@edit:nameOfInstituteId',
        component: NameOfInstituteEdit,
    },
    {
        path: '/nameofdegree@edit:nameOfDegreeId',
        component: NameOfDegreeEdit,
    },
    {
        path: '/grade@edit:gradeId',
        component: GradeEdit,
    },
    {
        path: '/skillGrade@edit:skillGradeId',
        component: SkillGradeEdit,
    },
    {
        path: '/adminemployee@typecreate',
        component: ShopEmployeeYypeCreate,
    },

////////////////     Sales  Route
    // Product Sales
    {
        path: '/product@sales',
        component: ProductSale,
    },
    {
        path: '/productsale@edit:salesInvoiceId',
        component: ProductSaleEdit,
    },
    {
        path: '/productprice@entry',
        component: ProductPriceEntry,
    },
    {
        path: '/productprice@entryEdit:salesProductPriceEntryId',
        component: ProductPriceEntryEdit,
    },
    {
      path: '/productdiscount@entry',
      component: ProductDiscountEntry,
    },
    {
      path: '/productdiscountprice@entryEdit:salesProductDiscountPriceId',
      component: ProductDiscountEntryEdit,
    },
    // Product Report
    {
        path: '/salesproduct@price',
        component: SalesProductPrice,
    },
    {
        path: '/salesproduct@discountprice',
        component: SalesProductDiscountPrice,
    },
    {
        path: '/discountwish@price',
        component: DiscountWishPrice,
    },
    {
        path: '/product@shortage',
        component: ProductShortage,
    },
    {
        path: '/damage@product',
        component: DamageProduct,
    },
    {
        path: '/dataexpaired@product',
        component: DateExpairedProduct,
    },
    {
        path: '/dataexpaired@notification',
        component: DateExpairedNotifcation,
    },
    // Sales Report
    {
        path: '/todaycash@sales',
        component: TodayCashSales,
    },
    {
        path: '/todaydue@sales',
        component: TodayDueSales,
    },
    {
        path: '/todaycash@receive',
        component: TodayCashReceive,
    },
    {
        path: '/today@discount',
        component: TodayDiscount,
    },
    {
        path: '/total@due',
        component: TotalDue,
    },
    {
        path: '/total@sales',
        component: TotalSale,
    },
    {
        path: '/total@receive',
        component: TotalReceive,
    },
    {
        path: '/total@discount',
        component: TotalDiscount,
    },
    {
        path: '/fixedcustomer@list',
        component: FixedCustomerList,
    },
    {
        path: '/localcustomer@list',
        component: LocalCustomerList,
    },
    {
        path: '/customerlist@report',
        component: CustomerListReport,
    },


////////////////     Purchase Route
    //  Purchase Entry
    {
        path: '/brand@entry',
        component: BrandEntry,
    },
    {
        path: '/brand@entryEdit:brandId',
        component: BrandEntryEdit,
    },
    {
        path: '/purchase@entry',
        component: PurchaseEntry,
    },
    {
        path: '/purchase@entryEdit:purchaseInvoiceId',
        component: PurchaseEntryEdit,
    },
    {
        path: '/productsupplier@entry',
        component: ProductSupplierEntry,
    },
    //  Purchase Report
    {
        path: '/productsupplier@report',
        component: ProductSupplierReport,
    },
    {
        path: '/supplierinvoice@details:productSupplierId',
        component: SupplierInvoiceDetails,
    },
    {
        path: '/duesupplier@list',
        component: DueSupplierList,
    },
    {
        path: '/supplier@payment',
        component: SupplierPayment,
    },
    {
        path: '/purchase@return',
        component: PurchaseReturn,
    },

    {
        path: '/purchaseinvoice@report',
        component: PurchaseInvoiceReport,
    },
    {
        path: '/purchaseproduct@report',
        component: PurchaseProductReport,
    },
    {
        path: '/purchaseproduct@reportList:purchaseProductId',
        component: PurchaseProductReportDetails,
    },

////////////////     Inventory Route
    // Inventory
    {
        path:'/add@category',
        component: Category,
    },

    {
        path:'/category@Edit:categoryId',
        component: CategoryEdit,
    },

    {
        path:'/productname@entry',
        component: ProductName,
    },
    // Inventory Report
    {
        path: '/stocksummary@report',
        component: StockSummaryReport,
    },
    {
        path: '/stockshortage@report',
        component: StockShortageReport,
    },
    {
        path: '/productname@withoutprice',
        component: ProductNameWithoutPrice,
    },
    {
        path: '/productname@withprice',
        component: ProductNameWithPrice,
    },
    {
        path: '/productcategory@withoutprice',
        component: ProductCategoryWithoutPrice,
    },
    {
        path: '/productcategory@withprice',
        component: ProductCategoryWithPrice,
    },
    {
        path: '/lowquantityproduct@report',
        component: LowQuantityProductReport,
    },
    {
        path: '/expiredateoverproduct@report',
        component: ExpireDateOverProductReport,
    },
    {
        path: '/expiredatesoonproduct@report',
        component: ExpireDateSoonProductReport,
    },
    // Inventory Shortage
    {
        path: '/brandwise@shortage',
        component: BrandWiseShortage,
    },
    {
        path: '/supplierwise@shortage',
        component: SupplierWiseShortage,
    },

////////////////    HR Management Route
    // HR Management
    {
        path: '/employee@entry',
        component: EmployeeEntry,
    },
    {
        path: '/employee@edit:employeeId',
        component: EmployeeEdit,
    },
    {
        path: '/employee@details:employeeId',
        component: EmployeeDetail,
    },
    {
        path: '/salarystart@setup',
        component: SalaryStartSetup,
    },
    {
        path: '/salarystartsetup@edit:salarySetupId',
        component: SalaryStartSetupEdit,
    },
    {
        path: '/salarygrade@entry',
        component: SalaryGradeEntry,
    },
    {
        path: '/salarygrade@edit:gradeEntryId',
        component: SalaryGradeEdit,
    },
    {
        path: '/holiday@setup',
        component: HolidaySetup,
    },

    {
        path: '/holiday@setupedit:holidaySetupId',
        component: HolidaySetupEdit,
    },

    {
        path: '/leave@entry',
        component: LeaveEntry,
    },
    {
        path: '/leave@entryEdit:leaveEntryId',
        component: LeaveEntryEdit,
    },
    {
        path: '/jobdepartment@entry',
        component: JobDepartmentEntry,
    },
    {
        path: '/jobdepartment@entryEdit:jobDepartmentEntryId',
        component: JobDepartmentEntryEdit,
    },
    {
        path: '/salaryincrement@entry',
        component: SalaryIncrementEntry,
    },
    {
        path: '/salarygrade@setup',
        component: SalaryGradeSetup,
    },
    {
        path: '/salarygradesetup@edit:salaryGradeSetupId',
        component: SalaryGradeSetupEdit,
    },
    {
        path: '/employee@atttendance',
        component: EmployeeAtttendance,
    },
  // HR Report
    {
        path: '/employee@report',
        component: EmployeeReport,
    },
    {
        path: '/salarysheet@report',
        component: SalarySheetReport,
    },
    {
        path: '/salarysheet@statement:employeEntryId',
        component: SalarySheetStatement,
    },
    {
        path: '/jobdepartment@report',
        component: JobDepartmentReport,
    },
    {
        path: '/salarygrade@report',
        component: SalaryGradeReport,
    },
    {
        path: '/salarygrade@setupreport',
        component: SalaryGradeSetupReport,
    },
    {
        path: '/holiday@report',
        component: HolidayReport,
    },
    {
        path: '/leave@report',
        component: LeaveReport,
    },
    {
        path: '/attendance@report',
        component: AttendanceReport,
    },

////////////////    Asset Route
    // Asset entry
    {
        path: '/asset@entry',
        component: AssetEntry,
    },
    {
        path: '/assetentry@Edit:shopAssetEntryId',
        component: AssetEntryEdit,
    },
    {
        path: '/assetbrand@entry',
        component: AssetBrandEntry,
    },
    {
        path: '/assetBrand@entryEdit:assetBrandEntryId',
        component: AssetBrandEntryEdit,
    },

    {
        path: '/assetcategory@entry',
        component: AssetCategoryEntry,
    },
    {
        path: '/assetcategory@Edit:assetCategoryId',
        component: AssetCategoryEdit,
    },
    {
        path: '/assetproduct@entry',
        component: AssetProductEntry,
    },
    {
        path: '/assetproduct@edit:assetCodeEntryId',
        component: AssetProductEdit,
    },
    {
        path: '/assetsupplier@entry',
        component: AssetSupplierEntry,
    },
    {
      path: '/assetsupplier@entryEdit:assetSupplierId',
      component: AssetSupplierEntryEdit,
    },
    {
      path: '/asset@status',
      component: AssetStatus,
    },

    // Asset Report
    {
        path: '/assetentry@report',
        component: AssetEntryReport,
    },
    {
        path: '/assetbrand@report',
        component: AssetBrandReport,
    },
    {
        path: '/assetcategory@report',
        component: AssetCategoryReport,
    },
    {
        path: '/assetcategory@ownerreport:assetCategorylabelId',
        component: AssetCategoryOwnerReport,
    },
    {
        path: '/assetcategory@globalreport:assetCategorylabelId',
        component: AssetCategoryGlobalReport,
    },
    {
       path: '/assetcode@report',
       component: AssetCodeReport,
    },
    {
       path: '/assetwaranty@report',
       component: AssetWarantyReport,
    },
    {
       path: '/assetunused@report',
       component: AssetUnusedReport,
    },
    {
       path: '/assettheft@report',
       component: AssetTheftReport,
    },
    {
       path: '/assetgurantee@report',
       component: AssetGuranteeReport,
    },
    {
       path: '/assetdamage@report',
       component: AssetDamageReport,
    },

    ////////////////////////    Admin Route
    // Admin Setup
    {
        path: '/accountingonly@company',
        component: AccountingOnlyCompany,
    },
    {
        path: '/createbusiness@type',
        component: CreateBusinessType,
    },
    {
        path: '/create@client',
        component: CreateClient,
    },
    {
        path: '/create@staff',
        component: CreateStaff,
    },
    {
        path: '/create@menu',
        component: CreateMenu,
    },
    {
        path: '/createmarketing@type',
        component: CreateMarketingType,
    },
    {
        path: '/create@commission',
        component: CreateCommission,
    },
    {
        path: '/create@admin',
        component: CreateAdmin,
    },
    {
        path: '/create@agent',
        component: CreateAgent,
    },
    {
        path: '/createliana@type',
        component: CreateLianaType,
    },
    {
        path: '/process@shop',
        component: ProcessShop,
    },
    {
        path: '/salestarget@create',
        component: SalesTargetCreate,
    },
    {
        path: '/createclient@ip',
        component: CreateclientIp,
    },
    {
        path: '/purchase',
        component: Purchase,
    },
    {
        path: '/ip@notice',
        component: IpNotice,
    },
    {
        path: '/sales',
        component: Sales,
    },
    {
        path: '/delivery@section',
        component: DeliverySection,
    },
    {
        path: '/inventory',
        component: Inventory,
    },
    {
        path: '/client@followp',
        component: ClientFollowp,
    },
    {
        path: '/asset',
        component: Asset,
    },
    {
        path: '/hr',
        component: Hr,
    },
    {
        path: '/reporting',
        component: Reporting,
    },
    {
        path: '/message',
        component: Message,
    },
    {
        path: '/notification',
        component: Notification,
    },
    // Mother Admin
    {
        path: '/setup',
        component: Setup,
    },
    {
        path: '/support@admin',
        component: SupportAdmin,
    },
    {
        path: '/billing@address',
        component: BillingAddress,
    },
    {
        path: '/sub@admin',
        component: SubAdmin,
    },
    {
        path: '/suspend@unsuspend@admin',
        component: SuspendUnsuspendAdmin,
    },
    {
        path: '/marketing@admin',
        component: MarketingAdmin,
    },
    {
        path: '/commissionbase@man',
        component: CommissionBaseMan,
    },
    {
        path: '/delivery@section@',
        component: DeliveryMohter,
    },
    {
        path: '/ipquery@blockadmin',
        component: IpqueryBlockadmin,
    },
    {
        path: '/information@edit',
        component: InformationEdit,
    },
    {
        path: '/sales@team',
        component: SalesTeam,
    },
    {
        path: '/shop@list',
        component: ShopList,
    },
    {
        path: '/report',
        component: Report,
    },
    {
        path: '/menu@permission',
        component: MenuPermission,
    },
    // Support Admin
    {
        path: '/problem@entry',
        component: ProblemEntry,
    },
    {
        path: '/client@update',
        component: ClientUpdata,
    },
    {
        path: '/todaysupport@calendar',
        component: TodaySupportCalendar,
    },
    {
        path: '/feedback',
        component: Feedback,
    },
    {
        path: '/support@message',
        component: SupportMessage,
    },
    // Billing Admin
    {
        path: '/billingreport@daily',
        component: BillingReportDaily,
    },
    {
        path: '/due@bill',
        component: DueBill,
    },
    {
        path: '/duebill@feedback',
        component: DueBillFeedback,
    },
    {
        path: '/billing@message',
        component: BillingMessage,
    },
    {
        path: '/overdue@bill',
        component: OverDueBill,
    },
    // Sub Admin
    {
        path: '/subadmin@menu@permission',
        component: SubadminMenuPermission,
    },
    {
        path: '/subadmin@menu@notification',
        component: SubadminMenuNotification,
    },
    {
        path: '/subadmin@message',
        component: SubadminMessage,
    },
    {
        path: '/subadmin@report',
        component: SubadminReport,
    },
    // Suspend And Unsuspend
    {
        path: '/billingadmin@report',
        component: BillingadminReport,
    },
    {
        path: '/suspend@list',
        component: SuspendList,
    },
    {
        path: '/unsuspend@list',
        component: UnsuspendList,
    },
    {
        path: '/suspend@unsuspend@message',
        component: SuspendUnsuspendMessage,
    },
    // Marketing Admin
    {
        path: '/marketing@salermanlist',
        component: MarketingSalermanList,
    },
    {
        path: '/marketing@salertarget',
        component: MarketingSalerTarget,
    },
    {
        path: '/marketing@salertargetachieve',
        component: MarketingAchieve,
    },
    {
        path: '/marketing@inactivelist',
        component: MarketingInactiveList,
    },
    {
        path: '/marketing@proposedclient',
        component: MarketingPoposedClient,
    },
    {
        path: '/marketing@proposedfollowp',
        component: MarketingPoposedFollowp,
    },
    {
        path: '/marketing@message',
        component: MarketingMessage,
    },
    {
        path: '/marketing@shopentry',
        component: MarketingShopEntry,
    },
    // Saler Man
    {
        path: '/salerman@shopentry',
        component: SalermanShopEntry,
    },
    {
        path: '/salerman@proposershop',
        component: SalermanProposerShop,
    },
    {
        path: '/salerman@inactivelist',
        component: SalermanInctiveList,
    },
    {
        path: '/salerman@profile',
        component: SalermanProfile,
    },
    {
        path: '/salerman@message',
        component: SalermanMessage,
    },
    {
        path: '/salerman@totalearning',
        component: SalermanTotalEarning,
    },
    {
        path: '/salerman@monthlyearning',
        component: SalermanMonthlyEarning,
    },
    // Delivery Section
    {
        path: '/update@shopinformation',
        component: UpdateShopInformation,
    },
    {
        path: '/delivery@report',
        component: DeliveryReport,
    },
    {
        path: '/delivery@calendar',
        component: DeliveryCalender,
    },
    {
        path: '/delivery@request',
        component: DeliveryRequest,
    },
    {
        path: '/delivery@message',
        component: DeliveryMessage,
    },
    {
        path: '/delivery@supportadmin',
        component: DeliverySupportadmin,
    },
    // IP Query
    {
        path: '/ip@add',
        component: IPAdd,
    },
    {
        path: '/ip@lock',
        component: IPLock,
    },
    {
        path: '/ip@unblock',
        component: IPUnblock,
    },
    {
        path: '/ipquery@message',
        component: IpQueryMessage,
    },
    // Information Edit Admin
    {
        path: '/support@panding',
        component: SupportPanding,
    },
    {
        path: '/complete@edit',
        component: ComplateEdit,
    },
    {
        path: '/editadmin@search',
        component: EditadminSearch,
    },
    {
        path: '/editadmin@message',
        component: EditadminMessage,
    },

    ////////////////////////    Admin shop Information
    {
        path: '/shopinformation@list',
        component:ShopInformationList,
    },
    {
        path: '/adminReportShopList',
        component:adminReportShopList,
    },
    {
        path: '/shopaddress@locationlist',
        component:ShopAddressLocationList,
    },

    ////////////////     ShopUser  Route

    {
        path: '/shopemployee@typecreate',
        component:ShopEmployeeTypeCreate,
    },
    {
        path: '/shopemployee@typeEdit:shopEmployeeTypeId',
        component:ShopEmployeeTypeEdit,
    },
    {
        path: '/shopmenu@permission',
        component:ShopMenuPermission,
    },
    {
        path: '/shopmenu@permissionlist',
        component:ShopMenuPermissionList,
    },
    {
        path: '/adminmenu@permission@edit',
        component:ShopMenuPermissionEdit,
    },


    ////////////////////////   Setting Route
    {
        path: '/helps@support',
        component: Help,
    },
    {
        path: '/changepassword',
        component: Password,
    },
    {
        path: '/refer@taka',
        component: Refer,
    },
    {
        path: '/profile',
        component: Profile,
    },
    {
        path: '/offer',
        component: Offer,
    },
    {
        path: '/setting',
        component: Setting,
    },



    /////////////////////// Shop Admin Setting
    {
        path: '/shopadd@category',
        component: ShopAddCategory,
    },

    {
        path: '/shopaddproduct@brand',
        component: ShopAddProductBrand,
    },

    {
        path: '/shopadd@employee',
        component: ShopAddEmployee,
    },

    {
        path: '/shopaddproductsupplier@entry',
        component: ShopAddProductSupplierEntry,
    },

    {
        path: '/shopproductsupplier@entryEdit:productSupplierId',
        component: ShopProductSupplierEntryEdit,
    },

    {
        path: '/shopadd@bank',
        component: ShopAddBank,
    },
    {
        path: '/shopadd@bankEdit:bankId',
        component: ShopAddBankEdit,
    },

    {
        path: '/shopproductcode@entry',
        component: ShopProductCodeEntry,
    },

    {
        path: '/shopproductprice@setup',
        component: ShopProductPriceSetup,
    },
    {
        path: '/shopdiscount@setup',
        component: ShopDiscountSetup,
    },

    {
        path: '/shopaddexpencetype@entry',
        component: ShopAddExpenceTypeEntry,
    },
    {
        path: '/shopaddexpencetype@Editentry:shopExpenceTypeId',
        component: ShopAddExpenceTypeEditEntry,
    },
    {
        path: '/shoploanprovider@entry',
        component: ShopLoanProviderEntry,
    },
    {
        path: '/shoploanprovider@Editentry:loanProviderId',
        component: ShopLoanProviderEditEntry,

    },
    {
        path: '/shoploan@entry',
        component: ShopLoanEntry,
    },
    {
        path: '/shoploan@Editentry:loanEntryId',
        component: ShopLoanEditEntry,
    },

    {
        path: '/shopaddincometype@entry',
        component: ShopIncomeTypeEntry,
    },
    {
        path:'/shopaddincometype@entryEdit:shopIncomeTypeId',
        component: ShopIncomeTypeEntryEdit,
    },

    {
        path: '/shopemployeelogintime@setup',
        component: ShopEmployeeeLoginTimeSetup,
    },
    {
        path: '/shopemployeelogintime@setupEdit:employeeLoginTimeId',
        component: ShopEmployeeeLoginTimeSetupEdit,
    },
    {
        path: '/shopproductbrand@entryEdit:productBrandEntryId',
        component: ShopProductBrandEntryEdit,
    },
    {
        path: '/category@report',
        component: CategoryReport1,
    },
    {
        path: '/categoryReport',
        component: CategoryReport,
    },
    {
      path: '/adminCategory@list:shopType:labelId',
      component:AdminCategoryList,
    },
    {
      path: '/category@Ownerlist:categorylabelId',
      component:CategoryOwnerList,
    },
    {
      path: '/category@Globallist:categorylabelId',
      component:CategoryGlobalList,
    },
    {
        path: '/product@report',
        component: ProductReport,
    },
    {
        path: '/productsupplier@report',
        component: ShopProductSupplierList,
    },
    {
        path: '/assetsupplier@report',
        component: ShopAssetSupplierReport,
    },
    {
        path: '/incometype@report',
        component: IncomeTypeReport,
    },
    {
        path: '/expencetype@report',
        component: ExpenceTypeReport,
    },
    {
        path: '/productbrand@report',
        component: ProductBrandReport,
    },
    {
        path: '/productbrand@list',
        component: ProductBrandReportList,
    },



]
