<?php
    function add_item($cartID, $productID, $qty) {
        global $db;
        $query = "INSERT INTO item (itemID, cartID, productID, qty)" . 
        "VALUES (NULL, '$cartID', '$productID', '$qty')";
        $result = $db -> query($query);
        return $result;
    } // end add_item
    
    function item_count($cartID) {
        global $db;
        $query = "SELECT SUM(qty) AS total FROM item WHERE cartID='$cartID'";
        $result = $db->query($query);
    
        // Check if query was successful
        if($result){
            $row = $result -> fetch(PDO::FETCH_ASSOC);  // Fetch the row
            if($row['total'] !== null){ 
                return $row['total'];  // Return total qty as number
            }
        }
        return 0;  // Return 0 if no items or unsuccessful query
    }

     // get all the items for the user and a specific cartID
     function get_cart_items($cartID) {
        global $db;
        $query = "SELECT 
            IT.itemID AS 'Item',
            IT.qty AS 'Qty',
            PR.productImage AS 'Image',
            PR.productName AS 'Name',
            PR.productPrice AS 'Price',
            PR.productPrice * IT.qty AS 'Subtotal'
            FROM 
                item AS IT 
            JOIN 
                product AS PR 
            ON 
                PR.productID = IT.productID
            WHERE 
                IT.cartID = '$cartID'";
        $result = $db -> query($query);
        return $result;
    } // end login
?>   