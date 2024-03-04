@extends('layout')
@section('title')
    
@endsection

@section('content')
    <div class="customer-menu">

        <div class="text-customer">
            <h1>ข้อมูลลูกค้า</h1>
        </div>

        <div class="button-customer">
            <a href=""><i class="ri-add-line"><span>เพิ่ม</span></i></a>
        </div>
        <h3>ฟอร์มบันทึกข้อมูลลูกค้า</h3>

        <form action="{{route('insertCustomer')}}" class="form-customer-add" method="POST">
            @csrf
            <label for="">ชื่อ-นามสกุล : </label>
            <input type="text" name="customer_name" placeholder="ชื่อ-นามสกุล"><br>
            <label for="">เบอร์โทรศัพท์ : </label>
            <input type="number" name="customer_phone" placeholder="กรุณาใส่เบอร์โทร"><br>
            <div class="button-close_add-customer">
                <a href="{{route("customer")}}">ยกเลิก</a>
                <button type="submit">เพิ่มข้อมูล</button>
            </div>
        </form>

        
        
    </div>
@endsection
