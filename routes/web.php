<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Feedbackcontroller;
use Illuminate\Support\Facades\Log;
use App\Models\feedback;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InterestController;
use App\Http\Controllers\HollandController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\CourseController;
use App\Models\Course;
use Illuminate\Support\Facades\DB;
use App\Models\Interest;
use App\Models\Subject;
use App\Http\Controllers\UserInterestController;

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

Route::get('/', function () {

    $courses = Course::all();
    $users = User::all();

    $holland = DB::table('hollandcode')
        ->join('course', 'course.id', '=', 'hollandcode.course_id')
        ->select('hollandcode.*')
        ->get();
    $subject = DB::table('subject')
        ->join('course', 'course.id', '=', 'subject.course_id')
        ->select('subject.*')
        ->get();

    $grade = DB::table('grades')
        ->join('subject', 'subject.id', '=', 'grades.subject_id')
        ->select('grades.*')
        ->get();

    $university = DB::table('university')
        ->join('grades', 'grades.id', '=', 'university.grade_id')
        ->select('university.*')
        ->get();

    $interest = DB::table('interest')
        ->join('hollandcode', 'hollandcode.id', '=', 'interest.holland_id')
        ->select('interest.*')
        ->get();

    $data = [
        'courses' => $courses,
        'users' => $users,
        'holland' => $holland,
        'subject' => $subject,
        'grade' => $grade,
        'university' => $university,
        'interest' => $interest
    ];

    Log::info('The dashboard is being viewed');
    return view('welcome', $data);
});

Route::post('feedback', [FeedbackController::class, 'store']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        $courses = Course::all();
        $users = User::all();

        $holland = DB::table('hollandcode')
            ->join('course', 'course.id', '=', 'hollandcode.course_id')
            ->select('hollandcode.*')
            ->get();
        $subject = DB::table('subject')
            ->join('course', 'course.id', '=', 'subject.course_id')
            ->select('subject.*')
            ->get();

        $grade = DB::table('grades')
            ->join('subject', 'subject.id', '=', 'grades.subject_id')
            ->select('grades.*')
            ->get();

        $university = DB::table('university')
            ->join('grades', 'grades.id', '=', 'university.grade_id')
            ->select('university.*')
            ->get();

        $interest = DB::table('interest')
            ->join('hollandcode', 'hollandcode.id', '=', 'interest.holland_id')
            ->select('interest.*')
            ->get();

        $data = [
            'courses' => $courses,
            'users' => $users,
            'holland' => $holland,
            'subject' => $subject,
            'grade' => $grade,
            'university' => $university,
            'interest' => $interest
        ];

        return view('dashboard', $data);
    })->name('dashboard');

    Route::get('user-entry', function () {
        $courses = Course::all();

        $value=1;

        $holland = DB::table('hollandcode')
            ->join('course', 'course.id', '=', 'hollandcode.course_id')
            ->select('hollandcode.*')
            ->get();
        $subject = DB::table('subject')
            ->join('course', 'course.id', '=', 'subject.course_id')
            ->select('subject.*')
            ->get();

        $grade = DB::table('grades')
            ->join('subject', 'subject.id', '=', 'grades.subject_id')
            ->select('grades.*')
            ->get();

        $interest = DB::table('interest')
            ->join('hollandcode', 'hollandcode.id', '=', 'interest.holland_id')
            ->select('interest.*')
            ->get();
        $data = [
            'courses' => $courses,
            'holland' => $holland,
            'subject' => $subject,
            'grade' => $grade,
            'interest' => $interest,
            'value'=>$value
        ];
        Log::info('The users entries are being viewed by the user');
        return view('user-entry', $data);
    })->name('user-entry');

    Route::post('/adduserinterestentry', [UserInterestController::class, 'store']);


    Route::get('admin', function () {
        $feedback = feedback::all();
        $users = User::all();
        $courses = Course::all();

        $data = [

            'users' => $users,
            'courses' => $courses,
            'feedback' => $feedback
        ];
        Log::info('The admin dashboard is being viewed');

        return view('admin.dash', $data);
    });



    Route::get('admin/user-entry', function () {
        Log::info('The users entries are being viewed by the admin');

        return view('admin.user_entry');
    });





    Route::post('/user/search', [UserController::class, 'searchUser'])->name('users-search');
    Route::post('/addhollandname', [HollandController::class, 'store']);
    Route::put('editholland/{id}', [HollandController::class, 'update']);
    Route::post('/holland/delete', [HollandController::class, 'delete']);


    Route::post('/addinterest', [InterestController::class, 'store']);
    Route::put('update-interest/{id}', [InterestController::class, 'update']);

    Route::post('/interest/delete', [InterestController::class, 'delete']);


    Route::get('admin/user', [UserController::class, 'index']);
    Route::post('add-user', [UserController::class, 'store']);
    Route::get('editUser/{id}', [UserController::class, 'edit']);
    Route::put('update-user/{id}', [UserController::class, 'update']);
    Route::get('deleteUser/{id}', [UserController::class, 'destroy']);
    Route::get('deleteFeed/{id}', [FeedbackController::class, 'destroy']);

    Route::get('admin/grades', [GradeController::class, 'index']);
    Route::post('add-grade', [GradeController::class, 'store']);
    Route::put('update-grade/{id}', [GradeController::class, 'update']);
    Route::post('/grade/delete', [GradeController::class, 'delete']);




    Route::post('add-subject', [SubjectController::class, 'store']);
    Route::put('update-subject/{id}', [SubjectController::class, 'update']);
    Route::get('deleteSubject/{id}', [SubjectController::class, 'destroy']);

    Route::post('add-university', [UniversityController::class, 'store']);
    Route::put('update-university/{id}', [UniversityController::class, 'update']);
    Route::post('/university/delete', [UniversityController::class, 'delete']);


    Route::get('admin/course', [CourseController::class, 'index']);
    Route::post('/addcourse', [CourseController::class, 'store']);
    Route::put('editcourse/{id}', [CourseController::class, 'update']);
    Route::post('/course/delete', [CourseController::class, 'delete']);

    Route::get('/usercourse', function () {


        $userinterestentry = DB::table('user_interest_entry')
            ->join('users', 'users.id', '=', 'user_interest_entry.user_id')
            ->select('user_interest_entry.*')
            ->get();

        $course = DB::table('course')
            ->join('user_interest_entry', 'user_interest_entry.course_id', '=', 'course.id')
            ->select('course.*')
            ->get();

        $data = [
            'userinterestentry' => $userinterestentry,
            'course' => $course,
        ];

        return view('course-recommendation', $data);
    });
});
