<script>

    function exportToExcel(tableBodyId, fileName) {
        const tableBody = document.getElementById(tableBodyId);
        const rows = tableBody.querySelectorAll('tr');
        const data = [];
        rows.forEach(row => {
            const cells = row.querySelectorAll('td');
            const rowData = Array.from(cells).map(cell => cell.textContent);
            data.push(rowData);
        });
        const ws = XLSX.utils.aoa_to_sheet(data);
        const wb = XLSX.utils.book_new();
        XLSX.utils.book_append_sheet(wb, ws, 'Sheet1');

        XLSX.writeFile(wb, `${fileName}.xlsx`);
    }


    function loadData(dateFrom, dateTo) {
    $('#loading2').show();

    $.ajax({
        url: '../../process/fetch_data.php',
        type: 'GET',
        dataType: 'json',
        success: function (response) {
        
            var tableBody = $('#table_body3');
            var header = $('#header_table3 thead');
            tableBody.empty();
            header.empty();

            var aggregatedData = {};
            var excludedBaseProducts = [];  
            var includedBaseProducts = []; 
            var uniqueDates = new Set();

            // Convert date strings to Date objects for comparison
            const fromDate = dateFrom ? new Date(dateFrom) : null;
            const toDate = dateTo ? new Date(dateTo) : null;

            $.each(response, function (index, item) {
                const itemDate = new Date(item.date);
                const formattedDate = itemDate.toLocaleDateString(undefined, {
                    year: 'numeric',
                    month: '2-digit',
                    day: '2-digit'
                });

                if (itemDate >= fromDate && itemDate <= toDate) {
                    var key = item.base_product + "|" + item.manufacturing_location;
                    
                    if (!aggregatedData[key]) {
                        aggregatedData[key] = {
                            base_product: item.base_product,
                            manufacturing_location: item.manufacturing_location,
                            customer_manufacturer: item.customer_manufacturer,
                            shipping_location: item.shipping_location,
                            vehicle_type: item.vehicle_type,
                            vehicle_type_name: item.vehicle_type_name,
                            wh_type: item.wh_type,
                            wh_type_name: item.wh_type_name,
                            assy_group_name: item.assy_group_name,
                            item: item.item,
                            internal_item_number: item.internal_item_number,
                            line: item.line,
                            poly_size: item.poly_size,
                            capacity: item.capacity,
                            product_category: item.product_category,
                            production_grp: item.production_grp,
                            section: item.section,
                            circuit: item.circuit,
                            initial_process: item.initial_process,
                            secondary_process: item.secondary_process,
                            later_process: item.later_process,
                            dates: {}
                        };
                    }

                    aggregatedData[key].dates[formattedDate] = item.value;
                    uniqueDates.add(formattedDate);

                    // Log included base products
                  
                }
            });

        

            uniqueDates = Array.from(uniqueDates).sort((a, b) => new Date(a) - new Date(b));

            header.append('<tr><th>Base Product</th><th>Manufacturing Location</th><th>Customer Manufacturer</th><th>Shipping Location</th><th>Vehicle Type</th><th>Vehicle Type Name</th><th>WH Type</th><th>WH Type Name</th><th>Assy Group Name</th><th>Item</th><th>Internal Item Number</th><th>Line</th><th>Poly Size</th><th>Capacity</th><th>Product Category</th><th>Production Group</th><th>Section</th><th>Circuit</th><th>Initial Process</th><th>Secondary Process</th><th>Later Process</th></tr>');

            uniqueDates.forEach(date => {
                header.find('tr').append(`<th>${date}</th>`); // Corrected line
            });

            $.each(aggregatedData, function (key, item) {
                var dateColumns = "";

                // Loop through each date and generate the date columns
                uniqueDates.forEach(date => {
                    var value = parseFloat(item.dates[date] || 0.00);  // Parse value as float or use 0 if undefined
                    dateColumns += `<td>${value.toFixed(2)}</td>`;  // Ensure value is formatted to 2 decimal places
                });

                // Append the row without max plan value
                tableBody.append(
                    `<tr>
                        <td>${item.base_product}</td>
                        <td>${item.manufacturing_location}</td>
                        <td>${item.customer_manufacturer}</td>
                        <td>${item.shipping_location}</td>
                        <td>${item.vehicle_type}</td>
                        <td>${item.vehicle_type_name}</td>
                        <td>${item.wh_type}</td>
                        <td>${item.wh_type_name}</td>
                        <td>${item.assy_group_name}</td>
                        <td>${item.item}</td>
                        <td>${item.internal_item_number}</td>
                        <td>${item.line}</td>
                        <td>${item.poly_size}</td>
                        <td>${item.capacity}</td>
                        <td>${item.product_category}</td>
                        <td>${item.production_grp}</td>
                        <td>${item.section}</td>
                        <td>${item.circuit}</td>
                        <td>${item.initial_process}</td>
                        <td>${item.secondary_process}</td>
                        <td>${item.later_process}</td>
                        ${dateColumns}
                    </tr>`
                );
            });

            $('#dataCount3').text('Data Count: ' + includedBaseProducts.length); 
        },
        error: function (xhr, status, error) {
            console.error('Error fetching data:', error);
  
        
        },
        complete: function () {
            $('#loading2').hide();
        }
    });
}

// Add event listener to the search button
$('#searchButton').on('click', function () {
    const dateFrom = $('#date_from_search_defect').val();
    const dateTo = $('#date_to_search_defect').val();

    if (dateFrom && dateTo) {
        loadData(dateFrom, dateTo);
    } else {
        alert('Please select both dates.');
    }
});

$(document).ready(function () {
    loadData(); // Initial load without filters
}); 
// ---------------------------------render upload --------------------------------------
let import1Data = null;
let firstMonthMap = new Map();
document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('importButton3').addEventListener('click', function () {
        document.getElementById('fileImport3').click();
    });
    document.getElementById('fileImport3').addEventListener('change', function (e) {
        handleFileUpload3(e);
    });
});

function handleFileUpload3(event) {
    const file = event.target.files[0];
    if (!file) return;
    document.getElementById('loading').style.display = 'block';
    const reader = new FileReader();
    reader.onload = function (e) {
        const data = new Uint8Array(e.target.result);
        const workbook = XLSX.read(data, { type: 'array' });
        const worksheet = workbook.Sheets[workbook.SheetNames[0]];
        const jsonData = XLSX.utils.sheet_to_json(worksheet, { header: 1, raw: false });
        
        if (jsonData.length === 0) {
            document.getElementById('loading').style.display = 'none';
            return;
        }
        
        const header = jsonData[0];
        const dataRows = jsonData.slice(1);
        const filteredData = dataRows.filter(row => row[10] !== '' && row[10] !== undefined && row[10] !== null);
        const dataToSave = [];
        const dates = header.slice(22);
        
        filteredData.forEach(row => {
            const manufacturingLocationCode = row[0];
            const customerManufacturerCode = row[1];
            const shippingLocation = row[2];
            const vehicleType = row[3];
            const vehicleTypeName = row[4];
            const whType = row[5];
            const whTypeName = row[6];
            const assyGroupName = row[7];
            const item = row[8];
            const basicItemNumber = row[9];
            const internalItemNumber = row[10];
            const line = row[12];
            const polySize = row[13];
            const capacity = row[14];
            const productCategory = row[15];
            const productionGrp = row[16];
            const section = row[17];
            const circuit = row[18];
            const initialProcess = row[19];
            const secondaryProcess = row[20];
            const laterProcess = row[21];

            dates.forEach((date, index) => {
                const value = parseFloat(row[22 + index]) || 0;
                if (value !== 0) {
                    dataToSave.push({
                        base_product: row[10],
                        date: date,
                        value: value,
                        manufacturing_location: manufacturingLocationCode,
                        customer_manufacturer: customerManufacturerCode,
                        shipping_location: shippingLocation,
                        vehicle_type: vehicleType,
                        vehicle_type_name: vehicleTypeName,
                        wh_type: whType,
                        wh_type_name: whTypeName,
                        assy_group_name: assyGroupName,
                        item: item,
                        basic_item_number: basicItemNumber,
                        internal_item_number: internalItemNumber,
                        line: line,
                        poly_size: polySize,
                        capacity: capacity,
                        product_category: productCategory,
                        production_grp: productionGrp,
                        section: section,
                        circuit: circuit,
                        initial_process: initialProcess,
                        secondary_process: secondaryProcess,
                        later_process: laterProcess
                    });
                }
            });
        });

        fetch('../../process/save_data.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(dataToSave)
        })
            .then(response => response.text())
            .then(result => {

            })
            .catch(error => {

            })
            .finally(() => {
                document.getElementById('loading').style.display = 'none';
            });
    };
    reader.readAsArrayBuffer(file);
}

function renderUpload3(data, tableBodyId, selectedBaseProduct, selectedStartDate, selectedEndDate) {
    const tableBody = document.getElementById(tableBodyId);
    tableBody.innerHTML = '';
    const dateRange = [];

    // Generate date range array
    for (let date = new Date(selectedStartDate); date <= new Date(selectedEndDate); date.setDate(date.getDate() + 1)) {
        dateRange.push(date.toISOString().split('T')[0]);
    }

    // Filter data based on the selected base product and date range
    const filteredData = data.filter(row => {
        return (row.base_product === selectedBaseProduct) &&
               (dateRange.includes(row.date));
    });

    // Create table rows based on filtered data
    filteredData.forEach(row => {
        const newRow = document.createElement('tr');
        const dateCell = document.createElement('td');
        dateCell.textContent = row.date;
        newRow.appendChild(dateCell);

        // Append other relevant cells based on your data structure
        const valueCell = document.createElement('td');
        valueCell.textContent = row.value.toFixed(2);
        newRow.appendChild(valueCell);

        // Add other cells as needed...

        tableBody.appendChild(newRow);
    });

    // Optional: If no data is found, display a message
    if (filteredData.length === 0) {
        const noDataRow = document.createElement('tr');
        const noDataCell = document.createElement('td');
        noDataCell.colSpan = 2; // Adjust colspan based on your table structure
        noDataCell.textContent = 'No data available for the selected filters.';
        noDataRow.appendChild(noDataCell);
        tableBody.appendChild(noDataRow);
    }
}


// --------------------------------Update Masterlist-----------------------------------
$(document).ready(function () {
        $('#update_masterlist').on('click', function () {
            Swal.fire({
                title: "Are you sure?",
                text: "Update Masterlist? This action can be undone, but it may require significant effort!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, update it!",
                cancelButtonText: "Cancel"
            }).then((result) => {
                if (result.isConfirmed) {
                 
                    $.ajax({
                        url: '../../process/update_masterlist.php', 
                        method: 'POST',
                        data: {
                            action: 'update_masterlist' 
                        },
                        success: function (response) {
                            Swal.fire("Updated!", "Masterlist updated successfully!", "success");
                            window.location.href = 'masterlist.php'; 
                        },
                        error: function (xhr, status, error) {
                            Swal.fire("Error!", "Error updating masterlist: " + error, "error");
                        }
                    });
                } else {
                    Swal.fire("Cancelled", "Update has been cancelled.", "error");
                }
            });
        });
    });



    // ----------------------------------- Disabled import button---------------------------
    

$(document).ready(function() {
    // Function to check data in plan_from_pc table
    function checkData() {
        $.ajax({
            url: '../../process/check_data.php',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    // Enable or disable the save button based on the count
                    if (response.count > 0) {
                        $('#importButton3').prop('disabled', true); // Disable if data exists
                    } else {
                        $('#importButton3').prop('disabled', false); // Enable if no data
                    }
                } else {
                    console.error("Error checking data: ", response.message);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error("AJAX Error: ", textStatus, errorThrown); // Log any error details
            }
        });
    }

    // Call the function on document ready
    checkData();

    $('#emptyPlan').click(function() {
        // Show confirmation dialog using SweetAlert
        Swal.fire({
            title: 'Are you sure?',
            text: "Do you want to empty the table?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, empty it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Make AJAX call to empty_plan.php
                $.ajax({
                    url: '../../process/empty_plan.php',
                    type: 'POST',
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'success') {
                            Swal.fire(
                                'Emptied!',
                                response.message,
                                'success'
                            );
                            checkData(); // Re-check data after emptying
                        } else {
                            Swal.fire(
                                'Error!',
                                response.message,
                                'error'
                            );
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error("AJAX Error: ", textStatus, errorThrown); // Log any error details
                        Swal.fire(
                            'Error!',
                            'An error occurred while processing your request. ' + errorThrown,
                            'error'
                        );
                    }
                });
            }
        });
    });
});

// ---------------------------------------save button --------------------------------------------------

    document.addEventListener("DOMContentLoaded", function () {
        // Add event listener to save button
        document.getElementById("saveButton").addEventListener("click", function () {
            saveData();
        });
    });
    function saveData() {
    let table = document.querySelector('#accounts_table_res2 table'); // Corrected line
    if (!table) {
        alert('Table not found');
        return;
    }

    let rows = table.getElementsByTagName('tbody')[0].rows;
    let dataToSend = [];

    // Loop through each row
    for (let i = 0; i < rows.length; i++) {
        let row = rows[i];
        let baseData = [];

        // Extract the static columns (first 21 columns)
        for (let j = 0; j < 21; j++) {
            baseData.push(row.cells[j].innerText.trim()); // Trim to remove extra spaces
        }

        // Extract the dynamic date columns and transform into rows
        for (let j = 21; j < row.cells.length; j++) {
            let dateValue = table.rows[0].cells[j].innerText.trim(); // Date from header row
            let value = row.cells[j].innerText.trim(); // Value from the row's cell

            // Log the date value for debugging
            console.log('Date Value:', dateValue);

            // Validate the date value
            let date = new Date(dateValue);
            if (isNaN(date.getTime())) { // Check if date is valid
                alert('Invalid date format: ' + dateValue);
                return;
            }

            // Convert date to YYYY-MM-DD format
            let formattedDate = date.toISOString().split('T')[0];

            // Push the base data + date + value into dataToSend array
            dataToSend.push({
                base_product: baseData[0],
                manufacturing_location: baseData[1],
                customer_manufacturer: baseData[2],
                shipping_location: baseData[3],
                vehicle_type: baseData[4],
                vehicle_type_name: baseData[5],
                wh_type: baseData[6],
                wh_type_name: baseData[7],
                assy_group_name: baseData[8],
                item: baseData[9],
                internal_item_number: baseData[10],
                line: baseData[11],
                poly_size: baseData[12],
                capacity: baseData[13],
                product_category: baseData[14],
                production_grp: baseData[15],
                section: baseData[16],
                circuit: baseData[17],
                initial_process: baseData[18],
                secondary_process: baseData[19],
                later_process: baseData[20],
                date: formattedDate, // Use the formatted date
                value: value
            });
        }
    }

    if (dataToSend.length === 0) {
        alert('No data to save');
        return;
    }

    // Send the data to PHP via AJAX
    let xhr = new XMLHttpRequest();
    xhr.open('POST', '../../process/save_plan_date.php', true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.onload = function () {
        if (xhr.status === 200) {
            alert('Data saved successfully!');
        } else {
            alert('Error saving data! Status code: ' + xhr.status);
        }
    };
    console.log('Total records to be saved:', dataToSend.length);
    xhr.send(JSON.stringify(dataToSend));
}

</script>