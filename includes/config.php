<?php

/* 2 ways to bring external scripts into existing:
 * 
 * 1- include
 * 2- require
 * 
 * NOTE: there is also an INCLUDE_ONCE and REQUIRE_ONCE
 * 
 * difference between each are:
 * 
 * Failure to include a file results in a warning and the script continues...
 * 
 * Failure to require a file results in a fatal error and the script is halted
 * 
 * Typically INCLUDE files like HTML header, footer, sidebar, etc
 * 
 * Typically REQUIRE files that are critical to the site's functianality like database connections,
 * configuration files, etc
 */

//===================Retrieve the database info outside of the root folder=============================

$root = dirname($_SERVER['DOCUMENT_ROOT']).'/dbconn';
//echo $root;   // gives me this C:/xampp/dbconn

//create a constant to represent the final db connection file location
define('MYSQL',$root.'/2017_pdo_connect.php');
//giving the final path
//c:/xampp/dbcon/2017_mysqli_connect.php
//var_dump(mysqli);

