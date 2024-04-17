<?php
    function checkLogIn($email, $password)
    {

        $buffer="";
        
        $emailchk = 0;
        
        $passwordchk = 0;
        
        $login = 0;
        
        $userList = fopen("./database/userList.txt","r");

        if($userList)
        {  
            while($emailchk != 1 && $passwordchk != 1 && $buffer=fgets($userList))
            {
                if(str_contains($buffer,$email) && str_contains($buffer,$password))
                {
                    $emailchk = $passwordchk = $login = 1;

                }
            }
        
            if($login == 1)
            {
                echo "You're logged";
                session_start();
                $_SESSION["time"] = time();
                $_SESSION["loggedin"] = true;
            }
            else
            {
                header("Location:loginform.html");
            }
        }
    }

    
    $password = $_POST["password"];
    $email = $_POST["email"];
    if($password == "" || $email == "")
        header("Location:loginform.html");
    checkLogIn($email,$password);

    

?>
<br><a href="./dummyEx/ex1.php">Dummy Example 1 </a>
<br><a href="./dummyEx/ex2.php">Dummy Example 2 </a>
<br><a href="./dummyEx/ex3.php">Dummy Example 3 </a>