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
            <h3 class="card-title">unique Process</h3>
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
    link.download = 'Unique Process.csv';
    link.click();
}


    document.getElementById("carModelSelect").addEventListener("change", function () {
        fetchData(this.value);
    });

    function fetchData(selectedCarModel = '') {
        const loadingSpinner = document.getElementById('loadingSpinner');
        loadingSpinner.style.display = 'block';

        fetch('../../process/fetch_unique_process.php')
            .then(response => response.json())
            .then(data => {
                const dataBody = document.getElementById('table_body1');
                dataBody.innerHTML = '';


                const filteredData = selectedCarModel
                    ? data.filter(row => row.car_model === selectedCarModel)
                    : data; 

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
                   <td>${row.joint_crimping_20tons_ps_115_2_3l_2}</td>
                    <td>${row.ultrasonic_welding}</td>
                    <td>${row.servo_press_crimping}</td>
                    <td>${row.low_viscosity}</td>
                    <td>${row.air_water_leak_test}</td>
                    <td>${row.heatshrink_low_viscosity}</td>
                    <td>${row.stmac_shieldwire_j12}</td>
                    <td>${row.hirose_sheath_stripping_927r}</td>
                    <td>${row.hirose_unistrip}</td>
                    <td>${row.hirose_acetate_taping}</td>
                    <td>${row.hirose_manual_crimping_2_tons}</td>
                    <td>${row.hirose_copper_taping}</td>
                    <td>${row.hirose_hgt17ap_crimping}</td>
                    <td>${row.stmac_aluminum}</td>
                    <td>${row.manual_crimping_20tons}</td>
                    <td>${row.dip_soldering_battery}</td>
                    <td>${row.ultrasonic_dip_soldering_aluminum}</td>
                    <td>${row.la_molding}</td>
                    <td>${row.pressure_welding_sun_visor}</td>
                    <td>${row.pressure_welding_dome_lamp}</td>
                    <td>${row.casting_c377a}</td>
                    <td>${row.coaxstrip_6580}</td>
                    <td>${row.manual_crimping_2t_ferrule}</td>
                    <td>${row.ferrule_auto_crimping}</td>
                    <td>${row.enlarge_terminal_inspection}</td>
                    <td>${row.waterproof_pad_press}</td>
                    <td>${row.parts_insertion}</td>
                    <td>${row.braided_wire_folding}</td>
                    <td>${row.outside_ferrule_insertion}</td>
                    <td>${row.joint_crimping_2t}</td>
                    <td>${row.welding_at_head}</td>
                    <td>${row.welding_taping}</td>
                    <td>${row.uv_iii_1}</td>
                    <td>${row.uv_iii_2}</td>
                    <td>${row.uv_iii_4}</td>
                    <td>${row.uv_iii_5}</td>
                    <td>${row.uv_iii_7}</td>
                    <td>${row.uv_iii_8}</td>
                    <td>${row.drainwire_tip}</td>
                    <td>${row.arc_welding}</td>
                    <td>${row.c373a_yamaha}</td>
                    <td>${row.cocripper}</td>
                    <td>${row.quickstripping}</td>
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

<?php include 'plugins/js/js_unique_process.php'; ?>
<?php include 'plugins/footer.php'; ?>