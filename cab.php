<?php
global $distance, $dis1, $dis2, $pick, $drop, $cab, $lugg, $charge;
global $ff;
$pick = $_REQUEST['PICK'];
$drop = $_REQUEST['DROP'];
$cab = $_REQUEST['CAB'];
$lugg = $_REQUEST['LUGG'];

$sources = array(
    'Charbagh' => 0,
    'Indra Nagar' => 10,
    'BBD' => 30,
    'Barabanki' => 60,
    'Faizabad' => 100,
    'Basti' => 150,
    'Gorakhpur' => 210
);
$c = count($sources);

foreach ($sources as $key => $value) {
    if ($key == $pick) {
        $dis1 = $value;
    }
}

foreach ($sources as $key => $value) {
    if ($key == $drop) {
        $dis2 = $value;
    }
}

$distance = abs($dis1 - $dis2);

if ($cab == 'CedMicro') {
    $ff = 50;
    if ($distance > 0 && $distance <= 10) {
        $ff += ($distance * 13.50);
    }
    elseif ($distance > 10 && $distance <= 50) {
        $ff += (10 * 13.50);
        $distance = $distance - 10;
        $ff += ($distance * 12.00);
    }
    elseif ($distance > 50 && $distance <= 150) {
        $ff += (10 * 13.50);
        $distance = $distance - 10;
        $ff += (50 * 12.00);
        $distance = $distance - 50;
        $ff += ($distance * 10.20);
    }

    else if ($distance > 150) {
        $ff += (10 * 13.50);
        $distance = $distance - 10;
        $ff += (50 * 12.00);
        $distance = $distance - 50;
        $ff += (100 * 10.20);
        $distance = $distance - 100;
        $ff += ($distance * 8.50);
    }
}

if ($cab == 'CedMini') {
    $ff = 150;
    if ($distance > 0 && $distance <= 10) {
        $ff += ($distance * 14.50);
    }

    else if ($distance > 10 && $distance <= 50) {
        $ff += (10 * 14.50);
        $distance = $distance - 10;
        $ff += ($distance * 13.00);
    }

    else if ($distance > 50 && $distance <= 150) {
        $ff += (10 * 14.50);
        $distance = $distance - 10;
        $ff += (50 * 13.00);
        $distance = $distance - 50;
        $ff += ($distance * 11.20);
    }

    else if ($distance > 150)
    {
        $ff += (10 * 14.50);
        $distance = $distance - 10;
        $ff += (50 * 13.00);
        $distance = $distance - 50;
        $ff += (100 * 11.20);
        $distance = $distance - 100;
        $ff += ($distance * 9.50);
    }
}

if ($cab == 'CedRoyal') {
    $ff = 200;
    if ($distance > 0 && $distance <= 10) {
        $ff += ($distance * 15.50);
    }

    else if ($distance > 10 && $distance <= 50) {
        $ff += (10 * 15.50);
        $distance = $distance - 10;
        $ff += ($distance * 14.00);
    }

    else if ($distance > 50 && $distance <= 150) {
        $ff += (10 * 15.50);
        $distance = $distance - 10;
        $ff += (50 * 14.00);
        $distance = $distance - 50;
        $ff += ($distance * 12.20);
    }

    else if ($distance > 150) {
        $ff += (10 * 15.50);
        $distance = $distance - 10;
        $ff += (50 * 14.00);
        $distance = $distance - 50;
        $ff += (100 * 12.20);
        $distance = $distance - 100;
        $ff += ($distance * 10.50);
    }
}
if ($cab == 'CedSUV') {
    $ff = 250;
    if ($distance > 0 && $distance <= 10) {
        $ff += ($distance * 16.50);
    }

    else if ($distance > 10 && $distance <= 50) {
        $ff += (10 * 16.50);
        $distance = $distance - 10;
        $ff += ($distance * 15.00);
    }

    else if ($distance > 50 && $distance <= 150) {
        $ff += (10 * 16.50);
        $distance = $distance - 10;
        $ff += (50 * 15.00);
        $distance = $distance - 50;
        $ff += ($distance * 13.20);
    }

    else if ($distance > 150) {
        $ff += (10 * 16.50);
        $distance = $distance - 10;
        $ff += (50 * 15.00);
        $distance = $distance - 50;
        $ff += (100 * 13.20);
        $distance = $distance - 100;
        $ff += ($distance * 11.50);
    }
}

if ($cab == 'CedMini' || $cab == 'CedRoyal') {
    if ($lugg == 0) {
        echo $ff;
    }

    if ($lugg > 0 && $lugg <= 10) {
        $charge = 50;
        $ff += $charge;
        echo $ff;
    }
    else if ($lugg > 10 && $lugg <= 20) {
        $charge = 100;
        $ff += $charge;
        echo $ff;
    }
    else if ($lugg > 20)
    {
        $charge = 200;
        $ff += $charge;
        echo $ff;
    }
}
if ($cab == "CedMicro") {
    echo $ff;
}

if ($cab == 'CedSUV') {
    if ($lugg == 0) {
        echo $ff;
    }
    if ($lugg > 0 && $lugg <= 10) {
        $charge = 100;
        $ff += $charge;
        echo $ff;
    }
    else if ($lugg > 10 && $lugg <= 20) {
        $charge = 200;
        $ff += $charge;
        echo $ff;
    }
    else if ($lugg > 20) {
        $charge = 400;
        $ff += $charge;
        echo $ff;
    }
}

?>
