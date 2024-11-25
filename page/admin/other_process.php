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
                    <th>BASE PRODUCT</th>
                        <th>CAR MODEL</th>
                        <th>PRODUCT</th>
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
    link.download = 'Other Process.csv';
    link.click();
}


    document.getElementById("carModelSelect").addEventListener("change", function () {
        fetchData(this.value); // Pass the selected value to fetchData
    });

    function fetchData(selectedCarModel = '') {
        const loadingSpinner = document.getElementById('loadingSpinner');
        loadingSpinner.style.display = 'block';

        fetch('../../process/fetch_other_process.php')
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
<td>${row.v_type_twisting}</td>
<td>${row.manual_crimping_2tons_to_be_joint_on_sw}</td>
<td>${row.airbag}</td>
<td>${row.a_b_sub_pc}</td>
<td>${row.intermediate_ripping_uas_manual_nf_f}</td>
<td>${row.manual_crimping_4tons_nf_f}</td>
<td>${row.intermediate_ripping_uas_joint}</td>
<td>${row.intermediate_stripping_kb10}</td>
<td>${row.manual_taping_dispenser_8_0_5_0_8_0_8_0_ps_115_2_chfus_0_22_civus_0_22}</td>
<td>${row.joint_taping_11mm_ps_150_ll_2}</td>
<td>${row.joint_taping_12mm_ps_700_l_2_ps_200_m_2}</td>
<td>${row.joint_taping_13mm_ps_800_s_2_ps_017_ss_2_ps_126_2_sst2}</td>
<td>${row.heat_shrink_joint_crimping}</td>
<td>${row.heat_shrink_la_terminal}</td>
<td>${row.manual_crimping_2tons_nsc_weld}</td>
<td>${row.intermediate_stripping_kb10_nsc_weld}</td>
<td>${row.joint_crimping_2tons_ps_017_ss_2_nsc_weld}</td>
<td>${row.joint_taping_13mm_ps_800_s_2_ps_017_ss_2_ps_126_2_sst2_nsc_weld}</td>
<td>${row.silicon_injection}</td>
<td>${row.welding_taping_13mm}</td>
<td>${row.heat_shrink_welding}</td>
<td>${row.casting_c385_shieldwire}</td>
<td>${row.quick_stripping_927_auto}</td>
<td>${row.mira_quick_stripping}</td>
<td>${row.quick_stripping_311_manual}</td>
<td>${row.manual_heat_shrink_blower_sumitube}</td>
<td>${row.manual_taping_dispenser_sw}</td>
<td>${row.heat_shrink_joint_crimping_sw}</td>
<td>${row.casting_c373}</td>
<td>${row.casting_c377}</td>
<td>${row.casting_c371}</td>
<td>${row.manual_heat_shrink_blower_battery}</td>
<td>${row.casting_c373_normal}</td>
<td>${row.casting_c371_normal}</td>
<td>${row.manual_2tons_bending}</td>
<td>${row.manual_5tons_battery}</td>
<td>${row.al_looping}</td>
<td>${row.soldering}</td>
<td>${row.waterproof_agent_injection}</td>
<td>${row.thermosetting}</td>
<td>${row.completion}</td>
<td>${row.picking_looping}</td>
<td>${row.welding_end}</td>
<td>${row.intermediate_welding}</td>
<td>${row.sam_set_a_b}</td>
<td>${row.sam_set_normal}</td>
<td>${row.total_circuit}</td>
<td>${row.new_airbag}</td>
                    `;
                    dataBody.appendChild(tr);
                });

                // Update data count
                document.getElementById('dataCount1').textContent = 'Data Count: ' + filteredData.length;

                loadingSpinner.style.display = 'none';
            })
            .catch(error => {
                console.error('Error fetching data:', error);
                loadingSpinner.style.display = 'none'; 
            });
    }


    fetchData();
</script>

<?php include 'plugins/js/js_other_process.php'; ?>
<?php include 'plugins/footer.php'; ?>