<?php include 'plugins/navbar.php'; ?>
<?php include 'plugins/sidebar/user_bar.php'; ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <ul class="nav nav-tabs" id="excelTabs" role="tablist">
                <li class="nav-item" style="width:200px;">
                    <a class="nav-link active" id="file1-tab" data-toggle="tab" href="#file1" role="tab"
                        aria-controls="file1" aria-selected="true">Plan Total</a>
                </li>
                <li class="nav-item" style="width:200px; margin-bottom 70px;">
                    <a class="nav-link" id="file2-tab" data-toggle="tab" href="#file2" role="tab" aria-controls="file2"
                        aria-selected="false">Plan 3 Months</a>
                </li>



            </ul>
            <div class="tab-content" id="excelTabContent">
                <div class="tab-pane fade show active" id="file1" role="tabpanel" aria-labelledby="file1-tab">
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <button id="importButton1" class="btn btn-primary mt-3"
                                style="background-color: #F0D018; border-color: #F0D018; color: black; margin-right: 20px; width: 100%; max-width: 200px;margin-bottom: 30px;">
                                <i class="fas fa-upload"></i> Import Plan Total
                            </button>

                            <input type="file" id="fileImport1" class="form-control" accept=".xlsx, .xls"
                                style="display: none;" />
                            <button id="exportButton1" class="btn btn-primary mt-3"
                                style="background-color: #525252; border-color: #525252; color: white; margin-right: 20px; width: 100%; max-width: 200px;margin-bottom: 30px;">
                                <i class="fas fa-download"></i>
                                Export</button>
                        </div>
                    </div>
                    <div class="card card-gray-dark card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Plan Total</h3>
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
                                        <!-- Table Headers for File 1 -->
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

                <!-- File 2 Tab Pane -->
                <div class="tab-pane fade" id="file2" role="tabpanel" aria-labelledby="file2-tab">
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <button id="importButton2" class="btn btn-primary mt-3"
                                style="background-color: #F0D018; border-color: #F0D018; color: black; margin-right: 20px; width: 100%; max-width: 200px; margin-bottom: 30px;">
                                <i class="fas fa-upload"></i> Import Plan 3 Months
                            </button>

                            <input type="file" id="fileImport2" class="form-control" accept=".xlsx, .xls"
                                style="display: none;" />
                            <button id="exportButton2" class="btn btn-primary mt-3"
                                style="background-color: #525252; border-color: #525252; color: white; margin-right: 20px; width: 100%; max-width: 200px; margin-bottom: 30px;">
                                <i class="fas fa-download"></i>
                                Export</button>
                        </div>
                    </div>
                    <div class="card card-gray-dark card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Plan 3 Months</h3>
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
                            <div id="accounts_table_res2" class="table-responsive"
                                style="height: 50vh; overflow: auto; margin-top: 20px; border-top: 1px solid white; background-color: white; padding: 15px; border-radius: 10px;">
                                <table id="header_table2"
                                    class="table table-sm table-head-fixed text-nowrap table-hover">
                                    <thead style="text-align: center;" id="table_header">
                                        <!-- Dynamic header will be injected here -->
                                    </thead>

                                    <tbody id="table_body2" style="text-align: center; padding:20px;">

                                    </tbody>
                                </table>
                            </div>
                            <div id="dataCount2" class="data-count"
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
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../../dist/js/xlsx.full.min.js"></script>
<?php include 'plugins/footer.php'; ?>
<?php include 'plugins/js/plan_js.php'; ?>