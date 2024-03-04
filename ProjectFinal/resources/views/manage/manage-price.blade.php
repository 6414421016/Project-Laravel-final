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

        <table class="table" style="width: 95%">
            <thead>
              <tr>
                <th scope="col">NO.</th>
                <th scope="col">ชื่อ-นามสกุล</th>
                <th scope="col">วันที่นำผักมา</th>
                <th scope="col">ชื่อผัก</th>
                <th scope="col">จำนวนถุง</th>
                <th scope="col">น้ำหนัก</th>
                <th scope="col">ราคา</th>
                <th scope="col">แก้ไข</th>
                <th scope="col">ลบ</th> 
              </tr>
            </thead>
            <thead>
              @foreach ($vegetprices as $item)
              <tr>
                <td>{{$item->id}}</td>
                <td class="table-td-name-manage-price">{{$item->customer->customer_name}}</td>
                <td>{{$item->vegetprice_date}}</td>
                <td>{{$item->vegetprice_veget}}</td>
                <td>{{$item->vegetprice_quantity}} <span>ถุง</span></td>
                <td>{{$item->vegetprice_weight}} <span>กก.</span></td>
                <td>{{$item->vegetprice_price}} <span>บาท</span></td>
                <td id="td-icon-manage-price-edit"> <a href="{{route('editVegetprice',$item->id)}}"><i class="ri-file-edit-line"></i></a> </td>
                <td id="td-icon-manage-price-delete"><a href="{{route('deleteVegetprice',$item->id)}}"><i class="ri-delete-bin-6-line"></i></a></td>
              </tr>
              @endforeach
            </thead>
          </table>
        
    </div>
@endsection
