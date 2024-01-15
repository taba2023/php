<?php
    function get_cats(){
        global $db;
        $query_string = 'SELECT * FROM cat';
        $result = $db -> query($query_string);
        return $result;
     }
?>