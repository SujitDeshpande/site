<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Incident;
use Auth;
use DB;
use App\Quotation;

class HomeController extends Controller
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
        $logged_id = Auth::user()->id;
        
        $group_id = User::where('id', $logged_id)->value('group_id');
        
        $user_count = count($users);
        
        $incidents = Incident::getAdminIncidents();
        $incident_count = count($incidents);
        
        $disc_count = DB::table('chatter_discussion')->count();
        return view('site.dashboard.dashboard')->with('users', $users)
                                               ->with('group_id', $group_id)
                                               ->with('user_count', $user_count)
                                               ->with('disc_count', $disc_count)
                                               ->with('incident_count', $incident_count);
    }
}
