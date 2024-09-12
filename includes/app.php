<?php 
use Dotenv\Dotenv;

require '../vendor/autoload.php';
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();
 
require 'funciones.php';
require 'database.php';
 
// Conectarnos a la base de datos


use Model\ActiveRecord;
ActiveRecord::setDB($db);
