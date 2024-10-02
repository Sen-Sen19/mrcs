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
            <button id="importButton5" class="btn btn-primary"
                style="background-color: #F0D018; border-color: #F0D018; color: black; width: 100%; margin-top: 33px;">
                <i class="fas fa-upload"></i> Import
            </button>
            <input type="file" id="fileImport5" class="form-control" accept=".csv" style="display: none;" />
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
            <h3 class="card-title">Other Process</h3>
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
                        <th>V TYPE TWISTING</th>
                                <th>MANUAL CRIMPING 2TONS TO BE JOINT ON SW</th>
                                <th>AIRBAG</th>
                                <th>A B SUB PC</th>
                                <th>INTERMEDIATE RIPPING UAS MANUAL NF F</th>
                                <th>MANUAL CRIMPING 4TONS NF F</th>
                                <th>INTERMEDIATE RIPPING UAS JOINT</th>
                                <th>INTERMEDIATE STRIPPING KB10</th>
                                <th>MANUAL TAPING DISPENSER 8 0 5 0 8 0 8 0 PS 115 2 CHFUS 0 22 CIVUS 0 22
                                </th>
                                <th>JOINT TAPING 11MM PS 150 LL 2</th>
                                <th>JOINT TAPING 12MM PS 700 L 2 PS 200 M 2</th>
                                <th>JOINT TAPING 13MM PS 800 S 2 PS 017 SS 2 PS 126 2 SST2</th>
                                <th>HEAT SHRINK JOINT CRIMPING</th>
                                <th>HEAT SHRINK LA TERMINAL</th>
                                <th>MANUAL CRIMPING 2TONS NSC WELD</th>
                                <th>INTERMEDIATE STRIPPING KB10 NSC WELD</th>
                                <th>JOINT CRIMPING 2TONS PS 017 SS 2 NSC WELD</th>
                                <th>JOINT TAPING 13MM PS 800 S 2 PS 017 SS 2 PS 126 2 SST2 NSC WELD</th>
                                <th>SILICON INJECTION</th>
                                <th>WELDING TAPING 13MM</th>
                                <th>HEAT SHRINK WELDING</th>
                                <th>CASTING C385 SHIELDWIRE</th>
                                <th>QUICK STRIPPING 927 AUTO</th>
                                <th>MIRA QUICK STRIPPING</th>
                                <th>QUICK STRIPPING 311 MANUAL</th>
                                <th>MANUAL HEAT SHRINK BLOWER SUMITUBE</th>
                                <th>MANUAL TAPING DISPENSER SW</th>
                                <th>HEAT SHRINK JOINT CRIMPING SW</th>
                                <th>CASTING C373</th>
                                <th>CASTING C377</th>
                                <th>CASTING C371</th>
                                <th>MANUAL HEAT SHRINK BLOWER BATTERY</th>
                                <th>CASTING C373 NORMAL</th>
                                <th>CASTING C371 NORMAL</th>
                                <th>MANUAL 2TONS BENDING</th>
                                <th>MANUAL 5TONS BATTERY</th>
                                <th>AL LOOPING</th>
                                <th>SOLDERING</th>
                                <th>WATERPROOF AGENT INJECTION</th>
                                <th>THERMOSETTING</th>
                                <th>COMPLETION</th>
                                <th>PICKING LOOPING</th>
                                <th>WELDING END</th>
                                <th>INTERMEDIATE WELDING</th>
                                <th>SAM SET A B</th>
                                <th>SAM SET NORMAL</th>
                                <th>TOTAL CIRCUIT</th>
                                <th>NEW AIRBAG</th>
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

        window.location.href = "../../process/export_other_process.php";
    });

</script>

<?php include 'plugins/js/js_other_process.php'; ?>
<?php include 'plugins/footer.php'; ?>