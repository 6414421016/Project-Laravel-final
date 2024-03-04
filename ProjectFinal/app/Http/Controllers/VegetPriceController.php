<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\VegetPrice;
use Illuminate\Http\Request;

class VegetPriceController extends Controller
{
    public function vegetpricedata()
    {
        $vegetprices = VegetPrice::all();
        return view('manage.manage-price', compact('vegetprices'));
    }

    //Insert
    function insertVegetprice(Request $request)
    {
        $request->validate([
            'customer_name' => 'required',
            'vegetprice_date' => 'required',
            'vegetprice_veget' => 'required',
            'vegetprice_quantity' => 'required',
            'vegetprice_weight' => 'required',
            'vegetprice_price' => 'required'
        ]);

        // ดึงข้อมูลลูกค้าตามชื่อที่เลือก
        $customer = Customer::where('customer_name', $request->customer_name)->first();

        $data = [
            'customer_id' => $customer->id,
            'vegetprice_date' => $request->vegetprice_date,
            'vegetprice_veget' => $request->vegetprice_veget,
            'vegetprice_quantity' => $request->vegetprice_quantity,
            'vegetprice_weight' => $request->vegetprice_weight,
            'vegetprice_price' => $request->vegetprice_price
        ];
        // dd($data);

        VegetPrice::create($data);
        return redirect('manage-price/manage-price');
    }
    //customer Pull data
    public function customerdata()
    {
        $customers = Customer::all();
        return view('manage.manage-price-add', compact('customers'));
    }



    //Edit
    public function editVegetprice($id)
    {
        $editVegetprice = VegetPrice::with('customer')->find($id);
        return view('manage.manage-price-edit', compact('editVegetprice'));
    }

    //Update
    function updateVegetprice(Request $request, $id)
    {
        $request->validate([
            'vegetprice_date' => 'required',
            'vegetprice_veget' => 'required',
            'vegetprice_quantity' => 'required',
            'vegetprice_weight' => 'required',
            'vegetprice_price' => 'required',
        ]);
        $data = [
            'vegetprice_date' => $request->vegetprice_date,
            'vegetprice_veget' => $request->vegetprice_veget,
            'vegetprice_quantity' => $request->vegetprice_quantity,
            'vegetprice_weight' => $request->vegetprice_weight,
            'vegetprice_price' => $request->vegetprice_price,
        ];
        // dd($data);
        VegetPrice::find($id)->update($data);
        return redirect('manage-price/manage-price');
    }


    //delete data
    function deleteVegetprice($id) {
        $dataVegetprice = VegetPrice::find($id);
        $dataVegetprice->delete();
        return redirect('manage-price/manage-price');
    }
}
