<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use App\Models\User;


class ProfileController extends Controller {

    protected function getUserId() {
        return Session::get('user_id');
    }

    protected function getUser() {

        $userId = $this->getUserId();
        $user = User::find($userId);
        return $user;
        
    }

    public function profile() {
        
        $error = null;

        $userId = $this->getUserId();

        if(!$userId) {
            return redirect('login');
        }

        $user = $this->getUser();
        return view('profile')->with('user', $user)->with('name', $user->name)->with('error', $error);
    }

    public function profile_info_user() {
        
        $userId = $this->getUserId();
        if(!$userId) {
            return redirect('login');
        }

        $error = null;

        $user = $this->getUser();
        return redirect('profile#info_section')->with('user', $user)->with('name', $user->name)->with('error', $error);
    }

    public function info_user() {
        
        $userId = $this->getUserId();

        if(!$userId) {
            return redirect('login');
        }

        $user = $this->getUser();
        return response()->json($user);
    }

    public function modify_data() {
        
        $userId = $this->getUserId();
        if(!$userId) {

            return redirect('login');
        }

        $user = $this->getUser();

        $error = Session::get('error');
        Session::forget('error');
        
        $oldUser = User::where('id', $userId)->first();

        $nameInput = request('name');
        $surnameInput = request('surname');

        if(strlen(request('name')) == 0 || 
            strlen(request('surname')) == 0) {
            
            Session::put('error', 'empty_fields');
            return redirect('user/modify/data')->withInput();


        } else if($oldUser->name === $nameInput && $oldUser->surname === $surnameInput) {

            Session::put('error', 'same_data');
            return redirect('user/modify/data')->withInput();

        } else {

            $oldUser->name = request('name');
            $oldUser->surname = request('surname');
            $oldUser->save();
        return redirect('user/modify/data#info_section')->with('user', $user)->with('name', $user->name)->with('error', $error);
            
        }
    }
}
