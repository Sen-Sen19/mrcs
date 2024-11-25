<?php include 'plugins/navbar.php'; ?>
<?php include 'plugins/sidebar/admin_bar.php'; ?>

<div class="content-wrapper">
    

    <div class="row">
        <div class="col-sm-2">
            <input type="text" id="searchBaseProduct" class="form-control" placeholder="Base Product"
                style="height: 35px; font-size: 14px; margin-top: 50px;" />
        </div>
        <div class="col-sm-2">
            <select id="carModelSelect" class="form-control" style="height: 35px; font-size: 14px; margin-top: 50px;">
                <option value="" disabled selected>Car Model</option>
                <option value="Subaru">Subaru</option>
                <option value="Toyota">Toyota</option>
                <option value="Mazda Merge">Mazda Merge</option>
                <option value="Suzuki Old">Suzuki Old</option>
                <option value="Honda TKRA">Honda TKRA</option>
                <option value="Mazda J12">Mazda J12</option>
                <option value="Honda T20">Honda T20</option>
                <option value="Honda Old">Honda Old</option>
                <option value="Daihatsu D01L">Daihatsu D01L</option>
            </select>
        </div>
        <div class="col-sm-2">
            <button type="button" id="searchButton" class="btn btn-primary w-100"
                style="height: 35px; font-size: 14px; margin-top: 50px;">
                <i class="fas fa-search mr-2"></i>Search
            </button>
        </div>

        <div class="col-md-2 mt-3">
            <button id="importButton1" class="btn btn-primary"
                style="background-color: #F0D018; border-color: #F0D018; color: black; width: 100%; margin-top: 33px;">
                <i class="fas fa-upload"></i> Import
            </button>
            <input type="file" id="fileImport1" class="form-control" accept=".csv" style="display: none;" />
        </div>
        <div class="col-md-2 mt-3">
            <button id="exportbtn" class="btn btn-primary"
                style="background-color: #525252; border-color: #525252; color: white; width: 100%; margin-top: 33px;">
                <i class="fas fa-download"></i> Export
            </button>
            <input type="file" id="deletebtn" class="form-control" accept=".csv" style="display: none;" />
        </div>
    </div>

    <div class="card card-gray-dark card-outline" style="margin-top: 50px;">
        <div class="card-header">
            <h3 class="card-title">First Process</h3>
            <div class="card-tools"></div>
        </div>
        <div id="accounts_table_res1" class="table-responsive"
            style="height: 50vh; overflow: auto; margin-top: 20px; border-top: 1px solid white; background-color: white; border-radius: 10px;">
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
                        <th>TRD NWPA 0 13</th>
                        <th>TRD NWPA BELOW 2 0 EXCEPT 0 13</th>
                        <th>TRD NWPA 2 0 3 0</th>
                        <th>TRD WPA 0 13</th>
                        <th>TRD WPA BELOW 2 0 EXCEPT 0 13</th>
                        <th>TRD WPA 2 0 3 0</th>
                        <th>TR327</th>
                        <th>TR328</th>
                        <th>TRD ALUMINUM NWPA 2 0</th>
                        <th>TRD ALUMINUM NWPA BELOW 2 0</th>
                        <th>TRD ALUMINUM WPA 2 0</th>
                        <th>TRD ALUMINUM WPA BELOW 2 0</th>
                        <th>ALUMINUM DIMENSION CHECK ALUMINUM TERMINAL INSPECTION</th>
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
                        <th>TRD ALPHA ALUMINUM 5 0 ABOVE</th>
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
                <tbody id="table_body1" style="text-align: center; padding: 20px;"></tbody>
            </table>
            <div id="loadingSpinner"
     style="display: none; background-color: white; padding: 10px; border-radius: 5px; 
            position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%);">
    <img src="../../dist/img/6.gif" alt="Loading..." style="width: 50px; height: 50px;">
   
</div>
        </div>
        <div id="dataCount1" class="data-count" style="text-align: left; padding: 10px; font-size: 16px;">Data Count: 0
        </div>
    </div>
</div>

<script>
  
document.getElementById("exportbtn").addEventListener("click", function () {
    exportTableToCSV();
});


function exportTableToCSV() {
    const table = document.getElementById("header_table1");
    const tableBody = document.getElementById("table_body1");


    let csvContent = "";


    const headers = table.querySelectorAll("th");
    const headerArray = Array.from(headers).map(header => header.textContent.trim());
    csvContent += headerArray.join(",") + "\n";

    // Get table rows
    const rows = tableBody.querySelectorAll("tr");
    rows.forEach(row => {
        const columns = row.querySelectorAll("td");
        const rowArray = Array.from(columns).map(col => col.textContent.trim());
        csvContent += rowArray.join(",") + "\n";
    });

    // Create a Blob from the CSV string and trigger the download
    const blob = new Blob([csvContent], { type: 'text/csv' });
    const link = document.createElement("a");
    link.href = URL.createObjectURL(blob);
    link.download = 'First Process.csv';
    link.click();
}

    document.getElementById("carModelSelect").addEventListener("change", function () {
        fetchData(this.value); // Pass the selected value to fetchData
    });

    function fetchData(selectedCarModel = '') {
        const loadingSpinner = document.getElementById('loadingSpinner');
        loadingSpinner.style.display = 'block';

        fetch('../../process/fetch_first_process.php')
            .then(response => response.json())
            .then(data => {
                const dataBody = document.getElementById('table_body1');
                dataBody.innerHTML = '';

                // Filter the data based on the selected car model
                const filteredData = selectedCarModel
                    ? data.filter(row => row.car_model === selectedCarModel)
                    : data; // If no model is selected, show all data

                filteredData.forEach(row => {
                    const tr = document.createElement('tr');
                    tr.innerHTML = `
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
                        <td>${row.aluminum_visual_inspection_for_alpha}</td>
                        <td>${row.enlarged_terminal_check_for_alpha}</td>
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
                    `;
                    dataBody.appendChild(tr);
                });

                // Update data count
                document.getElementById('dataCount1').textContent = 'Data Count: ' + filteredData.length;

                loadingSpinner.style.display = 'none'; // Hide loading spinner
            })
            .catch(error => {
                console.error('Error fetching data:', error);
                loadingSpinner.style.display = 'none'; // Hide loading spinner in case of error
            });
    }

    // Initial fetch to load all data
    fetchData();
</script>

<?php include 'plugins/js/js_first_process.php'; ?>
<?php include 'plugins/footer.php'; ?>