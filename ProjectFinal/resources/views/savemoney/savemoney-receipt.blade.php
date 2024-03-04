<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bill</title>
    <link rel="stylesheet" href="{{ asset('css/style-savemoney-receipt.css') }}">
</head>
<body>
    <div class="container">
        <div class="header">
          <h1>บริษัทย่อย ต้นหล่อ</h1>
          <p>เลขที่ 111 วราเทพ ธัญญารักษ์ จันทบุรี 22210</p>
          <p>เบอร์โทร : 0111222333</p>
        </div>
        <div class="body">
          <div class="info">
            <p>พนักงาน : {{auth()->user()->name}}</p>
            <p>ชื่อลูกค้า : {{$vegetdateCustomer}}</p>
            <p>พันธุ์ข้าว : {{$vegetdateVegetprice}}</p> 
          </div>
          <div class="details">
            <table>
              <tr>

              </tr>
              <tr>
                <th>วันที่</th>
                <td>{{$vegetdateDate}}</td>
              </tr>
            </table>
          </div>
          <div class="body">
            <p>ราคาตลาด : <span>{{$savemoneyId->savemoney_bagc}}</span></p>
            <p>ชำระเงิน : <span>{{$savemoneyId->savemoney_type}}</span></p>
            <p>รับเงิน : <span>{{$savemoneyId->savemoney_receive}}</span></p>
            <p>เงินทอน : <span>{{$savemoneyId->savemoney_change}}</span></p>
          </div>
        </div>
        <div class="footer">
          <p>ขอบคุณที่ใช้บริการ</p>
        </div>
      </div>
      <div class="button">
        <button><a href="{{route('savemoney')}}">Back</a></button>
      </div>
</body>
</html>