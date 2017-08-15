<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    public $timestamps = false;

    public function reservations() {

        return $this->hasMany('App\Reservation');

    }

    public function addReservation($name, $user, $phoneNumber) {

        $this->reservations()->create(compact('name', 'user', 'phoneNumber'));

        $this->num_of_reservations = $this->num_of_reservations + 1;
        $this->save();
    }
}
