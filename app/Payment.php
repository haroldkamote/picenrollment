<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'user_id',
        'remittance_date',
        'amount'
    ];

    public function user(){
        return $this->hasMany('App\User');
    }
}
