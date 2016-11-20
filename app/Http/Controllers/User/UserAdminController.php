<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\UserGroup;
use App\Models\UserStatus;
use Image;
use Auth;
use Session;

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
    public function role_index()
    {
        
        $users = User::getAdminUsers();
        $groups = UserGroup::get();

        return view('site.role.index')->with('users', $users)
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

        return view('site.user.create')->with('status', $status)
                                       ->with('users', $users)
                                       ->with('groups', $groups);
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
    public function show()
    {
        $users = User::getAdminUsers();

        return view('site.user.profile')->with('users', $users);
    }    

    public function update_avatar(Request $request)
    {
        $user = Auth::user();
        if ($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save(public_path('uploads/avatars/' . $filename));

            
            $user->avatar = $filename;
            //$user->save();
        }

        $user['name']       = $request['name'];

        if($request['password'] != $request['confirm_password']){
            Session::flash('Error', 'Passwords do not Match!');
        }

        if(isset($request['password']) && $request['password'] != ''){
            $user['password'] = \Hash::make($request['password']);
        }
        
        $user->save();   

        $users = User::getAdminUsers();
        return view('site.user.profile')->with('users', $users);
    } 

}
