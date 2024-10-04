<?php include 'plugins/navbar.php'; ?>
<?php include 'plugins/sidebar/user_bar.php'; ?>
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
                                        <!-- Table Headers for File 1 -->
                                    </thead>
                                    <tbody id="table_body1" style="text-align: center; padding:20px;">
                                        <!-- Table Body for File 1 -->
                                    </tbody>
                                </table>

                            </div>
                            <div id="dataCount1" class="data-count"
                                style="text-align: left; padding: 10px; font-size: 16px;">
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
            
            // Remove the call to renderUpload1
            // renderUpload1(formattedData, 'table_body1');
            // Instead, you can handle `formattedData` as needed
            console.log(formattedData);  // Example of further processing (e.g., logging to console)
        };
        reader.readAsArrayBuffer(file);
    }

    // Commenting out the render function since it's not needed anymore
    // function renderUpload1(data, tableBodyId) {
    //     // Code for rendering the data in a table
    // }
</script>


<?php include 'plugins/footer.php'; ?>
