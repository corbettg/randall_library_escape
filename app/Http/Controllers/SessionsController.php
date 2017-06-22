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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sessions = Session::orderBy('date', 'ASC')->get();
        $reservations = Reservation::orderBy('id', 'ASC')->get();

        return view("sessions.index")->with(compact('sessions', 'reservations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $newSession->reservations = $reservations;

        $newSession->save();

        $message = 'success';
        $sessions = Session::orderBy('date', 'ASC')->get();
        $reservations = Reservation::orderBy('id', 'ASC')->get();

        return view("sessions.index")->with(compact('sessions', 'reservations', 'message'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
