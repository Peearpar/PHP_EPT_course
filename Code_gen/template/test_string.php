<?php
    echo str_replace("world","Peter","Hello world!<br/>");

    $data = "foo:*:1023:1000::/home/foo:/bin/sh";
    list($user, $pass, $uid, $gid, $gecos, $home, $shell) = explode(":", $data);
    echo $user;
    echo $pass;

    echo "<br/>";

    $file = file_get_contents('index.php');
    echo $file;

    $file = fopen("a.txt","w");
    $txt = "John Doe\n";
    fwrite($file, $txt);
    fclose($file);





?>