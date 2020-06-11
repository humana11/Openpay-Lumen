<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Charge extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'charge_id','amount','auth','currency','operation_date', 'description', 'status'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'updated_at',
    ];
}
