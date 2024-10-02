<script>

document.getElementById('searchButton').addEventListener('click', function () {
        var baseProduct = document.getElementById('searchBaseProduct').value;
        var rowCount = 0; 
     
        document.getElementById('loadingSpinner').style.display = 'block';

       
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '../../process/search_other_process.php?base_product=' + encodeURIComponent(baseProduct), true);
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




    document.addEventListener('DOMContentLoaded', function () {

        function closeModal() {
            const modalElement = document.getElementById('updateModal');
            const modalInstance = bootstrap.Modal.getInstance(modalElement);
            if (modalInstance) {
                modalInstance.hide();
            } else {

                const modal = new bootstrap.Modal(modalElement);
                modal.hide();
            }
        }

        document.getElementById('importButton5').addEventListener('click', closeModal);
        
    });

    // ------------------------------- unique process --------------------------------------
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
        fetch('../../process/i_other_process.php', {
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
                        window.location.reload();
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
                        window.location.reload();
                    }
                });
                document.getElementById('loadingSpinner').style.display = 'none';
            });
    }


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