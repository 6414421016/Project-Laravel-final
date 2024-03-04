<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/style-header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style-home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style-customer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style-manage-price.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style-savetheday.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style-savemoney-bill.css') }}">
    {{-- icon Remix Icon  --}}
    <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.0.0/fonts/remixicon.css"
    rel="stylesheet"
/>
    {{-- bootstrap  --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

    <section>

        {{-- header design --}}
        <header>
            <div class="user-id">
                <div class="user-id-box1">
                    <div class="img-user">
                        <img src="{{asset('logo/logo.png')}}" alt="">   
                    </div>
                </div>

                <div class="text-user">
                    <h2>Admin</h2>
                    <p>{{auth()->user()->name}}</p>
                    <a href="{{route('logout')}}">Logout</a>
                </div>

                <div class="menu">

                    <div class="menu-item1">
                        <a href="{{route('home')}}">
                            <i class="ri-home-8-line"></i>
                            <h2>หน้าหลัก</h2>
                        </a>
                    </div>
    
                    <div class="menu-item2">
                        <a href="{{route('customer')}}" onclick="changeBackground(this)">
                            <i class="ri-file-list-3-line"></i>
                            <h2>ข้อมูลลูกค้า</h2>
                        </a>
                    </div>
    
                    <div class="menu-item3">
                        <a href="{{route('manage-price')}}" onclick="changeBackground(this)">
                            <i class="ri-file-3-line"></i>
                            <h2>จัดการราคา</h2>
                        </a>
                    </div>
    
                    <div class="menu-item4">
                        <a href="{{route('savetheday')}}">
                            <i class="ri-calendar-2-line"></i>
                            <h2>บันทึกวันมารับ</h2>
                        </a>
                    </div>
    
                    <div class="menu-item5">
                        <a href="{{route('savemoney')}}">
                            <i class="ri-hand-coin-line"></i>
                            <h2>พิมพ์ใบเสร็จ</h2>
                        </a>
                    </div>
    
                </div>
            </div>

        </header>


        {{-- content design  --}}
        @yield('content')

    </section>

    <script src="{{ asset('js/script.js') }}" defer></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body> 
</html>