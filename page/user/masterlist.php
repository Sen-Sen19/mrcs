<?php include 'plugins/navbar.php'; ?>
<?php include 'plugins/sidebar/user_bar.php'; ?>
<style>
    #loadingSpinner {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 1050;
        /* Ensure it appears above other content */
    }
</style>
<div class="content-wrapper">
    <div id="loadingSpinner" style="display: none;">
        <img src="../../dist/img/1490.gif" alt="Loading..." style="width: 50px; height: 50px;">
    </div>

    <div class="content-header">
        <div class="container-fluid">
            <!-- Tab Navigation -->
            <ul class="nav nav-tabs" id="excelTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="file1-tab" data-toggle="tab" href="#file1" role="tab"
                        aria-controls="file1" aria-selected="true"style="width:200px; margin-bottom:70px;">Masterlist</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="newTab-tab" data-toggle="tab" href="#newTab" role="tab"
                        aria-controls="newTab" aria-selected="false" style="width:200px;">Update</a>
                </li>
            </ul>

            <div class="tab-content" id="excelTabContent">
                <!-- File 1 Tab Pane (now empty) -->
                






                <div class="tab-pane fade show active" id="file1" role="tabpanel" aria-labelledby="file1-tab">
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
        <div class="card-body">
            <!-- Loading Indicator -->
            
            <!-- Table Container -->
            <div id="accounts_table_res1" class="table-responsive"
                style="height: 50vh; overflow: auto; margin-top: 20px; border-top: 1px solid white; background-color: white; padding: 15px; border-radius: 10px;">
                <table id="header_table1" class="table table-sm table-head-fixed text-nowrap table-hover">
                    <thead style="text-align: center;">
                        <tr>
                            <!-- Table Headers -->
                            <th>Base Product</th>
                            <th>Car Model</th>
                            <th>Product</th>
                            <th>Car Code</th>
                            <th>Block</th>
                            <th>Class</th>
                            <th>Line No</th>
                            <th>Circuit Qty</th>
                            <th>2</th>
                            <th>Circuit Qty</th>
                            <th>TRD NWPA 0 13</th>


 

                        </tr>
                        
                    </thead>
                    <tbody id="table_body1" style="text-align: center; padding:20px;">
                        <!-- Table Body for File 1 -->
                    </tbody>
                    
                </table>
                <div id="loading" class="text-center" style="display: none;">
                <img src="../../dist/img/6.gif" alt="Loading..." style="width: 50px; height: 50px;">
                <p>Loading data, please wait...</p>
            </div>
            </div>
            <div id="dataCount1" class="data-count"
                style="text-align: left; padding: 10px; font-size: 16px;">
                Data Count: 0
            </div>
        </div>
    </div>
</div>


















                <!-- New Tab Pane (moved content here) -->
                <div class="tab-pane fade" id="newTab" role="tabpanel" aria-labelledby="newTab-tab">
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <!-- First Process Button -->
                            <button id="importButton1" class="btn btn-primary mt-3"
                                style="background-color: #F0D018; border-color: #F0D018; color: black; margin-right: 20px; width: 100%; max-width: 200px; margin-bottom: 30px; margin-top: 50px !important;">
                                <i class="fas fa-upload"></i> First Process
                            </button>
                            <input type="file" id="fileImport1" class="form-control" accept=".csv"
                                style="display: none;" />

                            <!-- Unique Process Button -->
                            <button id="importButton2" class="btn btn-primary mt-3"
                                style="background-color: #F0D018; border-color: #F0D018; color: black; margin-right: 20px; width: 100%; max-width: 200px; margin-bottom: 30px; margin-top: 50px !important;">
                                <i class="fas fa-upload"></i> Unique Process
                            </button>
                            <input type="file" id="fileImport2" class="form-control" accept=".csv"
                                style="display: none;" />

                            <!-- Non-Machine Process Button -->
                            <button id="importButton3" class="btn btn-primary mt-3"
                                style="background-color: #F0D018; border-color: #F0D018; color: black; margin-right: 20px; width: 100%; max-width: 200px; margin-bottom: 30px; margin-top: 50px !important;">
                                <i class="fas fa-upload"></i> Non-Machine Process
                            </button>
                            <input type="file" id="fileImport3" class="form-control" accept=".csv"
                                style="display: none;" />

                            <!-- Secondary Process Button -->
                            <button id="importButton4" class="btn btn-primary mt-3"
                                style="background-color: #F0D018; border-color: #F0D018; color: black; margin-right: 20px; width: 100%; max-width: 200px; margin-bottom: 30px; margin-top: 50px !important;">
                                <i class="fas fa-upload"></i> Secondary Process
                            </button>
                            <input type="file" id="fileImport4" class="form-control" accept=".csv"
                                style="display: none;" />

                            <!-- Other Process Button -->
                            <button id="importButton5" class="btn btn-primary mt-3"
                                style="background-color: #F0D018; border-color: #F0D018; color: black; margin-right: 20px; width: 100%; max-width: 200px; margin-bottom: 30px; margin-top: 50px !important;">
                                <i class="fas fa-upload"></i> Other Process
                            </button>
                            <input type="file" id="fileImport5" class="form-control" accept=".csv"
                                style="display: none;" />

                            <!-- Update Button -->
                            <button id="importButton6" class="btn btn-primary mt-3"
                                style="background-color: #F0D018; border-color: #F0D018; color: black; margin-right: 20px; width: 100%; max-width: 200px; margin-bottom: 30px; margin-top: 50px !important;">
                                <i class="fas fa-upload"></i> Update
                            </button>
                            <input type="file" id="fileImport6" class="form-control" accept=".csv"
                                style="display: none;" />

                            <!-- Export Button -->
                            <button id="exportButton1" class="btn btn-primary mt-3"
                                style="background-color: #525252; border-color: #525252; color: white; margin-right: 20px; width: 100%; max-width: 200px; margin-bottom: 30px; margin-top: 50px !important;">
                                <i class="fas fa-download"></i> Export
                            </button>
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
                        <div class="card-body">
                            <div id="accounts_table_res1" class="table-responsive"
                                style="height: 50vh; overflow: auto; margin-top: 20px; border-top: 1px solid white; background-color: white; padding: 15px; border-radius: 10px;">
                                <table id="header_table1"
                                    class="table table-sm table-head-fixed text-nowrap table-hover">
                                    <tbody id="table_body1" style="text-align: center; padding:20px;">
                                    </tbody>
                                </table>
                            </div>
                            <div id="dataCount1" class="data-count"
                                style="text-align: left; padding: 10px; font-size: 16px;">
                                Data Count: 0
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // ------------------------------- first process --------------------------------------
    document.getElementById('importButton1').addEventListener('click', function () {
        document.getElementById('fileImport1').click();
    });

    document.getElementById('fileImport1').addEventListener('change', function (event) {
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
        fetch('../../process/i_first_process.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ data: data })
        })
            .then(response => response.json())
            .then(result => {
                alert(result.message);
                document.getElementById('loadingSpinner').style.display = 'none';
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error saving data. Please try again.');
                document.getElementById('loadingSpinner').style.display = 'none';
            });
    }

    // ------------------------------- unique process --------------------------------------
    document.getElementById('importButton2').addEventListener('click', function () {
        document.getElementById('fileImport2').click();
    });

    document.getElementById('fileImport2').addEventListener('change', function (event) {
        const file = event.target.files[0];
        if (file) {
            document.getElementById('loadingSpinner').style.display = 'block';
            const reader = new FileReader();
            reader.onload = function (e) {
                const text = e.target.result;
                const rows = text.split('\n').map(row => row.split(','));

                const data = rows.slice(1);
                if (data.length > 0) {
                    saveUniqueProcess(data);
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

    function saveUniqueProcess(data) {
        fetch('../../process/i_unique_process.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ data: data })
        })
            .then(response => response.json())
            .then(result => {
                alert(result.message);
                document.getElementById('loadingSpinner').style.display = 'none';
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error saving data. Please try again.');
                document.getElementById('loadingSpinner').style.display = 'none';
            });
    }

    // ------------------------------- non-machine process --------------------------------------
    document.getElementById('importButton3').addEventListener('click', function () {
        document.getElementById('fileImport3').click();
    });

    document.getElementById('fileImport3').addEventListener('change', function (event) {
        const file = event.target.files[0];
        if (file) {
            document.getElementById('loadingSpinner').style.display = 'block';
            const reader = new FileReader();
            reader.onload = function (e) {
                const text = e.target.result;
                const rows = text.split('\n').map(row => row.split(','));


                const data = rows.slice(1);
                if (data.length > 0) {
                    saveNonMachineProcess(data);
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

    function saveNonMachineProcess(data) {
        fetch('../../process/i_non_machine_process.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ data: data })
        })
            .then(response => response.json())
            .then(result => {
                alert(result.message);
                document.getElementById('loadingSpinner').style.display = 'none';
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error saving data. Please try again.');
                document.getElementById('loadingSpinner').style.display = 'none';
            });
    }


    // ------------------------------- Secondary process --------------------------------------
    document.getElementById('importButton4').addEventListener('click', function () {
        document.getElementById('fileImport4').click();
    });

    document.getElementById('fileImport4').addEventListener('change', function (event) {
        const file = event.target.files[0];
        if (file) {
            document.getElementById('loadingSpinner').style.display = 'block';
            const reader = new FileReader();
            reader.onload = function (e) {
                const text = e.target.result;
                const rows = text.split('\n').map(row => row.split(','));


                const data = rows.slice(1);
                if (data.length > 0) {
                    saveSecondaryProcess(data);
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

    function saveSecondaryProcess(data) {
        fetch('../../process/i_secondary_process.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ data: data })
        })
            .then(response => response.json())
            .then(result => {
                alert(result.message);
                document.getElementById('loadingSpinner').style.display = 'none';
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error saving data. Please try again.');
                document.getElementById('loadingSpinner').style.display = 'none';
            });
    }

        // ------------------------------- Other process --------------------------------------
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
                    saveOtherProcess(data);
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

    function saveOtherProcess(data) {
        fetch('../../process/i_other_process.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ data: data })
        })
            .then(response => response.json())
            .then(result => {
                alert(result.message);
                document.getElementById('loadingSpinner').style.display = 'none';
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error saving data. Please try again.');
                document.getElementById('loadingSpinner').style.display = 'none';
            });
    }

     // ------------------------------- Update masterlist process --------------------------------------
     document.getElementById('importButton6').addEventListener('click', function () {
        document.getElementById('fileImport6').click();
    });

    document.getElementById('fileImport6').addEventListener('change', function (event) {
        const file = event.target.files[0];
        if (file) {
            document.getElementById('loadingSpinner').style.display = 'block';
            const reader = new FileReader();
            reader.onload = function (e) {
                const text = e.target.result;
                const rows = text.split('\n').map(row => row.split(','));


                const data = rows.slice(1);
                if (data.length > 0) {
                    saveMasterlist(data);
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

    function saveMasterlist(data) {
        fetch('../../process/i_masterlist.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ data: data })
        })
            .then(response => response.json())
            .then(result => {
                alert(result.message);
                document.getElementById('loadingSpinner').style.display = 'none';
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error saving data. Please try again.');
                document.getElementById('loadingSpinner').style.display = 'none';
            });
    }
// ---------------------------display data-----------------------------------
let page = 1;
const loading = document.getElementById('loading');
const tableBody = document.getElementById('table_body1');
const dataCount = document.getElementById('dataCount1');

function fetchData(page) {
    loading.style.display = 'block';

    fetch(`../../process/combine.php?page=${page}`)
        .then(response => response.json())
        .then(data => {
            let rows = '';
            data.forEach(row => {
                rows += `<tr>`;
                rows += `<td>${row.base_product || ''}</td>`;
                rows += `<td>${row.car_model || ''}</td>`;
                rows += `<td>${row.product || ''}</td>`;
                rows += `<td>${row.car_code || ''}</td>`;
                rows += `<td>${row.block || ''}</td>`;
                rows += `<td>${row.class || ''}</td>`;
                rows += `<td>${row.line_no || ''}</td>`;
                rows += `<td>${row.circuit_qty || ''}</td>`;
                rows += `<td>${row.trd_nwpa_0_13 || ''}</td>`;
                rows += `</tr>`;
            });

            // Append new rows to the table
            tableBody.innerHTML += rows;
            dataCount.textContent = `Data Count: ${tableBody.getElementsByTagName('tr').length}`;

            loading.style.display = 'none';
        })
        .catch(error => {
            console.error('Error fetching data:', error);
            loading.style.display = 'none';
        });
}

document.getElementById('accounts_table_res1').addEventListener('scroll', function() {
    if (this.scrollTop + this.clientHeight >= this.scrollHeight - 10) {
        page++;
        fetchData(page);  // Fetch more data
    }
});

// Initial fetch
fetchData(page);

</script>

<?php include 'plugins/footer.php'; ?>