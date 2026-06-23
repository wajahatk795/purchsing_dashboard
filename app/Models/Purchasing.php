<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchasing extends Model
{
    protected $fillable = [
        'service_name',
        'provider',
        'renew_date',
        'amount',
        'card',
        'card_name',
        'status',
        'company_id',
        'unit_id',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}
