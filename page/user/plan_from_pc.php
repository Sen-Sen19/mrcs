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


<script>

function loadData(dateFrom, dateTo) {
    $('#loading2').show();

    $.ajax({
        url: '../../process/fetch_data.php',
        type: 'GET',
        dataType: 'json',
        success: function (response) {
        
            var tableBody = $('#table_body3');
            var header = $('#header_table3 thead');
            tableBody.empty();
            header.empty();

            var aggregatedData = {};
            var excludedBaseProducts = [];  
            var includedBaseProducts = []; 
            var uniqueDates = new Set();

            // Convert date strings to Date objects for comparison
            const fromDate = dateFrom ? new Date(dateFrom) : null;
            const toDate = dateTo ? new Date(dateTo) : null;

            $.each(response, function (index, item) {
                const itemDate = new Date(item.date);
                const formattedDate = itemDate.toLocaleDateString(undefined, {
                    year: 'numeric',
                    month: '2-digit',
                    day: '2-digit'
                });

                if (itemDate >= fromDate && itemDate <= toDate) {
                    var key = item.base_product + "|" + item.manufacturing_location;
                    
                    if (!aggregatedData[key]) {
                        aggregatedData[key] = {
                            base_product: item.base_product,
                            manufacturing_location: item.manufacturing_location,
                            customer_manufacturer: item.customer_manufacturer,
                            shipping_location: item.shipping_location,
                            vehicle_type: item.vehicle_type,
                            vehicle_type_name: item.vehicle_type_name,
                            wh_type: item.wh_type,
                            wh_type_name: item.wh_type_name,
                            assy_group_name: item.assy_group_name,
                            item: item.item,
                            internal_item_number: item.internal_item_number,
                            line: item.line,
                            poly_size: item.poly_size,
                            capacity: item.capacity,
                            product_category: item.product_category,
                            production_grp: item.production_grp,
                            section: item.section,
                            circuit: item.circuit,
                            initial_process: item.initial_process,
                            secondary_process: item.secondary_process,
                            later_process: item.later_process,
                            dates: {}
                        };
                    }

                    aggregatedData[key].dates[formattedDate] = item.value;
                    uniqueDates.add(formattedDate);

                    // Log included base products
                  
                }
            });

        

            uniqueDates = Array.from(uniqueDates).sort((a, b) => new Date(a) - new Date(b));

            header.append('<tr><th>Base Product</th><th>Manufacturing Location</th><th>Customer Manufacturer</th><th>Shipping Location</th><th>Vehicle Type</th><th>Vehicle Type Name</th><th>WH Type</th><th>WH Type Name</th><th>Assy Group Name</th><th>Item</th><th>Internal Item Number</th><th>Line</th><th>Poly Size</th><th>Capacity</th><th>Product Category</th><th>Production Group</th><th>Section</th><th>Circuit</th><th>Initial Process</th><th>Secondary Process</th><th>Later Process</th></tr>');

            uniqueDates.forEach(date => {
                header.find('tr').append(`<th>${date}</th>`); // Corrected line
            });

            $.each(aggregatedData, function (key, item) {
                var dateColumns = "";

                // Loop through each date and generate the date columns
                uniqueDates.forEach(date => {
                    var value = parseFloat(item.dates[date] || 0.00);  // Parse value as float or use 0 if undefined
                    dateColumns += `<td>${value.toFixed(2)}</td>`;  // Ensure value is formatted to 2 decimal places
                });

                // Append the row without max plan value
                tableBody.append(
                    `<tr>
                        <td>${item.base_product}</td>
                        <td>${item.manufacturing_location}</td>
                        <td>${item.customer_manufacturer}</td>
                        <td>${item.shipping_location}</td>
                        <td>${item.vehicle_type}</td>
                        <td>${item.vehicle_type_name}</td>
                        <td>${item.wh_type}</td>
                        <td>${item.wh_type_name}</td>
                        <td>${item.assy_group_name}</td>
                        <td>${item.item}</td>
                        <td>${item.internal_item_number}</td>
                        <td>${item.line}</td>
                        <td>${item.poly_size}</td>
                        <td>${item.capacity}</td>
                        <td>${item.product_category}</td>
                        <td>${item.production_grp}</td>
                        <td>${item.section}</td>
                        <td>${item.circuit}</td>
                        <td>${item.initial_process}</td>
                        <td>${item.secondary_process}</td>
                        <td>${item.later_process}</td>
                        ${dateColumns}
                    </tr>`
                );
            });

            $('#dataCount3').text('Data Count: ' + includedBaseProducts.length); 
        },
        error: function (xhr, status, error) {
            console.error('Error fetching data:', error);
  
        
        },
        complete: function () {
            $('#loading2').hide();
        }
    });
}

// Add event listener to the search button
$('#searchButton').on('click', function () {
    const dateFrom = $('#date_from_search_defect').val();
    const dateTo = $('#date_to_search_defect').val();

    if (dateFrom && dateTo) {
        loadData(dateFrom, dateTo);
    } else {
        alert('Please select both dates.');
    }
});

$(document).ready(function () {
    loadData(); // Initial load without filters
}); 






document.addEventListener("DOMContentLoaded", function () {
        // Add event listener to save button
        document.getElementById("saveButton").addEventListener("click", function () {
            saveData();
        });
    });
    function saveData() {
    let table = document.querySelector('#accounts_table_res2 table'); // Corrected line
    if (!table) {
        alert('Table not found');
        return;
    }

    let rows = table.getElementsByTagName('tbody')[0].rows;
    let dataToSend = [];

    // Loop through each row
    for (let i = 0; i < rows.length; i++) {
        let row = rows[i];
        let baseData = [];

        // Extract the static columns (first 21 columns)
        for (let j = 0; j < 21; j++) {
            baseData.push(row.cells[j].innerText.trim()); // Trim to remove extra spaces
        }

        // Extract the dynamic date columns and transform into rows
        for (let j = 21; j < row.cells.length; j++) {
            let dateValue = table.rows[0].cells[j].innerText.trim(); // Date from header row
            let value = row.cells[j].innerText.trim(); // Value from the row's cell

            // Log the date value for debugging
            // console.log('Date Value:', dateValue);

            // Validate the date value
            let date = new Date(dateValue);
            if (isNaN(date.getTime())) { // Check if date is valid
                alert('Invalid date format: ' + dateValue);
                return;
            }

            // Convert date to YYYY-MM-DD format
            let formattedDate = date.toISOString().split('T')[0];

            // Push the base data + date + value into dataToSend array
            dataToSend.push({
                base_product: baseData[0],
                manufacturing_location: baseData[1],
                customer_manufacturer: baseData[2],
                shipping_location: baseData[3],
                vehicle_type: baseData[4],
                vehicle_type_name: baseData[5],
                wh_type: baseData[6],
                wh_type_name: baseData[7],
                assy_group_name: baseData[8],
                item: baseData[9],
                internal_item_number: baseData[10],
                line: baseData[11],
                poly_size: baseData[12],
                capacity: baseData[13],
                product_category: baseData[14],
                production_grp: baseData[15],
                section: baseData[16],
                circuit: baseData[17],
                initial_process: baseData[18],
                secondary_process: baseData[19],
                later_process: baseData[20],
                date: formattedDate, // Use the formatted date
                value: value
            });
        }
    }

    if (dataToSend.length === 0) {
        alert('No data to save');
        return;
    }

    // Send the data to PHP via AJAX
    let xhr = new XMLHttpRequest();
    xhr.open('POST', '../../process/save_plan_date.php', true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.onload = function () {
        if (xhr.status === 200) {
            alert('Data saved successfully!');
        } else {
            alert('Error saving data! Status code: ' + xhr.status);
        }
    };
    console.log('Total records to be saved:', dataToSend.length);
    xhr.send(JSON.stringify(dataToSend));
}

</script>

<?php include 'plugins/footer.php'; ?>
<?php include 'plugins/js/plan_js.php'; ?>c