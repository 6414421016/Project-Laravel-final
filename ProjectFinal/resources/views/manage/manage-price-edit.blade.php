@extends('layout')
@section('title')
    
@endsection

@section('content')
    <div class="manage-price-menu">

        <div class="text-manage-price">
            <h1>ข้อมูลจัดการราคาข้าว</h1>
        </div>

        <div class="button-manage-price">
            <a href="{{route('manage-price-add')}}"><i class="ri-add-line"><span>เพิ่ม</span></i></a>
        </div>

        <h3>ฟอร์มแก้ไขราคาข้าว</h3>

        <form action="{{route('updateVegetprice', $editVegetprice->id)}}" method="POST" class="form-manage-price-add">
            @csrf
            <label for="">ชื่อ-นามสกุล : {{$editVegetprice->customer->customer_name}}</label><br>
            
            <label for="">วันที่นำข้าวมาคัด : </label>
            <input type="date" name="vegetprice_date" value="{{$editVegetprice->vegetprice_date}}"><br>
            <label for="">กระสอบข้าว : </label>
            <input type="text" name="vegetprice_quantity" value="{{$editVegetprice->vegetprice_quantity}}"><br>
            <label for="">พันธุ์ข้าว : </label>
            <input type="text" name="vegetprice_veget" value="{{$editVegetprice->vegetprice_veget}}"><br>
            <label for="">น้ำหนักข้าว : </label>
            <input type="number" name="vegetprice_weight" value="{{$editVegetprice->vegetprice_weight}}" id="number" oninput="calculate()"><br>
            <label for="">ราคา : </label>
            <input type="number" name="vegetprice_price" value="{{$editVegetprice->vegetprice_price}}" id="result"><br>
            <div class="button-close_edit-manage-price">
                <a href="{{route("manage-price")}}">ยกเลิก</a>
                <button type="submit">เพิ่มข้อมูล</button>
            </div>
        </form>

        
        <script src="{{ asset('js/manage-price-script.js') }}" defer></script>
    </div>
@endsection
