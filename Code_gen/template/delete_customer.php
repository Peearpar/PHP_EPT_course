<?php
    require_once("customer_function.php");
    $id = $_GET['id'];
    deletecustomer($id);

?>

Successfully Deleted.
<br/>
<a href="show_all.php">Back</a>