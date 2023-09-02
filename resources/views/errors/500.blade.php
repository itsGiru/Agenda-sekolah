<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>500</title>
    <style>
        * {
            font-family: 'Segoe UI';
            font-weight: 300;
        }

        body {
            background: rgb(31, 120, 221);
        }

        h1 {
            color: white;
            font-size: 2.25em;
        }

        .text1 {
            width: 1100px;
            height: 200px;
            margin: -125px 50px 0px 150px;
        }

        .progress {
            margin: 0px 0px 0px 150px;
        }

        img {
            width: 135px;
        }

        p {
            color: white;
            font-size: 1.4em;
            font-weight: 350;
            margin: 5px 0px 0px 20px;
        }

        .smaller-p {
            color: white;
            font-size: 0.75em;
            font-weight: 350;
        }

        .qr-and-text {
            display: flex;
            width: 1200px;
            height: 135px;
            margin: 40px 50px 0px 150px;
        }

        .sadface {
            color: white;
            font-size: 12em;
            font-weight: 400;
            margin-left: 150px;
        }
    </style>
</head>

<body>
    <h1 class="sadface">:(</h1>
    <h1 class="text1">Your server ran into a problem and needs to restart. We're just collecting some error info, and then we'll restart for you.
    </h1>
    <h1 class="progress" id="progress">Restarting server. 0% complete</h1>
    <div class="qr-and-text">
        <img src="img/qr.png" style="color: white" alt="QR Code" class="qr-code">
        <p>For more information about this issue and possible fixes, visit https://www.windows.com/stopcode
            <br>
            <br>
            <span class="smaller-p">
                if you call our support person, give them this info:
                <br>
                Stop code: #INTERNAL_SERVER_ERROR
            </span>
        </p>
    </div>

    <script>
        function randomNumber(min, max) {
            const r = Math.random() * (max - min) + min;
            return Math.floor(r);
        }

        var i = 1;

        function myLoop() {
            randomNum = randomNumber(100, 4500)
            setTimeout(function() {
                document.getElementsByTagName('h1')[2].innerHTML = "Restarting server. " + i + "% complete";
                i++;
                if (i < 101) {
                    myLoop();
                }
            }, randomNum)
        }

        myLoop();
    </script>
</body>

</html>
