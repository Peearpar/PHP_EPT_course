<html>
<head>
    <script type="text/javascript">
        var vx = 1, vy = 2;
        function start(){
            window.setInterval(xxx, 10);
        }
        function xxx()
        {
            var ball = document.getElementById('ball');
            console.log(ball.style.left);
            var rect_ball = ball.getBoundingClientRect();

            ball.style.left = rect_ball.left +vx;
            ball.style.top = rect_ball.top +vy;

            var w = window,
            d = document,
            e = d.documentElement,
            g = d.getElementsByTagName('body')[0],
            client_width = w.innerWidth || e.clientWidth || g.clientWidth,
            client_height = w.innerHeight || e.clientHeight || g.clientHeight;

            if(rect_ball.top < 0)
            {
                ball.style.top = 0;
                vy *= -1;
            }

            if(rect_ball.top + 100 > client_height)
            {
                ball.style.top = client_height - 100;
                vy *= -1;
            }

            if(rect_ball.left < 0)
            {
                ball.style.left = 0;
                vx *= -1;
            }

            if(rect_ball.left + 100 > client_width)
            {
                ball.style.left = client_width - 100;
                vx *= -1;
            }

        }
    </script>
    <style type="text/css">
        .ball
        {
            width: 100px;
            height: 100px;
            border-radius: 50px;
            background-color: red;
            margin: 0px;
            position: absolute;
            top: 100px;
            left: 50px;
        }
    </style>
</head>
<body onload="start()">
    <div id="ball" class = "ball">
    </div>
</body>
</html>