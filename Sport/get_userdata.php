
<?php session_start();
    $_SESSION['failedLogin'] = false;
    $username = $_POST["username"];
    $password = $_POST["password"];
    $json = file_get_contents('http://localhost:3000/userdata');
    $profiles = json_decode($json);

    foreach($profiles as $currentdata)
    {
        if($currentdata->username == $username AND $currentdata->password == $password)
        {   
            $_SESSION['loggedin'] = true;
            $_SESSION['userID'] = $currentdata->id;
            echo '<script> location.replace(\'Profile.php\')</script>';
        }
    }

    if($_SESSION['loggedin'] == false)
    {
        $_SESSION['failedLogin'] = true;
        echo '<script> location.replace(\'Login.php\')</script>';
    }
?>