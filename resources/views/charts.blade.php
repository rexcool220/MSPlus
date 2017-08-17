<div class="container">
    <h2>Chart.js — Bar Chart Demo</h2>
    <div>
        <canvas id="myChart"></canvas>
    </div>
</div>
    <script>
        window.onload = function(){
            var ctx = document.getElementById("myChart").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["M", "T", "W", "T", "F", "S", "S"],
                    datasets: [{
                        label: 'apples',
                        data: [12, 19, 3, 17, 28, 24, 7],
                        backgroundColor: "rgba(153,255,51,1)"
                    }, {
                        label: 'oranges',
                        data: [30, 29, 5, 5, 20, 3, 10],
                        backgroundColor: "rgba(255,153,0,1)"
                    }]
                }
            });
        };
    </script>