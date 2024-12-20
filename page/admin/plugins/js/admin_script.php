

<?php




if (isset($_SESSION['username'])) {
    $loggedInUser = $_SESSION['username'];
    echo '<script>';
    echo 'document.addEventListener("DOMContentLoaded", function() {';


    echo '});';
    echo '</script>';
}
?>



<style>
.larger-checkbox {
    width: 20px; /* Adjust width as needed */
    height: 20px; /* Adjust height as needed */
}
</style>



<script>

// --------------------------------modal open------------------------
document.getElementById("openModalBtn").addEventListener("click", function() {
     
    });







// -------------------------Clear Button----------------------------------
document.addEventListener("DOMContentLoaded", function() {
    const clearButton = document.querySelector("#addRecordModal .btn-danger");

    clearButton.addEventListener("click", function() {
        const inputs = document.querySelectorAll("#addRecordModal input");
        const selects = document.querySelectorAll("#addRecordModal select");
        const textareas = document.querySelectorAll("#addRecordModal textarea");
        const excludedIds = ['inspected_by', 'inspection_date'];

        inputs.forEach(input => {
            if (!excludedIds.includes(input.id) && input.type !== 'button' && input.type !== 'submit') {
                input.value = '';
            }
        });

        selects.forEach(select => {
            if (!excludedIds.includes(select.id)) {
                select.selectedIndex = 0;
            }
        });

        textareas.forEach(textarea => {
            if (!excludedIds.includes(textarea.id)) {
                textarea.value = '';
            }
        });

        Swal.fire({
            icon: 'success',
            title: 'Form Cleared',
            text: 'All fields have been cleared.',
            showConfirmButton: false,
            timer: 1500
        });
    });
});



// -------------------------------save-------------------------------
function saveData() {
    var form = document.getElementById('myForm');
    var formData = new FormData(form);
    var isEmpty = false;

    // Function to reset the border on input event
    function resetBorder(event) {
        event.target.style.border = ''; // Reset border to default
    }

    // Reset borders and remove input event listeners for text inputs
    form.querySelectorAll('input[type="text"]').forEach(input => {
        input.style.border = ''; // Reset border to default
        input.removeEventListener('input', resetBorder); // Remove any previous listeners to avoid duplication
    });

    // Reset borders for select elements
    form.querySelectorAll('select').forEach(select => {
        select.style.border = ''; // Reset border to default
    });

    // Check text inputs for empty values
    form.querySelectorAll('input[type="text"]').forEach(input => {
        if (input.value.trim() === "") {
            isEmpty = true;
            input.style.border = '1px solid red'; // Highlight empty field

            // Add event listener to reset border when user starts typing
            input.addEventListener('input', resetBorder);
        }
    });

    // Check select elements for not being picked
    form.querySelectorAll('select').forEach(select => {
        if (select.value.trim() === "") {
            isEmpty = true;
            select.style.border = '1px solid red'; // Highlight empty field
        }
    });

    if (isEmpty) {
        Swal.fire({
            position: 'center',
            icon: 'warning',
            title: 'Please fill out all required fields!',
            showConfirmButton: true
        });
        return;
    }

    // Adjusted fetch request to point to the correct PHP script for MS SQL Server
    fetch('../../process/add_account.php', {
        method: 'POST',
        body: formData
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.text();
    })
    .then(data => {
        console.log(data);

        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Your work has been saved',
            showConfirmButton: false,
            timer: 1500
        });

        setTimeout(function() {
            window.location.reload();
        }, 1600);
    })
    .catch(error => {
        console.error('Error:', error);

        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Oops...',
            text: 'There was an error saving the data.',
            timer: 1500
        });
    });
}


// ---------------------------------------------------Populate the table COT Start Point---------------------------------------------------


document.addEventListener('DOMContentLoaded', () => {
    let offset = 0;
    const limit = 10;

    // Load initial table data
    loadTableData(offset, limit);

    
    // // Infinite scroll event
    // document.getElementById('accounts_table_res').addEventListener('scroll', () => {
    //     const container = document.getElementById('accounts_table_res');
    //     if (container.scrollTop + container.clientHeight >= container.scrollHeight) {
    //         offset += limit;
    //         loadTableData(offset, limit, document.getElementById('searchBox').value.trim());
    //     }
    // });

    // Search button event
    // document.getElementById('searchReqBtn').addEventListener('click', () => {
    //     offset = 0; // Reset offset for new search
    //     loadTableData(offset, limit, document.getElementById('searchBox').value.trim());
    // });
});



function loadTableData(offset, limit, search = '') {
    fetch(`../../process/accounts.php?offset=${offset}&limit=${limit}&search=${encodeURIComponent(search)}`)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {

            data.sort((a, b) => a.id - b.id);

            if (offset === 0) {
                document.getElementById('admin_body').innerHTML = ''; 
            }
            populateTable(data);

            if (data.length < limit) {
                document.getElementById('btnLoadMore').style.display = 'none';
            } else {
                document.getElementById('btnLoadMore').style.display = 'block';
            }
        })
        .catch(error => console.error('Error fetching data:', error));
}
// -----------------------------populate table-------------------
let allData = [];

function loadTableData(search = '') {
    fetch(`../../process/accounts.php?search=${encodeURIComponent(search)}`)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            // Sort data by ID
            data.sort((a, b) => a.id - b.id);

            // Store the data in allData
            allData = data;

            // Populate the table
            populateTable(allData);
        })
        .catch(error => console.error('Error fetching data:', error));
}

function populateTable(data) {
    const tbody = document.getElementById('admin_body');

    // Clear the existing table rows
    tbody.innerHTML = '';

    // Populate table rows
    data.forEach(row => {
        const newRow = tbody.insertRow();

        const empIdCell = newRow.insertCell();
        const fullNameCell = newRow.insertCell();
        const usernameCell = newRow.insertCell();
        const departmentCell = newRow.insertCell();
        const passwordCell = newRow.insertCell();
        const typeCell = newRow.insertCell();
        const deleteCell = newRow.insertCell();

        empIdCell.textContent = row.emp_id;
        fullNameCell.textContent = row.full_name;
        usernameCell.textContent = row.username;
        departmentCell.textContent = row.department;
        passwordCell.textContent = row.password;
        typeCell.textContent = row.type;

        const checkbox = document.createElement('input');
        checkbox.type = 'checkbox';
        checkbox.className = 'larger-checkbox';
        checkbox.name = 'deleteRow[]';
        checkbox.value = row.username;

        if (row.type === 'admin') {
            checkbox.disabled = true;
        }

        deleteCell.appendChild(checkbox);

        checkbox.addEventListener('click', function(event) {
            event.stopPropagation();
        });
    });
}118250

loadTableData();



document.getElementById('deleteBtn').addEventListener('click', function() {

    const checkboxes = document.querySelectorAll('input[name="deleteRow[]"]:checked');

    const usernamesToDelete = Array.from(checkboxes).map(checkbox => checkbox.value);

    Swal.fire({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this data!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "Cancel"
    })
    .then((result) => {
        if (result.isConfirmed) {

            deleteData(usernamesToDelete);
        }
    });
});
$(document).ready(function() {

    $('#admin_body').on('click', 'tr', function(e) {
        const cells = $(this).find('td');

        const emp_id = cells[0].textContent.trim(); 
        const fullName = cells[1].textContent.trim(); 
        const username = cells[2].textContent.trim();
        const department = cells[3].textContent.trim(); 
        const password = cells[4].textContent.trim(); 
        const type = cells[5].textContent.trim(); 


        $('#editEmp_id').val(emp_id); // Assuming you have an input for empId in the modal
        $('#editFullName').val(fullName); // Assuming you have an input for fullName in the modal
        $('#editUsername').val(username);
        $('#editDepartment').val(department); // Assuming you have an input for department in the modal
        $('#editPassword').val(password);
        $('#editType').val(type);

        // Show modal using jQuery
        $('#editRecordModal').modal('show');
    });
});



function deleteData(usernames) {
    // AJAX request to delete data
    fetch('../../process/delete_data.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ usernames: usernames }),
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        // Handle success response if needed
        console.log('Data deleted successfully:', data);
        // Show success message with SweetAlert
        Swal.fire({
            title: "Success!",
            text: "Data has been deleted successfully!",
            icon: "success",
            confirmButtonText: "OK"
        }).then((result) => {
            if (result.isConfirmed) {
                // Reload the page when OK is clicked
                location.reload();
            }
        });
    })
    .catch(error => {
        console.error('Error deleting data:', error);
        // Show error message with SweetAlert
        Swal.fire("Error!", "Failed to delete data. Please try again later.", "error");
    });
}




    </script>