@extends('reclamations.layout')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Reclamation Status Summary</h3>
                    </div>
                    <div class="card-body">
                        <canvas id="statusChart"></canvas> <!-- Canvas for the pie chart -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // Create a pie chart
        var ctx = document.getElementById('statusChart').getContext('2d');
        var statusChart = new Chart(ctx, {
            type: 'bar', // Specify the chart type as 'pie'
            data: {
                labels: ['Accepted', 'Rejected', 'En cours'], // Pie chart labels
                datasets: [{
                    label: 'Reclamation Statuses',
                    data: [
                        {{ $statusStatistics['totalAccepted'] }},
                        {{ $statusStatistics['totalRejected'] }},
                        {{ $statusStatistics['totalEnCours'] }}
                    ], // Data for each slice of the pie
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.6)', // Color for Accepted
                        'rgba(255, 99, 132, 0.6)', // Color for Rejected
                        'rgba(255, 206, 86, 0.6)'  // Color for En cours
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 206, 86, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top', // Position of the legend
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.label + ': ' + tooltipItem.raw; // Custom tooltip format
                            }
                        }
                    }
                }
            }
        });
    </script>
@endsection
