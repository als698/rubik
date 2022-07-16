<?php

$rubik = [
    'owb' => ['orange', 'white', 'blue'], //top
    'bw' => ['blue', 'white'],
    'rwb' => ['red', 'white', 'blue'],
    'ow' => ['orange', 'white'],
    'w' => 'white',
    'rw' => ['red', 'white'],
    'owg' => ['orange', 'white', 'green'],
    'gw' => ['green', 'white'],
    'rwg' => ['red', 'white', 'green'], //top
    'go' => ['green', 'orange'], //mid
    'g' => 'green',
    'gr' => ['green', 'red'],
    'r' => 'red',
    'rb' => ['red', 'blue'],
    'b' => 'blue',
    'bo' => ['blue', 'orange'],
    'o' => 'orange', //mid
    'oyb' => ['orange', 'yellow', 'blue'], //bott
    'by' => ['blue', 'yellow'],
    'byr' => ['blue', 'yellow', 'red'],
    'oy' => ['orange', 'yellow'],
    'y' => 'yellow',
    'ry' => ['red', 'yellow'],
    'gyo' => ['green', 'yellow', 'orange'],
    'gy' => ['green', 'yellow'],
    'gyr' => ['green', 'yellow', 'red'], //bott
];

$up = [ //white
    1 => $rubik['owb']['white'],
    2 => $rubik['bw']['white'],
    3 => $rubik['rwb']['white'],
    4 => $rubik['ow']['white'],
    5 => $rubik['w'], //mid
    6 => $rubik['rw']['white'],
    7 => $rubik['owg']['white'],
    8 => $rubik['gw']['white'],
    9 => $rubik['rwg']['white'],
];

$fw = [ //green
    1 => $rubik['owg']['green'],
    2 => $rubik['gw']['green'],
    3 => $rubik['rwg']['green'],
    4 => $rubik['go']['green'],
    5 => $rubik['g'], //mid
    6 => $rubik['gr']['green'],
    7 => $rubik['gyo']['green'],
    8 => $rubik['gy']['green'],
    9 => $rubik['gyr']['green'],
];

$left = [ //orange
    1 => $rubik['owb']['orange'],
    2 => $rubik['ow']['orange'],
    3 => $rubik['owg']['orange'],
    4 => $rubik['bo']['orange'],
    5 => $rubik['o'], //mid
    6 => $rubik['go']['orange'],
    7 => $rubik['oyb']['orange'],
    8 => $rubik['oy']['orange'],
    9 => $rubik['gyo']['orange'],
];

$right = [ //red
    1 => $rubik['rwg']['red'],
    2 => $rubik['rw']['red'],
    3 => $rubik['rwb']['red'],
    4 => $rubik['gr']['red'],
    5 => $rubik['r'], //mid
    6 => $rubik['rb']['red'],
    7 => $rubik['gyr']['red'],
    8 => $rubik['ry']['red'],
    9 => $rubik['byr']['red'],
];

$down = [ //yellow
    1 => $rubik['byr']['yellow'],
    2 => $rubik['by']['yellow'],
    3 => $rubik['oyb']['yellow'],
    4 => $rubik['ry']['yellow'],
    5 => $rubik['y'], //mid
    6 => $rubik['oy']['yellow'],
    7 => $rubik['gyr']['yellow'],
    8 => $rubik['gy']['yellow'],
    9 => $rubik['gyo']['yellow'],
];

$back = [ //blue
    1 => $rubik['rwb']['blue'],
    2 => $rubik['bw']['blue'],
    3 => $rubik['owb']['blue'],
    4 => $rubik['rb']['blue'],
    5 => $rubik['b'], //mid
    6 => $rubik['bo']['blue'],
    7 => $rubik['byr']['blue'],
    8 => $rubik['by']['blue'],
    9 => $rubik['oyb']['blue'],
];
