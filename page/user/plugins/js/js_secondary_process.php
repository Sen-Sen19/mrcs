<script>

document.getElementById('searchButton').addEventListener('click', function () {
        var baseProduct = document.getElementById('searchBaseProduct').value;
        var rowCount = 0; 
     
        document.getElementById('loadingSpinner').style.display = 'block';

       
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '../../process/search_secondary_process.php?base_product=' + encodeURIComponent(baseProduct), true);
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

                 
                    var countTd = document.createElement('td');
                    countTd.textContent = ++rowCount; 
                    tr.appendChild(countTd);

                   
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




    // ------------------------------- unique process --------------------------------------
    document.getElementById("importButton4").addEventListener("click", function() {

document.getElementById("fileImport4").click();
});

document.getElementById("fileImport4").addEventListener("change", function() {
const fileInput = document.getElementById("fileImport4");
const file = fileInput.files[0];

if (file) {
    const formData = new FormData();
    formData.append("csv_file", file); 


    document.getElementById("loadingSpinner").style.display = 'block';


    fetch("../../process/i_secondary_process.php", {

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
                
                    rows += `<td>${++rowCount}</td>`; 
                    rows += `<td>${row.product || '0'}</td>`;
                    rows += `<td>${row.car_model || '0'}</td>`;
                    rows += `<td>${row.base_product || '0'}</td>`; 
                    rows += `<td>${row.car_code || 'N/A'}</td>`;
                    rows += `<td>${row.block || 'N/A'}</td>`;
                    rows += `<td>${row.class || 'N/A'}</td>`;
                    rows += `<td>${row.line_no || 'N/A'}</td>`;
                    rows += `<td>${row.circuit_qty || 'N/A'}</td>`;
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