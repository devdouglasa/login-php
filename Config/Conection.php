<?php


$DBHOST = "localhost";
$DBUSER = "test";
$DBPASSWORD = "12345678";
$DBNAME = "db_users";


try
{
    $db = new PDO("mysql:host=$DBHOST;dbname=$DBNAME", $DBUSER, $DBPASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    echo "ERRO". $e->getMessage();
}


