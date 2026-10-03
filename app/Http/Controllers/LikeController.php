<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Session;
use App\Models\User;
use App\Models\Like;
use App\Models\Image;

class LikeController extends BaseController {

    protected function getUserId() {
        return Session::get('user_id');
    }

    protected function getUser() {

        $userId = $this->getUserId();
        $user = User::find($userId);
        return $user;
        
    }

    public function toggle_like($room) {

        $userId = $this->getUserId();
        if(!$userId) {
            return redirect('home');
        }

        $existingLike = Like::where('user_id', $userId)->first();
        $noFav = 'noFav';

        if ($existingLike) {

            if($room === $noFav) {

                $existingLike->delete();
                return response()->json($noFav);
            }

            $existingLike->delete();
            $existingLike->user_id = $userId;
            $existingLike->room = $room;
            $existingLike->save();
            return response()->json($existingLike);
            
        } else {

            $like = new Like;
            $like->user_id = $userId;
            $like->room = $room;
            $like->save();
            return response()->json($like);
        
        }
       
    }

    public function get_image($room) {
   
        $userId = $this->getUserId();
        if (!$userId) {
            return response()->json('Utente non autenticato');
        }

        $image = Image::where('description', $room)->first();
        

        if (!$image) {
            return response()->json('error');
        }

        return response()->json($image);
    }

    public function get_room_fav() {

        $userId = $this->getUserId();
        if (!$userId) {
            return response()->json('Utente non autenticato');
        }

        $like = Like::where('user_id', $userId)->first();

        if(!$like) {
            $noFav = 'noFav';
            return response()->json($noFav);
        }

        return response()->json($like);
    }

}
