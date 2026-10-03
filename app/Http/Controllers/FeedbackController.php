<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Session;
use App\Models\User;
use App\Models\Feedback;

class FeedbackController extends BaseController {

    protected function getUserId() {
        return Session::get('user_id');
    }

    protected function getUser() {

        $userId = $this->getUserId();
        $user = User::find($userId);
        return $user;
        
    }

    public function save_feedback($title, $body) {

        $userId = $this->getUserId();
        if(!$userId) {
            return redirect('home');
        }

        $user = $this->getUser();

        $feedback = new Feedback;
        $feedback->title = $title;
        $feedback->body = $body;
        $feedback->user_id = $userId;
        $feedback->username = $user->username;
        $feedback->save();

        return response()->json($feedback);
       
    }

    public function get_feedback() {

        $userId = $this->getUserId();

        if(!$userId) {
            return redirect('home');
        }

        $feedback= Feedback::where('user_id', $userId)->latest('created_at')->first();
        
        return response()->json($feedback);

    }

    public function get_all_feedback() {
    
        $feedbacks = Feedback::latest('created_at')->get();

        return response()->json($feedbacks);
    }

    public function get_all_feedback_user() {

        $userId = $this->getUserId();
        if(!$userId) {
            return redirect('home');
        }
    
        $feedbacks = Feedback::where('user_id', $userId)->get();

        return response()->json($feedbacks);
    }


    public function delete_feedback($id) {
    
        $userId = $this->getUserId();
        if(!$userId) {
            return response()->json('Errore di autenticazione');
        }

        $feedback = Feedback::find($id);
        if ($feedback && $feedback->user_id === $userId) {

            $feedback->delete();
            return response()->json('Eliminazione avvenuta con successo');

        }

        return response()->json('Errore di autenticazione');
    }

}
