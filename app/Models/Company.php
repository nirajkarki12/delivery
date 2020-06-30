<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Company extends Model
{
    use Notifiable;
    protected $table = 'company';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'phone', 'owner_name', 'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'updated_at',
    ];

    public function location() {
        return $this->morphOne(Address::class, 'addressable');
    }

    /**
     * The staffs that belong to the company.
     */
    public function staffs()
    {
        return $this->hasMany(Customer::class);
    }

    public static function boot() {
        parent::boot();

        static::deleting(function($company){
            $company->location()->delete();
        });
    }

}
