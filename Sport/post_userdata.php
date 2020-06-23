
    <?php session_start();
    $_SESSION['failedRegister'] = false;
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['user_mail'];
$password = $_POST['user_password'];

if($first_name == "" OR $last_name == "" OR $email == "" OR $password == "")
{
    $_SESSION['failedRegister'] = true;
}

$users = json_decode(file_get_contents("http://localhost:3000/userdata"));

foreach($users as $current)
{
    if($current->email == $email)
    {
        $_SESSION['failedRegister'] = true;
        sleep(2);
        echo '<script>location.replace(\'Register.php\');</script>';
    }
}

if($_SESSION['failedRegister'] == false)
{
    $_SESSION['loggedin'] = true;
    $userObj = json_encode(
    array(
        'email' => $email, 
        'password' => $password, 
        'firstname' => $first_name,
        'lastname' => $last_name, 
    ), 
    JSON_FORCE_OBJECT
    );

    $requestOptions = array(
    'http' => array(
        'header' => "Content-type: application/json\r\n",
        'method' => "POST",
        'content' => $userObj
    )
);
$request = stream_context_create($requestOptions);
$result = file_get_contents("http://localhost:3000/userdata", false, $request);
$_SESSION['userID'] = count(json_decode(file_get_contents('http://localhost:3000/userdata')));
echo '<script>location.replace(\'Profile.php\');</script>';
}
 ?>