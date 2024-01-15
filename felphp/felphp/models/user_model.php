<?php
    function create_user($username, $password, $email) {
        echo 'hi';
        global $db;
        $query = "INSERT INTO user (userID, username, password, email)" . 
        "VALUES (NULL, '$username', '$password', '$email')";
        $result = $db->query($query);
        return $result;
    } // end create_user

    function login($username, $password) {
        global $db;
        $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
        $result = $db->query($query);
        return $result;
    } // end login
?>