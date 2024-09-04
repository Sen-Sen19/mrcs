<?php include 'plugins/navbar.php'; ?>
<?php include 'plugins/sidebar/user_bar.php'; ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="col-sm-12">
            <div class="card card-gray-dark card-outline">
                <div class="card-header">
                    <h3 class="card-title">

                    </h3>
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
                    <div class="row mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6 col-sm-2 ">
                                    <label
                                        style="font-weight: normal; margin-bottom:6%; padding: 0; color: #000; font-weight: bold;">Date
                                        From</label>
                                    <input type="date" name="date_from" class="form-control form-control-sm"
                                        id="date_from">
                                </div>
                                <div class="col-6 col-sm-2 ">
                                    <label
                                        style="font-weight: normal;margin-bottom:6%; padding: 0; color: #000; font-weight: bold;">Date
                                        To</label>
                                    <input type="date" name="date_to" class="form-control form-control-sm" id="date_to">
                                </div>


                                <div class="col-6 col-sm-2 ">
                                    <label
                                        style="font-weight: normal; margin-bottom:6%; padding: 0; color: #000; font-weight: bold;">Schedule
                                        Type</label>
                                    <select id="shift_select" class="form-control" name="shift"
                                        style="height: 31px; font-size: 14px;">
                                        <option value="" selected disabled>Choose...</option>
                                        <option value="daily">Daily</option>
                                        <option value="weekly">Weekly</option>
                                        <option value="monthly">Monthly</option>
                                    </select>


                                </div>




                                <div class="col-6 col-sm-3 ">

                                    <label
                                        style="font-weight: normal;margin-bottom:4%; padding: 0; color: #000; font-weight: bold; visibility:hidden">Search</label>
                                    <button class="btn btn-primary btn-block btn-sm" id="searchBtn">
                                        <i class="fas fa-search"></i> Search
                                    </button>
                                </div>

                                <div class="col-6 col-sm-3 ">
                                    <label
                                        style="font-weight: normal; margin-bottom:4%; padding: 0; color:  #000; font-weight: bold; visibility:hidden ">Export</label>
                                    <button class="btn btn-primary btn-block btn-sm" id="exportBtn"
                                        onclick="exportCSV()" style="background-color:#525252 ;border-color: #525252;">
                                        <i class="fas fa-file-download"></i> Export
                                    </button>
                                </div>



                            </div>
                        </div>
                    </div>
                </div>
    </section>
</div>

<?php include 'plugins/footer.php'; ?>