<?php include 'plugins/navbar.php'; ?>
<?php include 'plugins/sidebar/admin_bar.php'; ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">

            <div class="tab-content" id="excelTabContent">
                <div class="tab-pane fade show active" id="file1" role="tabpanel" aria-labelledby="file1-tab">

                    <div class="card card-gray-dark card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Accounts</h3>
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
                                        <div class="row" style="margin-bottom: 20px;">

                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" placeholder="Username"
                                                    style="height: 31px; font-size: 14px;" />
                                            </div>


                                            <div class="col-sm-2">
                                                <button type="button" class="btn btn-primary w-100"
                                                    style="height: 31px; font-size: 14px;"> <i
                                                        class="fas fa-search mr-2"></i>Search</button>
                                            </div>

                                      

                                            <div class="col-sm-2">
                                                <button type="button" class="btn btn-danger w-100"
                                                    style="height: 31px; font-size: 14px;"> <i
                                                        class="fas fa-trash mr-2"></i>Delete</button>
                                            </div>
                                            <div class="col-sm-2">
                                                <button type="button" class="btn btn-success w-100"
                                                    style="height: 31px; font-size: 14px;" data-toggle="modal"
                                                    data-target="#editModal">
                                                    <i class="fas fa-plus mr-2"></i>Add
                                                </button>

                                            </div>
                                        </div>
                                        <tr>

                                            <th>ID</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Role</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
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



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>



<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Employee Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editForm">
                    <div class="form-group">
                        <label for="editID">ID</label>
                        <input type="text" class="form-control" id="editID" name="ID" readonly>
                    </div>

                    <div class="form-group">
                        <label for="editUsername">Username</label>
                        <input type="text" class="form-control" id="editUsername" name="Username">
                    </div>
                    <div class="form-group">
                        <label for="editPassword">Password</label>
                        <input type="text" class="form-control" id="editPassword" name="Password">
                    </div>
                    <div class="form-group">
                        <label for="editType">Type</label>
                        <select class="form-control" id="editType" name="Type">
                            <option value="User">User</option>
                            <option value="Admin">Admin</option>
                        </select>
                    </div>


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveChanges">Save changes</button>
            </div>
        </div>
    </div>
</div>


<script>

    function fetchAndRenderTable() {
        fetch('../../process/accounts.php')
            .then(response => response.json())
            .then(data => {
                const tbody = document.getElementById('table_body1');
                tbody.innerHTML = '';

                if (!Array.isArray(data)) {
                    console.error('Data is not an array:', data);
                    return;
                }

                data.forEach(row => {
                    const tr = document.createElement('tr');
                    tr.innerHTML = `
                    <td>${row.id}</td>
                    <td>${row.username}</td>
                    <td>${row.password}</td>
                    <td>${row.type}</td>
                   <td class="action-column"><input type="checkbox" class="employee-checkbox" data-employee-no="${row.EmployeeNo}"></td>

                `;


                    tr.addEventListener('click', (event) => {

                        if (!event.target.closest('td').classList.contains('action-column')) {
                            openEditModal(row);
                        }
                    });

                    tbody.appendChild(tr);
                });
                document.getElementById('dataCount1').textContent = `Data Count: ${data.length}`;
            })
            .catch(error => console.error('Error fetching data:', error));
    }
    function openEditModal(row) {
        document.getElementById('editID').value = row.id;
        document.getElementById('editUsername').value = row.username;
        document.getElementById('editPassword').value = row.password;
        document.getElementById('editType').value = row.type;

        $('#editModal').modal('show');
    }
    function clearForm() {
        document.getElementById('editID').value = '';
        document.getElementById('editUsername').value = '';
        document.getElementById('editPassword').value = '';
        document.getElementById('editType').value = 'User';
    }
    function saveChanges() {
        const editForm = document.getElementById('editForm');
        const formData = new FormData(editForm);

        fetch('../../process/add_account.php', {
            method: 'POST',
            body: formData
        })
            .then(response => response.json())
            .then(result => {
                if (result.success) {
                    $('#editModal').modal('hide');
                    Swal.fire({
    icon: 'success',
    title: 'Success',
    text: 'Data saved successfully!',
    showConfirmButton: false,
    timer: 1500
}).then(() => {
    fetchAndRenderTable();
    location.reload();
});

                } else {
                    console.error('Error updating data:', result.error);
                }
            })
            .catch(error => console.error('Error saving changes:', error));
    }
    fetchAndRenderTable();
    document.getElementById('saveChanges').addEventListener('click', saveChanges);
    function fetchNextID() {
        fetch('../../process/add_account.php')
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('editID').value = data.nextID;
                } else {
                    console.error('Error fetching next ID:', data.error);
                }
            })
            .catch(error => console.error('Error:', error));
    }
    document.querySelector('[data-target="#editModal"]').addEventListener('click', function () {
        clearForm();
        fetchNextID();
    });

    document.querySelector('.btn-danger').addEventListener('click', deleteSelected);

  
</script>

<?php include 'plugins/admin_footer.php'; ?>
<?php include 'plugins/js/admin_script.php'; ?>