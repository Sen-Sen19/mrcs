<?php include 'plugins/navbar.php'; ?>
<?php include 'plugins/sidebar/user_bar.php'; ?>

<div class="content-wrapper">
    <div id="loadingSpinner"
        style="display: none; background-color: white; padding: 10px; border-radius: 5px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.6);">
        <img src="../../dist/img/6.gif" alt="Loading..." style="width: 50px; height: 50px;">
        <p style="margin-top: 10px;">Please wait. Do not reload the page</p>
    </div>

    <div class="tab-content" id="excelTabContent">
        <div class="tab-pane fade show active" id="file1" role="tabpanel" aria-labelledby="file1-tab">
            
            <div class="card card-gray-dark card-outline">
                <div class="card-header">
                  
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
                               
                            
                            </tr>
                        </thead>
                        <tbody id="table_body_first_process" style="text-align: center; padding:20px;"></tbody>
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
