
<?php require APPROOT . '../views/includes/head.php';?>
<div class='navbar-div'>
<?php require APPROOT.'../views/includes/nav.php'; ?>


<!--I know managging database data was not necessery in this project, but i already was half way through that  -->
<!-- when i got the answer, so i finished it for the user table -->
</div>
<div class="main">
    <div class="table-wrapper">
<table>
    <thead><tr><th>ID</th><th>Name</th><th>Action</th></tr></thead>
   <?php echo($data); ?>
   <form action="<?php echo URLROOT;?>/users/addUser" method="post">
    <td></td>
    <td><input type="text" name='name' placeholder="Name"></td>
    <td><input type="submit" value="Add"></td>
    </form>
</table>
</div>
</div>
