<?php include 'plugins/navbar.php'; ?>
<?php include 'plugins/sidebar/user_bar.php'; ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="tab-content" id="excelTabContent">
                <div class="tab-pane fade show active" id="file3" role="tabpanel" aria-labelledby="file3-tab">
                    <div class="row mb-2">

                        <div class="col-12 col-sm-2">
                            <label style="font-weight:normal;margin:0;padding:0;color:#000;">Date From</label>
                            <input type="date" name="date_from" class="form-control" id="date_from_search_defect"
                                style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #888;background: #FFF;height:34px;">
                        </div>
                        <div class="col-12 col-sm-2">
                            <label style="font-weight:normal;margin:0;padding:0;color:#000;">Date To</label>
                            <input type="date" name="date_to" class="form-control" id="date_to_search_defect"
                                style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #888;background: #FFF;height:34px;">
                        </div>
                        <div class="col-12 col-sm-2">
                            <button id="searchButton" class="btn btn-primary btn-sm btn-block"
                                style="background-color: #007bff; border-color: #007bff; color: white; padding: 5px 10px; margin-top: 9%; margin-bottom: 20px;">
                                <i class="fas fa-search"></i> Search
                            </button>
                        </div>
                        <div class="col-12 col-sm-2">
                            <button id="importButton3" class="btn btn-warning btn-sm btn-block"
                                style="background-color: #F0D018; border-color: #F0D018; color: black; padding: 5px 10px; margin-top: 9%;">
                                <i class="fas fa-upload"></i> Import
                            </button>
                            <input type="file" id="fileImport3" class="form-control" accept=".xlsx, .xls"
                                style="display: none;" />
                        </div>
                        <div class="col-12 col-sm-2">
                            <button id="exportPlan" class="btn btn-success btn-sm btn-block"
                                style="background-color: #7a7a79; border-color:#7a7a79; color: white; padding: 5px 10px;  margin-top: 9%;">
                                <i class="fas fa-download"></i> Export
                            </button>
                        </div>
                        <div class="col-12 col-sm-2">
                            <button id="emptyPlan" class="btn btn-success btn-sm btn-block"
                                style="background-color: #dd1100; border-color: #dd1100; color: white; padding: 5px 10px;  margin-top: 9%;">
                                <i class="fas fa-trash"></i> Empty Plan
                            </button>
                        </div>
                    </div>
                    <div class="card card-gray-dark card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Plan From PC</h3>
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
                            style="height: 50vh; overflow: auto; margin-top: 20px; border-top: 1px solid white; background-color: white; border-radius: 10px;">
                            <table id="header_table3" class="table table-sm table-head-fixed text-nowrap table-hover">
                                <thead style="text-align: center;">
                                
                                </thead>
                                <tbody id="table_body3" style="text-align: center; padding:20px;">
                        
                                </tbody>
                            </table>
                        </div>
                        <div class="card-body">
                            <div id="loading" style="display: none; text-align: center; margin-bottom: 20px;">
                                <img src="../../dist/img/6.gif" alt="Loading..." style="max-width: 100px;">
                                <p style="margin-top: 10px;">Importing to the database. Please do not reload the page.
                                </p>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="loading2" style="display: none; text-align: center; margin-bottom: 20px;">
                                <img src="../../dist/img/6.gif" alt="Loading..." style="max-width: 100px;">
                                <p style="margin-top: 10px;">Loading. Please wait.
                                </p>
                            </div>
                        </div>

                        <div class="row align-items-center" style="padding: 10px;">
                           
                            <div class="col-12 d-flex justify-content-end">

                           <div class="col-12 col-sm-2">
    <button id="saveButton" class="btn btn-primary btn-sm btn-block"
        style="background-color:#009425; border-color:#009425; color: white; padding: 5px 10px; margin-top: 4%;">
        <i class="fas fa-save"></i> Save
    </button>
</div>

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
<script>


</script>

<?php include 'plugins/footer.php'; ?>
<?php include 'plugins/js/plan_js.php'; ?>c