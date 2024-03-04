<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VegetDate extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'veget_price_id',
        'vegetdate_date',
    ];


    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function vegetprice()
    {
        return $this->belongsTo(VegetPrice::class, 'veget_price_id'); 
    }
}
