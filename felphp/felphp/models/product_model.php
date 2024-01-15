<?php
   
    function get_products() {
        global $db;
        $query = "SELECT * FROM product";
        $result = $db -> query($query);
        return $result;
    }

    
    function get_products_by_cat($catID) {
        global $db;
        $query = "SELECT PR.productID, PR.productImage, PR.productName, PR.productDesc, PR.productPrice 
                 FROM product AS PR WHERE PR.catID = '$catID'";

        $rows = [];
        $query_result = $db->query($query);
        while( $row = $query_result->fetch(PDO::FETCH_ASSOC) ) 
        {
            $rows[] = $row; 
        }
        return $rows;
    }
?>