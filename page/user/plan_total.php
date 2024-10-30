<?php
// Existing code
include 'plugins/navbar.php';
include 'plugins/sidebar/user_bar.php';
?>
<!-- SweetAlert CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

<!-- SweetAlert JS -->

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="tab-content" id="excelTabContent">
                <div class="tab-pane fade show active" id="file1" role="tabpanel" aria-labelledby="file1-tab">
                    <div class="row mb-2">

   

                        <div class="col-sm-12">

                            <button id="extractPlanBtn" class="btn btn-primary mt-3"
                                style="background-color: #008dff; border-color: #008dff; color: white; margin-right: 20px; width: 100%; max-width: 200px;margin-bottom: 30px;">
                                <i class="fas fa-layer-group"></i>Extract Plan
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
                            <h3 class="card-title">Plan</h3>
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
                                style="height: 50vh; overflow: auto; margin-top: 20px; border-top: 1px solid white; background-color: white; border-radius: 10px;">
                                <?php include '../../process/fetch_plan2.php'; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include 'plugins/footer.php'; ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script>
 document.addEventListener('DOMContentLoaded', () => {
    const extractPlanBtn = document.getElementById('extractPlanBtn');

    extractPlanBtn.addEventListener('click', () => {
        // Select all rows in the table body
        const rows = document.querySelectorAll('#accounts_table_res1 table tbody tr');

        // Initialize an array to hold the data
        const tableData = [];

        rows.forEach(row => {
            const firstCol = row.cells[0] ? row.cells[0].textContent.trim() : ''; // Get the first cell (column 1)
            const lastCol = row.cells[row.cells.length - 1] ? row.cells[row.cells.length - 1].textContent.trim() : ''; // Last column
            const secondToLastCol = row.cells[row.cells.length - 2] ? row.cells[row.cells.length - 2].textContent.trim() : ''; // 2nd to last column
            const thirdToLastCol = row.cells[row.cells.length - 3] ? row.cells[row.cells.length - 3].textContent.trim() : ''; // 3rd to last column
            const fourthToLastCol = row.cells[row.cells.length - 4] ? row.cells[row.cells.length - 4].textContent.trim() : ''; // 4th to last column
            const fifthToLastCol = row.cells[row.cells.length - 5] ? row.cells[row.cells.length - 5].textContent.trim() : ''; // 5th to last column
            const sixthToLastCol = row.cells[row.cells.length - 6] ? row.cells[row.cells.length - 6].textContent.trim() : ''; // 6th to last column
            
            tableData.push({
                first: firstCol,
                sixthToLast: sixthToLastCol,
                fifthToLast: fifthToLastCol,
                fourthToLast: fourthToLastCol,
                thirdToLast: thirdToLastCol,
                secondToLast: secondToLastCol,
                last: lastCol,
            });
        });

        // Get the full name from the hidden input
        const fullName = document.getElementById('full_name').value;

        // Send data to the PHP script
        fetch('../../process/extract_plan.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ fullName, tableData }) // Include fullName in the request
        })
        .then(response => response.json())
        .then(data => {
            // Display success message with SweetAlert
            if (data.message === 'Data saved successfully') {
                swal("Success!", data.message, "success");
            } else {
                swal("Error!", data.message, "error");
            }
        })
        .catch((error) => {
            console.error('Error:', error);
            swal("Error!", "An error occurred while saving data.", "error");
        });
    });
});


</script>

