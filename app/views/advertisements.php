
<?php
require APPROOT . '../views/includes/head.php';
?>
<div class='navbar-div'>
<?php require APPROOT.'../views/includes/nav.php'; ?>

</div>
<div class="main">
    <div class="table-wrapper">
<table >
    <thead><tr><th>ID</th><th>Userid</th><th>Username</th><th>Addv. Title</th></tr></thead>
   <?php echo($data); ?>
</table>
</div>
</div>
