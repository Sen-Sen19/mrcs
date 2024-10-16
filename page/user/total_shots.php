<?php include 'plugins/navbar.php'; ?>
<?php include 'plugins/sidebar/user_bar.php'; ?>

<div class="content-wrapper">
    <!-- Sticky header section -->

    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">
                <div id="loadingSpinner"
                    style="display: none; background-color: white; padding: 10px; border-radius: 5px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.6);">
                    <img src="../../dist/img/6.gif" alt="Loading..." style="width: 50px; height: 50px;">
                    <p style="margin-top: 10px;">Please wait. Do not reload the page</p>
                </div>
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <button id="extractPlanBtn" class="btn btn-primary mt-3"
                            style="background-color: #008dff; border-color: #008dff; color: white; margin-right: 20px; width: 100%; max-width: 200px;margin-bottom: 30px;">
                            <i class="fas fa-layer-group"></i>Extract Total Shots
                        </button>
                        <input type="file" id="fileImport1" class="form-control" accept=".xlsx, .xls"
                            style="display: none;" />

                        <!-- Tab Navigation -->
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="file1-tab" data-toggle="tab" href="#file1" role="tab" aria-controls="file1" aria-selected="true">Tab 1</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="file2-tab" data-toggle="tab" href="#file2" role="tab" aria-controls="file2" aria-selected="false">Tab 2</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="file3-tab" data-toggle="tab" href="#file3" role="tab" aria-controls="file3" aria-selected="false">Tab 3</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" id="file4-tab" data-toggle="tab" href="#file4" role="tab" aria-controls="file4" aria-selected="false">Tab 4</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="tab-content" id="excelTabContent">
                    <div class="tab-pane fade show active" id="file1" role="tabpanel" aria-labelledby="file1-tab">
                        <div class="card card-gray-dark card-outline">

                            <div id="accounts_table_res1" class="table-responsive"
                                style="height: 100vh; overflow: auto; margin-top: 20px; border-top: 1px solid white; background-color: white; border-radius: 10px;">
                                <table id="header_table1" class="table table-sm table-head-fixed text-nowrap table-hover" style="font-size: 16px;">
                                    <thead style="text-align: left;">
                                        <tr>
                                            <th>Car Model</th>
                                            <th>Process</th>
                                            <th>1st Total Shots</th>
                                            <th>2nd Total Shots</th>
                                            <th>3rd Total Shots</th>

                                        </tr>
                                    </thead>

                                    <tbody id="table_body1" style="text-align: left;">
                                    </tbody>
                                </table>
                                <div id="loading" class="text-center" style="display: none;">
                                    <img src="../../dist/img/6.gif" alt="Loading..." style="width: 50px; height: 50px;">
                                    <p>Loading data, please wait...</p>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="tab-pane fade" id="file2" role="tabpanel" aria-labelledby="file2-tab">
    <div class="card card-gray-dark card-outline">

        <div id="accounts_table_res2" class="table-responsive"
            style="height: 100vh; overflow: auto; margin-top: 20px; border-top: 1px solid white; background-color: white; border-radius: 10px;">
            <table id="header_table2" class="table table-sm table-head-fixed text-nowrap table-hover" style="font-size: 16px;">
                <thead style="text-align: left;">
                    <tr>
                        <th>Car Model</th>
                        <th>Process</th>
                        <th>1st Total Shots</th>
                        <th>2nd Total Shots</th>
                        <th>3rd Total Shots</th>
                    </tr>
                </thead>

                <tbody id="table_body2" style="text-align: left;">
                    <!-- Data will be dynamically populated here -->
                </tbody>
            </table>
            <div id="loading2" class="text-center" style="display: none;">
                <img src="../../dist/img/6.gif" alt="Loading..." style="width: 50px; height: 50px;">
                <p>Loading data, please wait...</p>
            </div>
        </div>

    </div>
</div>

<div class="tab-pane fade" id="file3" role="tabpanel" aria-labelledby="file3-tab">
    <div class="card card-gray-dark card-outline">

        <div id="accounts_table_res3" class="table-responsive"
            style="height: 100vh; overflow: auto; margin-top: 20px; border-top: 1px solid white; background-color: white; border-radius: 10px;">
            <table id="header_table3" class="table table-sm table-head-fixed text-nowrap table-hover" style="font-size: 16px;">
                <thead style="text-align: left;">
                    <tr>
                        <th>Car Model</th>
                        <th>Process</th>
                        <th>1st Total Shots</th>
                        <th>2nd Total Shots</th>
                        <th>3rd Total Shots</th>
                    </tr>
                </thead>

                <tbody id="table_body3" style="text-align: left;">
                    <!-- Data will be dynamically populated here -->
                </tbody>
            </table>
            <div id="loading3" class="text-center" style="display: none;">
                <img src="../../dist/img/6.gif" alt="Loading..." style="width: 50px; height: 50px;">
                <p>Loading data, please wait...</p>
            </div>
        </div>

    </div>
</div>


<div class="tab-pane fade" id="file4" role="tabpanel" aria-labelledby="file4-tab">
    <div class="card card-gray-dark card-outline">

        <div id="accounts_table_res4" class="table-responsive"
            style="height: 100vh; overflow: auto; margin-top: 20px; border-top: 1px solid white; background-color: white; border-radius: 10px;">
            <table id="header_table4" class="table table-sm table-head-fixed text-nowrap table-hover" style="font-size: 16px;">
                <thead style="text-align: left;">
                    <tr>
                        <th>Car Model</th>
                        <th>Process</th>
                        <th>1st Total Shots</th>
                        <th>2nd Total Shots</th>
                        <th>3rd Total Shots</th>
                    </tr>
                </thead>

                <tbody id="table_body4" style="text-align: left;">
                    <!-- Data will be dynamically populated here -->
                </tbody>
            </table>
            <div id="loading4" class="text-center" style="display: none;">
                <img src="../../dist/img/6.gif" alt="Loading..." style="width: 50px; height: 50px;">
                <p>Loading data, please wait...</p>
            </div>
        </div>

    </div>
</div>

                </div>
            </div>
        </div>
    </div>
</div>


<script>
$(document).ready(function() {

    $.ajax({
        url: '../../process/fetch_total_shots.php', 
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            let tableBody = $('#table_body1'); 
            tableBody.empty(); 

            data.forEach(function(row) {
                let newRow = `<tr>
                                <td>${row.car_model}</td>
                                <td>${row.process}</td>
                                <td>${row.first_total_shots}</td>
                                <td>${row.second_total_shots}</td>
                                <td>${row.third_total_shots}</td>
                              </tr>`;
                tableBody.append(newRow);
            });
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error('Error fetching data: ' + textStatus, errorThrown);
        }
    });
    $(document).ready(function() {

    $('#extractPlanBtn').on('click', function() {
        let shotsData = [];

        $('#header_table1 tbody tr').each(function() {
            let carModel = $(this).find('td:nth-child(1)').text().trim();
            let process = $(this).find('td:nth-child(2)').text().trim();
            let firstTotalShots = $(this).find('td:nth-child(3)').text().trim();
            let secondTotalShots = $(this).find('td:nth-child(4)').text().trim();
            let thirdTotalShots = $(this).find('td:nth-child(5)').text().trim();

 
            if(carModel && process) {
                shotsData.push({
                    car_model: carModel,
                    process: process,
                    first_total_shots: firstTotalShots,
                    second_total_shots: secondTotalShots,
                    third_total_shots: thirdTotalShots
                });
            }
        });

  
        console.log("Collected shots data:", shotsData);

        if (shotsData.length > 0) {  
        
            $.ajax({
    url: '../../process/save_total_shots.php',
    type: 'POST',
    contentType: 'application/json',
    data: JSON.stringify({ shots_data: shotsData }), 
    success: function(response) {
        console.log("Data saved successfully", response);
        alert("Data saved successfully");
    },
    error: function(jqXHR, textStatus, errorThrown) {
        console.error('Error saving data: ' + textStatus, errorThrown);
        alert('Error saving data. Please try again.');
    }
});

        } else {
            alert("No data found in the table to send.");
        }
    });
});

});
$(document).ready(function() {
    // Function to fetch data when Tab 2 is shown
    $('#file2-tab').on('click', function() {
        $('#loading2').show(); // Show loading spinner
        $('#table_body2').empty(); // Clear previous data

        $.ajax({
            url: '../../process/fetch_total_shots_section1.php', // Replace with the actual path to your PHP file
            method: 'POST',
            data: {
                action: 'fetch_total_shots_section1' // Use this to determine what action to take in PHP
            },
            dataType: 'json', // Expect JSON response
            success: function(data) {
                // Hide loading spinner
                $('#loading2').hide();
                
                // Check if data is not empty
                if (data.length > 0) {
                    $.each(data, function(index, item) {
                        // Append new rows to the table
                        $('#table_body2').append(
                            '<tr>' +
                                '<td>' + item.car_model + '</td>' +
                                '<td>' + item.process + '</td>' +
                                '<td>' + item.first_total_shots + '</td>' +
                                '<td>' + item.second_total_shots + '</td>' +
                                '<td>' + item.third_total_shots + '</td>' +
                            '</tr>'
                        );
                    });
                } else {
                    $('#table_body2').append('<tr><td colspan="5" class="text-center">No data available</td></tr>');
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                $('#loading2').hide(); // Hide loading spinner
                console.error(textStatus, errorThrown); // Log error for debugging
                $('#table_body2').append('<tr><td colspan="5" class="text-center">Error fetching data</td></tr>');
            }
        });
    });
});

$(document).ready(function() {
    // Function to fetch data when Tab 2 is shown
    $('#file3-tab').on('click', function() {
        $('#loading3').show(); // Show loading spinner
        $('#table_body3').empty(); // Clear previous data

        $.ajax({
            url: '../../process/fetch_total_shots_section9.php',
            method: 'POST',
            data: {
                action: 'fetch_total_shots_section9' 
            },
            dataType: 'json', 
            success: function(data) {
                // Hide loading spinner
                $('#loading3').hide();
                
                // Check if data is not empty
                if (data.length > 0) {
                    $.each(data, function(index, item) {
                        // Append new rows to the table
                        $('#table_body3').append(
                            '<tr>' +
                                '<td>' + item.car_model + '</td>' +
                                '<td>' + item.process + '</td>' +
                                '<td>' + item.first_total_shots + '</td>' +
                                '<td>' + item.second_total_shots + '</td>' +
                                '<td>' + item.third_total_shots + '</td>' +
                            '</tr>'
                        );
                    });
                } else {
                    $('#table_body3').append('<tr><td colspan="5" class="text-center">No data available</td></tr>');
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                $('#loading3').hide(); // Hide loading spinner
                console.error(textStatus, errorThrown); // Log error for debugging
                $('#table_body3').append('<tr><td colspan="5" class="text-center">Error fetching data</td></tr>');
            }
        });
    });
});


$(document).ready(function() {
    // Function to fetch data when Tab 2 is shown
    $('#file4-tab').on('click', function() {
        $('#loading4').show(); // Show loading spinner
        $('#table_body4').empty(); // Clear previous data

        $.ajax({
            url: '../../process/fetch_total_shots_section6.php',
            method: 'POST',
            data: {
                action: 'fetch_total_shots_section6' 
            },
            dataType: 'json', 
            success: function(data) {
                // Hide loading spinner
                $('#loading3').hide();
                
                // Check if data is not empty
                if (data.length > 0) {
                    $.each(data, function(index, item) {
                        // Append new rows to the table
                        $('#table_body4').append(
                            '<tr>' +
                                '<td>' + item.car_model + '</td>' +
                                '<td>' + item.process + '</td>' +
                                '<td>' + item.first_total_shots + '</td>' +
                                '<td>' + item.second_total_shots + '</td>' +
                                '<td>' + item.third_total_shots + '</td>' +
                            '</tr>'
                        );
                    });
                } else {
                    $('#table_body4').append('<tr><td colspan="5" class="text-center">No data available</td></tr>');
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                $('#loading4').hide(); // Hide loading spinner
                console.error(textStatus, errorThrown); // Log error for debugging
                $('#table_body4').append('<tr><td colspan="5" class="text-center">Error fetching data</td></tr>');
            }
        });
    });
});



</script>


<?php include 'plugins/footer.php'; ?>
