<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\UserGroup;
use App\Models\UserStatus;

class User extends Authenticatable
{
    use Notifiable;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','group_id', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function getAdminUsers()
    {
        $users = User::get();
        foreach ($users as $user) {
            $groupname = UserGroup::where('id', $user->group_id)->value('name');
            $statusname = UserStatus::where('id', $user->status)->value('name');
            $user["groupname"] = $groupname;
            $user["statusname"] = $statusname;
        }
        return $users;
    }

    public static function createAdminUser($request)
    {

        $user = User::create([
            'name'      => $request['name'],
            'email'     => $request['email'],
            'group_id'  => intval($request['group']),
            'status'    => intval($request['status']),
            'password'  => \Hash::make($request['password'])
        ]);

        return $user;

    }

    public static function updateAdminUser($id, $request)
    {
        $user = User::find($id);

        $user['name']       = $request['name'];
        $user['group_id']   = intval($request['group']);
        $user['status']     = intval($request['status']);
        $user['email']      = $request['email'];

        if(isset($request['password']) && $request['password'] != ''){
            $user['password'] = \Hash::make($request['password']);
        }
        
        $user->save();        

        return $user;

    }    
}
