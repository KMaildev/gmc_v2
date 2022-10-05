<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes(['register' => false]);

Route::middleware('auth')->group(function () {
    Route::view('/file_manager', 'file_manager.index')->name('file_manager.index');

    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('accountingdashboard', 'AccountingDashboardController');

    Route::resource('accountclassification', 'Accounting\AccountClassificationController');
    Route::get('classificationdependent/ajax/{id}', array('as' => 'classificationdependent.ajax', 'uses' => 'Accounting\AccountClassificationController@dependentAjax'));

    Route::resource('accounttype', 'Accounting\AccountTypeController');
    Route::get('accounttypedependent/ajax/{id}', array('as' => 'accounttypedependent.ajax', 'uses' => 'Accounting\AccountTypeController@dependentAjax'));

    Route::resource('chartofaccount', 'Accounting\ChartofAccountController');
    Route::get('chartofaccountdependent/ajax/{id}', array('as' => 'chartofaccountdependent.ajax', 'uses' => 'Accounting\ChartofAccountController@dependentAjax'));

    Route::resource('subaccount', 'Accounting\SubAccountController');
    Route::resource('bankform', 'Accounting\BankFormController');

    // Customer 
    Route::resource('customer', 'Customer\CustomerController');
    Route::get('get_customer_ajax/{id}', array('as' => 'get_customer_ajax', 'uses' => 'Customer\CustomerController@get_customer_ajax'));
    Route::get('get_dealer_customer_ajax/{id}', array('as' => 'get_dealer_customer_ajax', 'uses' => 'Customer\CustomerController@get_dealer_customer_ajax'));
    Route::post('dealer_customer_import', 'Customer\CustomerController@dealer_customer_import')->name('dealer_customer_import');
    Route::get('dealer_customer_export', 'Customer\CustomerController@dealer_customer_export')->name('dealer_customer_export');

    // HP Customer
    Route::resource('hp_customer', 'Customer\HpCustomerController');
    Route::get('hp_customer_export', 'Customer\HpCustomerController@hp_customer_export')->name('hp_customer_export');

    // Cash Sale Customer
    Route::resource('cash_sale_customer', 'Customer\CashSaleCustomerController');


    // Supplier 
    Route::resource('supplier', 'SupplierController');
    Route::get('get_supplier_ajax/{id}', array('as' => 'get_supplier_ajax', 'uses' => 'SupplierController@get_supplier_ajax'));
    Route::post('supplier_import', 'SupplierController@supplier_import')->name('supplier_import');


    // Brand & Products 
    Route::resource('brand', 'BrandController');

    Route::resource('type_of_models', 'Accounting\TypeOfModelController');
    Route::get('get_type_of_models_ajax/{id}', array('as' => 'get_type_of_models_ajax', 'uses' => 'Accounting\TypeOfModelController@get_type_of_models_ajax'));

    Route::resource('products', 'ProductsController');
    Route::get('get_products_ajax/{id}', array('as' => 'get_products_ajax', 'uses' => 'ProductsController@get_products_ajax'));
    Route::post('product_import', 'ProductsController@product_import')->name('product_import');
    Route::resource('import_car', 'Accounting\ImportCarController');

    // CashBook 
    Route::resource('cashbook', 'Accounting\CashBookController');
    Route::get('cashbook_export', 'Accounting\CashBookController@cashbook_export')->name('cashbook_export');
    Route::resource('daily_report', 'Accounting\DailyReportController');


    // Dealer Sales 
    Route::resource('sales_invoices', 'Accounting\SalesInvoicesController');
    Route::get('get_sales_invoices/{id}', array('as' => 'get_sales_invoices', 'uses' => 'Accounting\SalesInvoicesController@get_sales_invoices'));
    Route::get('get_sales_invoices_ajax/{type}', array('as' => 'get_sales_invoices_ajax', 'uses' => 'Accounting\SalesInvoicesController@get_sales_invoices_ajax'));
    Route::get('get_sales_items/{id}', array('as' => 'get_sales_items', 'uses' => 'Accounting\SalesInvoicesController@get_sales_items'));
    Route::get('sale_invoice_pdf_download/{id}', array('as' => 'sale_invoice_pdf_download', 'uses' => 'Accounting\SalesInvoicesController@sale_invoice_pdf_download'));

    // Dealer Sales Group
    Route::resource('sales_journal', 'Accounting\SalesJournalController');
    Route::get('get_sales_journals/{id}', array('as' => 'get_sales_journals', 'uses' => 'Accounting\SalesJournalController@get_sales_journals'));
    Route::resource('cash_collection', 'Accounting\CashCollectionController');
    Route::resource('sales_ledger', 'Accounting\SalesLedgerController');
    Route::resource('account_receivables', 'Accounting\AccountReceivablesController');
    Route::resource('sale_cash_book', 'Accounting\SaleCashBookController');

    // HP Sales 
    Route::resource('hp_sales_invoices', 'Hp\SalesInvoiceController');
    Route::get('hp_invoice_view/{id}', array('as' => 'hp_invoice_view', 'uses' => 'Hp\SalesInvoiceController@hp_invoice_view'));

    // HP Sales Group
    Route::resource('hp_sales_journal', 'HP\HpSalesJournalController');
    Route::resource('hp_cash_collection', 'Hp\HpCashCollectionController');
    Route::resource('hp_sales_ledger', 'Hp\HpSalesLedgerController');
    Route::resource('hp_account_receivables', 'Hp\HpAccountReceivablesController');
    Route::resource('hp_sale_cash_book', 'Hp\HpSaleCashBookController');

    Route::resource('hire_purchase', 'Hp\HirePurchaseController');
    Route::resource('hp_sales_account', 'Hp\HpSalesAccountController');
    Route::resource('hp_cash_account', 'Hp\HpCashAccountController');
    Route::resource('hp_interest_suspense_account', 'Hp\HpInterestSuspenseAccountController');
    Route::resource('hp_service_account', 'Hp\HpServiceAccountController');
    Route::resource('hp_interest_account', 'Hp\HpInterestAccountController');


    // Sale Pay Now
    Route::resource('sale_pay_now', 'Accounting\SalePaynowController');
    Route::get('sales_inv_paynow_create/{id}', array('as' => 'sales_inv_paynow_create', 'uses' => 'Accounting\SalePaynowController@salePayNow'));


    // Cart System
    Route::resource('sale_invoice_cart', 'Cart\SaleInvoiceCartController');
    Route::post('add_cart_temporary', 'Cart\SaleInvoiceCartController@store');
    Route::get('get_temporary_sales_items', array('as' => 'get_temporary_sales_items', 'uses' => 'Cart\SaleInvoiceCartController@index'));
    Route::get('temporary_sales_items_remove/{id}', array('as' => 'temporary_sales_items_remove', 'uses' => 'Cart\SaleInvoiceCartController@temporary_sales_items_remove'));

    Route::resource('sales_items', 'Accounting\SalesItemsController');
    Route::get('sales_items_remove/{id}', array('as' => 'sales_items_remove', 'uses' => 'Accounting\SalesItemsController@sales_items_remove'));


    // Purchase 
    Route::resource('purchase_order', 'Purchase\PurchaseOrderController');
    Route::resource('purchase_item', 'Purchase\PurchaseItemController');
    Route::get('purchase_item_remove/{id}', array('as' => 'purchase_item_remove', 'uses' => 'Purchase\PurchaseItemController@purchase_item_remove'));
    Route::get('get_purchase_items_ajax/{id}', 'Purchase\PurchaseItemController@getPurchaseItemsAjax')->name('get_purchase_items_ajax');
    Route::get('get_purchase_item_detail_ajax/{id}', 'Purchase\PurchaseItemController@getPurchaseItemsDetailAjax')->name('get_purchase_item_detail_ajax');

    // Temporary Purchase Item 
    Route::post('store_temporary_purchase_item', 'Purchase\TemporaryPurchaseItemController@store');
    Route::get('get_temporary_purchase_items', array('as' => 'get_temporary_purchase_items', 'uses' => 'Purchase\TemporaryPurchaseItemController@index'));
    Route::get('remove_temporary_purchase_items/{id}', array('as' => 'remove_temporary_purchase_items', 'uses' => 'Purchase\TemporaryPurchaseItemController@remove_temporary_purchase_items'));

    // Temporary Purchase Group Item
    Route::get('get_temporary_purchase_group_item', 'Purchase\TemporaryPurchaseGroupItemContriller@index');
    Route::post('store_temporary_purchase_group_item', 'Purchase\TemporaryPurchaseGroupItemContriller@store');
    Route::get('remove_temporary_purchase_group_items/{id}', 'Purchase\TemporaryPurchaseGroupItemContriller@remove')->name('remove_temporary_purchase_group_items');

    // Purchase Operation
    Route::resource('purchase_operation', 'Purchase\OperationController');
    Route::get('purchase_operation_create/{id}', array('as' => 'purchase_operation_create', 'uses' => 'Purchase\OperationController@operation_create'));
    Route::post('update_purchase_operation_items', 'Purchase\OperationController@UpdatePurchaseOperationItems');






    // Arrival Management 
    Route::resource('arrival_management', 'Purchase\ArrivalManagementController');
    Route::get('arrival_management_create/{id}', array('as' => 'arrival_management_create', 'uses' => 'Purchase\ArrivalManagementController@arrival_management_create'));
    Route::post('update_arrival_items', 'Purchase\ArrivalManagementController@UpdateArrivalItems');

    Route::resource('purchase_journal', 'Purchase\PurchaseJournalController');
    Route::resource('purchase_account_payable', 'Purchase\PurchaseAccountPayableController');

    Route::resource('group_invoice', 'Purchase\GroupInvoiceController');



    // Cash Sales Invoice 
    Route::resource('cash_sales_invoices', 'Purchase\CashSalesInvoicesController');

    // Sales Return 
    Route::resource('sales_return', 'SalesReturn\SalesReturnController');
    Route::get('select_return_invoice/{id}', array('as' => 'select_return_invoice', 'uses' => 'SalesReturn\SalesReturnController@SelectReturnInvoice'));
    Route::resource('sales_return_item', 'SalesReturn\SalesReturnItemController');
    Route::get('save_sales_return_item/{id}', array('as' => 'save_sales_return_item', 'uses' => 'SalesReturn\SalesReturnItemController@SaveSalesReturnItem'));
    Route::get('remove_sales_return_item/{id}', array('as' => 'remove_sales_return_item', 'uses' => 'SalesReturn\SalesReturnItemController@RemoveSalesReturnItem'));
    Route::post('update_sales_return_item_description', 'SalesReturn\SalesReturnItemController@update_sales_return_item_description');
    Route::post('update_sales_return_item_unit_price', 'SalesReturn\SalesReturnItemController@update_sales_return_item_unit_price');



    // Inventory
    Route::resource('inventory_dashboard', 'Inventory\InventoryDashboard');
    Route::resource('inventory', 'Inventory\InventoryController');
    Route::resource('chassis_management', 'Inventory\ChassisManagementController');
    Route::get('create_chassis_management/{id}', 'Inventory\ChassisManagementController@CreateChassisManagement')->name('create_chassis_management');
    Route::post('import_shipping_chassis_management', 'Inventory\ChassisManagementController@importShippingChassisManagement')->name('import_shipping_chassis_management');

    Route::resource('department', 'DepartmentController');
    Route::resource('employee', 'EmployeeController');
    Route::get('emp_export', 'EmployeeController@emp_export')->name('emp_export');
    Route::resource('changepassword', 'ChangePasswordController');
    Route::resource('activity', 'Activity\ActivityLogController');
    Route::resource('role', 'RoleController');
    Route::resource('permission', 'PermissionController');
});
