<?php include 'plugins/navbar.php'; ?>
<?php include 'plugins/sidebar/user_bar.php'; ?>
<?php include '../../process/table_operation.php'; ?>
<div class="content-wrapper">
    <div id="loadingSpinner"
        style="display: none; background-color: white; padding: 10px; border-radius: 5px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.6);">
        <img src="../../dist/img/6.gif" alt="Loading..." style="width: 50px; height: 50px;">
        <p style="margin-top: 10px;">Please wait. Do not reload the page</p>
    </div>

    <div class="tab-content" id="excelTabContent">
        <div class="tab-pane fade show active" id="file1" role="tabpanel" aria-labelledby="file1-tab">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-2">
                        <input type="text" id="searchBaseProduct" class="form-control" placeholder="Base Product"
                            style="height: 35px; font-size: 14px; margin-top: 50px;" />
                    </div>
                    <div class="col-sm-2">
                        <button type="button" id="searchButton" class="btn btn-primary w-100"
                            style="height: 35px; font-size: 14px; margin-top: 50px;">
                            <i class="fas fa-search mr-2"></i>Search
                        </button>
                    </div>
                    <div class="col-md-2 mt-3">
                        <button id="importButton1" class="btn btn-primary"
                            style="background-color: #F0D018; border-color: #F0D018; color: black; width: 100%; margin-right:5px;margin-top: 33px;">
                            <i class="fas fa-upload"></i> First Process
                        </button>
                        <input type="file" id="fileImport1" class="form-control" accept=".csv"
                            style="display: none;" />
                    </div>
                </div>
            </div>
            <div class="card card-gray-dark card-outline">
                <div class="card-header">
                    <h3 class="card-title">First Process</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="maximize">
                            <i class="fas fa-expand"></i>
                        </button>
                    </div>
                </div>
                <div id="accounts_table_res1" class="table-responsive"
                    style="height: 50vh; overflow: auto; margin-top: 20px; border-top: 1px solid white; background-color: white; padding: 15px; border-radius: 10px;">
                    <table id="header_table1" class="table table-sm table-head-fixed text-nowrap table-hover">
                        <thead style="text-align: center;">
                            <tr>
                               
                                <th>BASE PRODUCT</th>
                                <th>CAR MODEL</th>
                                <th>PRODUCT</th>
                                <th>CAR CODE</th>
                                <th>BLOCK</th>
                                <th>CLASS</th>
                                <th>LINE NO</th>
                                <th>CIRCUIT QTY</th>
                                <th>TRD NWPA 0-13</th>
                                <th>TRD NWPA BELOW 2.0 EXCEPT 0-13</th>
                                <th>TRD NWPA 2.0-3.0</th>
                                <th>TRD WPA 0-13</th>
                                <th>TRD WPA BELOW 2.0 EXCEPT 0-13</th>
                                <th>TRD WPA 2.0-3.0</th>
                                <th>TR327</th>
                                <th>TR328</th>
                                <th>TRD ALUMINUM NWPA 2.0</th>
                                <th>TRD ALUMINUM NWPA BELOW 2.0</th>
                                <th>TRD ALUMINUM WPA 2.0</th>
                                <th>TRD ALUMINUM WPA BELOW 2.0</th>
                                <th>ALUMINUM DIMENSION CHECK (ALUMINUM TERMINAL INSPECTION)</th>
                                <th>ALUMINUM VISUAL INSPECTION</th>
                                <th>ALUMINUM COATING UV II</th>
                                <th>ALUMINUM IMAGE INSPECTION</th>
                                <th>ALUMINUM UV III</th>
                                <th>TRD ALPHA ALUMINUM NWPA</th>
                                <th>TRD ALPHA ALUMINUM WPA</th>
                                <th>ALUMINUM VISUAL INSPECTION FOR ALPHA</th>
                                <th>ENLARGED TERMINAL CHECK FOR ALPHA</th>
                                <th>AIR WATER LEAK TEST</th>
                                <th>SAM SUB NO AIRBAG</th>
                                <th>SAM SUB NO NORMAL</th>
                                <th>JAM AUTO CRIMPING AND TWISTING</th>
                                <th>TRD ALPHA ALUMINUM 5.0 ABOVE</th>
                                <th>POINT MARKING NSC</th>
                                <th>POINT MARKING SAM</th>
                                <th>ENLARGED TERMINAL CHECK ALUMINUM</th>
                                <th>NSC 1</th>
                                <th>NSC 2</th>
                                <th>NSC 3</th>
                                <th>NSC 4</th>
                                <th>NSC 5</th>
                                <th>NSC 6</th>
                                <th>NSC 7</th>
                                <th>NSC 8</th>
                                <th>NSC 9</th>
                                <th>NSC 10</th>
                            </tr>
                        </thead>
                        <tbody id="table_body_first_process" style="text-align: center; padding:20px;"></tbody>
                    </table>
                    <div id="loading" class="text-center" style="display: none;">
                        <img src="../../dist/img/6.gif" alt="Loading..." style="width: 50px; height: 50px;">
                        <p>Loading data, please wait...</p>
                    </div>
                </div>
                <div id="dataCount1" class="data-count" style="text-align: left; padding: 10px; font-size: 16px;">
                    Data Count: 0
                </div>
            </div>
        </div>
    </div>
</div>

<script src="plugins/js/bootstrap.bundle.min.js"></script>
<script src="plugins/js/jquery-3.6.0.min.js"></script>
<script src="plugins/js/bootstrap.min.js"></script>


    <script>
 $(document).ready(function () {
    fetchData();

    function fetchData(page = 1) {
        $("#loading").show();

        $.ajax({
            url: '../../process/first_process_display.php',
            method: 'GET',
            data: { page: page }, // Sending pagination parameter
            dataType: 'json',
            success: function (data) {
                $("#loading").hide();
                
                if (data.length > 0) {
                    let tableBody = '';
                    let count = 0;

                    data.forEach(function (row) {
                        count++;
                        tableBody += `
                        <tr>
                            <td>${row.base_product}</td>
                            <td>${row.car_model}</td>
                            <td>${row.product}</td>
                            <td>${row.car_code}</td>
                            <td>${row.block}</td>
                            <td>${row.class}</td>
                            <td>${row.line_no}</td>
                            <td>${row.circuit_qty}</td>
                            <td>${row.trd_nwpa_0_13}</td>
                            <td>${row.trd_nwpa_below_2_0_except_0_13}</td>
                            <td>${row.trd_nwpa_2_0_3_0}</td>
                            <td>${row.trd_wpa_0_13}</td>
                            <td>${row.trd_wpa_below_2_0_except_0_13}</td>
                            <td>${row.trd_wpa_2_0_3_0}</td>
                            <td>${row.tr327}</td>
                            <td>${row.tr328}</td>
                            <td>${row.trd_aluminum_nwpa_2_0}</td>
                            <td>${row.trd_aluminum_nwpa_below_2_0}</td>
                            <td>${row.trd_aluminum_wpa_2_0}</td>
                            <td>${row.trd_aluminum_wpa_below_2_0}</td>
                            <td>${row.aluminum_dimension_check_aluminum_terminal_inspection}</td>
                            <td>${row.aluminum_visual_inspection}</td>
                            <td>${row.aluminum_coating_uv_ii}</td>
                            <td>${row.aluminum_image_inspection}</td>
                            <td>${row.aluminum_uv_iii}</td>
                            <td>${row.trd_alpha_aluminum_nwpa}</td>
                            <td>${row.trd_alpha_aluminum_wpa}</td>
                            <td>${row.aluminum_visual_inspection_alpha}</td>
                            <td>${row.enlarged_terminal_check_alpha}</td>
                            <td>${row.air_water_leak_test}</td>
                            <td>${row.sam_sub_no_airbag}</td>
                            <td>${row.sam_sub_no_normal}</td>
                            <td>${row.jam_auto_crimping_and_twisting}</td>
                            <td>${row.trd_alpha_aluminum_5_0_above}</td>
                            <td>${row.point_marking_nsc}</td>
                            <td>${row.point_marking_sam}</td>
                            <td>${row.enlarged_terminal_check_aluminum}</td>
                            <td>${row.nsc_1}</td>
                            <td>${row.nsc_2}</td>
                            <td>${row.nsc_3}</td>
                            <td>${row.nsc_4}</td>
                            <td>${row.nsc_5}</td>
                            <td>${row.nsc_6}</td>
                            <td>${row.nsc_7}</td>
                            <td>${row.nsc_8}</td>
                            <td>${row.nsc_9}</td>
                            <td>${row.nsc_10}</td>
                        </tr>`;
                    });

                    $("#table_body_first_process").html(tableBody);
                    $("#dataCount1").text('Data Count: ' + count);
                } else {
                    $("#table_body_first_process").html('<tr><td colspan="40">No data found</td></tr>');
                    $("#dataCount1").text('Data Count: 0');
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $("#loading").hide();
                console.error('Error fetching data:', textStatus, errorThrown);
            }
        });
    }

    // Debounce function for search input
    let debounceTimer;
    $("#searchBaseProduct").on('input', function () {
        clearTimeout(debounceTimer);
        debounceTimer = setTimeout(() => {
            var searchQuery = $(this).val();
            // Add your search functionality here
        }, 300); // Adjust time as needed
    });

    $("#importButton1").on('click', function () {
        $("#fileImport1").click();
    });

    $("#fileImport1").on('change', function () {
        // Handle file import functionality
    });
});





  document.getElementById('importButton1').addEventListener('click', function () {
        document.getElementById('fileImport1').click();
    });

    document.getElementById('fileImport1').addEventListener('change', function (event) {
        const file = event.target.files[0];
        if (file) {
            document.getElementById('loadingSpinner').style.display = 'block';
            const reader = new FileReader();
            reader.onload = function (e) {
                const text = e.target.result;
                const rows = text.split('\n').map(row => row.split(','));


                const data = rows.slice(1);
                if (data.length > 0) {
                    saveFirstProcess(data);
                } else {
                    alert('No data found in the selected file.');
                    document.getElementById('loadingSpinner').style.display = 'none';
                }
            };
            reader.onerror = function () {
                alert('Error reading file. Please try again.');
                document.getElementById('loadingSpinner').style.display = 'none';
            };
            reader.readAsText(file);
        } else {
            alert('Please select a file.');
        }
    });

    function saveFirstProcess(data) {
        fetch('../../process/i_first_process.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ data: data })
        })
            .then(response => response.json())
            .then(result => {
                Swal.fire({
                    title: 'Success!',
                    text: result.message,
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.reload();
                    }
                });
                document.getElementById('loadingSpinner').style.display = 'none';
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire({
                    title: 'Error!',
                    text: 'Error saving data. Please try again.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.reload();
                    }
                });
                document.getElementById('loadingSpinner').style.display = 'none';
            });
    }


</script>


<?php include 'plugins/footer.php'; ?>
