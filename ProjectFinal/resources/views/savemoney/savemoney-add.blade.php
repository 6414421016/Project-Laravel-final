@extends('layout')
@section('title')
    
@endsection

@section('content')
    <div class="savetheday-menu">

        <div class="text-savetheday">
            <h1>พิมพ์การชำละเงิน</h1>
        </div>

        <div class="button-savetheday">
            <a href=""><i class="ri-add-line"><span>เพิ่ม</span></i></a>
        </div>

        <h3>ฟอร์มบันทึกการชำละเงิน</h3>

        <form action="{{route('insertSavemoney')}}" class="form-savetheday-add" method="POST">
            @csrf
            <label for="">ชื่อ-นามสกุล :</label>
            <select name="customer_name">
                @foreach ($customers as $item)
                <option>{{$item->customer_name}}</option>
                @endforeach
            </select><br>
            <label for="">วันที่มาจ่ายเงิน</label>
            <select name="vegetdate_date">
                @foreach ($vegetdates as $item)
                <option>{{$item->vegetdate_date}}</option>
                @endforeach
            </select><br>
            <label for="">ราคาตลาด</label>
            <input type="text" name="savemoney_bagc" placeholder="ราคาตลาด"><br>
            <label for="">วิธีชำระเงิน :</label>
            <input type="text" name="savemoney_type" placeholder="วิธีชำระเงิน"><br>
            <label for="">รับเงิน :</label>
            <input type="text" name="savemoney_receive" placeholder="รับเงิน"><br>
            <label for="">เงินทอน :</label>
            <input type="text" name="savemoney_change" placeholder="เงินทอน"><br>
            
            <div class="button-close_add-savetheday">
                <a href="{{route("savemoney")}}">ยกเลิก</a>
                <button type="submit">เพิ่มข้อมูล</button>
            </div>
        </form>

        
        
    </div>
@endsection
