<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\UserGroup;
use App\Models\UserStatus;

class UserAdminController extends Controller
{
     /**
     * Instantiate a new UserAdminController instance.
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
        
        $users = User::getAdminUsers();
        $groups = UserGroup::pluck('name', 'id');
        $status = UserStatus::pluck('name', 'id');

        return view('site.user.index')->with('users', $users)
                                      ->with('status', $status)
                                      ->with('groups', $groups);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::getAdminUsers();
        $groups = UserGroup::pluck('name', 'id');
        $status = UserStatus::pluck('name', 'id');

        return view('site.user.create')->with('status', $status)->with('users', $users)->with('groups', $groups);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::createAdminUser($request);
        return ($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id', $id)->delete();
        return;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $user = User::updateAdminUser($id, $request);
        return ($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function profile($id)
    {
        $users = User::getAdminUsers();

        return view('site.user.profile')->with('users', $users);
    }    

}
