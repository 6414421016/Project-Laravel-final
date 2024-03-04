@extends('layout')
@section('title')
@endsection

@section('content')
    <div class="manage-price-menu">

        <div class="text-manage-price">
            <h1>พิมพ์การชำละเงิน</h1>
        </div>

        <div class="savemoney_detail">
            <div>
                <h4>รายละเอียด</h4>
                <p>ชื่อ-นามสกุล :  <span>{{$savemoneybill->customer->customer_name}}</span></p>
                <p>ราคาตลาด :  <span>{{$savemoneybill->savemoney_bagc}}</span></p>
                <p>วิธีการชำระเงิน :  <span>{{$savemoneybill->savemoney_type}}</span></p>
                <p>รับเงิน :  <span>{{$savemoneybill->savemoney_receive}}</span></p>
                <p>เงินทอน :  <span>{{$savemoneybill->savemoney_change}}</span></p>
            </div>
        </div>

    </div>
@endsection
