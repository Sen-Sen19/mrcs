<script>
document.getElementById('searchButton').addEventListener('click', function () {
    var baseProduct = document.getElementById('searchBaseProduct').value;
    var rowCount = 0; 

    document.getElementById('loadingSpinner').style.display = 'block';

    var xhr = new XMLHttpRequest();
    xhr.open('GET', '../../process/search_unique_process.php?base_product=' + encodeURIComponent(baseProduct), true);
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
                var tr = document.createElement('tr');
                tr.classList.add('highlight-row');


                const columns = [
                   'base_product',
'car_model',
'product',
'car_code',
'block',
'class',
'line_no',
'circuit_qty',
'joint_crimping_20tons_ps_115_2_3l_2',
'ultrasonic_welding',
'servo_press_crimping',
'low_viscosity',
'air_water_leak_test2',
'heatshrink_low_viscosity',
'stmac_shieldwire_j12',
'hirose_sheath_stripping_927r',
'hirose_unistrip',
'hirose_acetate_taping',
'hirose_manual_crimping_2_tons',
'hirose_copper_taping',
'hirose_hgt17ap_crimping',
'stmac_aluminum',
'manual_crimping_20tons',
'dip_soldering_battery',
'ultrasonic_dip_soldering_aluminum',
'la_molding',
'pressure_welding_sun_visor',
'pressure_welding_dome_lamp',
'casting_c377a',
'coaxstrip_6580',
'manual_crimping_2t_ferrule',
'ferrule_auto_crimping',
'enlarge_terminal_inspection',
'waterproof_pad_press',
'parts_insertion',
'braided_wire_folding',
'outside_ferrule_insertion',
'joint_crimping_2t',
'welding_at_head',
'welding_taping',
'uv_iii_1',
'uv_iii_2',
'uv_iii_4',
'uv_iii_5',
'uv_iii_7',
'uv_iii_8',
'drainwire_tip',
'arc_welding',
'c373a_yamaha',
'cocripper',
'quickstripping',

                ];


                columns.forEach(function (column) {
                    var td = document.createElement('td');
                    td.textContent = response[column] !== undefined ? response[column] : ''; 
                    tr.appendChild(td);
                });

                tableBody.appendChild(tr);
                document.getElementById('dataCount1').textContent = 'Data Count: ' + (++rowCount); 
            }
        }
    };
    xhr.send();
});


    // ------------------------------- unique process --------------------------------------
       document.getElementById("importButton2").addEventListener("click", function() {

document.getElementById("fileImport2").click();
});

document.getElementById("fileImport2").addEventListener("change", function() {
const fileInput = document.getElementById("fileImport2");
const file = fileInput.files[0];

if (file) {
    const formData = new FormData();
    formData.append("csv_file", file); 


    document.getElementById("loadingSpinner").style.display = 'block';


    fetch("../../process/i_unique_process.php", {

        method: "POST",
        body: formData,
    })
    .then(response => response.json())
    .then(data => {

        document.getElementById("loadingSpinner").style.display = 'none';

        if (data.success) {
            alert("File imported successfully!");
            location.reload();  
        } else {
            console.error(data.error);
            alert("File import failed: " + data.error);
        }
    })
    .catch(error => {
        console.error("Error:", error);
        alert("An error occurred during file import.");
    });
} else {
    alert("Please select a CSV file to import.");
}
});

    // ---------------------------display data-----------------------------------
    // let page = 1;
    // let rowCount = 0;  
    // const loading = document.getElementById('loading');
    // const tableBody = document.getElementById('table_body1');
    // const dataCount = document.getElementById('dataCount1');

    // function fetchData(page) {
    //     loading.style.display = 'block';

    //     fetch(`../../process/combine.php?page=${page}`)
    //         .then(response => response.json())
    //         .then(data => {
    //             let rows = '';
    //             data.data.forEach(row => {
    //                 rows += `<tr>`;
                
    //                 rows += `<td>${++rowCount}</td>`; 
    //                 rows += `<td>${row.product || '0'}</td>`;
    //                 rows += `<td>${row.car_model || '0'}</td>`;
    //                 rows += `<td>${row.base_product || '0'}</td>`; 
    //                 rows += `<td>${row.car_code || 'N/A'}</td>`;
    //                 rows += `<td>${row.block || 'N/A'}</td>`;
    //                 rows += `<td>${row.class || 'N/A'}</td>`;
    //                 rows += `<td>${row.line_no || 'N/A'}</td>`;
    //                 rows += `<td>${row.circuit_qty || 'N/A'}</td>`;
    //                 rows += `<td>${row.joint_crimping_20tons_ps_115_2_3l_2 || '0'}</td>`;
    //                 rows += `<td>${row.ultrasonic_welding || '0'}</td>`;
    //                 rows += `<td>${row.servo_press_crimping || '0'}</td>`;
    //                 rows += `<td>${row.low_viscosity || '0'}</td>`;
    //                 rows += `<td>${row.air_water_leak_test || '0'}</td>`;
    //                 rows += `<td>${row.heatshrink_low_viscosity || '0'}</td>`;
    //                 rows += `<td>${row.stmac_shieldwire_j12 || '0'}</td>`;
    //                 rows += `<td>${row.hirose_sheath_stripping_927r || '0'}</td>`;
    //                 rows += `<td>${row.hirose_unistrip || '0'}</td>`;
    //                 rows += `<td>${row.hirose_acetate_taping || '0'}</td>`;
    //                 rows += `<td>${row.hirose_manual_crimping_2_tons || '0'}</td>`;
    //                 rows += `<td>${row.hirose_copper_taping || '0'}</td>`;
    //                 rows += `<td>${row.hirose_hgt17ap_crimping || '0'}</td>`;
    //                 rows += `<td>${row.stmac_aluminum || '0'}</td>`;
    //                 rows += `<td>${row.manual_crimping_20tons || '0'}</td>`;
    //                 rows += `<td>${row.dip_soldering_battery || '0'}</td>`;
    //                 rows += `<td>${row.ultrasonic_dip_soldering_aluminum || '0'}</td>`;
    //                 rows += `<td>${row.la_molding || '0'}</td>`;
    //                 rows += `<td>${row.pressure_welding_sun_visor || '0'}</td>`;
    //                 rows += `<td>${row.pressure_welding_dome_lamp || '0'}</td>`;
    //                 rows += `<td>${row.casting_c377a || '0'}</td>`;
    //                 rows += `<td>${row.coaxstrip_6580 || '0'}</td>`;
    //                 rows += `<td>${row.manual_crimping_2t_ferrule || '0'}</td>`;
    //                 rows += `<td>${row.ferrule_auto_crimping || '0'}</td>`;
    //                 rows += `<td>${row.enlarge_terminal_inspection || '0'}</td>`;
    //                 rows += `<td>${row.waterproof_pad_press || '0'}</td>`;
    //                 rows += `<td>${row.parts_insertion || '0'}</td>`;
    //                 rows += `<td>${row.braided_wire_folding || '0'}</td>`;
    //                 rows += `<td>${row.outside_ferrule_insertion || '0'}</td>`;
    //                 rows += `<td>${row.joint_crimping_2t || '0'}</td>`;
    //                 rows += `<td>${row.welding_at_head || '0'}</td>`;
    //                 rows += `<td>${row.welding_taping || '0'}</td>`;
    //                 rows += `<td>${row.uv_iii_1 || '0'}</td>`;
    //                 rows += `<td>${row.uv_iii_2 || '0'}</td>`;
    //                 rows += `<td>${row.uv_iii_4 || '0'}</td>`;
    //                 rows += `<td>${row.uv_iii_5 || '0'}</td>`;
    //                 rows += `<td>${row.uv_iii_7 || '0'}</td>`;
    //                 rows += `<td>${row.uv_iii_8 || '0'}</td>`;
    //                 rows += `<td>${row.drainwire_tip || '0'}</td>`;
    //                 rows += `<td>${row.arc_welding || '0'}</td>`;
    //                 rows += `<td>${row.c373a_yamaha || '0'}</td>`;
    //                 rows += `<td>${row.cocripper || '0'}</td>`;
    //                 rows += `<td>${row.quickstripping || '0'}</td>`;
    //                 rows += `</tr>`;
    //             });

              
    //             tableBody.innerHTML += rows;
    //             dataCount.textContent = `Data Count: ${Math.floor(data.totalRecords)}`;

    //             loading.style.display = 'none';
    //         })
    //         .catch(error => {
    //             console.error('Error fetching data:', error);
    //             loading.style.display = 'none';
    //         });
    // }

    // document.getElementById('accounts_table_res1').addEventListener('scroll', function () {
    //     if (this.scrollTop + this.clientHeight >= this.scrollHeight - 10) {
    //         page++;
    //         fetchData(page);
    //     }
    // });

    // fetchData(page);













    </script>