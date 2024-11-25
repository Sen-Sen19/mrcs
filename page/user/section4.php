<?php include 'plugins/navbar.php'; ?>
<?php include 'plugins/sidebar/user_bar.php'; ?>

<div class="content-wrapper">

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div id="loadingSpinner"
                    style="display: none; background-color: white; padding: 10px; border-radius: 5px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.6);">
                    <img src="../../dist/img/6.gif" alt="Loading..." style="width: 50px; height: 50px;">
                    <p style="margin-top: 10px;">Please wait. Do not reload the page</p>
                </div>

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="first_month-tab" data-toggle="tab" href="#first_month" role="tab"
                            aria-controls="first_month" aria-selected="true">First Month</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="second_month-tab" data-toggle="tab" href="#second_month" role="tab"
                            aria-controls="second_month" aria-selected="false">Second Month</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="third_month-tab" data-toggle="tab" href="#third_month" role="tab"
                            aria-controls="third_month" aria-selected="false">Third Month</a>
                    </li>
                </ul>

                <div class="tab-content" id="excelTabContent">

                    <div class="col-sm-12">
                        <button id="updateBtn" class="btn btn-primary mt-3"
                            style="background-color: #155efe; border-color:#155efe; color: white; margin-right: 20px; width: 100%; max-width: 200px;margin-bottom: 10px;">
                            <i class="fas fa-wrench"></i> Update
                        </button>

                        <button id="importBtn" class="btn btn-primary mt-3"
                            style="background-color:#7a7a79; border-color: #7a7a79; color: white; margin-right: 20px; width: 100%; max-width: 200px;margin-bottom: 10px;">
                            <i class="fas fa-upload"></i> Export
                        </button>
                    </div>


                    <div class="tab-pane fade show active" id="first_month" role="tabpanel"
                        aria-labelledby="first_month-tab">

                        <div class="card card-gray-dark card-outline">

                            <div id="first_month_table" class="table-responsive"
                                style="height: 70vh; overflow: auto; margin-top: 20px; border-top: 1px solid white; background-color: white; border-radius: 10px;">
                                <table id="first_month_table_header"
                                    class="table table-sm table-head-fixed text-nowrap table-hover"
                                    style="font-size: 14px;">
                                    <thead style="text-align: left;">
                                        <tr>
                                            <th>Car Model</th>
                                            <th>Process</th>
                                            <th>Total Shots</th>
                                            <th>Machine Inventory</th>
                                            <th>Machine Requirements</th>
                                            <th>JPH</th>
                                            <th>WT</th>
                                            <th>OT</th>
                                            <th>MP Shift</th>
                                        </tr>
                                    </thead>
                                    <tbody id="first_month_table_body" style="text-align: left;">
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>

                    <div class="tab-pane fade" id="second_month" role="tabpanel" aria-labelledby="second_month-tab">
                        <div class="card card-gray-dark card-outline">
                            <div id="second_month_table" class="table-responsive"
                                style="height: 70vh; overflow: auto; margin-top: 20px; border-top: 1px solid white; background-color: white; border-radius: 10px;">
                                <table id="first_month_table_header"
                                    class="table table-sm table-head-fixed text-nowrap table-hover"
                                    style="font-size: 14px;">
                                    <thead style="text-align: left;">
                                        <tr>
                                            <th>Car Model</th>
                                            <th>Process</th>
                                            <th>Total Shots</th>
                                            <th>Machine Inventory</th>
                                            <th>Machine Requirements</th>
                                            <th>JPH</th>
                                            <th>WT</th>
                                            <th>OT</th>
                                            <th>MP Shift</th>
                                        </tr>
                                    </thead>
                                    <tbody id="second_month_table_body" style="text-align: left;">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="third_month" role="tabpanel" aria-labelledby="third_month-tab">
                        <div class="card card-gray-dark card-outline">
                            <div id="third_month_table" class="table-responsive"
                                style="height: 70vh; overflow: auto; margin-top: 20px; border-top: 1px solid white; background-color: white; border-radius: 10px;">
                                <table id="third_month_table_header"
                                    class="table table-sm table-head-fixed text-nowrap table-hover"
                                    style="font-size: 14px;">
                                    <thead style="text-align: left;">
                                        <tr>
                                            <th>Car Model</th>
                                            <th>Process</th>
                                            <th>Total Shots</th>
                                            <th>Machine Inventory</th>
                                            <th>Machine Requirements</th>
                                            <th>JPH</th>
                                            <th>WT</th>
                                            <th>OT</th>
                                            <th>MP Shift</th>
                                        </tr>
                                    </thead>

                                    <tbody id="third_month_table_body" style="text-align: left;">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--------------------------------------------first Month-------------------------------------------------- -->

<div class="modal fade" id="editModalFirstMonth" tabindex="-1" role="dialog" aria-labelledby="editModalFirstMonthLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">First Month</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editFormFirstMonth">
                    <div class="form-group">
                        <label for="car_model">Car Model</label>
                        <input type="text" class="form-control" id="car_model" name="car_model" required readonly>
                    </div>
                    <div class="form-group">
                        <label for="process">Process</label>
                        <input type="text" class="form-control" id="process" name="process" required readonly>
                    </div>
                    <div class="form-group">
                        <label for="machine_inventory">Machine Inventory</label>
                        <input type="number" class="form-control" id="machine_inventory" name="machine_inventory"
                            required readonly>
                    </div>
                    <div class="form-group">
                        <label for="jph">JPH</label>
                        <input type="number" class="form-control" id="jph" name="jph" required>
                    </div>
                  
                    <div class="form-group">
                        <label for="wt">WT</label>
                        <select class="form-control" id="wt" name="wt" required>
                            <option value="7.5">7.5</option>
                            <option value="15">15</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="ot">OT</label>
                        <select class="form-control" id="ot" name="ot" required>
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                        </div>
                    <input type="hidden" id="row_index" name="row_index">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="closeBtn">Close</button>
                <button type="button" class="btn btn-primary" id="saveChanges1">Save changes</button>
            </div>
        </div>
    </div>
</div>





<!--------------------------------------------Second Month-------------------------------------------------- -->

<div class="modal fade" id="editModalSecondMonth" tabindex="-1" role="dialog"
    aria-labelledby="editModalSecondMonthLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Second Month</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editForm">
                    <div class="form-group">
                        <label for="car_model">Car Model</label>
                        <input type="text" class="form-control" id="car_model2" name="car_model" required readonly>
                    </div>
                    <div class="form-group">
                        <label for="process">Process</label>
                        <input type="text" class="form-control" id="process2" name="process" required readonly>
                    </div>
                    <div class="form-group">
                        <label for="machine_inventory">Machine Inventory</label>
                        <input type="num" class="form-control" id="machine_inventory2" name="machine_inventory" required
                            readonly>
                    </div>
                    <div class="form-group">
                        <label for="jph">JPH</label>
                        <input type="num" class="form-control" id="jph2" name="jph" required>
                    </div>

                    <div class="form-group">
                        <label for="wt">WT</label>
                        <select class="form-control" id="wt2" name="wt" required>
                            <option value="7.5">7.5</option>
                            <option value="15">15</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="ot">OT</label>
                        <select class="form-control" id="ot2" name="ot" required>
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>


                    <input type="hidden" id="row_index" name="row_index">
                </form>
            </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveChanges2">Save changes</button>
            </div>
        </div>
    </div>
</div>


<!--------------------------------------------Third Month-------------------------------------------------- -->

<div class="modal fade" id="editModalThirdMonth" tabindex="-1" role="dialog" aria-labelledby="editModalThirdMonthLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Third Month</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editForm">
                    <div class="form-group">
                        <label for="car_model">Car Model</label>
                        <input type="text" class="form-control" id="car_model3" name="car_model" required readonly>
                    </div>
                    <div class="form-group">
                        <label for="process">Process</label>
                        <input type="text" class="form-control" id="process3" name="process" required readonly>
                    </div>
                    <div class="form-group">
                        <label for="machine_inventory">Machine Inventory</label>
                        <input type="num" class="form-control" id="machine_inventory3" name="machine_inventory" required
                            readonly>
                    </div>
                    <div class="form-group">
                        <label for="jph">JPH</label>
                        <input type="num" class="form-control" id="jph3" name="jph" required>
                    </div>
                    <div class="form-group">
                        <label for="wt">WT</label>
                        <select class="form-control" id="wt3" name="wt" required>
                            <option value="7.5">7.5</option>
                            <option value="15">15</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="ot">OT</label>
                        <select class="form-control" id="ot3" name="ot" required>
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>
                    
                    <input type="hidden" id="row_index" name="row_index">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveChanges3">Save changes</button>
            </div>
        </div>
    </div>
</div>




<script>
    $(document).ready(function () {

        var fullName = $('#full_name').val();


        $.ajax({
            url: '../../process/fetch_total_shots_section_4.php',
            method: 'GET',
            data: { full_name: fullName },
            success: function (data) {
                var tbody = $('#table_body1');
                tbody.empty();

                $.each(data, function (index, item) {
                    var row = '<tr>' +
                        '<td>' + item.car_model + '</td>' +
                        '<td>' + item.process + '</td>' +
                        '<td>' + item.first_total_shots + '</td>' +
                        '<td>' + item.second_total_shots + '</td>' +
                        '<td>' + item.third_total_shots + '</td>' +
                        '</tr>';
                    tbody.append(row);
                });
            },
            error: function (xhr, status, error) {
                console.error('Error fetching data:', error);
                $('#loading').show();
            }
        });
    });





    // --------------------------------------------First Month --------------------------------------------------------

    document.addEventListener('DOMContentLoaded', function () {
        const fullName = document.getElementById('full_name').value;
        console.log('Full Name:', fullName);
        fetch(`../../process/fetch_section_4.php?full_name=${encodeURIComponent(fullName)}`)
            .then(response => response.json())
            .then(data => {
                const tableBody = document.getElementById('first_month_table_body');
                const uniqueEntries = new Set();

                data.forEach(row => {

                    const uniqueKey = `${row.car_model}-${row.process}`;


                    if (!uniqueEntries.has(uniqueKey)) {
                        uniqueEntries.add(uniqueKey); 

                        const tr = document.createElement('tr');

                        const carModelTd = document.createElement('td');
                        carModelTd.textContent = row.car_model;
                        tr.appendChild(carModelTd);

                        const processTd = document.createElement('td');
                        processTd.textContent = row.process_name;
                        tr.appendChild(processTd);

                        const totalShotsTd = document.createElement('td');
                        totalShotsTd.textContent = row.first_total_shots;
                        totalShotsTd.style.color = 'blue';
                        tr.appendChild(totalShotsTd);

                        const machineInventoryTd = document.createElement('td');
                        machineInventoryTd.textContent = row.machine_inventory;
                        tr.appendChild(machineInventoryTd);

                        const machineTd = document.createElement('td');
                        machineTd.textContent = row.machine_requirements1;
                        machineTd.style.color = 'red';
                        tr.appendChild(machineTd);

                        const jphTd = document.createElement('td');
                        jphTd.textContent = row.jph1;
                        tr.appendChild(jphTd);

                        const wtTd = document.createElement('td');
                        wtTd.textContent = row.wt1;
                        tr.appendChild(wtTd);

                        const otTd = document.createElement('td');
                        otTd.textContent = row.ot1;
                        tr.appendChild(otTd);

                        const mpTd = document.createElement('td');
                        mpTd.textContent = row.mp1;
                        tr.appendChild(mpTd);

                        tr.addEventListener('click', function () {
                            document.getElementById('car_model').value = row.car_model;
                            document.getElementById('process').value = row.process;
                            document.getElementById('machine_inventory').value = row.machine_inventory;
                            document.getElementById('jph').value = row.jph1;
                            document.getElementById('wt').value = row.wt1;
                            document.getElementById('ot').value = row.ot1;

                            document.getElementById('row_index').value = row.id;

                            $('#editModalFirstMonth').modal('show');
                        });

                        tableBody.appendChild(tr);
                    }
                });
            })
            .catch(error => {
                console.error('Error fetching data:', error);
                Swal.fire({
                    title: 'Error!',
                    text: 'Error fetching data from server.',
                    icon: 'error',
                    showConfirmButton: false,
                    timer: 1500,
                });
            });

        document.getElementById('saveChanges1').addEventListener('click', function () {
            const id = document.getElementById('row_index').value;
            const fullName = document.getElementById('full_name').value;
            const updatedData = {
                car_model: document.getElementById('car_model').value,
                process: document.getElementById('process').value,
                machine_inventory: document.getElementById('machine_inventory').value,
                jph: document.getElementById('jph').value,
                wt: document.getElementById('wt').value,
                ot: document.getElementById('ot').value,
            };

            console.log('ID:', id);
            console.log('Updated Data:', updatedData);

            fetch('../../process/edit_section_4_first_month.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ index: id, updatedData: updatedData, fullName: fullName }),

            })
                .then(response => response.json())
                .then(result => {
                    console.log('Response from server:', result);
                    if (result.success) {
                        Swal.fire({
                            title: 'Success!',
                            text: 'Update successful!',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1500,
                        }).then(() => {
                            location.reload();
                        });
                    } else {
                        Swal.fire({
                            title: 'Error!',
                            text: 'Error updating row: ' + result.message,
                            icon: 'error',
                            showConfirmButton: false,
                            timer: 1500,
                        });
                    }
                })
                .catch(error => {
                    console.error('Error updating data:', error);
                    Swal.fire({
                        title: 'Error!',
                        text: 'An error occurred while updating data.',
                        icon: 'error',
                        showConfirmButton: false,
                        timer: 1500,
                    });
                });
        });
    });



    // --------------------------------------------Second Month --------------------------------------------------------
    document.addEventListener('DOMContentLoaded', function () {
        const fullName = document.getElementById('full_name').value;
        console.log('Full Name:', fullName);
        fetch(`../../process/fetch_section_4.php?full_name=${encodeURIComponent(fullName)}`)
            .then(response => response.json())
            .then(data => {
                const tableBody = document.getElementById('second_month_table_body');
                const uniqueEntries = new Set();

                data.forEach(row => {

                    const uniqueKey = `${row.car_model}-${row.process}`;

      
                    if (!uniqueEntries.has(uniqueKey)) {
                        uniqueEntries.add(uniqueKey);

                        const tr = document.createElement('tr');

                        const carModelTd = document.createElement('td');
                        carModelTd.textContent = row.car_model;
                        tr.appendChild(carModelTd);

                        const processTd = document.createElement('td');
                        processTd.textContent = row.process_name;
                        tr.appendChild(processTd);

                        const totalShotsTd = document.createElement('td');
                        totalShotsTd.textContent = row.second_total_shots;
                        totalShotsTd.style.color = 'blue';
                        tr.appendChild(totalShotsTd);

                        const machineInventoryTd = document.createElement('td');
                        machineInventoryTd.textContent = row.machine_inventory;
                        tr.appendChild(machineInventoryTd);

                        const machineTd = document.createElement('td');
                        machineTd.textContent = row.machine_requirements2;
                        machineTd.style.color = 'red';
                        tr.appendChild(machineTd);

                        const jphTd = document.createElement('td');
                        jphTd.textContent = row.jph2;
                        tr.appendChild(jphTd);

                        const wtTd = document.createElement('td');
                        wtTd.textContent = row.wt2;
                        tr.appendChild(wtTd);

                        const otTd = document.createElement('td');
                        otTd.textContent = row.ot2;
                        tr.appendChild(otTd);

                        const mpTd = document.createElement('td');
                        mpTd.textContent = row.mp2;
                        tr.appendChild(mpTd);

                        tr.addEventListener('click', function () {
                            document.getElementById('car_model2').value = row.car_model;
                            document.getElementById('process2').value = row.process;
                            document.getElementById('machine_inventory2').value = row.machine_inventory;
                            document.getElementById('jph2').value = row.jph2;
                            document.getElementById('wt2').value = row.wt2;
                            document.getElementById('ot2').value = row.ot2;
                            document.getElementById('row_index').value = row.id;

                            $('#editModalSecondMonth').modal('show');
                        });

                        tableBody.appendChild(tr);
                    }
                });
            })
            .catch(error => {
                console.error('Error fetching data:', error);
                Swal.fire({
                    title: 'Error!',
                    text: 'Error fetching data from server.',
                    icon: 'error',
                    showConfirmButton: false,
                    timer: 1500,
                });
            });

        document.getElementById('saveChanges2').addEventListener('click', function () {
            const id = document.getElementById('row_index').value;
            const fullName = document.getElementById('full_name').value;
            const updatedData = {
                car_model: document.getElementById('car_model2').value,
                process: document.getElementById('process2').value,
                machine_inventory: document.getElementById('machine_inventory2').value,
                jph: document.getElementById('jph2').value,
                wt: document.getElementById('wt2').value,
                ot: document.getElementById('ot2').value,
            };

            console.log('ID:', id);
            console.log('Updated Data:', updatedData);

            fetch('../../process/edit_section_4_second_month.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ index: id, updatedData: updatedData, fullName: fullName }),
            })
                .then(response => response.json())
                .then(result => {
                    console.log('Response from server:', result);
                    if (result.success) {
                        Swal.fire({
                            title: 'Success!',
                            text: 'Update successful!',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1500,
                        }).then(() => {
                            location.reload();
                        });
                    } else {
                        Swal.fire({
                            title: 'Error!',
                            text: 'Error updating row: ' + result.message,
                            icon: 'error',
                            showConfirmButton: false,
                            timer: 1500,
                        });
                    }
                })
                .catch(error => {
                    console.error('Error updating data:', error);
                    Swal.fire({
                        title: 'Error!',
                        text: 'An error occurred while updating data.',
                        icon: 'error',
                        showConfirmButton: false,
                        timer: 1500,
                    });
                });
        });
    });


    // --------------------------------------------Third Month --------------------------------------------------------
    document.addEventListener('DOMContentLoaded', function () {
        const fullName = document.getElementById('full_name').value;
        console.log('Full Name:', fullName);
        fetch(`../../process/fetch_section_4.php?full_name=${encodeURIComponent(fullName)}`)
            .then(response => response.json())
            .then(data => {
                const tableBody = document.getElementById('third_month_table_body');
                const uniqueEntries = new Set(); 

                data.forEach(row => {

                    const uniqueKey = `${row.car_model}-${row.process}`;

             
                    if (!uniqueEntries.has(uniqueKey)) {
                        uniqueEntries.add(uniqueKey); 

                        const tr = document.createElement('tr');

                        const carModelTd = document.createElement('td');
                        carModelTd.textContent = row.car_model;
                        tr.appendChild(carModelTd);

                        const processTd = document.createElement('td');
                        processTd.textContent = row.process_name;
                        tr.appendChild(processTd);

                        const totalShotsTd = document.createElement('td');
                        totalShotsTd.textContent = row.third_total_shots;
                        totalShotsTd.style.color = 'blue';
                        tr.appendChild(totalShotsTd);

                        const machineInventoryTd = document.createElement('td');
                        machineInventoryTd.textContent = row.machine_inventory;
                        tr.appendChild(machineInventoryTd);

                        const machineTd = document.createElement('td');
                        machineTd.textContent = row.machine_requirements3;
                        machineTd.style.color = 'red';
                        tr.appendChild(machineTd);

                        const jphTd = document.createElement('td');
                        jphTd.textContent = row.jph3;
                        tr.appendChild(jphTd);

                        const wtTd = document.createElement('td');
                        wtTd.textContent = row.wt3;
                        tr.appendChild(wtTd);

                        const otTd = document.createElement('td');
                        otTd.textContent = row.ot3;
                        tr.appendChild(otTd);

                        const mpTd = document.createElement('td');
                        mpTd.textContent = row.mp3;
                        tr.appendChild(mpTd);

                        tr.addEventListener('click', function () {
                            document.getElementById('car_model3').value = row.car_model;
                            document.getElementById('process3').value = row.process;
                            document.getElementById('machine_inventory3').value = row.machine_inventory;
                            document.getElementById('jph3').value = row.jph3;
                            document.getElementById('wt3').value = row.wt3;
                            document.getElementById('ot3').value = row.ot3;

                            document.getElementById('row_index').value = row.id;

                            console.log('Row clicked, showing modal for:', row.car_model);
                            $('#editModalThirdMonth').modal('show');
                        });

                        tableBody.appendChild(tr);
                    }
                });
            })
            .catch(error => {
                console.error('Error fetching data:', error);
                Swal.fire({
                    title: 'Error!',
                    text: 'Error fetching data from server.',
                    icon: 'error',
                    showConfirmButton: false,
                    timer: 1500,
                });
            });

        document.getElementById('saveChanges3').addEventListener('click', function () {
            const id = document.getElementById('row_index').value;
            const updatedData = {
                car_model: document.getElementById('car_model3').value,
                process: document.getElementById('process3').value,
                machine_inventory: document.getElementById('machine_inventory2').value,
                jph: document.getElementById('jph3').value,
                wt: document.getElementById('wt3').value,
                ot: document.getElementById('ot3').value,
            };

            console.log('ID:', id);
            console.log('Updated Data:', updatedData);

            fetch('../../process/edit_section_4_third_month.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ index: id, updatedData: updatedData, fullName: fullName }),
            })
                .then(response => response.json())
                .then(result => {
                    console.log('Response from server:', result);
                    if (result.success) {
                        Swal.fire({
                            title: 'Success!',
                            text: 'Update successful!',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1500,
                        }).then(() => {
                            location.reload();
                        });
                    } else {
                        Swal.fire({
                            title: 'Error!',
                            text: 'Error updating row: ' + result.message,
                            icon: 'error',
                            showConfirmButton: false,
                            timer: 1500,
                        });
                    }
                })
                .catch(error => {
                    console.error('Error updating data:', error);
                    Swal.fire({
                        title: 'Error!',
                        text: 'An error occurred while updating data.',
                        icon: 'error',
                        showConfirmButton: false,
                        timer: 1500,
                    });
                });
        });
    });


    // ----------------------------------------- Update Button-----------------------
    $(document).ready(function () {
        $('#updateBtn').click(function () {
        
            const fullName = $('#full_name').val();

            console.log('Full Name:', fullName);

            $.ajax({
                url: '../../process/update_query.php',
                type: 'POST',
                data: {
                    full_name: fullName 
                },
                success: function (response) {
                    if (response.includes("successful")) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Update Successful',
                            text: response,
                            showConfirmButton: false,
                            timer: 1500,
                        }).then(() => {
                            location.reload();
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Update Failed',
                            text: response,
                            showConfirmButton: false,
                            timer: 1500,
                        });
                    }
                },
                error: function (xhr, status, error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Update Failed',
                        text: 'Update failed: ' + error,
                        showConfirmButton: false,
                        timer: 1500,
                    });
                }
            });
        });

        $('#editModalFirstMonth .close').click(function () {
            $('#editModalFirstMonth').modal('hide');
        });

        $('#closeBtn').click(function () {
            $('#editModalFirstMonth').modal('hide');
        });
    });
   
    document.getElementById("importBtn").addEventListener("click", function() {
    const tableIds = [
        { bodyId: "first_month_table_body", label: "1" },
        { bodyId: "second_month_table_body", label: "2" },
        { bodyId: "third_month_table_body", label: "3" }
    ];

    let csvContent = "";
    csvContent += '"Car Model","Process","Machine Inventory","","Total Shots1","Total Shots2","Total Shots3","","Machine Requirements1","JPH1","WT1","OT1","MP1","","Machine Requirements2","JPH2","WT2","OT2","MP2","","Machine Requirements3","JPH3","WT3","OT3","MP3"\n';
    csvContent += "\n";

    const rows1 = document.querySelector(`#${tableIds[0].bodyId}`).querySelectorAll("tr");
    const rows2 = document.querySelector(`#${tableIds[1].bodyId}`).querySelectorAll("tr");
    const rows3 = document.querySelector(`#${tableIds[2].bodyId}`).querySelectorAll("tr");

    rows1.forEach((row1, index) => {
        const row2 = rows2[index] || {};
        const row3 = rows3[index] || {};

        const data1 = Array.from(row1.querySelectorAll("td")).map(cell => cell.innerText);
        const data2 = row2 ? Array.from(row2.querySelectorAll("td")).map(cell => cell.innerText) : ["", "", "", "", ""];
        const data3 = row3 ? Array.from(row3.querySelectorAll("td")).map(cell => cell.innerText) : ["", "", "", "", ""];

        csvContent += `"${data1[0]}","${data1[1]}","${data1[3]}","","${data1[2]}","${data2[2]}","${data3[2]}","","${data1[4]}","${data1[5]}","${data1[6]}","${data1[7]}","${data1[8]}","","${data2[4]}","${data2[5]}","${data2[6]}","${data2[7]}","${data2[8]}","","${data3[4]}","${data3[5]}","${data3[6]}","${data3[7]}","${data3[8]}"\n`;
    });

    const blob = new Blob([csvContent], { type: "text/csv;charset=utf-8;" });
    const url = URL.createObjectURL(blob);
    const a = document.createElement("a");

    a.href = url;
    a.download = "Section 3.csv";
    a.style.display = "none";
    document.body.appendChild(a);
    a.click();

    document.body.removeChild(a);
    URL.revokeObjectURL(url);
});
</script>

<?php include 'plugins/footer.php'; ?>