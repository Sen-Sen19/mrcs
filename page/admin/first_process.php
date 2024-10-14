<?php include 'plugins/navbar.php'; ?>
<?php include 'plugins/sidebar/admin_bar.php'; ?>

<div class="content-wrapper">
    <div id="loadingSpinner" style="display: none; background-color: white; padding: 10px; border-radius: 5px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.6);">
        <img src="../../dist/img/6.gif" alt="Loading..." style="width: 50px; height: 50px;">
        <p style="margin-top: 10px;">Please wait. Do not reload the page</p>
    </div>

    <div class="row">
        <div class="col-sm-2">
            <input type="text" id="searchBaseProduct" class="form-control" placeholder="Base Product" style="height: 35px; font-size: 14px; margin-top: 50px;" />
        </div>
        <div class="col-sm-2">
            <button type="button" id="searchButton" class="btn btn-primary w-100" style="height: 35px; font-size: 14px; margin-top: 50px;">
                <i class="fas fa-search mr-2"></i>Search
            </button>
        </div>
        <div class="col-md-2 mt-3">
            <button id="importButton1" class="btn btn-primary" style="background-color: #F0D018; border-color: #F0D018; color: black; width: 100%; margin-top: 33px;">
                <i class="fas fa-upload"></i> Import
            </button>
            <input type="file" id="fileImport1" class="form-control" accept=".csv" style="display: none;" />
        </div>
        <div class="col-md-2 mt-3">
            <button id="exportbtn" class="btn btn-primary" style="background-color: #525252; border-color: #525252; color: white; width: 100%; margin-top: 33px;">
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
        <div id="accounts_table_res1" class="table-responsive" style="height: 50vh; overflow: auto; margin-top: 20px; border-top: 1px solid white; background-color: white; border-radius: 10px;">
            <table id="header_table1" class="table table-sm table-head-fixed text-nowrap table-hover">
                <thead style="text-align: center;">
                    <tr>
                        <th>ID</th>
                        <th>PRODUCT</th>
                        <th>CAR MODEL</th>
                        <th>BASE PRODUCT</th>
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
                        
                    </tr>
                </thead>
                <tbody id="table_body1" style="text-align: center; padding: 20px;"></tbody>
            </table>
            <div id="loading" class="text-center" style="display: none;">
                <img src="../../dist/img/6.gif" alt="Loading..." style="width: 50px; height: 50px;">
                <p>Loading data, please wait...</p>
            </div>
        </div>
        <div id="dataCount1" class="data-count" style="text-align: left; padding: 10px; font-size: 16px;">Data Count: 0</div>
    </div>
</div>

<script>
  document.getElementById("importButton1").addEventListener("click", function() {
    // Trigger file input click
    document.getElementById("fileImport1").click();
});

document.getElementById("fileImport1").addEventListener("change", function() {
    const fileInput = document.getElementById("fileImport1");
    const file = fileInput.files[0];  // Get the selected file

    if (file) {
        const formData = new FormData();
        formData.append("csv_file", file);  // Append the file to the form data

        // Show loading spinner (optional)
        document.getElementById("loadingSpinner").style.display = 'block';

        // Send the form data to the server using fetch API
        fetch("../../process/first_process_1.php", {

            method: "POST",
            body: formData,  // Send the file in formData
        })
        .then(response => response.json())  // Parse JSON response from the server
        .then(data => {
            // Hide loading spinner
            document.getElementById("loadingSpinner").style.display = 'none';

            if (data.success) {
                alert("File imported successfully!");
                // location.reload();  // Reload the page to refresh the table data
            } else {
                console.error(data.error);
                alert("File import failed: " + data.error);
            }
        })
        .catch(error => {
            console.error("Error:", error);
            alert("An error occurred during file import.");
        });
    } else {
        alert("Please select a CSV file to import.");
    }
});

</script>


<?php include 'plugins/footer.php'; ?>
