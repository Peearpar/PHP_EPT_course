<html>
    <head>
        <script type="text/javascript">
            function  start()
            {
                var div1 = document.getElemenyById('1');
                console.log(div1);
                div.innerHTML="HELLO";
            }
            function click1()
            {
                document.getElementById("2").innerHTML =  document.getElementById("2").innerHTML +"aaa"
            }
        </script>
        <script src="ept1.js"></script>
    </head>
    <body onload="start()">
        <div id = "1">
        </div>
        <div id = "2">
        </div>
        <button id = "btn1" onclick="click1(event)"> กดฉันสิ </button>
        <button id = "btn2" onclick="xxx()"> กดฉันสิ </button>
        <script>
            document.getElementById("2").innerHTML = "My First Javascript";
        </script>
    </body>
</html>