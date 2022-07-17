<?php
class Main extends Index {
    private $rubik = [];
    private $movements = ['u', 'u1', 'r', 'r1', 'd', 'd1', 'l', 'l1', 'f', 'f1', 'b', 'b1'];

    public function __construct() {
        parent::__construct();
        //1w 2o 3g 4r 5b 6y
        $this->rubik = [
            'owb' => [2 => 'orange', 1 => 'white', 5 => 'blue'], //top
            'bw' => [5 => 'blue', 1 => 'white'],
            'rwb' => [4 => 'red', 1 => 'white', 5 => 'blue'],
            'ow' => [2 => 'orange', 1 => 'white'],
            'w' => [1 => 'white'],
            'rw' => [4 => 'red', 1 => 'white'],
            'owg' => [2 => 'orange', 1 => 'white', 3 => 'green'],
            'gw' => [3 => 'green', 1 => 'white'],
            'rwg' => [4 => 'red', 1 => 'white', 3 => 'green'], //top
            'go' => [3 => 'green', 2 => 'orange'], //mid
            'g' => [3 => 'green'],
            'gr' => [3 => 'green', 4 => 'red'],
            'r' => [4 => 'red'],
            'rb' => [4 => 'red', 5 => 'blue'],
            'b' => [5 => 'blue'],
            'bo' => [5 => 'blue', 2 => 'orange'],
            'o' => [2 => 'orange'], //mid
            'oyb' => [2 => 'orange', 6 => 'yellow', 5 => 'blue'], //bott
            'by' => [5 => 'blue', 6 => 'yellow'],
            'byr' => [5 => 'blue', 6 => 'yellow', 4 => 'red'],
            'oy' => [2 => 'orange', 6 => 'yellow'],
            'y' => [6 => 'yellow'],
            'ry' => [4 => 'red', 6 => 'yellow'],
            'gyo' => [3 => 'green', 6 => 'yellow', 2 => 'orange'],
            'gy' => [3 => 'green', 6 => 'yellow'],
            'gyr' => [3 => 'green', 6 => 'yellow', 4 => 'red'], //bott
        ];

        if (empty($_SESSION['cube'])) {
            $this->sCube();
        }
    }

    public function sCube() { //start
        $_SESSION['cube']['up'] = [ //white
            1 => $this->rubik['owb'][1],
            2 => $this->rubik['bw'][1],
            3 => $this->rubik['rwb'][1],
            4 => $this->rubik['ow'][1],
            5 => $this->rubik['w'][1], //mid
            6 => $this->rubik['rw'][1],
            7 => $this->rubik['owg'][1],
            8 => $this->rubik['gw'][1],
            9 => $this->rubik['rwg'][1],
        ];

        $_SESSION['cube']['left'] = [ //orange
            1 => $this->rubik['owb'][2],
            2 => $this->rubik['ow'][2],
            3 => $this->rubik['owg'][2],
            4 => $this->rubik['bo'][2],
            5 => $this->rubik['o'][2], //mid
            6 => $this->rubik['go'][2],
            7 => $this->rubik['oyb'][2],
            8 => $this->rubik['oy'][2],
            9 => $this->rubik['gyo'][2],
        ];

        $_SESSION['cube']['fw'] = [ //green
            1 => $this->rubik['owg'][3],
            2 => $this->rubik['gw'][3],
            3 => $this->rubik['rwg'][3],
            4 => $this->rubik['go'][3],
            5 => $this->rubik['g'][3], //mid
            6 => $this->rubik['gr'][3],
            7 => $this->rubik['gyo'][3],
            8 => $this->rubik['gy'][3],
            9 => $this->rubik['gyr'][3],
        ];

        $_SESSION['cube']['right'] = [ //red
            1 => $this->rubik['rwg'][4],
            2 => $this->rubik['rw'][4],
            3 => $this->rubik['rwb'][4],
            4 => $this->rubik['gr'][4],
            5 => $this->rubik['r'][4], //mid
            6 => $this->rubik['rb'][4],
            7 => $this->rubik['gyr'][4],
            8 => $this->rubik['ry'][4],
            9 => $this->rubik['byr'][4],
        ];

        $_SESSION['cube']['back'] = [ //blue
            1 => $this->rubik['rwb'][5],
            2 => $this->rubik['bw'][5],
            3 => $this->rubik['owb'][5],
            4 => $this->rubik['rb'][5],
            5 => $this->rubik['b'][5], //mid
            6 => $this->rubik['bo'][5],
            7 => $this->rubik['byr'][5],
            8 => $this->rubik['by'][5],
            9 => $this->rubik['oyb'][5],
        ];

        $_SESSION['cube']['down'] = [ //yellow
            1 => $this->rubik['byr'][6],
            2 => $this->rubik['by'][6],
            3 => $this->rubik['oyb'][6],
            4 => $this->rubik['ry'][6],
            5 => $this->rubik['y'][6], //mid
            6 => $this->rubik['oy'][6],
            7 => $this->rubik['gyr'][6],
            8 => $this->rubik['gy'][6],
            9 => $this->rubik['gyo'][6],
        ];
    }

    private function move($move) { // up/1, right/1, down/1, left/1, front/1, back/1
        if ($move == 'u') {
            $bkp = [
                1 => $_SESSION['cube']['fw'][1],
                2 => $_SESSION['cube']['fw'][2],
                3 => $_SESSION['cube']['fw'][3],
            ];

            $_SESSION['cube']['fw'][1] = $_SESSION['cube']['right'][1];
            $_SESSION['cube']['fw'][2] = $_SESSION['cube']['right'][2];
            $_SESSION['cube']['fw'][3] = $_SESSION['cube']['right'][3];

            $_SESSION['cube']['right'][1] = $_SESSION['cube']['back'][1];
            $_SESSION['cube']['right'][2] = $_SESSION['cube']['back'][2];
            $_SESSION['cube']['right'][3] = $_SESSION['cube']['back'][3];

            $_SESSION['cube']['back'][1] = $_SESSION['cube']['left'][1];
            $_SESSION['cube']['back'][2] = $_SESSION['cube']['left'][2];
            $_SESSION['cube']['back'][3] = $_SESSION['cube']['left'][3];

            $_SESSION['cube']['left'][1] = $bkp[1];
            $_SESSION['cube']['left'][2] = $bkp[2];
            $_SESSION['cube']['left'][3] = $bkp[3];

            $this->rotation('up');
        } else if ($move == 'u1') {
            $bkp = [
                1 => $_SESSION['cube']['fw'][1],
                2 => $_SESSION['cube']['fw'][2],
                3 => $_SESSION['cube']['fw'][3],
            ];

            $_SESSION['cube']['fw'][1] = $_SESSION['cube']['left'][1];
            $_SESSION['cube']['fw'][2] = $_SESSION['cube']['left'][2];
            $_SESSION['cube']['fw'][3] = $_SESSION['cube']['left'][3];

            $_SESSION['cube']['left'][1] = $_SESSION['cube']['back'][1];
            $_SESSION['cube']['left'][2] = $_SESSION['cube']['back'][2];
            $_SESSION['cube']['left'][3] = $_SESSION['cube']['back'][3];

            $_SESSION['cube']['back'][1] = $_SESSION['cube']['right'][1];
            $_SESSION['cube']['back'][2] = $_SESSION['cube']['right'][2];
            $_SESSION['cube']['back'][3] = $_SESSION['cube']['right'][3];

            $_SESSION['cube']['right'][1] = $bkp[1];
            $_SESSION['cube']['right'][2] = $bkp[2];
            $_SESSION['cube']['right'][3] = $bkp[3];

            $this->rotation1('up');
        } else if ($move == 'r') {
            $bkp = [
                3 => $_SESSION['cube']['fw'][3],
                6 => $_SESSION['cube']['fw'][6],
                9 => $_SESSION['cube']['fw'][9],
            ];

            $_SESSION['cube']['fw'][3] = $_SESSION['cube']['down'][7];
            $_SESSION['cube']['fw'][6] = $_SESSION['cube']['down'][4];
            $_SESSION['cube']['fw'][9] = $_SESSION['cube']['down'][1];

            $_SESSION['cube']['down'][1] = $_SESSION['cube']['back'][1];
            $_SESSION['cube']['down'][4] = $_SESSION['cube']['back'][4];
            $_SESSION['cube']['down'][7] = $_SESSION['cube']['back'][7];

            $_SESSION['cube']['back'][1] = $_SESSION['cube']['up'][3];
            $_SESSION['cube']['back'][4] = $_SESSION['cube']['up'][6];
            $_SESSION['cube']['back'][7] = $_SESSION['cube']['up'][9];

            $_SESSION['cube']['up'][3] = $bkp[3];
            $_SESSION['cube']['up'][6] = $bkp[6];
            $_SESSION['cube']['up'][9] = $bkp[9];

            $this->rotation('right');
        } else if ($move == 'r1') {
            $bkp = [
                3 => $_SESSION['cube']['fw'][3],
                6 => $_SESSION['cube']['fw'][6],
                9 => $_SESSION['cube']['fw'][9],
            ];

            $_SESSION['cube']['fw'][3] = $_SESSION['cube']['up'][3];
            $_SESSION['cube']['fw'][6] = $_SESSION['cube']['up'][6];
            $_SESSION['cube']['fw'][9] = $_SESSION['cube']['up'][9];

            $_SESSION['cube']['up'][3] = $_SESSION['cube']['back'][7];
            $_SESSION['cube']['up'][6] = $_SESSION['cube']['back'][4];
            $_SESSION['cube']['up'][9] = $_SESSION['cube']['back'][1];

            $_SESSION['cube']['back'][1] = $_SESSION['cube']['down'][1];
            $_SESSION['cube']['back'][4] = $_SESSION['cube']['down'][4];
            $_SESSION['cube']['back'][7] = $_SESSION['cube']['down'][7];

            $_SESSION['cube']['down'][1] = $bkp[9];
            $_SESSION['cube']['down'][4] = $bkp[6];
            $_SESSION['cube']['down'][7] = $bkp[3];

            $this->rotation1('right');
        } else if ($move == 'd') {
            $bkp = [
                7 => $_SESSION['cube']['fw'][7],
                8 => $_SESSION['cube']['fw'][8],
                9 => $_SESSION['cube']['fw'][9],
            ];

            $_SESSION['cube']['fw'][7] = $_SESSION['cube']['left'][7];
            $_SESSION['cube']['fw'][8] = $_SESSION['cube']['left'][8];
            $_SESSION['cube']['fw'][9] = $_SESSION['cube']['left'][9];

            $_SESSION['cube']['left'][7] = $_SESSION['cube']['back'][7];
            $_SESSION['cube']['left'][8] = $_SESSION['cube']['back'][8];
            $_SESSION['cube']['left'][9] = $_SESSION['cube']['back'][9];

            $_SESSION['cube']['back'][7] = $_SESSION['cube']['right'][7];
            $_SESSION['cube']['back'][8] = $_SESSION['cube']['right'][8];
            $_SESSION['cube']['back'][9] = $_SESSION['cube']['right'][9];

            $_SESSION['cube']['right'][7] = $bkp[7];
            $_SESSION['cube']['right'][8] = $bkp[8];
            $_SESSION['cube']['right'][9] = $bkp[9];

            $this->rotation('down');
        } else if ($move == 'd1') {
            $bkp = [
                7 => $_SESSION['cube']['fw'][7],
                8 => $_SESSION['cube']['fw'][8],
                9 => $_SESSION['cube']['fw'][9],
            ];

            $_SESSION['cube']['fw'][7] = $_SESSION['cube']['right'][7];
            $_SESSION['cube']['fw'][8] = $_SESSION['cube']['right'][8];
            $_SESSION['cube']['fw'][9] = $_SESSION['cube']['right'][9];

            $_SESSION['cube']['right'][7] = $_SESSION['cube']['back'][7];
            $_SESSION['cube']['right'][8] = $_SESSION['cube']['back'][8];
            $_SESSION['cube']['right'][9] = $_SESSION['cube']['back'][9];

            $_SESSION['cube']['back'][7] = $_SESSION['cube']['left'][7];
            $_SESSION['cube']['back'][8] = $_SESSION['cube']['left'][8];
            $_SESSION['cube']['back'][9] = $_SESSION['cube']['left'][9];

            $_SESSION['cube']['left'][7] = $bkp[7];
            $_SESSION['cube']['left'][8] = $bkp[8];
            $_SESSION['cube']['left'][9] = $bkp[9];

            $this->rotation1('down');
        } else if ($move == 'l') {
            $bkp = [
                1 => $_SESSION['cube']['fw'][1],
                4 => $_SESSION['cube']['fw'][4],
                7 => $_SESSION['cube']['fw'][7],
            ];

            $_SESSION['cube']['fw'][1] = $_SESSION['cube']['up'][1];
            $_SESSION['cube']['fw'][4] = $_SESSION['cube']['up'][4];
            $_SESSION['cube']['fw'][7] = $_SESSION['cube']['up'][7];

            $_SESSION['cube']['up'][1] = $_SESSION['cube']['back'][9];
            $_SESSION['cube']['up'][4] = $_SESSION['cube']['back'][6];
            $_SESSION['cube']['up'][7] = $_SESSION['cube']['back'][3];

            $_SESSION['cube']['back'][3] = $_SESSION['cube']['down'][3];
            $_SESSION['cube']['back'][6] = $_SESSION['cube']['down'][6];
            $_SESSION['cube']['back'][9] = $_SESSION['cube']['down'][9];

            $_SESSION['cube']['down'][3] = $bkp[7];
            $_SESSION['cube']['down'][6] = $bkp[4];
            $_SESSION['cube']['down'][9] = $bkp[1];

            $this->rotation('left');
        } else if ($move == 'l1') {
            $bkp = [
                1 => $_SESSION['cube']['fw'][1],
                4 => $_SESSION['cube']['fw'][4],
                7 => $_SESSION['cube']['fw'][7],
            ];

            $_SESSION['cube']['fw'][1] = $_SESSION['cube']['down'][9];
            $_SESSION['cube']['fw'][4] = $_SESSION['cube']['down'][6];
            $_SESSION['cube']['fw'][7] = $_SESSION['cube']['down'][3];

            $_SESSION['cube']['down'][3] = $_SESSION['cube']['back'][3];
            $_SESSION['cube']['down'][6] = $_SESSION['cube']['back'][6];
            $_SESSION['cube']['down'][9] = $_SESSION['cube']['back'][9];

            $_SESSION['cube']['back'][3] = $_SESSION['cube']['up'][7];
            $_SESSION['cube']['back'][6] = $_SESSION['cube']['up'][4];
            $_SESSION['cube']['back'][9] = $_SESSION['cube']['up'][1];

            $_SESSION['cube']['up'][1] = $bkp[1];
            $_SESSION['cube']['up'][4] = $bkp[4];
            $_SESSION['cube']['up'][7] = $bkp[7];

            $this->rotation1('left');
        } else if ($move == 'f') {
            $bkp = [
                7 => $_SESSION['cube']['up'][7],
                8 => $_SESSION['cube']['up'][8],
                9 => $_SESSION['cube']['up'][9],
            ];

            $_SESSION['cube']['up'][7] = $_SESSION['cube']['left'][9];
            $_SESSION['cube']['up'][8] = $_SESSION['cube']['left'][6];
            $_SESSION['cube']['up'][9] = $_SESSION['cube']['left'][3];

            $_SESSION['cube']['left'][3] = $_SESSION['cube']['down'][9];
            $_SESSION['cube']['left'][6] = $_SESSION['cube']['down'][8];
            $_SESSION['cube']['left'][9] = $_SESSION['cube']['down'][7];

            $_SESSION['cube']['down'][7] = $_SESSION['cube']['right'][1];
            $_SESSION['cube']['down'][8] = $_SESSION['cube']['right'][4];
            $_SESSION['cube']['down'][9] = $_SESSION['cube']['right'][7];

            $_SESSION['cube']['right'][1] = $bkp[7];
            $_SESSION['cube']['right'][4] = $bkp[8];
            $_SESSION['cube']['right'][7] = $bkp[9];

            $this->rotation('fw');
        } else if ($move == 'f1') {
            $bkp = [
                7 => $_SESSION['cube']['up'][7],
                8 => $_SESSION['cube']['up'][8],
                9 => $_SESSION['cube']['up'][9],
            ];

            $_SESSION['cube']['up'][7] = $_SESSION['cube']['right'][1];
            $_SESSION['cube']['up'][8] = $_SESSION['cube']['right'][4];
            $_SESSION['cube']['up'][9] = $_SESSION['cube']['right'][7];

            $_SESSION['cube']['right'][1] = $_SESSION['cube']['down'][7];
            $_SESSION['cube']['right'][4] = $_SESSION['cube']['down'][8];
            $_SESSION['cube']['right'][7] = $_SESSION['cube']['down'][9];

            $_SESSION['cube']['down'][7] = $_SESSION['cube']['left'][9];
            $_SESSION['cube']['down'][8] = $_SESSION['cube']['left'][6];
            $_SESSION['cube']['down'][9] = $_SESSION['cube']['left'][3];

            $_SESSION['cube']['left'][3] = $bkp[9];
            $_SESSION['cube']['left'][6] = $bkp[8];
            $_SESSION['cube']['left'][9] = $bkp[7];

            $this->rotation1('fw');
        } else if ($move == 'b') {
            $bkp = [
                1 => $_SESSION['cube']['up'][1],
                2 => $_SESSION['cube']['up'][2],
                3 => $_SESSION['cube']['up'][3],
            ];

            $_SESSION['cube']['up'][1] = $_SESSION['cube']['right'][3];
            $_SESSION['cube']['up'][2] = $_SESSION['cube']['right'][6];
            $_SESSION['cube']['up'][3] = $_SESSION['cube']['right'][9];

            $_SESSION['cube']['right'][3] = $_SESSION['cube']['down'][1];
            $_SESSION['cube']['right'][6] = $_SESSION['cube']['down'][2];
            $_SESSION['cube']['right'][9] = $_SESSION['cube']['down'][3];

            $_SESSION['cube']['down'][1] = $_SESSION['cube']['left'][7];
            $_SESSION['cube']['down'][2] = $_SESSION['cube']['left'][4];
            $_SESSION['cube']['down'][3] = $_SESSION['cube']['left'][1];

            $_SESSION['cube']['left'][1] = $bkp[3];
            $_SESSION['cube']['left'][4] = $bkp[2];
            $_SESSION['cube']['left'][7] = $bkp[1];

            $this->rotation('back');
        } else if ($move == 'b1') {
            $bkp = [
                1 => $_SESSION['cube']['up'][1],
                2 => $_SESSION['cube']['up'][2],
                3 => $_SESSION['cube']['up'][3],
            ];

            $_SESSION['cube']['up'][1] = $_SESSION['cube']['left'][7];
            $_SESSION['cube']['up'][2] = $_SESSION['cube']['left'][4];
            $_SESSION['cube']['up'][3] = $_SESSION['cube']['left'][1];

            $_SESSION['cube']['left'][1] = $_SESSION['cube']['down'][3];
            $_SESSION['cube']['left'][4] = $_SESSION['cube']['down'][2];
            $_SESSION['cube']['left'][7] = $_SESSION['cube']['down'][1];

            $_SESSION['cube']['down'][1] = $_SESSION['cube']['right'][3];
            $_SESSION['cube']['down'][2] = $_SESSION['cube']['right'][6];
            $_SESSION['cube']['down'][3] = $_SESSION['cube']['right'][9];

            $_SESSION['cube']['right'][3] = $bkp[1];
            $_SESSION['cube']['right'][6] = $bkp[2];
            $_SESSION['cube']['right'][9] = $bkp[3];

            $this->rotation1('back');
        }
    }

    private function rotation($face) {
        $bkp = $_SESSION['cube'][$face];

        $_SESSION['cube'][$face][1] = $bkp[7];
        $_SESSION['cube'][$face][2] = $bkp[4];
        $_SESSION['cube'][$face][3] = $bkp[1];

        $_SESSION['cube'][$face][4] = $bkp[8];
        $_SESSION['cube'][$face][6] = $bkp[2];

        $_SESSION['cube'][$face][7] = $bkp[9];
        $_SESSION['cube'][$face][8] = $bkp[6];
        $_SESSION['cube'][$face][9] = $bkp[3];
    }

    private function rotation1($face) {
        $bkp = $_SESSION['cube'][$face];

        $_SESSION['cube'][$face][1] = $bkp[3];
        $_SESSION['cube'][$face][2] = $bkp[6];
        $_SESSION['cube'][$face][3] = $bkp[9];

        $_SESSION['cube'][$face][4] = $bkp[2];
        $_SESSION['cube'][$face][6] = $bkp[8];

        $_SESSION['cube'][$face][7] = $bkp[1];
        $_SESSION['cube'][$face][8] = $bkp[4];
        $_SESSION['cube'][$face][9] = $bkp[7];
    }

    public function gCube() { //get
        $json = [];

        foreach ($_SESSION['cube']['up'] as $key => $piece) {
            $json['up'][$key] = $piece;
        }

        foreach ($_SESSION['cube']['left'] as $key => $piece) {
            $json['left'][$key] = $piece;
        }

        foreach ($_SESSION['cube']['fw'] as $key => $piece) {
            $json['fw'][$key] = $piece;
        }

        foreach ($_SESSION['cube']['right'] as $key => $piece) {
            $json['right'][$key] = $piece;
        }

        foreach ($_SESSION['cube']['back'] as $key => $piece) {
            $json['back'][$key] = $piece;
        }

        foreach ($_SESSION['cube']['down'] as $key => $piece) {
            $json['down'][$key] = $piece;
        }

        echo json_encode($json, 1);
    }

    public function mCube() {
        $json = [];

        if (!isset($this->request->move)) {
            $json['error'] = 'No movement specified.';
            echo json_encode($json, 1);
            return 0;
        }

        $move = $this->request->move;

        if (!in_array($move, $this->movements)) {
            $json['error'] = 'Incorrect movement.';
            echo json_encode($json, 1);
            return 0;
        }

        $this->move($move);

        $json['success'] = 1;
        echo json_encode($json, 1);
    }

    public function randCube() {
        $json = [];
        $moves = rand(10, 100);

        for ($i = 0; $i < $moves; $i++) {
            $move = $this->movements[rand(0, 11)];
            $this->move($move);
        }

        $json['success'] = 1;
    }
}
