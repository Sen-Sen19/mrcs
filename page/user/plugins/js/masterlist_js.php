<script>

document.getElementById('searchButton').addEventListener('click', function () {
    var baseProduct = document.getElementById('searchBaseProduct').value;
    var rowCount = 0; 

    document.getElementById('loadingSpinner').style.display = 'block';

    var xhr = new XMLHttpRequest();
    xhr.open('GET', '../../process/search.php?base_product=' + encodeURIComponent(baseProduct), true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById('loadingSpinner').style.display = 'none';

            var response = JSON.parse(xhr.responseText);
            var tableBody = document.getElementById('table_body1');


            tableBody.innerHTML = '';

            if (response.message) {
                var noResultsRow = document.createElement('tr');
                var noResultsCell = document.createElement('td');
                noResultsCell.colSpan = 21; 
                noResultsCell.textContent = response.message;
                noResultsRow.appendChild(noResultsCell);
                tableBody.appendChild(noResultsRow);
            } else {
                // Create a new row without an ID
                var tr = document.createElement('tr');
                tr.classList.add('highlight-row');

             

                for (var key in response) {
                    var td = document.createElement('td');
                    td.textContent = response[key];
                    tr.appendChild(td);
                }

                tableBody.appendChild(tr);

                document.getElementById('dataCount1').textContent = 'Data Count: ' + rowCount; 
            }
        }
    };
    xhr.send();
});



    
    // ---------------------------display data-----------------------------------
    let page = 1;
    let rowCount = 0;  
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

              
                tableBody.innerHTML += rows;
                dataCount.textContent = `Data Count: ${Math.floor(data.totalRecords)}`;

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