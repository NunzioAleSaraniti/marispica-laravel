<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\EventController;

Route::get('', [HomeController::class, 'home']);
Route::get('home', [HomeController::class, 'home']);
Route::get('home/en', [HomeController::class, 'home_en']);

Route::get('logout', [LoginController::class, 'logout']);

Route::get('login', [LoginController::class, 'login_form']);
Route::post('login', [LoginController::class, 'do_login']);
Route::get('is_logged', [LoginController::class, 'is_logged']);

Route::get('register', [LoginController::class, 'register_form']);
Route::post('register', [LoginController::class, 'do_register']);

Route::post('user/delete', [LoginController::class, 'delete_user']);

Route::get('user/modify/data', [ProfileController::class, 'profile_info_user']);
Route::post('user/modify/data', [ProfileController::class, 'modify_data']);

Route::get('check/username/{username}', [LoginController::class, 'check_username']);
Route::get('check/email/{email}', [LoginController::class, 'check_email']);

Route::get('booking', [BookingController::class, 'booking_form']);
Route::post('booking', [BookingController::class, 'do_booking']);
Route::get('booking/get/all', [BookingController::class, 'get_all_bookings']);
Route::post('booking/delete/{id}', [BookingController::class, 'delete_booking']);

Route::post('like/fav/{room}', [LikeController::class, 'toggle_like']);
Route::get('like/room', [LikeController::class, 'get_room_fav']);
Route::get('like/image/{room}', [LikeController::class, 'get_image']);

Route::post('event/save', [EventController::class, 'save_event']);
Route::get('event/get/all', [EventController::class, 'get_all_event']);
Route::post('event/delete/{id}', [EventController::class, 'delete_event']);


Route::get('profile', [ProfileController::class, 'profile']);
Route::get('info', [ProfileController::class, 'info_user']);

Route::post('feedback/send/{title}/{body}', [FeedbackController::class, 'save_feedback']);
Route::get('feedback/get', [FeedbackController::class, 'get_feedback']);
Route::get('feedback/get/user', [FeedbackController::class, 'get_all_feedback_user']);
Route::get('feedback/get/all', [FeedbackController::class, 'get_all_feedback']);
Route::post('feedback/delete/{id}', [FeedbackController::class, 'delete_feedback']);
