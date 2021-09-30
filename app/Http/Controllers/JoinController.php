<?php

namespace App\Http\Controllers;

use App\Mail\JoinEmail;
use App\Models\Event;
use App\Models\Joint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;

class JoinController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('join_auth_store');
    }

    public function join_guest_store($data)
    {
        $decoded_data = json_decode(base64_decode(Crypt::decryptString($data)));

        $joint = Joint::where([
            ['email', '=', $decoded_data->email],
            ['event', '=', $decoded_data->id]
        ])->first();

        if ($joint != null) {
            return view('message', [
                'title' => 'Invitation was already accepted! ',
                'message' => ''
            ]);
        } else {
            $event = Event::where('id', '=', $decoded_data->id)->first();
            Joint::create([
                'email' => $decoded_data->email,
                'event' => $event->id
            ]);
            return view('message', [
                'title' => 'Invitation accepted! ',
                'message' => 'Event ' . $event->title . ' starts ' . $event->starts
            ]);
        }
    }

    public function join_guest_send(Request $request, Event $event)
    {
        $request->validate([
            'email' => ['required', 'email', 'max:255']
        ]);

        $joint = Joint::where([
            ['email', '=', $request->email],
            ['event', '=', $event->id]
        ])->first();

        if ($joint != null) {
            return view('message', [
                'title' => 'You already have entered this event! ',
                'message' => ''
            ]);
        }

        $encrypted_data = Crypt::encryptString(base64_encode(json_encode(['email' => $request->email, 'id' => $event->id])));
        Mail::to($request->email)->send(new JoinEmail($encrypted_data, $event));

        return view('message', [
            'title' => 'Invitation was sent to ' . $request->email . '!',
            'message' => 'You must accept the invitation.'
        ]);
    }

    public function join_auth_store(Event $event)
    {
        $joint = Joint::where([
            ['email', '=', Auth()->User()->email],
            ['event', '=', $event->id]
        ])->first();

        //dd($joint);

        if ($joint != null) {
            return view('message', [
                'title' => 'Invitation was already accepted! ',
                'message' => ''
            ]);
        } else {
            return redirect()->route('event', $event->id);
        }
    }
}
