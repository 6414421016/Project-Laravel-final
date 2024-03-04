<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\VegetDate;
use App\Models\VegetPrice;
use Illuminate\Http\Request;

class VegetDateController extends Controller
{
    public function vegetdatedata()
    {
        $vegetdates = VegetDate::all();
        return view('savetheday.savetheday', compact('vegetdates'));
    }

    //Insert
    function insertVegetdate(Request $request)
    {
        $request->validate([
            'customer_name' => 'required',
            'vegetprice_veget' => 'required',
            'vegetdate_date' => 'required',
        ]);

        // ดึงข้อมูลลูกค้าตามชื่อที่เลือก
        $customer = Customer::where('customer_name', $request->customer_name)->first();
        $vegetprice = VegetPrice::where('vegetprice_veget', $request->vegetprice_veget)->first();

        $data = [
            'customer_id' => $customer->id,
            'veget_price_id' => $vegetprice->id,
            'vegetdate_date' => $request->vegetdate_date,
        ];

        VegetDate::create($data);
        return redirect('/savetheday/savetheday');
    }

    //customer,vegetprices Pull data
    public function customerdata()
    {
        $customers = Customer::all();
        $vegetprices = VegetPrice::all();
        return view('savetheday.savetheday-add', compact('customers', 'vegetprices'));
    }



    //Edit
    public function editVegetdate($id) 
    {
        $editVegetdate = VegetDate::with('customer','vegetprice')->find($id);

        return view('savetheday.savetheday-edit', compact('editVegetdate'));
    }

    //Update
    function updateVegetdate(Request $request, $id)
    {
        $request->validate([
            'vegetdate_date' => 'required',
        ]);
        $data = [
            'vegetdate_date' => $request->vegetdate_date,
        ];

        VegetDate::find($id)->update($data);
        return redirect('savetheday/savetheday');
    }


    //delete data
    function deleteVegetdate($id) {
        $dataVegetdate = VegetDate::find($id);
        $dataVegetdate->delete();
        return redirect('savetheday/savetheday');
    }
}
