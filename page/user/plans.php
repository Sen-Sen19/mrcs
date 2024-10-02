<?php include 'plugins/navbar.php'; ?>

<?php include 'plugins/sidebar/user_bar.php'; ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="tab-content" id="excelTabContent">
                <div class="tab-pane fade show active" id="file3" role="tabpanel" aria-labelledby="file3-tab">
                    <div class="row mb-2">
                        <!-- Date Pickers -->
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





                        <!-- Search Button -->
                        <div class="col-12 col-sm-2">
                            <button id="searchButton" class="btn btn-primary btn-sm btn-block"
                                style="background-color: #007bff; border-color: #007bff; color: white; padding: 5px 10px; margin-top: 9%; margin-bottom: 20px;">
                                <i class="fas fa-search"></i> Search
                            </button>
                        </div>

                        <!-- Import Button -->
                        <div class="col-12 col-sm-2">
                            <button id="importButton3" class="btn btn-warning btn-sm btn-block"
                                style="background-color: #F0D018; border-color: #F0D018; color: black; padding: 5px 10px; margin-top: 9%;">
                                <i class="fas fa-upload"></i> Plan From PC
                            </button>
                            <input type="file" id="fileImport3" class="form-control" accept=".xlsx, .xls"
                                style="display: none;" />
                        </div>

                        <!-- Update Masterlist Button -->
                        <div class="col-12 col-sm-2">
                            <button id="update_masterlist" class="btn btn-success btn-sm btn-block"
                                style="background-color: #40bd0e; border-color: #40bd0e; color: white; padding: 5px 10px;  margin-top: 9%;">
                                <i class="fas fa-wrench"></i> Update Masterlist
                            </button>
                        </div>

                    </div>

                    <!-- Table and Loading Sections -->
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
                            style="height: 50vh; overflow: auto; margin-top: 20px; border-top: 1px solid white; background-color: white; padding: 15px; border-radius: 10px;">
                            <table id="header_table3" class="table table-sm table-head-fixed text-nowrap table-hover">
                                <thead style="text-align: center;">
                                    <!-- Table Headers for Plan From PC -->
                                </thead>
                                <tbody id="table_body3" style="text-align: center; padding:20px;">
                                    <!-- Table Body for Plan From PC -->
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
                        <div id="dataCount3" class="data-count"
                            style="text-align: left; padding: 10px; font-size: 16px;">
                            Data Count: 0
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
    let import1Data = null;
    let firstMonthMap = new Map();
    document.addEventListener('DOMContentLoaded', function () {

        document.getElementById('importButton3').addEventListener('click', function () {
            document.getElementById('fileImport3').click();
        });

        document.getElementById('fileImport3').addEventListener('change', function (e) {
            handleFileUpload3(e);
        });

    });

    function handleFileUpload3(event) {
        const file = event.target.files[0];
        if (!file) return;

        document.getElementById('loading').style.display = 'block';

        const reader = new FileReader();
        reader.onload = function (e) {
            const data = new Uint8Array(e.target.result);
            const workbook = XLSX.read(data, { type: 'array' });
            const worksheet = workbook.Sheets[workbook.SheetNames[0]];
            const jsonData = XLSX.utils.sheet_to_json(worksheet, { header: 1, raw: false });

            if (jsonData.length === 0) {
                document.getElementById('loading').style.display = 'none';
                return;
            }

            const header = jsonData[0];
            const dataRows = jsonData.slice(1);

            const filteredData = dataRows.filter(row => row[10] !== '' && row[10] !== undefined && row[10] !== null);

            // Directly process the filteredData without any max plan logic
            const dataToSave = [];
            const dates = header.slice(22);

            filteredData.forEach(row => {
                const manufacturingLocationCode = row[0];
                const customerManufacturerCode = row[1];
                const shippingLocation = row[2];
                const vehicleType = row[3];
                const vehicleTypeName = row[4];
                const whType = row[5];
                const whTypeName = row[6];
                const assyGroupName = row[7];
                const item = row[8];
                const basicItemNumber = row[9];
                const internalItemNumber = row[10];
                const line = row[12];
                const polySize = row[13];
                const capacity = row[14];
                const productCategory = row[15];
                const productionGrp = row[16];
                const section = row[17];
                const circuit = row[18];
                const initialProcess = row[19];
                const secondaryProcess = row[20];
                const laterProcess = row[21];

                dates.forEach((date, index) => {
                    const value = parseFloat(row[22 + index]) || 0;
                    if (value !== 0) {
                        dataToSave.push({
                            base_product: row[10],
                            date: date,
                            value: value,
                            manufacturing_location: manufacturingLocationCode,
                            customer_manufacturer: customerManufacturerCode,
                            shipping_location: shippingLocation,
                            vehicle_type: vehicleType,
                            vehicle_type_name: vehicleTypeName,
                            wh_type: whType,
                            wh_type_name: whTypeName,
                            assy_group_name: assyGroupName,
                            item: item,
                            basic_item_number: basicItemNumber,
                            internal_item_number: internalItemNumber,
                            line: line,
                            poly_size: polySize,
                            capacity: capacity,
                            product_category: productCategory,
                            production_grp: productionGrp,
                            section: section,
                            circuit: circuit,
                            initial_process: initialProcess,
                            secondary_process: secondaryProcess,
                            later_process: laterProcess
                        });
                    }
                });
            });

            console.log('Data to save:', dataToSave);

            fetch('../../process/save_data.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(dataToSave)
            })
                .then(response => response.text())
                .then(result => {
                    console.log('Server response:', result);
                })
                .catch(error => {
                    console.error('Error:', error);
                })
                .finally(() => {
                    document.getElementById('loading').style.display = 'none';
                });
        };

        reader.readAsArrayBuffer(file);
    }


    function renderUpload3(data, tableBodyId, selectedBaseProduct, selectedStartDate, selectedEndDate) {
    const tableBody = document.getElementById(tableBodyId);
    tableBody.innerHTML = '';

    // Create date range from selected start date to end date
    const dateRange = [];
    for (let date = new Date(selectedStartDate); date <= new Date(selectedEndDate); date.setDate(date.getDate() + 1)) {
        dateRange.push(date.toISOString().split('T')[0]); // Format as YYYY-MM-DD
    }

    const filteredData = [];
    const excludedBaseProducts = new Set(); // To keep track of excluded base products

    // Filter data based on the selected base product
    data.forEach(row => {
        if (row[0] === selectedBaseProduct) { // Check for the selected base product
            filteredData.push(row);
        } else {
            excludedBaseProducts.add(row[0]); // Add excluded base product to the set
        }
    });

    // Create a new array to hold the final output data
    const outputData = [];

    // Populate output data with filtered values
    filteredData.forEach(row => {
        const outputRow = Array(1 + dateRange.length).fill(0); // Initialize with zeros
        outputRow[0] = row[0]; // Set the base product name

        // Populate the output row with values based on the date range
        dateRange.forEach((date, index) => {
            const dateIndex = row.indexOf(date); // Find the index of the date in the row
            if (dateIndex !== -1) {
                outputRow[index + 1] = row[dateIndex + 1]; // Set the value next to the date
            }
        });

        outputData.push(outputRow); // Add the populated output row
    });

    // If there are no matching products, create an empty row
    if (outputData.length === 0) {
        const emptyRow = new Array(1 + dateRange.length).fill(0); // Create an array filled with zeros
        emptyRow[0] = selectedBaseProduct; // Set base product name
        outputData.push(emptyRow);
    }

    // Render the table rows
    outputData.forEach((row, rowIndex) => {
        const tr = document.createElement('tr');

        row.forEach((cell, cellIndex) => {
            const td = document.createElement('td');
            td.textContent = cell;

            if (rowIndex === 0) {
                td.style.fontWeight = 'bold';
            }

            if (rowIndex > 0 && cellIndex === row.length - 1) {
                td.style.color = 'red';
            }

            tr.appendChild(td);
        });

        tableBody.appendChild(tr);
    });

    // Update the data count
    const dataCountElement = document.getElementById('dataCount3');
    if (dataCountElement) {
        dataCountElement.textContent = `Data Count: ${outputData.length - 1}`; // Exclude header row from count
    }

    // Log excluded base products
    console.log("Excluded Base Products:", [...excludedBaseProducts]);
}

// Sample usage without hardcoding
// This function will now take dynamic data passed to it.

</script>




<?php include 'plugins/footer.php'; ?>
<?php include 'plugins/js/plan_js.php'; ?>