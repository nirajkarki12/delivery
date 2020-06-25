<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use App\Notifications\Auth\ResetPasswordQueued;

class Customer extends Authenticatable implements JWTSubject
{
    use Notifiable;

    protected $with = ['company'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone', 'image', 'password', 'status', 'social_id', 'provider', 'company_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'social_id', 'provider', 'company_id', 'updated_at'
    ];

    public function setEmailAttribute($value) {
        if ( empty($value) ) { // will check for empty string
            $this->attributes['email'] = NULL;
        } else {
            $this->attributes['email'] = $value;
        }
    }

    public function company() {
        return $this->belongsTo(Company::class);
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
            'socialLogin' => $this->social_id ? true : false
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
