<?php
$base_url = base_url();
$assets_url = $base_url . "assets/";
?>
<!DOCTYPE html>
<html lang="en">

<?php include("includes/css_load.php"); ?>
<?php include("includes/header.php"); ?>
<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <?php include("includes/menu.php"); ?>
        <?php include("includes/top_navigation.php"); ?>
        <?php include("includes/main_content.php"); ?>
        <?php include("includes/footer.php"); ?>
    </div>
</div>
<?php include("includes/scripts_load.php"); ?>
<!-- /gauge.js -->
</body>
</html>
