<?php

namespace App\Http\Controllers;

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

    public function rooms($current = 0)
    {
        $rooms = collect(['101', '102', '103', '104', '105']);

        return view('admin.rooms', [
            'rooms' => $rooms->toJson(),
            'current' => $current
        ]);
    }
}
