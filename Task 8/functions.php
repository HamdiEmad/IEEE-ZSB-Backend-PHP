<?php
$players = [
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
    function filterByName($players, $name)
    {
        $filtered = [];
        foreach ($players as $player) {
            if ($players['name'] === $name) {
                $filtered[] = $player;
            }
        }
        return $filtered;
    }
    filterByName($players, 'Abbas');
    ?>


