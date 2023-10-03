<?php

namespace App\Http\Controllers;

use App\Models\Guest;

class GuestController extends Controller
{
    public function show(Guest $guest)
    {

        return view('invite.show')->with(['event' => $guest->event]);
    }

    public function accept(Guest $guest)
    {
        $guest->update(['status' => 'accepted']);

        return view('invite.accepted')->with(['guest' => $guest]);
    }

    public function decline(Guest $guest)
    {
        $guest->update(['status' => 'declined']);

        return view('invite.declined')->with(['guest' => $guest]);
    }
}
