<?php include 'plugins/navbar.php'; ?>
<?php include 'plugins/sidebar/admin_bar.php'; ?>

<div class="content-wrapper">

    <div class="row">
        <div class="col-sm-2">
            <input type="text" id="searchBaseProduct" class="form-control" placeholder="Base Product"
                style="height: 35px; font-size: 14px; margin-top: 50px;" />
        </div>
        <div class="col-sm-2">
            <select id="carModelSelect" class="form-control" style="height: 35px; font-size: 14px; margin-top: 50px;">
                <option value="" disabled selected>Car Model</option>
                <option value="Subaru">Subaru</option>
                <option value="Toyota">Toyota</option>
                <option value="Mazda Merge">Mazda Merge</option>
                <option value="Suzuki Old">Suzuki Old</option>
                <option value="Honda TKRA">Honda TKRA</option>
                <option value="Mazda J12">Mazda J12</option>
                <option value="Honda T20">Honda T20</option>
                <option value="Honda Old">Honda Old</option>
                <option value="Daihatsu D01L">Daihatsu D01L</option>
            </select>
        </div>
        <div class="col-sm-2">
            <button type="button" id="searchButton" class="btn btn-primary w-100"
                style="height: 35px; font-size: 14px; margin-top: 50px;">
                <i class="fas fa-search mr-2"></i>Search
            </button>
        </div>

        <div class="col-md-2 mt-3">
            <button id="importButton3" class="btn btn-primary"
                style="background-color: #F0D018; border-color: #F0D018; color: black; width: 100%; margin-top: 33px;">
                <i class="fas fa-upload"></i> Import
            </button>
            <input type="file" id="fileImport3" class="form-control" accept=".csv" style="display: none;" />
        </div>
        <div class="col-md-2 mt-3">
            <button id="exportbtn" class="btn btn-primary"
                style="background-color: #525252; border-color: #525252; color: white; width: 100%; margin-top: 33px;">
                <i class="fas fa-download"></i> Export
            </button>
            <input type="file" id="deletebtn" class="form-control" accept=".csv" style="display: none;" />
        </div>
    </div>

    <div class="card card-gray-dark card-outline" style="margin-top: 50px;">
        <div class="card-header">
            <h3 class="card-title">Non Machine Process</h3>
            <div class="card-tools"></div>
        </div>
        <div id="accounts_table_res1" class="table-responsive"
            style="height: 50vh; overflow: auto; margin-top: 20px; border-top: 1px solid white; background-color: white; border-radius: 10px;">
            <table id="header_table1" class="table table-sm table-head-fixed text-nowrap table-hover">
                <thead style="text-align: center;">
                    <tr>
                       <th>BASE PRODUCT</th>
                        <th>CAR MODEL</th>
                        <th>PRODUCT</th>
                        <th>CAR CODE</th>
                        <th>BLOCK</th>
                        <th>CLASS</th>
                        <th>LINE NO</th>
                        <th>CIRCUIT QTY</th>
                        <th>AIRBAG HOUSING</th>
                        <th>CAP INSERTION</th>
                        <th>SHIELDWIRE TAPING</th>
                        <th>GOMUSEN INSERTION</th>
                        <th>POINT MARKING</th>
                        <th>LOOPING</th>
                        <th>SHIKAKARI HANDLER</th>
                        <th>BLACK TAPING</th>
                        <th>COMPONENTS INSERTION</th>
                    </tr>
                </thead>
                <tbody id="table_body1" style="text-align: center; padding: 20px;"></tbody>
            </table>
             <div id="loadingSpinner"
     style="display: none; background-color: white; padding: 10px; border-radius: 5px; 
            position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%);">
    <img src="../../dist/img/6.gif" alt="Loading..." style="width: 50px; height: 50px;">
   
</div>
        </div>
        <div id="dataCount1" class="data-count" style="text-align: left; padding: 10px; font-size: 16px;">Data Count: 0
        </div>
    </div>
</div>

<script>
    document.getElementById("exportbtn").addEventListener("click", function () {
        window.location.href = "../../process/export_non_machine_process.php";
    });

    document.getElementById("carModelSelect").addEventListener("change", function () {
        fetchData(this.value);
    });

    function fetchData(selectedCarModel = '') {
        const loadingSpinner = document.getElementById('loadingSpinner');
        loadingSpinner.style.display = 'block';

        fetch('../../process/fetch_non_machine_process.php')
            .then(response => response.json())
            .then(data => {
                const dataBody = document.getElementById('table_body1');
                dataBody.innerHTML = '';


                const filteredData = selectedCarModel
                    ? data.filter(row => row.car_model === selectedCarModel)
                    : data;

                filteredData.forEach(row => {
                    const tr = document.createElement('tr');
                    tr.innerHTML = `
                        <td>${row.base_product}</td>
                        <td>${row.car_model}</td>
                        <td>${row.product}</td> 
                        <td>${row.car_code}</td>
                        <td>${row.block}</td>
                        <td>${row.class}</td>
                        <td>${row.line_no}</td>
                        <td>${row.circuit_qty}</td>
                    <td>${row.airbag_housing}</td>
                    <td>${row.cap_insertion}</td>
                    <td>${row.shieldwire_taping}</td>
                    <td>${row.gomusen_insertion}</td>
                    <td>${row.point_marking}</td>
                    <td>${row.looping}</td>
                    <td>${row.shikakari_handler}</td>
                    <td>${row.black_taping}</td>
                    <td>${row.components_insertion}</td>
                    
                    `;
                    dataBody.appendChild(tr);
                });

                document.getElementById('dataCount1').textContent = 'Data Count: ' + filteredData.length;

                loadingSpinner.style.display = 'none'; 
            })
            .catch(error => {
                console.error('Error fetching data:', error);
                loadingSpinner.style.display = 'none'; 
            });
    }


    fetchData();
</script>

<?php include 'plugins/js/js_non_machine_process.php'; ?>
<?php include 'plugins/footer.php'; ?>