<script>
document.getElementById('searchButton').addEventListener('click', function () {
    var baseProduct = document.getElementById('searchBaseProduct').value;
    var rowCount = 0; 

    document.getElementById('loadingSpinner').style.display = 'block';

    var xhr = new XMLHttpRequest();
    xhr.open('GET', '../../process/search_non_machine_process.php?base_product=' + encodeURIComponent(baseProduct), true);
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
'airbag_housing',
'cap_insertion',
'shieldwire_taping',
'gomusen_insertion',
'point_marking',
'looping',
'shikakari_handler',
'black_taping',
'components_insertion'

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


    



    // ------------------------------- first process --------------------------------------
    document.getElementById("importButton3").addEventListener("click", function() {

document.getElementById("fileImport3").click();
});

document.getElementById("fileImport3").addEventListener("change", function() {
const fileInput = document.getElementById("fileImport3");
const file = fileInput.files[0];



if (file) {
    const formData = new FormData();
    formData.append("csv_file", file); 




    document.getElementById("loadingSpinner").style.display = 'block';


    fetch("../../process/i_non_machine_process.php", {

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
    //                 rows += `<td>${row.airbag_housing || '0'}</td>`;
    //                 rows += `<td>${row.cap_insertion || '0'}</td>`;
    //                 rows += `<td>${row.shieldwire_taping || '0'}</td>`;
    //                 rows += `<td>${row.gomusen_insertion || '0'}</td>`;
    //                 rows += `<td>${row.point_marking || '0'}</td>`;
    //                 rows += `<td>${row.looping || '0'}</td>`;
    //                 rows += `<td>${row.shikakari_handler || '0'}</td>`;
    //                 rows += `<td>${row.black_taping || '0'}</td>`;
    //                 rows += `<td>${row.components_insertion || '0'}</td>`;

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