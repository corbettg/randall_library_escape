<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendReminders extends Command
{

    protected $signature = 'reminders:send';

    protected $description = 'Send reminders using Twilio';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $appointmentReminder = new \App\AppointmentReminders\AppointmentReminder();
        $appointmentReminder->sendReminders();
    }
}
