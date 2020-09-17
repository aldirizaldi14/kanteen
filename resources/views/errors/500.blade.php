<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error 500</title>
    <style>
    @font-face {
        font-family: zeroOne;
        src: url(afonts.otf);
    }

    body {
        font-family: zeroOne;
    }

    .full-height {
        height: 75vh;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }

    h1 {
        font-size: 60px;
        text-align: center;
    }
    </style>
</head>

<body>
    <div class="flex-center position-ref full-height">
            <h1>
                Error 500
            </h1>
            <br>
            <h3>{{$exception->getMessage()}}</h3>
    </div>
</body>

</html>