<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

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

        return view('site.user')->with('users', $users);
    }
}
