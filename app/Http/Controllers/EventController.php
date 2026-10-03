<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Session;
use App\Models\User;
use App\Models\Event;

class EventController extends BaseController {

    protected function getUserId() {
        return Session::get('user_id');
    }

    protected function getUser() {

        $userId = $this->getUserId();
        $user = User::find($userId);
        return $user;
        
    }

    public function save_event() {

        $userId = $this->getUserId();
        if (!$userId) return redirect('home');

        $event = new Event;
        $event->image_src = request()->input('img');
        $event->name = request()->input('name');
        $event->user_id = $userId;
        $event->save();

        return response()->json($event);
    }

    public function get_all_event() {

        $userId = $this->getUserId();

        if(!$userId) {
            return redirect('home');
        }
    
        $events = Event::where('user_id', $userId)->get();
        return response()->json($events);
    }


    public function delete_event($id) {
    
        $userId = $this->getUserId();
        if(!$userId) {
            return response()->json('Errore di autenticazione');
        }

        $event = Event::find($id);
        if ($event && $event->user_id === $userId) {

            $event->delete();
            return response()->json('Eliminazione avvenuta con successo');

        }

        return response()->json('Errore di autenticazione');
    }

}
