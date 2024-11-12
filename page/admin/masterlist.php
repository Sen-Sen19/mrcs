<?php include 'plugins/navbar.php'; ?>
<?php include 'plugins/sidebar/admin_bar.php'; ?>

<div class="content-wrapper">
  

    <div class="tab-content" id="excelTabContent">
        <div class="tab-pane fade show active" id="file1" role="tabpanel" aria-labelledby="file1-tab">
            <div class="card-body">
                <div class="row">

            
                   
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
                <div id="accounts_table_res1" class="table-responsive"
                    style="height: 50vh; overflow: auto; margin-top: 20px; border-top: 1px solid white; background-color: white;  border-radius: 10px;">
                    <table id="header_table1" class="table table-sm table-head-fixed text-nowrap table-hover">
                        <thead style="text-align: center;">
                        <tr>
                        <th>BASE PRODUCT</th>
                                <th>CAR MODEL</th>
                                <th>PRODUCT</th>
                                <th>CAR CODE</th>
                                <th>BLOCK</th>
                                <th>CLASS</th>
                                <th>LINE NO</th>
                                <th>CIRCUIT QTY</th>
                                <th>TRD NWPA 0 13</th>
                                <th>TRD NWPA BELOW 2 0 EXCEPT 0 13</th>
                                <th>TRD NWPA 2 0 3 0</th>
                                <th>TRD WPA 0 13</th>
                                <th>TRD WPA BELOW 2 0 EXCEPT 0 13</th>
                                <th>TRD WPA 2 0 3 0</th>
                                <th>TR327</th>
                                <th>TR328</th>
                                <th>TRD ALUMINUM NWPA 2 0</th>
                                <th>TRD ALUMINUM NWPA BELOW 2 0</th>
                                <th>TRD ALUMINUM WPA 2 0</th>
                                <th>TRD ALUMINUM WPA BELOW 2 0</th>
                                <th>ALUMINUM DIMENSION CHECK ALUMINUM TERMINAL INSPECTION</th>
                                <th>ALUMINUM VISUAL INSPECTION</th>
                                <th>ALUMINUM COATING UV II</th>
                                <th>ALUMINUM IMAGE INSPECTION</th>
                                <th>ALUMINUM UV III</th>
                                <th>TRD ALPHA ALUMINUM NWPA</th>
                                <th>TRD ALPHA ALUMINUM WPA</th>
                                <th>ALUMINUM VISUAL INSPECTION FOR ALPHA</th>
                                <th>ENLARGED TERMINAL CHECK FOR ALPHA</th>
                                <th>AIR WATER LEAK TEST</th>
                                <th>SAM SUB NO AIRBAG</th>
                                <th>SAM SUB NO NORMAL</th>
                                <th>JAM AUTO CRIMPING AND TWISTING</th>
                                <th>TRD ALPHA ALUMINUM 5 0 ABOVE</th>
                                <th>POINT MARKING NSC</th>
                                <th>POINT MARKING SAM</th>
                                <th>ENLARGED TERMINAL CHECK ALUMINUM</th>
                                <th>NSC 1</th>
                                <th>NSC 2</th>
                                <th>NSC 3</th>
                                <th>NSC 4</th>
                                <th>NSC 5</th>
                                <th>NSC 6</th>
                                <th>NSC 7</th>
                                <th>NSC 8</th>
                                <th>NSC 9</th>
                                <th>NSC 10</th>
                                <th>JOINT CRIMPING 20TONS PS 115 2 3L 2</th>
                        <th>ULTRASONIC WELDING</th>
                        <th>SERVO PRESS CRIMPING</th>
                        <th>LOW VISCOSITY</th>
                        <th>AIR WATER LEAK TEST</th>
                        <th>HEATSHRINK LOW VISCOSITY</th>
                        <th>STMAC SHIELDWIRE J12</th>
                        <th>HIROSE SHEATH STRIPPING 927R</th>
                        <th>HIROSE UNISTRIP</th>
                        <th>HIROSE ACETATE TAPING</th>
                        <th>HIROSE MANUAL CRIMPING 2 TONS</th>
                        <th>HIROSE COPPER TAPING</th>
                        <th>HIROSE HGT17AP CRIMPING</th>
                        <th>STMAC ALUMINUM</th>
                        <th>MANUAL CRIMPING 20TONS</th>
                        <th>DIP SOLDERING BATTERY</th>
                        <th>ULTRASONIC DIP SOLDERING ALUMINUM</th>
                        <th>LA MOLDING</th>
                        <th>PRESSURE WELDING SUN VISOR</th>
                        <th>PRESSURE WELDING DOME LAMP</th>
                        <th>CASTING C377A</th>
                        <th>COAXSTRIP 6580</th>
                        <th>MANUAL CRIMPING 2T FERRULE</th>
                        <th>FERRULE AUTO CRIMPING</th>
                        <th>ENLARGE TERMINAL INSPECTION</th>
                        <th>WATERPROOF PAD PRESS</th>
                        <th>PARTS INSERTION</th>
                        <th>BRAIDED WIRE FOLDING</th>
                        <th>OUTSIDE FERRULE INSERTION</th>
                        <th>JOINT CRIMPING 2T</th>
                        <th>WELDING AT HEAD</th>
                        <th>WELDING TAPING</th>
                        <th>UV III 1</th>
                        <th>UV III 2</th>
                        <th>UV III 4</th>
                        <th>UV III 5</th>
                        <th>UV III 7</th>
                        <th>UV III 8</th>
                        <th>DRAINWIRE TIP</th>
                        <th>ARC WELDING</th>
                        <th>C373A YAMAHA</th>
                        <th>COCRIPPER</th>
                        <th>QUICKSTRIPPING</th>

                        <th>AIRBAG HOUSING</th>
                        <th>CAP INSERTION</th>
                        <th>SHIELDWIRE TAPING</th>
                        <th>GOMUSEN INSERTION</th>
                        <th>POINT MARKING</th>
                        <th>LOOPING</th>
                        <th>SHIKAKARI HANDLER</th>
                        <th>BLACK TAPING</th>
                        <th>COMPONENTS INSERTION</th>


                        <th>JOINT CRIMPING 2TONS PS 800 S 2</th>
                        <th>JOINT CRIMPING 2TONS PS 200 M 2</th>
                        <th>JOINT CRIMPING 2TONS PS 017 SS 2</th>
                        <th>JOINT CRIMPING 2TONS PS 126 SST2</th>
                        <th>JOINT CRIMPING 4TONS PS 700 L 2</th>
                        <th>JOINT CRIMPING 5TONS PS 150 LL</th>
                        <th>MANUAL CRIMPING SHIELDWIRE 2T</th>
                        <th>MANUAL CRIMPING SHIELDWIRE 4T</th>
                        <th>JOINT CRIMPING 2TONS PS 800 S 2 SW</th>
                        <th>JOINT CRIMPING 2TONS PS 126 SST2 SW</th>
                        <th>JOINT CRIMPING 2TONS PS 017 SS 2 SW</th>
                        <th>TWISTING PRIMARY NORMAL WIRES L LESS THAN 1500MM</th>
                        <th>TWISTING PRIMARY NORMAL WIRES L LESS THAN 3000MM</th>
                        <th>TWISTING PRIMARY NORMAL WIRES L LESS THAN 4500MM</th>
                        <th>TWISTING PRIMARY NORMAL WIRES L LESS THAN 6000MM</th>
                        <th>TWISTING PRIMARY NORMAL WIRES L LESS THAN 7500MM</th>
                        <th>TWISTING PRIMARY NORMAL WIRES L LESS THAN 9000MM</th>
                        <th>TWISTING SECONDARY NORMAL WIRES L LESS THAN 1500MM</th>
                        <th>TWISTING SECONDARY NORMAL WIRES L LESS THAN 3000MM</th>
                        <th>TWISTING SECONDARY NORMAL WIRES L LESS THAN 4500MM</th>
                        <th>TWISTING SECONDARY NORMAL WIRES L LESS THAN 6000MM</th>
                        <th>TWISTING SECONDARY NORMAL WIRES L LESS THAN 7500MM</th>
                        <th>TWISTING SECONDARY NORMAL WIRES L LESS THAN 9000MM</th>
                        <th>TWISTING PRIMARY ALUMINUM WIRES L LESS THAN 1500MM</th>
                        <th>TWISTING PRIMARY ALUMINUM WIRES L LESS THAN 3000MM</th>
                        <th>TWISTING PRIMARY ALUMINUM WIRES L LESS THAN 4500MM</th>
                        <th>TWISTING PRIMARY ALUMINUM WIRES L LESS THAN 6000MM</th>
                        <th>TWISTING SECONDARY ALUMINUM WIRES L LESS THAN 1500MM</th>
                        <th>TWISTING SECONDARY ALUMINUM WIRES L LESS THAN 3000MM</th>
                        <th>TWISTING SECONDARY ALUMINUM WIRES L LESS THAN 4500MM</th>
                        <th>TWISTING SECONDARY ALUMINUM WIRES L LESS THAN 6000MM</th>
                        <th>TWISTING SECONDARY ALUMINUM WIRES L LESS THAN 7500MM</th>
                        <th>TWISTING SECONDARY ALUMINUM WIRES L LESS THAN 9000MM</th>
                        <th>MANUAL CRIMPING 2TONS NORMAL SINGLE CRIMP</th>
                        <th>MANUAL CRIMPING 2TONS NORMAL DOUBLE CRIMP</th>
                        <th>MANUAL CRIMPING 2TONS DOUBLE CRIMP TWISTED</th>
                        <th>MANUAL CRIMPING 2TONS LA TERMINAL</th>
                        <th>MANUAL CRIMPING 2TONS DOUBLE CRIMP LA TERMINAL</th>
                        <th>MANUAL CRIMPING 2TONS W GOMUSEN</th>
                        <th>MANUAL CRIMPING 4TONS DOUBLE CRIMP TWISTED</th>
                        <th>MANUAL CRIMPING 4TONS NORMAL SINGLE CRIMP</th>
                        <th>MANUAL CRIMPING 4TONS NORMAL DOUBLE CRIMP</th>
                        <th>MANUAL CRIMPING 4TONS LA TERMINAL</th>
                        <th>MANUAL CRIMPING 4TONS DOUBLE CRIMP LA TERMINAL</th>
                        <th>MANUAL CRIMPING 4TONS W GOMUSEN</th>
                        <th>MANUAL CRIMPING 5TONS</th>
                        <th>INTERMEDIATE BUTT WELDING EXCEPT 0 13 ELECTRODE 1</th>
                        <th>INTERMEDIATE BUTT WELDING EXCEPT 0 13 ELECTRODE 2</th>
                        <th>INTERMEDIATE BUTT WELDING EXCEPT 0 13 ELECTRODE 3</th>
                        <th>INTERMEDIATE BUTT WELDING EXCEPT 0 13 ELECTRODE 4</th>
                        <th>INTERMEDIATE BUTT WELDING EXCEPT 0 13 ELECTRODE 5</th>
                        <th>WELDING AT HEAD EXCEPT 0 13 ELECTRODE 1</th>
                        <th>WELDING AT HEAD EXCEPT 0 13 ELECTRODE 2</th>
                        <th>WELDING AT HEAD EXCEPT 0 13 ELECTRODE 3</th>
                        <th>WELDING AT HEAD EXCEPT 0 13 ELECTRODE 4</th>
                        <th>WELDING AT HEAD EXCEPT 0 13 ELECTRODE 5</th>
                        <th>INTERMEDIATE BUTT WELDING 0 13 ELECTRODE 1</th>
                        <th>WELDING AT HEAD 0 13 ELECTRODE 1</th>
                        <th>INTERMEDIATE BUTT WELDING 0 13 ELECTRODE 2</th>
                        <th>WELDING AT HEAD 0 13 ELECTRODE 2</th>

                        <th>V TYPE TWISTING</th>
                                <th>MANUAL CRIMPING 2TONS TO BE JOINT ON SW</th>
                                <th>AIRBAG</th>
                                <th>A B SUB PC</th>
                                <th>INTERMEDIATE RIPPING UAS MANUAL NF F</th>
                                <th>MANUAL CRIMPING 4TONS NF F</th>
                                <th>INTERMEDIATE RIPPING UAS JOINT</th>
                                <th>INTERMEDIATE STRIPPING KB10</th>
                                <th>MANUAL TAPING DISPENSER 8 0 5 0 8 0 8 0 PS 115 2 CHFUS 0 22 CIVUS 0 22
                                </th>
                                <th>JOINT TAPING 11MM PS 150 LL 2</th>
                                <th>JOINT TAPING 12MM PS 700 L 2 PS 200 M 2</th>
                                <th>JOINT TAPING 13MM PS 800 S 2 PS 017 SS 2 PS 126 2 SST2</th>
                                <th>HEAT SHRINK JOINT CRIMPING</th>
                                <th>HEAT SHRINK LA TERMINAL</th>
                                <th>MANUAL CRIMPING 2TONS NSC WELD</th>
                                <th>INTERMEDIATE STRIPPING KB10 NSC WELD</th>
                                <th>JOINT CRIMPING 2TONS PS 017 SS 2 NSC WELD</th>
                                <th>JOINT TAPING 13MM PS 800 S 2 PS 017 SS 2 PS 126 2 SST2 NSC WELD</th>
                                <th>SILICON INJECTION</th>
                                <th>WELDING TAPING 13MM</th>
                                <th>HEAT SHRINK WELDING</th>
                                <th>CASTING C385 SHIELDWIRE</th>
                                <th>QUICK STRIPPING 927 AUTO</th>
                                <th>MIRA QUICK STRIPPING</th>
                                <th>QUICK STRIPPING 311 MANUAL</th>
                                <th>MANUAL HEAT SHRINK BLOWER SUMITUBE</th>
                                <th>MANUAL TAPING DISPENSER SW</th>
                                <th>HEAT SHRINK JOINT CRIMPING SW</th>
                                <th>CASTING C373</th>
                                <th>CASTING C377</th>
                                <th>CASTING C371</th>
                                <th>MANUAL HEAT SHRINK BLOWER BATTERY</th>
                                <th>CASTING C373 NORMAL</th>
                                <th>CASTING C371 NORMAL</th>
                                <th>MANUAL 2TONS BENDING</th>
                                <th>MANUAL 5TONS BATTERY</th>
                                <th>AL LOOPING</th>
                                <th>SOLDERING</th>
                                <th>WATERPROOF AGENT INJECTION</th>
                                <th>THERMOSETTING</th>
                                <th>COMPLETION</th>
                                <th>PICKING LOOPING</th>
                                <th>WELDING END</th>
                                <th>INTERMEDIATE WELDING</th>
                                <th>SAM SET A B</th>
                                <th>SAM SET NORMAL</th>
                                <th>TOTAL CIRCUIT</th>
                                <th>NEW AIRBAG</th>

                    
                            </tr>
                        </thead>
                        <tbody id="dataBody" style="text-align: center;"></tbody>
                       
                    </table>
                    

                </div>
                
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    var limit = 100;  // Number of records per request
    var offset = 0;   // Starting point for the first request
    var isLoading = false;  // To prevent multiple simultaneous AJAX requests

    // Function to fetch data and append to the table
    function fetchData() {
        if (isLoading) return;  // Prevent fetching if already loading
        isLoading = true;

        $.ajax({
            url: '../../process/combine.php',  // The PHP file that runs the query
            type: 'GET',
            data: {
                limit: limit,
                offset: offset
            },
            dataType: 'json',
            success: function(data) {
                var tableBody = $('#dataBody');
                // Check if data is empty to stop further loading
                if (data.length === 0) {
                    return; // No more data to load
                }
                // Iterate over the data and create table rows
                $.each(data, function(index, item) {
                    var row = '<tr>';
                    $.each(item, function(key, value) {
                        row += '<td>' + value + '</td>';
                    });
                    row += '</tr>';
                    tableBody.append(row);
                });

                // Update offset for the next batch of records
                offset += limit;
                isLoading = false;  // Allow next fetch
            },
            error: function(xhr, status, error) {
                console.error('Error fetching data: ' + error);
                isLoading = false;
            }
        });
    }

    // Call fetchData initially to populate the table
    fetchData();

    // Detect when user reaches the bottom of the table to fetch more data
    $('#accounts_table_res1').on('scroll', function() {
        var table = $(this);
        if (table.scrollTop() + table.innerHeight() >= table[0].scrollHeight) {
            // If scrolled to the bottom, load more data
            fetchData();
        }
    });
});


</script>


<?php include 'plugins/footer.php'; ?>