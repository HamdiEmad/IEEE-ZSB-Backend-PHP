<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Testing</title>
    <style>
        body {
            display: grid;
            place-items: center;
            height: 100vh;
            margin: 0;
            font-family: sans-serif;
        }
    </style>
</head>
<body>
    <?php
        $name = "Lotfy Elganainy";
        $mask = true;
        if ($mask) {
            $message = "Access approved";
        }
        else {
            $message = "Access denied";
        }
    ?>
<h1>
    <?= $message; ?>
</h1>
</body>
</html>


