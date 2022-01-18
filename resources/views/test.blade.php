<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>testing page for testing website</title>
</head>
<body>
<style>@import url(https://fonts.googleapis.com/css?family=Roboto);

body {
  font-family: Roboto, sans-serif;
}

#chart {
  max-width: 650px;
  margin: 35px auto;
}
h1 {
    text-align: center;
}
</style>
<h1>Fishies</h1>
<div id="chart">
</div>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
var options = {
chart: {
type: 'line'
},
stroke: {
  curve: 'smooth',
},
series: [{
name: 'oxygen',
data: [90,86,87,88,91,95,94,91,102]
}],
xaxis: {
categories: ['12:00','13:00','14:00','15:00','16:00','17:00','18:00', '19:00','20:00']
}
}

var chart = new ApexCharts(document.querySelector("#chart"), options);

chart.render();
</script>
</body>
</html>