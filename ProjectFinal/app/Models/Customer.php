<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name',
        'customer_phone',
    ];

    public function vegetprices()
    {
        return $this->hasMany(VegetPrice::class, 'customer_id');
    }

    public function vegetdates()
    {
        return $this->hasMany(VegetPrice::class, 'customer_id');
    }

    public function savemoneys()
    {
        return $this->hasMany(SaveMoney::class, 'customer_id');
    }

}
