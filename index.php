<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Single Page System</title>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <link href="https://cdn.jsdelivr.net/npm/gridjs/dist/theme/mermaid.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/gridjs/dist/gridjs.umd.js"></script>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-image: url('1.jpg');
            background-size: cover;
            background-position: center;
            font-family: Arial, sans-serif;
            height: 100vh;
            display: flex;
            align-items: flex-start;
            padding: 20px;
            overflow: hidden; /* Prevent page scrolling */
        }

        .main-container {
            display: flex;
            flex-direction: column;
            width: 100%;
        }

        .grid-chart-container {
            display: flex; /* Use flexbox to arrange grid and chart horizontally */
            gap: 20px; /* Space between the grid and chart */
            margin-bottom: 20px; /* Space below the grid-chart container */
        }

        .grid-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            max-width: 400px;
            margin-right: 20px; /* Adjust margin if needed */
        }

        .data-section {
            height: 180px;
            background-color: rgba(255, 255, 255, 1);
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        .data-section h2 {
            font-size: 1.5em;
            margin-bottom: 5px;
        }

        .data-section p {
            font-size: 2em;
            font-weight: bold;
            color: RED;
        }

        #chart {
            width: 100%;
            height: 380px;
            background-color: rgba(255, 255, 255, 1);
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.7);
        }

        #wrapper {
            width: 60%; /* Set the width to 60% */
            margin: 0; /* Remove margin to place in the left corner */
            max-height: 300px; /* Set max height for the table wrapper */
            overflow: auto; /* Allow scrolling for the table wrapper */
        }

        .gridjs-table {
            width: 100%; /* Ensure the table takes full width */
            border-collapse: collapse; /* Collapse borders for the header */
        }

        .gridjs-header {
            position: sticky; /* Make the header sticky */
            top: 0; /* Stick to the top */
            background-color: white; /* Background for the header */
            z-index: 10; /* Ensure the header is above the table content */
        }

        @media (max-width: 768px) {
            .data-section {
                height: 150px;
                font-size: 0.9em;
            }

            .data-section h2 {
                font-size: 1.2em;
            }

            .data-section p {
                font-size: 1.5em;
            }

            #chart {
                height: 300px;
            }
        }

        @media (max-width: 480px) {
            .data-section {
                height: 120px;
            }

            .data-section h2 {
                font-size: 1em;
            }

            .data-section p {
                font-size: 1.2em;
            }

            #chart {
                height: 250px;
            }
        }

    </style>
</head>
<body>
<div class="main-container">
    <div class="grid-chart-container">
        <div class="grid-container">
            <div id="dataCountContainer" class="data-section">
                <h2>CAR MODEL</h2>
                <p id="dataCount">Loading...</p> 
            </div>

            <div id="dataJphContainer" class="data-section">
                <h2>JPH</h2>
                <p id="dataJph">Loading...</p>
            </div>

            <div id="dataAverageContainer" class="data-section">
                <h2>MACHINE INVENTORY</h2>
                <p id="dataAverage">Loading...</p>
            </div>

            <div id="dataTotalShotContainer" class="data-section">
                <h2>SHOT</h2>
                <p id="dataTotalShot">Loading...</p>
            </div>
        </div>

        <div id="chart"></div>
    </div>

    <!-- Wrapper for Grid.js table positioned in the left corner -->
    <div id="wrapper"></div> 
</div>

<script>
    window.onload = function() {
        fetch('process/dashboard_tbl.php')
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    document.getElementById('dataCount').innerText = 'Error';
                    document.getElementById('dataAverage').innerText = 'Error';
                    document.getElementById('dataJph').innerText = 'Error';
                    document.getElementById('dataTotalShot').innerText = 'Error';
                } else {
                    document.getElementById('dataCount').innerText = data.length;

                    let totalMachineInventory = 0, machineInventoryCount = 0;
                    let totalJph = 0, jphCount = 0;
                    let totalShots = 0, shotsCount = 0;

                    const carModels = [];
                    const machineRequirements = [];

                    data.forEach(row => {
                        if (row.machine_inventory) {
                            totalMachineInventory += parseFloat(row.machine_inventory);
                            machineInventoryCount++;
                        }

                        if (row.jph) {
                            totalJph += parseFloat(row.jph);
                            jphCount++;
                        }

                        if (row.total_shot) {
                            totalShots += parseFloat(row.total_shot);
                            shotsCount++;
                        }

                        if (row.car_model && row.machine_requirements) {
                            carModels.push(row.car_model);
                            machineRequirements.push(row.machine_requirements);
                        }
                    });

                    let averageMachineInventory = machineInventoryCount > 0 ? (totalMachineInventory / machineInventoryCount).toFixed(2) : 'N/A';
                    let averageJph = jphCount > 0 ? (totalJph / jphCount).toFixed(2) : 'N/A';
                    let averageTotalShot = shotsCount > 0 ? (totalShots / shotsCount).toFixed(2) : 'N/A';

                    document.getElementById('dataAverage').innerText = averageMachineInventory;
                    document.getElementById('dataJph').innerText = averageJph;
                    document.getElementById('dataTotalShot').innerText = averageTotalShot;

                    const options = {
                        chart: {
                            type: 'bar',
                            height: 300
                        },
                        series: [{
                            name: 'Machine Requirements',
                            data: machineRequirements
                        }],
                        xaxis: {
                            categories: carModels,
                            title: {
                                text: 'Car Models'
                            }
                        },
                        title: {
                            text: 'Car Models vs Machine Requirements'
                        }
                    };

                    const chart = new ApexCharts(document.querySelector("#chart"), options);
                    chart.render();
                }
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });

        // Fetch for Grid.js table data
        fetch('process/dashboard_tbl.php')
            .then(response => response.json())
            .then(data => {
                new gridjs.Grid({
                    columns: [
                        { name: 'Car Model', sort: true },
                        { name: 'Machine Inventory', sort: true },
                        { name: 'JPH', sort: true },
                        { name: 'Working Time', sort: true },
                        { name: 'Total Shot', sort: true },
                        { name: 'OT', sort: true },
                        { name: 'Lack/Excess', sort: true },
                        { name: 'Machine Requirements', sort: true }
                    ],
                    data: data.map(row => [
                        row.car_model,
                        row.machine_inventory,
                        row.jph,
                        row.working_time,
                        row.total_shot,
                        row.ot,
                        row.lack_excess,
                        row.machine_requirements
                    ]),
                    sort: true, 
                    pagination: false, 
                    search: true, 
                    className: {
                        table: 'gridjs-table', 
                        header: 'gridjs-header'
                    }
                }).render(document.getElementById("wrapper"));
            })
            .catch(error => {
                console.error('Error fetching table data:', error);
            });
    };
</script>
</body>
</html>
