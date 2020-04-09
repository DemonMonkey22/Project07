<?php
    //local development server connection
    $dsn = 'mysql:host=localhost;dbname=zippyusedautos';
    $username = 'root';
    //$password = 'pa55word';

    // Heroku connection
    
    $dsn = 'mysql:host=o61qijqeuqnj9chh.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=jkftejpk988kvek';
    $username = 'jkftejpk988kvekk';
    $password = 'w37tp6u8t2qys6bo';
    
    try {
        //local development server connection
        //if using a $password, add it as 3rd parameter
        $db = new PDO($dsn, $username);

        // Heroku connection
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
?>
