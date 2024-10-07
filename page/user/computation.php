
<?php include 'plugins/navbar.php'; ?>
<?php include 'plugins/sidebar/user_bar.php'; ?>


<div class="content-wrapper">
    <div id="loadingSpinner"
        style="display: none; background-color: white; padding: 10px; border-radius: 5px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.6);">
        <img src="../../dist/img/6.gif" alt="Loading..." style="width: 50px; height: 50px;">
        <p style="margin-top: 10px;">Please wait. Do not reload the page</p>
    </div>




    <div class="tab-content" id="excelTabContent">
        
        <div class="tab-pane fade show active" id="file1" role="tabpanel" aria-labelledby="file1-tab">
            <div class="card card-gray-dark card-outline">
                <div class="card-header">

                    
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
               
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>


<?php include 'plugins/footer.php'; ?>v