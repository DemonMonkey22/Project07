<?php 
    $firstname = filter_input(INPUT_GET, 'firstname');
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
        <?php if ($firstname == NULL) { ?>
                
            <form action="" method="get" id="register_form">
                <label for="firstname">Please enter your firstname:</label>
                <input type="text" id="firstname" name="firstname" maxlength="50" required>
                <input type="submit" value="Register" class="button blue">
            </form>

        <?php } else { 

                $lifetime = 60 * 60 * 24 * 7; //one week
                session_set_cookie_params($lifetime, '/');
                session_start();
                $_SESSION['userid'] = $firstname;
                
        ?>
            <h1>Thank you for registering, <?php echo $firstname ?>!</h1>
            <p>
                <a href="index.php">Click here</a> to view our vehicle list.
            </p>
            <br>
        <?php } ?>
    </body>

<?php include('view/footer.php'); ?>