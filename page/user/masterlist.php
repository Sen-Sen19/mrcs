<?php include 'plugins/navbar.php';?>
<?php include 'plugins/sidebar/user_bar.php';?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6"></div>
                <div class="col-sm-6">

                </div>
            </div>
        </div>
    </div>

    <section class="content">
      
                <div class="col-sm-12">
                  
                        <div class="card-body">
                        <div class="row mb-4">
                             
    <div class="col-3">
        <button type="button" class="btn btn-light btn-block" style="height: 60px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
            <img src="../../dist/img/import.png" alt="Import" class="img-fluid" style="max-height: 24px; margin-right: 8px;">
            Import Data
        </button>
    </div>
  
    <div class="col-3">
        <button type="button" class="btn btn-light btn-block" style="height: 60px;  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
            <img src="../../dist/img/export.png" alt="Export" class="img-fluid" style="max-height: 24px; margin-right: 8px;">
            Export Data
        </button>
    </div>
</div>




<div style="background-color: #fffff; height: 5px; border-top-left-radius: 10px; border-top-right-radius: 10px;"></div>
<div style="background-color: #fffff; padding: 10px; border-radius: 0 0 10px 10px;">
    <h3 style="text-align: left; margin-top: 0px;">Shot Count Table</h3>
   
    <div id="accounts_table_res" class="table-responsive"
        style="height: 55vh; overflow: auto; display: inline-block; margin-top: 20px; border-top: 1px solid gray; background-color: white; padding: 15px; border-radius: 10px;">
        <table id="header_table" class="table table-sm table-head-fixed text-nowrap table-hover">
            <thead style="text-align: center;">
            <div class="row" style="margin-bottom: 20px;">
      
      <div class="col-sm-2">
          <input type="text" class="form-control" placeholder="Product No."     style="height: 31px; font-size: 14px;" />
      </div>
     
      <div class="col-sm-2">
          <input type="text" class="form-control" placeholder="Car Model Line No."      style="height: 31px; font-size: 14px;"/>
      </div>

      <div class="col-sm-2">
          <input type="text" class="form-control" placeholder="Line No."      style="height: 31px; font-size: 14px;"/>
      </div>
      <div class="col-sm-3">
          <button type="button" class="btn btn-primary w-100"     style="height: 31px; font-size: 14px;">  <i class="fas fa-search mr-2"></i>Search</button>
      </div>
     
      <div class="col-sm-3">
          <button type="button" class="btn btn-danger w-100"     style="height: 31px; font-size: 14px;">  <i class="fas fa-trash mr-2"></i>Delete</button>
      </div>
  </div>


                <tr>
                    <th>ID</th>
                    <th>Product Number</th>
                    <th>Car Maker</th>
                    <th>Line No</th>
                    <th>Initial Secondary Process</th>
                    <th>Final Process</th>
                    <th>Poly Size</th>
                </tr>
            </thead>
            <tbody id="table_body" style="text-align: center; padding:20px;">
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-sm-center mt-3">
        <button type="button" class="btn bg-gray-dark" id="btnLoadMore">Load more</button>
    </div>
</div>



                    </div>
                </div>

    </section>
</div>


    <script>
  fetch('../../process/view_data.php')
    .then(response => response.json())
    .then(data => {
      const tbody = document.getElementById('table_body');
      tbody.innerHTML = '';
      data.forEach(row => {
        const tr = document.createElement('tr');
        tr.innerHTML = `
        <td>${row.ID}</td>
          <td>${row.Product_No}</td>
          <td>${row.Car_Maker}</td>
          <td>${row.Line_No}</td>
          <td>${row.Initial_Secondary_Process}</td>
          <td>${row.Final_Process}</td>
          <td>${row.Poly_Size}</td>
        `;
        tbody.appendChild(tr);
      });
    })
    .catch(error => console.error('Error fetching data:', error));
</script>

<?php include 'plugins/footer.php';?>
