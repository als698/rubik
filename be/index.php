<?php
require_once('app/config.php');
require_once('app/main.php');

$app = new Main();

if (isset($_GET['r'])) {
    if ($_GET['r'] == 'getCube') {
        $app->gCube();
    }
}
