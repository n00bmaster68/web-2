<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <style>
        .chart {
            text-align: center;
            margin: auto;
        }
        .row-chart {
            margin-bottom: 150px;
        }
    </style>
</head>
<body>
<div class="row-chart">
    <div class="col-6 chart">
        <canvas id="myChart2" width="500" height="400"></canvas>
    </div>
</div>
<script>
    let labels2 = ['American Airlines Group', 'Ryanair', 'China Southern Airlines', 'Lufthansa Group','Lufthansa Group','Lufthansa Group','Lufthansa Group','Lufthansa Group','Lufthansa Group','Lufthansa Group'];
    let data2 = [199.6, 130.3, 126.3, 130,12,157,88,180,156,77];
    let colors2 = [];
    for (let i = 0; i < data2.length; i++) {
        colors2.push('#'+(0x1000000+(Math.random())*0xffffff).toString(16).substr(1,6));
    }
    let myChart2 = document.getElementById("myChart2").getContext('2d');

    let chart2 = new Chart(myChart2, {
        type: 'bar',
        data: {
            labels: labels2,
            datasets: [ {
                data: data2,
                backgroundColor: colors2
            }]
        },
        options: {
            title: {
                text: "Number of passengers carried in 2017 (in mio.)",
                display: true
            },
            legend: {
            display: false
            }
        }
    });
</script>
</body>
</html>