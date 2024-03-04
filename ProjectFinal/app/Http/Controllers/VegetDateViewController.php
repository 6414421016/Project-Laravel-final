<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\VegetDate;
use App\Models\VegetPrice;
use Illuminate\Http\Request;

class VegetDateViewController extends Controller
{
    public function vegetdatedetail($id)
    {   
        
        // ดึงข้อมูล RiceDate ด้วย $id
        $vegetdateId = VegetDate::find($id);
        $vegetdateDate = $vegetdateId->vegetdate_date;
        // ดึงข้อมูล customer_id
        $customerId = $vegetdateId->customer_id;
        $vegetdateId = $vegetdateId->veget_price_id;
        // ดึงข้อมูล customer_name จากตาราง RiceDate ด้วย Eloquent
        $vegetdateCustomer = Customer::find($customerId)->customer_name;
        $vegetdateRiceprice = VegetPrice::find($vegetdateId)->vegetprice_veget;
        // ดึงข้อมูล veget_price_id
        $vegetPriceId = VegetPrice::find($id);
        return view('savetheday.savetheday-bill', compact('vegetdateDate','vegetdateCustomer','vegetdateRiceprice'));
    }
}
