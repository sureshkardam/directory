<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_type','group_id','name', 'email', 'password'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
	
	public function roles() {

		return $this->belongsToMany('\App\Role', 'user_role', 'user_id', 'role_id');

	}

	public function hasAnyRole($roles) {
		if (is_array($roles)) {
			foreach ($roles as $role) {
				if ($this->hasRole($role)) {
					return $role;

				}
			}

		} else {
			if ($this->hasRole($roles)) {
				return true;
			}
		}

		return false;
	}

	public function hasRole($role) {
		if ($this->roles()->where('name', $role)->first()) {
			return true;
		}

		return false;
	}
	
	
	public function getProfile()
	
	{
	
			return $this->hasOne('App\Model\Admin\UserProfile','user_id');	
		
	}
	
	
	public static function getName($id) {
		
		$user=Self::find($id);
		
		if ($user) {
			return $user->name;
		}

		return false;
	}
	
	public static function getEmail($id) {
		
		$user=Self::find($id);
		
		if ($user) {
			return $user->name;
		}

		return false;
	}

	public static function getSupportName($id) {
		
		$user=Self::find($id);
		
		if ($user) {
			return $user->name;
		}

		return false;
	}
	
}
