<?php



use Modules\AccountManagement\Http\Controllers\AccountManagementController;
use Modules\AccountManagement\Http\Controllers\Fund\FundController;
use Modules\AccountManagement\Http\Controllers\Head\AccountHeadController;
use Modules\AccountManagement\Http\Controllers\Head\AccountMainHeadController;
use Modules\AccountManagement\Http\Controllers\Expense\ExpenseController;
use Modules\AccountManagement\Http\Controllers\Deposit\DepositController;
use Modules\AccountManagement\Http\Controllers\Cashbook\CashbookController;

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

Route::prefix('accountmanagement')->group(function() {
    // Route::get('/', 'AccountManagementController@index');


    //Route::get('/',[AccountManagementController::class, 'account'])->name('admin.accountmanagement');

    // DEPOSIT GROUP ROUTING
    Route::prefix('deposit')->group(function(){
        Route::get('add', [DepositController::class, 'add'])->name('admin.accountmanagement.deposit.add');
        Route::post('getSubHead',[DepositController::class, 'getSubHead'])->name('admin.accountmanagement.deposit.getSubHead');
        Route::post('store', [DepositController::class, 'store'])->name('admin.accountmanagement.deposit.store');
    });

    // EXPENSE GROUP ROUTING
    Route::prefix('expense')->group(function(){
        Route::get('add', [ExpenseController::class, 'add'])->name('admin.accountmanagement.expense.add');
        Route::post('getall/teacher', [ExpenseController::class, 'getAllTeacher'])->name('admin.accountmanagement.teacher.getallteacher');


        Route::post('store', [ExpenseController::class, 'store'])->name('admin.accountmanagement.expense.store');
    });

    // EXPENSE GROUP ROUTING
    Route::prefix('cashbook')->group(function(){
        Route::get('list', [CashbookController::class, 'list'])->name('admin.accountmanagement.cashbook.list');
    });


    // FUNDS GROUP ROUTING
    Route::prefix('fund')->group(function(){
        Route::get('list', [FundController::class, 'list'])->name('admin.accountmanagement.fund.list');
        Route::get('add', [FundController::class, 'create'])->name('admin.accountmanagement.fund.add');
        Route::post('store', [FundController::class, 'store'])->name('admin.accountmanagement.fund.store');
        Route::get('default/{id}', [FundController::class, 'isDefault'])->name('admin.accountmanagement.fund.default');
        Route::get('not-default/{id}', [FundController::class, 'default_not'])->name('admin.accountmanagement.fund.default_not');

        Route::get('details/{id}', [FundController::class, 'details'])->name('admin.accountmanagement.fund.details');
        Route::post('transfer', [FundController::class, 'transfer'])->name('admin.accountmanagement.fund.transfer');

    });

    // MAIN HEAD GROUP ROUTING
    Route::prefix('main-head')->group(function (){
        Route::get('add', [AccountMainHeadController::class, 'add'])->name('admin.accountmanagement.mainhead.add');
        Route::post('store', [AccountMainHeadController::class, 'store'])->name('admin.accountmanagement.mainhead.store');
    });

    // SUBHEAD GROUP ROUTING

    Route::prefix('head')->group(function (){
        Route::get('list', [AccountHeadController::class, 'list'])->name('admin.accountmanagement.head.list');
        Route::get('sub/add/{id}', [AccountHeadController::class, 'add'])->name('admin.accountmanagement.head.add');
        Route::post('sub/add/store', [AccountHeadController::class, 'store'])->name('admin.accountmanagement.head.store');
        Route::get('edit/{id}/{table}', [AccountHeadController::class, 'edit'])->name('admin.accountmanagement.edit');
        Route::post('update', [AccountHeadController::class, 'update'])->name('admin.accountmanagement.update');
    });


});
