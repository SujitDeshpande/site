<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;
class UserShifts extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user_shifts';
	
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'shift','ps_color','ps_desc', 'date', 'user_id','shift_type_id','loc_id'
    ];
	
	/**
     * Add and update user shifts
     *
     * @var $shift
     */
	public static function addShift($request)
    {	
		$getDate = UserShifts::where('date',$request['date'])->get();
		if(count($getDate) > 0) {
			foreach($getDate as $gd) {
				if($gd->date == $request['date'] && $gd->user_id == $request['user_id']) {
					$update = DB::table('user_shifts')
					->where(['user_id' => $request['user_id'], 'date' => $request['date']])
					->update(array('shift' => $request['shift'],'ps_color' => $request['ps_color'],'ps_desc'  => $request['ps_desc']));
					return $update;
				} else {
				$shift = UserShifts::create([
					'shift'    => $request['shift'],
					'ps_color' => $request['ps_color'],
					'ps_desc'  => $request['ps_desc'],
					'date'     => $request['date'],
					'user_id' => $request['user_id'],
					'shift_type_id' => 5,
					'loc_id'=>0
				]);
				return $shift;
				}
			}
		}else{
		$shift = UserShifts::create([
            'shift'    => $request['shift'],
			'ps_color' => $request['ps_color'],
			'ps_desc'  => $request['ps_desc'],
            'date'     => $request['date'],
            'user_id' => $request['user_id'],
			'shift_type_id' => 5,
			'loc_id'=>0
        ]);
		return $shift;
		}
    }
	
	/**
     * Get all user shifts
     *
     * @var $shift
     */
	public static function getUserShifts($user_id) {
		$shifts = DB::table('user_shifts')
			->where('user_shifts.user_id',$user_id)
            ->leftJoin('user_shifts_type', 'user_shifts_type.id', '=', 'user_shifts.shift_type_id')
			->leftJoin('user_work_locs', 'user_work_locs.id', '=', 'user_shifts.loc_id')
			->select('user_shifts.id','user_shifts.shift as planned_shift','user_shifts.ps_color','user_shifts.ps_desc','user_shifts.date','user_shifts.user_id',
			'user_shifts_type.id as sid','user_shifts_type.shift_type as actual_shift','user_shifts_type.shift_desc','user_shifts_type.shift_color','user_work_locs.location','user_work_locs.id as l_id')
			->orderBy('date')
			->get();
		return $shifts; 
	
	}
	
	public static function getUserLoc() {
		$locs = DB::table('user_work_locs')->get();
		return $locs; 
	
	}
	
	public static function updateActualShift($id,$request) {
		$update = '';
		if($request['update_type'] == 'shift') {
			$update = ['shift_type_id' => $request['shfittype_id']];
		}
		if($request['update_type'] == 'locs') {
			$update = ['loc_id' => $request['shfittype_id']];
		}
		$update = DB::table('user_shifts')
					->where(['user_id' => $id, 'date' => $request['date']])
					->update($update);
		return $update;
	
	}
	
	public static function updateWorkLocs($id,$request) {
		
		$update = DB::table('user_shifts')
					->where(['user_id' => $id, 'date' => $request['date']])
					->update($update);
		return $update;
	
	}
}

