<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VegetPrice extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'vegetprice_date',
        'vegetprice_veget',
        'vegetprice_quantity',
        'vegetprice_weight',
        'vegetprice_price'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function vegetdate()
    {
        return $this->hasOne(VegetDate::class, 'vegetprice_id');  
    }

    public function savemoney()
    {
        return $this->hasOne(SaveMoney::class, 'vegetprice_id');   
    }

    public function vegetprice()
    {
        return $this->belongsTo(VegetPrice::class, 'vegetprice_id');
    }
}
