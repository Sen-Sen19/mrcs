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
            <button id="importButton2" class="btn btn-primary"
                style="background-color: #F0D018; border-color: #F0D018; color: black; width: 100%; margin-top: 33px;">
                <i class="fas fa-upload"></i> Import
            </button>
            <input type="file" id="fileImport2" class="form-control" accept=".csv" style="display: none;" />
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
            <h3 class="card-title">Unique Process</h3>
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
                        <th>JOINT CRIMPING 20TONS PS 115 2 3L 2</th>
                        <th>ULTRASONIC WELDING</th>
                        <th>SERVO PRESS CRIMPING</th>
                        <th>LOW VISCOSITY</th>
                        <th>AIR WATER LEAK TEST</th>
                        <th>HEATSHRINK LOW VISCOSITY</th>
                        <th>STMAC SHIELDWIRE J12</th>
                        <th>HIROSE SHEATH STRIPPING 927R</th>
                        <th>HIROSE UNISTRIP</th>
                        <th>HIROSE ACETATE TAPING</th>
                        <th>HIROSE MANUAL CRIMPING 2 TONS</th>
                        <th>HIROSE COPPER TAPING</th>
                        <th>HIROSE HGT17AP CRIMPING</th>
                        <th>STMAC ALUMINUM</th>
                        <th>MANUAL CRIMPING 20TONS</th>
                        <th>DIP SOLDERING BATTERY</th>
                        <th>ULTRASONIC DIP SOLDERING ALUMINUM</th>
                        <th>LA MOLDING</th>
                        <th>PRESSURE WELDING SUN VISOR</th>
                        <th>PRESSURE WELDING DOME LAMP</th>
                        <th>CASTING C377A</th>
                        <th>COAXSTRIP 6580</th>
                        <th>MANUAL CRIMPING 2T FERRULE</th>
                        <th>FERRULE AUTO CRIMPING</th>
                        <th>ENLARGE TERMINAL INSPECTION</th>
                        <th>WATERPROOF PAD PRESS</th>
                        <th>PARTS INSERTION</th>
                        <th>BRAIDED WIRE FOLDING</th>
                        <th>OUTSIDE FERRULE INSERTION</th>
                        <th>JOINT CRIMPING 2T</th>
                        <th>WELDING AT HEAD</th>
                        <th>WELDING TAPING</th>
                        <th>UV III 1</th>
                        <th>UV III 2</th>
                        <th>UV III 4</th>
                        <th>UV III 5</th>
                        <th>UV III 7</th>
                        <th>UV III 8</th>
                        <th>DRAINWIRE TIP</th>
                        <th>ARC WELDING</th>
                        <th>C373A YAMAHA</th>
                        <th>COCRIPPER</th>
                        <th>QUICKSTRIPPING</th>
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

<?php include 'plugins/js/js_unique_process.php'; ?>
<?php include 'plugins/footer.php'; ?>