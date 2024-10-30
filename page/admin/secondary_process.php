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
                        <th>BASE PRODUCT</th>
                        <th>CAR MODEL</th>
                        <th>PRODUCT</th>
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
        window.location.href = "../../process/export_secondary_process.php";
    });

    document.getElementById("carModelSelect").addEventListener("change", function () {
        fetchData(this.value);
    });

    function fetchData(selectedCarModel = '') {
        const loadingSpinner = document.getElementById('loadingSpinner');
        loadingSpinner.style.display = 'block';

        fetch('../../process/fetch_secondary_process.php')
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
<td>${row.joint_crimping_2tons_ps_800_s_2}</td>
                   <td>${row.joint_crimping_2tons_ps_200_m_2}</td>
                   <td>${row.joint_crimping_2tons_ps_017_ss_2}</td>
                   <td>${row.joint_crimping_2tons_ps_126_sst2}</td>
                   <td>${row.joint_crimping_4tons_ps_700_l_2}</td>
                   <td>${row.joint_crimping_5tons_ps_150_ll}</td>
                   <td>${row.manual_crimping_shieldwire_2t}</td>
                   <td>${row.manual_crimping_shieldwire_4t}</td>
                   <td>${row.joint_crimping_2tons_ps_800_s_2_sw}</td>
                   <td>${row.joint_crimping_2tons_ps_126_sst2_sw}</td>
                   <td>${row.joint_crimping_2tons_ps_017_ss_2_sw}</td>
                   <td>${row.twisting_primary_normal_wires_l_less_than_1500mm}</td>
                   <td>${row.twisting_primary_normal_wires_l_less_than_3000mm}</td>
                   <td>${row.twisting_primary_normal_wires_l_less_than_4500mm}</td>
                   <td>${row.twisting_primary_normal_wires_l_less_than_6000mm}</td>
                   <td>${row.twisting_primary_normal_wires_l_less_than_7500mm}</td>
                   <td>${row.twisting_primary_normal_wires_l_less_than_9000mm}</td>
                   <td>${row.twisting_secondary_normal_wires_l_less_than_1500mm}</td>
                   <td>${row.twisting_secondary_normal_wires_l_less_than_3000mm}</td>
                   <td>${row.twisting_secondary_normal_wires_l_less_than_4500mm}</td>
                   <td>${row.twisting_secondary_normal_wires_l_less_than_6000mm}</td>
                   <td>${row.twisting_secondary_normal_wires_l_less_than_7500mm}</td>
                   <td>${row.twisting_secondary_normal_wires_l_less_than_9000mm}</td>
                   <td>${row.twisting_primary_aluminum_wires_l_less_than_1500mm}</td>
                   <td>${row.twisting_primary_aluminum_wires_l_less_than_3000mm}</td>
                   <td>${row.twisting_primary_aluminum_wires_l_less_than_4500mm}</td>
                   <td>${row.twisting_primary_aluminum_wires_l_less_than_6000mm}</td>
                   <td>${row.twisting_secondary_aluminum_wires_l_less_than_1500mm}</td>
                   <td>${row.twisting_secondary_aluminum_wires_l_less_than_3000mm}</td>
                   <td>${row.twisting_secondary_aluminum_wires_l_less_than_4500mm}</td>
                   <td>${row.twisting_secondary_aluminum_wires_l_less_than_6000mm}</td>
                   <td>${row.twisting_secondary_aluminum_wires_l_less_than_7500mm}</td>
                   <td>${row.twisting_secondary_aluminum_wires_l_less_than_9000mm}</td>
                   <td>${row.manual_crimping_2tons_normal_single_crimp}</td>
                   <td>${row.manual_crimping_2tons_normal_double_crimp}</td>
                   <td>${row.manual_crimping_2tons_double_crimp_twisted}</td>
                   <td>${row.manual_crimping_2tons_la_terminal}</td>
                   <td>${row.manual_crimping_2tons_double_crimp_la_terminal}</td>
                   <td>${row.manual_crimping_2tons_w_gomusen}</td>
                   <td>${row.manual_crimping_4tons_double_crimp_twisted}</td>
                   <td>${row.manual_crimping_4tons_normal_single_crimp}</td>
                   <td>${row.manual_crimping_4tons_normal_double_crimp}</td>
                   <td>${row.manual_crimping_4tons_la_terminal}</td>
                   <td>${row.manual_crimping_4tons_double_crimp_la_terminal}</td>
                   <td>${row.manual_crimping_4tons_w_gomusen}</td>
                   <td>${row.manual_crimping_5tons}</td>
                   <td>${row.intermediate_butt_welding_except_0_13_electrode_1}</td>
                   <td>${row.intermediate_butt_welding_except_0_13_electrode_2}</td>
                   <td>${row.intermediate_butt_welding_except_0_13_electrode_3}</td>
                   <td>${row.intermediate_butt_welding_except_0_13_electrode_4}</td>
                   <td>${row.intermediate_butt_welding_except_0_13_electrode_5}</td>
                   <td>${row.welding_at_head_except_0_13_electrode_1}</td>
                   <td>${row.welding_at_head_except_0_13_electrode_2}</td>
                   <td>${row.welding_at_head_except_0_13_electrode_3}</td>
                   <td>${row.welding_at_head_except_0_13_electrode_4}</td>
                   <td>${row.welding_at_head_except_0_13_electrode_5}</td>
                   <td>${row.intermediate_butt_welding_0_13_electrode_1}</td>
                   <td>${row.welding_at_head_0_13_electrode_1}</td>
                   <td>${row.intermediate_butt_welding_0_13_electrode_2}</td>
                   <td>${row.welding_at_head_0_13_electrode_2}</td>
                    `;
                    dataBody.appendChild(tr);
                });

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

<?php include 'plugins/js/js_secondary_process.php'; ?>
<?php include 'plugins/footer.php'; ?>