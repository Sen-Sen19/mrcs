<?php include 'plugins/navbar.php'; ?>
<?php include 'plugins/sidebar/user_bar.php'; ?>

<div class="tab-content" id="excelTabContent" style="height: calc(100vh - 60px); padding: 10px;"> <!-- Adjust for the header height -->
    <div id="chart" style="height: 300px; width: 400px; margin: auto; position: relative;"></div> <!-- Div for the bar chart -->
</div>

<?php include 'plugins/footer.php'; ?>

<!-- Include ApexCharts from CDN -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>
// Fetch data from your PHP script
fetch('../../process/dashboard_tbl.php') // Replace with the actual path to your PHP script
    .then(response => response.json())
    .then(data => {
        // Check for errors
        if (data.error) {
            console.error('Database error:', data.error);
            return;
        }

        // Prepare data for the chart
        const categories = data.map(item => item.car_model);
        const seriesData = data.map(item => item.machine_requirements); // Use the machine_requirements for the bar chart

        // Create the bar chart
        const options = {
            chart: {
                type: 'bar',
                height: '100%',
            },
            series: [{
                name: 'Machine Requirements',
                data: seriesData,
            }],
            xaxis: {
                categories: categories,
                title: {
                    text: 'Car Models',
                },
            },
            yaxis: {
                title: {
                    text: 'Requirements',
                },
            },
            title: {
                text: 'Machine Requirements per Car Model',
                align: 'center',
            },
        };

        const chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    })
    .catch(error => console.error('Fetch error:', error));
</script>
