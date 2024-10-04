<style>
  .nav-link.active .nav-icon {
    filter: brightness(0) invert(1);
  }
  /* Sub-navigation active state styles */
.sub-sidebar .nav-link.active {
    background-color: white; /* White background */
    color: blue;             /* Blue font color */
}

.sub-sidebar .nav-link.active:hover {
    background-color: #f0f0f0; /* Optional: Light gray on hover */
    color: #0043ff;           /* Optional: Darker blue on hover */
}

</style>
<aside class="main-sidebar elevation-4 sidebar-light-primary" style="background-color:white;">

  <a href="dashboard.php" class="brand-link d-flex align-items-center">
    <img src="../../dist/img/machine.png" alt="Logo" class="brand-image" style="opacity: .8">


    <span class="brand-text font-weight-light p-0" style="color: black;">&ensp;MRCS</span>
  </a>

  <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center">
      <div class="image">
        <img src="../../dist/img/user (1).png" class="img-circle " alt="User Image">
      </div>
      <div class="info">
        <a href="dashboard.php" class="d-block"><?= htmlspecialchars(strtoupper($_SESSION['username'])); ?></a>
      </div>
    </div>


    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="dashboard.php"
            class="nav-link <?= ($_SERVER['REQUEST_URI'] == "/mrcs_2/page/user/dashboard.php") ? 'active' : '' ?>">
            <img src="../../dist/img/dashboard.png" alt="Pagination Icon" class="nav-icon"
              style="width: 20px; height: 20px;">
            <p>Dashboard</p>
          </a>
        </li>







        
        <li class="nav-item">
    <a href="plan_from_pc.php"
        class="nav-link <?= ($_SERVER['REQUEST_URI'] == "/mrcs_2/page/user/plan_from_pc.php" || 
                          $_SERVER['REQUEST_URI'] == "/mrcs_2/page/user/plan_total.php" || 
                          $_SERVER['REQUEST_URI'] == "/mrcs_2/page/user/plan.php" || 
                          $_SERVER['REQUEST_URI'] == "/mrcs_2/page/user/non_machine_process.php" || 
                          $_SERVER['REQUEST_URI'] == "/mrcs_2/page/user/secondary_process.php" || 
                          $_SERVER['REQUEST_URI'] == "/mrcs_2/page/user/other_process.php") ? 'active' : '' ?>">
        <img src="../../dist/img/summary.png" alt="Masterlist Icon" class="nav-icon" style="width: 20px; height: 20px;">
        <p>Plan From PC</p>
    </a>
    <ul class="sub-sidebar">

        <li class="nav-item">
            <a href="plan_total.php"
                class="nav-link <?= ($_SERVER['REQUEST_URI'] == "/mrcs_2/page/user/plan_total.php") ? 'active' : '' ?>">
                <p>Plan  Total</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="plan.php"
                class="nav-link <?= ($_SERVER['REQUEST_URI'] == "/mrcs_2/page/user/plan.php") ? 'active' : '' ?>">
                <p>Plan</p>
            </a>
        </li>

    </ul>
</li>




      







        <li class="nav-item">
    <a href="masterlist.php"
        class="nav-link <?= ($_SERVER['REQUEST_URI'] == "/mrcs_2/page/user/masterlist.php" || 
                          $_SERVER['REQUEST_URI'] == "/mrcs_2/page/user/first_process.php" || 
                          $_SERVER['REQUEST_URI'] == "/mrcs_2/page/user/unique_process.php" || 
                          $_SERVER['REQUEST_URI'] == "/mrcs_2/page/user/non_machine_process.php" || 
                          $_SERVER['REQUEST_URI'] == "/mrcs_2/page/user/secondary_process.php" || 
                          $_SERVER['REQUEST_URI'] == "/mrcs_2/page/user/other_process.php") ? 'active' : '' ?>">
        <img src="../../dist/img/masterlist.png" alt="Masterlist Icon" class="nav-icon" style="width: 20px; height: 20px;">
        <p>Masterlist</p>
    </a>
    <ul class="sub-sidebar">
        <li class="nav-item">
            <a href="first_process.php"
                class="nav-link <?= ($_SERVER['REQUEST_URI'] == "/mrcs_2/page/user/first_process.php") ? 'active' : '' ?>">
                <p>First Process</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="unique_process.php"
                class="nav-link <?= ($_SERVER['REQUEST_URI'] == "/mrcs_2/page/user/unique_process.php") ? 'active' : '' ?>">
                <p>Unique Process</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="non_machine_process.php"
                class="nav-link <?= ($_SERVER['REQUEST_URI'] == "/mrcs_2/page/user/non_machine_process.php") ? 'active' : '' ?>">
                <p>Non-Machine Process</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="secondary_process.php"
                class="nav-link <?= ($_SERVER['REQUEST_URI'] == "/mrcs_2/page/user/secondary_process.php") ? 'active' : '' ?>">
                <p>Secondary Process</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="other_process.php"
                class="nav-link <?= ($_SERVER['REQUEST_URI'] == "/mrcs_2/page/user/other_process.php") ? 'active' : '' ?>">
                <p>Other Process</p>
            </a>
        </li>
    </ul>
</li>





        <li class="nav-item">
          <a href="computation.php"
            class="nav-link <?= ($_SERVER['REQUEST_URI'] == "/mrcs/page/user/computation.php") ? 'active' : '' ?>">
            <img src="../../dist/img/calculate.png" alt="Pagination Icon" class="nav-icon"
              style="width: 20px; height: 20px;">
            <p>Computation</p>
          </a>
        </li>


        <?php include 'logout.php'; ?>
      </ul>
    </nav>

  </div>

</aside>