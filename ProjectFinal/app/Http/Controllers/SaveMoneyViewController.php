<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\RiceDate;
use App\Models\RicePrice;
use App\Models\SaveMoney;
use App\Models\VegetDate;
use App\Models\VegetPrice;
use Illuminate\Http\Request;

class SaveMoneyViewController extends Controller
{
    public function savemoneydetail($id)
    {   
        
        // ดึงข้อมูล RiceDate ด้วย $id
        $vegetdateId = VegetDate::find($id);
        $vegetdateDate = $vegetdateId->vegetdate_date;
        // ดึงข้อมูล customer_id
        $customerId = $vegetdateId->customer_id;
        $vegetdateId = $vegetdateId->veget_price_id;

        $vegetdateCustomer = Customer::find($customerId)->customer_name;
        $vegetdateVegetprice = VegetPrice::find($vegetdateId)->vegetprice_veget;

        $savemoneyId = SaveMoney::find($id);
        return view('savemoney.savemoney-receipt', compact('vegetdateDate','vegetdateCustomer','vegetdateVegetprice','savemoneyId'));
    }
}
