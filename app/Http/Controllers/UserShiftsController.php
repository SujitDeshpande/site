<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\UserGroup;
use App\Models\UserStatus;
use Image;
use Auth;
use Session;
use DB;
use App\UserShifts;
use App\UserShiftsType;

class UserShiftsController extends Controller
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
	public static function index($year,$month) {
		$users = User::getAdminUsers();
		
		$logged_id = Auth::user()->id;
		$logged_name = Auth::user()->name;
		$group_id = User::where('id', $logged_id)->value('group_id');
		$user_count = DB::table('users')->where('shift_user', '=', 'Y')->count();
		$user_count = $user_count;
		
		$groups = UserGroup::pluck('name', 'id');
        $status = UserStatus::pluck('name', 'id');
		
		$shifts = array();
		foreach($users as $u){
			if($u->shift_user == 'Y') {
			$shifts[] = UserShifts::getUserShifts($u->id);
			}
		}
		$shift_types = UserShiftsType::getShiftsType();
		$locs = DB::table('user_work_locs')->get();
		
		return view('site.usershift.index')->with('users', $users)
									  ->with('shifts',$shifts)
									  ->with('shift_types',$shift_types)
                                      ->with('status', $status)
                                      ->with('groups', $groups)
									  ->with('shift_usr',$user_count)
									  ->with('is_admin',$group_id)
									  ->with('locs',$locs)
									  ->with('worker_id',$logged_id)
									  ->with('logged_name',$logged_name)
									  ->with('year',$year)
									  ->with('mon',$month);
	
	}
	
	/**
     * Store user shifts
     *
     */
	public static function store(Request $request) {
		$shifts = UserShifts::addShift($request);
		return $shifts;
	
	}
	
	public static function updateActualShift(Request $request, $id) {
		$shifts = UserShifts::updateActualShift($id,$request);
		return $shifts;
	}
	
}
