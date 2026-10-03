<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Session;
use App\Models\User;

class LoginController extends BaseController {

    protected function getUserId() {
        return Session::get('user_id');
    }

    protected function getUser() {

        $userId = $this->getUserId();
        $user = User::find($userId);
        return $user;
        
    }

    public function is_logged() {
        $userId = $this->getUserId();
        return response()->json($userId);
    }

    public function login_form() {

        $userId = $this->getUserId();
        if($userId) {
            return redirect('home');
        }

        $error = Session::get('error');
        Session::forget('error');
        return view('login')->with('error', $error);
        
    }

    public function do_login() {

        $userId = $this->getUserId();
        if($userId) {
            return redirect('home');
        }

        if(strlen(request('username')) == 0 || strlen(request('password')) == 0) {

            Session::put('error', 'empty_fields');
            return redirect('login')->withInput();
        }

        $user = User::where('username', request('username'))->first();

        if (!$user || !password_verify(request('password'), $user->password)) {

            Session::put('error', 'wrong');
            return redirect('login')->withInput();
        }

        Session::put('user_id', $user->id);
        return redirect('home');
    }

    public function check_username($username) {

        $userId = $this->getUserId();
        if($userId) {
            return redirect('home');
        }
        
        $existing_user = User::where('username', $username)->first();
        $bool_username = false;

        if($existing_user) {
            $bool_username = true;
            return response()->json($bool_username);
        }
        
        return response()->json($bool_username);
    }

    public function check_email($email) {

        $userId = $this->getUserId();

        if($userId) {
            return redirect('home');
        }
        
        $existing_email = User::where('email', $email)->first();
        $bool_email = true;

        if(!$existing_email) {
            $bool_email = false;
            return response()->json($bool_email);
        }
        
        return response()->json($bool_email);
    }

    public function register_form() {
        
        $userId = $this->getUserId();
        if($userId) {
            return redirect('home');
        }

        $error = Session::get('error');
        Session::forget('error');
        return view('register')->with('error', $error);
        
    }

    public function do_register() {

        $userId = $this->getUserId();
        if($userId) {
            return redirect('home');
        }

        if(strlen(request('name')) == 0 || 
            strlen(request('surname')) == 0 ||
            strlen(request('username')) == 0 ||
            strlen(request('email')) == 0 ||
            strlen(request('password')) == 0 ||
            strlen(request('confirm_password')) == 0) {

            Session::put('error', 'empty_fields');
            return redirect('register')->withInput();
        }
        else if (request('password') != request('confirm_password')) {

            Session::put('error', 'bad_password');
            return redirect('register')->withInput();
        }
        else if (User::where('username', request('username'))->first()) {
            Session::put('error', 'username_existing');
            return redirect('register')->withInput();
        }
        else if (User::where('email', request('email'))->first()) {
            Session::put('error', 'email_existing');
            return redirect('register')->withInput();
        }
        else if(!request('allow')) {
            Session::put('error', 'not_allow');
            return redirect('register')->withInput(); 
        }

        $user = new User;
        $user->name = request('name');
        $user->surname = request('surname');
        $user->username = request('username');
        $user->email = request('email');
        $user->password = password_hash(request('password'), PASSWORD_BCRYPT);
        $user->save();

        Session::put('user_id', $user->id);
        return redirect('home');
    }

    public function logout() {

        Session::flush();
        return redirect('home');

    }

    public function delete_user() {

        $userId = $this->getUserId();
        if(!$userId) {
            return redirect('home');
        }

        $user = $this->getUser();
        $user->delete();

        return redirect('logout');
        
    }

}
