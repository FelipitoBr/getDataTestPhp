
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Example 1</title>
</head>
<body>
    <h1>Dummy exemple1</h1>
    <?php
    
    session_start();
    
    if($_SESSION["loggedin"])
    {
        echo "ok";
        $t = time()-$_SESSION["time"];//dans le future implementer ça dans dans le cas où l'utilisateur n'a pas fait d'imput
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

    if($_SESSION["loggedin"])
    {
        echo "ok";
        $t = time()-$_SESSION["time"];//dans le future implementer ça dans dans le cas où l'utilisateur n'a pas fait d'imput
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
    <br><a href="./ex2.php">Dummy Example 2 </a>
    <br><a href="./ex3.php">Dummy Example 3 </a>
</body>


</html>