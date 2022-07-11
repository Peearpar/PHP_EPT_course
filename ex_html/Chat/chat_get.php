<?php
    $filename = "chat.txt";
    $content = file_get_contents ($filename);
    $lines = explode("\r\n", $content);
    $data = array();
    for($i = 0; $i < count($lines) ; $i++)
    {
        $d = explode(":",$lines[$i]);

        $dd = array();
        array_push($dd, $d[0],$d[1]);
        array_push($data, $dd);
    }
    $jason = json_encode($data);
    echo $jason;
    // print_r($data);
    // echo "<br/>";
    // echo "<br/>";
    // echo "<br/>";
    // echo $content;
?>

