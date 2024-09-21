
<?php include 'plugins/navbar.php'; ?>
<?php include 'plugins/sidebar/user_bar.php'; ?>


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
                    <div class="row mb-2 justify-content-center">
                        <div class="col-sm-12 text-center">
                            <!-- First Process Button -->
                            <button id="importButton1" class="btn btn-primary mt-3"
                                style="background-color: #F0D018; border-color: #F0D018; color: black; margin: 10px; width: 200px;">
                                <i class="fas fa-upload"></i> First Process
                            </button>
                            <input type="file" id="fileImport1" class="form-control" accept=".csv"
                                style="display: none;" />

                            <!-- Unique Process Button -->
                            <button id="importButton2" class="btn btn-primary mt-3"
                                style="background-color: #F0D018; border-color: #F0D018; color: black; margin: 10px; width: 200px;">
                                <i class="fas fa-upload"></i> Unique Process
                            </button>
                            <input type="file" id="fileImport2" class="form-control" accept=".csv"
                                style="display: none;" />

                            <!-- Non-Machine Process Button -->
                            <button id="importButton3" class="btn btn-primary mt-3"
                                style="background-color: #F0D018; border-color: #F0D018; color: black; margin: 10px; width: 200px;">
                                <i class="fas fa-upload"></i> Non-Machine Process
                            </button>
                            <input type="file" id="fileImport3" class="form-control" accept=".csv"
                                style="display: none;" />

                            <!-- Secondary Process Button -->
                            <button id="importButton4" class="btn btn-primary mt-3"
                                style="background-color: #F0D018; border-color: #F0D018; color: black; margin: 10px; width: 200px;">
                                <i class="fas fa-upload"></i> Secondary Process
                            </button>
                            <input type="file" id="fileImport4" class="form-control" accept=".csv"
                                style="display: none;" />

                            <!-- Other Process Button -->
                            <button id="importButton5" class="btn btn-primary mt-3"
                                style="background-color: #F0D018; border-color: #F0D018; color: black; margin: 10px; width: 200px;">
                                <i class="fas fa-upload"></i> Other Process
                            </button>
                            <input type="file" id="fileImport5" class="form-control" accept=".csv"
                                style="display: none;" />

                            <!-- Update Button -->
                            <button id="importButton6" class="btn btn-primary mt-3"
                                style="background-color: #F0D018; border-color: #F0D018; color: black; margin: 10px; width: 200px;">
                                <i class="fas fa-upload"></i> Update
                            </button>
                            <input type="file" id="fileImport6" class="form-control" accept=".csv"
                                style="display: none;" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="row">
        <div class="col-sm-2">
    <input type="text" id="searchBaseProduct" class="form-control" placeholder="Base Product" style="height: 35px; font-size: 14px; margin-top: 50px;" />
</div>
<div class="col-sm-2">
    <button type="button" id="searchButton" class="btn btn-primary w-100" style="height: 35px; font-size: 14px; margin-top: 50px;">
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


<?php include 'plugins/footer.php'; ?>v