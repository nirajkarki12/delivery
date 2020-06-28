<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'address';
    protected $with = ['district'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'district_id', 'street_name', 'lat', 'lon','addressable_type','addressable_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'addressable_type', 'addressable_id', 'updated_at',
    ];

    public function addressable() {
        return $this->morphTo();
    }

    public function district() {
        return $this->belongsTo(District::class);
    }

}
