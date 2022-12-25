<?php
session_start();
echo"<!DOCTYPE html>";
require('verify.php');
require('../include/db.php');
require('../include/admin.php');
require('header.php');
require('sidebar.php');

$load_page = load_page($_SERVER['REQUEST_URI']);
$post_url = posturl($_SERVER['REQUEST_URI']);
?>



<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <span>Admin</span>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <span><?php echo"$title_admin1";?></span>
        </li>
    </ul>
</div>
<!-- END PAGE BAR -->
<!-- BEGIN PAGE TITLE-->
<div class="page-bar pagebar-title">
  <ul class="page-breadcrumb">
      <li>
        <h3 class="page-title"> Manage Data</h3>
        <i class="fa fa-angle-right"></i>
      </li>
      <li>
          <span><?php echo"$title_admin1";?></span>
          <i class="fa fa-angle-right"></i>
      </li>
      <li>
          <span><?php echo"$title_admin2";?> </span>
      </li>
  </ul>
</div>
<?php
require($load_page);
?>

<!-- END PAGE TITLE-->




<?php
require('footer.php');
?>
