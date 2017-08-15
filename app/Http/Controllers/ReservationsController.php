<?php

namespace App\Http\Controllers;

use Validator;
use Mail;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Reservation;
use App\Session;
use App\Appointment;


use App\Mail\ConfirmationEmail;

class ReservationsController extends Controller
{

    public function create(Request $request)
    {

        //Validate Data passed
         $validator = Validator::make($request->all(), [
            'name' => 'required',
            'user' => 'required|unique:reservations',
            'phoneNumber' => 'regex:/[0-9]{10}/'
        ]);

        if ($validator->fails()) {
            $anchor = 'reserve';
            $sessions = Session::orderBy('date', 'ASC')->get();
            $reservations = Reservation::orderBy('id', 'ASC')->get();
            return view("home")->withErrors($validator)->with(compact('sessions', 'reservations', 'anchor'));
        }

        $session = Session::find($request->session_id);
        $session->addReservation($request->name, $request->user, $request->phoneNumber);

        $new_reservation = Reservation::where('user', $request->user)->get();

        // \Mail::to($email)->send(new ConfirmationEmail);
        // Mail::send('emails.confirmation', ['new_reservation' => $new_reservation], function ($message) use ($new_reservation) {
        //     $message->from('libref@uncw.edu', 'Randall Library Escape Room');
        //
        //     $user_email = $new_reservation[0]['user'] . "@uncw.edu";
        //
        //     $message->to($user_email);
        // });

        if($request->phoneNumber) {
            $newAppointmentReminder = new Appointment;
            $newAppointmentReminder->name = $request->name;
            $newAppointmentReminder->phoneNumber = $request->phoneNumber;
            $newAppointmentReminder->when = $request->when;
            $newAppointmentReminder->timezoneOffset = $request->timezoneOffset;
            $notificationTime = Carbon::parse($request->input('when'))->subMinutes($request->delta);
            $newAppointmentReminder->notificationTime = $notificationTime;

            $newAppointmentReminder->save();
        }

        $anchor = 'reserve';
        $message = 'success';
        $sessions = Session::orderBy('date', 'ASC')->get();
        $reservations = Reservation::orderBy('id', 'ASC')->get();
        return view("home")->with(compact('sessions', 'reservations', 'message', 'anchor'));
    }

}
