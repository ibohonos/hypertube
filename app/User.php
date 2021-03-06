<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
	use Notifiable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'first_name', 'last_name', 'email', 'password', 'api_token', 'github_token', 'facebook_token', 'linkedin_token', 'google_token', '42_token', 'avatar'
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

	public function comments()
	{
		return $this->hasMany(Comments::class);
	}

	public function viewed()
	{
		return $this->hasMany(Viewed::class);
	}

	public function viewLater()
	{
		return $this->hasMany(ViewLater::class);
	}

	public function getUserById($id)
	{
		return $this->id($id)->firstOrFail();
	}

	public static function getUserByEmail($email)
	{
		return self::email($email)->firstOrFail();
	}

	public function activatedUser($id)
	{
		return $this->id($id)->firstOrFail();
	}

	public function scopeId($query, $id)
	{
		$query->where(['id' => $id]);
	}

	public static function scopeEmail($query, $email)
	{
		$query->where(['email' => $email]);
	}
}
