<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $events = Event::where('owner', Auth()->User()->id)->orderBy('created_at', 'desc')->paginate(10);

        return view('dashboard', [
            'events' => $events
        ]);
    }
}
