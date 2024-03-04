<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\VegetPrice;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ChartJsController extends Controller
{
    public function chartjshome()
    {
        $months = ["มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"];
    
        //selectRaw(...): ใช้โมเดล VegetPrice (เป็นคลาสที่เชื่อมต่อกับตารางในฐานข้อมูล) เพื่อทำการ query ข้อมูล.
        $ricePrices = VegetPrice::selectRaw('SUM(vegetprice_price) as total_price, DATE_FORMAT(vegetprice_date, "%m") as month')
        //SUM(vegetprice_price) as total_price: คำสั่ง SQL ใช้เพื่อหาผลรวมของราคาผัก 
        //จาก column (vegetprice_price) และตั้งชื่อให้ผลรวมนั้นเป็น total_price.
        //DATE_FORMAT(vegetprice_date, "%m") as month: ใช้ฟังก์ชัน DATE_FORMAT เพื่อดึงเดือน (ในรูปแบบเลขเดือน) จากวันที่ (vegetprice_date) และตั้งชื่อให้เป็น month.
            ->groupBy('month')  //กลุ่มข้อมูลตามเดือน เพื่อให้ได้ผลรวมของราคาต่อเดือน.
            ->orderBy('month')  //เรียงลำดับข้อมูลตามเดือน.
            ->get();  //ดึงข้อมูลจากฐานข้อมูล.

        $incomes = [];

        foreach ($months as $monthName) {
            // แปลงชื่อเดือนเป็นรูปแบบตัวเลข ("มกราคม" เป็น "01", "กุมภาพันธ์" เป็น "02", เป็นต้น)
            $monthNumeric = array_search($monthName, $months) + 1; // กำหนดให้ $months เริ่มจาก 1
            $income = $ricePrices->where('month', sprintf("%02d", $monthNumeric))->first();
            $incomes[] = $income ? $income->total_price : 0;
        }
        //$income = $ricePrices->where('month', sprintf("%02d", $monthNumeric))->first();
        // ใช้ where เพื่อกรองข้อมูลใน $ricePrices โดยตรงตามเดือนที่ได้รับจาก $monthNumeric (ที่ถูกแปลงเป็นรูปแบบเลขเดือนแล้ว) 
        //และ sprintf("%02d", ...) ใช้เพื่อให้ได้รูปแบบเลขที่มี 2 หลัก เช่น "01", "02", และสุดท้ายทำการดึงข้อมูลที่เรียงลำดับมาก่อน.

        //$incomes[] = $income ? $income->total_price : 0;
        // เพิ่มค่ารายได้ลงในอาร์เรย์ $incomes. ถ้ามีข้อมูล $income ในเดือนนั้น ก็ให้ใช้ค่า $income->total_price (รวมราคาผักในเดือนนั้น)
        // ถ้าไม่มีข้อมูลในเดือนนั้น ก็ให้ใส่ค่า 0.


        
        //Customer ทั้งหมด
        $customerD = Customer::all();
        $data = $customerD->count(); // ใช้เมธอด count() เพื่อรับจำนวนลูกค้า

        //Vegetprice_weight น้ำหนักข้าวทั้งหมด
        $vegetpriceD = VegetPrice::all();
        $vegetpriceWeightCount = 0;

        foreach ($vegetpriceD as $riceprice) {
            $vegetpriceWeightCount += $riceprice->vegetprice_weight;
        }

        //Vegetprice_price ดึงราคาทั้งหมดมาบวกกัน
        $vegetpriceP = VegetPrice::all();
        $vegetpricePriceCount = 0 ;
        foreach ($vegetpriceP as $riceprice) {
            $vegetpricePriceCount += $riceprice->vegetprice_price;
        }

        return view('home.home', compact('months', 'incomes', 'data','vegetpriceWeightCount','vegetpricePriceCount'));
    }

}
