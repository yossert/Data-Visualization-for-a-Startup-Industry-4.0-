<!DOCTYPE html>
<html>
<head>
    <title>Graphique en Temps Réel</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta charset="UTF-8">
</head>
<body>
    <h1>Graphique en Temps Réel</h1>
    <div style="width: 80%;">
        <canvas id="myChart"></canvas>
    </div>



    // Mettez à jour le graphique toutes les 5 secondes
        setInterval(updateChart, 15000);

    <script>
        var ctx = document.getElementById('myChart').getContext('2d');

        var data = {
            labels: [],
            datasets: [{
                label: 'Données en temps réel',
                borderColor: 'rgb(75, 192, 192)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                data: [],
                fill: true,
            }]
        };

        var myChart = new Chart(ctx, {
            type: 'line',
            data: data,
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
                        beginAtZero: true,
                        suggestedMax: 100
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

        function updateChart() {
    // Utilisez une requête AJAX pour récupérer les données de la base de données
    $.ajax({
        url: 'get_latest_humidity.php', // Assurez-vous que cette URL correspond à la route appropriée dans app.py
        method: 'GET',
        dataType: 'json',
        success: function (data) {
            // data devrait contenir les valeurs de la base de données
            // Mettez à jour le graphique avec ces données
            var label = new Date().toLocaleTimeString();
            var value = parseFloat(data.humidity); // Utilisez la valeur de la base de données

            addData(myChart, label, value);
        },
        error: function (xhr, status, error) {
            console.log("Error in AJAX request: " + error);
        }
    });
}








        // Mettez à jour le graphique toutes les 5 secondes
        setInterval(updateChart, 15000);
    </script>
</body>
</html>
