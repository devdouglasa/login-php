<?php


$DBHOST = "localhost";
$DBUSER = "root";
$DBPASSWORD = "";
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


