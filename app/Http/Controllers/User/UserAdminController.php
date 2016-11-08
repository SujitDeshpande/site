<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserAdminController extends Controller
{

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

return view('site.user.user')->with('users', $users);
    }
}
