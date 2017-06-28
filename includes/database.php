<?php
//Mysqli new DB parameters
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'auth';

//Try Catch to connect to Database
try
{
    $conn = new PDO("mysql:host=$server; dbname=$database;", $username, $password);
}

catch(PDOException $e)
{
    die("Connection Failed: " . $e->getMessage());
    
}