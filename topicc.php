<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Topic Page</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/dashboard/">
    

        <!-- Bootstrap core CSS -->
        <link href="bootstrap.min.css" rel="stylesheet">
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


        <!-- Custom styles for this template -->
        <link href="dashboard.css" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
        
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    

</head>

<body>
<?php
include ('../stuInclude/header_topic.php');
?>
    <h2 class="h2">Real-time Environmental Monitoring Dashboard</h2>
    <br>

    <div id="progress-container" class="d-flex justify-content-center align-items-center">
        <div id="progress-circle" style="width: 100px; height: 100px; background-color: lightgray; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 24px;"></div>
    </div>


    <h2 class="h2">Graphique en Temps Réel</h2>
    <div style="width: 80%;">
        <canvas id="myChart"></canvas>
    </div>

    <script>
        function updateProgressCircle(value) {
            const progressCircle = document.getElementById("progress-circle");
            progressCircle.textContent = value + "%";
            const degrees = (360 * value) / 100;
            progressCircle.style.background = `conic-gradient(#27948e ${degrees}deg, lightgray 0)`;
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

<?php
include('../stuInclude/footer.php');
?>
</body>
</html>
