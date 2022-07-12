<?php
        require_once("customer_function.php");

?>

<html>

<head>
    <title>
        MM's Bag [Customers]
    </title>
</head>

<body>
    <h1>Customers ของเราทั้งหมด</h1>
    <?php
        require_once("customer_function.php");
        $customers = getAllCustomer();

    ?>
</body>

</html>