<?php
// $show = $_GET['show'];
// $hidden = $_GET['hidden'];
// $state = $_GET['state'];
// $state2 = $_GET['state2'];

$show = isset($_GET['show']) ? $_GET['show'] : 0;
$hidden = isset($_GET['hidden']) ? $_GET['hidden'] : 0;
$state = isset($_GET['state']) ? $_GET['state'] : "";
$state2 = isset($_GET['state2']) ? $_GET['state2'] : "";

function numberPress($number)
{
    global $show, $hidden, $state, $state2;
    if ($show == 0 || ($state != "" && $state2 != "1"))
    {
        $show = $number;
        if($state != "")
        {
            $state2 = "1";
        }
    }
    else
    {
        $show = $show .$number;
    }
}

if (isset($_GET['0']))
{
    numberPress("0");
}
else if (isset($_GET['1']))
{
    numberPress("1");
} else if (isset($_GET['2'])) {
    numberPress("2");
} else if (isset($_GET['3'])) {
    numberPress("3");
} else if (isset($_GET['4'])) {
    numberPress("4");
} else if (isset($_GET['5'])) {
    numberPress("5");
} else if (isset($_GET['6'])) {
    numberPress("6");
} else if (isset($_GET['7'])) {
    numberPress("7");
} else if (isset($_GET['8'])) {
    numberPress("8");
} else if (isset($_GET['9'])) {
    numberPress("9");
} else if (isset($_GET['+'])) {
    $state = "+";
    $state2 = "";
    $hidden = $show;
} else if (isset($_GET['-'])) {
    $state = "-";
    $state2 = "";
    $hidden = $show;
} else if (isset($_GET['*'])) {
    $state = "*";
    $state2 = "";
    $hidden = $show;
} else if (isset($_GET['/'])) {
    $state = "/";
    $state2 = "";
    $hidden = $show;
}
 else if (isset($_GET['=']))
 {
    if($state == "+")
    {
        $show = $hidden + $show;
    }
    else if($state == "-")
    {
        $show = $hidden - $show;
    }
    else if($state == "*")
    {
        $show = $hidden * $show;
    }
    else if($state == "/")
    {
        $show = $hidden / $show;
    }
    $state = "/";
    $state2 = "";
    $hidden = "";
 }
else
{
    $show = 0;
    $state = "/";
    $state2 = "";
    $hidden = "";
}

?>


<html>

<head>
    <meta charset="utf8">
    <title>เครื่องคิดเลข</title>
    <style type="text/css">
        * {
            font-size: 30pt;
        }
        input
        {
            font-size: 30pt;
        }
    </style>
</head>

<body>
    <form action="" method="GET">

        <table height="300">
            <tr>
                <td colspan="4">
                    <input type="text" name="show" value="<?php echo $show; ?>" style="text-align:right"></input>
                    <input type="hidden" name="hidden" value="<?php echo $hidden; ?>"></input>
                    <input type="hidden" name="state" value="<?php echo $state; ?>"></input>
                    <input type="hidden" name="state2" value="<?php echo $state2; ?>"></input>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="7" value="7" />
                </td>
                <td>
                    <input type="submit" name="8" value="8" />
                </td>
                <td>
                    <input type="submit" name="9" value="9" />
                </td>
                <td>
                    <input type="submit" name="/" value="/" />
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="4" value="4" />
                </td>
                <td>
                    <input type="submit" name="5" value="5" />
                </td>
                <td>
                    <input type="submit" name="6" value="6" />
                </td>
                <td>
                    <input type="submit" name="*" value="*" />
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="1" value="1" />
                </td>
                <td>
                    <input type="submit" name="2" value="2" />
                </td>
                <td>
                    <input type="submit" name="3" value="3" />
                </td>
                <td>
                    <input type="submit" name="-" value="-" />
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="0" value="0" />
                </td>
                <td colspan="2">
                    <input type="submit" name="=" style="width: 70px;" value="=" />
                </td>
                <td>
                    <input type="submit" name="+" value="+" />
                </td>
            </tr>
        </table>
    </form>
</body>


</html>