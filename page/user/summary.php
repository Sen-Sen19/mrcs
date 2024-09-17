<?php include 'plugins/navbar.php'; ?>
<?php include 'plugins/sidebar/user_bar.php'; ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">

            <div class="tab-content" id="excelTabContent">
                <div class="tab-pane fade show active" id="file1" role="tabpanel" aria-labelledby="file1-tab">
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <button id="importButton1" class="btn btn-primary mt-3"
                                style="background-color: #F0D018; border-color: #F0D018; color: black; margin-right: 20px; width: 100%; max-width: 200px; margin-bottom: 30px; margin-top: 50px !important;">
                                <i class="fas fa-upload"></i> Import Plan Total
                            </button>


                            <input type="file" id="fileImport1" class="form-control" accept=".xlsx, .xls"
                                style="display: none;" />
                            <button id="exportButton1" class="btn btn-primary mt-3"
                                style="background-color: #525252; border-color: #525252; color: white; margin-right: 20px; width: 100%; max-width: 200px;margin-bottom: 30px;margin-top: 50px !important;">
                                <i class="fas fa-download"></i>
                                Export</button>
                        </div>
                    </div>
                    <div class="card card-gray-dark card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Shot Count</h3>
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
                                    <thead style="text-align: center;">
                                        <div class="row" style="margin-bottom: 20px;">

                                            <div class="col-sm-2">
                                                <input type="text" class="form-control" placeholder="Product No."
                                                    style="height: 31px; font-size: 14px;" />
                                            </div>

                                            <div class="col-sm-2">
                                                <input type="text" class="form-control" placeholder="Car Model"
                                                    style="height: 31px; font-size: 14px;" />
                                            </div>

                                            <div class="col-sm-2">
                                                <input type="text" class="form-control" placeholder="Line No."
                                                    style="height: 31px; font-size: 14px;" />
                                            </div>
                                            <div class="col-sm-3">
                                                <button type="button" class="btn btn-primary w-100"
                                                    style="height: 31px; font-size: 14px;"> <i
                                                        class="fas fa-search mr-2"></i>Search</button>
                                            </div>
                                            <div class="col-sm-3">
                                                <button type="button" class="btn btn-danger w-100"
                                                    style="height: 31px; font-size: 14px;"> <i
                                                        class="fas fa-trash mr-2"></i>Delete</button>
                                            </div>
                                        </div>
                                        <tr>
                                            <!-- <th>ID</th>
                                    <th>Product Number</th>
                                    <th>Car Maker</th>
                                    <th>Line No</th>
                                    <th>Initial Secondary Process</th>
                                    <th>Final Process</th>
                                    <th>Poly Size</th> -->
                                        </tr>
                                    </thead>
                                    <tbody id="table_body1" style="text-align: center; padding:20px;">
                                        <!-- Table Body for File 1 -->
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
    fetch('../../process/view_data.php')
        .then(response => response.json())
        .then(data => {
            const tbody = document.getElementById('header_table1');
            tbody.innerHTML = '';
            data.forEach(row => {
                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td>${row.ID}</td>
                    <td>${row.Product_No}</td>
                    <td>${row.Car_Maker}</td>
                    <td>${row.Line_No}</td>
                    <td>${row.Initial_Secondary_Process}</td>
                    <td>${row.Final_Process}</td>
                    <td>${row.Poly_Size}</td>
                `;
                tbody.appendChild(tr);
            });
            document.getElementById('dataCount2').textContent = `Data Count: ${data.length}`;
        })
        .catch(error => console.error('Error fetching data:', error));
    document.getElementById('importButton2').addEventListener('click', () => {
        document.getElementById('fileImport2').click();
    });
</script>

<?php include 'plugins/footer.php'; ?>