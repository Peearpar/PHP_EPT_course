<html>
    <head>
        <title>
        MM's Bag [Customers]</title>
        <meta charset="utf8"/>
        <script src="jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function()
            {
                console.log("xx");
                $("#button").click(function()
            {
                console.log("a");
                $("#data").load("backend.php", function(responseTxt, statusTxt, xhr)
                {
                    if(statusTxt == "success")
                    alert("External content loaded successfully!");
                    if(statusTxt == "error")
                    alert("Error: " + xhr.status + ": " + xhr.statusText);
                });
                console.log("c");
            });
            });

        </script>
    </head>
    <body>
        <h1>กรุณาเลือก Menu</h1>
        <ol>
        <li><button id="button">กดตรงนี้</button></li>
        <li>
            <div id ="data">

            </div>
        </li>
        </ol>
    </body>
</html>