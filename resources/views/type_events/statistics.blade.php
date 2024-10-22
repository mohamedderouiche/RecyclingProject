@extends('reclamations.layout')

@section('content')
<div class="container">
    <h1>Type Event Statistics</h1>

    <!-- Card container for the chart -->
    <div class="card mb-4">
        <div class="card-header">
            Event Statistics Chart by Type
        </div>
        <div class="card-body" style="text-align: center;">
            <!-- Set specific width and height for the chart -->
            <canvas id="eventChart" style="max-width: 900px; max-height: 400px;"></canvas>
        </div>
    </div>

    <div class="d-flex justify-content-center mt-2">
        <a href="{{ url('/events') }}" class="btn btn-primary">Return</a>
    </div>
</div>

<!-- Include Chart.js via CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Prepare data for Chart.js
    var eventTypes = @json($statistics->pluck('title'));  // Get the event type titles
    var eventTotals = @json($statistics->pluck('total')); // Get the event totals

    var ctx = document.getElementById('eventChart').getContext('2d');
    var eventChart = new Chart(ctx, {
        type: 'pie', // Pie chart type
        data: {
            labels: eventTypes,
            datasets: [{
                label: 'Total Events',
                data: eventTotals,
                backgroundColor: [
                    'rgba(54, 162, 235, 0.6)',
                    'rgba(255, 99, 132, 0.6)',
                    'rgba(255, 206, 86, 0.6)',
                    'rgba(75, 192, 192, 0.6)',
                    'rgba(153, 102, 255, 0.6)',
                    'rgba(255, 159, 64, 0.6)'
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,  // Ensures the chart adjusts based on screen size
            plugins: {
                legend: {
                    position: 'top', // Legend position
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return tooltipItem.label + ': ' + tooltipItem.raw; // Custom tooltip label
                        }
                    }
                }
            }
        }
    });
</script>
@endsection
