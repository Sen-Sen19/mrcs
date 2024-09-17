<?php include 'plugins/navbar.php'; ?>
<?php include 'plugins/sidebar/user_bar.php'; ?>
<style>
    #loadingSpinner {
        position: fixed;
        top: 33%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 1050;
        text-align: center;
        /* Centers content inside the div */
    }

    #loadingSpinner img {
        display: block;
        margin: 0 auto;
        /* Ensures the image is centered horizontally */
    }
</style>
<div class="content-wrapper">
    <div id="loadingSpinner" style="display: none;">
        <img src="../../dist/img/6.gif" alt="Loading..." style="width: 50px; height: 50px;">
        <p style="margin-top: 10px; ">Importing to the database. Please do not reload the page.</p>
    </div>

    <div class="content-header">
        <div class="container-fluid">
            <!-- Tab Navigation -->
            <ul class="nav nav-tabs" id="excelTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="file1-tab" data-toggle="tab" href="#file1" role="tab"
                        aria-controls="file1" aria-selected="true"
                        style="width:200px; margin-bottom:70px;">Masterlist</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="newTab-tab" data-toggle="tab" href="#newTab" role="tab"
                        aria-controls="newTab" aria-selected="false" style="width:200px;">Update</a>
                </li>
            </ul>

            <div class="tab-content" id="excelTabContent">
                <!-- File 1 Tab Pane (now empty) -->







                <div class="tab-pane fade show active" id="file1" role="tabpanel" aria-labelledby="file1-tab">
                    <div class="card card-gray-dark card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Masterlist</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="maximize">
                                    <i class="fas fa-expand"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Loading Indicator -->

                            <!-- Table Container -->
                            <div id="accounts_table_res1" class="table-responsive"
                                style="height: 50vh; overflow: auto; margin-top: 20px; border-top: 1px solid white; background-color: white; padding: 15px; border-radius: 10px;">
                                <table id="header_table1"
                                    class="table table-sm table-head-fixed text-nowrap table-hover">
                                    <thead style="text-align: center;">
                                        <tr>
                                            <!-- New ID Column Header -->
                                            <th>ID</th>
                                            <th>Base Product</th>
                                            <th>Car Model</th>
                                            <th>Product</th>
                                            <th>Car Code</th>
                                            <th>Block</th>
                                            <th>Class</th>
                                            <th>Line No</th>
                                            <th>Circuit Qty</th>
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
                                            <th>AIRBAG HOUSING</th>
                                            <th>CAP INSERTION</th>
                                            <th>SHIELDWIRE TAPING</th>
                                            <th>GOMUSEN INSERTION</th>
                                            <th>POINT MARKING</th>
                                            <th>LOOPING</th>
                                            <th>SHIKAKARI HANDLER</th>
                                            <th>BLACK TAPING</th>
                                            <th>COMPONENTS INSERTION</th>
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

                                    <tbody id="table_body1" style="text-align: center; padding:20px;">

                                    </tbody>

                                </table>
                                <div id="loading" class="text-center" style="display: none;">
                                    <img src="../../dist/img/6.gif" alt="Loading..." style="width: 50px; height: 50px;">
                                    <p>Loading data, please wait...</p>
                                </div>
                            </div>
                            <div id="dataCount1" class="data-count"
                                style="text-align: left; padding: 10px; font-size: 16px;">
                                Data Count: 0
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="newTab" role="tabpanel" aria-labelledby="newTab-tab">
                    <div class="card card-gray-dark card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Masterlist</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="maximize">
                                    <i class="fas fa-expand"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="accounts_table_res1" class="table-responsive"
                                style="height: 50vh; overflow: auto; margin-top: 20px; border-top: 1px solid white; background-color: white; padding: 15px; border-radius: 10px;">
                                <table id="header_table1"
                                    class="table table-sm table-head-fixed text-nowrap table-hover">
                                    <tbody id="table_body1" style="text-align: center; padding:20px;">





                                    <div class="row mb-2 justify-content-center">
    <div class="col-sm-12 text-center">
        <!-- First Process Button -->
        <button id="importButton1" class="btn btn-primary mt-3"
            style="background-color: #F0D018; border-color: #F0D018; color: black; margin: 10px; width: 200px;">
            <i class="fas fa-upload"></i> First Process
        </button>
        <input type="file" id="fileImport1" class="form-control" accept=".csv" style="display: none;" />

        <!-- Unique Process Button -->
        <button id="importButton2" class="btn btn-primary mt-3"
            style="background-color: #F0D018; border-color: #F0D018; color: black; margin: 10px; width: 200px;">
            <i class="fas fa-upload"></i> Unique Process
        </button>
        <input type="file" id="fileImport2" class="form-control" accept=".csv" style="display: none;" />

        <!-- Non-Machine Process Button -->
        <button id="importButton3" class="btn btn-primary mt-3"
            style="background-color: #F0D018; border-color: #F0D018; color: black; margin: 10px; width: 200px;">
            <i class="fas fa-upload"></i> Non-Machine Process
        </button>
        <input type="file" id="fileImport3" class="form-control" accept=".csv" style="display: none;" />

        <!-- Secondary Process Button -->
        <button id="importButton4" class="btn btn-primary mt-3"
            style="background-color: #F0D018; border-color: #F0D018; color: black; margin: 10px; width: 200px;">
            <i class="fas fa-upload"></i> Secondary Process
        </button>
        <input type="file" id="fileImport4" class="form-control" accept=".csv" style="display: none;" />

        <!-- Other Process Button -->
        <button id="importButton5" class="btn btn-primary mt-3"
            style="background-color: #F0D018; border-color: #F0D018; color: black; margin: 10px; width: 200px;">
            <i class="fas fa-upload"></i> Other Process
        </button>
        <input type="file" id="fileImport5" class="form-control" accept=".csv" style="display: none;" />

        <!-- Update Button -->
        <button id="importButton6" class="btn btn-primary mt-3"
            style="background-color: #F0D018; border-color: #F0D018; color: black; margin: 10px; width: 200px;">
            <i class="fas fa-upload"></i> Update
        </button>
        <input type="file" id="fileImport6" class="form-control" accept=".csv" style="display: none;" />
    </div>
</div>
















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

<script>
    // ------------------------------- first process --------------------------------------
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
                window.location.reload(); // Reload the page when user clicks 'OK'
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
                window.location.reload(); // Reload the page when user clicks 'OK'
            }
        });
        document.getElementById('loadingSpinner').style.display = 'none';
    });
}


    // ------------------------------- unique process --------------------------------------
    document.getElementById('importButton2').addEventListener('click', function () {
        document.getElementById('fileImport2').click();
    });

    document.getElementById('fileImport2').addEventListener('change', function (event) {
        const file = event.target.files[0];
        if (file) {
            document.getElementById('loadingSpinner').style.display = 'block';
            const reader = new FileReader();
            reader.onload = function (e) {
                const text = e.target.result;
                const rows = text.split('\n').map(row => row.split(','));

                const data = rows.slice(1);
                if (data.length > 0) {
                    saveUniqueProcess(data);
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

    function saveUniqueProcess(data) {
        fetch('../../process/i_unique_process.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ data: data })
        })
            .then(response => response.json())
            .then(result => {
                alert(result.message);
                document.getElementById('loadingSpinner').style.display = 'none';
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error saving data. Please try again.');
                document.getElementById('loadingSpinner').style.display = 'none';
            });
    }

    // ------------------------------- non-machine process --------------------------------------
    document.getElementById('importButton3').addEventListener('click', function () {
        document.getElementById('fileImport3').click();
    });

    document.getElementById('fileImport3').addEventListener('change', function (event) {
        const file = event.target.files[0];
        if (file) {
            document.getElementById('loadingSpinner').style.display = 'block';
            const reader = new FileReader();
            reader.onload = function (e) {
                const text = e.target.result;
                const rows = text.split('\n').map(row => row.split(','));


                const data = rows.slice(1);
                if (data.length > 0) {
                    saveNonMachineProcess(data);
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

    function saveNonMachineProcess(data) {
        fetch('../../process/i_non_machine_process.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ data: data })
        })
            .then(response => response.json())
            .then(result => {
                alert(result.message);
                document.getElementById('loadingSpinner').style.display = 'none';
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error saving data. Please try again.');
                document.getElementById('loadingSpinner').style.display = 'none';
            });
    }


    // ------------------------------- Secondary process --------------------------------------
    document.getElementById('importButton4').addEventListener('click', function () {
        document.getElementById('fileImport4').click();
    });

    document.getElementById('fileImport4').addEventListener('change', function (event) {
        const file = event.target.files[0];
        if (file) {
            document.getElementById('loadingSpinner').style.display = 'block';
            const reader = new FileReader();
            reader.onload = function (e) {
                const text = e.target.result;
                const rows = text.split('\n').map(row => row.split(','));


                const data = rows.slice(1);
                if (data.length > 0) {
                    saveSecondaryProcess(data);
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

    function saveSecondaryProcess(data) {
        fetch('../../process/i_secondary_process.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ data: data })
        })
            .then(response => response.json())
            .then(result => {
                alert(result.message);
                document.getElementById('loadingSpinner').style.display = 'none';
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error saving data. Please try again.');
                document.getElementById('loadingSpinner').style.display = 'none';
            });
    }

    // ------------------------------- Other process --------------------------------------
    document.getElementById('importButton5').addEventListener('click', function () {
        document.getElementById('fileImport5').click();
    });

    document.getElementById('fileImport5').addEventListener('change', function (event) {
        const file = event.target.files[0];
        if (file) {
            document.getElementById('loadingSpinner').style.display = 'block';
            const reader = new FileReader();
            reader.onload = function (e) {
                const text = e.target.result;
                const rows = text.split('\n').map(row => row.split(','));


                const data = rows.slice(1);
                if (data.length > 0) {
                    saveOtherProcess(data);
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

    function saveOtherProcess(data) {
        fetch('../../process/i_other_process.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ data: data })
        })
            .then(response => response.json())
            .then(result => {
                alert(result.message);
                document.getElementById('loadingSpinner').style.display = 'none';
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error saving data. Please try again.');
                document.getElementById('loadingSpinner').style.display = 'none';
            });
    }

    // ------------------------------- Update masterlist process --------------------------------------
    document.getElementById('importButton6').addEventListener('click', function () {
        document.getElementById('fileImport6').click();
    });

    document.getElementById('fileImport6').addEventListener('change', function (event) {
        const file = event.target.files[0];
        if (file) {
            document.getElementById('loadingSpinner').style.display = 'block';
            const reader = new FileReader();
            reader.onload = function (e) {
                const text = e.target.result;
                const rows = text.split('\n').map(row => row.split(','));


                const data = rows.slice(1);
                if (data.length > 0) {
                    saveMasterlist(data);
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

    function saveMasterlist(data) {
        fetch('../../process/i_masterlist.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ data: data })
        })
            .then(response => response.json())
            .then(result => {
                alert(result.message);
                document.getElementById('loadingSpinner').style.display = 'none';
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error saving data. Please try again.');
                document.getElementById('loadingSpinner').style.display = 'none';
            });
    }
    // ---------------------------display data-----------------------------------
    let page = 1;
    let rowCount = 0;  // Counter to keep track of row IDs
    const loading = document.getElementById('loading');
    const tableBody = document.getElementById('table_body1');
    const dataCount = document.getElementById('dataCount1');

    function fetchData(page) {
        loading.style.display = 'block';

        fetch(`../../process/combine.php?page=${page}`)
            .then(response => response.json())
            .then(data => {
                let rows = '';
                data.data.forEach(row => {
                    rows += `<tr>`;
                    rows += `<td>${++rowCount}</td>`;  // Add ID column

                    // Use 0 if the data is null or empty
                    rows += `<td>${row.base_product || '0'}</td>`;
                    rows += `<td>${row.car_model || '0'}</td>`;
                    rows += `<td>${row.product || '0'}</td>`;
                    rows += `<td>${row.car_code || 'N/A'}</td>`;
                    rows += `<td>${row.block || 'N/A'}</td>`;
                    rows += `<td>${row.class || 'N/A'}</td>`;
                    rows += `<td>${row.line_no || 'N/A'}</td>`;
                    rows += `<td>${row.circuit_qty || 'N/A'}</td>`;

                    rows += `<td>${row.trd_nwpa_0_13 || '0'}</td>`;
                    rows += `<td>${row.trd_nwpa_below_2_0_except_0_13 || '0'}</td>`;
                    rows += `<td>${row.trd_nwpa_2_0_3_0 || '0'}</td>`;
                    rows += `<td>${row.trd_wpa_0_13 || '0'}</td>`;
                    rows += `<td>${row.trd_wpa_below_2_0_except_0_13 || '0'}</td>`;
                    rows += `<td>${row.trd_wpa_2_0_3_0 || '0'}</td>`;
                    rows += `<td>${row.tr327 || '0'}</td>`;
                    rows += `<td>${row.tr328 || '0'}</td>`;
                    rows += `<td>${row.trd_aluminum_nwpa_2_0 || '0'}</td>`;
                    rows += `<td>${row.trd_aluminum_nwpa_below_2_0 || '0'}</td>`;
                    rows += `<td>${row.trd_aluminum_wpa_2_0 || '0'}</td>`;
                    rows += `<td>${row.trd_aluminum_wpa_below_2_0 || '0'}</td>`;
                    rows += `<td>${row.aluminum_dimension_check_aluminum_terminal_inspection || '0'}</td>`;
                    rows += `<td>${row.aluminum_visual_inspection || '0'}</td>`;
                    rows += `<td>${row.aluminum_coating_uv_ii || '0'}</td>`;
                    rows += `<td>${row.aluminum_image_inspection || '0'}</td>`;
                    rows += `<td>${row.aluminum_uv_iii || '0'}</td>`;
                    rows += `<td>${row.trd_alpha_aluminum_nwpa || '0'}</td>`;
                    rows += `<td>${row.trd_alpha_aluminum_wpa || '0'}</td>`;
                    rows += `<td>${row.aluminum_visual_inspection_for_alpha || '0'}</td>`;
                    rows += `<td>${row.enlarged_terminal_check_for_alpha || '0'}</td>`;
                    rows += `<td>${row.air_water_leak_test || '0'}</td>`;
                    rows += `<td>${row.sam_sub_no_airbag || '0'}</td>`;
                    rows += `<td>${row.sam_sub_no_normal || '0'}</td>`;
                    rows += `<td>${row.jam_auto_crimping_and_twisting || '0'}</td>`;
                    rows += `<td>${row.trd_alpha_aluminum_5_0_above || '0'}</td>`;
                    rows += `<td>${row.point_marking_nsc || '0'}</td>`;
                    rows += `<td>${row.point_marking_sam || '0'}</td>`;
                    rows += `<td>${row.enlarged_terminal_check_aluminum || '0'}</td>`;
                    rows += `<td>${row.nsc_1 || '0'}</td>`;
                    rows += `<td>${row.nsc_2 || '0'}</td>`;
                    rows += `<td>${row.nsc_3 || '0'}</td>`;
                    rows += `<td>${row.nsc_4 || '0'}</td>`;
                    rows += `<td>${row.nsc_5 || '0'}</td>`;
                    rows += `<td>${row.nsc_6 || '0'}</td>`;
                    rows += `<td>${row.nsc_7 || '0'}</td>`;
                    rows += `<td>${row.nsc_8 || '0'}</td>`;
                    rows += `<td>${row.nsc_9 || '0'}</td>`;
                    rows += `<td>${row.nsc_10 || '0'}</td>`;

                    rows += `<td>${row.joint_crimping_20tons_ps_115_2_3l_2 || '0'}</td>`;
                    rows += `<td>${row.ultrasonic_welding || '0'}</td>`;
                    rows += `<td>${row.servo_press_crimping || '0'}</td>`;
                    rows += `<td>${row.low_viscosity || '0'}</td>`;
                    rows += `<td>${row.air_water_leak_test || '0'}</td>`;
                    rows += `<td>${row.heatshrink_low_viscosity || '0'}</td>`;
                    rows += `<td>${row.stmac_shieldwire_j12 || '0'}</td>`;
                    rows += `<td>${row.hirose_sheath_stripping_927r || '0'}</td>`;
                    rows += `<td>${row.hirose_unistrip || '0'}</td>`;
                    rows += `<td>${row.hirose_acetate_taping || '0'}</td>`;
                    rows += `<td>${row.hirose_manual_crimping_2_tons || '0'}</td>`;
                    rows += `<td>${row.hirose_copper_taping || '0'}</td>`;
                    rows += `<td>${row.hirose_hgt17ap_crimping || '0'}</td>`;
                    rows += `<td>${row.stmac_aluminum || '0'}</td>`;
                    rows += `<td>${row.manual_crimping_20tons || '0'}</td>`;
                    rows += `<td>${row.dip_soldering_battery || '0'}</td>`;
                    rows += `<td>${row.ultrasonic_dip_soldering_aluminum || '0'}</td>`;
                    rows += `<td>${row.la_molding || '0'}</td>`;
                    rows += `<td>${row.pressure_welding_sun_visor || '0'}</td>`;
                    rows += `<td>${row.pressure_welding_dome_lamp || '0'}</td>`;
                    rows += `<td>${row.casting_c377a || '0'}</td>`;
                    rows += `<td>${row.coaxstrip_6580 || '0'}</td>`;
                    rows += `<td>${row.manual_crimping_2t_ferrule || '0'}</td>`;
                    rows += `<td>${row.ferrule_auto_crimping || '0'}</td>`;
                    rows += `<td>${row.enlarge_terminal_inspection || '0'}</td>`;
                    rows += `<td>${row.waterproof_pad_press || '0'}</td>`;
                    rows += `<td>${row.parts_insertion || '0'}</td>`;
                    rows += `<td>${row.braided_wire_folding || '0'}</td>`;
                    rows += `<td>${row.outside_ferrule_insertion || '0'}</td>`;
                    rows += `<td>${row.joint_crimping_2t || '0'}</td>`;
                    rows += `<td>${row.welding_at_head || '0'}</td>`;
                    rows += `<td>${row.welding_taping || '0'}</td>`;
                    rows += `<td>${row.uv_iii_1 || '0'}</td>`;
                    rows += `<td>${row.uv_iii_2 || '0'}</td>`;
                    rows += `<td>${row.uv_iii_4 || '0'}</td>`;
                    rows += `<td>${row.uv_iii_5 || '0'}</td>`;
                    rows += `<td>${row.uv_iii_7 || '0'}</td>`;
                    rows += `<td>${row.uv_iii_8 || '0'}</td>`;
                    rows += `<td>${row.drainwire_tip || '0'}</td>`;
                    rows += `<td>${row.arc_welding || '0'}</td>`;
                    rows += `<td>${row.c373a_yamaha || '0'}</td>`;
                    rows += `<td>${row.cocripper || '0'}</td>`;
                    rows += `<td>${row.quickstripping || '0'}</td>`;

                    rows += `<td>${row.airbag_housing || '0'}</td>`;
                    rows += `<td>${row.cap_insertion || '0'}</td>`;
                    rows += `<td>${row.shieldwire_taping || '0'}</td>`;
                    rows += `<td>${row.gomusen_insertion || '0'}</td>`;
                    rows += `<td>${row.point_marking || '0'}</td>`;
                    rows += `<td>${row.looping || '0'}</td>`;
                    rows += `<td>${row.shikakari_handler || '0'}</td>`;
                    rows += `<td>${row.black_taping || '0'}</td>`;
                    rows += `<td>${row.components_insertion || '0'}</td>`;

                    rows += `<td>${row.joint_crimping_2tons_ps_800_s_2 || '0'}</td>`;
                    rows += `<td>${row.joint_crimping_2tons_ps_200_m_2 || '0'}</td>`;
                    rows += `<td>${row.joint_crimping_2tons_ps_017_ss_2 || '0'}</td>`;
                    rows += `<td>${row.joint_crimping_2tons_ps_126_sst2 || '0'}</td>`;
                    rows += `<td>${row.joint_crimping_4tons_ps_700_l_2 || '0'}</td>`;
                    rows += `<td>${row.joint_crimping_5tons_ps_150_ll || '0'}</td>`;
                    rows += `<td>${row.manual_crimping_shieldwire_2t || '0'}</td>`;
                    rows += `<td>${row.manual_crimping_shieldwire_4t || '0'}</td>`;
                    rows += `<td>${row.joint_crimping_2tons_ps_800_s_2_sw || '0'}</td>`;
                    rows += `<td>${row.joint_crimping_2tons_ps_126_sst2_sw || '0'}</td>`;
                    rows += `<td>${row.joint_crimping_2tons_ps_017_ss_2_sw || '0'}</td>`;
                    rows += `<td>${row.twisting_primary_normal_wires_l_less_than_1500mm || '0'}</td>`;
                    rows += `<td>${row.twisting_primary_normal_wires_l_less_than_3000mm || '0'}</td>`;
                    rows += `<td>${row.twisting_primary_normal_wires_l_less_than_4500mm || '0'}</td>`;
                    rows += `<td>${row.twisting_primary_normal_wires_l_less_than_6000mm || '0'}</td>`;
                    rows += `<td>${row.twisting_primary_normal_wires_l_less_than_7500mm || '0'}</td>`;
                    rows += `<td>${row.twisting_primary_normal_wires_l_less_than_9000mm || '0'}</td>`;
                    rows += `<td>${row.twisting_secondary_normal_wires_l_less_than_1500mm || '0'}</td>`;
                    rows += `<td>${row.twisting_secondary_normal_wires_l_less_than_3000mm || '0'}</td>`;
                    rows += `<td>${row.twisting_secondary_normal_wires_l_less_than_4500mm || '0'}</td>`;
                    rows += `<td>${row.twisting_secondary_normal_wires_l_less_than_6000mm || '0'}</td>`;
                    rows += `<td>${row.twisting_secondary_normal_wires_l_less_than_7500mm || '0'}</td>`;
                    rows += `<td>${row.twisting_secondary_normal_wires_l_less_than_9000mm || '0'}</td>`;
                    rows += `<td>${row.twisting_primary_aluminum_wires_l_less_than_1500mm || '0'}</td>`;
                    rows += `<td>${row.twisting_primary_aluminum_wires_l_less_than_3000mm || '0'}</td>`;
                    rows += `<td>${row.twisting_primary_aluminum_wires_l_less_than_4500mm || '0'}</td>`;
                    rows += `<td>${row.twisting_primary_aluminum_wires_l_less_than_6000mm || '0'}</td>`;
                    rows += `<td>${row.twisting_secondary_aluminum_wires_l_less_than_1500mm || '0'}</td>`;
                    rows += `<td>${row.twisting_secondary_aluminum_wires_l_less_than_3000mm || '0'}</td>`;
                    rows += `<td>${row.twisting_secondary_aluminum_wires_l_less_than_4500mm || '0'}</td>`;
                    rows += `<td>${row.twisting_secondary_aluminum_wires_l_less_than_6000mm || '0'}</td>`;
                    rows += `<td>${row.twisting_secondary_aluminum_wires_l_less_than_7500mm || '0'}</td>`;
                    rows += `<td>${row.twisting_secondary_aluminum_wires_l_less_than_9000mm || '0'}</td>`;
                    rows += `<td>${row.manual_crimping_2tons_normal_single_crimp || '0'}</td>`;
                    rows += `<td>${row.manual_crimping_2tons_normal_double_crimp || '0'}</td>`;
                    rows += `<td>${row.manual_crimping_2tons_double_crimp_twisted || '0'}</td>`;
                    rows += `<td>${row.manual_crimping_2tons_la_terminal || '0'}</td>`;
                    rows += `<td>${row.manual_crimping_2tons_double_crimp_la_terminal || '0'}</td>`;
                    rows += `<td>${row.manual_crimping_2tons_w_gomusen || '0'}</td>`;
                    rows += `<td>${row.manual_crimping_4tons_double_crimp_twisted || '0'}</td>`;
                    rows += `<td>${row.manual_crimping_4tons_normal_single_crimp || '0'}</td>`;
                    rows += `<td>${row.manual_crimping_4tons_normal_double_crimp || '0'}</td>`;
                    rows += `<td>${row.manual_crimping_4tons_la_terminal || '0'}</td>`;
                    rows += `<td>${row.manual_crimping_4tons_double_crimp_la_terminal || '0'}</td>`;
                    rows += `<td>${row.manual_crimping_4tons_w_gomusen || '0'}</td>`;
                    rows += `<td>${row.manual_crimping_5tons || '0'}</td>`;
                    rows += `<td>${row.intermediate_butt_welding_except_0_13_electrode_1 || '0'}</td>`;
                    rows += `<td>${row.intermediate_butt_welding_except_0_13_electrode_2 || '0'}</td>`;
                    rows += `<td>${row.intermediate_butt_welding_except_0_13_electrode_3 || '0'}</td>`;
                    rows += `<td>${row.intermediate_butt_welding_except_0_13_electrode_4 || '0'}</td>`;
                    rows += `<td>${row.intermediate_butt_welding_except_0_13_electrode_5 || '0'}</td>`;
                    rows += `<td>${row.welding_at_head_except_0_13_electrode_1 || '0'}</td>`;
                    rows += `<td>${row.welding_at_head_except_0_13_electrode_2 || '0'}</td>`;
                    rows += `<td>${row.welding_at_head_except_0_13_electrode_3 || '0'}</td>`;
                    rows += `<td>${row.welding_at_head_except_0_13_electrode_4 || '0'}</td>`;
                    rows += `<td>${row.welding_at_head_except_0_13_electrode_5 || '0'}</td>`;
                    rows += `<td>${row.intermediate_butt_welding_0_13_electrode_1 || '0'}</td>`;
                    rows += `<td>${row.welding_at_head_0_13_electrode_1 || '0'}</td>`;
                    rows += `<td>${row.intermediate_butt_welding_0_13_electrode_2 || '0'}</td>`;
                    rows += `<td>${row.welding_at_head_0_13_electrode_2 || '0'}</td>`;

                    rows += `<td>${row.v_type_twisting || '0'}</td>`;
                    rows += `<td>${row.manual_crimping_2tons_to_be_joint_on_sw || '0'}</td>`;
                    rows += `<td>${row.airbag || '0'}</td>`;
                    rows += `<td>${row.a_b_sub_pc || '0'}</td>`;
                    rows += `<td>${row.intermediate_ripping_uas_manual_nf_f || '0'}</td>`;
                    rows += `<td>${row.manual_crimping_4tons_nf_f || '0'}</td>`;
                    rows += `<td>${row.intermediate_ripping_uas_joint || '0'}</td>`;
                    rows += `<td>${row.intermediate_stripping_kb10 || '0'}</td>`;
                    rows += `<td>${row.manual_taping_dispenser_8_0_5_0_8_0_8_0_ps_115_2_chfus_0_22_civus_0_22 || '0'}</td>`;
                    rows += `<td>${row.joint_taping_11mm_ps_150_ll_2 || '0'}</td>`;
                    rows += `<td>${row.joint_taping_12mm_ps_700_l_2_ps_200_m_2 || '0'}</td>`;
                    rows += `<td>${row.joint_taping_13mm_ps_800_s_2_ps_017_ss_2_ps_126_2_sst2 || '0'}</td>`;
                    rows += `<td>${row.heat_shrink_joint_crimping || '0'}</td>`;
                    rows += `<td>${row.heat_shrink_la_terminal || '0'}</td>`;
                    rows += `<td>${row.manual_crimping_2tons_nsc_weld || '0'}</td>`;
                    rows += `<td>${row.intermediate_stripping_kb10_nsc_weld || '0'}</td>`;
                    rows += `<td>${row.joint_crimping_2tons_ps_017_ss_2_nsc_weld || '0'}</td>`;
                    rows += `<td>${row.joint_taping_13mm_ps_800_s_2_ps_017_ss_2_ps_126_2_sst2_nsc_weld || '0'}</td>`;
                    rows += `<td>${row.silicon_injection || '0'}</td>`;
                    rows += `<td>${row.welding_taping_13mm || '0'}</td>`;
                    rows += `<td>${row.heat_shrink_welding || '0'}</td>`;
                    rows += `<td>${row.casting_c385_shieldwire || '0'}</td>`;
                    rows += `<td>${row.quick_stripping_927_auto || '0'}</td>`;
                    rows += `<td>${row.mira_quick_stripping || '0'}</td>`;
                    rows += `<td>${row.quick_stripping_311_manual || '0'}</td>`;
                    rows += `<td>${row.manual_heat_shrink_blower_sumitube || '0'}</td>`;
                    rows += `<td>${row.manual_taping_dispenser_sw || '0'}</td>`;
                    rows += `<td>${row.heat_shrink_joint_crimping_sw || '0'}</td>`;
                    rows += `<td>${row.casting_c373 || '0'}</td>`;
                    rows += `<td>${row.casting_c377 || '0'}</td>`;
                    rows += `<td>${row.casting_c371 || '0'}</td>`;
                    rows += `<td>${row.manual_heat_shrink_blower_battery || '0'}</td>`;
                    rows += `<td>${row.casting_c373_normal || '0'}</td>`;
                    rows += `<td>${row.casting_c371_normal || '0'}</td>`;
                    rows += `<td>${row.manual_2tons_bending || '0'}</td>`;
                    rows += `<td>${row.manual_5tons_battery || '0'}</td>`;
                    rows += `<td>${row.al_looping || '0'}</td>`;
                    rows += `<td>${row.soldering || '0'}</td>`;
                    rows += `<td>${row.waterproof_agent_injection || '0'}</td>`;
                    rows += `<td>${row.thermosetting || '0'}</td>`;
                    rows += `<td>${row.completion || '0'}</td>`;
                    rows += `<td>${row.picking_looping || '0'}</td>`;
                    rows += `<td>${row.welding_end || '0'}</td>`;
                    rows += `<td>${row.intermediate_welding || '0'}</td>`;
                    rows += `<td>${row.sam_set_a_b || '0'}</td>`;
                    rows += `<td>${row.sam_set_normal || '0'}</td>`;
                    rows += `<td>${row.total_circuit || '0'}</td>`;
                    rows += `<td>${row.new_airbag || '0'}</td>`;


                    rows += `</tr>`;
                });

                // Append new rows to the table
                tableBody.innerHTML += rows;
                dataCount.textContent = `Data Count: ${Math.floor(data.totalRecords / 2)}`;

                loading.style.display = 'none';
            })
            .catch(error => {
                console.error('Error fetching data:', error);
                loading.style.display = 'none';
            });
    }

    document.getElementById('accounts_table_res1').addEventListener('scroll', function () {
        if (this.scrollTop + this.clientHeight >= this.scrollHeight - 10) {
            page++;
            fetchData(page);
        }
    });

    fetchData(page);


</script>

<?php include 'plugins/footer.php'; ?>