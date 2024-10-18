<script>

document.getElementById('searchButton').addEventListener('click', function () {
        var baseProduct = document.getElementById('searchBaseProduct').value;
        var rowCount = 0; 
     
        document.getElementById('loadingSpinner').style.display = 'block';

       
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '../../process/search_first_process.php?base_product=' + encodeURIComponent(baseProduct), true);
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





    // ------------------------------- first process --------------------------------------
    document.getElementById("importButton1").addEventListener("click", function () {
    document.getElementById("fileImport1").click();
});

document.getElementById("fileImport1").addEventListener("change", function () {
    const fileInput = document.getElementById("fileImport1");
    const file = fileInput.files[0];

    if (file) {
        const formData = new FormData();
        formData.append("csv_file", file);

        
        document.getElementById("loadingSpinner").style.display = 'block';

        fetch("../../process/i_first_process.php", {
            method: "POST",
            body: formData,
        })
        .then(response => response.json())
        .then(data => {
            
            document.getElementById("loadingSpinner").style.display = 'none';

            if (data.success) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'File imported successfully!',
                    timer: 1000, 
                    showConfirmButton: false 
                }).then(() => {
                    location.reload();  
                });
            } else {
                console.error(data.error);
                Swal.fire({
                    icon: 'error',
                    title: 'Import Failed',
                    text: 'File import failed: ' + data.error

                });
            }
        })
        .catch(error => {
            console.error("Error:", error);
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'An error occurred during file import.'
            });
        });
    } else {
        Swal.fire({
            icon: 'warning',
            title: 'No File Selected',
            text: 'Please select a CSV file to import.',
            confirmButtonText: 'OK'
        });
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