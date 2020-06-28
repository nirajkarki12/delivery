<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use App\Notifications\Auth\ResetPasswordQueued;

class User extends Authenticatable implements JWTSubject
{
	use Notifiable;

	const CITIZENSHIP = 'citizenship';
	const LICENSE = 'license';

	public static $documentTypes = [
		self::CITIZENSHIP,
		self::LICENSE,
	];

	/**
	* The attributes that are mass assignable.
	*
	* @var array
	*/
	protected $fillable = [
		'name', 'email', 'phone', 'image', 'password', 'district_id', 'document_type', 'ducument_front', 'ducument_back', 'phone2', 'phone3', 'status',
	];

	/**
	* The attributes that should be hidden for arrays.
	*
	* @var array
	*/
	protected $hidden = [
		'password', 'remember_token', 'updated_at'
	];

	/**
	* The vechiles that belong to the user.
	*/
	public function vechiles()
	{
		return $this->hasMany(Vechile::class);
	}

	public function district() {
		return $this->belongsTo(District::class);
	}

	/**
	* jwt implemented methods
	*/
	public function getJWTIdentifier()
	{
		return $this->getKey();
	}

	public function getJWTCustomClaims()
	{
		return [
			'id' => $this->id,
			'email' => $this->email,
			'image' => $this->image,
			'phone' => $this->phone,
		];
	}

	/**
	* Send the password reset notification.
	*
	* @param  string  $token
	* @return void
	*/
	public function sendPasswordResetNotification($token)
	{
		$this->notify(new ResetPasswordQueued($token));
	}

}
