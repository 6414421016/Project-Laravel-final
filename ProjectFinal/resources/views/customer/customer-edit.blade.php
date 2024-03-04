@extends('layout')
@section('title')
    
@endsection

@section('content')
    <div class="customer-menu">

        <div class="text-customer">
            <h1>ข้อมูลลูกค้า</h1>
        </div>

        {{-- <div class="button-customer">
            <a href="{{route("customer-add")}}"><i class="ri-add-line"><span>เพิ่ม</span></i></a>
        </div> --}}

        <h3>ฟอร์มแก้ไขข้อมูลลูกค้า</h3>
        <form action="{{route('updateCustomer', $editCustomer->id)}}" method="POST" class="form-customer-add">
            @csrf
            <label for="">ชื่อ-นามสกุล : </label>
            <input type="text" name="customer_name" value="{{$editCustomer->customer_name}}"><br>
            <label for="">เบอร์โทรศัพท์ : </label>
            <input type="number" name="customer_phone" value="{{$editCustomer->customer_phone}}"><br>
            <div class="button-close_edit-customer">
                <a href="{{route("customer")}}">ยกเลิก</a>
                <button type="submit">บันทึก</button>
            </div>
        </form>

        
        
    </div>
@endsection
