<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\ClassController;
use App\Http\Controllers\Backend\QuoteController;
use App\Http\Controllers\Backend\StaffController;
use App\Http\Controllers\Backend\TradeController;
use App\Http\Controllers\Backend\CourseController;
use App\Http\Controllers\Backend\NoticeController;
use App\Http\Controllers\Backend\SocialController;
use App\Http\Controllers\Frontend\FrontController;
use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Backend\ExpanceController;
use App\Http\Controllers\Backend\GalleryController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\SectionController;
use App\Http\Controllers\Backend\SessionController;
use App\Http\Controllers\Backend\StudentController;
use App\Http\Controllers\Backend\SubjectController;

use App\Http\Controllers\Backend\TeacherController;
use App\Http\Controllers\Backend\ExamListController;
use App\Http\Controllers\Backend\FrontEndController;
use App\Http\Controllers\Backend\SendMailController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Backend\ExamGradeController;
use App\Http\Controllers\Backend\LibrarianController;
use App\Http\Controllers\Backend\TransportController;
use App\Http\Controllers\Backend\AttendanceController;
use App\Http\Controllers\Backend\ManageMarkController;
use App\Http\Controllers\Backend\StudentFeeController;
use App\Http\Controllers\Frontend\AdmissionController;
use App\Http\Controllers\Inventory\SupplierController;
use App\Http\Controllers\Librarian\BookIssuController;
use App\Http\Controllers\Inventory\InventoryController;
use App\Http\Controllers\Backend\BookCategoryController;
use App\Http\Controllers\Backend\ClassRoutineController;
use App\Http\Controllers\Student\StudentLoginController;
use App\Http\Controllers\Teacher\TeacherLoginController;
use App\Http\Controllers\Accountant\AccountantController;
use App\Http\Controllers\Backend\AccountManageController;
use App\Http\Controllers\Backend\SchoolSectionController;
use App\Http\Controllers\Backend\EmployeeSalaryController;
use App\Http\Controllers\Inventory\InventoryCatController;
use App\Http\Controllers\Librarian\LibrarianLoginController;
use App\Http\Controllers\Admin\AdminPasswordForgetController;
use App\Http\Controllers\Backend\ManageLibraryBookController;
use App\Http\Controllers\Backend\ApplicationCanidateController;



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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/',[FrontController::class,'index'])->name('frontend');
Route::get('online-admission', [AdmissionController::class, 'onlineAdmission'])->name('online-admission.form');
Route::post('get-district', [AdmissionController::class, 'get_district'])->name('getDistrict');
Route::post('get-thana', [AdmissionController::class, 'get_thana'])->name('getthana');
Route::post('get-union', [AdmissionController::class, 'get_union'])->name('getunion');
Route::post('get-district-per', [AdmissionController::class, 'get_district_per'])->name('getDistrictper');
Route::post('get-thana-per', [AdmissionController::class, 'get_thana_per'])->name('getthanaper');
Route::post('get-union-per', [AdmissionController::class, 'get_union_per'])->name('getunionper');
Route::post('get-trade', [AdmissionController::class, 'get_trade'])->name('gettrade');
Route::post('online-admission/save', [AdmissionController::class, 'save'])->name('online-admission.save');
Route::get('about',[FrontController::class,'about'])->name('frontend.about');
Route::get('event',[FrontController::class,'event'])->name('frontend.event');
Route::get('event/details/{id}',[FrontController::class,'eventDetail'])->name('frontend.event.details');
Route::get('contact',[FrontController::class,'contact'])->name('frontend.contact');
Route::post('contact-save',[ContactController::class,'contact_save'])->name('frontend.contact-save');
Route::get('teacher',[FrontController::class,'teacher'])->name('frontend.teacher');
Route::get('teacher-details/{id}/{name}',[FrontController::class,'teacher_details'])->name('frontend.teacher-details');
Route::get('notice',[FrontController::class,'notice'])->name('frontend.notice');
Route::get('frontend/notice/download/{id}',[FrontController::class,'download'])->name('frontend.notice.download');
Route::get('gallery', [FrontController::class, 'gallery'])->name('frontend.gallery');
Route::get('gallery/details/{id}', [FrontController::class, 'gallery_details'])->name('frontend.gallery.details');


Route::get('/forget/admin',[AdminPasswordForgetController::class,'AdminReset'])->name('admin.forget');
Route::post('/send/admin',[AdminPasswordForgetController::class,'AdminSend'])->name('admin.send');
Route::get('/admin/otp',[AdminPasswordForgetController::class,'sendOTP'])->name('admin.otp');
Route::post('check/otp',[AdminPasswordForgetController::class, 'checkOTP'])->name('admin.check.otp');
Route::get('/admin/password',[AdminPasswordForgetController::class,'AdminPassword'])->name('admin.password');
Route::post('change/password',[AdminPasswordForgetController::class, 'chanagePassword'])->name('admin.password.change');

Route::get('/teacher/login',[TeacherLoginController::class, 'index'])->name('teacher.index');
Route::post('/teacher/login',[TeacherLoginController::class, 'login'])->name('teacher.login');


Auth::routes();



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('librarian/login',[LibrarianLoginController::class,'login'])->name('librarian.login');
Route::post('librarian/login',[LibrarianLoginController::class,'check'])->name('librarian.login');

Route::get('student/login',[StudentLoginController::class,'login'])->name('sms.login');
Route::post('student/login',[StudentLoginController::class,'check'])->name('sms.login');


Route::group(['middleware' => ['auth:web,librarian,teacher,student,accountant']], function(){
    Route::group(['prefix'=>'admin'],function (){
       Route::get('dashboard',[BackendController::class,'dashboard'])->name('admin.dashboard');
       Route::group(['prefix'=>'frontend'],function () {
           Route::get('general-settings',[FrontEndController::class,'general_settings'])->name('admin.frontend.general_settings');
           Route::post('general-settings/save',[FrontEndController::class,'general_settings_save'])->name('admin.general_settings.save');


           Route::get('banner',[FrontEndController::class,'banner'])->name('admin.frontend.banner');

           Route::post('banner/save',[FrontEndController::class,'banner_save'])->name('admin.frontend.banner.save');
           Route::post('banner/update',[FrontEndController::class,'banner_update'])->name('admin.frontend.banner.update');

           Route::get('banner/active/{id}',[FrontEndController::class,'active_banner'])->name('admin.frontend.banner.active');
           Route::get('banner/inactive/{id}',[FrontEndController::class,'inactive_banner'])->name('admin.frontend.banner.inactive');
           Route::get('banner/delete/{id}',[FrontEndController::class,'delete_banner'])->name('admin.frontend.banner.delete');

           Route::get('message-settings',[QuoteController::class,'index'])->name('admin.frontend.message');

           Route::post('message/save',[QuoteController::class,'save'])->name('admin.frontend.message.save');
           Route::post('message/update',[QuoteController::class,'update'])->name('admin.frontend.message.update');
           Route::get('message/delete/{id}',[QuoteController::class,'delete_message'])->name('admin.frontend.message.delete');
           Route::get('message/inactive/{id}',[QuoteController::class,'inactive'])->name('admin.frontend.message.inactive');
           Route::get('message/active/{id}',[QuoteController::class,'active'])->name('admin.frontend.message.active');



           Route::get('notice',[NoticeController::class,'index'])->name('admin.frontend.notice');
           Route::post('notice/save',[NoticeController::class,'save'])->name('admin.frontend.notice.save');
           Route::post('notice/update',[NoticeController::class,'update'])->name('admin.frontend.notice.update');
           Route::get('notice/download/{id}',[NoticeController::class,'download'])->name('notice.download');

           Route::get('notice/inactive/{id}',[NoticeController::class,'inactive'])->name('admin.frontend.notice.inactive');
           Route::get('notice/active/{id}',[NoticeController::class,'active'])->name('admin.frontend.notice.active');

           Route::get('notice/delete/{id}',[NoticeController::class,'delete'])->name('admin.frontend.notice.delete');


           Route::get('school-section',[SchoolSectionController::class,'index'])->name('admin.frontend.school');
           Route::post('school-section/save',[SchoolSectionController::class,'save'])->name('admin.frontend.school.save');



           Route::get('event',[\App\Http\Controllers\Backend\EventController::class,'index'])->name('admin.frontend.event');

           Route::post('event/save',[\App\Http\Controllers\Backend\EventController::class,'save'])->name('admin.frontend.event.save');

           Route::get('event/inactive/{id}',[\App\Http\Controllers\Backend\EventController::class,'inactive'])->name('admin.frontend.event.inactive');

           Route::get('event/active/{id}',[\App\Http\Controllers\Backend\EventController::class,'active'])->name('admin.frontend.event.active');

           Route::post('event/update',[\App\Http\Controllers\Backend\EventController::class,'update'])->name('admin.frontend.event.update');
           Route::get('event/delete/{id}',[\App\Http\Controllers\Backend\EventController::class,'delete'])->name('admin.frontend.event.delete');

           Route::get('gallery',[GalleryController::class,'index'])->name('admin.frontend.gallery');
           Route::post('gallery/save',[GalleryController::class,'save'])->name('admin.frontend.gallery.save');
           Route::post('gallery/update',[GalleryController::class,'update'])->name('admin.frontend.gallery.update');
           Route::get('gallery/inactive/{id}',[GalleryController::class,'inactive'])->name('admin.frontend.gallery.inactive');
           Route::get('gallery/active/{id}',[GalleryController::class,'active'])->name('admin.frontend.gallery.active');
           Route::get('gallery/delete/{id}',[GalleryController::class,'delete'])->name('admin.frontend.gallery.delete');
           Route::get('image/gallery/delete/{id}',[GalleryController::class,'single_delete'])->name('admin.frontend.image.gallery.delete');
           Route::post('gallery/add',[GalleryController::class,'add'])->name('admin.frontend.gallery.add');

            Route::get('teacher',[TeacherController::class,'index'])->name('admin.frontend.teacher');

       });

       Route::get('social',[SocialController::class,'index'])->name('admin.frontend.social');
       Route::post('social/save',[SocialController::class,'save'])->name('admin.frontend.social.save');
       Route::post('social/update',[SocialController::class,'update'])->name('admin.frontend.social.update');
       Route::get('social/inactive/{id}',[SocialController::class,'inactive'])->name('admin.frontend.social.inactive');
       Route::get('social/active/{id}',[SocialController::class,'active'])->name('admin.frontend.social.active');
       Route::get('social/delete/{id}',[SocialController::class,'delete'])->name('admin.frontend.social.delete');

        Route::group(['prefix' => 'trade'], function(){
            Route::get('index', [TradeController::class, 'index'])->name('trade.index');
            Route::get('create', [TradeController::class, 'create'])->name('trade.create');
            Route::post('create/store', [TradeController::class, 'store'])->name('trade.create.store');
            Route::get('edit/{id}', [TradeController::class, 'edit'])->name('trade.edit');
            Route::post('update/', [TradeController::class, 'update'])->name('trade.update');
            Route::get('status/{id}', [TradeController::class, 'status'])->name('trade.status');
            Route::get('delete/trade/{id}', [TradeController::class, 'destroy'])->name('trade.trash');
        });
        Route::group(['prefix' => 'course'], function(){
            Route::get('index', [CourseController::class, 'index'])->name('course.index');
            Route::get('create', [CourseController::class, 'create'])->name('course.create');
            Route::post('create/store', [CourseController::class, 'store'])->name('course.create.store');
            Route::get('edit/{id}', [CourseController::class, 'edit'])->name('course.edit');
            Route::post('update/', [CourseController::class, 'update'])->name('course.update');
            Route::get('status/{id}', [CourseController::class, 'status'])->name('course.status');
            Route::get('delete/course/{id}', [CourseController::class, 'delete'])->name('course.delete');

        });

         Route::group(['prefix' => 'teacher'], function(){
            Route::get('index', [TeacherController::class, 'index'])->name('teacher.index');
            Route::get('add', [TeacherController::class, 'add'])->name('teacher.add');
            Route::post('create/store', [TeacherController::class, 'store'])->name('teacher.create.store');
            Route::get('edit/{id}', [TeacherController::class, 'edit'])->name('teacher.edit');
            Route::post('update/', [TeacherController::class, 'update'])->name('teacher.update');
            Route::get('status/{id}', [TeacherController::class, 'status'])->name('teacher.status');
            Route::get('trash/{id}', [TeacherController::class, 'destroy'])->name('teacher.trash');
        });

        Route::group(['prefix' => 'staff'], function(){
            Route::get('index', [StaffController::class, 'index'])->name('admin.staff.index');
            Route::get('create', [StaffController::class, 'create'])->name('admin.staff.create');
            Route::post('store', [StaffController::class, 'store'])->name('admin.staff.store');
            Route::get('edit/{id}', [StaffController::class, 'edit'])->name('admin.staff.edit');
            Route::post('update/', [StaffController::class, 'update'])->name('admin.staff.update');
            Route::get('status/{id}', [StaffController::class, 'status'])->name('admin.staff.status');
            Route::get('delete/staff/{id}', [StaffController::class, 'delete'])->name('admin.staff.delete');
        });

        Route::group(['prefix'=>'librarian'], function(){
            Route::get('/index',[LibrarianController::class,'index'])->name('admin.librarian.index');
            Route::post('/store',[LibrarianController::class,'store'])->name('admin.librarian.store');
            Route::get('/status/{id}',[LibrarianController::class,'status'])->name('admin.librarian.status');
            Route::get('/delete/librarian/{id}',[LibrarianController::class,'delete'])->name('admin.librarian.delete');
        });

        Route::group(['prefix'=>'accountant'], function(){
            Route::get('/index',[AccountantController::class,'index'])->name('admin.accountant.index');
            Route::get('/create',[AccountantController::class,'add'])->name('admin.accountant.create');
            Route::post('/store',[AccountantController::class,'store'])->name('admin.accountant.store');
            Route::get('edit/{id}', [AccountantController::class, 'edit'])->name('admin.accountant.edit');
            Route::post('update/', [AccountantController::class, 'update'])->name('admin.accountant.update');
            Route::get('status/{id}', [AccountantController::class, 'status'])->name('admin.accountant.status');
            Route::get('trash/{id}', [AccountantController::class, 'destroy'])->name('admin.accountant.trash');
        });

        Route::group(['prefix' => 'profile'], function(){
          Route::get('index', [ProfileController::class, 'profile'])->name('profile.index');
        });

        Route::get('change-password', [ProfileController::class, 'changePassword'])->name('change.password');
        Route::post('change-password', [ProfileController::class, 'changePasswordSave'])->name('change.password.save');

        Route::get('application-canidate', [ApplicationCanidateController::class, 'index'])->name('admin.application.canidate');
        Route::get('message', [ContactController::class, 'showMessage'])->name('admin.message');
        Route::get('message/delete/{id}', [ContactController::class, 'delete'])->name('admin.message.delete');

        Route::group(['prefix' => 'student'],function (){
            Route::get('/',[StudentController::class,'index'])->name('admin.student');
            Route::post('/session',[StudentController::class, 'currentSession'])->name('admin.student.session');
            Route::post('/session/class',[StudentController::class, 'currentSessionClass'])->name('admin.student.session-class');
            Route::post('/session/search/classroll',[StudentController::class, 'searchClassRoll'])->name('admin.student.search-class-roll');
            Route::get('/details/{id}',[StudentController::class, 'details'])->name('admin.student.details');
            Route::get('/add',[StudentController::class,'add'])->name('admin.student.add');
            Route::post('/save',[StudentController::class,'save'])->name('admin.student.save');
            Route::get('edit/{id}', [StudentController::class, 'edit'])->name('admin.student.edit');
            Route::post('/update',[StudentController::class,'update'])->name('admin.student.update');
            Route::post('/trade',[StudentController::class,'trade'])->name('admin.student.trade');
            Route::post('/class/group',[StudentController::class,'classGroup'])->name('admin.student.class.group');
            Route::post('/upzilla',[StudentController::class,'upzilla'])->name('admin.student.upzilla');
            Route::post('/union',[StudentController::class,'union'])->name('admin.student.union');
            Route::post('/gupzilla',[StudentController::class,'gupzilla'])->name('admin.student.gupzilla');
            Route::post('/gunion',[StudentController::class,'gunion'])->name('admin.student.gunion');
            Route::post('/idupzilla',[StudentController::class,'idupzilla'])->name('admin.student.idupzilla');
            Route::post('/idunion',[StudentController::class,'idunion'])->name('admin.student.idunion');
            Route::get('/send-pdf/{id}',[StudentController::class, 'sendPDF'])->name('admin.student.sendpdf');
            Route::get('/download/{id}',[StudentController::class, 'download'])->name('admin.student.download');

        });

        Route::group(['prefix' => 'class'],function (){
            Route::get('/',[ClassController::class,'index'])->name('admin.class');
            Route::post('/add',[ClassController::class,'add'])->name('admin.class.add');
            Route::post('/update',[ClassController::class,'update'])->name('admin.class.update');
            Route::get('/delete/{id}',[ClassController::class,'delete'])->name('admin.class.delete');
        });

        Route::group(['prefix'=>'section'], function (){
            Route::get('/index/{id?}',[SectionController::class,'index'])->name('admin.section');
            Route::post('/add',[SectionController::class,'add'])->name('admin.section.add');
            Route::post('/update',[SectionController::class,'update'])->name('admin.section.update');
            Route::get('/delete/section/{id}',[SectionController::class,'delete'])->name('admin.section.delete');
        });

        Route::group(['prefix'=>'session'],function (){
            Route::get('/',[SessionController::class,'index'])->name('admin.session');
            Route::post('/add',[SessionController::class,'add'])->name('admin.session.add');
            Route::post('/update',[SessionController::class,'update'])->name('admin.session.update');
            Route::get('/delete/session/{id}',[SessionController::class,'delete'])->name('admin.session.delete');
        });

        Route::group(['prefix'=>'subject'],function (){
            Route::get('/{id}',[SubjectController::class,'index'])->name('admin.subject');
            Route::post('/store',[SubjectController::class,'store'])->name('admin.subject.store');
            Route::post('/update',[SubjectController::class,'update'])->name('admin.subject.update');
            Route::get('/delete/subject/{id}',[SubjectController::class,'delete'])->name('admin.subject.delete');
        });

        Route::group(['prefix'=>'class-routine'],function (){
            Route::get('/index/{id?}',[ClassRoutineController::class,'index'])->name('admin.classRoutine');
            Route::get('/add',[ClassRoutineController::class,'add'])->name('admin.classRoutine.create');
            Route::post('/group',[ClassRoutineController::class,'group'])->name('admin.classRoutine.group');
            Route::post('/subject',[ClassRoutineController::class,'subject'])->name('admin.classRoutine.subject');
            Route::post('/teacher',[ClassRoutineController::class,'teacher'])->name('admin.classRoutine.teacher');
            Route::post('/store',[ClassRoutineController::class,'save'])->name('admin.classRoutine.save');
            Route::get('/edit/{id}',[ClassRoutineController::class,'edit'])->name('admin.classRoutine.edit');
            Route::post('/update',[ClassRoutineController::class,'update'])->name('admin.classRoutine.update');
            Route::get('/delete/classroutine/{id}',[ClassRoutineController::class,'delete'])->name('admin.classRoutine.delete');
        });

        Route::get('/role', [RoleController::class, 'index'])->name('role.view');
        Route::get('/role/create', [RoleController::class, 'create'])->name('role.create');
        Route::post('/role/store', [RoleController::class, 'store'])->name('role.store');
        Route::get('/role/edit/{id}', [RoleController::class, 'edit'])->name('role.edit');
        Route::post('/role/update', [RoleController::class, 'update'])->name('role.update');
        Route::get('role/delete/{id}',[RoleController::class, 'delete'])->name('role.delete');

        Route::group(['prefix'=>'exam-list'], function(){
            Route::get('/index',[ExamListController::class,'index'])->name('admin.examList.index');
            Route::post('/store',[ExamListController::class,'store'])->name('admin.examList.store');
            Route::post('/update',[ExamListController::class,'update'])->name('admin.examList.update');
            Route::get('/delete/examdelete/{id}',[ExamListController::class,'delete'])->name('admin.examList.delete');
        });
        Route::group(['prefix'=>'exam-grade'], function(){
            Route::get('/index',[ExamGradeController::class,'index'])->name('admin.examGrade.index');
            Route::post('/store',[ExamGradeController::class,'store'])->name('admin.examGrade.store');
            Route::post('/update',[ExamGradeController::class,'update'])->name('admin.examGrade.update');
            Route::get('/delete/gradedelete/{id}',[ExamGradeController::class,'delete'])->name('admin.examGrade.delete');
        });

        Route::group(['prefix'=>'daily-attendance'], function(){
            Route::get('/index',[AttendanceController::class,'index'])->name('admin.dailyAttendance.index');
            Route::post('/class-section',[AttendanceController::class,'classSection'])->name('admin.dailyAttendance.classSection');
            Route::post('/manage-attendance',[AttendanceController::class,'manageAttendance'])->name('admin.dailyAttendance.attendance');
            Route::post('/store',[AttendanceController::class,'store'])->name('admin.dailyAttendance.store');
            // Route::get('/edit/{date}/{rqsession}/{rqclass_name}/{section}/{attendances}', [AttendanceController::class, 'edit'])->name('admin.dailyAttendance.edit');
            Route::post('/update',[AttendanceController::class,'update'])->name('admin.dailyAttendance.update');
        });

        Route::group(['prefix'=>'manage-mark'], function(){
            Route::get('/index',[ManageMarkController::class,'index'])->name('admin.manageMark.index');
            Route::post('/manage-student-mark',[ManageMarkController::class,'manageStudentMark'])->name('admin.manageMark.mark');
            Route::get('/edit',[ManageMarkController::class,'StudentMarkEdit'])->name('admin.manageMark.edit');
            Route::post('/store',[ManageMarkController::class,'StudentMarkStore'])->name('admin.manageMark.store');
            Route::get('/edit-mark',[ManageMarkController::class,'StudentEditMark'])->name('admin.manageMark.getMark');
            Route::post('/update',[ManageMarkController::class,'markUpdate'])->name('admin.manageMark.update');
            Route::get('/result',[ManageMarkController::class,'result'])->name('admin.manageMark.result');
            Route::post('/result',[ManageMarkController::class,'getResult'])->name('admin.manageMark.getResult');
        });



        Route::group(['prefix'=>'book-category'], function(){
            Route::get('/index',[BookCategoryController::class,'index'])->name('admin.bookCategory.index');
            Route::post('/store',[BookCategoryController::class,'store'])->name('admin.bookCategory.store');
            Route::get('/status/{id}',[BookCategoryController::class,'status'])->name('admin.bookCategory.status');
            Route::get('/delete/book-category/{id}',[BookCategoryController::class,'delete'])->name('admin.bookCategory.delete');
        });

        Route::group(['prefix'=>'library'], function(){
            Route::get('/index',[ManageLibraryBookController::class,'index'])->name('admin.library.index');
            Route::post('/store',[ManageLibraryBookController::class,'store'])->name('admin.library.store');
            Route::post('/update',[ManageLibraryBookController::class,'update'])->name('admin.library.update');
            Route::get('/status/{id}',[ManageLibraryBookController::class,'status'])->name('admin.library.status');
            Route::get('/delete/library/{id}',[ManageLibraryBookController::class,'delete'])->name('admin.library.delete');
        });

        Route::group(['prefix'=>'issue-book'], function(){
            Route::get('/index',[BookIssuController::class,'index'])->name('admin.issueBook.index');
            Route::post('/store',[BookIssuController::class,'store'])->name('admin.issueBook.store');
            Route::get('/show/{id}',[BookIssuController::class,'show'])->name('admin.issueBook.show');
            Route::post('/return',[BookIssuController::class,'return'])->name('admin.issueBook.return');
            Route::get('/status/{id}',[BookIssuController::class,'status'])->name('admin.issueBook.status');
            Route::get('/delete/issu-book/{id}',[BookIssuController::class,'delete'])->name('admin.issueBook.delete');
        });

        Route::group(['prefix'=>'sms-email'], function(){
            Route::get('/index',[SendMailController::class,'index'])->name('admin.smsEmail.index');
            Route::post('/store',[SendMailController::class,'store'])->name('admin.smsEmail.store');
            Route::get('/delete/issu-book/{id}',[SendMailController::class,'delete'])->name('admin.smsEmail.delete');
        });

        Route::group(['prefix'=>'sms'], function(){
            Route::get('/',[SendMailController::class,'sms'])->name('admin.mobail.sms');
            Route::post('/send',[SendMailController::class,'send'])->name('admin.sms.send');
            Route::get('/delete/issu-book/{id}',[SendMailController::class,'delete'])->name('admin.sms.delete');
        });

        Route::group(['prefix'=>'transport'], function(){
            Route::get('/index',[TransportController::class,'index'])->name('admin.transport.index');
            Route::post('/store',[TransportController::class,'store'])->name('admin.transport.store');
            Route::post('/update',[TransportController::class,'update'])->name('admin.transport.update');
            Route::get('/delete/transport/{id}',[TransportController::class,'delete'])->name('admin.transport.delete');
        });

        Route::group(['prefix' => 'inventory-category'], function(){
            Route::get('/index', [InventoryCatController::class, 'index'])->name('admin.inventoryCategory.index');
            Route::post('/store', [InventoryCatController::class, 'store'])->name('admin.inventoryCategory.store');
            Route::post('/update', [InventoryCatController::class, 'update'])->name('admin.inventoryCategory.update');
            Route::get('/status/{id}', [InventoryCatController::class, 'status'])->name('admin.inventoryCategory.status');
            Route::get('/delete/inventory-category/{id}',[InventoryCatController::class,'delete'])->name('admin.inventoryCategory.delete');
        });

        Route::group(['prefix' => 'inventory-supplier'], function(){
            Route::get('/index', [SupplierController::class, 'index'])->name('admin.inventorySupplier.index');
            Route::post('/store', [SupplierController::class, 'store'])->name('admin.inventorySupplier.store');
            Route::post('/update', [SupplierController::class, 'update'])->name('admin.inventorySupplier.update');
            Route::get('/status/{id}', [SupplierController::class, 'status'])->name('admin.inventorySupplier.status');
            Route::get('/delete/inventory-supplier/{id}',[SupplierController::class,'delete'])->name('admin.inventorySupplier.delete');
        });

        Route::group(['prefix' => 'inventory'], function(){
            Route::get('/index', [InventoryController::class, 'index'])->name('admin.inventory.index');
            Route::get('/create', [InventoryController::class, 'create'])->name('admin.inventory.create');
            Route::post('/store', [InventoryController::class, 'store'])->name('admin.inventory.store');
            Route::post('/update', [InventoryController::class, 'update'])->name('admin.inventory.update');
            Route::get('/status/{id}', [InventoryController::class, 'status'])->name('admin.inventory.status');
            Route::get('/delete/inventory/{id}',[InventoryController::class,'delete'])->name('admin.inventory.delete');

            Route::get('/identity', [InventoryController::class, 'identity'])->name('admin.inventory.identity');
            Route::post('/identity-product', [InventoryController::class, 'getProduct'])->name('admin.identity.product');
            Route::post('/check-quantity', [InventoryController::class, 'checkQuantity'])->name('admin.check.quantity');
            Route::post('/identity/store', [InventoryController::class, 'identityStore'])->name('admin.identity.store');
            Route::get('/all-identity', [InventoryController::class, 'allidentity'])->name('admin.inventory.allidentity');
            Route::get('/edit-identity/{id}', [InventoryController::class, 'editIdentity'])->name('admin.inventory.editidentity');
            Route::post('/identity/update', [InventoryController::class, 'identityUpdate'])->name('admin.identity.update');
            Route::get('/reject-list', [InventoryController::class, 'rejectList'])->name('admin.inventory.reject');
            Route::post('/lost', [InventoryController::class, 'lostBy'])->name('admin.inventory.lostProduct');
            Route::get('/stock/store', [InventoryController::class, 'stockStore'])->name('admin.stock.store');
            Route::get('/invoice-list', [InventoryController::class, 'invoice'])->name('admin.inventory.invoice');
            Route::post('/payment',[InventoryController::class, 'invoicePayment'])->name('admin.inventory.payment');
            Route::post('/due-payment',[InventoryController::class, 'invoiceDuePayment'])->name('admin.inventory.duePayment');
            Route::get('/invoice/{id}',[InventoryController::class, 'invoicePrint'])->name('admin.inventory.invoice.print');
            Route::get('/report', [InventoryController::class, 'report'])->name('admin.inventory.report');

            // serach identity

            // Route::get('/search', [InventoryController::class, 'search'])->name('admin.inventory.identity.search');


        });

        Route::group(['prefix' => 'accounting'], function(){
            Route::get('/index', [StudentFeeController::class, 'index'])->name('admin.accounting.index');
            Route::post('/student/store', [StudentFeeController::class, 'storeStudentFee'])->name('admin.accountingStudent.store');
            Route::post('/update', [StudentFeeController::class, 'update'])->name('admin.accounting.update');
            Route::get('/status/{id}', [StudentFeeController::class, 'status'])->name('admin.accounting.status');
            Route::get('/delete/inventory-supplier/{id}',[StudentFeeController::class,'delete'])->name('admin.accounting.delete');
            Route::post('/getStudent', [StudentFeeController::class, 'getStudent'])->name('admin.StudentFeeController.getStudent');
            Route::get('/expance',[ExpanceController::class, 'index'])->name('admin.accounting.expanse');
            Route::post('/expance/store', [ExpanceController::class, 'expanceStore'])->name('admin.accounting.expanceStore');
            Route::post('/expance/update', [ExpanceController::class, 'expanceUpdate'])->name('admin.accounting.expanceUpdate');
            Route::get('/delete/expance/{id}',[ExpanceController::class, 'deleteExpance'])->name('admin.accounting.deleteExpance');
            Route::get('/all-expance',[ExpanceController::class, 'allExpance'])->name('admin.accounting.allExpance');
            Route::post('/allexpance/store',[ExpanceController::class, 'allExpanceStore'])->name('admin.accounting.allExpanceStore');
            Route::post('/allexpance/update',[ExpanceController::class, 'allExpanceUpdate'])->name('admin.accounting.allExpanceUpdate');
            Route::get('/manage/accounting', [AccountManageController::class, 'index'])->name('admin.accounting.manageAccounting');
        });


        Route::group(['prefix' => 'emp-salary'], function(){
            Route::get('index', [EmployeeSalaryController::class, 'index'])->name('admin.empsalary.index');
            Route::post('getuser',[EmployeeSalaryController::class, 'getUser'])->name('admin.emsalary.getuser');
            Route::post('store', [EmployeeSalaryController::class, 'store'])->name('admin.empsalry.store');
        });


    });
});


