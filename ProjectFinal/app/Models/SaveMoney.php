<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaveMoney extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'veget_price_id',
        'savemoney_bagc',
        'savemoney_receive',
        'savemoney_type',
        'savemoney_change'
    ];


    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function vegetprice()
    {
        return $this->belongsTo(VegetPrice::class, 'veget_price_id');  
    }

    public function vegetdate()
    {
        return $this->belongsTo(VegetDate::class, 'vegetdate_id');
    }
}
