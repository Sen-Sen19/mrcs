<?php include 'plugins/navbar.php'; ?>
<?php include 'plugins/sidebar/user_bar.php'; ?>

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
            <div id="loading" class="text-center" style="display: none;">
                <img src="../../dist/img/6.gif" alt="Loading..." style="width: 50px; height: 50px;">
                <p>Loading data, please wait...</p>
            </div>
        </div>
        <div id="dataCount1" class="data-count" style="text-align: left; padding: 10px; font-size: 16px;">Data Count: 0</div>
    </div>
</div>

<script>
    document.getElementById("exportbtn").addEventListener("click", function() {
       
        window.location.href = "../../process/export_first_process.php"; 
    });
    
</script>

<?php include 'plugins/js/js_first_process.php'; ?>
<?php include 'plugins/footer.php'; ?>
