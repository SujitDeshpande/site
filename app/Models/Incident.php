<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Auth;
use DB;
use App\Quotation;

class Incident extends Model
{
	protected $table = 'incidents';
	protected $fillable = ['incident_no', 'status', 'category','stream','user_id', 'comments', 'created_at', 'updated_at'];
	
	public static function getAdminIncidents()
    {
        //$incidents = Incident::get();
		$incidents = DB::table('incidents')
            ->leftJoin('users', 'users.id', '=', 'incidents.user_id')
			->select('incidents.*', 'users.name')
			 ->orderBy('id', 'desc')
            ->get();
        return $incidents;
    }
	
	public static function createAdminIncident($request)
    {
		$user_id = Auth::user()->id;
        $incident = Incident::create([
			'incident_no' => $request['incident_no'],
            'status'      => $request['status'],
            'category'    => $request['category'],
			'stream'    => $request['stream'],
			'user_id'    => $user_id,
            'comments'    => $request['comments']
			
        ]);

        return $incident;

    }
	
	public static function updateAdminIncident($id, $request)
    {
        $incident = Incident::find($id);
		$user_id = Auth::user()->id;
        $incident['incident_no'] = $request['incident_no'];
            $incident['status' ] = $request['status'];
            $incident['category']= $request['category'];
			$incident['stream']  = $request['stream'];
			$incident['user_id'] = $user_id;
            $incident['comments'] = $request['comments'];
        
        $incident->save();        

        return $incident;

    } 
}
