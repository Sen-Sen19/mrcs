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

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="totalShots-tab" data-toggle="tab" href="#file1" role="tab" aria-controls="file1" aria-selected="true">Total Shots</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="first_month-tab" data-toggle="tab" href="#first_month" role="tab" aria-controls="first_month" aria-selected="false">First Month</a>
                    </li>
                </ul>

                <div class="tab-content" id="excelTabContent">
                    <!-- Total Shots Tab -->
                    <div class="tab-pane fade show active" id="file1" role="tabpanel" aria-labelledby="totalShots-tab">
                        <div class="card card-gray-dark card-outline">
                            <div id="accounts_table_res1" class="table-responsive"
                                style="height: 100vh; overflow: auto; margin-top: 20px; border-top: 1px solid white; background-color: white; border-radius: 10px;">
                                <table id="header_table1" class="table table-sm table-head-fixed text-nowrap table-hover" style="font-size: 14px;">
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

                    <!-- first_month Tab -->
                    <div class="tab-pane fade" id="first_month" role="tabpanel" aria-labelledby="first_month-tab">
                        <div class="card card-gray-dark card-outline">
                            <div id="first_month_table" class="table-responsive"
                                style="height: 100vh; overflow: auto; margin-top: 20px; border-top: 1px solid white; background-color: white; border-radius: 10px;">
                                <table id="first_month_table_header" class="table table-sm table-head-fixed text-nowrap table-hover" style="font-size: 14px;">
                                    <thead style="text-align: left;"> 
                                        <tr>
                                            <th>Process</th>
                                            <th>Machine Requirements</th>
                                            <th>JPH</th>
                                            <th>WT</th>
                                            <th>OT</th>
                                            <th>MP Shift</th>
                                        </tr>
                                    </thead>

                                    <tbody id="first_month_table_body" style="text-align: left;">
                                        <!-- Populate this section with first_month data -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<script>
$(document).ready(function() {
    // Fetch Total Shots data
    $.ajax({
        url: '../../process/fetch_total_shots_section3.php',
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
            console.error('Error fetching Total Shots data: ' + textStatus, errorThrown);
        }
    });

});

</script>

<?php include 'plugins/footer.php'; ?>
