<?php
// Existing code
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
                                <?php include '../../process/fetch_plan.php'; // Include the pivot data ?>
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
  $(document).ready(function () {
    $('#extractPlanBtn').on('click', function () {
        let tableData = [];

        $('#accounts_table_res1 tr').each(function () {
            const cells = $(this).find('td');
            const row = {
                base_product: cells.eq(4).text(),
                first_month: cells.eq(-5).text(),
                second_month: cells.eq(-3).text(),
                third_month: cells.eq(-1).text()
            };
            tableData.push(row);
        });

        console.log('Total rows to send:', tableData.length); // Log total rows

        const chunkSize = 250; // Reduce chunk size to 250
        const totalChunks = Math.ceil(tableData.length / chunkSize);

        function sendChunk(chunkIndex) {
            if (chunkIndex >= totalChunks) {
                console.log('All data sent successfully!');
                return;
            }

            const chunkData = tableData.slice(chunkIndex * chunkSize, (chunkIndex + 1) * chunkSize);

            $.ajax({
                url: '../../process/save_plan.php',
                type: 'POST',
                data: { planData: chunkData },
                success: function (response) {
                    if (response.error) {
                        console.error('Error saving data:', response.details);
                    } else {
                        console.log(`Chunk ${chunkIndex + 1} sent successfully`);
                        sendChunk(chunkIndex + 1); // Send the next chunk
                    }
                },
                error: function (xhr, status, error) {
                    console.error('AJAX error:', error);
                }
            });
        }

        sendChunk(0); // Start sending the first chunk
    });
});

</script>

<?php include 'plugins/footer.php'; ?>