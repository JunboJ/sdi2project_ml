<?php
    $array = array(
        array(2,3,5,6,8),
        array('a','d','r','u'),
        array(1234,234,456,68)
    );

    echo "<div>";
    echo countarray();
    echo "</div>";

    $row = sizeof($array);

    echo $row;
    
    function countarray() {
        $row = $GLOBALS['row'];
        $array = $GLOBALS['array'];
        for ($i = 0; $i < $row; $i++) {
            for ($a = 0; $a < sizeof($array[$i]); $a++) {
                echo $array[$i][$a].",";
            }
            echo "<br>";
        }
    }
?>