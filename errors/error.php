<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>My To Do List</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<!-- the body section -->
<body>
    <header><h1>My To Do List</h1></header>

    <main>
        <h2 class="top">Error</h2>
        <p><?php echo $error; ?></p>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> My To Do List</p>
    </footer>
</body>
</html>