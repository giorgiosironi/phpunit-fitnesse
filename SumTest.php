<?php
require_once 'FitnesseTestCase.php';

function sum($a, $b)
{
    return $a + $b;
}

class SumText extends FitnesseTestCase
{
    public static $table = <<<EOT
a b sum
2 2 4
0 2 2
1 2 3
0 0 0
EOT;
}
