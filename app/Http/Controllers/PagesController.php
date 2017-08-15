<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Session;
use App\Reservation;

class PagesController extends Controller
{

    public function index()
    {
      $sessions = Session::orderBy('date', 'ASC')->get();
      $reservations = Reservation::orderBy('id', 'ASC')->get();

      return view("home")->with(compact('sessions', 'reservations'));
    }


}
