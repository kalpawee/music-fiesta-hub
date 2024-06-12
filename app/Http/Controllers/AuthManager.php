<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use MongoDB\Driver\Session;

class AuthManager extends Controller
{
    function login()
    {
        return view('login');
    }

    function registration()
    {
        return view('registration');
    }
    function event()
    {
        return view('login');
    }
    function loginPost(Request $request)
    {
         $request->validate([
             'email' => 'required',
             'password' => 'required'
         ]);

         $credentials = $request->only('email', 'password');
         if(Auth::attempt($credentials)){
             return redirect()->intended(route('home'));
         }
         return  redirect(route('login'))->with("error","Login details are not valid");
    }
    function registrationPost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        $data['name']= $request->name;
        $data['email']= $request->email;
        $data['password']= Hash::make($request->password);
        $user = User::create($data);
        if(!$user){
            return  redirect(route('registration'))->with("error","Registration failed pls try again");
        }
        return  redirect(route('login'))->with("success","Registration success,login to access");
    }
    function logout()
    {
        Session::flush();
        Auth::logout();
        return  redirect(route('login'));
    }
    public function index()
    {
        $events = Event::all();
        return view('events.index', compact('events'));
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'date' => 'required|date',
            'venue' => 'required',
            'featured_band' => 'required',
            'ticket_price' => 'required|numeric',
            'description' => 'required'
        ]);

        Event::create($request->all());
        return redirect()->route('events.index')->with('success', 'Event added successfully');
    }

    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $request->validate([
            'name' => 'required',
            'date' => 'required|date',
            'venue' => 'required',
            'featured_band' => 'required',
            'ticket_price' => 'required|numeric',
            'description' => 'required'
        ]);

        $event->update($request->all());
        return redirect()->route('events.index')->with('success', 'Event updated successfully');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('events.index')->with('success', 'Event deleted successfully');
    }

}
