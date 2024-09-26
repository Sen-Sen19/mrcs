<?php include 'plugins/navbar.php'; ?>
<?php include 'plugins/sidebar/user_bar.php'; ?>
<?php include '../../process/table_operation.php'; ?>

<div class="content-wrapper">
    <div id="loadingSpinner"
        style="display: none; background-color: white; padding: 10px; border-radius: 5px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.6);">
        <img src="../../dist/img/6.gif" alt="Loading..." style="width: 50px; height: 50px;">
        <p style="margin-top: 10px;">Please wait. Do not reload the page</p>
    </div>



    <!-- Update Modal -->
    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Update Options</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row justify-content-center">
                        <div class="col-12 text-center">
                        <div class="col-md-4 mt-3">
                <button id="addButton" class="btn btn-success btn-block" data-toggle="modal"
                    data-target="#myModal"> <i class="fas fa-plus"></i> &nbsp; Add</button>
            </div>
                            <!-- First Row of Buttons -->
                            <div class="d-flex flex-wrap justify-content-center mb-4">
                                <button id="importButton1" class="btn btn-primary mt-3"
                                    style="background-color: #F0D018; border-color: #F0D018; color: black; width: 200px; margin-right: 10px;">
                                    <i class="fas fa-upload"></i> First Process
                                </button>
                                <input type="file" id="fileImport1" class="form-control" accept=".csv"
                                    style="display: none;" />

                                <button id="importButton2" class="btn btn-primary mt-3"
                                    style="background-color: #F0D018; border-color: #F0D018; color: black; width: 200px;">
                                    <i class="fas fa-upload"></i> Unique Process
                                </button>
                                <input type="file" id="fileImport2" class="form-control" accept=".csv"
                                    style="display: none;" />
                            </div>

                            <!-- Second Row of Buttons -->
                            <div class="d-flex flex-wrap justify-content-center mb-4">
                                <button id="importButton3" class="btn btn-primary mt-3"
                                    style="background-color: #F0D018; border-color: #F0D018; color: black; width: 200px; margin-right: 10px;">
                                    <i class="fas fa-upload"></i> Non-Machine Process
                                </button>
                                <input type="file" id="fileImport3" class="form-control" accept=".csv"
                                    style="display: none;" />

                                <button id="importButton4" class="btn btn-primary mt-3"
                                    style="background-color: #F0D018; border-color: #F0D018; color: black; width: 200px;">
                                    <i class="fas fa-upload"></i> Secondary Process
                                </button>
                                <input type="file" id="fileImport4" class="form-control" accept=".csv"
                                    style="display: none;" />
                            </div>

                            <!-- Third Row of Buttons -->
                            <div class="d-flex flex-wrap justify-content-center mb-4">
                                <button id="importButton5" class="btn btn-primary mt-3"
                                    style="background-color: #F0D018; border-color: #F0D018; color: black; width: 200px; margin-right: 10px;">
                                    <i class="fas fa-upload"></i> Other Process
                                </button>
                                <input type="file" id="fileImport5" class="form-control" accept=".csv"
                                    style="display: none;" />

                                <button id="importButton6" class="btn btn-primary mt-3"
                                    style="background-color: #F0D018; border-color: #F0D018; color: black; width: 200px;">
                                    <i class="fas fa-upload"></i> Update
                                </button>
                                <input type="file" id="fileImport6" class="form-control" accept=".csv"
                                    style="display: none;" />
                            </div>

                            <!-- Add Button -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>























    <div class="card-body">
        <div class="row">
            <div class="col-sm-2">
                <input type="text" id="searchBaseProduct" class="form-control" placeholder="Base Product"
                    style="height: 35px; font-size: 14px; margin-top: 50px;" />
            </div>
            <div class="col-sm-2">
                <button type="button" id="searchButton" class="btn btn-primary w-100"
                    style="height: 35px; font-size: 14px; margin-top: 50px;">
                    <i class="fas fa-search mr-2"></i>Search
                </button>
            </div>



            <div class="col-sm-2">
                <button class="btn btn-warning w-100" data-toggle="modal" data-target="#updateModal"
                    style="height: 35px; font-size: 14px;margin-bottom: 50px; margin-top: 50px;background-color: #F0D018; border-color: #F0D018; color: black; ">
                    <i class="fas fa-file-import"></i>Update
                </button>
            </div>
        </div>
    </div>

    <!-- 
<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <button class="btn btn-primary" data-toggle="modal" data-target="#updateModal"
                        style="background-color: #F0D018; border-color: #F0D018; color: black; width: 200px; margin-bottom: 50px; margin-top: 50px;">
                    <i class="fas fa-upload"></i> Update
                </button>
            </div>
        </div>
    </div>
</div> -->





    <div class="tab-content" id="excelTabContent">

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



                <div id="accounts_table_res1" class="table-responsive"
                    style="height: 50vh; overflow: auto; margin-top: 20px; border-top: 1px solid white; background-color: white; padding: 15px; border-radius: 10px;">
                    <table id="header_table1" class="table table-sm table-head-fixed text-nowrap table-hover">
                        <thead style="text-align: center;">
                            <tr>
                                <th>ID</th>
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
                         



                            </tr>
                        </thead>

                        <tbody id="table_body1" style="text-align: center; padding:20px;">
                        </tbody>
                    </table>
                    <div id="loading" class="text-center" style="display: none;">
                        <img src="../../dist/img/6.gif" alt="Loading..." style="width: 50px; height: 50px;">
                        <p>Loading data, please wait...</p>
                    </div>
                </div>
                <div id="dataCount1" class="data-count" style="text-align: left; padding: 10px; font-size: 16px;">
                    Data Count: 0
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>



<div class="row" id="existingButtons">
            <?php foreach ($tables as $table): ?>
                <div class="col-md-4 mt-3">
                    <button class="btn btn-warning btn-block"
                        onclick="openOptionsModal('<?php echo htmlspecialchars($table['display_name']); ?>', '<?php echo htmlspecialchars($table['table_name']); ?>')">
                        <?php echo htmlspecialchars($table['display_name']); ?>
                    </button>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Modal for input -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Table</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="table_name">Table Name</label>
                            <input type="text" class="form-control" id="table_name" name="table_name" required>
                        </div>
                        <div class="form-group">
                            <label for="display_name">Display Name</label>
                            <input type="text" class="form-control" id="display_name" name="display_name" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal for options -->
    <div class="modal fade" id="optionsModal" tabindex="-1" role="dialog" aria-labelledby="optionsModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="optionsModalLabel">Choose an Option</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <button id="importFileBtn" class="btn btn-warning btn-block">Import File</button>
                    <button id="addColumnBtn" class="btn btn-primary btn-block">Add Column</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal for importing CSV -->
    <div class="modal fade" id="importCsvModal" tabindex="-1" role="dialog" aria-labelledby="importCsvModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="importCsvModalLabel">Import CSV</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="import_csv.php" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="table_name" id="import_table_name">
                        <div class="form-group">
                            <label for="csv_file">Choose CSV File</label>
                            <input type="file" class="form-control" id="csv_file" name="csv_file" accept=".csv"
                                required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Import</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

















<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    let selectedTableName = '';

function openOptionsModal(displayName, tableName) {
    selectedTableName = tableName;
    $('#optionsModal').modal('show');
}

document.getElementById('importFileBtn').addEventListener('click', function () {

});

document.getElementById('addColumnBtn').addEventListener('click', function () {
    const columnName = prompt('Enter the name for the new column:');
    if (columnName) {
        addColumnToTable(columnName, selectedTableName);
    } else {
        alert('Column name cannot be empty!');
    }
});

function addColumnToTable(columnName, tableName) {
    console.log('Attempting to add column:', columnName, 'to table:', tableName);

    if (typeof $ === "undefined") {
        alert('jQuery is not loaded');
        return;
    }

    $.ajax({
        url: '../../process/add_column.php',
        type: 'POST',
        data: {
            column_name: columnName,
            table_name: tableName
        },
        success: function (response) {
            console.log('AJAX response:', response);
            try {

                const data = typeof response === 'string' ? JSON.parse(response) : response;

                if (data.success) {
                    alert('Column added successfully!');
                } else {
                    alert('Error adding column: ' + data.message);
                }
            } catch (e) {
                alert('Response parsing error: ' + e.message);
            }
        },
        error: function (xhr, status, error) {
            alert('AJAX error: ' + error);
        }
    });
}
document.getElementById('importFileBtn').addEventListener('click', function () {
    const fileInput = document.createElement('input');
    fileInput.type = 'file';
    fileInput.accept = '.csv';

    fileInput.addEventListener('change', function (event) {
        const file = event.target.files[0];
        if (file) {
            const formData = new FormData();
            formData.append('csv_file', file);
            formData.append('table_name', selectedTableName);


            $.ajax({
                url: '../../process/import_csv.php',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    console.log('AJAX response:', response);
                    try {
                        const data = typeof response === 'string' ? JSON.parse(response) : response;
                        if (data.success) {
                            alert('File imported successfully!');
                        } else {
                            alert('Error importing file: ' + data.message);
                        }
                    } catch (e) {
                        alert('Response parsing error: ' + e.message);
                    }
                },
                error: function (xhr, status, error) {
                    alert('AJAX error: ' + error);
                }
            });
        }
    });

    fileInput.click();
});

</script>
<?php include 'plugins/js/masterlist_js.php'; ?>
<?php include 'plugins/footer.php'; ?>
