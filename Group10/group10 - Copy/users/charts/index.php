<!DOCTYPE html>
<html>
<head>
    <title>Coastal Care</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Assistant&display=swap" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
<style>
   #header {
            background-color: #007bff;
            color: #fff;
            text-align: center;
            padding: 20px 0;
        }
        .btn-info {
            background-color: #007bff;
            border-color: #007bff;
        }

   </style>
</head>
<body>
<div id="header">
        <h2>Coastal Care</h2>
    </div>
    <a href="../index.php" class="btn btn-primary float-right"><i class="fa fa-arrow-left"></i> Back to Index</a>
<canvas id="myChart"></canvas>
</body>
</html>
<script>
var labelsarr = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
var values = ["AAAA", 100, 10000, 2310, 24420, 30, 50000];

var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
   type: 'bar',
   data: {
      labels: labelsarr,
      datasets: [{
         label: 'Amount',
         data: values,
         backgroundColor: 'rgba(0, 119, 204, 0.8)',
      }]
   },
   options: {
      tooltips: {
         callbacks: {
            label: function(t, d) {
               var xLabel = d.datasets[t.datasetIndex].label;
               var yLabel = t.yLabel >= 1000 ? 'PHP ' + t.yLabel.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") : 'PHP ' + t.yLabel;
               return xLabel + ': ' + yLabel;
            }
         }
      },
      scales: {
         yAxes: [{
            ticks: {
               callback: function(value, index, values) {
                  if (parseInt(value) >= 1000) {
                     return 'PHP ' + value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                  } else {
                     return 'PHP' + value;
                  }
               }
            }
         }]
      }
   }
});
</script>