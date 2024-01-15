<?php
    $dsn = 'mysql:host=localhost;dbname=danphp';
    $dbname = "danphp";
    $host = "localhost";
    $username = 'danadmi';
    $password = 'aron2008@';
    $con = mysqli_connect($host, $username, $password, $dbname);

    try {
        $db = new PDO($dsn, $username, $password);
    }
    catch(PDOException $e) {
        $error_message = $e->getMessage();
        echo $error_message;
        include('models/db_error.php');
        exit();
    }
?>