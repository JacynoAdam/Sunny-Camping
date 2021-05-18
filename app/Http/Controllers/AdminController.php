<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Service;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard', ['page' => 'dashboard']);
    }

    public function clients()
    {
        return view('admin.clients', ['page' => 'clients']);
    }

    public function bills()
    {
        return view('admin.bills', ['page' => 'bills']);
    }

    public function rooms()
    {
        $rooms = Room::where('service_id', '=', Service::SERVICE_GUESTHOUSE)
            ->with('reservations')
            ->get();

        // TODO: Pass rooms to a view
    }

    public function bungalows()
    {
        $bungalows = Room::where('service_id', '=', Service::SERVICE_BUNGALOWS)
            ->with('reservations')
            ->get();

        // TODO: Pass bungalows to a view
    }
}
