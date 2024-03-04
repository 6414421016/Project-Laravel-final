@extends('layout')
@section('title')
    
@endsection

@section('content')
    <div class="manage-price-menu">

        <div class="text-manage-price">
            <h1>ข้อมูลจัดการราคา</h1>
        </div>

        <div class="button-manage-price">
            <a href=""><i class="ri-add-line"><span>เพิ่ม</span></i></a>
        </div>

        <h3>ฟอร์มบันทึก</h3>

        <form action="{{route('insertVegetprice')}}" class="form-manage-price-add" method="POST">
            @csrf
            {{-- <label for="">รหัสลูกค้า : </label>
            <input type="number" placeholder="เลขลูกค้า 3 หลัก"><br> --}}
            <label for="">ชื่อ-นามสกุล : </label>
            <select name="customer_name">
                @foreach ($customers as $item)
                <option>{{$item->customer_name}}</option>
                @endforeach
            </select><br>
            <label for="">วันที่นำผักมาคัด : </label>
            <input type="date" name="vegetprice_date" placeholder="กำหนดวันที่"><br>
            <label for="">ประเภทผัก : </label>
            <input type="text" name="vegetprice_veget" placeholder="กำหนดพันธุ์ผัก"><br>
            <label for="">จำนวนถุงผัก : </label>
            <input type="text" name="vegetprice_quantity" placeholder="จำนวนถุงผัก"><br>
            <label for="">น้ำหนักผัก : </label>
            <input type="number" name="vegetprice_weight" placeholder="กรุณาใส่น้ำหนักผัก(x30)" id="number" oninput="calculate()"><br>
            <label for="">ราคา : </label>
            <input type="number" name="vegetprice_price" placeholder="กำหนดจำนวนราคา" id="result"><br>
            <div class="button-close_add-manage-price">
                <a href="{{route("manage-price")}}">ยกเลิก</a>
                <button type="submit">เพิ่มข้อมูล</button>
            </div>
        </form>

        
        <script src="{{ asset('js/manage-price-script.js') }}" defer></script>
    </div>
@endsection
