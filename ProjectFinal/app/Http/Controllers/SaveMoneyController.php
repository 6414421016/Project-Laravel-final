<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\RiceDate;
use App\Models\RicePrice;
use App\Models\SaveMoney;
use App\Models\VegetDate;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class SaveMoneyController extends Controller
{
    public function savemoneydata()
    {
        $savemoneys = SaveMoney::all();
        $vegetdates = VegetDate::all();
        return view('savemoney.savemoney', compact('savemoneys','vegetdates'));
    }
    


    //Edit
    public function editSavemoney($id)
    {
        $editSavemoney = SaveMoney::find($id);
        return view('savemoney.savemoney-edit', compact('editSavemoney'));
    }

    //Update
    function updateSavemoney(Request $request, $id)
    {
        $request->validate([
            'savemoney_bagc' => 'required',
            'savemoney_type' => 'required',
            'savemoney_receive' => 'required',
            'savemoney_change' => 'required'
        ]);
        $data = [
            'savemoney_bagc' => $request->savemoney_bagc,
            'savemoney_type' => $request->savemoney_type,
            'savemoney_receive' => $request->savemoney_receive,
            'savemoney_change' => $request->savemoney_change,
        ];
        SaveMoney::find($id)->update($data);
        return redirect('savemoney/savemoney');
    }




    function deleteSavemoney($id)
    {
        $dataSavemoney = SaveMoney::find($id);
        $dataSavemoney->delete();
        return redirect('savemoney/savemoney');
    }


    //Show view form
    function formSavemoney()
    {
        return view('savemoney-add');
    }


    //Insert
    function insertSavemoney(Request $request)
    {
        $request->validate([
            'customer_name' => 'required',
            'vegetdate_date' => 'required',
            'savemoney_bagc' => 'required',
            'savemoney_type' => 'required',
            'savemoney_receive' => 'required',
            'savemoney_change' => 'required'
        ]);
        // ดึงข้อมูลลูกค้าตามชื่อที่เลือก
        $customer = Customer::where('customer_name', $request->customer_name)->first();
        // ดึงข้อมูล riceprice ตามวันที่เลือก
        $vegetdate = VegetDate::where('vegetdate_date', $request->vegetdate_date)->first();

        $data = [
            'customer_id' => $customer->id,
            'veget_date_id' => $vegetdate->id,
            'savemoney_bagc' => $request->savemoney_bagc,
            'savemoney_type' => $request->savemoney_type,
            'savemoney_receive' => $request->savemoney_receive,
            'savemoney_change' => $request->savemoney_change,
        ];
        // dd($data);

        SaveMoney::create($data);
        return redirect('savemoney/savemoney');
    }




    //customer,riceprice Pull data
    public function savemoneyAddData()
    {
        $customers = Customer::all();
        $vegetdates = VegetDate::all();
        return view('savemoney.savemoney-add', compact('customers', 'vegetdates'));
    }



    //Pull data to Bill savemoney
    public function billSavemoney($id)
    {
        $savemoneybill = SaveMoney::with('customer', 'vegetdate')->find($id);

        return view('savemoney.savemoney-bill', compact('savemoneybill'));
    }
}
