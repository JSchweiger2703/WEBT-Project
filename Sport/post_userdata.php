<?php session_start();
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$username = $_POST['user_name'];
$password = $_POST['user_password'];
$country = $_POST['country'];
$_SESSION['loggedin'] = true;
$reg = array("first_name" => $first_name, "last_name" => $last_name, "password" => $password, "username" => $username, "country" => $country);
$json = json_encode($reg);
file_put_contents('http://localhost:3000/userdata', $json); ?>