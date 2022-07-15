<?php
        require_once("customer_function.php");

?>

<html>

<head>
    <title>
        MM's Bag [Customers]</title>
        <script>
            function confirm_delete(id)
            {
                var r = confirm("Delete id" +id+ "???");
                if(r == true)
                {
                    window.open("delete_customer.php?id="+id,"_self");
                }
                else
                    {

                    }
            }
        </script>
</head>

<body>
    <h1>Customers ของเราทั้งหมด</h1>
    <?php
        require_once("customer_function.php");
        $customers = getAllCustomer();

        if(count($customers) > 0)
        {
            echo"<table border = '1' style= 'border-collapse:collapse;'>";
                echo"<tr>";
                    $keys = array_keys ($customers[0]);
                    for($i = 0; $i < count($keys); $i++)
                    {
                        $key = $keys[$i];
                        echo"<th>$key</th>";
                    }
                        echo"<th>"."Edit"."</th>";
                        echo"<th>"."Delete"."</th>";
                        echo"</tr>";
                        for($i = 0; $i < count($customers); $i++)
                        {
                            if($i % 2 == 0)
                            {
                                echo "<tr style='background-color:#cccccc;'>";
                            }
                            else
                            {
                                echo"<tr>";
                            }
                            for($j = 0; $j < count($keys); $j++)

                            {
                                $key = $keys[$j];
                                echo"<td>".$customers[$i][$key]."</td>";
                            }
                            $id = $customers[$i]['id'];
                            echo"<td>"."<a href = 'insert_form.php?action=edit&id=$id'> Edit </a>"."</td>";
                            echo"<td>"."<button onclick='confirm_delete($id)'>Delete</button>"."</td>";

                            echo"<tr>";
                        }
                        echo"</table>";
        }
?>
<br/>
<a href="index.php">Back</a>
</body>

</html>