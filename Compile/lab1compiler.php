<?php echo '<pre>';
$code = file_get_contents('code.txt');
$keywords = array('function', 'Word', 'Integer', 'begin', 'if', 'then', 'and', 'end', 'var', 'while', 'do', 'Dec', 'Inc', '<>', '.', '>', ':=', '#', '=', '<', ':', ';', '(', ')', '+',"'","-","/","*");
print_r('Code: ' . PHP_EOL);
print_r($code . PHP_EOL);
end_Line();
print_r('__________________________________________' . PHP_EOL);
lab1($keywords,$code);

function lab1($keywords, $code)
{
    $codeLen = strlen($code);
    $buffer = '';
    $i = 0;
    $main_table = '';
    $error=0;

    $indentificator_table = array();
    $numeric_constant_table = array();
    $keywords_table = array();
    $place_table = array();

    while ($i < $codeLen) {

        if (!ctype_alpha($code[$i])) {
            if (in_array($code[$i], $keywords) || $code[$i] == ' ') {
                if ($buffer != "") {
                    if (in_array($buffer, $keywords)) {
                        if (!in_array($buffer, $keywords_table)) {
                            array_push($keywords_table, $buffer);
                        }
                        if ($buffer == 'function') { // Что бы таблица выводилась ровной йоу xD
                            $main_table = $main_table . ($buffer . '| Type: keywords ' . chr(9) . '| Index: ' . array_search($buffer, $keywords_table) . '<br>');

                        } else {
                            $main_table = $main_table . ($buffer . chr(9) . '| Type: keywords ' . chr(9) . '| Index: ' . array_search($buffer, $keywords_table) . '<br>');

                        }
                        array_push($place_table, array($buffer, 'keywords'));
                        $buffer = '';

                    } else {
                        if (!in_array($buffer, $indentificator_table)) {
                            array_push($indentificator_table, $buffer);
                        }
                        $main_table = $main_table . ($buffer . chr(9) . '| Type: indentificator ' . chr(9) . '| Index: ' . array_search($buffer, $indentificator_table) . '<br>');
                        array_push($place_table, array($buffer, 'indentificator'));
                        $buffer = '';

                    }
                }
                if (!ctype_space($code[$i])) {
                    if ($code[$i] == ':' && isset($code[$i + 1])) {
                        if ($code[$i + 1] == '=') {

                            if (!in_array(':=', $keywords_table)) {
                                array_push($keywords_table, ':=');
                            }
                            $main_table = $main_table . (':= ' . chr(9) . '| Type: keywords ' . chr(9) . '| Index: ' . array_search(':=', $keywords_table) . '<br>');
                            array_push($place_table, array(':=', 'keywords'));
                            $i = $i + 2;
                            continue;
                        } else {
                            if (!in_array(':', $keywords_table)) {
                                array_push($keywords_table, ':');

                            }

                            $main_table = $main_table . (': ' . chr(9) . '| Type: keywords ' . chr(9) . '| Index: ' . array_search(':', $keywords_table) . '<br>');
                            array_push($place_table, array(':', 'keywords'));
                        }
                    } elseif ($code[$i] == '<' && isset($code[$i + 1])) {
                        if ($code[$i + 1] == '>') {
                            if (!in_array('<>', $keywords_table)) {
                                array_push($keywords_table, '<>');

                            }
                            $main_table = $main_table . ('<> ' . chr(9) . '| Type: keywords ' . chr(9) . '| Index: ' . array_search('<>', $keywords_table) . '<br>');
                            array_push($place_table, array('<>', 'keywords'));
                            $i = $i + 2;
                            continue;
                        } else {
                            if (!in_array('<', $keywords_table)) {
                                array_push($keywords_table, '<');

                            }

                            $main_table = $main_table . ('<' . chr(9) . '| Type: keywords ' . chr(9) . '| Index: ' . array_search('<', $keywords_table) . '<br>');
                            array_push($place_table, array('<', 'keywords'));
                        }
                    } else {
                        if (!in_array($code[$i], $keywords_table)) {
                            array_push($keywords_table, $code[$i]);

                        }
                        $main_table = $main_table . ($code[$i] . chr(9) . '| Type: keywords ' . chr(9) . '| Index: ' . array_search($code[$i], $keywords_table) . '<br>');
                        array_push($place_table, array($code[$i], 'keywords'));
                    }

                }


            } elseif (is_numeric($code[$i])) {
                if ($code[$i] == 0 || $code[$i] == 7 || $code[$i] == 1 || $code[$i] == 9) {
                    if ($code[$i] == 1) {
                        if ($code[$i + 1] == 3) {
                            if (!in_array(13, $numeric_constant_table)) {
                                array_push($numeric_constant_table, 13);

                            }

                            $main_table = $main_table . ('13 ' . chr(9) . '| Type: num. constant ' . chr(9) . '| Index: ' . array_search(13, $numeric_constant_table) . '<br>');
                            array_push($place_table, array(13, 'constant'));
                            $i = $i + 2;
                            continue;

                        } else {
                            echo '<script>alert("Error, no such number as: ' . $code[$i] . ' ,at index ' . $i . '");</script>';
                            return -1;
                        }

                    } else {
                        if (!in_array($code[$i], $numeric_constant_table)) {
                            array_push($numeric_constant_table, $code[$i]);
                        }
                        $main_table = $main_table . ($code[$i] . chr(9) . '| Type: num. constant ' . chr(9) . '| Index: ' . array_search($code[$i], $numeric_constant_table) . '<br>');
                        array_push($place_table, array($code[$i], 'constant'));
                    }
                } else {
                    echo '<script>alert("Error, no such number as: ' . $code[$i] . ' ,at index ' . $i . '");</script>';
                    return -1;
                }
            } elseif (!ctype_space($code[$i])) {
                echo '<script>alert("Error, no such symbol as: ' . $code[$i] . ' ,at index ' . $i . '");</script>';
                return -1;
            }
        } else {
            $buffer = $buffer . $code[$i];
        }
        $i++;
    }

    end_Line();
    print_r($main_table);
    print_r('Keywords table: ');
    table_Print($keywords_table);
    print_r('Indentificator table: ');
    table_Print($indentificator_table);
    print_r('Numeric constant table: ');
    table_Print($numeric_constant_table);
    table_Print($place_table);
    return $place_table;
}

function end_Line()
{
    print (PHP_EOL);
}

function table_Print($array)
{
    print_r($array);
}

?>