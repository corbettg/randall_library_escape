<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DateTime;
use App\Session;
use App\Reservation;

class SessionsController extends Controller
{
    //Using Middleware to make sure that only staff members are able to access the session page.
    public function __construct() {
      $this->middleware('randallStaffAuth', ['only' => ['index', 'create', 'update']]);
    }

    public function index()
    {
        $sessions = Session::orderBy('date', 'ASC')->get();
        $reservations = Reservation::orderBy('id', 'ASC')->get();

        return view("sessions.index")->with(compact('sessions', 'reservations'));
    }


    public function create(Request $request)
    {
        $date = new DateTime($request->date);
        $date = date_format($date, 'Y-m-d G:i:s');
        $reservations = 0;

        //Validate Data passed
         $validator = Validator::make($request->all(), [
            'date' => 'required|unique:sessions|date',
        ]);

        if ($validator->fails()) {
            $sessions = Session::orderBy('date', 'ASC')->get();
            $reservations = Reservation::orderBy('id', 'ASC')->get();
            return view("sessions.index")->withErrors($validator)->with(compact('sessions', 'reservations'));
        }

        $newSession = new Session;
        $newSession->date = $date;
        $newSession->num_of_reservations = $reservations;

        $newSession->save();

        $message = 'success';
        $sessions = Session::orderBy('date', 'ASC')->get();
        $reservations = Reservation::orderBy('id', 'ASC')->get();

        return view("sessions.index")->with(compact('sessions', 'reservations', 'message'));
    }

    public function update(Request $request)
    {

        //Validate Data passed
         $validator = Validator::make($request->all(), [
            'teamName' => 'unique:sessions|min:3',
            'completionTime' => 'date_format:i:s|min:3',
        ]);

        if ($validator->fails()) {
            $sessions = Session::orderBy('date', 'ASC')->get();
            $reservations = Reservation::orderBy('id', 'ASC')->get();
            return view("sessions.index")->withErrors($validator)->with(compact('sessions', 'reservations'));
        }

        $sessionToUpdate = Session::find($request->sessionID);
        if($request->teamName) $sessionToUpdate->teamName = $request->teamName;
        if($request->completionTime) $sessionToUpdate->completionTime = $request->completionTime;
        $sessionToUpdate->save();

        $message = 'success';
        $sessions = Session::orderBy('date', 'ASC')->get();
        $reservations = Reservation::orderBy('id', 'ASC')->get();

        return redirect()->action('SessionsController@index');
    }

}
