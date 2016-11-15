<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class CalendarController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::getAdminUsers();
        return view('site.calendar.calendar')->with('users', $users);
    }
}
