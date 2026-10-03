<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Session;
use App\Models\User;
use App\Models\Booking;

class BookingController extends BaseController {

    protected function getUserId() {
        return Session::get('user_id');
    }

    protected function getUser() {

        $userId = $this->getUserId();
        $user = User::find($userId);
        return $user;
        
    }
    
    public function booking_form() {

        $error = Session::get('error');
        Session::forget('error');

        $userId = $this->getUserId();
        if(!$userId) {
            return redirect('login');
        }

        $user = $this->getUser();
        return view('booking')->with('error', $error)->with('user', $user)->with('name', $user->name);
        
    }

    public function do_booking() {

        $userId = $this->getUserId();
        if(!$userId) {
            return [];
        }

        if(strlen(request('name')) == 0 || 
            strlen(request('surname')) == 0 ||
            strlen(request('telephone')) == 0 ||
            strlen(request('email')) == 0 ||
            strlen(request('members')) == 0 ||
            strlen(request('animals')) == 0 ||
            strlen(request('check_in')) == 0 ||
            strlen(request('check_out')) == 0 ||
            strlen(request('room')) == 0)
            {

            Session::put('error', 'empty_fields');
            return redirect('booking')->withInput();
        }

        $checkIn = request('check_in');
        $checkOut = request('check_out');

        if($checkIn >= $checkOut) {

            Session::put('error', 'date_error');
            return redirect('booking')->withInput();
        }

        $members = request('members');

        if ($members <= 0 || $members > 6) {
            Session::put('error', 'members_error');
            return redirect('booking')->withInput();
        }

        $animals = request('animals');

        if ($animals !== 'Si' && $animals !== 'No') {
            Session::put('error', 'animals');
            return redirect('booking')->withInput();
        }
        
        $camera = request('room');
        $rooms = ['Suite', 'Superior', 'Classica', 'Cottage', 'Cottage Deluxe'];

        if (!in_array($camera, $rooms)) {
            Session::put('error', 'invalid_room');
            return redirect('booking')->withInput();
        }

        if (!request('allow')) {
            Session::put('error', 'not_allow');
            return redirect('booking')->withInput();
        }

        $booking = new Booking;
        $booking->user_id = $this->getUserId();
        $booking->name = request('name');
        $booking->surname = request('surname');
        $booking->telephone = request('telephone');
        $booking->email = request('email');
        $booking->members = request('members');
        $booking->animals = request('animals');
        $booking->room = request('room');
        $booking->check_in = request('check_in');
        $booking->check_out = request('check_out');
        $booking->message = request('message');
        $booking->save();
        $user = $this->getUser();
    
        return redirect('profile')->with('name', $user->name)->with('user', $user);
    }

    public function get_all_bookings() {
    
        $userId = $this->getUserId();
        if(!$userId) {
            return response()->json('Errore di autenticazione');
        }

        $bookings = Booking::where('user_id', $userId)->latest('created_at')->get();

        return response()->json($bookings);
    }

    public function delete_booking($id) {
    
        $userId = $this->getUserId();
        if(!$userId) {
            return response()->json('Errore di autenticazione');
        }

        $booking = Booking::find($id);
        
        if ($booking && $booking->user_id === $userId) {

            $booking->delete();
            return response()->json('Eliminazione avvenuta con successo');

        } else if (!$booking) {
            return response()->json('Booking non trovato');
        } else if($booking->user_id !== $userId) {
            return response()->json($userId);
        }

        return response()->json('Errore sulla prenotazione');
    }

}
