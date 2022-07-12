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
    <form action="insert_action.php" method="POST">
        <ul>
            <li>name <input type="text" name="name" value="<?php echo isset($_COOKIE["name"]) ? $_COOKIE["name"] : "";?>" /></li>
            <li>surname <input type="text" name="surname" value="<?php echo isset($_COOKIE["surname"]) ? $_COOKIE["surname"] : "";?>"/></li>
            <li>phone <input type="text" name="phone" value="<?php echo isset($_COOKIE["phone"]) ? $_COOKIE["phone"] : "";?>"/></li>
            <li>email <input type="text" name="email" value="<?php echo isset($_COOKIE["email"]) ? $_COOKIE["email"] : "";?>"/></li>
            <li><input type="submit" name="submit" value="SAVE" /></li>
        </ul>
    </form>
</body>

</html>