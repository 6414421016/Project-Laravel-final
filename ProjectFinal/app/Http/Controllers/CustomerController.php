<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function customerdata()
    {

        $customers = Customer::all();
        return view('customer.customer', compact('customers'));
    }



    //Insert
    function insertCustomer(Request $request)
    {
        $request->validate([
            'customer_name' => 'required',
            'customer_phone' => 'required'
        ]);

        $data = [
            'customer_name' => $request->customer_name,
            'customer_phone' => $request->customer_phone
        ];

        Customer::create($data);
        return redirect('customer');
    }



    //Edit
    public function editCustomer($id)
    {
        $editCustomer = Customer::find($id);
        return view('customer.customer-edit', compact('editCustomer'));
    }

    //Update
    function updateCustomer(Request $request, $id)
    {
        $request->validate([
            'customer_name' => 'required',
            'customer_phone' => 'required',
        ]);
        $data = [
            'customer_name' => $request->customer_name,
            'customer_phone' => $request->customer_phone,
        ];
        Customer::find($id)->update($data);
        return redirect('customer');
    }

    //delete data
    function deleteCustomer($id) {
        $dataCustomer = Customer::find($id);
        $dataCustomer->delete();
        return redirect('customer');
    }
}
