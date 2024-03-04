@extends('layout')
@section('title')
    
@endsection

@section('content')
    <div class="savetheday-menu">

        <div class="text-savetheday">
            <h1>แก้ไขวันมารับข้าว</h1>
        </div>

        <div class="button-savetheday">
            <a href="{{route('savetheday-add')}}"><i class="ri-add-line"><span>เพิ่ม</span></i></a>
        </div>

        <h3>ฟอร์มแก้ไขวันมารับข้าว</h3>
        <form action="{{route('updateVegetdate', $editVegetdate->id)}}" method="POST" class="form-savetheday-add">
            @csrf
            <label for="">ชื่อ-นามสกุล : {{$editVegetdate->customer->customer_name}}</label><br>
            <label for="">พันธุ์ข้าว :  {{$editVegetdate->vegetprice->vegetprice_veget}}</label><br>
            <label for="">วันที่มารับข้าว : </label>
            <input type="date" name="vegetdate_date" value="{{$editVegetdate->vegetdate_date}}"><br>
            <div class="button-close_edit-savetheday">
                <a href="{{route("savetheday")}}">ยกเลิก</a>
                <button type="submit">บันทึก</button>
            </div>
        </form>
        
        
        
    </div>
@endsection
