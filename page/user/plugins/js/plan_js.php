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


// ------------------------------ Display Data to table -----------------------------------------
function loadData(dateFrom, dateTo) {
    $('#loading2').show();

    $.ajax({
        url: '../../process/fetch_data.php',
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            console.log('Response:', response);

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
                            dates: {},
                            max_plan: item.max_plan
                        };
                    }

                    aggregatedData[key].dates[formattedDate] = item.value;
                    uniqueDates.add(formattedDate);

                    // Log included base products
                    if (!includedBaseProducts.includes(item.base_product)) {
                        includedBaseProducts.push(item.base_product);
                    }
                } else {
                    // Log excluded base products
                    if (!excludedBaseProducts.includes(item.base_product)) {
                        excludedBaseProducts.push(item.base_product);
                    }
                }
            });

            console.log('Included Base Products:', includedBaseProducts);
            console.log('Excluded Base Products:', excludedBaseProducts); 

            uniqueDates = Array.from(uniqueDates).sort((a, b) => new Date(a) - new Date(b));

            header.append('<tr><th>Base Product</th><th>Manufacturing Location</th><th>Customer Manufacturer</th><th>Shipping Location</th><th>Vehicle Type</th><th>Vehicle Type Name</th><th>WH Type</th><th>WH Type Name</th><th>Assy Group Name</th><th>Item</th><th>Internal Item Number</th><th>Line</th><th>Poly Size</th><th>Capacity</th><th>Product Category</th><th>Production Group</th><th>Section</th><th>Circuit</th><th>Initial Process</th><th>Secondary Process</th><th>Later Process</th></tr>');

            uniqueDates.forEach(date => {
                header.find('tr').append(`<th>${date}</th>`); // Corrected line
            });

            header.find('tr').append('<th>Max Plan</th>');

            $.each(aggregatedData, function (key, item) {
                var dateColumns = "";
                var maxPlanValue = 0;  // Initialize max value for the row

                // Loop through each date and generate the date columns
                uniqueDates.forEach(date => {
                    var value = item.dates[date] || 0.00;  // Get the value for the date or 0 if undefined
                    dateColumns += `<td>${value}</td>`;
                    
                    // Check if this value is the highest so far
                    if (value > maxPlanValue) {
                        maxPlanValue = value;
                    }
                });

                // Append the row with the calculated maxPlanValue
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
                        <td style="color: red;">${maxPlanValue}</td>
                    </tr>`
                );
            });

            $('#dataCount3').text('Data Count: ' + includedBaseProducts.length); 
        },
        error: function (xhr, status, error) {
            console.error('Error fetching data:', error);
            console.log('Response text:', xhr.responseText); 
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

    // fetch('../../process/data_check.php')
    //     .then(response => {
    //         if (!response.ok) {
    //             throw new Error('Network response was not ok');
    //         }
    //         return response.json();
    //     })
    //     .then(data => {
    //         if (data.dataExists) {
    //             importButton.disabled = true;
    //         }
    //     })
    //     .catch(error => {
    //         console.error('Error:', error);
    //         swal("Error", "An error occurred while checking data: " + error.message, "error");
    //     });


// The rest of your existing code...





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



</script>