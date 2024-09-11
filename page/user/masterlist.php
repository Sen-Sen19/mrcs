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
                                style="background-color: #F0D018; border-color: #F0D018; color: black; margin-right: 20px; width: 100%; max-width: 200px; margin-bottom: 30px; margin-top: 50px !important;">
                                <i class="fas fa-upload"></i> Import CSV
                            </button>
                            <input type="file" id="fileImport1" class="form-control" accept=".csv"
                                style="display: none;" />
                            <button id="exportButton1" class="btn btn-primary mt-3"
                                style="background-color: #525252; border-color: #525252; color: white; margin-right: 20px; width: 100%; max-width: 200px;margin-bottom: 30px;margin-top: 50px !important;">
                                <i class="fas fa-download"></i> Export
                            </button>
                        </div>
                    </div>
                    <div class="card card-gray-dark card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Masterlist</h3>
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
                                    <tbody id="table_body1" style="text-align: center; padding:20px;">
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
            </div>
        </div>
    </div>
</div>

<script>
 document.getElementById('importButton1').addEventListener('click', function () {
    document.getElementById('fileImport1').click();
});

document.getElementById('fileImport1').addEventListener('change', function (event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            const text = e.target.result;
            const rows = text.split('\n').map(row => row.split(','));

            // Remove the header row and send the data to the server
            const data = rows.slice(1);
            if (data.length > 0) {
                saveToDatabase(data);
            } else {
                alert('No data found in the selected file.');
            }
        };
        reader.onerror = function () {
            alert('Error reading file. Please try again.');
        };
        reader.readAsText(file);
    } else {
        alert('Please select a file.');
    }
});

function saveToDatabase(data) {
    showLoadingIndicator(true); // Show loading
    fetch('../../process/import_masterlist.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ data: data })
    })
        .then(response => response.json())
        .then(result => {
            alert(result.message);
            // Refresh the data count or table if necessary
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error saving data. Please try again.');
        })
        .finally(() => {
            showLoadingIndicator(false); // Hide loading
        });
}

function showLoadingIndicator(show) {
    // Implement this function to show/hide a loading spinner
    if (show) {
        // Display loading spinner
    } else {
        // Hide loading spinner
    }
}
</script>

<?php include 'plugins/footer.php'; ?>
