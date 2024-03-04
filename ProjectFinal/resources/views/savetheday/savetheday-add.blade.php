@extends('layout')
@section('title')
    
@endsection

@section('content')
    <div class="savetheday-menu">

        <div class="text-savetheday">
            <h1>เพิ่มบันทึกแจ้งวันมารับบิล</h1>
        </div>

        <div class="button-savetheday">
            <a href=""><i class="ri-add-line"><span>เพิ่ม</span></i></a>
        </div>

        <h3>ฟอร์มบันทึกแจ้งวันมารับบิล</h3>

        <form action="{{route('insertVegetdate')}}" class="form-savetheday-add" method="POST">
            @csrf
            <label for="">วันที่มารับบิล : </label>
            <input type="date" name="vegetdate_date" placeholder="กำหนดวันที่มารับบิล"><br>
            <label for="">ชื่อ-นามสกุล : </label>
            <select name="customer_name">
                @foreach ($customers as $item)
                <option>{{$item->customer_name}}</option>
                @endforeach
            </select><br>
            <label for="">ประเภทผัก : </label>
            <select name="vegetprice_veget">
                @foreach ($vegetprices as $item)
                    <option>{{$item->vegetprice_veget}}</option>
                @endforeach
            </select>
            <div class="button-close_add-savetheday">
                <a href="{{route("savetheday")}}">ยกเลิก</a>
                <button type="submit">เพิ่มข้อมูล</button>
            </div>
        </form>

        
        
    </div>
@endsection
