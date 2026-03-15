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
    echo "Trying string" . " concatenation";
    $name = "Abbas Eldemery";
    echo "<br>";
    echo $name;
    echo "<br>";
    ?>
    <h1>
        My name is "<?php echo $name; ?>"
    </h1>
</body>
</html>


