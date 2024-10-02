<?php include 'plugins/navbar.php'; ?>
<?php include 'plugins/sidebar/user_bar.php'; ?>

<div class="content-wrapper">
    <div id="loadingSpinner"
        style="display: none; background-color: white; padding: 10px; border-radius: 5px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.6);">
        <img src="../../dist/img/6.gif" alt="Loading..." style="width: 50px; height: 50px;">
        <p style="margin-top: 10px;">Please wait. Do not reload the page</p>
    </div>

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
            <button id="importButton4" class="btn btn-primary"
                style="background-color: #F0D018; border-color: #F0D018; color: black; width: 100%; margin-top: 33px;">
                <i class="fas fa-upload"></i> Import
            </button>
            <input type="file" id="fileImport4" class="form-control" accept=".csv" style="display: none;" />
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
            <h3 class="card-title">Secondary Process</h3>
            <div class="card-tools"></div>
        </div>
        <div id="accounts_table_res1" class="table-responsive"
            style="height: 50vh; overflow: auto; margin-top: 20px; border-top: 1px solid white; background-color: white; border-radius: 10px;">
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
                        <th>JOINT CRIMPING 2TONS PS 800 S 2</th>
                        <th>JOINT CRIMPING 2TONS PS 200 M 2</th>
                        <th>JOINT CRIMPING 2TONS PS 017 SS 2</th>
                        <th>JOINT CRIMPING 2TONS PS 126 SST2</th>
                        <th>JOINT CRIMPING 4TONS PS 700 L 2</th>
                        <th>JOINT CRIMPING 5TONS PS 150 LL</th>
                        <th>MANUAL CRIMPING SHIELDWIRE 2T</th>
                        <th>MANUAL CRIMPING SHIELDWIRE 4T</th>
                        <th>JOINT CRIMPING 2TONS PS 800 S 2 SW</th>
                        <th>JOINT CRIMPING 2TONS PS 126 SST2 SW</th>
                        <th>JOINT CRIMPING 2TONS PS 017 SS 2 SW</th>
                        <th>TWISTING PRIMARY NORMAL WIRES L LESS THAN 1500MM</th>
                        <th>TWISTING PRIMARY NORMAL WIRES L LESS THAN 3000MM</th>
                        <th>TWISTING PRIMARY NORMAL WIRES L LESS THAN 4500MM</th>
                        <th>TWISTING PRIMARY NORMAL WIRES L LESS THAN 6000MM</th>
                        <th>TWISTING PRIMARY NORMAL WIRES L LESS THAN 7500MM</th>
                        <th>TWISTING PRIMARY NORMAL WIRES L LESS THAN 9000MM</th>
                        <th>TWISTING SECONDARY NORMAL WIRES L LESS THAN 1500MM</th>
                        <th>TWISTING SECONDARY NORMAL WIRES L LESS THAN 3000MM</th>
                        <th>TWISTING SECONDARY NORMAL WIRES L LESS THAN 4500MM</th>
                        <th>TWISTING SECONDARY NORMAL WIRES L LESS THAN 6000MM</th>
                        <th>TWISTING SECONDARY NORMAL WIRES L LESS THAN 7500MM</th>
                        <th>TWISTING SECONDARY NORMAL WIRES L LESS THAN 9000MM</th>
                        <th>TWISTING PRIMARY ALUMINUM WIRES L LESS THAN 1500MM</th>
                        <th>TWISTING PRIMARY ALUMINUM WIRES L LESS THAN 3000MM</th>
                        <th>TWISTING PRIMARY ALUMINUM WIRES L LESS THAN 4500MM</th>
                        <th>TWISTING PRIMARY ALUMINUM WIRES L LESS THAN 6000MM</th>
                        <th>TWISTING SECONDARY ALUMINUM WIRES L LESS THAN 1500MM</th>
                        <th>TWISTING SECONDARY ALUMINUM WIRES L LESS THAN 3000MM</th>
                        <th>TWISTING SECONDARY ALUMINUM WIRES L LESS THAN 4500MM</th>
                        <th>TWISTING SECONDARY ALUMINUM WIRES L LESS THAN 6000MM</th>
                        <th>TWISTING SECONDARY ALUMINUM WIRES L LESS THAN 7500MM</th>
                        <th>TWISTING SECONDARY ALUMINUM WIRES L LESS THAN 9000MM</th>
                        <th>MANUAL CRIMPING 2TONS NORMAL SINGLE CRIMP</th>
                        <th>MANUAL CRIMPING 2TONS NORMAL DOUBLE CRIMP</th>
                        <th>MANUAL CRIMPING 2TONS DOUBLE CRIMP TWISTED</th>
                        <th>MANUAL CRIMPING 2TONS LA TERMINAL</th>
                        <th>MANUAL CRIMPING 2TONS DOUBLE CRIMP LA TERMINAL</th>
                        <th>MANUAL CRIMPING 2TONS W GOMUSEN</th>
                        <th>MANUAL CRIMPING 4TONS DOUBLE CRIMP TWISTED</th>
                        <th>MANUAL CRIMPING 4TONS NORMAL SINGLE CRIMP</th>
                        <th>MANUAL CRIMPING 4TONS NORMAL DOUBLE CRIMP</th>
                        <th>MANUAL CRIMPING 4TONS LA TERMINAL</th>
                        <th>MANUAL CRIMPING 4TONS DOUBLE CRIMP LA TERMINAL</th>
                        <th>MANUAL CRIMPING 4TONS W GOMUSEN</th>
                        <th>MANUAL CRIMPING 5TONS</th>
                        <th>INTERMEDIATE BUTT WELDING EXCEPT 0 13 ELECTRODE 1</th>
                        <th>INTERMEDIATE BUTT WELDING EXCEPT 0 13 ELECTRODE 2</th>
                        <th>INTERMEDIATE BUTT WELDING EXCEPT 0 13 ELECTRODE 3</th>
                        <th>INTERMEDIATE BUTT WELDING EXCEPT 0 13 ELECTRODE 4</th>
                        <th>INTERMEDIATE BUTT WELDING EXCEPT 0 13 ELECTRODE 5</th>
                        <th>WELDING AT HEAD EXCEPT 0 13 ELECTRODE 1</th>
                        <th>WELDING AT HEAD EXCEPT 0 13 ELECTRODE 2</th>
                        <th>WELDING AT HEAD EXCEPT 0 13 ELECTRODE 3</th>
                        <th>WELDING AT HEAD EXCEPT 0 13 ELECTRODE 4</th>
                        <th>WELDING AT HEAD EXCEPT 0 13 ELECTRODE 5</th>
                        <th>INTERMEDIATE BUTT WELDING 0 13 ELECTRODE 1</th>
                        <th>WELDING AT HEAD 0 13 ELECTRODE 1</th>
                        <th>INTERMEDIATE BUTT WELDING 0 13 ELECTRODE 2</th>
                        <th>WELDING AT HEAD 0 13 ELECTRODE 2</th>
                    </tr>
                </thead>
                <tbody id="table_body1" style="text-align: center; padding: 20px;"></tbody>
            </table>
            <div id="loading" class="text-center" style="display: none;">
                <img src="../../dist/img/6.gif" alt="Loading..." style="width: 50px; height: 50px;">
                <p>Loading data, please wait...</p>
            </div>
        </div>
        <div id="dataCount1" class="data-count" style="text-align: left; padding: 10px; font-size: 16px;">Data Count: 0
        </div>
    </div>
</div>

<script>
    document.getElementById("exportbtn").addEventListener("click", function () {

        window.location.href = "../../process/export_secondary_process.php";
    });

</script>

<?php include 'plugins/js/js_secondary_process.php'; ?>
<?php include 'plugins/footer.php'; ?>