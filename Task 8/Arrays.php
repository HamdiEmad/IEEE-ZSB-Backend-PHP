<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Testing</title>
</head>
<body>
    <h1> Some programming languages </h1>
    <?php
        $langs = ["PHP", "C", "Java", "Python"];
    ?>
    <ul>
        <?php foreach ($langs as $lang) {
            echo "<li>$lang</li>";
        } ?>
    </ul>
    <br>
    <p> <?= $langs[0] ?> </p>
    <br>
    <h1> Associative arrays (2D Arrays) </h1>
    <?php
        $player = [
            [
                'name' => 'Osama',
                'Age' => '52',
                'Address' => 'Nobariya'
            ],
            [
                'name' => 'Lotfy',
                'Age' => '63',
                'Address' => 'Hosayniya'
            ],
            [
                'name' => 'Abbas',
                'Age' => '72',
                'Address' => 'Abbasiya'
            ]];
    ?>
</body>
</html>


