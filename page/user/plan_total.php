<?php
include 'plugins/navbar.php';
include 'plugins/sidebar/user_bar.php';



?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
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
                                        <tr>
                                            <th>Car Code</th>
                                            <th>First Month</th>
                                            <th>Max Plan 1</th>
                                            <th>Second Month</th>
                                            <th>Max Plan 2</th>
                                            <th>Third Month</th>
                                            <th>Max Plan 3</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table_body1" style="text-align: center; padding:20px;">
                                        <?php include '../../process/fetch_plan_total.php'; ?>
                                    </tbody>
                                </table>
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
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    let import1Data = null;
    let firstMonthMap = new Map();
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('importButton1').addEventListener('click', function () {
            document.getElementById('fileImport1').click();
        });

        document.getElementById('fileImport1').addEventListener('change', handleFileUpload1);
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

            // Process data without rendering it in a table
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
                firstMonthMap.set(row[0], maxValuesAndDates[0]);  // Store in the Map
                return [...row, ...maxValuesAndDates];
            });

            console.log(formattedData);  

            saveToDatabase(formattedData);
        };
        reader.readAsArrayBuffer(file);
    }

    
    function saveToDatabase(formattedData) {
        // Prepare the data to be sent
        const dataToSend = formattedData.slice(1).map(row => ({
            car_code: row[0],
            first_month: row[row.length - 6] || "Null",
            max_plan_1: row[row.length - 5] ? parseFloat(row[row.length - 5]) : 0, 
            second_month: row[row.length - 4] || "Null",
            max_plan_2: row[row.length - 3] ? parseFloat(row[row.length - 3]) : 0,
            third_month: row[row.length - 2] || "Null", 
            max_plan_3: row[row.length - 1] ? parseFloat(row[row.length - 1]) : 0 
        }));


        $.ajax({
            url: '../../process/save_total_plan.php', // Change this to your PHP script path
            type: 'POST',
            data: { plans: dataToSend }, // Send the full data object
            success: function (response) {
                console.log('Data saved successfully:', response);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error('Error saving data:', textStatus, errorThrown);
            }
        });
    }
</script>



<?php include 'plugins/footer.php'; ?>