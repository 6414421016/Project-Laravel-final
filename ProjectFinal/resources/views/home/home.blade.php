@extends('layout')
@section('title')
    
@endsection

@section('content')
    <div class="home-menu">
        <div class="text-home">
            <h1>สรุป</h1>
        </div>

        <div class="data-home">
            <div class="data-box1">
                <h2>จำนวน <br>ลูกค้า</h2>
                <h2>{{$data}} คน</h2>
            </div>
            <div class="data-box2">
                <h2>จำนวนที่นำ <br>ผักเข้า</h2>
                <h2>{{$vegetpriceWeightCount}} กก.</h2> 
            </div>
            <div class="data-box3">
                <h2>จำนวน <br>รายได้</h2>
                <h2>{{$vegetpricePriceCount}} บาท</h2>
            </div>
        </div>

        <h2>แสดงจำนวนรายได้ตามเดือน</h2>

        <div class="datalist-month-home">
            <div class="datalist-data">
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById("myChart").getContext("2d");
        const data = {
            labels: @json($months),
            datasets: [{
                label: "รายได้",
                data: @json($incomes),
                type: "bar",
                fill: false,
                borderColor: "#0000ff",
                backgroundColor: "rgba(0, 0, 255, 0.3)"
            }]
        };

        const config = {
            type: "line",
            data: data,
            options: {
                title: {
                    text: "กราฟสรุปรายได้"
                },
                tooltips: {
                    enabled: true
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        };

        new Chart(ctx, config);
    </script>
      
@endsection
