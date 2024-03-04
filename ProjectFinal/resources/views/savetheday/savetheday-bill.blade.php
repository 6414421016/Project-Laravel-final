<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bill</title>
    <link rel="stylesheet" href="{{ asset('css/style-savetheday-bill.css') }}">
</head>
<body>
    <div class="container">
        <div class="header">
          <h1>บริษัทย่อย ต้นหล่อ</h1>
          <p>เลขที่ 111 วราเทพ ธัญญารักษ์ <br>จันทบุรี 22210</p>
          <p>เบอร์โทร : 0111222333</p>
        </div>
          <div class="info">
            <p>พนักงาน : {{auth()->user()->name}}</p>
            <p>ชื่อลูกค้า : {{$vegetdateCustomer}}</p>
            <p>ชื่อผัก : {{$vegetdateRiceprice}}</p>
          </div>
          <div class="details">
            <table>
              <tr>
                {{-- <th>วันที่</th>
                <td>D01</td> --}}
              </tr>
              <tr>
                <th>วันที่มารับบิล</th>
                <td>{{$vegetdateDate}}</td>
              </tr>
            </table>
          </div>
        <div class="footer">
          <p>ขอบคุณที่ใช้บริการ</p>
        </div>
      </div>
      <div class="button">
        <button><a href="{{route('savetheday')}}">Back</a></button>
      </div>
</body>
</html>