<?php

require "../Config/Conection.php";


if (!isset($_SESSION['email']) && !isset($_SESSION['password']))
{
    session_start();
    
    $email = preg_replace('/[\x{0300}-\x{036F}]/u', '', $_POST['email']);
    $password = preg_replace('/[\x{0300}-\x{036F}]/u', '', $_POST['password']);


    $result = $db->query("SELECT * FROM users WHERE email = '$email'");
    $user = $result->fetchObject();


    if (password_verify($password, $user->password))
    {
        $_SESSION["email"] = $email;
        $_SESSION["password"] = $password;
        header("Location: ../Pages/PainelUser.php");
    }
    else 
    {
        header("Location: ../Pages/LoginPage.php");
    }

}
else if (isset($_SESSION["email"]) && isset($_SESSION["password"]))
{
    $email = $_SESSION["email"];
    $password = $_SESSION["password"];

    $result = $db->query("SELECT * FROM users WHERE email = '$email'");
    $user = $result->fetchObject();


    if ($_SESSION["email"] == $user->email && password_verify($password, $user->password))
    {
        header("Location: ../Pages/PainelUser.php");
    }
    else 
    {
        header("Location: ../Pages/LoginPage.php");
    }
}






