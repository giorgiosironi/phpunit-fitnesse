<?php

abstract class FitnesseTestCase extends PHPUnit_Framework_TestCase
{
    public static function tableDataProvider()
    {
        $testClass = get_called_class();
        $table = explode("\n", $testClass::$table);
        $tableData = array();
        $header = $table[0];
        preg_match('/ ([^ ]+)$/', $header, $matches);
        $function = $matches[1];
        unset($table[0]);
        foreach ($table as $line) {
            list($input1, $input2, $output) = explode(" ", $line);
            $inputs = array($input1, $input2);
            $tableData[] = array($function, $inputs, $output);
        }
        return $tableData;
    }

    /**
     * @dataProvider tableDataProvider
     */
    public function testTable($function, $inputs, $output)
    {
        $this->assertEquals($output, call_user_func_array($function, $inputs));
    }
}
