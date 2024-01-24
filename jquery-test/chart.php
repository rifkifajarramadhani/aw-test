<!DOCTYPE html>

<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
      * {
        margin: 0;
        padding: 0;
        font-family: sans-serif;
      }
      .chartCard {
        width: 100vw;
        height: calc(100vh - 40px);
        display: flex;
        align-items: center;
        justify-content: center;
      }
      .chartBox {
        width: 700px;
        padding: 20px;
        background: white;
      }
      canvas {
        width: 800px;
        height: 800px;
      }
    </style>

  </head>

  <body>

    <div class="chartCard">
      <div class="chartBox">
        <canvas id="myChart"></canvas>
      </div>
    </div>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
      // setup the datas
      const datas = [
        { 
          "name": "U.S. Equities", "color": "#47A5D2", "value": 45.8
        },
        { 
          "name": "Europe Equities", "color": "#72B9DC", "value": 13.6
        },
        { 
          "name": "Asia Pacific Equities", "color": "#A1C3D3", "value": 7.5
        },
        { 
          "name": "Emerging Market Equities", "color": "#C5E2F1", "value": 8.1
        },
        { 
          "name": "U.S. Govt. Bonds", "color": "#AFEBE8", "value": 6.8
        },
        { 
          "name": "International Govt. Bonds", "color": "#43D1CB", "value": 10.5
        },
        { 
          "name": "Cash", "color": "#AFABAB", "value": 7.7
        }
      ];
      var labels = datas.map(function(e) {
          return e.name;
      });
      var values = datas.map(function(e) {
          return e.value;
      });
      var backgrounds = datas.map(function(e) {
          return e.color;
      });

      const data = {
        labels: labels,
        datasets: [{
          label: 'Dummy Data AutoWealth',
          data: values,
          backgroundColor: backgrounds,
          borderColor: backgrounds,
          borderWidth: 1,
          cutout: '80%'
        }]
      };

      // create the label outside
      const labelsOutside = {
        id: 'labelsOutside',
        afterDraw(chart, args, options) {
          const {ctx, chartArea: {top, bottom, left, right, width, height}} = chart;

          chart.data.datasets.forEach((dataset, i) => {
            chart.getDatasetMeta(i).data.forEach((datapoint, index) => {
              const {x, y} = datapoint.tooltipPosition();

              // initiate line foe outside labels
              const halfWidth = width / 2;
              const halfHeight = height / 2;

              const xLine = x >= halfWidth ? x + 50 : x - 50;
              const yLine = y >= halfHeight ? y + 50 : y - 50;
              const extraLine = x >= halfWidth ? 15 : -15;

              // draw line
              ctx.beginPath();
              ctx.moveTo(x ,y);
              ctx.lineTo(xLine, yLine);
              ctx.lineTo(xLine + extraLine, yLine);
              ctx.strokeStyle = 'gray';
              ctx.stroke();

              // initiate text for outside labels
              const text = chart.data.labels[index];
              const value = dataset.data[index];
              const fill = `${text} ${value}%`;
              const wrap = fill.split(' ');
              ctx.font = '12px Arial';

              // set the position
              const textXPosition = x >= halfWidth ? 'left' : 'right';
              const textXMargin = x >= halfWidth ? 5 : -5 ;
              const lineHeight = 15;
              ctx.textAlign = textXPosition;
              ctx.fillStyle = 'gray';
              for(var i = 0; i < wrap.length; i++) {
                ctx.fillText(wrap[i], xLine + extraLine + textXMargin, yLine + (i / 1.25 * lineHeight));
              }
            })
          })
        }
      }

      // config 
      const config = {
        type: 'doughnut',
        data,
        options: {
          responsive: true,
          layout: {
            padding: 100,
          },
          maintainAspectRatio: false,
          plugins : {
            legend: {
              display: false
            }
          }
        },
        plugins: [labelsOutside]
      };

      // render the chart
      const myChart = new Chart(
        document.getElementById('myChart'),
        config
      );
    </script>

  </body>
  
</html>