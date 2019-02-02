<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = 'province';

    protected $fillable = [
        'province_code',
        'province_name',
    ];

    public function amphur()
    {
        return $this->hasMany('App\Amphur');

    }
    public function tambol()
    {
        return $this->hasMany('App\Tambol');
    }

    public function customer()
    {
        return $this->hasMany('App\Customer', 'province_code', 'province_code');
    }
}
