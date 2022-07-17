<?php
        session_start();
        require_once("customer_function.php");

        $isEdit = false;
        if(isset($_GET['action']) and $_GET['action'] == "edit")
        {
            $isEdit = true;
            $id = $_GET['id'];
            $customers = getAllCustomerById($id);

            if(count($customers) > 0)
            {
                $name = $customers[0]["name"];
                $surname = $customers[0]["surname"];
                $phone = $customers[0]["phone"];
                $email = $customers[0]["email"];

                // setcookie("name",$name, time() + (60*5),"/");
                // setcookie("surname",$surname, time() + (60*5),"/");
                // setcookie("phone",$phone, time() + (60*5),"/");
                // setcookie("email",$email, time() + (60*5),"/");

                $_SESSION["name"] = "$name";
                $_SESSION["surname"] = "$surname";
                $_SESSION["phone"] = "$phone";
                $_SESSION["email"] = "$email";
            }
        }
?>

<html>

<head>
    <title>
        MM's Bag [Customers]</title>
</head>

<body>
    <?php

        if (isset($_GET['return']) and $_GET['return'] == 1) 
        {
            echo "<p style='color:red;'>กรุณากรอกชื่อด้วยค่ะ</p>";
        }
        else if (isset($_GET['return']) and $_GET['return'] == 2) 
        {
            echo "<p style='color:red;'>กรุณากรอกนามสกุลด้วยค่ะ</p>";
        }
        else if (isset($_GET['return']) and $_GET['return'] == 3) 
        {
            echo "<p style='color:red;'>กรุณากรอกเบอร์โทรศัพท์ด้วยค่ะ</p>";
        }
        else if (isset($_GET['return']) and $_GET['return'] == 4) 
        {
            echo "<p style='color:red;'>กรุณากรอก Email ด้วยค่ะ</p>";
        }
        else if (isset($_GET['return']) and $_GET['return'] == 5)
        {
            echo "<p style='color:red;'>Email ไม่ถูก format นะคะ </p>";
        }
    ?>
    <h1>insert new Customer</h1>
        <?php
            if($isEdit)
            {
                echo "<form action='update_action.php' method='POST'>";
            }
            else
            {
                echo "<form action='insert_action.php' method='POST'>";
            }

        ?>
        <ul>
            <?
            if($isEdit)
            {
                echo "<input type='hidden' name='id' value='$id;' />";
            }
            ?>

            <li>name <input type="text" name="name" value="<?php echo isset($_SESSION["name"]) ? $_SESSION["name"] : "";?>" /></li>
            <li>surname <input type="text" name="surname" value="<?php echo isset($_SESSION["surname"]) ? $_SESSION["surname"] : "";?>"/></li>
            <li>phone <input type="text" name="phone" value="<?php echo isset($_SESSION["phone"]) ? $_SESSION["phone"] : "";?>"/></li>
            <li>email <input type="text" name="email" value="<?php echo isset($_SESSION["email"]) ? $_SESSION["email"] : "";?>"/></li>
            <li><input type="submit" name="submit" value="SAVE" /></li>
        </ul>
    </form>
</body>

</html>