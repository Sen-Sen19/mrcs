<?php include 'plugins/navbar.php'; ?>
<?php include 'plugins/sidebar/admin_bar.php'; ?>


<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6"></div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item active">Admin</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-gray-dark card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="nav-icon fas fa-user"></i> ADMIN
                            </h3>



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
                            <div class="row mb-2">
                            </div>

                            <div class="row mt-1 align-items-center">
                                <div class="col-md-2 d-flex justify-content-center">
                                    <button class="btn btn-success custom-btn" id="openModalBtn" data-toggle="modal"
                                        data-target="#addRecordModal" style="height: 35px; width: 100%;">
                                        <i class="fas fa-plus mr-2"></i>Add Account
                                    </button>
                                </div>
                                <div class="col-md-2 d-flex justify-content-center">
                                    <button class="btn btn-danger custom-btn" id="deleteBtn"
                                        style="height: 35px; width: 100%;">
                                        <i class="fas fa-trash mr-2"></i>Delete
                                    </button>
                                </div>

                            </div>
                        </div>





                        <div id="accounts_table_res" class="table-responsive"
                            style="height: 45vh; overflow: auto; display: inline-block; margin-top: 20px; border-top: 1px solid gray;">
                            <table id="account" class="table table-sm table-head-fixed text-nowrap table-hover">
                            <thead style="text-align: center;">
    <tr>
        <th onclick="sortTable(0)">Employee ID</th>
        <th onclick="sortTable(1)">Full Name</th>
        <th onclick="sortTable(2)">User Name</th>
        <th onclick="sortTable(3)">Department</th>
        <th onclick="sortTable(4)">Password</th>
        <th onclick="sortTable(5)">Type</th>
        <th>Select</th>
    </tr>
</thead>

                                <tbody id="admin_body" style="text-align: center; padding:10px;">

                                </tbody>
                            </table>
                        </div>
                     
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
</div>




<div class="modal fade" id="editRecordModal" tabindex="-1" role="dialog" aria-labelledby="editRecordModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editRecordModalLabel">Edit Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editForm">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <label for="editEmp_id">Employee ID</label>
                            <input type="text" class="form-control" id="editEmp_id" name="emp_id" required readonly>
                        </div>

                        <div class="col-md-4 form-group">
                            <label for="editUsername">Username</label>
                            <input type="text" class="form-control" id="editUsername" name="username" required readonly>
                        </div>

                        <div class="col-md-4 form-group">
                            <label for="editFullName">Full Name</label>
                            <input type="text" class="form-control" id="editFullName" name="full_name" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <label for="editDepartment">Department</label>
                            <input type="text" class="form-control" id="editDepartment" name="department" required>
                        </div>

                        <div class="col-md-4 form-group">
                            <label for="editPassword">Password</label>
                            <input type="text" class="form-control" id="editPassword" name="newPassword" required>
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="editType">Type</label>
                            <select class="form-control" id="editType" name="type" required>
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary"
                        style="background-color: #007bff; border-color: #007bff; color:white;"
                        onclick="saveChanges()">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>




<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>


<script>
    $(document).ready(function () {
        $('#openModalBtn').click(function () {

        });
    });

    function saveChanges() {
        var empId = $('#editEmp_id').val();
        var username = $('#editUsername').val();
        var newPassword = $('#editPassword').val();
        var fullName = $('#editFullName').val();
        var department = $('#editDepartment').val();
        var type = $('#editType').val();

        $.ajax({
            url: '../../process/update_password.php',
            method: 'POST',
            data: {
                emp_id: empId,
                username: username,
                newPassword: newPassword,
                full_name: fullName,
                department: department,
                type: type
            },
            success: function (response) {
                if (response.startsWith('Error')) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response
                    });
                } else {
                    Swal.fire({
                        icon: 'success',
                        title: 'Account updated successfully!',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function () {
                        $('#editRecordModal').modal('hide');
                        location.reload();
                    });
                }
            },
            error: function (xhr, status, error) {
                console.error('Error updating account:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Failed to update account. Please try again later.'
                });
            }
        });
    }


    function sortTable(columnIndex) {
    var table = document.getElementById("account");
    var tbody = table.querySelector("tbody");
    var rows = Array.from(tbody.rows);

    // Determine the current sort direction
    var currentDirection = tbody.getAttribute("data-sort-dir") || "asc";
    var newDirection = currentDirection === "asc" ? "desc" : "asc";
    tbody.setAttribute("data-sort-dir", newDirection);

    // Sort rows
    rows.sort(function (rowA, rowB) {
        var cellA = rowA.cells[columnIndex].innerText.trim().toLowerCase();
        var cellB = rowB.cells[columnIndex].innerText.trim().toLowerCase();

        if (!isNaN(cellA) && !isNaN(cellB)) {
            // Sort numerically if the content is numeric
            cellA = parseFloat(cellA);
            cellB = parseFloat(cellB);
        }

        if (newDirection === "asc") {
            return cellA > cellB ? 1 : cellA < cellB ? -1 : 0;
        } else {
            return cellA < cellB ? 1 : cellA > cellB ? -1 : 0;
        }
    });

    // Rebuild table body with sorted rows
    tbody.innerHTML = "";
    rows.forEach(row => tbody.appendChild(row));
}
</script>

<?php include 'plugins/admin_footer.php'; ?>
<?php include 'plugins/js/admin_script.php'; ?>

</body>

</html>