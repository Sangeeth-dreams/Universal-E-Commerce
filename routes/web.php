<?php

use Illuminate\Support\Facades\Auth;
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

// Route::get('/storage/admins/{extra}', function ($extra) {return redirect("/buynear/storage/app/public/admins/$extra");})->where('extra', '.*');

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::post('/logout',[App\Http\Controllers\Admin\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//////// Riderecting routes will be define here
Route::get('/admin/admin-users', function () {
    return redirect('/home');
});
Route::get('/admin/users', function () {
    return redirect('/home');
});
Route::get('/admin/forget-passwords', function () {
    return redirect('/home');
});
Route::get('/admin/logged-users', function () {
    return redirect('/home');
});
Route::get('/admin/trainings', function () {
    return redirect('/home');
});
Route::get('/admin/courses', function () {
    return redirect('/home');
});
Route::get('/admin/modules', function () {
    return redirect('/home');
});
Route::get('/admin/classes', function () {
    return redirect('/home');
});
Route::get('/admin/assign-students', function () {
    return redirect('/home');
});
Route::get('/admin/upload-videos', function () {
    return redirect('/home');
});
Route::get('/admin/upload-notes', function () {
    return redirect('/home');
});
Route::get('/admin/upload-new-quiz', function () {
    return redirect('/home');
});
Route::get('/admin/edit-quiz', function () {
    return redirect('/home');
});



Route::prefix('/admin')->name('admin.')->group(function(){
    //All the admin routes will be defined here...

    
        Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
        Route::get('/fetch/admin', [App\Http\Controllers\Admin\AdminUserController::class, 'index']);
        Route::post('/create/admin', [App\Http\Controllers\Admin\AdminUserController::class, 'store']);
        Route::delete('/delete/admin/{id}', [App\Http\Controllers\Admin\AdminUserController::class, 'delete']);
        Route::put('/update/admin', [App\Http\Controllers\Admin\AdminUserController::class, 'update']);
        Route::post('/destroy/admin', [App\Http\Controllers\Admin\AdminUserController::class, 'destroy']);

        Route::get('/fetch/user', [App\Http\Controllers\Admin\UserController::class, 'index']);
        Route::post('/create/user', [App\Http\Controllers\Admin\UserController::class, 'store']);
        Route::put('/update/user', [App\Http\Controllers\Admin\UserController::class, 'update']);
        Route::post('/destroy/user', [App\Http\Controllers\Admin\UserController::class, 'destroy']);

        Route::get('/fetch/forgetpassworduser', [App\Http\Controllers\Admin\ForgetPasswordController::class, 'index']);
        Route::put('/update/forgetpassworduser', [App\Http\Controllers\Admin\ForgetPasswordController::class, 'update']);

        Route::get('/fetch/loggedusers', [App\Http\Controllers\Admin\LoggedUserController::class, 'index']);

        Route::get('/fetch/trainings', [App\Http\Controllers\Admin\TrainingController::class, 'index']);
        Route::post('/create/trainings', [App\Http\Controllers\Admin\TrainingController::class, 'store']);
        Route::put('/update/trainings', [App\Http\Controllers\Admin\TrainingController::class, 'update']);
        Route::post('/destroy/trainings', [App\Http\Controllers\Admin\TrainingController::class, 'destroy']);

        Route::get('/fetch/courses', [App\Http\Controllers\Admin\CourseController::class, 'index']);
        Route::get('/fetch/courses-trainings', [App\Http\Controllers\Admin\CourseController::class, 'fetchTrainings']);
        Route::post('/create/courses', [App\Http\Controllers\Admin\CourseController::class, 'store']);
        Route::put('/update/courses', [App\Http\Controllers\Admin\CourseController::class, 'update']);
        Route::post('/destroy/courses', [App\Http\Controllers\Admin\CourseController::class, 'destroy']);

        Route::get('/fetch/modules', [App\Http\Controllers\Admin\ModuleController::class, 'index']);
        Route::get('/fetch/modules-trainings', [App\Http\Controllers\Admin\ModuleController::class, 'fetchTrainings']);
        Route::post('/fetch/modules-courses', [App\Http\Controllers\Admin\ModuleController::class, 'fetchCourses']);
        Route::post('/create/modules', [App\Http\Controllers\Admin\ModuleController::class, 'store']);
        Route::put('/update/modules', [App\Http\Controllers\Admin\ModuleController::class, 'update']);
        Route::post('/destroy/modules', [App\Http\Controllers\Admin\ModuleController::class, 'destroy']);

        Route::get('/fetch/classes', [App\Http\Controllers\Admin\ClassController::class, 'index']);
        Route::get('/fetch/classes-trainings', [App\Http\Controllers\Admin\ClassController::class, 'fetchTrainings']);
        Route::post('/fetch/classes-courses', [App\Http\Controllers\Admin\ClassController::class, 'fetchCourses']);
        Route::post('/create/classes', [App\Http\Controllers\Admin\ClassController::class, 'store']);
        Route::put('/update/classes', [App\Http\Controllers\Admin\ClassController::class, 'update']);
        Route::post('/destroy/classes', [App\Http\Controllers\Admin\ClassController::class, 'destroy']);

        Route::get('/fetch/assign-students-trainings', [App\Http\Controllers\Admin\AssignStudentController::class, 'fetchTrainings']);
        Route::post('/fetch/assign-students-courses', [App\Http\Controllers\Admin\AssignStudentController::class, 'fetchCourses']);
        Route::post('/fetch/assign-students-classes', [App\Http\Controllers\Admin\AssignStudentController::class, 'fetchClasses']);
        Route::post('/fetch/assign-students-students', [App\Http\Controllers\Admin\AssignStudentController::class, 'fetchStudents']);
        Route::post('/fetch/assign-students-all', [App\Http\Controllers\Admin\AssignStudentController::class, 'fetchAllStudentsToTable']);
        Route::post('/create/assign-student', [App\Http\Controllers\Admin\AssignStudentController::class, 'store']);
        Route::post('/destroy/assign-student', [App\Http\Controllers\Admin\AssignStudentController::class, 'destroy']);

        Route::post('/fetch/upload-videos-courses', [App\Http\Controllers\Admin\UploadVideosController::class, 'fetchCourses']);
        Route::get('/fetch/upload-videos-trainings', [App\Http\Controllers\Admin\UploadVideosController::class, 'fetchTrainings']);
        Route::post('/fetch/upload-videos-modules', [App\Http\Controllers\Admin\UploadVideosController::class, 'fetchModules']);
        Route::post('/fetch/upload-videos-video-order-number', [App\Http\Controllers\Admin\UploadVideosController::class, 'fetchVideoOrderNumber']);
        Route::post('/create/upload-videos', [App\Http\Controllers\Admin\UploadVideosController::class, 'store']);
        Route::post('/fetch/upload-videos-all', [App\Http\Controllers\Admin\UploadVideosController::class, 'fetchAllVideosToTable']);
        Route::put('/update/upload-videos', [App\Http\Controllers\Admin\UploadVideosController::class, 'update']);

        Route::post('/fetch/upload-notes-courses', [App\Http\Controllers\Admin\UploadNotesController::class, 'fetchCourses']);
        Route::get('/fetch/upload-notes-trainings', [App\Http\Controllers\Admin\UploadNotesController::class, 'fetchTrainings']);
        Route::post('/fetch/upload-notes-modules', [App\Http\Controllers\Admin\UploadNotesController::class, 'fetchModules']);
        Route::post('/fetch/upload-notes-note-order-number', [App\Http\Controllers\Admin\UploadNotesController::class, 'fetchNoteOrderNumber']);
        Route::post('/create/upload-notes', [App\Http\Controllers\Admin\UploadNotesController::class, 'store']);
        Route::post('/fetch/upload-notes-all', [App\Http\Controllers\Admin\UploadNotesController::class, 'fetchAllNotesToTable']);
        Route::put('/update/upload-notes', [App\Http\Controllers\Admin\UploadNotesController::class, 'update']);

        Route::get('/fetch/upload-quizes-trainings', [App\Http\Controllers\Admin\UploadQuizesController::class, 'fetchTrainings']);
        Route::post('/fetch/upload-quizes-courses', [App\Http\Controllers\Admin\UploadQuizesController::class, 'fetchCourses']);
        Route::post('/fetch/upload-quizes-modules', [App\Http\Controllers\Admin\UploadQuizesController::class, 'fetchModules']);
        Route::post('/fetch/upload-quizes-videos', [App\Http\Controllers\Admin\UploadQuizesController::class, 'fetchVideos']);
        Route::post('/create/upload-quizes', [App\Http\Controllers\Admin\UploadQuizesController::class, 'store']);

        Route::get('/fetch/edit-quizes-trainings', [App\Http\Controllers\Admin\EditQuizesController::class, 'fetchTrainings']);
        Route::post('/fetch/edit-quizes-courses', [App\Http\Controllers\Admin\EditQuizesController::class, 'fetchCourses']);
        Route::post('/fetch/edit-quizes-modules', [App\Http\Controllers\Admin\EditQuizesController::class, 'fetchModules']);
        Route::post('/fetch/edit-quizes-videos', [App\Http\Controllers\Admin\EditQuizesController::class, 'fetchVideos']);
        Route::post('/fetch/edit-quizes-quizes', [App\Http\Controllers\Admin\EditQuizesController::class, 'fetchQuizes']);
        Route::post('/fetch/edit-quizes-fetchquizquestions', [App\Http\Controllers\Admin\EditQuizesController::class, 'fetchQuizQuestions']);
        Route::post('/fetch/edit-quizes-fetchanswers', [App\Http\Controllers\Admin\EditQuizesController::class, 'fetchAnswers']);
        Route::post('/create/edit-quizes', [App\Http\Controllers\Admin\EditQuizesController::class, 'store']);
        Route::post('/destroy/edit-quizes', [App\Http\Controllers\Admin\EditQuizesController::class, 'deleteQuiz']);


  });



