<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Incident;
use Image;
use Auth;
use Session;

class IncidentsController extends Controller
{
     /**
     * Instantiate a new IncidentsController instance.
     */
    public function __construct()
    {        
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $incidents = Incident::getAdminIncidents();
		$users = User::getAdminUsers();
		$logged_id = Auth::user()->id;
		$name = Auth::user()->name;
        return view('site.incidents.index')->with('incidents', $incidents)
		                                  ->with('users', $users)
										  ->with('name', $name)
										  ->with('logged_user_id', $logged_id);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $incident = Incident::createAdminIncident();
		$incidents = Incident::getAdminIncidents();
		$name = Auth::user()->name;

        return view('site.incidents.index')->with('incident', $incidents)
                                       ->with('name', $name);
    }
	
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $incident = Incident::createAdminIncident($request);
        return ($incident);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Incident::where('id', $id)->delete();
        return;
    }
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $incident= Incident::updateAdminIncident($id, $request);
        return ($incident);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $incidents = Incident::getAdminIncidents();

        return view('site.incidents.index')->with('incidents', $incidents);
    }     

}
