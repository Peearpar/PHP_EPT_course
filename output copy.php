<html>

<head>
    <script type="text/javascript">
        var windowObjectReference;

        function a1() {
            window.alert("Hello");
            // windowObjectReference = window.open("http://google.com");
        }

        function a2() {
            ///windowObjectReference.close();///
            document.write("Hello");
        }

        function a3() {
            var x = document.getElementByID('1');
            x.innerHTML = "กระดูกไก่";
            x.style.color = "red";
        }

        function a4() {
            console.log("Peearpar");
        }
    </script>
</head>

<body onload="start()">
    Hello
    <div id="1">
    </div>
    <div id="2">
    </div>
    <button id="btn1" onclick="a1()"> กดฉันสิ1 </button>
    <button id="btn2" onclick="a2()"> กดฉันสิ2 </button>
    <button id="btn3" onclick="a3()"> กดฉันสิ3 </button>
    <button id="btn4" onclick="a4()"> กดฉันสิ4 </button>
</body>

</html>