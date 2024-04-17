
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Example3</title>
</head>
<body>
    <h1>Dummy exemple3</h1>
    <?php
        session_start();
        if($_SESSION["loggedin"])
        {
            $t = time()-$_SESSION["time"];
            if($t>6)
            {
                session_destroy();
                header("Location:../login.html");
            }else
            {
                $_SESSION['time']=time();
            }
        }else
        {
            header("Location:../login.html");
        }
    ?>
    <br><a href="./ex1.php">Dummy Example 1 </a>
    <br><a href="./ex2.php">Dummy Example 2 </a>
</body>

</html>