<?php


Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');


// EMPLOYEE ROUTES 
Route::get('add-employee', 'EmployeeController@index')->name('employee.add');
Route::get('all-employee', 'EmployeeController@show')->name('employee.all');
Route::post('insert-employee', 'EmployeeController@store')->name('employee.insert');
Route::get('view-employee/{id}', 'EmployeeController@ViewEmployee')->name('employee.view');;
Route::get('delete-employee/{id}', 'EmployeeController@DeleteEmployee')->name('employee.delete');;
Route::get('edit-employee/{id}', 'EmployeeController@EditEmployee')->name('employee.edit');;
Route::post('update-employee/{id}','EmployeeController@UpdateEmployee')->name('employee.update');;


// CUSTOMER ROUTES 
Route::get('add-customer', 'CustomerController@create')->name('customer.add');
Route::get('all-customer', 'CustomerController@index')->name('customer.all');
Route::post('insert-customer', 'CustomerController@store')->name('customer.insert');
Route::get('view-customer/{id}', 'CustomerController@show')->name('customer.view');
Route::get('delete-customer/{id}', 'CustomerController@destroy')->name('customer.delete');
Route::get('edit-customer/{id}', 'CustomerController@edit')->name('customer.edit');
Route::post('update-customer/{id}','CustomerController@update')->name('customer.update');


// SUPPLIER ROUTE
Route::get('add-supplier', 'SupplierController@create')->name('supplier.add');
Route::post('insert-supplier','SupplierController@store')->name('supplier.insert');
Route::get('all-supplier', 'SupplierController@index')->name('supplier.all');
Route::get('view-supplier/{id}', 'SupplierController@show')->name('supplier.view');
Route::get('delete-supplier/{id}', 'SupplierController@destroy')->name('supplier.delete');
Route::get('edit-supplier/{id}', 'SupplierController@edit')->name('supplier.edit');
Route::post('update-supplier/{id}','SupplierController@update')->name('supplier.update');


// SALARY ROUTE
Route::get('/add-advenced-salary', 'SalaryController@AddAdvancedSalary')->name('add.advancedsalary');
Route::post('/insert-advancedsalary','SalaryController@InsertAdvanced');
Route::get('/all-advenced-salary', 'SalaryController@AllSalary')->name('all.advancedsalary');
Route::get('/pay-salary', 'SalaryController@PaySalary')->name('pay.salary');

// CATEGORY ROUTE
Route::get('/add-category','CategoryController@AddCategory')->name('add.category');
Route::post('/insert-category','CategoryController@InsertCategory');
Route::get('/all-catgory', 'CategoryController@AllCategory')->name('all.category');
Route::get('/delete-category/{id}', 'CategoryController@DeleteCategory');
Route::get('/edit-category/{id}', 'CategoryController@EditCategory');
Route::post('/update-category/{id}','CategoryController@UpdateCategory');

// PRODUCT ROUTE
Route::get('/add-product','ProductController@create')->name('add.product');
Route::post('/insert-product','ProductController@store');
Route::get('/all-product', 'ProductController@index')->name('all.product');
Route::get('/delete-product/{id}', 'ProductController@delete');
Route::get('/view-product/{id}', 'ProductController@show');
Route::get('/edit-product/{id}', 'ProductController@view');
Route::post('/update-product/{id}','ProductController@update');

//excel import and export
Route::get('/import-product','ProductController@ImportProduct')->name('import.product');
Route::get('/export','ProductController@export')->name('export');
Route::post('/import','ProductController@import')->name('import');



// EXPENSE ROUTE

Route::get('/add-expense','ExpenseController@create')->name('add.expense');
Route::post('/insert-expense','ExpenseController@store');
Route::get('/today-expense','ExpenseController@TodayExpense')->name('today.expense');
Route::get('/edit-today-expense/{id}', 'ExpenseController@EditTodayExpense');
Route::post('/update-expense/{id}','ExpenseController@UpdateExpense');
Route::get('/monthly-expense','ExpenseController@MonthlyExpense')->name('monthly.expense');
Route::get('/yearly-expense','ExpenseController@YearlyExpense')->name('yearly.expense');

//  MONTHLY EXPENSE
Route::get('/january-expense','ExpenseController@JanuaryExpense')->name('january.expense');
Route::get('/february-expense','ExpenseController@FebruaryExpense')->name('february.expense');
Route::get('/march-expense','ExpenseController@MarchExpense')->name('march.expense');
Route::get('/april-expense','ExpenseController@AprilExpense')->name('april.expense');
Route::get('/may-expense','ExpenseController@MayExpense')->name('may.expense');
Route::get('/june-expense','ExpenseController@JuneExpense')->name('june.expense');
Route::get('/july-expense','ExpenseController@JulyExpense')->name('july.expense');
Route::get('/august-expense','ExpenseController@AugustExpense')->name('august.expense');
Route::get('/september-expense','ExpenseController@SeptemberExpense')->name('september.expense');
Route::get('/october-expense','ExpenseController@OctoberExpense')->name('october.expense');
Route::get('/november-expense','ExpenseController@NovemberExpense')->name('november.expense');
Route::get('/december-expense','ExpenseController@DecemberExpense')->name('december.expense');



// ATTENDENCE ROUTE
Route::get('/take-attendence','AttendenceController@create')->name('take.attendence');
Route::post('/insert-attendence','AttendenceController@store');
Route::get('/all-attendence','AttendenceController@index')->name('all.attendence');
Route::get('/edit-attendence/{edit_date}', 'AttendenceController@edit');
Route::post('/update-attendence','AttendenceController@update');
Route::get('/view-attendence/{edit_date}', 'AttendenceController@show');



// SETTING ROUTE
Route::get('/website-setting','AttendenceController@Setting')->name('setting');
Route::post('/update-website/{id}', 'AttendenceController@UpdateWebsite');


// POS ROUTE
Route::get('/pos','PosController@index')->name('pos');


// CART ROUTE
Route::post('/add-cart', 'CartController@index');
Route::post('/cart-update/{rowId}', 'CartController@CartUpdate');
Route::get('/cart-remove/{rowId}', 'CartController@CartRemove');
Route::post('/invoice', 'CartController@CreateInvoice');
Route::post('/final-invoice', 'CartController@FinalInvoice');

