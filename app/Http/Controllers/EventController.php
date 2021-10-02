<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Joint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['store', 'destroy']);
    }

    public function index()
    {

        return view('event-add', [
            'title' => 'Add new event',
            'url' => route('event')
        ]);
    }

    public function select(Event $event)
    {
        if (Auth()->User() != null) {
            $joint = Joint::where([
                ['email', '=', Auth()->User()->email],
                ['event', '=', $event->id]
            ])->first();

            if ($joint != null && Auth()->User()->id == $event->owner) {
                $joined_people = Joint::where('event', '=', $event->id)->get();

                return view('event', [
                    'event' => $event,
                    'joint' => $joint,
                    'joined_people' => $joined_people
                ]);
            } else {
                return view('event', [
                    'event' => $event,
                    'joint' => $joint
                ]);
            }
        } else {
            return view('event', [
                'event' => $event,
            ]);
        }
    }

    public function edit_get(Event $event)
    {

        return view('event-add', [
            'event' => $event,
            'title' => 'Edit ' . $event->title,
            'url' => route('event.edit', $event)
        ]);
    }

    public function edit_post(Event $event, Request $request)
    {

        if (Auth()->user()->id == $event->owner) {
            if ($request->title != null && $request->title != $event->title) {
                $event->title = $request->title;
            }
            if ($request->starts != null && $request->starts != $event->starts) {
                $event->starts = $request->starts;
            }
            if ($request->description != null && $request->description != $event->description) {
                $event->description = $request->description;
            }
            if ($request->cover != null) {
                Storage::disk('public')->delete($event->cover);
                $path = Storage::disk('public')->put('covers/' . Auth()->User()->id, $request->cover);
                $event->cover = $path;
            }
            $event->save();
            return redirect()->route('dashboard');
        } else {
            return response(403);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'max:255'],
            'description' => ['required', 'max:8124'],
            'cover' => ['required', 'file', 'max:2048'],
            'date' => ['required', 'date']
        ]);

        $path = Storage::disk('public')->put('covers/' . Auth()->User()->id, $request->cover);

        Event::create([
            'title' => $request->title,
            'description' => $request->description,
            'cover' => $path,
            'starts' => $request->date,
            'owner' => Auth()->User()->id
        ]);

        return redirect()->route('dashboard');
    }

    public function destroy(Event $event)
    {
        if (Auth()->user()->id == $event->owner) {
            Storage::disk('public')->delete($event->cover);
            $event->delete();
            return redirect()->route('dashboard');
        } else {
            return response(403);
        }
    }
}
