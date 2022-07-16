<?php

class Main {
    public $rubik = [];
    public $cube = [];

    public function __construct() {
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

        $this->sCube();
    }

    private function sCube() { //start
        $this->cube['up'] = [ //white
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

        $this->cube['left'] = [ //orange
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

        $this->cube['fw'] = [ //green
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

        $this->cube['right'] = [ //red
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

        $this->cube['back'] = [ //blue
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

        $this->cube['down'] = [ //yellow
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

    public function gCube() { //get
        $json = [];

        foreach ($this->cube['up'] as $key => $piece) {
            $json['up'][$key] = $piece;
        }

        foreach ($this->cube['left'] as $key => $piece) {
            $json['left'][$key] = $piece;
        }

        foreach ($this->cube['fw'] as $key => $piece) {
            $json['fw'][$key] = $piece;
        }

        foreach ($this->cube['right'] as $key => $piece) {
            $json['right'][$key] = $piece;
        }

        foreach ($this->cube['back'] as $key => $piece) {
            $json['back'][$key] = $piece;
        }

        foreach ($this->cube['down'] as $key => $piece) {
            $json['down'][$key] = $piece;
        }

        echo json_encode($json, 1);
    }
}
