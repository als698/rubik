<?php
require_once('app/config.php');
require_once('app/main.php');

class Index {
    public $request = [];

    public function __construct() {
        $this->request = json_decode(file_get_contents("php://input"));
        if (isset($this->request->session)) {
            session_id($this->request->session);
            session_start();
        } else {
            session_start();
        }
    }
}

if (isset($_GET['r'])) {
    $app = new Main();

    switch ($_GET['r']) {
        case 'getSess':
            echo json_encode(session_id(), 1);
            break;
        case 'getCube':
            $app->gCube();
            break;
        case 'moveCube':
            $app->mCube();
            break;
        case 'randCube':
            $app->randCube();
            break;
        case 'resetCube':
            $app->sCube();
            break;
        default:
            exit(0);
    }
}
