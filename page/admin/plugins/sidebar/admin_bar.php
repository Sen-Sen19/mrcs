
<style>

.nav-link.active .nav-icon {
  filter: brightness(0) invert(1);
}

  
</style>
<aside class="main-sidebar elevation-4 sidebar-light-primary"  style="background-color:white;" >

<a href="admin.php" class="brand-link d-flex align-items-center">
<img src="../../dist/img/machine.png" alt="Logo" class="brand-image" style="opacity: .8">


  <span class="brand-text font-weight-light p-0" style="color: black;">&ensp;MRCS</span>
</a>

<div class="sidebar">
  <div class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center">
    <div class="image">
      <img src="../../dist/img/user (1).png" class="img-circle " alt="User Image" >
    </div>
      <div class="info">
        <a href="admin.php" class="d-block"><?=htmlspecialchars(strtoupper($_SESSION['username']));?></a>
      </div>
    </div>

   
    <nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <li class="nav-item">
      <a href="admin.php" class="nav-link <?= ($_SERVER['REQUEST_URI'] == "/mrcs/page/admin/admin.php") ? 'active' : '' ?>">
        <img src="../../dist/img/dashboard.png" alt="Pagination Icon" class="nav-icon" style="width: 20px; height: 20px;">
        <p>Accounts </p>
      </a>
    </li>
      

      
        <?php include 'logout.php';?>
      </ul>
    </nav>
  
  </div>
  
</aside>
