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


                        <button id="emptyPlanBtn" class="btn btn-primary mt-3"
                                style="background-color: #ec0100; border-color: #ec0100; color: white; margin-right: 20px; width: 100%; max-width: 200px;margin-bottom: 30px;">
                                <i class="fas fa-trash"></i>Empty Plan
                            </button>

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
                                <?php include '../../process/fetch_plan.php'; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
$(document).ready(function () {
    $('#extractPlanBtn').on('click', function () {
        let tableData = [];

        $('#accounts_table_res1 tr').each(function () {
            const cells = $(this).find('td');
            if (cells.length > 0) {
                const row = {
                    base_product: cells.eq(1).text().trim(),
                    first_month: cells.eq(-5).text().trim(),
                    second_month: cells.eq(-3).text().trim(),
                    third_month: cells.eq(-1).text().trim()
                };
                tableData.push(row);
            }
        });

        console.log('Total rows to send:', tableData.length);

        const chunkSize = 250;
        const totalChunks = Math.ceil(tableData.length / chunkSize);

        function sendChunk(chunkIndex) {
            if (chunkIndex >= totalChunks) {
                console.log('All data sent successfully!');
                alert("All data saved successfully!"); // Alert user that data is saved
                location.reload(); // Reload the page after all data is saved
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
                        sendChunk(chunkIndex + 1);
                    }
                },
                error: function (xhr, status, error) {
                    console.error('AJAX error:', error);
                }
            });
        }

        sendChunk(0);
    });
});

document.getElementById("emptyPlanBtn").addEventListener("click", function() {
    if (confirm("Are you sure you want to empty the plan?")) {
        fetch("../../process/empty_plan.php", {
            method: "POST"
        }).then(response => response.json())
          .then(data => {
              if (data.success) {
                  alert("Plan emptied successfully!");
                  location.reload(); // Reload the page
              } else {
                  alert("Error: " + data.message);
              }
          }).catch(error => {
              console.error("Error:", error);
          });
    }
});
// Function to check if the plan_2 table is empty
function checkPlanData() {
    fetch("../../process/check_plan_data.php")
        .then(response => response.json())
        .then(data => {
            const extractBtn = document.getElementById("extractPlanBtn");
            extractBtn.disabled = !data.isEmpty; // Disable if data exists
        })
        .catch(error => {
            console.error("Error:", error);
        });
}

// Call the function on page load
window.onload = checkPlanData;


</script>

<?php include 'plugins/footer.php'; ?>