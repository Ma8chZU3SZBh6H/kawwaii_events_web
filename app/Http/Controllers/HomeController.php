<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index($sort = 'starts')
    {
        $events = Event::orderBy($sort, 'asc')->paginate(10);
        return view('home', [
            'events' => $events,
            'sort' => $sort
        ]);
    }
}
