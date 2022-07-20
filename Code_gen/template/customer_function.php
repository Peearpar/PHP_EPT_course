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

function insertNewCustomer($name, $surname, $phone, $email)
{
    $conn = createMysqlConnection();

    $sql = "INSERT INTO customer (id, name, surname, phone, email)
    VALUES (0,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $name, $surname, $phone, $email);

    $isSuccess = false;
    if ($stmt->execute() === TRUE) {
        $isSuccess = true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
    return $isSuccess;
}

function updateCustomer($id, $name, $surname, $phone, $email)
{
    $conn = createMysqlConnection();

    $sql =
    "UPDATE `customer` 
    SET 
    `name`= ?,
    `surname`= ?,
    `phone`= ?,
    `email`= ?
    WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $name, $surname, $phone, $email, $id);

    $isSuccess = false;
    if ($stmt->execute() === TRUE) {
        $isSuccess = true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
    return $isSuccess;
}

function deletecustomer($id)
{
    $conn = createMysqlConnection();

    $sql = "DELETE FROM customer WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    if ($stmt->execute() === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
}

function getAllCustomer()
{
    $conn = createMysqlConnection();

    $sql = "SELECT * FROM customer ORDER BY id";
    $result = $conn->query($sql);

    $customers = array();
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {

            $customers_row = array(
                "id" => $row["id"],
                "name" => $row["name"],
                "surname" => $row["surname"],
                "phone" => $row["phone"],
                "email" => $row["email"],
                "insert_time" => $row["insert_time"],
            );
            array_push($customers, $customers_row);
        }
    } else {
        echo "0 results";
    }

    $conn->close();
    return $customers;
}

function getAllCustomerById($id)
{
    $conn = createMysqlConnection();

    $sql = "SELECT * FROM customer WHERE id = ?"; /////////////เดี๋ยวกลับมาแก้ให้ไม่โดนแฮกง่าย

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $stmt->bind_result($id, $name, $surname, $phone, $email, $insert_time);

    $customers = array();

    // output data of each row
    while ($stmt->fetch()) {

        $customers_row = array(
            "id" => $id,
            "name" => $name,
            "surname" => $surname,
            "phone" => $phone,
            "email" => $email,
            "insert_time" => $insert_time,
        );
        array_push($customers, $customers_row);
    }

    $stmt->close();
    $conn->close();
    return $customers;
}

// 'AND '1' = '1' UNION SELECT * , 1, 1, 1 FROM `users` WHERE '1' '1'
function searchCustomerByName($name_search)
{
    $conn = createMysqlConnection();
    $sql = "SELECT * FROM customer WHERE `name` LIKE ? "; /////////////////
    echo "$sql";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $name_search);
    $stmt->execute();
    // $result = $stmt->get_result();

    $stmt->bind_result($id, $name, $surname, $phone, $email, $insert_time);

    $customers = array();

    while ($stmt->fetch()) {
        $customers_row = array(
            "id" => $id,
            "name" => $name,
            "surname" => $surname,
            "phone" => $phone,
            "email" => $email,
            "insert_time" => $insert_time,
        );
        array_push($customers, $customers_row);
    }

    $stmt->close();
    $conn->close();
    return $customers;
}

/*

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
    $isSuccess = false;
    if ($conn->query($sql) === TRUE)
    {
        $isSuccess = true;
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    return $isSuccess;

}

function updateCustomer($id,$name,$surname,$phone,$email)
{
    $conn = createMysqlConnection();

    $sql = "UPDATE customer SET name = '$name',
                                surname = '$surname',
                                phone = '$phone',
                                email = '$email'
                                WHERE id = $id";
    $isSuccess = false;
    if ($conn->query($sql) === TRUE)
    {
        $isSuccess = true;
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    return $isSuccess;

}

function deletecustomer($id)
{
    $conn = createMysqlConnection();

    $sql = "DELETE FROM customer WHERE id = $id";
    if ($conn->query($sql) === TRUE)
    {
    echo "New record created successfully";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

}

function getAllCustomer()
 {
    $conn = createMysqlConnection();

    $sql = "SELECT * FROM customer ORDER BY id";
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

function getAllCustomerById($id)
 {
    $conn = createMysqlConnection();

    $sql = "SELECT * FROM customer WHERE id = $id"; /////////////เดี๋ยวกลับมาแก้ให้ไม่โดนแฮกง่าย
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

// 'AND '1' = '1' UNION SELECT * , 1, 1, 1 FROM `users` WHERE '1' '1'
function searchCustomerByName($name_search)
{
    $conn = createMysqlConnection();
    $sql = "SELECT * FROM customer WHERE `name` LIKE '$name_search' ";
    echo "$sql";
    $result = $conn->query($sql);

    $customers = array();
    if($result->num_rows > 0)
    {
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

*/
