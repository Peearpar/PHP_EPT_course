<?php
        require_once("customer_function.php");

?>

<html>

<head>
    <title>MM's Bag [Customers]</title>
    <script src="jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function()
            {
                loadTable();
            });
            function loadTable()
            {
                $("#table").load("show_all_customer_table.php", function(responseTxt, statusTxt, xhr)
                {

                });
            }
            function confirm_delete(id)
            {
                var r = confirm("Delete id" +id+ "???");
                if(r == true)
                {
                    // window.open("delete_customer.php?id="+id,"_self");
                    //ajax
                    $("#data").load("delete_customer.php?id="+id, function(responseTxt, statusTxt, xhr)
                {
                    if(statusTxt == "success")
                    {
                        loadTable();
                    }
                   else if(statusTxt == "error")
                   {
                        alert("Error: " + xhr.status + ": " + xhr.statusText);
                   }

                });
                }
                else
                    {

                    }
            }
        </script>
</head>

<body>
    <h1>Customers ของเราทั้งหมด</h1>
    <div id="data"></div>
    <div id="table"></div>
<br/>
<a href="index.php">Back</a>
</body>

</html>