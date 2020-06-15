<?php session_start();
    $username = $_POST["username"];
    $password = $_POST["password"];
    $json = file_get_contents('http://localhost:3000/userdata');
    $profiles = json_decode($json);

    foreach($profiles as $currentdata)
    {
        if($currentdata->username == $username AND $currentdata->password == $password)
        {   
            $_SESSION['loggedin'] = true;
            $_SESSION['profileid'] = $currentdata->id;
            echo '<script> location.replace(\'Profile.php\')</script>';
        }
    }

    if($_SESSION['loggedin'])
    {
        echo '<script> location.replace(\'Login.php\')</script>';
    }
?>