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
function insertNewCustomer($name,$surname,$phone,$email)
{
    $conn = createMysqlConnection();

    $sql = "INSERT INTO customer (id, name, surname, phone, email)
    VALUES (0,'$name','$surname','$phone','$email')";

    if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

}

function getAllCustomer()
 {
    $conn = createMysqlConnection();

    $sql = "SELECT * FROM customer";
    $result = $conn->query($sql);

    $customers = array();
    if ($result->num_rows > 0)
    {
    // output data of each row
    while($row = $result->fetch_assoc())
    {

        $customers_row = array("id"=>$row["id"],
                                "name"=>$row["name"],
                                "surname"=>$row["surname"],
                                "phone"=>$row["phone"],
                                "email"=>$row["email"],
                                "insert_time"=>$row["insert_time"],
                            );
        array_push($customers,$customers_row);
    }
    }
    else
    {
    echo "0 results";
    }
    $conn->close();
    return $customers;
}
