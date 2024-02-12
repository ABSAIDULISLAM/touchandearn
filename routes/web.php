<?php

use App\Http\Controllers\admin\AdminDashController;
use App\Http\Controllers\admin\SubAdminMaganeController;
use App\Http\Controllers\backend\ProfileController as BackendProfileController;
use App\Http\Controllers\counselor\CounselorController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ManageMemberByController;
use App\Http\Controllers\admin\MemberMaganeController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\member\MemberManageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\sa\TlmapingController;
use App\Http\Controllers\subadmin\ProfileController as SubadminProfileController;
use App\Http\Controllers\teamleader\teamleaderController;
use App\Http\Controllers\WithdrawController;
use App\Models\MemberManagement;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

// Frontend Routes
Route::get('/', [GuestController::class, 'index'])->name('index');


// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
// Auth::routes(['verify' => true]);

Route::middleware(['auth','active'])->group(function(){

    Route::get('/dashboard', [AdminDashController::class, 'dashboard'])->name('dashboard');

    Route::get('/profile', [BackendProfileController::class, 'profile'])->name('profile');
    Route::post('/profile/update/', [BackendProfileController::class, 'updateProfile'])->name('profile.update');

    Route::get('/withdraw/history', [WithdrawController::class, 'withdrawHistory'])->name('withdraw.history');
    Route::get('/withdraw/request', [WithdrawController::class, 'withdrawRequest'])->name('withdraw-request');
    Route::post('/withdraw-request-send', [WithdrawController::class, 'withdrawRequestSend'])->name('withdraw-request.send');

    Route::get('student/manage-activation-to-student', [SubAdminMaganeController::class, 'ManageActivationPoint'])->name('subadmin.manage-activation-points');
    Route::get('student/send-activation-to-student', [SubAdminMaganeController::class, 'SendActivationPoint'])->name('subadmin.send-activation-points');
    Route::post('student/student-id-check', [AjaxController::class, 'StudentIdCheck'])->name('admin.student-id.check');
    Route::post('student/activation-point-send-to-student', [SubAdminMaganeController::class, 'ActivationPointSend'])->name('subadmin.send-activation-point');

});

// admin routes
Route::prefix('admin/')->middleware(['auth','admin','active'])->group(function (){

    Route::post('/profile/update', [BackendProfileController::class, 'adminupdateProfile'])->name('admin.profile.update');
    Route::get('manage/sub-admin/controller/senior-accountant', [SubAdminMaganeController::class, 'controllerandseniorAccountant'])->name('controller-seniorAccountant');
    Route::get('manage/sub-admin/team-leader', [SubAdminMaganeController::class, 'teamLeader'])->name('team-leader');
    Route::get('manage/sub-admin/counselor', [SubAdminMaganeController::class, 'counselor'])->name('counselor');
    Route::get('sub-admin/register', [SubAdminMaganeController::class, 'createSubadmin'])->name('subadmin.create');
    Route::post('sub-admin/register/store', [SubAdminMaganeController::class, 'subadminStore'])->name('subadmin.store');

    Route::get('sub-admin/manage/activation-points/', [SubAdminMaganeController::class, 'manageActivationPointToSubadmin'])->name('admin.manage-activation-points-to-subadmin');
    Route::get('sub-admin/send-activation-points/', [SubAdminMaganeController::class, 'SendActivationPointToSubadmin'])->name('admin.send-activation-points-to-subadmin');
    Route::POST('sub-admin-id-check', [AjaxController::class, 'SubadmintIdCheck'])->name('admin.subadmin-id.check');
    Route::post('sub-admin/activation-point-send', [SubAdminMaganeController::class, 'ActivationPointSendToSubadmin'])->name('admin.send-activation-point-to-subamdin');

    Route::get('member/active', [MemberMaganeController::class, 'activemember'])->name('activemember.admin');
    Route::get('member/inactive', [MemberMaganeController::class, 'inactivemember'])->name('inactivemember.admin');

    Route::prefix('withdreaw')->group(function(){

        Route::get('member/request', [MemberMaganeController::class, 'WithdrawRequestMember'])->name('admin.withraw-request-member');
        Route::get('member/request/status-change/{wId}/{id}', [MemberMaganeController::class, 'SubadminWithdwalStatusUnpaidToPaiForMember'])->name('admin.withdwal.status.paidtoMember');

        Route::get('sub-admin/request', [MemberMaganeController::class, 'WithdrawRequestSubadmin'])->name('admin.subadmin.withraw-request');
        Route::get('sub-admin/request/status-change/{wId}/{id}', [MemberMaganeController::class, 'SubadminWithdwalStatusUnpaidToPai'])->name('admin.withdwal.status.paid');

        Route::get('admin/income', [AdminDashController::class, 'AdminWithdrawalIncome'])->name('admin.withwal.income');

        Route::get('paid-list', [MemberMaganeController::class, 'WithdrawPaidList'])->name('admin.withraw.paid-list');


        Route::get('reference', [MemberMaganeController::class, 'Reference'])->name('admin.reference');

    });


    Route::get('all-accounts', [AdminDashController::class, 'AllAccounts'])->name('admin.all.accounts');
    Route::get('account/update/{id}/{name}', [AdminDashController::class, 'accountupdateForm'])->name('account.update.form');
    Route::post('account/update/', [AdminDashController::class, 'accountupdate'])->name('account.update-bafw');


    Route::prefix('sub-admin/')->group(function(){
        Route::get('manage', [SubAdminMaganeController::class, 'ManageSubadmin'])->name('subadmin.manage');
        Route::get('edit/{id}/{name}', [SubAdminMaganeController::class, 'SubadminEdit'])->name('admin.edit.subadmin');
        Route::post('update', [SubAdminMaganeController::class, 'SubadminUpdate'])->name('admin.update.subadmin');
        Route::get('delete/{id}', [SubAdminMaganeController::class, 'SubadminDelete'])->name('admin.delete.subadmin');
    });

    Route::prefix('member/')->group(function(){
        Route::get('manage', [MemberMaganeController::class, 'ManageMember'])->name('member.manage');
        Route::get('edit/{id}/{name}', [MemberMaganeController::class, 'MemberEdit'])->name('admin.edit.member');
        Route::post('update', [MemberMaganeController::class, 'MemberUpdate'])->name('admin.update.member');
        Route::get('delete/{id}', [MemberMaganeController::class, 'MemberDelete'])->name('admin.delete.member');
        Route::get('trashed', [MemberMaganeController::class, 'MemberTrashed'])->name('member.trashed');
        Route::get('restor/{id}/{name}', [MemberMaganeController::class, 'MemberRestor'])->name('admin.restor.member');

    });

    Route::get('reference', [AdminDashController::class, 'Reference'])->name('admin.reference');
    Route::post('reference/check', [AdminDashController::class, 'ReferencecheckBYDate'])->name('admin.reference.check');


});


// senior accountant routes
Route::prefix('senior-accountant/')->middleware(['auth','seniorAccountant','active'])->group(function (){
    Route::get('tl-maping', [TlmapingController::class, 'index'])->name('sa.tl-maping');
    Route::post('tl-maping/transfer', [TlmapingController::class, 'transferMemberToTeamleader'])->name('sa.transfer');
    Route::get('all-active-student', [TlmapingController::class, 'AllActiveStudent'])->name('sa.all-active-student');

    Route::get('all-deactive-student', [TlmapingController::class, 'AllDeactiveStudent'])->name('sa.all-deactive-student');
    Route::get('student/activate/{stId}/{name}', [TlmapingController::class, 'ActivateStudentFromInactive'])->name('sa.student.activate');

    Route::get('reference', [TlmapingController::class, 'Reference'])->name('sa.reference');
    Route::post('reference/check', [TlmapingController::class, 'ReferencecheckBYDate'])->name('sa.reference-check');



});


// teamleader routes
Route::prefix('team-leader/')->middleware(['auth','teamleader','active'])->group(function (){
    Route::get('member/', [teamleaderController::class, 'members'])->name('teamleader.members');
    Route::get('member/tl-wp-undone', [teamleaderController::class, 'TlwpUndonemembers'])->name('teamleader.tl-wp-undone');
    Route::get('member/tl-wp-done/{number}/{applicant_id}', [teamleaderController::class, 'Tlwpdonemembers'])->name('tl-wp-done');

    Route::get('member/tl-wp-done/{number}/{applicant_id}/{name}', [teamleaderController::class, 'Tlwpdonemembers'])->name('tl-wp-done');

    Route::get('member/reference', [teamleaderController::class, 'Reference'])->name('teamleader.reference');
    Route::post('member/reference/check', [teamleaderController::class, 'ReferencecheckBYDate'])->name('tl.reference-check');


});





// Support Team Leader routes
// Route::prefix('support-team-leader/')->middleware(['auth','supportTeamLeader','active'])->group(function (){


// });


// Controller routes
Route::prefix('controller/')->middleware(['auth','controller','active'])->group(function (){

    Route::get('/inactive-members', [ManageMemberByController::class, 'inactiveMembers'])->name('controller.members');
    Route::post('/members-transfer', [ManageMemberByController::class, 'transferMember'])->name('member.transfer');
    Route::get('/all/leads', [ManageMemberByController::class, 'AllInactiveLeads'])->name('controller.all.students');

});

// counsellor routes
Route::prefix('counselor/')->middleware(['auth','counselor','active'])->group(function (){

    Route::get('my-leads/', [CounselorController::class, 'myleads'])->name('counselor.leads');

    Route::get('message-done', [CounselorController::class, 'messageDone'])->name('counselor.message-done');
    Route::post('message-done/student/search', [CounselorController::class, 'msdonestudentSearch'])->name('counselor.student.search');

    Route::get('send-whatsapp/{number}/{applicant_id}', [CounselorController::class, 'sendWhatsAppMessage'])->name('send-whatsapp');
    Route::get('working-zone', [CounselorController::class, 'workingZone'])->name('counselor.working-zone');
    Route::get('wrong-whatsapp/{stid}', [CounselorController::class, 'wrongWhatsappupdate'])->name('counselor.wrong-whatsapp');
    Route::get('wp-message-done/{id}', [CounselorController::class, 'wpmessageDone'])->name('counselor.wp-ms-done');
    Route::get('wrong-wp-list', [CounselorController::class, 'wrongWhatsappList'])->name('counselor.wrong_wp_list');

    Route::get('right-wp/{stid}', [CounselorController::class, 'RightWPUpdate'])->name('counselor.right-wp-update');
    Route::post('message-done/response', [CounselorController::class, 'responseUpdate'])->name('counselor.responseupdate-msdone');

    Route::post('getUserData/{id}', [CounselorController::class, 'getUserData'])->name('get.user.data');

    Route::get('re-schedule/{userId}', [CounselorController::class, 'reschedule'])->name('counselor.re-schedule');
    Route::post('schedule-save', [CounselorController::class, 'scheduleSave'])->name('schedule-save');
    Route::get('reschedule-details/{studentId}', [CounselorController::class, 'showRescheduleDetails'])->name('counselor.reschedule-details');

    Route::get('student-search', [CounselorController::class, 'CounselorStudentSearch'])->name('counselor.all-student.search');
    Route::post('student-search', [CounselorController::class, 'studentSearch'])->name('student-search');


    Route::get('reference', [CounselorController::class, 'Reference'])->name('counselor.reference');
    Route::post('reference/check', [CounselorController::class, 'ReferencecheckBYDate'])->name('counselor.reference-check');


});


// Students routes
Route::prefix('student/')->middleware(['auth','active'])->group(function (){

    Route::get('sponsor-list', [MemberManageController::class, 'sponsorList'])->name('student.sponsor-list');
    Route::get('sponsor-edit/{stid}/{name}', [MemberManageController::class, 'sponsorEdit'])->name('sponsor.edit');
    Route::post('sponsor-update', [MemberManageController::class, 'sponsorupdate'])->name('sponsor.studnet.update');
    Route::get('income/history', [MemberManageController::class, 'StudnentIncomeHistory'])->name('student.income.history');
});


// Guest register
Route::get('/test', [AdminDashController::class, 'dashboardTest']);
