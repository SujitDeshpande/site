<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class UserShiftsType extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user_shifts_type';
	
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'shift_type', 'shift_desc'
    ];
	
	
	/**
     * Get all user shifts
     *
     * @var $shift
     */
	public static function getShiftsType() {
		$shifts = UserShiftsType::get();
		return $shifts;
	
	}
}

