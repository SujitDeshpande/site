<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\UserGroup;

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
        'name', 'email', 'password','group_id'
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
            $user["groupname"] = $groupname;
        }
        return $users;
    }

        public static function createAdminUser($request)
    {

        $user = User::create([
            'name' => $request['name'],
            'email'     => $request['email'],
            'group_id'  => intval($request['group']),
            'password'  => \Hash::make($request['password'])
        ]);

        return $user;

    }
}
