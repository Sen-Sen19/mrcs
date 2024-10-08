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
                       
                        </div>
                    </div>
                <div class="tab-content" id="excelTabContent">
                    <div class="tab-pane fade show active" id="file1" role="tabpanel" aria-labelledby="file1-tab">
                        <div class="card card-gray-dark card-outline">
                         
                            <div id="accounts_table_res1" class="table-responsive"
                                style="height: 100vh; overflow: auto; margin-top: 20px; border-top: 1px solid white; background-color: white; border-radius: 10px;">
                                <table id="header_table1" class="table table-sm table-head-fixed text-nowrap table-hover" style="font-size: 16px;">
                                    <thead style="text-align: center;">
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
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Fetch and display the data in the table when the page loads
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
                                <td>${row.value}</td>
                                <td>${row.second_value}</td>
                                <td>${row.third_value}</td>
                              </tr>`;
                tableBody.append(newRow);
            });
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error('Error fetching data: ' + textStatus, errorThrown);
        }
    });
    $(document).ready(function() {
    // When the extract button is clicked
    $('#extractPlanBtn').on('click', function() {
        let shotsData = []; // Define shotsData to store table data

        // Loop through each row of the table and collect the data
        $('#header_table1 tbody tr').each(function() {
            let carModel = $(this).find('td:nth-child(1)').text().trim();
            let process = $(this).find('td:nth-child(2)').text().trim();
            let firstTotalShots = $(this).find('td:nth-child(3)').text().trim();
            let secondTotalShots = $(this).find('td:nth-child(4)').text().trim();
            let thirdTotalShots = $(this).find('td:nth-child(5)').text().trim();

            // Add row data to shotsData array
            if(carModel && process) { // Only push rows that have valid data
                shotsData.push({
                    car_model: carModel,
                    process: process,
                    first_total_shots: firstTotalShots,
                    second_total_shots: secondTotalShots,
                    third_total_shots: thirdTotalShots
                });
            }
        });

        // Log the data to the console for debugging
        console.log("Collected shots data:", shotsData);

        if (shotsData.length > 0) {  // Proceed only if there's data
            // Send the collected data to the server via AJAX
            $.ajax({
    url: '../../process/save_total_shots.php',
    type: 'POST',
    contentType: 'application/json', // Explicitly set the content type
    data: JSON.stringify({ shots_data: shotsData }), // Convert data to JSON string
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
</script>


<?php include 'plugins/footer.php'; ?>
