<?php include 'plugins/navbar.php'; ?>
<?php include 'plugins/sidebar/admin_bar.php'; ?>

<div class="content-wrapper">
  

    <div class="tab-content" id="excelTabContent">
        <div class="tab-pane fade show active" id="file1" role="tabpanel" aria-labelledby="file1-tab">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-2">
                        <input type="text" id="searchBaseProduct" class="form-control" placeholder="Base Product"
                            style="height: 35px; font-size: 14px; margin-top: 50px;" />
                    </div>
                    <div class="col-sm-2">
                        <select id="carModelSelect" class="form-control"
                            style="height: 35px; font-size: 14px; margin-top: 50px;">
                            <option value="" disabled selected>Car Model</option>
                            <option value="subaru">Subaru</option>
                            <option value="toyota">Toyota</option>
                            <option value="mazda merge">Mazda Merge</option>
                            <option value="suzuki old">Suzuki Old</option>
                            <option value="honda tkra">Honda TKRA</option>
                            <option value="mazda j12">Mazda J12</option>
                            <option value="honda t20">Honda T20</option>
                            <option value="honda old">Honda Old</option>
                            <option value="daihatsu d01l">Daihatsu D01L</option>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <button type="button" id="searchButton" class="btn btn-primary w-100"
                            style="height: 35px; font-size: 14px; margin-top: 50px;">
                            <i class="fas fa-search mr-2"></i>Search
                        </button>
                    </div>
                   
                </div>
            </div>
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
                <div id="accounts_table_res1" class="table-responsive"
                    style="height: 50vh; overflow: auto; margin-top: 20px; border-top: 1px solid white; background-color: white;  border-radius: 10px;">
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
                        <tbody id="dataBody" style="text-align: center;"></tbody>
                       
                    </table>
                    

                </div>
                
            </div>
        </div>
    </div>
</div>
<script>
    function fetchData() {
        const loadingSpinner = document.getElementById('loadingSpinner');


        loadingSpinner.style.display = 'block';

       
        fetch('../../process/combine.php')
            .then(response => response.json())
            .then(data => {
                const dataBody = document.getElementById('dataBody');
                dataBody.innerHTML = '';

                data.forEach(row => {
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


                     <td>${row.airbag_housing}</td>
                    <td>${row.cap_insertion}</td>
                    <td>${row.shieldwire_taping}</td>
                    <td>${row.gomusen_insertion}</td>
                    <td>${row.point_marking}</td>
                    <td>${row.looping}</td>
                    <td>${row.shikakari_handler}</td>
                    <td>${row.black_taping}</td>
                    <td>${row.components_insertion}</td>



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

 
                loadingSpinner.style.display = 'none';
            })
            .catch(error => {
                console.error('Error fetching data:', error);
                loadingSpinner.style.display = 'none';
            });
    }

 
    document.addEventListener('DOMContentLoaded', fetchData);

</script>


<?php include 'plugins/footer.php'; ?>