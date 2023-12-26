<?php

use App\Http\Controllers\admin\AdminDashController;
use App\Http\Controllers\admin\SubAdminMaganeController;
use App\Http\Controllers\backend\ProfileController as BackendProfileController;
use App\Http\Controllers\counselor\CounselorController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ManageMemberByController;
use App\Http\Controllers\admin\MemberMaganeController;
use App\Http\Controllers\member\MemberManageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\subadmin\ProfileController as SubadminProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Frontend Routes
Route::controller(HomeController::class)->group(function(){
    Route::get('/', 'index')->name('index');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/dashboard', [AdminDashController::class, 'dashboard'])->name('dashboard')->middleware(['auth', 'verified']);
Route::get('/profile', [BackendProfileController::class, 'profile'])->name('profile')->middleware(['auth']);

// admin routes
Route::prefix('admin/')->middleware(['auth','admin'])->group(function (){

    Route::get('manage/sub-admin', [SubAdminMaganeController::class, 'managesubadmin'])->name('subadmin.withtype.manage');
    Route::get('sub-admin/register', [SubAdminMaganeController::class, 'createSubadmin'])->name('subadmin.create');
    Route::post('sub-admin/register/store', [SubAdminMaganeController::class, 'subadminStore'])->name('subadmin.store');
    Route::get('member/active', [MemberMaganeController::class, 'activemember'])->name('activemember.admin');
    Route::get('member/inactive', [MemberMaganeController::class, 'inactivemember'])->name('inactivemember.admin');

});



// Sub admin routes
// Route::prefix('sub-admin/')->middleware(['auth','subadmin','active'])->group(function (){

// });


// senior accountant routes
// Route::prefix('senior-accountant/')->middleware(['auth','seniorAccountant','active'])->group(function (){


// });


// Support Team Leader routes
// Route::prefix('support-team-leader/')->middleware(['auth','supportTeamLeader','active'])->group(function (){


// });


// Controller routes
Route::prefix('controller/')->middleware(['auth','controller','active'])->group(function (){

    Route::get('/inactive-members', [ManageMemberByController::class, 'inactiveMembers'])->name('controller.members');
    Route::post('/members-transfer', [ManageMemberByController::class, 'transferMember'])->name('member.transfer');

});


// counsellor routes
Route::prefix('counselor/')->middleware(['auth','counselor','active'])->group(function (){

    Route::get('/my-leads', [CounselorController::class, 'myleads'])->name('counselor.leads');
    Route::get('message-done', [CounselorController::class, 'messageDone'])->name('counselor.message-done');
    Route::get('/send-whatsapp/{number}/{applicant_id}', [CounselorController::class, 'sendWhatsAppMessage'])->name('send-whatsapp');
    Route::get('working-zone', [CounselorController::class, 'workingZone'])->name('counselor.working-zone');
    Route::get('/wrong-whatsapp/{stid}', [CounselorController::class, 'wrongWhatsappupdate'])->name('counselor.wrong-whatsapp');
    Route::get('/wp-message-done/{id}', [CounselorController::class, 'wpmessageDone'])->name('counselor.wp-ms-done');
    Route::get('/wrong-wp-list', [CounselorController::class, 'wrongWhatsappList'])->name('counselor.wrong_wp_list');
    Route::get('/right-wp/{stid}', [CounselorController::class, 'RightWPUpdate'])->name('counselor.right-wp-update');
    Route::post('/message-done/response', [CounselorController::class, 'responseUpdate'])->name('counselor.responseupdate-msdone');
    Route::post('/getUserData/{id}', [CounselorController::class, 'getUserData'])->name('get.user.data');
    Route::get('/re-schedule/{userId}', [CounselorController::class, 'reschedule']);
    Route::post('/schedule-save', [CounselorController::class, 'scheduleSave'])->name('schedule-save');
    Route::get('/reschedule-details/{studentId}', [CounselorController::class, 'showRescheduleDetails'])->name('counselor.reschedule-details');

});



// Students routes
Route::prefix('student/')->middleware(['auth','active'])->group(function (){

    Route::get('sponsor-list', [MemberManageController::class, 'sponsorList'])->name('student.sponsor-list');

});


// Guest register
Route::get('/dashboard/test', [AdminDashController::class, 'dashboardTest']);
