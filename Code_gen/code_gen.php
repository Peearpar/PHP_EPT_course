<?php

function createMysqlConnection()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test_x";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

function createTable($sql)
{
    $conn = createMysqlConnection();
    $isSuccess = false;
    if ($conn->multi_query($sql) === TRUE) {
        $isSuccess = true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    return $isSuccess;
}

    //SHOW COLUMNS FROM products
    function showColumnFromTable($table_name)
    {
        $conn = createMysqlConnection();
    
        $sql = "SHOW COLUMNS FROM $table_name";
        $result = $conn->query($sql);
    
        $columns = array();
        if ($result->num_rows > 0)
        {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
    
                $columns_row = array(
                    "Field" => $row["Field"],
                    "Type" => $row["Type"],
                    "Null" => $row["Null"],
                    "Key" => $row["Key"],
                    "Default" => $row["Default"],
                    "Extra" => $row["Extra"],
                );
                array_push($columns, $columns_row);
            }
        } else {
            echo "0 results";
        }
    
        $conn->close();
        return $columns;
    }


    function getTableNameFromFileContent($file_table)
    {
        $lines = explode("\n", $file_table);
        $table_name_temp = explode(" ", $lines[0]);
        $table_name_temp = $table_name_temp[count($table_name_temp) -1];
        $table_name = substr($table_name_temp,1,strlen($table_name_temp) -3);
        return $table_name;
    }

    function generateCodeFileIndex($table_name, $columns)
    {

    }

    /////////
        $file_table = file_get_contents('table.txt');

        $table_name = getTableNameFromFileContent($file_table);
        echo $table_name;

        createTable($file_table);
        $column = showColumnFromTable($table_name);
    // print_r($column);



?>