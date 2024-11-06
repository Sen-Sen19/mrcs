

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

    // Load more button event
    document.getElementById('btnLoadMore').addEventListener('click', () => {
        offset += limit;
        loadTableData(offset, limit);
    });

    // Infinite scroll event
    document.getElementById('accounts_table_res').addEventListener('scroll', () => {
        const container = document.getElementById('accounts_table_res');
        if (container.scrollTop + container.clientHeight >= container.scrollHeight) {
            offset += limit;
            loadTableData(offset, limit, document.getElementById('searchBox').value.trim());
        }
    });

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
            // Sort data by 'id'
            data.sort((a, b) => a.id - b.id);

            if (offset === 0) {
                document.getElementById('admin_body').innerHTML = ''; // Clear table for new search results
            }
            populateTable(data);

            // Hide 'Load more' button if all data is loaded
            if (data.length < limit) {
                document.getElementById('btnLoadMore').style.display = 'none';
            } else {
                document.getElementById('btnLoadMore').style.display = 'block';
            }
        })
        .catch(error => console.error('Error fetching data:', error));
}
// -----------------------------populate table-------------------
let allData = []; // Array to hold all fetched data

function loadTableData(offset, limit, search = '') {
    fetch(`../../process/accounts.php?offset=${offset}&limit=${limit}&search=${encodeURIComponent(search)}`)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            // Sort data by 'id'
            data.sort((a, b) => a.id - b.id);
            
            // Append new data to allData
            allData = allData.concat(data);

            // Populate table with the updated allData
            populateTable(allData);

            // Hide 'Load more' button if all data is loaded
            if (data.length < limit) {
                document.getElementById('btnLoadMore').style.display = 'none';
            } else {
                document.getElementById('btnLoadMore').style.display = 'block';
            }
        })
        .catch(error => console.error('Error fetching data:', error));
}

function populateTable(data) {
    const tbody = document.getElementById('admin_body');

    // Clear existing rows
    tbody.innerHTML = '';

    // Loop through each row of data
    data.forEach(row => {
        // Create a new row in the table body
        const newRow = tbody.insertRow();

        // Insert cells for each column
        const empIdCell = newRow.insertCell();
        const fullNameCell = newRow.insertCell();
        const usernameCell = newRow.insertCell();
        const departmentCell = newRow.insertCell();
        const passwordCell = newRow.insertCell();
        const typeCell = newRow.insertCell();
        const deleteCell = newRow.insertCell(); // Cell for Delete checkbox

        // Populate cell contents with data from the row object
        empIdCell.textContent = row.emp_id; // Employee ID
        fullNameCell.textContent = row.full_name; // Full Name
        usernameCell.textContent = row.username; // Username
        departmentCell.textContent = row.department; // Department
        passwordCell.textContent = row.password; // Password
        typeCell.textContent = row.type; // Type

        // Create a checkbox element for the Delete column
        const checkbox = document.createElement('input');
        checkbox.type = 'checkbox';
        checkbox.className = 'larger-checkbox'; // Add a class for styling
        checkbox.name = 'deleteRow[]'; // Use array syntax for PHP form handling if multiple checkboxes
        checkbox.value = row.username; // Use a unique identifier from your data (e.g., username) as the value

        // Disable checkbox for 'admin' type
        if (row.type === 'admin') {
            checkbox.disabled = true;
        }

        // Append checkbox to the Delete cell
        deleteCell.appendChild(checkbox);

        // Add event listener to the checkbox
        checkbox.addEventListener('click', function(event) {
            event.stopPropagation(); // Stop propagation of the click event
        });
    });
}

// Assuming there's a delete button in your HTML with id 'deleteBtn'
document.getElementById('deleteBtn').addEventListener('click', function() {
    // Get all checkboxes named 'deleteRow[]'
    const checkboxes = document.querySelectorAll('input[name="deleteRow[]"]:checked');

    // Create an array to store usernames of rows to delete
    const usernamesToDelete = Array.from(checkboxes).map(checkbox => checkbox.value);

    // Show SweetAlert confirmation dialog
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
            // Perform AJAX request to delete data
            deleteData(usernamesToDelete);
        }
    });
});
$(document).ready(function() {
    // Add event listener to table rows to open modal with data
    $('#admin_body').on('click', 'tr', function(e) {
        const cells = $(this).find('td');

        // Get data from cells
        const emp_id = cells[0].textContent.trim(); // Employee ID from the first column
        const fullName = cells[1].textContent.trim(); // Full Name from the second column
        const username = cells[2].textContent.trim(); // Username from the third column
        const department = cells[3].textContent.trim(); // Department from the fourth column
        const password = cells[4].textContent.trim(); // Password from the fifth column
        const type = cells[5].textContent.trim(); // Type from the sixth column

        // Populate modal fields
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