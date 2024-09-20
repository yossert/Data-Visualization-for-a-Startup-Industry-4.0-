<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Topic Page</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        h1 {
            color: #ff69b4;
        }
    </style>
</head>
<body>
    <h1>Real-time Environmental Monitoring Dashboard</h1>
    <div id="progress-container">
        <div id="progress-circle" style="width: 100px; height: 100px; background-color: lightgray; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 24px;"></div>
    </div>

    <h1>Graphique en Temps Réel</h1>
    <div style="width: 80%;">
        <canvas id="myChart"></canvas>
    </div>

    <script>
        function updateProgressCircle(value) {
            const progressCircle = document.getElementById("progress-circle");
            progressCircle.textContent = value + "%";
            const degrees = (360 * value) / 100;
            progressCircle.style.background = `conic-gradient(green ${degrees}deg, lightgray 0)`;
        }

        var ctx = document.getElementById('myChart').getContext('2d');

        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [],
                datasets: [{
                    label: 'Données en temps réel',
                    borderColor: 'rgb(75, 192, 192)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    data: [],
                    fill: true,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: [{
                        type: 'linear',
                        position: 'bottom',
                        ticks: {
                            beginAtZero: true
                        }
                    }],
                    y: [{
                        type: 'linear',
                        position: 'left',
                        ticks: {
                            beginAtZero: true,
                            suggestedMax: 100
                        }
                    }]
                }
            }
        });

        function addData(chart, label, data) {
            chart.data.labels.push(label);
            chart.data.datasets[0].data.push(data);

            if (chart.data.labels.length > 10) {
                chart.data.labels.shift();
                chart.data.datasets[0].data.shift();
            }

            chart.update();
        }

        function fetchLatestHumidity() {
            $.ajax({
                url: 'get_lastest_humidity.php',
                method: 'GET',
                dataType: 'json',
                success: function (data) {
                    const latestHumidity = parseFloat(data.humidity);
                    updateProgressCircle(latestHumidity);
                },
                error: function (xhr, status, error) {
                    console.log("Error in AJAX request: " + error);
                }
            });
        }

        function updateChart() {
            $.ajax({
                url: 'get_lastest_humidity.php',
                method: 'GET',
                dataType: 'json',
                success: function (data) {
                    var label = new Date().toLocaleTimeString();
                    var value = parseFloat(data.humidity);
                    addData(myChart, label, value);
                },
                error: function (xhr, status, error) {
                    console.log("Error in AJAX request: " + error);
                }
            });
        }

        function updateCombined() {
            fetchLatestHumidity();
            updateChart();
        }

        // Mettez à jour la valeur initiale en chargeant la page
        fetchLatestHumidity();

        // Mettez à jour la valeur toutes les X millisecondes (par exemple, toutes les 5 secondes)
        setInterval(updateCombined, 5000);
    </script>
</body>
</html>
