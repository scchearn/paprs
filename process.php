<?php

    session_start();
    
    function utf8_converter($array){
        array_walk_recursive($array, function(&$item, $key){
            if(!mb_detect_encoding($item, 'utf-8', true)){
                $item = utf8_encode($item);
            }
        });
            return $array;
        }
    
    $paprs_Title = mb_convert_encoding($_POST['paprs_Title'],'UTF-8');
    $paprs_Author = $_POST['paprs_Author'];
    $paprs_Time = $_POST['paprs_Time'];
    $paprs_TotalField = $_POST['paprsTotalField'];
    $paprs_Questions = utf8_converter($_POST['paprs_Questions']);
    
    $number = 3;
    $pointer = &$number;  // Sets $pointer to a reference to $number
    echo $number."<br/>"; // Outputs  '3' and a line break
    $pointer = 24;        // Sets $number to 24
    echo $number;         // Outputs '24'
    
    echo '<pre>';
    print_r($_SESSION);
    echo '</pre>';
    
    echo '<hr/>';
    
    echo '<pre>';
    print_r($paprs_Questions);
    echo '</pre>';

?>