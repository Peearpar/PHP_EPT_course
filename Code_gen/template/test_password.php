<?php
    $password = "catbatrat";
    echo "$password" . "<br/>";
    $password_encoded = md5($password);
    echo "$password" . "<br/>";

    $password_endcoded = hash("sha512", $password, false);
    echo "$password_endcoded" . "<br/>";


    print_r(hash_algos())
    //sha512


?>