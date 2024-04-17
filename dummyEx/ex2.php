
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Example2</title>
</head>
<body>
    <h1>Dummy exemple2</h1>
    <?php
    
    session_start();
    
    if($_SESSION["loggedin"])
    {
        echo "ok";
        $t = time()-$_SESSION["time"];
        if($t > 6)
        {
            session_abort();
            header("Location:../loginform.html");
        }else
        {
            $_SESSION['time']=time();
        }
    }
    else
    {
        header("Location:../loginform.html");
    }
    
    ?>
    <br><a href="./ex1.php">Dummy Example 1 </a>
    <br><a href="./ex3.php">Dummy Example 3 </a>
</body>

</html>