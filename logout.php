<?php 
    session_start();
    //unset variable(s)
    if (isset($_SESSION['userid'])) {
        $firstname = $_SESSION['userid'];
        unset($_SESSION['userid']);
    }
    //end session
    session_destroy();
    //delete session cookie
    $name = session_name();
    $expire = strtotime('-1 year');
    $params = session_get_cookie_params();
    $path = $params['path'];
    $domain = $params['domain'];
    $secure = $params['secure'];
    $httponly = $params['httponly'];
    setcookie($name, '', $expire, $path, $domain, $secure, $httponly);
?>

<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zippy Used Autos</title>
    <link rel="stylesheet" type="text/css" href="view/css/main.css" />
</head>

<!-- the body section -->
<body>
    <header>
        <div id="pageTitle">
            <h1>Zippy Used Autos</h1>
        </div>
        <div id="pageLinks">
            <p></p>
        </div>
    </header>

    <body>
        <h1>Thank you for signing out, <?php echo $firstname ?>.</h1>
        <p>
            <a href="index.php">Click here</a> to view our vehicle list.
        </p>
        <br>
    </body>

<?php include('view/footer.php'); ?>