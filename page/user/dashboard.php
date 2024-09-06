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

                <li class="nav-item" style="width:200px; margin-bottom 70px;">
                    <a class="nav-link" id="file2-tab" data-toggle="tab" href="#file3" role="tab" aria-controls="file3"
                        aria-selected="false">Plan From PC</a>
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
                            <div id="dataCount1" class="data-count" style="text-align: left; padding: 10px; font-size: 16px;">
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
                                    <thead style="text-align: center;">

                                    </thead>
                                    <tbody id="table_body2" style="text-align: center; padding:20px;">

                                    </tbody>
                                </table>
                            </div>
                            <div id="dataCount2" class="data-count" style="text-align: left; padding: 10px; font-size: 16px;">
                    Data Count: 0
                </div>
                        </div>
                    </div>
                </div>


                <div class="tab-pane fade" id="file3" role="tabpanel" aria-labelledby="file3-tab">
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <button id="importButton3" class="btn btn-primary mt-3"
                                style="background-color: #F0D018; border-color: #F0D018; color: black; margin-right: 20px; width: 100%; max-width: 200px; margin-bottom: 30px;">
                                <i class="fas fa-upload"></i> Plan From PC
                            </button>

                            <input type="file" id="fileImport3" class="form-control" accept=".xlsx, .xls"
                                style="display: none;" />
                            <button id="exportButton3" class="btn btn-primary mt-3"
                                style="background-color: #525252; border-color: #525252; color: white; margin-right: 20px; width: 100%; max-width: 200px; margin-bottom: 30px;">
                                <i class="fas fa-download"></i>
                                Export</button>
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
                        <div class="card-body">
                            <div id="accounts_table_res2" class="table-responsive"
                                style="height: 50vh; overflow: auto; margin-top: 20px; border-top: 1px solid white; background-color: white; padding: 15px; border-radius: 10px;">
                                <table id="header_table2"
                                    class="table table-sm table-head-fixed text-nowrap table-hover">
                                    <thead style="text-align: center;">

                                    </thead>
                                    <tbody id="table_body3" style="text-align: center; padding:20px;">
                                    
                                    </tbody>
                                </table>
                            </div>
                            <div id="dataCount3" class="data-count" style="text-align: left; padding: 10px; font-size: 16px;">
                    Data Count: 0
                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="../../dist/js/xlsx.full.min.js"></script>
<script>
    let import1Data = null;
    let firstMonthMap = new Map();

    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('importButton1').addEventListener('click', function () {
            document.getElementById('fileImport1').click();
        });

        document.getElementById('importButton2').addEventListener('click', function () { 
            document.getElementById('fileImport2').click();
        });
        document.getElementById('importButton3').addEventListener('click', function () {
            document.getElementById('fileImport3').click();
        });




        document.getElementById('fileImport1').addEventListener('change', function (e) {
            handleFileUpload1(e);
        });

        document.getElementById('fileImport2').addEventListener('change', function (e) {
            handleFileUpload2(e);
        });
        document.getElementById('fileImport3').addEventListener('change', function (e) {
            handleFileUpload3(e);
        });

        document.getElementById('exportButton1').addEventListener('click', function () {
            exportToExcel('table_body1', 'Plan_Total');
        });
        document.getElementById('exportButton2').addEventListener('click', function () {
            exportToExcel('table_body2', 'Plan_3_Months');
        });
        document.getElementById('exportButton3').addEventListener('click', function () {
            exportToExcel('table_body3', 'Plan_from_PC');
        });
      
    });


    function handleFileUpload1(event) {
        const file = event.target.files[0];
        if (!file) return;

        const reader = new FileReader();
        reader.onload = function (e) {
            const data = new Uint8Array(e.target.result);
            const workbook = XLSX.read(data, { type: 'array' });
            const worksheet = workbook.Sheets[workbook.SheetNames[0]];
            const jsonData = XLSX.utils.sheet_to_json(worksheet, { header: 1, raw: false });

            if (jsonData.length === 0) return;

            import1Data = jsonData;

            const headerRow = jsonData[0];
            const monthColumns = headerRow.slice(1);

            function getMaxAndDate(values, columns) {
                const numericValues = values.map(value => {
                    const num = parseFloat(value.replace(/,/g, ''));
                    return isNaN(num) ? -Infinity : num;
                });
                const maxValue = Math.max(...numericValues);
                const maxIndex = numericValues.indexOf(maxValue);
                const maxDate = maxIndex !== -1 ? columns[maxIndex] : '';

                return { maxDate, maxValue: maxValue === -Infinity ? '' : maxValue };
            }

            const formattedData = jsonData.map((row, rowIndex) => {
                if (rowIndex === 0) {
                    return [...row, '1st month', 'Max. Plan 1', '2nd month', 'Max. Plan 2', '3rd month', 'Max. Plan 3'];
                }

                const values = row.slice(1);
                const maxValuesAndDates = [];
                let startIndex = 0;
                const monthLength = 31;

                for (let month = 0; month < 3; month++) {
                    const monthValues = values.slice(startIndex, startIndex + monthLength);
                    const { maxDate, maxValue } = getMaxAndDate(monthValues, monthColumns.slice(startIndex, startIndex + monthLength));
                    maxValuesAndDates.push(maxDate, maxValue);
                    startIndex += monthLength;
                }

                firstMonthMap.set(row[0], maxValuesAndDates[0]);
                return [...row, ...maxValuesAndDates];
            });

            renderUpload1(formattedData, 'table_body1');
        };
        reader.readAsArrayBuffer(file);
        
    }
    

    function renderUpload1(data, tableBodyId) {
    const tableBody = document.getElementById(tableBodyId);
    tableBody.innerHTML = '';

    const headerRow = data[0];
    const firstMonthIndex = headerRow.indexOf('1st month');
    const secondMonthIndex = headerRow.indexOf('2nd month');
    const thirdMonthIndex = headerRow.indexOf('3rd month');
    const maxPlan1Index = headerRow.indexOf('Max. Plan 1');
    const maxPlan2Index = headerRow.indexOf('Max. Plan 2');
    const maxPlan3Index = headerRow.indexOf('Max. Plan 3');

    data.forEach((row, rowIndex) => {
        const tr = document.createElement('tr');

        row.forEach((cell, cellIndex) => {
            const td = document.createElement('td');
            td.textContent = cell;

            if (rowIndex === 0) {
                td.style.fontWeight = 'bold';
            } else if (cellIndex === firstMonthIndex || cellIndex === maxPlan1Index) {
                td.style.color = 'red';
            } else if (cellIndex === secondMonthIndex || cellIndex === maxPlan2Index) {
                td.style.color = 'blue';
            } else if (cellIndex === thirdMonthIndex || cellIndex === maxPlan3Index) {
                td.style.color = 'green';
            }

            tr.appendChild(td);
        });

        tableBody.appendChild(tr);
    });

    // Update data count
    const dataCountElement = document.getElementById('dataCount1');
    if (dataCountElement) {
        dataCountElement.textContent = `Data Count: ${data.length - 1}`; // Exclude header row
    }
}


    function handleFileUpload2(event) {
        const file = event.target.files[0];
        if (!file) return;

        const reader = new FileReader();
        reader.onload = function (e) {
            const data = new Uint8Array(e.target.result);
            const workbook = XLSX.read(data, { type: 'array' });
            const worksheet = workbook.Sheets[workbook.SheetNames[0]];
            const jsonData = XLSX.utils.sheet_to_json(worksheet, { header: 1, raw: false });

            if (jsonData.length === 0) return;

            const headerRow = jsonData[0];

            const formattedData = jsonData.map((row, rowIndex) => {
                if (rowIndex === 0) {
                    return [...row, 'Total', '1st Month', 'Max Plan 1'];
                }

                const valuesToSum = row.slice(5);
                const totalValue = valuesToSum.reduce((sum, cell) => {
                    const num = parseFloat(cell.replace(/,/g, ''));
                    return !isNaN(num) ? sum + num : sum;
                }, 0);

                const firstMonthDate = firstMonthMap.get(row[0]) || '';
                const dateColumnIndex = headerRow.indexOf(firstMonthDate);
                const maxPlanValue = dateColumnIndex !== -1 ? row[dateColumnIndex] || '' : '';

                return [...row, totalValue, maxPlanValue, firstMonthDate];
            });

            renderUpload2(formattedData, 'table_body2');
        };
        reader.readAsArrayBuffer(file);
    }

    function renderUpload2(data, tableBodyId) {
        const tableBody = document.getElementById(tableBodyId);
        tableBody.innerHTML = '';

        const headerRow = data[0];
        const totalIndex = headerRow.indexOf('Total');
        const firstMonthIndex = headerRow.indexOf('1st Month');
        const maxPlan1Index = headerRow.indexOf('Max Plan 1');

        data.forEach((row, rowIndex) => {
            const tr = document.createElement('tr');

            row.forEach((cell, cellIndex) => {
                const td = document.createElement('td');
                td.textContent = cell;

                if (rowIndex === 0) {
                    td.style.fontWeight = 'bold';
                } else if (cellIndex === totalIndex) {
                    td.style.color = 'red';
                } else if (cellIndex === firstMonthIndex) {
                    td.style.color = 'blue';
                } else if (cellIndex === maxPlan1Index) {
                    td.style.color = 'green';
                }

                tr.appendChild(td);
            });

            tableBody.appendChild(tr);
        });
        const dataCountElement = document.getElementById('dataCount2');
    if (dataCountElement) {
        dataCountElement.textContent = `Data Count: ${data.length - 1}`; // Exclude header row
    }


    }
    function handleFileUpload3(event) {
    const file = event.target.files[0];
    if (!file) return;

    const reader = new FileReader();
    reader.onload = function (e) {
        const data = new Uint8Array(e.target.result);
        const workbook = XLSX.read(data, { type: 'array' });
        const worksheet = workbook.Sheets[workbook.SheetNames[0]];
        const jsonData = XLSX.utils.sheet_to_json(worksheet, { header: 1, raw: false });

        if (jsonData.length === 0) return;

        // Separate header row from data rows
        const header = jsonData[0];
        const dataRows = jsonData.slice(1);

        // Add "Max Plan 1" column header if it does not exist
        if (!header.includes("Max Plan 1")) {
            header.push("Max Plan 1");
        }

        // Filter out rows where column 11 is empty
        const filteredData = dataRows.filter(row => {
            return row[10] !== '' && row[10] !== undefined && row[10] !== null;
        });

        // Process the data to ensure empty cells in columns starting from the 23rd are set to 0
        const processedData = filteredData.map(row => {
            // Update columns starting from the 23rd column (index 22)
            for (let i = 22; i < row.length; i++) {
                if (row[i] === '' || row[i] === undefined || row[i] === null) {
                    row[i] = 0;
                }
            }

            // Calculate the maximum value in the row
            const maxValue = Math.max(...row.slice(22)); // Only consider columns from the 23rd onwards
            row.push(maxValue); // Add max value to the end of the row

            return row;
        });

        // Sort data alphabetically based on column 11
        const sortedData = processedData.sort((a, b) => {
            // Compare based on column 11 (index 10 in zero-based index)
            if (a[10] < b[10]) return -1;
            if (a[10] > b[10]) return 1;
            return 0;
        });

        // Further filter out rows where the "Max Plan 1" column (last column) is 0 or empty
        const finalData = sortedData.filter(row => {
            return row[row.length - 1] !== 0 && row[row.length - 1] !== '' && row[row.length - 1] !== undefined && row[row.length - 1] !== null;
        });

        // Add the header row back to the beginning of the final data
        finalData.unshift(header);

        // Render the updated data
        renderUpload3(finalData, 'table_body3');
    };
    reader.readAsArrayBuffer(file);
}

function renderUpload3(data, tableBodyId) {
    const tableBody = document.getElementById(tableBodyId);
    tableBody.innerHTML = '';

    data.forEach((row, rowIndex) => {
        const tr = document.createElement('tr');

        row.forEach((cell, cellIndex) => {
            const td = document.createElement('td');
            td.textContent = cell;

            // Apply bold styling to header row
            if (rowIndex === 0) {
                td.style.fontWeight = 'bold';
            }

            // Apply red font color to "Max Plan 1" column
            if (rowIndex > 0 && cellIndex === row.length - 1) { // Only apply to data rows, last column
                td.style.color = 'red';
            }

            tr.appendChild(td);
        });

        tableBody.appendChild(tr);
    });

    const dataCountElement = document.getElementById('dataCount3');
    if (dataCountElement) {
        dataCountElement.textContent = `Data Count: ${data.length - 1}`; // Exclude header row
    }
}

    function exportToExcel(tableBodyId, fileName) {
        const tableBody = document.getElementById(tableBodyId);
        const rows = tableBody.querySelectorAll('tr');
        const data = [];
        rows.forEach(row => {
            const cells = row.querySelectorAll('td');
            const rowData = Array.from(cells).map(cell => cell.textContent);
            data.push(rowData);
        });

        const ws = XLSX.utils.aoa_to_sheet(data);
        const wb = XLSX.utils.book_new();
        XLSX.utils.book_append_sheet(wb, ws, 'Sheet1');

        XLSX.writeFile(wb, `${fileName}.xlsx`);
    }

</script>



<?php include 'plugins/footer.php'; ?>