<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class HomeController extends Controller {

    protected function getUserId() {
        return Session::get('user_id');
    }

    protected function getUser() {

        $userId = $this->getUserId();
        $user = User::find($userId);
        return $user;
        
    }

    public function home() {

        $user = $this->getUser();

        if($user) {

            return view('home')->with('user', $user)->with('name', $user->name)->with('user_id', $user->id);
        } else {
            return view('home')->with('user', null)->with('user_id', null);
        }
    }

    public function profile() {
        
        $userId = $this->getUserId();

        if(!$userId) {
            return redirect('login');
        }

        return view('profile');
    }

    public function home_en() {

        $user = $this->getUser();

        if($user) {

            return view('home-en')->with('user', $user)->with('name', $user->name)->with('user_id', $user->id);
        } else {
            return view('home-en')->with('user', null)->with('user_id', null);
        }
    }
}
