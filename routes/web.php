<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/logout', "LoginController@logout")->name('logout');
Route::get('/', "LoginController@index")->name('login');
Route::post('/login_', "LoginController@login_user")->name('login_user');

Route::group(['namespace' => "Admin"], function() {
    Route::middleware('auth')->group( function() {
        Route::get('dashboard', "IndexController@index")->name('dashboard');
        //Admin Routes
        Route::get('all-admins', "IndexController@admins")->name('admins');
    });
});

Route::group(['namespace' => "Settings"], function() {
    Route::prefix('settings')->middleware('auth')->group( function() {
        // mda settings
        Route::get('mda', "MdaController@index")->name('mda_settings');
        Route::post('store-mda', "MdaController@store_")->name('store_mda_settings');
        Route::post('update-mda', "MdaController@update_")->name('update_mda_settings');
        Route::get('delete-mda', "MdaController@delete_")->name('delete_mda_settings');
        Route::get('all-mdas', "MdaController@fetch_all_mdas")->name('fetch_all_mdas');
        Route::get('single-mda', "MdaController@find_single_mda_record")->name('find_single_mda_record');
        
        // Grade settings 
        Route::get('grade', "GradeController@index")->name('grade_settings');
        Route::post('store-grade', "GradeController@store_")->name('store_grade_settings');
        Route::post('update-grade', "GradeController@update_")->name('update_grade_settings');
        Route::get('delete-grade', "GradeController@delete_")->name('delete_grade_settings');
        Route::get('all-grades', "GradeController@fetch_all_grades")->name('fetch_all_grades');
        Route::get('single-grade', "GradeController@find_single_grade_record")->name('find_single_grade_record');

        //Steps settings
        Route::get('steps', "StepsController@index")->name('step_settings');
        Route::post('store-step', "StepsController@store_")->name('store_step_settings');
        Route::post('update-step', "StepsController@update_")->name('update_step_settings');
        Route::get('delete-step', "StepsController@delete_")->name('delete_step_settings');
        Route::get('all-steps', "StepsController@fetch_all_steps")->name('fetch_all_steps');
        Route::get('single-step', "StepsController@find_single_step_record")->name('find_single_step_record');

        //Salary settings
        Route::get('salary', "SalaryController@index")->name('salary_settings');
        Route::post('store-salary', "SalaryController@store_")->name('store_salary_settings');
        Route::post('update-salary', "SalaryController@update_")->name('update_salary_settings');
        Route::get('delete-salary', "SalaryController@delete_")->name('delete_salary_settings');
        Route::get('all-salaries', "SalaryController@fetch_all_salaries_record")->name('fetch_all_salarys');
        Route::get('single-salary', "SalaryController@find_single_salary_record")->name('find_single_salary_record');

        //Allowance settings
        Route::get('allowance', "AllowanceController@index")->name('allowance_settings');
        Route::post('store-allowance', "AllowanceController@store_")->name('store_allowance_settings');
        Route::post('update-allowance', "AllowanceController@update_")->name('update_allowance_settings');
        Route::get('delete-allowance', "AllowanceController@delete_")->name('delete_allowance_settings');
        Route::get('all-allowances', "AllowanceController@fetch_all_allowance_record")->name('fetch_all_allowances');
        Route::get('single-allowance', "AllowanceController@find_single_allowance_record")->name('find_single_allowance_record');
        Route::any('update-allowance-items_', "AllowanceController@update_allowance_items")->name('update_allowance_items');
        Route::get('fetch-allowances-item', "AllowanceController@fetch_allowances_item")->name('fetch_allowances_item');
        
        //Deductions settings
        Route::get('deductions', "DeductionsController@index")->name('deduction_settings');
        Route::post('store-deduction', "DeductionsController@store_")->name('store_deduction_settings');
        Route::post('update-deduction', "DeductionsController@update_")->name('update_deduction_settings');
        Route::get('delete-deduction', "DeductionsController@delete_")->name('delete_deduction_settings');
        Route::get('all-deductions', "DeductionsController@fetch_all_deduction_record")->name('fetch_all_deductions');
        Route::get('single-deduction', "DeductionsController@find_single_deduction_record")->name('find_single_deduction_record');
        Route::any('update-deduction-items_', "DeductionsController@update_deduction_items")->name('update_deduction_items');
        Route::get('fetch-deductions-item', "DeductionsController@fetch_deductions_item")->name('fetch_deductions_item');

        // Payroll settings
        Route::get('payroll', "PayrollController@index")->name('payroll_settings');
        Route::post('store-payroll_', "PayrollController@register_payroll")->name('register_payroll');
        Route::get('payroll-lists_', "PayrollController@view_payroll_items")->name('view_payroll_items');
        Route::get('delete-payroll_', "PayrollController@delete_payroll")->name('delete_payroll');
        Route::get('print-payroll_', "PayrollController@print_payroll_list")->name('print_payroll_list');
    });
});

Route::group(['namespace' => "User"], function() {
    Route::middleware('auth')->group( function() {
        Route::get('profile', "ProfileController@index")->name('profile');
    });
});


Route::middleware('auth')->group( function() {
    //Employees routes
    Route::get('employees', "EmployeeController@index")->name('employees_page');
    Route::post('register-employees', "EmployeeController@register_employee")->name('register_employee');
    Route::get('delete-employee', "EmployeeController@delete_employee")->name('delete_employee');
    Route::post('store-employee-allowance_', "EmployeeController@store_employee_allowance")->name('store_employee_allowance');
    Route::get('fetch-employee-allowance_', "EmployeeController@fetch_employee_allowance")->name('fetch_employee_allowance');
    Route::post('store-employee-deduction_', "EmployeeController@store_employee_deduction")->name('store_employee_deduction');
    Route::get('fetch-employee-deduction_', "EmployeeController@fetch_employee_deduction")->name('fetch_employee_deduction');

    //== Cashier routes
    Route::get('expenditures', "ExpenditureController@index")->name('expenditures');
    Route::get('expenditures-report', "ExpenditureController@expenditure_report")->name('expenditure_report');
    Route::post('store-expenditure', "ExpenditureController@store_expenditure")->name('store_expenditure');
    
});

