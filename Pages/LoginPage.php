<?php
    require_once '../Config/Conection.php';

    if (!isset($_SESSION))
    {
        session_start();
    }

    if (isset($_SESSION['email']) && isset($_SESSION['password']))
    {
        $email = $_SESSION["email"];
        $password = $_SESSION["password"];
    
        $result = $db->query("SELECT * FROM users WHERE email = '$email'");

        if ($result->rowCount() > 0)
        {
            $user = $result->fetchObject();
    
            if ($_SESSION["email"] == $user->email && password_verify($password, $user->password))
            {
                header("Location: ../Pages/PainelUser.php");
            }
        }
    }

?>



<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Login PHP</title>
    <link rel="stylesheet" href="../Assets/css/style.css">
</head>
<body>
    <div class="login-container">
        <h1>Login</h1>
        <form action="../Login/Login.php" method="post">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Senha:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Entrar</button>
        </form>
    </div> 
</body>
</html>