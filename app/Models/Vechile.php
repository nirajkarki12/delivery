<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Vechile extends Model
{
	use Notifiable;

	const WALKER = 'walker';
	const BIKE = 'bike';
	const VAN = 'van';
	const MINI_TRUCK = 'mini truck';

	public static $vechileTypes = [
		self::WALKER,
		self::BIKE,
		self::VAN,
		self::MINI_TRUCK,
	];

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'type', 'vechile_number', 'user_id', 'status',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'updated_at'
	];

	public function user() {
		return $this->belongsTo(User::class);
	}

}
