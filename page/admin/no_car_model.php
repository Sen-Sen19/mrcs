<?php
include 'plugins/navbar.php';
include 'plugins/sidebar/admin_bar.php';

// Database connection
$serverName = "172.25.115.167\SQLEXPRESS";
$connectionOptions = array(
    "Database" => "live_mrcs_db",
    "Uid" => "sa",
    "PWD" => '#Sy$temGr0^p|115167'
);
$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Fetch data from the database
$sql = "SELECT base_product, added_by FROM dbo.no_car_model";
$query = sqlsrv_query($conn, $sql);

if ($query === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Organize data by 'added_by' to display in columns
$data = [];
while ($row = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)) {
    $data[$row['added_by']][] = $row['base_product'];
}

// Close the connection
sqlsrv_close($conn);

// Prepare the HTML table with data
?>

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-gray-dark card-outline">
                        <div class="card-body">
                            <div id="accounts_table_res" class="table-responsive" style="height: 70vh; overflow: auto; display: inline-block; margin-top: 20px; border-top: 1px solid gray;">
                                <table id="account" class="table table-sm table-head-fixed text-nowrap table-hover">
                                    <thead>
                                        <tr>
                                            <!-- Dynamic column headers -->
                                            <?php foreach ($data as $user => $products): ?>
                                                <th><?php echo htmlspecialchars($user); ?></th>
                                            <?php endforeach; ?>
                                        </tr>
                                    </thead>
                                    <tbody id="admin_body" style="text-align: left;">
                                        <!-- Dynamic rows -->
                                        <?php
                                        $maxRows = max(array_map('count', $data)); // Get the maximum number of rows
                                        for ($i = 0; $i < $maxRows; $i++): ?>
                                            <tr>
                                                <!-- Display data in each column -->
                                                <?php foreach ($data as $user => $products): ?>
                                                    <td><?php echo isset($products[$i]) ? htmlspecialchars($products[$i]) : ''; ?></td>
                                                <?php endforeach; ?>
                                            </tr>
                                        <?php endfor; ?>
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

<?php include 'plugins/admin_footer.php'; ?>

</body>
</html>
