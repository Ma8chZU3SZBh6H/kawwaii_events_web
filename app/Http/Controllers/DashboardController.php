<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Joint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($sort = 'starts')
    {
        $events = Event::where('owner', Auth()->User()->id)->orderBy($sort, 'asc')->paginate(10);

        return view('dashboard', [
            'events' => $events,
            'sort' => $sort
        ]);
    }

    public function select($sort = 'starts')
    {
        $joins = Joint::where('email', '=', Auth()->user()->email)->get();

        $events = [];
        foreach ($joins as $joint) {

            $event = Event::find($joint->event);

            array_push($events, $event);
        }
        // dd($events);
        if ($sort == 'starts') {
            usort($events, function ($a, $b) {
                return strtotime($a->starts) - strtotime($b->starts);
            });
        } else {
            usort($events, function ($a, $b) {
                return $a->title < $b->title ? -1 : 1;
            });
        }
        //dd($events);


        return view('dashboard', [
            'events' => $events,
            'no_pages' => true,
            'sort' => $sort
        ]);
    }
}
