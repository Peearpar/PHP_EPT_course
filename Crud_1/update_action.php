<?php

    require_once("customer_function.php");
    session_start();

    $id = trim($_POST['id']);
    $name = trim($_POST['name']);
    $surname = trim($_POST['surname']);
    $phone = trim($_POST['phone']);
    $email = trim($_POST['email']);
    $submit = $_POST['submit'];

    // setcookie("name",$name, time() + (60*5),"/");
    // setcookie("surname",$surname, time() + (60*5),"/");
    // setcookie("phone",$phone, time() + (60*5),"/");
    // setcookie("email",$email, time() + (60*5),"/");

    $_SESSION["name"] = "$name";
    $_SESSION["surname"] = "$surname";
    $_SESSION["phone"] = "$phone";
    $_SESSION["email"] = "$email";

    if(!isset($submit))
    {
        header("location:insert_form.php");
    }
    if($name == "")
    {
        header("location:insert_form.php?return=1");
        exit;
    }
    if($surname == "")
    {
        header("location:insert_form.php?return=2");
        exit;
    }
    if($phone == "")
    {
        header("location:insert_form.php?return=3");
        exit;
    }
    if($email == "")
    {
        header("location:insert_form.php?return=4");
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        header("location:insert_form.php?return=5");
        exit;
      }

      $isSuccess = updateCustomer($id,$name,$surname,$phone,$email);

        // setcookie("name","", time() - 3600,"/");
        // setcookie("surname","", time() - 3600,"/");
        // setcookie("phone","", time() - 3600,"/");
        // setcookie("email","", time() - 3600,"/");

        session_unset();
        session_destroy();
?>

<html>
    <head>
        <meta charset="utf8"/>
    </head>
    <body>
        <h1><?php echo $isSuccess ? "Edit success" : "Fail"; ?></h1>
        <br/>
        <a href="index.php">Back to home</a>
        <br/>
        <a href="insert_form.php">Back to insert new Customer</a>
    </body>
</html>
