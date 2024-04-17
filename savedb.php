

<?php
function saveUserData($usrData)
{
    $finalData = "";
    //check if the dataBase is intact
    if(!file_exists("./database/userList.txt"))
        $usrDataFile = fopen("./database/userList.txt","w");
    else
        $usrDataFile = fopen("./database/userList.txt","a");

    //iterates over user data and create a cocatenated string
    //the goal of putting the data between ""  is to use them as delimetors in the future
    foreach( $usrData as $key => $value )
    {
        $finalData .= '"'.$value .'" ';
    }

    //write and close file
    fwrite($usrDataFile, $finalData);

    fclose($usrDataFile);
}
function saveUserPhotos($usrName)
{
    if(isset($_FILES['pic'])) 
    {

        // Access the uploaded file details and check if path exists and creating it otherwise
        $picName = $_FILES['pic']['name'];
        $picError = $_FILES['pic']['error'];
        $uploadPATH = "./database/users/userpics/".$usrName."/";
        
        if(!file_exists($uploadPATH))
            mkdir($uploadPATH);

        // Check if file was uploaded successfully
        foreach ($_FILES["pic"]["error"] as $key => $error) 
        {
            if ($error == UPLOAD_ERR_OK) 
            {
                $tmpName = $_FILES["pic"]["tmp_name"][$key];
                $picName = basename($_FILES["pic"]["name"][$key]);
                move_uploaded_file($tmpName, $uploadPATH.$picName);
            }
            else
            {
               die("Error:".$picError);
            }
        }
        // Continue with saving other user data to the database
    }
    else
    {
        echo "no file uploaded";
    }

}
function saveInDb ()
{
    //storage of name attribute into varabiables

    // For private info
    $name = $_POST['name']."_".$_POST['lname'];

    $address = isset($_POST['adress'])?$_POST['adress']:"";

    $password = isset($_POST['password']) ? $_POST['password']: "";

    // For public info
    $nickname = isset($_POST['nickname']) ? $_POST['nickname'] : "";

    $email = isset($_POST['email']) ? $_POST['email'] : "";

    $birthday = isset($_POST['birthday']) ? $_POST['birthday'] : "";

    $gender = isset($_POST['gender']) ? $_POST['gender'] : "";

    $lkfgender = isset($_POST['lkfgender'])? $_POST['lkfgender'] : "";

    $profession = isset($_POST['profession']) ? $_POST['profession'] : "";

    $location = isset($_POST['location']) ? $_POST['location'] : "";

    $psituation = isset($_POST['psituation'])? $_POST['psituation'] : "";

    $physical_description = isset($_POST['physical_description']) ? $_POST['physical_description'] : "";

    $personal_information = isset($_POST['persoinformation']) ? $_POST['persoinformation'] : "";
    
    if(isset($lkfgender[1])) //keeping one single element inside the list of attributes
    {
        $genderpref = $lkfgender[0]." ".$lkfgender[1];
    }else
    {
        $genderpref = $lkfgender[0];
    }

    //here I still need to enhace the security of the strings, but Imma present my propositions tomorrow during the meeting


    $userData = array(
        'name' => $name,
        'address' => $address,
        'password' => $password,
        'nickname' => $nickname,
        'email' => $email,
        'birthday' => $birthday,
        'gender' => $gender,
        'genderPreferencies' => $genderpref,
        'profession' => $profession,
        'location' => $location,
        'psituation' => $psituation,
        'physical_description' => $physical_description,
        'personal_information' => $personal_information
    );
    


    saveUserData($userData);

    saveUserPhotos($name);
    
   
    }


    saveInDb();
?>