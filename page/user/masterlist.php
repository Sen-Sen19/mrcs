<?php include 'plugins/navbar.php'; ?>
<?php include 'plugins/sidebar/user_bar.php'; ?>
<?php include '../../process/table_operation.php'; ?>



<div class="content-wrapper">
    <div id="loadingSpinner"
        style="display: none; background-color: white; padding: 10px; border-radius: 5px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.6);">
        <img src="../../dist/img/6.gif" alt="Loading..." style="width: 50px; height: 50px;">
        <p style="margin-top: 10px;">Please wait. Do not reload the page</p>
    </div>

    <!-- Navigation for Tabs -->
    <ul class="nav nav-tabs" id="excelTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="file1-tab" data-toggle="tab" href="#file1" role="tab" aria-controls="file1"
                aria-selected="true">Masterlist</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="file2-tab" data-toggle="tab" href="#file2" role="tab" aria-controls="file2"
                aria-selected="false">Update</a>
        </li>
    </ul>

    <div class="tab-content" id="excelTabContent">
        <!-- First Tab Pane -->
        <div class="tab-pane fade show active" id="file1" role="tabpanel" aria-labelledby="file1-tab">
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
                            </tr>
                        </thead>
                        <tbody id="table_body1" style="text-align: center; padding:20px;"></tbody>
                    </table>
                    <div id="loading" class="text-center" style="display: none;">
                        <img src="../../dist/img/6.gif" alt="Loading..." style="width: 50px; height: 50px;">
                        <p>Loading data, please wait...</p>
                    </div>
                </div>
                <div id="dataCount1" class="data-count" style="text-align: left; padding: 10px; font-size: 16px;">Data
                    Count: 0</div>
            </div>
        </div>

        <!-- Second Tab Pane -->
        <div class="tab-pane fade" id="file2" role="tabpanel" aria-labelledby="file2-tab">
            <div class="col-md-2 mt-3">
                <button id="addButton" class="btn btn-success btn-block" data-toggle="modal" data-target="#myModal"
                    style="margin-bottom:20px; margin-top:60px;">
                    <i class="fas fa-plus"></i> &nbsp; Add
                </button>
            </div>
            <div class="card card-gray-dark card-outline">
                <div class="card-header">
                    <h3 class="card-title">Additional Data</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="maximize">
                            <i class="fas fa-expand"></i>
                        </button>
                    </div>
                </div>
                <div id="accounts_table_res2" class="table-responsive"
                    style="height: 50vh; overflow: auto; margin-top: 20px; border-top: 1px solid white; background-color: white; padding: 15px; border-radius: 10px;">
                    <table id="header_table2" class="table table-sm table-head-fixed text-nowrap table-hover">
                        <div class="row" id="existingButtons">
                            <div class="col-md-2 mt-3">
                                <button id="importButton1" class="btn btn-primary"
                                    style="background-color: #F0D018; border-color: #F0D018; color: black; width: 100%; margin-right:5px;">
                                    <i class="fas fa-upload"></i> First Process
                                </button>
                                <input type="file" id="fileImport1" class="form-control" accept=".csv"
                                    style="display: none;" />
                            </div>
                            <div class="col-md-2 mt-3">
                                <button id="importButton2" class="btn btn-primary"
                                    style="background-color: #F0D018; border-color: #F0D018; color: black; width: 250px; margin-right:5px;">
                                    <i class="fas fa-upload"></i> Unique Process
                                </button>
                                <input type="file" id="fileImport2" class="form-control" accept=".csv"
                                    style="display: none;" />
                            </div>
                            <div class="col-md-2 mt-3">
                                <button id="importButton3" class="btn btn-primary"
                                    style="background-color: #F0D018; border-color: #F0D018; color: black; width: 300px; margin-right: 10px;">
                                    <i class="fas fa-upload"></i> Non-Machine Process
                                </button>
                                <input type="file" id="fileImport3" class="form-control" accept=".csv"
                                    style="display: none;" />
                            </div>
                            <div class="col-md-2 mt-3">
                                <button id="importButton4" class="btn btn-primary"
                                    style="background-color: #F0D018; border-color: #F0D018; color: black; width: 300px;">
                                    <i class="fas fa-upload"></i> Secondary Process
                                </button>
                                <input type="file" id="fileImport4" class="form-control" accept=".csv"
                                    style="display: none;" />
                            </div>
                            <div class="col-md-2 mt-3">
                                <button id="importButton5" class="btn btn-primary"
                                    style="background-color: #F0D018; border-color: #F0D018; color: black; width: 300px; margin-right: 10px;">
                                    <i class="fas fa-upload"></i> Other Process
                                </button>
                                <input type="file" id="fileImport5" class="form-control" accept=".csv"
                                    style="display: none;" />
                            </div>
                            <div class="col-md-2 mt-3">
                                <button id="importButton6" class="btn btn-primary"
                                    style="background-color: #F0D018; border-color: #F0D018; color: black; width: 300px;">
                                    <i class="fas fa-upload"></i> Update
                                </button>
                                <input type="file" id="fileImport6" class="form-control" accept=".csv"
                                    style="display: none;" />
                            </div>
                        </div>
                        <tbody id="table_body2" style="text-align: center; padding:20px;"></tbody>
                    </table>
                    <div id="loading2" class="text-center" style="display: none;">
                        <img src="../../dist/img/6.gif" alt="Loading..." style="width: 50px; height: 50px;">
                        <p>Loading data, please wait...</p>
                    </div>
                    <div class="row" id="existingButtons">
                        <?php foreach ($tables as $table): ?>
                            <div class="col-md-2 mt-3">
                                <button class="btn btn-warning btn-block"
                                    onclick="openOptionsModal('<?php echo htmlspecialchars($table['display_name']); ?>', '<?php echo htmlspecialchars($table['table_name']); ?>')">
                                    <?php echo htmlspecialchars($table['display_name']); ?>
                                </button>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal for input -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <input type="file" class="form-control" id="csv_file" name="csv_file" accept=".csv" required>
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