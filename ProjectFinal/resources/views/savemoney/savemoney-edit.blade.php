@extends('layout')
@section('title')
    
@endsection

@section('content')
    <div class="manage-price-menu">

        <div class="text-manage-price">
            <h1>พิมพ์การชำระเงิน</h1>
        </div>

        <div class="button-manage-price">
            <a href="{{route('manage-price-add')}}"><i class="ri-add-line"><span>เพิ่ม</span></i></a>
        </div>

        <h3>ฟอร์มแก้ไขการชำระเงิน</h3>

        <form action="{{route('updateSavemoney', $editSavemoney->id)}}" method="POST" class="form-manage-price-add">
            @csrf
            <label for="">ชื่อ-นามสกุล : {{$editSavemoney->customer->customer_name}}</label><br>          
            <label for="">จำนวนข้าวได่ : </label>
            <input type="text" name="savemoney_bagc" value="{{$editSavemoney->savemoney_bagc}}"><br>
            <label for="">วิธีชำระเงิน : </label>
            <input type="text" name="savemoney_type" value="{{$editSavemoney->savemoney_type}}"><br>
            <label for="">รับเงิน : </label>
            <input type="number" name="savemoney_receive" value="{{$editSavemoney->savemoney_receive}}"><br>
            <label for="">ทอนเงิน : </label>
            <input type="number" name="savemoney_change" value="{{$editSavemoney->savemoney_change}}"><br>
            <div class="button-close_edit-manage-price">
                <a href="{{route("savemoney")}}">ยกเลิก</a>
                <button type="submit">บันทึก</button>
            </div>
        </form>

        
        
    </div>
@endsection
